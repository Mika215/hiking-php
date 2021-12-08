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