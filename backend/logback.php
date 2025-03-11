<?php 
    if (isset($_REQUEST["Submit"])) {
        include "config.php";
        session_start();

        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        // $compassword = $_REQUEST["compassword"];


        $sql = "SELECT * FROM users where username='$username' ";

        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                echo 'Password is valid!';
                $_SESSION["id"] = $row['id'];
                $_SESSION["username"] = $row['username'];
        
                header("Location: ../dashbord.php");
                exit();
            } else {
                header("Location: ../index.php?LoginError");
                // echo 'Invalid password.';
            }

        }else {
            header("Location:../index.php?LoginError");
            // echo 'Username does not exist.';
        }
    }
    else {
        header("Location:../index.php");
        // echo 'No data submitted.';
        mysqli_close($conn);
        exit();
    }
   
?>