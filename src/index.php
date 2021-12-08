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

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/style/index.css">
    <link rel="stylesheet" href="./scss/style.min.css">
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
        <a href="index.php">
          <img
            class="header__logo"
            src="./assets/logo_hiking1.png"
            alt="hiking-logo"
            width="150"
            height="240"
          />
        </a>
        <a href=""
        <!-- <a href=""
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
        /></a> -->
        <nav class="header__nav">
          <ul class="header__list">
            <li class="header__list-item">
              <a href="#"  class="header__list-links">About Us</a>
            </li>
            <li class="header__list-item">
              <a href="#" class="header__list-links"
                >Book a hike</a
              >
            </li>
            <li class="header__list-item">
              <a href="faq.html" class="header__list-links">FAQs</a>
            </li>
            <li class="header__list-item">
              <a href="contact.html" class="header__list-links">Contact us</a>
              <a href="#"  class="header__list-links">FAQs</a>
            </li>
            <li class="header__list-item">
              <a href="#"  class="header__list-links">Contact us</a>
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
            <a href="#"  class="header__mobile-links">About Us</a>
          </li>
          <li class="header__mobile-item">
            <a href="#"  class="header__mobile-links"
              >Book a hike</a
            >
          </li>
          <li class="header__mobile-item">
            <a href="faq.html" class="header__mobile-links">FAQs</a>
          </li>
          <li class="header__mobile-item">
            <a href="contact.html" class="header__mobile-links">Contact us</a>
            <a href="#"  class="header__mobile-links">FAQs</a>
          </li>
          <li class="header__mobile-item">
            <a href="#"  class="header__mobile-links">Contact us</a>
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
    <main class="hike__container">
      <section class="hike__search">
        <div class="hike__search-bar">
          <input
            class="hike__search-input"
            type="text"
            name="search-hike-input"
            placeholder="Search trails"
            id="seacrh-input"
          />
          <button class="hike__search-btn" id="searchBtn" type="submit">Search</button>
        </div>
      </section>
      <section class="hike__tmpl">
      <!-- <?php

      echo "place holder foreach(hike as hikes ) will be used here to list all the hikes ! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod fugit illum facere aliquid asperiores assumenda cumque enim repellendus unde officia, labore, ipsum, illo libero quos? Obcaecati consectetur veritatis velit nam quam amet repellendus corporis similique recusandae dolore accusamus quibusdam, odio eveniet totam assumenda consequuntur optio accusantium a! Non, numquam inventore.";
      
?> -->
<h3>Hike name</h3>
<div class="hike__tmpl-detailes">
  <div class="hike__tmpl-subdetailes">
    <p>117m</p>
    <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAUtJREFUSEvVlEEyBDEYhb85ARu2OAFOgBOYG+AEWFliaccJOAInGDfADdiy4QTUV5V/qvWkOynTs5CqVDqd9Hsv/3udEQtuowXjMy/BEXCVRJ4Bt23B8xK8AysJ9ANY/XcEg5XoGtgBPoFH4Bl4AV5LIanx4DBnXgKWbK+PpIZAlWvAZVJ+AWw2QH3vu2wrEYT6N2A99SdguYU2Tmu7adyO9RLBHXAAaKbP98B+A/yhNY+ljfCnROAHqrLWjpMWuMoNwFYCdJ99an4NQWCGF86/GqC9Qaol0MTzBpJxVXkxrjUEmhvGqnwpI1my09xRagjCWA2NtFhzu744SmpyPNGvViIIY/tqrvpj4AY4KRF8dzjW9zN5AktoCIxn7wlyBFllLZxI2EyZSiUq3WWx3lmmoQiiTBGEqbChCAQ0zjPX95AEf7pNaz3o3PcDPHBEGTDOeqYAAAAASUVORK5CYII="/></i>
  </div>
  
  <div class="hike__tmpl-subdetailes">
    <p>2h45</p>
    <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAATVJREFUSEu1leFRAjEQhb+rwBKQCoQKHCtQKpAOkErACoAKlA4oQTuADugA5jmEWXIh2SCXmfuXvO9lN/uuoePVdKyPBzAGnoHB6ZOnn9P3DaxzJnOAN2AGPBZuuQWmgGCtdQ0wByaV5dMZgS5WCnCLeBD9BD4sIQaoLF8Z52H/IbNnZMsVA1TP3j8B0ugHDQvQa1kU6u65gSTOt7CAJfB+J8AKkOGLOdDbfroTQFrDGJBrXFzSPfDgMWNL5AHIldxpqjcFyJ+2BXhKJOcvDshviJXaJsuUB5JscmnIbMktRBn0GvUj+Uy1pzRoMUR9kDG7djYga6PCk3/ZqJBAp2EXHN4CaSVp/Ezj66u2AuXCT2dUc0V01Q/HwgTSp+EKUaJ3rrmRaFI4laaeBlbv8fz0q0XtgSM5RD8Z+f3jkQAAAABJRU5ErkJggg=="/></i>
  </div>
  <div class="hike__tmpl-subdetailes">
    <p>Medium</p>
    <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQRJREFUSEvdlN0RAUEQhL+LgAwQATIgAiUDQhABMpABMpABIZABGRAB1Wr36mrvZ2v37jyY19mZnp7u2YSWI2m5Py5AFzgDo0jgO7AELrbeBTgBs8jmtkwggyKADbAGXsAEuEYAvU1NOniWgU1uAYHFRCWAZfAExoCohkYlgJo1ocED6JeJLBfJAcPQ0c17NV9UucjXN7cCX0HoodUGkD332R36JnTysvYUkFG+4TKQc3qBTd3nMsq8DCB4BZnu+l5kkA6Q3pLLoA6AsOwtpdtpEkAM9FHK6itgV6SBxBHFOnE0t1Aoslx0qCH0zXyUpS7yTR6s0c8P7f8Z+Bjm8qEaBAN8AK4gLRn2hHwTAAAAAElFTkSuQmCC"/></i>
  </div>
  <div class="hike__tmpl-subdetailes">
    <p>24.6km</p>
    <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAIJJREFUSEvtlEsOgDAIRKc305vryTQam1jSkoGAcdHuSApv+BYkv5IcHz3A8UBD4BrAk9wGYH07RgOu2E1MpkSyZCO7Cv8PQCpiM6EzSAdUJazy2QOwpTI32brRqYAdwMKeivRjNwF3K5hrap2i5r8E1Fnvrr2H9DnAI1L1CRlFjXACiUguGXB+n58AAAAASUVORK5CYII="/></i>
  </div>
</div>
      </section>
      <section class="hike__controls">
        <!--!these buttons will have hike__controls-btn class in common and separate class each in thier respective names-->
        <button class="hike__controls-btn add" type="button">Add</button>
        <button class="hike__controls-btn modify" type="button">Modify</button>
        <button class="hike__controls-btn delete" type="button">Delete</button>
      </section>
    </main>
    <footer class="footer">
      <section>
        <ul class="footer__container">
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
    <script src="./js/index.js"></script>
  </body>
</html>
