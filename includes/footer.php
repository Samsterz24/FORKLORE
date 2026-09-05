<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
        <footer class="footer">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>FORKLORE</h3>
                    <p>A global community cookbook where every recipe carries a story. Discover, share, 
                        and preserve culinary traditions from across generations and cultures.</p>
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