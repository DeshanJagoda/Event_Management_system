<?php
include 'header.php';
include 'topbutton.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord page</title>
    <link rel="stylesheet" href="css/dashbord.css">
</head>
<style>

</style>

<body>
    <h1>Dashboard</h1>
    <?php
    date_default_timezone_set('Asia/Colombo');
    echo "<h3>" . date('Y-m-d') . "</h3>";
    $currentDate = date('Y-m-d');
    ?>
    <div id="clock" style="  text-align: center; color: blue; font-weight: bold; margin-bottom: 20px; margin-top: 20px; ">
        <?php
        // Get the current time using PHP
        date_default_timezone_set('Asia/Colombo');
        echo "<h3>".date("H:i:s")."<h3>";
        ?>
    </div>
        <div class="container">
            <table>
                <tr>
                    <th>Event Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>location</th>
                    <th>Action</th>
                </tr>
                <!-- Add your events here -->
                <?php
                $sql = "SELECT * FROM events WHERE event_date > '$currentDate' ORDER BY event_date";
                $result = mysqli_query($conn, $sql);
    
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['event_date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['end_date']) . "</td>";
                    echo "<td>". htmlspecialchars($row['location'])."</td>";
                    echo "<td><a href='AddEvent.php?uid=" . urlencode($row['id']) . "'>Update</a> | 
                <a href='backend/deleteEvent.php?did=" . urlencode($row['id']) . "'>Delete</a></td>";
                    echo "</tr>";
                }

                ?>

            </table>


        </div>

        <script>
            function updateClock() {
                const now = new Date();
                let hours = now.getHours();
                let minutes = now.getMinutes();
                let seconds = now.getSeconds();

                // Format the time to include leading zeros
                hours = hours < 10 ? '0' + hours : hours;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                // Format the time
                const formattedTime = `${hours}:${minutes}:${seconds}`;

                // Update the clock display
                document.getElementById('clock').textContent = formattedTime;
            }

            // Call the updateClock function every second
            setInterval(updateClock, 1000);
        </script>

</body>

</html>