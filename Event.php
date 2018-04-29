
<?php
    $servername="cs-database.cs.loyola.edu";
    $username="aacosta";
    $password="1696747";
    $dbname="aacosta";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
    }
    $asnName = $_POST["newEvent"];
   
    $startMonth = $_POST["startMonth"];
    $startDay = $_POST["startDay"];
    $startYear = $_POST["startYear"];
    $startTime = $_POST["startTime"];
    
    $endMonth = $_POST["endMonth"];
    $endDay = $_POST["endDay"];
    $endYear = $_POST["endYear"];
    $endTime = $_POST["endTime"];
    $sql = "INSERT INTO aacosta_event values ('$asnName','$startMonth','$startDay','$startYear','$endMonth','$endDay','$endYear','$start_time','$endTime')";
    if($conn->query($sql) === TRUE) {
    echo "New event successfully created";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
