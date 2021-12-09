<?php
   require_once('dbconnection.php');

   if (isset($_POST["addhike"])){

        $varParam=[$_POST['hikeName'],$_POST['dificulty'],$_POST['distance'],$_POST['hour'],$_POST['minute'],$_POST['elevationGain'],$_POST['userNickname']];
        $duration =$varParam[3].':'.$varParam[4];

        $reqInsert_hike = $db->prepare("INSERT INTO hikes(hikeName,dificulty,distance,duration,elevationGain,userNickname)
        values(:hikeName, :dificulty, :distance, :duration, :elevationGain, :userNickname)");

        $reqInsert_hike->bindParam(":hikeName",  $varParam[0]);
        $reqInsert_hike->bindParam(":dificulty", $varParam[1]);
        $reqInsert_hike->bindParam(":distance", $varParam[2]);
        $reqInsert_hike->bindParam(":duration", $duration);
        $reqInsert_hike->bindParam(":elevationGain", $varParam[5]);
        $reqInsert_hike->bindParam(":userNickname", $varParam[6]);

        $reqInsert_hike->execute();
        // redirect to index when done
        header("location: /index.php");

   }

?>
<h1>Add a new trail</h1>

<form method="post" action="">
    <div>
        <label for="hikeName">Trail name *</label></br>
        <input type="text" name="hikeName">
    </div>

    <div>
        <label for="dificulty">Difficulty *</label></br>
        <input type="text" name="dificulty" list="dificultyTypes" id="dificulty">
        <datalist id="dificultyTypes">
            <option value="Easy">
            <option value="Medium">
            <option value="Difficult">
            <option value="Very difficult">
        </datalist>
    </div>

    <div>
        <label for="distance">Distance *</label></br>
        <input type="number" name="distance">
        <span>Km</span>
    </div>
    <div>
        <label for="hour">Duration</label></br>
        <span>H</span>
        <input type="number" name="hour" placeholder='Hour(s)'>
        <span>min</span>
        <input type="number" name="minute" placeholder='minute(s)'>
    </div>
    <div>
        <label for="elevationGain">Elevation gain</label></br>
        <input type="number" name="elevationGain">
        <span>m</span>
    </div>
    <div>
        <label for="userNickname">User</label></br>
        <input type="text" name="userNickname">
    </div>
    <button type="submit" name="addhike">Confirm</button>
    <button type="submit" name="cancel">Cancel</button>
</form>