<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForkLore - Global Community Cookbook</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <!-- Header Navigation -->
    <header class="header">
        <a href="index.php" class="logo">
            <img src="assets/LOGO.png" alt="ForkLore Logo" class="logo-img">
            <b>FORKLORE</b>
        </a>
        <nav>
            <a href="index.php">Home</a>
            <a href="recipes.php">Explore Recipes</a>
            <a href="cuisines.php">Cuisines</a>
            <a href="stories.php">Stories</a>
            <a href="community.php">Community</a>
        </nav>

        <!-- Dynamic Auth Navigation -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="user-profile-nav">
                <a href="profile.php" class="profile-badge">
                    👤 <?= htmlspecialchars($_SESSION['username'] ?? 'Profile') ?>
                </a>
                <a href="logout.php" class="logout-link">Logout</a>
            </div>
        <?php else: ?>
            <div class="auth-btn-group">
                <a href="auth/login.php" class="login-nav-btn">Login</a>
                <a href="auth/register.php" class="register-nav-btn">Register</a>
            </div>
        <?php endif; ?>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <span class="badge">GLOBAL COMMUNITY COOKBOOK</span>
            <h1>Every Recipe <br> Has a Story.</h1>
            <p>Discover recipes passed down through generations, shared across borders, and cooked with love. Add your own story to the world's most personal cookbook.</p>
            
            <div class="stats">
                <div><strong>16,200+</strong><span>Recipes</span></div>
                <div><strong>78</strong><span>Cuisines</span></div>
                <div><strong>6,724+</strong><span>Contributors</span></div>
            </div>

            <a href="share.php" class="primary-btn">Share your Recipe</a>
        </div>

        <a href="recipe-detail.php?id=adobo" class="hero-card">
            <img src="assets/chicken-adobo.jpg" alt="Sammy's Chicken Adobo">
            <div class="card-info">
                <h3>Sammy's Chicken Adobo - Filipino Dish</h3>
                <p>Recipe of the Week</p>
            </div>
        </a>
    </section>

    <!-- Featured Recipes -->
    <section class="featured">
        <div class="section-header">
            <h2>Featured Recipes</h2>
            <a href="recipes.php">View all recipes &rarr;</a>
        </div>

        <div class="recipe-grid">
            <a href="recipe-detail.php?id=1" class="recipe-card">
                <img src="assets/chicken-adobo.jpg" alt="Sammy's Chicken Adobo">
                <h4>Sammy's Chicken Adobo</h4>
                <p>Sammy • Filipino Dish</p>
            </a>
            <a href="recipe-detail.php?id=2" class="recipe-card">
                <img src="assets/jp.jpg" alt="Tonkotsu Ramen">
                <h4>Tonkotsu Ramen from Scratch</h4>
                <p>Kasane Teto • Japanese</p>
            </a>
            <a href="recipe-detail.php?id=3" class="recipe-card">
                <img src="assets/masala.jpg" alt="Grandma Priya's Chicken Masala">
                <h4>Grandma Priya's Chicken Masala</h4>
                <p>Priya Sharma • Indian</p>
            </a>
            <a href="recipe-detail.php?id=4" class="recipe-card">
                <img src="assets/italian.jpg" alt="Limoncello Scagliatella">
                <h4>Limoncello Scagliatella</h4>
                <p>Mezzaluna Master • Italian</p>
            </a>
        </div>
    </section>

    <!-- Explore by Cuisines -->
    <section class="cuisines">
        <h2>Explore by Cuisines</h2>
        <div class="cuisine-cards">
            <a href="cuisines.php?type=italian" class="cuisine-tile" style="background-image: url('assets/italian.jpg');">
                <h3>Italian</h3>
                <span>312 recipes</span>
            </a>
            <a href="cuisines.php?type=indian" class="cuisine-tile" style="background-image: url('assets/india.jpg');">
                <h3>Indian</h3>
                <span>420 recipes</span>
            </a>
            <a href="cuisines.php?type=mexican" class="cuisine-tile" style="background-image: url('assets/mex.jpg');">
                <h3>Mexican</h3>
                <span>367 recipes</span>
            </a>
            <a href="cuisines.php?type=japanese" class="cuisine-tile" style="background-image: url('assets/jp.jpg');">
                <h3>Japanese</h3>
                <span>255 recipes</span>
            </a>
            <a href="cuisines.php?type=french" class="cuisine-tile" style="background-image: url('assets/fr.jpg');">
                <h3>French</h3>
                <span>143 recipes</span>
            </a>
        </div>
    </section>

    <!-- Recipe Stories Section -->
    <section class="stories">
        <span class="sub-heading">THE STORIES BEHIND THE FOOD</span>
        <h2>Recipe Stories</h2>
        <div class="stories-container">
            
            <!-- Main Featured Story Card -->
            <a href="story-detail.php?id=1" class="main-story-card">
                <div class="story-img-wrapper">
                    <img src="assets/pasta.jpg" alt="The Pasta My Grandmother Made Every Sunday">
                </div>
                <div class="story-content">
                    <div>
                        <span class="location">ITALY • EMILIA-ROMAGNA</span>
                        <h3>The Pasta My Grandmother Made Every Sunday</h3>
                        <blockquote>"She never measured anything. Her hands just knew how much flour, how many eggs, how long to knead. 
                            I watched her make tagliatelle every Sunday for forty years before I finally understood it wasn't about the recipe at all. 
                            It was about the hour before dinner when the house smelled of semolina and she'd let me press the dough"</blockquote>
                        <p class="author">- Elena Ricci, Bologna</p>
                    </div>
                    
                    <div class="story-footer">
                        <span class="saves-count"><b>24</b> saves</span>
                        <span class="share-text">Share &rarr;</span>
                    </div>
                </div>
            </a>

            <!-- Sidebar Story List -->
            <div class="story-list">
                <a href="story-detail.php?id=2" class="story-item">
                    <div class="story-thumb-placeholder"></div>
                    <div>
                        <span class="location">JP • Japanese</span>
                        <p>My Mother's Miso Soup</p>
                    </div>
                </a>
                <a href="story-detail.php?id=3" class="story-item">
                    <div class="story-thumb-placeholder"></div>
                    <div>
                        <span class="location">NG • Nigerian</span>
                        <p>Grandpa Jollof Secret</p>
                    </div>
                </a>
                <a href="story-detail.php?id=4" class="story-item">
                    <div class="story-thumb-placeholder"></div>
                    <div>
                        <span class="location">MA • Moroccan</span>
                        <p>Marrakech, 1994</p>
                    </div>
                </a>
            </div>

        </div>
    </section>

    <!-- CTA Banner Section -->
    <section class="cta-banner">
        <div class="cta-content">
            <h2>Your recipe deserves to <br><span>be remembered.</span></h2>
            <p>Share the recipes that have shaped your family, your culture, your life. Every dish you contribute becomes part of something bigger — a living archive of the world's culinary heritage.</p>
            
            <div class="cta-buttons">
                <a href="share.php" class="btn-primary-orange">Share a Recipe &rarr;</a>
                <a href="about.php" class="btn-outline">Learn More</a>
            </div>
        </div>

        <div class="cta-image-wrapper">
            <img src="assets/sabaw.jpg" alt="Soup Bowl Asset">
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-brand">
                <h3>FORKLORE</h3>
                <p>A global community cookbook where every recipe carries a story. Discover, share, and preserve culinary traditions from across generations and cultures.</p>
            </div>
            
            <div class="footer-col">
                <h4>DISCOVER</h4>
                <ul>
                    <li><a href="recipes.php">Explore Recipes</a></li>
                    <li><a href="cuisines.php">By Cuisine</a></li>
                    <li><a href="#">By Season</a></li>
                    <li><a href="#">Most Saved</a></li>
                    <li><a href="#">New This Week</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>COMMUNITY</h4>
                <ul>
                    <li><a href="share.php">Share a Recipe</a></li>
                    <li><a href="stories.php">Recipe Stories</a></li>
                    <li><a href="#">Collections</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>ABOUT</h4>
                <ul>
                    <li><a href="about.php">Our Mission</a></li>
                    <li><a href="#">Contributors</a></li>
                    <li><a href="#">Newsletter</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2026 Forklore. Recipes with roots, shared with love.</p>
        </div>
    </footer>

</body>
</html>