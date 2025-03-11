<?php
include 'config.php';

if (isset($_REQUEST['submit'])) {

    // Process the checkbox values
    if (!empty($_POST['meal'])) {
        $meals = $_POST['meal'];
        $meal_string = implode(", ", $meals);
    } else {
        $meal_string = "";
    }

    // Debugging: Print the checkbox values
    echo "Selected meals: " . htmlspecialchars($meal_string) . "<br>";

    $uid = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $event_date = $_REQUEST['event_date'];
    $End_date = $_REQUEST['End_date'];
    $location = $_REQUEST['location'];

    $description = $meal_string;

    $sql = "SELECT * FROM events where event_date ='$event_date' and location='$location' ";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        echo "Event already exists";
        header("Location:../AddEvent.php?EAE");
        exit();
    } else {

        $sql = "SELECT * FROM events WHERE id = '$uid'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $sq1 = "UPDATE events set title = '$title', description = '$description', event_date = '$event_date' ,end_date = '$End_date', location = '$location' WHERE id = '$uid' ";
            $result1 = mysqli_query($conn, $sq1);

            if ($result1) {
                echo "Record updated successfully";
                header("Location:../dashbord.php");
                exit();
            } else {
                echo "Error updating record: " . mysqli_error($conn);
                exit();
            }
        }
    }
}
