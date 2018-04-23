<?php
//      echo $_POST['username'];
//      echo $_POST['pass'];
        $servername="cs-database.cs.loyola.edu";
        $username="aacosta";
        $password="1696747";
        $dbname="aacosta";


        $conn= new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
        die("connection failed: " . $$conn->connect_error);
        }

        $plainUsername=$_POST['username'];
        $plainPassword=$_POST['pass'];

        $encryptedPassword;

        $sql="SELECT * FROM gp_user WHERE username='$plainUsername' ";

        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
        $encryptedPassword=$row["encryptedPassword"];
//        echo $row["username"];

        }

//      echo $encryptedPassword;
        if( password_verify( $plainPassword, $encryptedPassword ))
        {
                echo "Password verified";
        }
        else
        {
                echo "Wrong Password";
        }



        $conn->close();

?>
