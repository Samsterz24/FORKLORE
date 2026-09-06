<?php
session_start();

// SIGNED IN ACCOUNT ONLY MAKA UPLOAD
if (!isset($_SESSION['id'])) {
    header("Location: auth/login.php");
    exit;
}

// Include your site header
require_once 'includes/header.php';
?>

<main class="container my-4">
    <h2>Share a New Recipe</h2>

    <form action="process_add_recipe.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Recipe Title:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category:</label>
            <select id="category" name="category" class="form-select" required>
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
                <option value="Dessert">Dessert</option>
                <option value="Snack">Snack</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="recipe_image" class="form-label">Recipe Image:</label>
            <input type="file" id="recipe_image" name="recipe_image" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients (one per line):</label>
            <textarea id="ingredients" name="ingredients" class="form-control" rows="5" placeholder="2 cups Flour&#10;1 tsp Salt&#10;1 cup Milk" required></textarea>
        </div>

        <div class="mb-3">
            <label for="instructions" class="form-label">Instructions / Steps:</label>
            <textarea id="instructions" name="instructions" class="form-control" rows="8" placeholder="1. Mix dry ingredients...&#10;2. Preheat oven..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Publish Recipe</button>
    </form>
</main>

<?php 
// Include your site footer
require_once 'includes/footer.php'; 
?>