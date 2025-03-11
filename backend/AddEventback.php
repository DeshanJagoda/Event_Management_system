<?php
include "config.php";
if ($_REQUEST["submit"]) {
    
        // Process the checkbox values
        if (!empty($_POST['meal'])) {
            $meals = $_POST['meal'];
            $meal_string = implode(", ", $meals);
        } else {
            $meal_string = "";
        }
    
        // Debugging: Print the checkbox values
        echo "Selected meals: " . htmlspecialchars($meal_string) . "<br>";

    $title =$_REQUEST['title'];
    $event_date = $_REQUEST['event_date'];
    $End_date = $_REQUEST['End_date'];
    $location = $_REQUEST['location'];

    $description = $meal_string;

//    SQL statement with named placeholders
    $sql = "SELECT * FROM events where ((event_date ='$event_date' or end_date ='$End_date') and location='$location') or location='Villa 2'  ";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();   
    if ($result->num_rows > 0) {
        echo "Event already exists";
        header("Location:../AddEvent.php?EAE");
        exit(); 
   
    }else{

        $sql1 = "INSERT INTO events (title, description, event_date,end_date, location) 
        VALUES ('$title', '$description','$event_date','$End_date','$location ')";

        $result = mysqli_query($conn, $sql1);
        if ($result) {
            echo "New record created successfully";
            header("Location: ../dashbord.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }
}
?>
