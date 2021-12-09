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

<?php
  function action(){echo 'Action!!';}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <a href="index.php">
          <img class="header__logo" src="./assets/logo_hiking1.png" alt="hiking-logo" width="150"  height="240" />
        </a>

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
              <a href="#"  class="header__list-links">FAQs</a>
            </li>
            <li class="header__list-item">
              <a href="#"  class="header__list-links">Contact us</a>
            </li>
          </ul>
        </nav>
        <div class="header__mobile-humberger">
          <i class="bx bx-menu"></i>
        </div>
      </div>
      <nav class="header__mobile-nav">
        <div class="header__mobile-cross">
          <i class="bx bx-x"></i>
        </div>
        <ul class="header__mobile-list">
          <li class="header__mobile-item">
            <a href="#"  class="header__mobile-links">About Us</a>
          </li>
          <li class="header__mobile-item">
            <a href="#"  class="header__mobile-links"
              >Book a hike</a
            >
          </li>
          <li class="header__mobile-item">
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
      
      <?php foreach ($hikes as $hike):?>

        <h3><?php echo $hike['hikeName'] ?></h3>

        <div class="hike__tmpl-detailes">
          <div class="hike__tmpl-subdetailes">
            <p><?php echo $hike['dificulty'] ?></p>
            <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQRJREFUSEvdlN0RAUEQhL+LgAwQATIgAiUDQhABMpABMpABIZABGRAB1Wr36mrvZ2v37jyY19mZnp7u2YSWI2m5Py5AFzgDo0jgO7AELrbeBTgBs8jmtkwggyKADbAGXsAEuEYAvU1NOniWgU1uAYHFRCWAZfAExoCohkYlgJo1ocED6JeJLBfJAcPQ0c17NV9UucjXN7cCX0HoodUGkD332R36JnTysvYUkFG+4TKQc3qBTd3nMsq8DCB4BZnu+l5kkA6Q3pLLoA6AsOwtpdtpEkAM9FHK6itgV6SBxBHFOnE0t1Aoslx0qCH0zXyUpS7yTR6s0c8P7f8Z+Bjm8qEaBAN8AK4gLRn2hHwTAAAAAElFTkSuQmCC"/></i>
          </div>
          <div class="hike__tmpl-subdetailes">
            <p><?php echo $hike['distance'].'Km' ?></p>
            <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAIJJREFUSEvtlEsOgDAIRKc305vryTQam1jSkoGAcdHuSApv+BYkv5IcHz3A8UBD4BrAk9wGYH07RgOu2E1MpkSyZCO7Cv8PQCpiM6EzSAdUJazy2QOwpTI32brRqYAdwMKeivRjNwF3K5hrap2i5r8E1Fnvrr2H9DnAI1L1CRlFjXACiUguGXB+n58AAAAASUVORK5CYII="/></i>
          </div>
          <div class="hike__tmpl-subdetailes">
            <p><?php echo $hike["TIME_FORMAT(duration,'%Hh %i')"] ?></p>
            <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAATVJREFUSEu1leFRAjEQhb+rwBKQCoQKHCtQKpAOkErACoAKlA4oQTuADugA5jmEWXIh2SCXmfuXvO9lN/uuoePVdKyPBzAGnoHB6ZOnn9P3DaxzJnOAN2AGPBZuuQWmgGCtdQ0wByaV5dMZgS5WCnCLeBD9BD4sIQaoLF8Z52H/IbNnZMsVA1TP3j8B0ugHDQvQa1kU6u65gSTOt7CAJfB+J8AKkOGLOdDbfroTQFrDGJBrXFzSPfDgMWNL5AHIldxpqjcFyJ+2BXhKJOcvDshviJXaJsuUB5JscmnIbMktRBn0GvUj+Uy1pzRoMUR9kDG7djYga6PCk3/ZqJBAp2EXHN4CaSVp/Ezj66u2AuXCT2dUc0V01Q/HwgTSp+EKUaJ3rrmRaFI4laaeBlbv8fz0q0XtgSM5RD8Z+f3jkQAAAABJRU5ErkJggg=="/></i>
          </div>
          <div class="hike__tmpl-subdetailes">
            <p><?php echo $hike['elevationGain'].'m' ?></p>
            </div>
          <div class="hike__tmpl-subdetailes">
            <p><?php echo "Created at ".$hike['DATE(creatDate)'] ?></p>
           </div>
          <div class="hike__tmpl-subdetailes">
            <p><?php echo "Updated at ".$hike['DATE(modifDate)'] ?></p>
            </div>
          <div class="hike__tmpl-subdetailes">
            <p><?php echo "By ".$hike['userNickname'] ?></p>
            <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAUtJREFUSEvVlEEyBDEYhb85ARu2OAFOgBOYG+AEWFliaccJOAInGDfADdiy4QTUV5V/qvWkOynTs5CqVDqd9Hsv/3udEQtuowXjMy/BEXCVRJ4Bt23B8xK8AysJ9ANY/XcEg5XoGtgBPoFH4Bl4AV5LIanx4DBnXgKWbK+PpIZAlWvAZVJ+AWw2QH3vu2wrEYT6N2A99SdguYU2Tmu7adyO9RLBHXAAaKbP98B+A/yhNY+ljfCnROAHqrLWjpMWuMoNwFYCdJ99an4NQWCGF86/GqC9Qaol0MTzBpJxVXkxrjUEmhvGqnwpI1my09xRagjCWA2NtFhzu744SmpyPNGvViIIY/tqrvpj4AY4KRF8dzjW9zN5AktoCIxn7wlyBFllLZxI2EyZSiUq3WWx3lmmoQiiTBGEqbChCAQ0zjPX95AEf7pNaz3o3PcDPHBEGTDOeqYAAAAASUVORK5CYII="/></i>
          </div>
          
        </div>

        <form action = "/php/addhike.php" method="post" class="hike__controls">
          <!--!these buttons will have hike__controls-btn class in common and separate class each in thier respective names-->
          <button class="hike__controls-btn btn add" type="submit">Add</button>
          <button class="hike__controls-btn btn modify" type="button">Modify</button>
          <button class="hike__controls-btn btn delete" type="button">Delete</button>
        </form>
        
      <?php endforeach ?>

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
    <script src="./js/index.js"></script>
  </body>
</html>
