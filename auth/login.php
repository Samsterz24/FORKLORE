<?php
session_start();
require_once '../DB/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username   = trim($_POST['username'] ?? '');
    $password   = ($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error  = "Please fill in all fields.";
    } else {

    $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Verify hashed password
                $_SESSION['id']         = $user['id'];
                $_SESSION['username']   = $user['username'];
                
                header("Location: ../index.php");
                exit;
            } else {
                $error = "Invalid username or password.";
            }
        }
    }
$page_title = "Login - Forklore";
require_once '../includes/header.php';
?>

    <main class="auth-container">
        <div class="auth-card">
            <h2>Login to ForkLore</h2>
            <p class="auth-subtitle">Welcome back! Sign in to continue sharing recipes.</p>

            <?php if (!empty($error)): ?>
                <p class="error-msg" style="color: #d3541b; font-size: 13px; text-align: center; margin-bottom: 15px;">
                    <?= htmlspecialchars($error) ?>
                </p>
            <?php endif; ?>

            <form action="/FORKLORE/auth/login.php" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="username">Username or Email</label>
                    <input type="text" name="username" id="username" value="<?= htmlspecialchars($username ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <button type="submit" class="primary-btn auth-submit-btn">Login</button>
            </form>

            <p class="auth-footer-text">
                Don't have an account? <a href="register.php">Register here</a>
            </p>
        </div>
    </main>

<?php require_once '../includes/footer.php'; ?>
