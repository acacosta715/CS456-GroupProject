<?php
    session_start();
    $servername="cs-database.cs.loyola.edu";
    $username="aacosta";
    $password="1696747";
    $dbname="aacosta";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
    }
    $eventName = $_POST["newEvent"];
   
    $startMonth = $_POST["startMonth"];
    $startDay = $_POST["startDay"];
    $startYear = $_POST["startYear"];
    $startTime = $_POST["startTime"];
    
    $endMonth = $_POST["endMonth"];
    $endDay = $_POST["endDay"];
    $endYear = $_POST["endYear"];
    $endTime = $_POST["endTime"];
    $username = $_SESSION["user"];

    $sql = "INSERT INTO aacosta_event values (NULL,'$eventName','$startMonth','$startDay','$startYear','$endMonth','$endDay','$endYear','$start_time','$endTime','$username')";
    if($conn->query($sql) === TRUE) {
    echo "New event successfully created";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    echo "<br><a href='../html/createNewHW.html'>Add new homework</a><br>";
    echo "<a href='../html/CreateNewEvent.html'>Add new event</a><br>";
    echo "<a href='../html/checkCalendar.html'>Check Calendar</a>";
    $conn->close();
?>
