<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div style="min-height: calc(100vh - 30px);">
    <?php
        include("assets/header.php");
    ?>
        <div style="text-align: center;width: 80vw;margin-left:auto;margin-right:auto;margin-top: 50px">
            <h1>Welcome to My Portfolio</h1>
            <p style="font-size: 20px;">Hello! I’m Amine, a developer passionate about building projects across different technologies. 
            This site is a place where you can learn more about my work, my skills, and even leave a comment to share your thoughts.</p>
            <p style="font-size: 20px;">I enjoy working on game-related projects like Minecraft plugins and MTA scripts, as well as creating web applications with PHP, React, and Spring Boot.</p>
            <p style="font-size: 20px;">Feel free to explore the site, check out my skills, and connect with me through the comments section.</p>
        </div>
        <style>
            h1 {
                font-family: "Pixelify Sans", sans-serif;
                font-optical-sizing: auto;
                font-weight: 500;
                font-style: normal;
            }
            p {
                font-family: "Pixelify Sans", sans-serif;
                font-optical-sizing: auto;
                font-weight: 500;
                font-style: normal;
            }
        </style>    
    </div>
    <?php
        include("assets/footer.html")
    ?>
</body>
</html>