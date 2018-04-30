<?php
//      echo $_POST['username'];
//      echo $_POST['pass'];
        session_start();
	$servername="cs-database.cs.loyola.edu";
        $username="aacosta";
        $password="1696747";
        $dbname="aacosta";


        $conn= new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
        }

        $plainUsername=$_POST['username'];
	$_SESSION['user'] = $plainUsername;
        $plainPassword=$_POST['password'];

        $encryptedPassword;

        $sql="SELECT * FROM aacosta_user WHERE username='$plainUsername' ";

        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
        $encryptedPassword=$row["encryptedPassword"];
//        echo $row["username"];

        }

//      echo $encryptedPassword;
        if( password_verify( $plainPassword, $encryptedPassword ))
        {
                echo "Welcome ".$plainUsername."!\n";
		echo "<br><a href='../html/createNewHW.html'>Add Homework</a>";
		echo "<br><a href='../html/CreateNewEvent.html'>Add Event</a>";
		echo "<br><a href='../html/checkCalendar.html'>Check Calendar</a>";
        }
        else
        {
                echo "Wrong Password\n";
		echo "<a href='../html/login.html'>BACK TO LOGIN</a>";
        }



        $conn->close();

?>
