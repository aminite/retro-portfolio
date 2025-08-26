<?php
    $ERROR = "";
    if (isset($_POST["submit"])) {
        $comment = $_POST["comment"];
        if (strlen($comment) < 10) {
            $ERROR = "You comment should be atleast 10 characters";
        } else{
            include('database.php');
            if ($conn) {
                $stmt = mysqli_prepare($conn, "INSERT INTO comments (owner, comment) VALUES (?, ?)");
                $owner = htmlspecialchars($_COOKIE["user"]);
                mysqli_stmt_bind_param($stmt, "ss", $owner, $comment);
                mysqli_execute($stmt);
            }
            header("Location: comments");
        }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
</head>
<body>
    <div style="min-height: calc(100vh - 30px);">
    <?php
        include("assets/header.php");
    ?>
        <div style="text-align: center;width: 80vw;margin-left:auto;margin-right:auto;margin-top: 50px">
            <h1>Comments</h1>
            <p style="font-size: 20px;">here you can write comments about my portfolio or give me suggestions or talk about yourself</p>
        </div>
        <hr style="border: none;height: 2px;background-color: black;width: 80vw; ">
        <div style="text-align: center;width: 80vw;margin-left:auto;margin-right:auto;margin-top: 20px"> 
            <?php
                echo "<h1>{$ERROR}</h1>";
            ?>
            <form action="comments" method="post">
                <input type="text" placeholder="comment" id="comment-input-message" name="comment">
                <input type="submit" value="send" id="comment-input-send" name="submit">
            </form>
        </div>
        <?php
            include("database.php");
            if ($conn) {
                $stmt = mysqli_prepare($conn, "SELECT * FROM comments ORDER BY id DESC");
                mysqli_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<h2 style='margin-left: 1.5vw'>{$row["owner"]}</h2>";
                    echo "<h3>{$row["comment"]}</h3>";
                }
            }
        ?>
        <style>
            h1 {
                font-family: "Pixelify Sans", sans-serif;
                font-optical-sizing: auto;
                font-weight: 500;
                font-style: normal;
            }
            h2 {
                font-family: "Pixelify Sans", sans-serif;
                font-optical-sizing: auto;
                font-weight: 500;
                font-style: normal;
                margin-bottom: 0px;
            }
            p {
                font-family: "Pixelify Sans", sans-serif;
                font-optical-sizing: auto;
                font-weight: 500;
                font-style: normal;
            }
            h3 {
                display:block;
                margin-left: 4vw;
                max-width: 80%;
                margin-top: 5px;
                margin-bottom: 30px;
            }
            #comment-input-send {
                border-radius: 10px;
                width: 11vw;
                height: 36px;
            }
            #comment-input-message {
                border-radius: 10px;
                width: 60vw;
                height: 30px;
            }
        </style>    
    </div>
    <?php
        include("assets/footer.html")
    ?>
</body>
</html>