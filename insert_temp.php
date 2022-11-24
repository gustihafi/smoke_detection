<?php

   $temperature = $_POST["temperature"]; // get temperature value from HTTP GET
   $humidity = $_POST["humidity"]; 
   $smoke = $_POST["smoke"]; 
   $id_dorm = $_POST["id"]; 
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "project_ksu";

   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   $sql = "INSERT INTO `temp`(`temp_val`, `hum_val`, `smoke_lvl`, `id_dorm`) VALUES ($temperature,$humidity,$smoke,$id_dorm)";
   //$sql = "INSERT INTO `test`(`id`) VALUES ($id)";

   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . " => " . $conn->error;
   }

   $conn->close();

?>