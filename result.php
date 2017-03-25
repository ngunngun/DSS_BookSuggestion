<?php

include('connect.php');

$age = $_POST['age'];
$location1 = $_POST['location1'];
$location2 = $_POST['location2'];
$location3 = $_POST['location3'];
$location = $location1 . ", " . $location2 . ", " . $location3;

$sql = "SELECT *
            FROM DSS_Users
            WHERE location='$location' AND age='$age';";
print ($sql);

$result = mysqli_query($conn, $sql);

$num_rows = mysqli_num_rows($result);
print ($num_rows);

?>

<html>
<head>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Result | Book Suggestions</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/soon.css" rel="stylesheet">

        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet'
              type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    </head>

<body background="assets/img/book1.jpg">

<!--
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="index.php" style="color:black;">Home</a></li>
            <li><a href="#" style="color:black;">Recommendation</a></li>
            <li><a href="#" style="color:black;">About us</a></li>
          </ul>
        </div>
-->

<!-- START HEADER -->
<section id="header">
    <div class="container">
        <!-- HEADLINE -->
        <h1><span style="background:#99CCFF;padding:30px;border-radius:60px;"><b>Result</b></span></h1>

        <br><br>

        <div class="mainContent">

            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Book image</th>
                    <th>Book name</th>
                    <th>Author(s)</th>
                    <th>Other</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Book image</th>
                    <th>Book name</th>
                    <th>Author(s)</th>
                    <th>Other</th>
                </tr>
                </tfoot>
                <tbody>

                <tr>
                    <td>img</td>
                    <td>harry potter</td>
                    <td>JK</td>
                    <td>other</td>
                </tr>


                <tr>
                    <td>img</td>
                    <td>harry potter</td>
                    <td>JK</td>
                    <td>other</td>
                </tr>

                </tbody>
            </table>

        </div>

    </div>
</section>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>

</html>