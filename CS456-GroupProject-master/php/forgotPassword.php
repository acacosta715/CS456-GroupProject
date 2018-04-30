<?php
        $servername="cs-database.cs.loyola.edu";
        $username="aacosta";
        $password="1696747";
        $dbname="aacosta";


        $conn= new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
	}

	$username = $_POST['user'];
	$newPass = $_POST['newPassword'];
	$confirm = $_POST['confirmNewPassword'];

	$encryptedPassword;

	$sql = "SELECT * FROM aacosta_user WHERE username='$username' ";
	$result=$conn->query($sql);
	if(($row=$result->fetch_assoc()) == false)
	{
	  echo "No user found.\n";
	  echo "<a href='../html/ForgotPassword.html'>Back</a>";
	}
	else
	{
	  $options=['cost'->12];
	  $encryptedPassword = password_hash($newPass, PASSWORD_BCRYPT, $options );
	  $sql2 = "UPDATE aacosta_user SET encryptedPassword='$encryptedPassword' WHERE username='$username' ";
	  if($conn->query($sql) === TRUE)
	  {
	    echo "Successfully updated your password!\n";
	  }
	  else
	  {
	    echo "Error updating record; " . $conn->error;
	  }
	  echo "<a href='../html/login.html'>back to login </a>";
	}
?>
