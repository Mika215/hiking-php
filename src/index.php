<?php
  require_once('php/dbconnection.php');

  try {
      $qsel_hikes = $db->prepare("SELECT hikeName,dificulty,distance,TIME_FORMAT(duration,'%Hh %i'),elevationGain,DATE(creatDate),DATE(modifDate),userNickname FROM hikes");
      $qsel_hikes->execute();
      $hikes = $qsel_hikes->fetchall(PDO::FETCH_ASSOC);
      //echo '<pre>';
      //var_dump($hikes);
      //echo '</pre>';
  } catch (exception $e) {
    echo $e->getmessage();
    exit;
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/style/index.css">
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Hiking-List</title>
  </head>
  <body>
    <header class="header">
      <div class="header__box">
        <a href="index.html">
          <img
            class="header__log"
            src="./assets/logo_hiking1.png"
            alt="hiking-logo"
            width="150"
            height="240"
          />
        </a>
        <a href=""
          ><img
            class="header__img"
            src="./assets/randonneurs2.jpg"
            alt="hiking-mountains"
        /></a>
        <nav class="header__nav">
          <ul class="header__list">
            <li class="header__list-item">
              <a href="about.html" class="header__list-links">About Us</a>
            </li>
            <li class="header__list-item">
              <a href="book-hike.html" class="header__list-links"
                >Book a hike</a
              >
            </li>
            <li class="header__list-item">
              <a href="faq.html" class="header__list-links">FAQs</a>
            </li>
            <li class="header__list-item">
              <a href="contact.html" class="header__list-links">Contact us</a>
            </li>
          </ul>
        </nav>
        <div class="header__mobile-humberger">
          <!-- !the cdn link for the  below icon should be imorted and posted at the top of the html. -->
          <i class="bx bx-menu"></i>
        </div>
      </div>
      <nav class="header__mobile-nav">
        <div class="header__mobile-cross">
          <i class="bx bx-x"></i>
        </div>
        <ul class="header__mobile-list">
          <li class="header__mobile-item">
            <a href="about.html" class="header__mobile-links">About Us</a>
          </li>
          <li class="header__mobile-item">
            <a href="book-hike.html" class="header__mobile-links"
              >Book a hike</a
            >
          </li>
          <li class="header__mobile-item">
            <a href="faq.html" class="header__mobile-links">FAQs</a>
          </li>
          <li class="header__mobile-item">
            <a href="contact.html" class="header__mobile-links">Contact us</a>
          </li>
        </ul>
      </nav>
    </header>

    <main class="hike__container">
      <section class="hike__search">
        <div class="hike__search-bar">
          <input class="hike__search-input" type="text" name="search-hike-input" placeholder="Search trails" id="seacrh-input"/>
          <button class="hike__search-btn btn" type="submit">Search</button>
        </div>
      </section>
      <section class="tmpl__container">

      <?php foreach ($hikes as $hike):?>
        <h2><?php echo $hike['hikeName'] ?></h2>
        <div><?php echo $hike['dificulty'] ?></div>
        <div><?php echo $hike['distance'] ?></div>
        <div><?php echo $hike["TIME_FORMAT(duration,'%Hh %i')"] ?></div>
        <div><?php echo $hike['elevationGain'] ?></div>
        <div><?php echo "Created at ".$hike['DATE(creatDate)'] ?></div>
        <div><?php echo "Updated at ".$hike['DATE(modifDate)'] ?></div>
        <div><?php echo "By ".$hike['userNickname'] ?></div>
        <section class="hike__controls">
        <!--!these buttons will have hike__controls-btn class in common and separate class each in thier respective names-->
        <button class="hike__controls-btn btn add" type="button">Add</button>
        <button class="hike__controls-btn btn modify" type="button">Modify</button>
        <button class="hike__controls-btn btn delete" type="button">Delete</button>
      </section>
        
      <?php endforeach ?>
        
      </section>
      
    </main>

    <footer class="footer">
      <section class="footer__container">
        <ul>
          <li class="footer__social-items">
            <a href="#" class="footer__social-link" aria-label="facebook"
              ><i class="bx bxl-facebook"></i
            ></a>
          </li>
          <li class="footer__social-items">
            <a href="#" class="footer__social-link" aria-label="twitter"
              ><i class="bx bxl-twitter"></i
            ></a>
          </li>
          <li class="footer__social-items">
            <a href="#" class="footer__social-link" aria-label="instagram"
              ><i class="bx bxl-instagram"></i
            ></a>
          </li>
          <li class="footer__social-items">
            <a href="#" class="footer__social-link" aria-label="youtube"
              ><i class="bx bxl-youtube"></i
            ></a>
          </li>
        </ul>
      </section>
    </footer>
    <script src="./src/js/index.js"></script>
  </body>
</html>
