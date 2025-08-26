

<?php
    $IS_WRONG = false;
    if (isset($_POST["submit"])) {
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        include('database.php');
        if ($conn) {
            $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE name = ? AND pass = ?");
            mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
            mysqli_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $IS_WRONG = "You have sucssufly logged in";
                setcookie("user", $user, time() + (86400 * 2), "/");
            } else {
                $IS_WRONG = "Wrong username or password";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div style="min-height: calc(100vh - 30px);">
    <?php
        include("assets/header.php");
    if ($IS_WRONG) {
        echo "<h1 style='text-align: center;margin-top: 40px;margin-bottom: -10px;color: rgba(56, 91, 4, 1);font-family: Pixelify Sans, sans-serif;font-optical-sizing: auto;font-weight: 500;'>{$IS_WRONG}</h1>";
    }
        include("assets/login.html");
    ?>
    </div>
    <?php
        include("assets/footer.html")
    ?>
</body>
</html>