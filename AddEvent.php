<?php
include 'header.php';
include 'topbutton.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD Events</title>
    <link rel="stylesheet" href="css/AddEvent.css">
    <style>



    </style>
</head>

<body>
    <div class="formContaner">

        <?php
        if (isset($_REQUEST["EAE"])) {
            echo "<p id='error' style='color: red; font-weight: bold;'>" . "Event already exists" . "</p>";
        }
        ?>

        <?php
        if (isset($_REQUEST['uid'])) {
            $uid = $_REQUEST['uid'];

            $sql = "SELECT * FROM events where id = '$uid'";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            if ($result->num_rows > 0) {
                $selectedMeals = explode(", ", $row['description']);

                echo  "<h1>Update Events</h1>
                    <div class='left'>
                      <form action='backend/UpdateEvent.php' method='post'>
                      <input type='hidden' id='id' name='id' value='" . $row['id'] . "'> <br><br>
                      <label for='title'>Title:</label>
                      <input type='text' id='title' name='title' required value='" . $row['title'] . "'> <br><br>
                      <label for='event_date'>Start Date:</label>
                      <input type='date' id='event_date' name='event_date' required value='" . $row['event_date'] . "'> <br><br>
                      <label for='End_date'>End Date:</label>
                      <input type='date' id='End_date' name='End_date' required value='" . $row['end_date'] . "'> <br><br>
                      <label for='location'>Location:</label>

                    <select id='location' name='location'>
                        <option hidden>Choose : " . $row['location'] . "</option>
                        <optgroup label='Full Book'>
                            <option value='Villa 1' " . ($row['location'] == 'Villa 1' ? 'selected' : '') . ">Villa 1</option>
                            <option value='Villa 2' " . ($row['location'] == 'Villa 2' ? 'selected' : '') . ">Villa 2</option>
                        </optgroup>
                        <optgroup label='Villa 2 Room Book'>
                            <option value='Villa 2 Room 1' " . ($row['location'] == 'Villa 2 Room 1' ? 'selected' : '') . ">Villa 2 Room 1</option>
                            <option value='Villa 2 Room 2' " . ($row['location'] == 'Villa 2 Room 2' ? 'selected' : '') . ">Villa 2 Room 2</option>
                            <option value='Villa 2 Room 3' " . ($row['location'] == 'Villa 2 Room 3' ? 'selected' : '') . ">Villa 2 Room 3</option>
                        </optgroup>
                    </select> <br><br>
                    </div>    
                    <div class='right'>

                        <label for='description'>Description:</label><br><br>
    
                        <input type='checkbox' name='meal[]' id='morningTea' value='Morning Tea' " . (in_array('Morning Tea', $selectedMeals) ? 'checked' : '') . ">
                        <label for='morningTea'>Morning Tea</label><br><br>

                        <input type='checkbox' name='meal[]' id='breakfast' value='Breakfast' " . (in_array('Breakfast', $selectedMeals) ? 'checked' : '') . ">
                        <label for='breakfast'>Breakfast</label><br><br>

                        <input type='checkbox' name='meal[]' id='afternoonTea' value='Afternoon Tea' " . (in_array('Afternoon Tea', $selectedMeals) ? 'checked' : '') . ">
                        <label for='afternoonTea'>Afternoon Tea</label><br><br> 

                         <input type='checkbox' name='meal[]' id='lunch' value='Lunch' " . (in_array('Lunch', $selectedMeals) ? 'checked' : '') . ">
                         <label for='lunch'>Lunch</label><br><br>

                        <input type='checkbox' name='meal[]' id='eveningTea' value='Evening Tea' " . (in_array('Evening Tea', $selectedMeals) ? 'checked' : '') . ">
                        <label for='eveningTea'>Evening Tea</label><br><br>

                        <input type='checkbox' name='meal[]' id='dinner' value='Dinner' " . (in_array('Dinner', $selectedMeals) ? 'checked' : '') . ">
                        <label for='dinner'>Dinner</label><br><br>
                    </div>
                      <input type='submit' name='submit' value='Update Event'> <br><br>
                      <input type='reset' name='reset' value='Reset'> <br><br>
                      </form> ";
            }
        } else {
            echo '<h1>Add Events</h1>
             <div class="left">
             <form action="backend/AddEventback.php" method="post">
             <label for="title">Title:</label>
             <input type="text" id="title" name="title" required> <br><br>
             <label for="event_date">Start Date:</label>
             <input type="date" id="event_date" name="event_date" required> <br><br>
             <label for="End_date">End Date:</label>
             <input type="date" id="End_date" name="End_date" required> <br><br>
             <label for="location">Location:</label>
             <select id="location" name="location">
                <option value="" hidden>Choose :</option>
                <optgroup label="Full Book">
                    <option value="Villa 1">Villa 1</option>
                    <option value="Villa 2">Villa 2</option>
                </optgroup>
                <optgroup label="Villa 2 Room Book">
                    <option value="Villa 2 Room 1">Villa 2 Room 1</option>
                    <option value="Villa 2 Room 2">Villa 2 Room 2</option>
                    <option value="Villa 2 Room 3">Villa 2 Room 3</option>
                </optgroup>
             </select> <br><br>
            </div>
            <div class="right">
             <label for="description">Description:</label> <br><br>
             
                <input type="checkbox" name="meal[]" id="morningTea" value="Morning Tea">
                <label for="morningTea">Morning Tea</label><br><br>

                <input type="checkbox" name="meal[]" id="breakfast" value="Breakfast">
                <label for="breakfast">Breakfast</label><br><br>

                <input type="checkbox" name="meal[]" id="afternoonTea" value="Afternoon Tea">
                <label for="afternoonTea">Afternoon Tea</label><br><br> 

                <input type="checkbox" name="meal[]" id="lunch" value="Lunch">
                <label for="lunch">Lunch</label><br><br>

                <input type="checkbox" name="meal[]" id="eveningTea" value="Evening Tea">
                <label for="eveningTea">Evening Tea</label><br><br>

                <input type="checkbox" name="meal[]" id="dinner" value="Dinner">
                <label for="dinner">Dinner</label><br><br>
            </div>
             <input type="submit" name="submit" value="Add Event"> <br><br>
             <input type="reset" name="reset" value="Reset"> <br><br>
            </form>';
        }

        ?>

    </div>

</body>'

</html>