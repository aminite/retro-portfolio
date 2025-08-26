<?php
    if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
        http_response_code(403); // Forbidden
        exit("Direct access not allowed.");
    }

    try {
        $conn = mysqli_connect("localhost", "root", "", "usersdb");
    }catch(mysqli_sql_exception) {
        $conn = false;
    }
?>