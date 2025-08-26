<?php
    $IS_WRONG = false;
    if (isset($_POST["submit"])) {
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        if (strlen($user) < 5 ) {
            $IS_WRONG = "Your username should be atleast five charactes";
        }
        else if (strlen($pass) < 5 ) {
            $IS_WRONG = "Your password should be atleast five charactes";
        }else {
        include('database.php');
        if ($conn) {
            $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE name = ?");
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) > 0) {
                $IS_WRONG = "An account with this username already exists";
            } else {
                $stmt = mysqli_prepare($conn, "INSERT INTO users (name, pass) VALUES (?, ?)");
                mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
                if (mysqli_stmt_execute($stmt)) {
                    $IS_WRONG = "You have succusfuly registered you can login now!";
                } else {
                    $IS_WRONG = "Error happened, Please try again later";
                }
            }
        }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div style="min-height: calc(100vh - 30px);">
    <?php
        include("assets/header.php");
        if ($IS_WRONG) {
            echo "<h1 style='text-align: center;margin-top: 40px;margin-bottom: -10px;color: rgba(56, 91, 4, 1);font-family: Pixelify Sans, sans-serif;font-optical-sizing: auto;font-weight: 500;'>{$IS_WRONG}</h1>";
        }
        include("assets/register.html");
    ?>
    </div>
    <?php
        include("assets/footer.html")
    ?>
</body>
</html>