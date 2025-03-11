<?php
include "config.php";

if (isset($_REQUEST["Submit"])) {

    $username = $_REQUEST["username"];
    // $password = $_REQUEST["password"]
    $compassword = $_REQUEST["compassword"];
    $hashed_password = password_hash($compassword, PASSWORD_DEFAULT);
    // echo $hashed_password;

    $sql = "SELECT * FROM users where username='$username' ";

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        echo "Error: Duplicate entry. Please choose a different username.";
        header("Location:../register.php?RegisterError");
        exit();
    } else {

        $sql2 = "INSERT INTO users (username,password) VALUES ('$username','$hashed_password')";

        $result1 = mysqli_query($conn, $sql2);
        if ($result1) {
            echo "New record created successfully";
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
