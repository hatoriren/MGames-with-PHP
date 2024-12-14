<?php
session_start(); // Start session to check if the user is logged in
require 'db_games.php'; // Include the database connection

// Get the game ID from the URL (default to 0 if not provided)
$game_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the game details from the database
$sql = "SELECT * FROM games WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $game_id);
$stmt->execute();
$result = $stmt->get_result();
$game = $result->fetch_assoc();

// Redirect to home if game not found
if (!$game) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($game['name']); ?></title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">MGames</a>
    </header>

    <div class="game-details">
        <div class="image">
            <img src="<?= htmlspecialchars($game['image']); ?>" alt="<?= htmlspecialchars($game['name']); ?>">
        </div>
        <div class="details">
            <h1><?= htmlspecialchars($game['name']); ?></h1>
            <p><?= htmlspecialchars($game['description']); ?></p>
            <h2>Price: $<?= htmlspecialchars($game['price']); ?></h2>

            <!-- Buy Now Button -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- If logged in, redirect to buy.php -->
                <form action="buy.php" method="POST">
                    <input type="hidden" name="game_id" value="<?= htmlspecialchars($game['id']); ?>">
                    <button type="submit" class="btn">Buy Now</button>
                </form>
            <?php else: ?>
                <!-- If not logged in, open the login modal -->
                <button class="btn" id="open-login-modal">Buy Now</button>
            <?php endif; ?>
        </div>
    </div>

    <div class="reviews">
        <h2>Reviews</h2>
        <ul>
            <?php
            // Fetch reviews for the current game
            $review_sql = "SELECT review FROM reviews WHERE game_id = ?";
            $review_stmt = $conn->prepare($review_sql);
            $review_stmt->bind_param("i", $game_id);
            $review_stmt->execute();
            $review_result = $review_stmt->get_result();

            while ($review = $review_result->fetch_assoc()): ?>
                <li><?= htmlspecialchars($review['review']); ?></li>
            <?php endwhile; ?>
        </ul>
    </div>

    <!-- Log In to Buy Modal -->
    <div id="login-modal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Log In to Buy</h2>
            <p>You need to log in to purchase this game.</p>
            <a href="login.php" class="btn">Log In</a>
        </div>
    </div>

    <script>
        // Get modal elements
        const modal = document.getElementById("login-modal");
        const openModalButton = document.getElementById("open-login-modal");
        const closeModalButton = document.querySelector(".close-modal");

        // Show the modal when "Buy Now" is clicked (user not logged in)
        openModalButton.addEventListener("click", () => {
            modal.style.display = "block";
        });

        // Close the modal when the "X" is clicked
        closeModalButton.addEventListener("click", () => {
            modal.style.display = "none";
        });

        // Close the modal when clicking outside of it
        window.addEventListener("click", (event) => {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    </script>
</body>
</html>
