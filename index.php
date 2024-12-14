
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Master</title>
    <link rel="stylesheet" href="style/style.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  </head>
  <body>
    <header>
      <a href="#home" class="logo">
        <img class="logo-pic" src="img/logo.png" alt="logo" />
        MGames
      </a>

      <div class="bx bx-menu" id="menu-icon"></div>
      <ul class="navbar">
        <li><a href="#home" class="active">Home</a></li>
        <li><a href="#coming">Coming</a></li>
        <li><a href="#games">Our Games</a></li>
        <li><a href="#newsletter">Newsletter</a></li>
        <li><a href="#footer">Contact</a></li>
      </ul>
      
      <div class="user-menu">
            <?php if (isset($_SESSION['user_name'])): ?>
                <div class="dropdown">
                    <button class="dropbtn"> <?= htmlspecialchars($_SESSION['user_name']); ?></button>
                    <div class="dropdown-content">
                        <a href="profile.php">Profile</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <button class="btn" onclick="window.open('login.html')">Sign In</button>
            <?php endif; ?>
        </div>
   
    </header>

    <!--Home-->
     
    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            <!-- Box 1 -->
            <div class="swiper-slide conatiner">
            <img src="img/resident_evil_home.jpeg" alt="Resident Evil" />
                <div class="home-text">
                <h1>Resident Evil 4</h1>
                <a href="https://www.youtube.com/watch?v=j5Xv2lM9wes&ab_channel=ResidentEvil" target="_blank"  class="btn">Watch Now</a>
                </div>
            </div>
            <!-- Box 2 -->
            <div class="swiper-slide conatiner">
            <img src="img/the_last_of_us_home.jpeg" alt="The Last of Us" />
                <div class="home-text">
                <h1>The Last of Us</h1>
                <a href="https://www.youtube.com/watch?v=W01L70IGBgE&ab_channel=PlayStation" target="_blank" class="btn">Watch Now</a>
                </div>
            </div>
            <!-- Box 2 -->
            <div class="swiper-slide conatiner">
            <img src="img/wukong_home.jpeg" alt="Wukong" />
                <div class="home-text">
                <h1>Black Myth: Wukong</h1>
                <a href="https://www.youtube.com/watch?v=Wl05yGSDpxY&ab_channel=PlayStation" target="_blank" class="btn">Watch Now</a>  
                </div>
            </div>
            
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
    </section>

    <!--Coming-->
    <section class="coming" id="coming">
      <h2 class="heading">Coming Soon</h2>
      <div class="coming-container">
          <div class="image-box">
              <a href="https://www.youtube.com/watch?v=4OgoTZXPACo&t=3s&ab_channel=GameSpot" class="coming-trailer" target="_blank">
                  <img src="img/sekiro.jpg" alt="Sekiro" />
              </a>
          </div>
          <div class="trailer-box">
              <h3>Sekiro: Shadows Die Twice</h3>
             <button onclick="window.open('https://www.youtube.com/watch?v=4OgoTZXPACo&t=3s&ab_channel=GameSpot', '_blank')">Watch Now</button>
          </div>
      </div>
  </section>
  
      <!--Games-->
      <section class="games" id="games">
        <h2 class="heading">Our Games</h2>
    
        <div class="games-container">
    <?php
    require 'db_games.php';

    // Fetch all games from the database
    $result = $conn->query("SELECT id, name, image, genre FROM games");

    while ($game = $result->fetch_assoc()): ?>
        <a href="game.php?id=<?= $game['id']; ?>" class="box">
            <div class="box-img">
                <img src="<?= htmlspecialchars($game['image']); ?>" alt="<?= htmlspecialchars($game['name']); ?>">
            </div>
            <h3><?= htmlspecialchars($game['name']); ?></h3>
            <span><?= htmlspecialchars($game['genre']); ?></span>
        </a>
    <?php endwhile; ?>
         </div>

    </section>
    <!--Newsletter-->
    <h2 class="heading">Newsletter</h2>
    <section class="newsletter" id="newsletter">
      <div class="newsletter-container">
        <img src="img/logo.png" alt="">
      <h2>Subscribe to the MGames Email List</h2>
      <p>Sign up for our email newsletter to get info on game announcements and updates, details on special events and offers, and more from MGames.</p>
      <form action="">
        <input type="email" class="email" placeholder="Enter Email..." required>
        <input type="submit" value="Subscribe" class="btn">
      </form>
    </div>
    </section>

    <footer class="footer" id="footer">
      <div class="footer-middle">
        <div class="footer-legal-links">
          <a href="#">Corporate</a>
          <a href="#">Privacy</a>
          <a href="#">Legal</a>
          <a href="#">Do Not Sell or Share My Personal Information</a>
        </div>
        <div class="footer-social-icons">
          <a href="#"><i class='bx bxl-instagram'></i></a>
          <a href="#"><i class='bx bxl-facebook'></i></a>
          <a href="#"><i class='bx bxl-twitter'></i></a>
          <a href="#"><i class='bx bxl-youtube'></i></a>
          <a href="#"><i class='bx bxl-telegram'></i></a>
        </div>
       </div>
       <script src="js/scroll.js"></script>
       <script src="js/swiper.js"></script>
      
    </footer>
    </body>
</html>

