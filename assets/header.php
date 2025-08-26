<div id="header-div-1">
    <p class="header-p" style="margin-left: 20px;width: 70vw;">
        <?php 
        if (isset($_COOKIE["user"])) {
            echo "Welcome, ". htmlspecialchars($_COOKIE["user"]); // safe output
        } else {
            echo "Guest"; // fallback if no cookie exists
        }
    ?>
    </p>
    <div id="header-div-2">
    <p class="header-p"><a class="header-a" href="login">Login</a></p>
    <p class="header-p"><a class="header-a" href="register">Register</a></p>
    <p class="header-p"><a class="header-a" href="/">Home</a></p>
    <p class="header-p"><a class="header-a" href="comments">Comments</a></p>
    <p class="header-p"><a class="header-a" href="skills">Skills</a></p>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap');
    body {
        margin: 0px;
        background-color: greenyellow;
    }

    #header-div-1 {
        background-color: rgb(134, 194, 44);
        width: 100%;
        height: 30px;
        gap: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0px;
    }

    #header-div-2 {
        background-color: rgb(134, 194, 44);
        width: 100%;
        height: 30px;
        gap: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0px;
    }
    .header-p {
        margin-top: 4px;
        font-family: "Pixelify Sans", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
    }

    .header-a {
        color: rgb(74, 85, 58);
    }

    .header-a:hover {
        color: greenyellow;
    }
</style>