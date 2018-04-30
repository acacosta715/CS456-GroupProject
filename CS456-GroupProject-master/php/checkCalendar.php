<?php
  session_start();
  $servername = "cs-database.cs.loyola.edu";
  $username = "aacosta";
  $password = "1696747";
  $dbname = "aacosta";

  $conn= new mysqli($servername, $username, $password, $dbname);
  if($conn->connect_error){
  die("conenction failed: " . $conn->connect_error);
  }

  $userDate = $_POST['userDate'];
  $dates = explode("/",$userDate);
  $month = $dates[0];
  $day = $dates[1];
  $year = $dates[2];
  $username = $_SESSION['user'];

  echo "<table border=1>";
  echo "<tr>";
  echo '<th>Homework</th>';
  echo '<th>Class</th>';
  echo '<th>Start Month</th>';
  echo '<th>Start Day</th>';
  echo '<th>Start Year</th>';
  echo '<th>Start Time</th>';
  echo '<th>End Month</th>';
  echo '<th>End Day</th>';
  echo '<th>End Year</th>';
  echo '<th>End Time</th>';
  echo '</tr>';

  $sql = "SELECT * FROM aacosta_homework where (username = '$username' AND (assigned_month = '$month' AND assigned_day = '$day' AND assigned_year ='$year'))";

  $result = $conn->query($sql);
  if($result->num_rows > 0)
  {
    while($row=$result->fetch_assoc())
    {
       echo '<tr><td>'. $row['hw_name'] . '</td><td>' . $row['class'] . '</td>' . '<td align="right">' . $row['assigned_month'] . '</td><td align="right">' . $row['assigned_day'] . '</td><td align="right">' . $row['assigned_year'] . '</td><td align="right">' . $row['start_time'] . '</td><td align="right">' . $row['due_month'] . '</td><td align="right">' . $row['due_day'] . '</td><td align="right">' . $row['due_year'] . '</td><td align="right">'. $row['end_time'] . '</td></tr>';
    }
  }
  else
  {
    echo "You have no assignments on " . $userDate .".";
  }
  echo '</table>';

  echo "<br>";
  echo "<table border=1>";
  echo "<tr>";
  echo '<th>Event</th>';
  echo '<th>Start Month</th>';
  echo '<th>Start Day</th>';
  echo '<th>Start Year</th>';
  echo '<th>Start Time</th>';
  echo '<th>End Month</th>';
  echo '<th>End Day</th>';
  echo '<th>End Year</th>';
  echo '<th>End Time</th>';
  echo '</tr>';

  $sql = "SELECT * FROM aacosta_event where (username = '$username' AND (event_month = '$month' AND event_day = '$day' AND event_year ='$year'))";

  $result = $conn->query($sql);
  if($result->num_rows > 0)
  {
    while($row=$result->fetch_assoc())
    {
       echo '<tr><td>'. $row['event_name'] . '</td><td align="right">' . $row['event_month'] . '</td><td align="right">' . $row['event_day'] . '</td><td align="right">' . $row['event_year'] . '</td><td align="right">' . $row['start_time'] . '</td><td align="right">' . $row['end_month'] . '</td><td align="right">' . $row['end_day'] . '</td><td align="right">' . $row['end_year'] . '</td><td align="right">'. $row['end_time'] . '</td></tr>';
    }
  }
  else
  {
    echo "You have no events on ".$userDate.".";
  }
  echo "</table>";
  echo "<a href='../html/checkCalendar.html'>Check another date</a>";
?>
