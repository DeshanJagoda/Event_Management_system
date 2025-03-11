<?php
include 'header.php';
include 'topbutton.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Events</title>
    <link rel="stylesheet" href="css/AllEvent.css">
    <style>
      
    </style>
</head>
  
    
<body>
    <h1>All Events</h1>

    <div class="selectdate">
        <form action="" method="post">
            <label for="selectDate">Select Date:</label>
            <input type="date" id="selectDate" name="selectDate" value="<?php echo date('Y-m-d'); ?>">
            <input type="submit" name="submit" value="Filter">
            <!-- <input type="reset" name="reset" value="Reset"> -->
            <a href="AllEvent.php"><button>Reset</button></a>
        </form>
    </div>

    <div class="container">

        <?php

            if(isset($_REQUEST['submit'])){
                $selecttDate = $_REQUEST['selectDate'];
                
                $sql = "SELECT * FROM events where event_date = '$selecttDate' or end_date = '$selecttDate' ";
                $result = mysqli_query($conn, $sql);
        
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='allEvent'>";
                    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
                    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                    echo "<p><b>Date:</b> " . htmlspecialchars($row['event_date']) . " - " . htmlspecialchars($row['end_date']) . "</p>";
                    echo "<p><b>Location:</b> " . htmlspecialchars($row['location']) . "</p>";
                    echo "<p><b>Bookign Date:</b> " . htmlspecialchars($row['created_at']) . "</p>";
                    echo "<td><button class='ButnUp'><a href='AddEvent.php?uid=" . urlencode($row['id']) . "'>Update</a></button> 
                   <button class='ButnDE'> <a href='backend/deleteEvent.php?did=" . urlencode($row['id']) . "'>Delete</a></button></td>";
                    echo "</div>";
                }
                
            }else{
                $sql = "SELECT * FROM events ORDER BY event_date DESC";
                $result = mysqli_query($conn, $sql);
        
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='allEvent'>";
                    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
                    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                    echo "<p><b>Date:</b> " . htmlspecialchars($row['event_date']) . " - " . htmlspecialchars($row['end_date']) . "</p>";
                    echo "<p><b>Location:</b> " . htmlspecialchars($row['location']) . "</p>";
                    echo "<p><b>Bookign Date:</b> " . htmlspecialchars($row['created_at']) . "</p>";
                    echo "<td><button class='ButnUp'><a href='AddEvent.php?uid=" . urlencode($row['id']) . "'>Update</a></button> 
                   <button class='ButnDE'> <a href='backend/deleteEvent.php?did=" . urlencode($row['id']) . "'>Delete</a></button></td>";
                    echo "</div>";
                }

            }

        ?>
    </div>

</select>
</body>

</html>
