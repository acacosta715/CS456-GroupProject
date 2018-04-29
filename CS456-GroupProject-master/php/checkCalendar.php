<?php
  $host = "cs-database.loyola.edu";
  $user = "aacosta";
  $pass = "1696747";
  $dbname = "aacosta";

  4conn= new mysqli($host, $user, $pass, $dbname);
  if($ocnn->connect_error){
  die("conenction failed: " . $conn->connect_error);
  }

?>
