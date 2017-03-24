<?php
    $conn = mysqli_connect("localhost","root","dsslamom01", "DSS");

    if (mysqli_connect_errno($mysqli)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    mysqli_query("SET NAMES UTF8");

?>
