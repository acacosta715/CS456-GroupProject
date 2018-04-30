<?php
  $host = "cs-database.loyola.edu";
  $user = "aacosta";
  $pass = "1696747";
  $dbname = "aacosta";

  $conn= new mysqli($host, $user, $pass, $dbname);
  if($conn->connect_error){
  die("conenction failed: " . $conn->connect_error);
  }

  print_r($_SESSION);

?>
