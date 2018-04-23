<html>
<head><title>Sign-up answer</title><head>
<?php
        $enteredUsername=$_POST['username'];
        $plainPassword=$_POST['password'];
        $other="other";

        $options=['cost'=>12];

        $encryptedPassword = password_hash( $plainPassword, PASSWORD_BCRYPT, $options );


        $servername= 'cs-database.cs.loyola.edu';
        $username= 'aacosta';
        $password= '1696747';
        $dbname= 'aacosta';


        $conn= new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
        die("connection failed: " . $$conn->connect_error);
        }

        $sql= "INSERT INTO aacosta_user (username,encryptedPassword) VALUES ('$enteredUsername','$encryptedPassword')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

?>

<html>
