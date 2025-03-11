<?php
include 'backend/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="css/login&Register.css">
</head>

<body>
    <h1>Login Page</h1>
    <div class="div1">
        <form action="backend/logback.php" method="post" enctype="multipart/form-data" onsubmit="return validations()" name="myform">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>

            <?php
            if (isset($_REQUEST["LoginError"])) {
                echo "<p id='error' style='color: red; font-weight: bold;'>" . "Invalid password or Username" . "</p>";
            }
            ?>
            <?php
            if (isset($_REQUEST["LoginError1"])) {
                echo "<p id='error' style='color: red; font-weight: bold;'>" . "Username does not exist" . "</p>";
            }
            ?>

            <p id="error" style="color: red; font-weight: bold;"></p>

            <a href="register.php">Are you register now</a> <br><br>

            <input type="submit" name="Submit" value="Login">
        </form>
    </div>


    <script>
        function validations() {
            error = document.getElementById('error');

            if (document.myform.username.value == '') {
                error.innerHTML = "Please enter your UserName";
                document.myform.username.focus();
                return false;
            }
            if (document.myform.password.value == '') {
                error.innerHTML = "Please enter your Password";
                document.myform.password.focus();
                return false;
            }
            return true;
        }
    </script>
</body>

</html>