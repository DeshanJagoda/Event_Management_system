<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link rel="stylesheet" href="css/login&Register.css">
</head>

<body>

    <h1>Register Page</h1>
    <div class="div1">
        <form action="backend/registerback.php" method="post" enctype="multipart/form-data" onsubmit="return validations()" name="myform">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>

            <label for="compassword">Comform Password:</label>
            <input type="password" id="compassword" name="compassword"><br><br>

            <?php
            if (isset($_REQUEST["RegisterError"])) {
                echo "<p id='error' style='color: red; font-weight: bold;'>" . "Username already exists. Please choose a different username" . "</p>";
            }

            ?>
            <p id="error" style="color: red; font-weight: bold;"></p>
            <a href="index.php">Are you Login now</a> <br><br>

            <input type="submit" name="Submit" value="Register">
    </div>
    </form>
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
            if (document.myform.compassword.value == '') {
                error.innerHTML = "Please enter your Confirm Password";
                document.myform.compassword.focus();
                return false;
            }
            if (document.myform.password.value != document.myform.compassword.value) {
                error.innerHTML = "Password and Confirm Password must be not same";
                document.myform.compassword.focus();
                return false;
            }
            return true;
        }
    </script>
</body>

</html>