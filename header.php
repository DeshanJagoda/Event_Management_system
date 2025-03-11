<?php
include 'backend/config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    
<div class="navi">
        <a href="dashbord.php">Dashboard</a>
        <a href="AddEvent.php">Add Event</a>
        <a href="AllEvent.php">All Evenys</a>
        <a href="#">Events Calendar</a>
        <a href="backend/logout.php" style="float:right;">Logout</a>
        <a href="profile.php" style="float:right;"><?php echo  $_SESSION["username"]; ?></a>
    </div>

</body>
</html>