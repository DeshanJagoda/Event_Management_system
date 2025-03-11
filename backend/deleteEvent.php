<?php 
    include 'config.php';
    if (isset($_REQUEST['did'])){
        $did = $_REQUEST['did'];

        $sql = "DELETE FROM events WHERE id = $did";
        $result = mysqli_query($conn, $sql);
        header('Location: ../dashbord.php');
    }
?>