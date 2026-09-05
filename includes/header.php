<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $page_title ?? 'ForkLore - Global Community Cookbook' ?></title>
        
        <!-- Global CSS -->
        <link rel="stylesheet" href="/FORKLORE/styles/main.css">
        <link rel="stylesheet" href="/FORKLORE/styles/auth.css">
    </head>

    <body>

        <header class="header">
            <a href="/FORKLORE/index.php" class="logo">
                <img src="/FORKLORE/assets/LOGO.png" alt="ForkLore Logo" class="logo-img">
                <b>FORKLORE</b>
            </a>
            <nav>
                <a href="/FORKLORE/index.php">Home</a>
                <a href="/FORKLORE/recipes.php">Explore Recipes</a>
                <a href="/FORKLORE/cuisines.php">Cuisines</a>
                <a href="/FORKLORE/stories.php">Stories</a>
                <a href="/FORKLORE/community.php">Community</a>
            </nav>

            <!-- Dynamic Auth Navigation -->
            <?php if (isset($_SESSION['id'])): ?>
                <div class="user-profile-nav">
                    <a href="profile.php" class="profile-badge">
                        👤 <?= htmlspecialchars($_SESSION['username'] ?? 'Profile') ?>
                    </a>
                    <a href="auth/logout.php" class="logout-link">Logout</a>                
                </div>
            <?php else: ?>
                <div class="auth-btn-group">
                    <a href="/FORKLORE/auth/login.php" class="login-nav-btn">Login</a>
                    <a href="/FORKLORE/auth/register.php" class="register-nav-btn">Register</a>
                </div>
            <?php endif; ?>
        </header>