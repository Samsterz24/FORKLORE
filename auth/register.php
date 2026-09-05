<?php
session_start();
require_once '../DB/db.php';

if (isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit;
}//if naka login na

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Basic Validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters long.";
    } else {
        // exist or noh
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Username or Email is already registered.";
        } else {
            $stmt->close();

            $password = password_hash($password, PASSWORD_DEFAULT);

            $insert_stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $insert_stmt->bind_param("sss", $username, $email, $password);

            if ($insert_stmt->execute()) {
                $success = "Account created successfully! You can now <a href='login.php'>login</a>.";
            } else {
                $error = "Something went wrong. Please try again.";
            }
            $insert_stmt->close();
        }
    }
}
$page_title = "Rgister - Forklore";
require_once '../includes/header.php';
?>
<main class="auth-container">
    <div class="auth-card">
        <h2>Join ForkLore</h2>

        <p class="auth-subtitle">
            Create an account to share your recipes and stories.
        </p>

        <?php if (!empty($error)): ?>
            <p class="error-msg" style="color: red;">
                <?= htmlspecialchars($error) ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <p class="success-msg" style="color: green;">
                <?= $success ?>
            </p>
        <?php endif; ?>

        <form action="register.php" method="POST" class="auth-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                >
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input
                    type="password"
                    name="confirm_password"
                    id="confirm_password"
                    required
                >
            </div>

            <button type="submit" class="primary-btn auth-submit-btn">
                Register
            </button>
        </form>

        <p class="auth-footer-text">
            Already have an account?
            <a href="login.php">Login here</a>
        </p>
    </div>
</main>

<?php require_once '../includes/footer.php'; ?>