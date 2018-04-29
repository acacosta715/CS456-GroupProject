<?php


        $servername="cs-database.cs.loyola.edu";
        $username="aacosta";
        $password="1696747";
        $dbname="aacosta";


        $conn= new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
        }

        $plainUsername=$_POST['username'];
        $plainPassword=$_POST['opassword'];
        $plainNewPassword=$_POST['npassword'];

        $encryptedPassword;

        $sql="SELECT * FROM aacosta_user WHERE username='$plainUsername'  ";

        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
        $encryptedPassword=$row["encryptedPassword"];
        }

        //echo $encryptedPassword;
        if( password_verify( $plainPassword, $encryptedPassword ))
        {
                echo "Password verified";
                $options=['cost'=>12];

                $nencryptedPassword = password_hash( $plainNewPassword, PASSWORD_BCRYPT, $options );

                //echo $nencryptedPassword;

                $sql = "UPDATE ***update for project*** SET encryptedPassword='$nencryptedPassword' WHERE username='$plainUsername' ";

                if ($conn->query($sql) === TRUE) {
                        echo "Record updated successfully";
                } else {
                echo "Error updating record: " . $conn->error;
        }
        }
        else
        {
                echo "Wrong Password";
        }

        $conn->close();
?>
