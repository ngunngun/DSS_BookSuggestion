<?php

include('connect.php');

if (isset($_POST['submit'])) {
    $file = $_FILES['file']['tmp_name'];

    $filename = strtolower($_FILES["file"]["name"]);
    $type = strrchr($filename, ".");

    $handle = fopen($file, "r");

    if ($type == ".csv") {
        while (($fileop = fgetcsv($handle, 1000, ",")) !== false) {

            $id = $fileop[0];
            $isbn = $fileop[1];
            $rating = $fileop[2];


            $sql = "INSERT INTO `DSS_Rating` (`userID`, `isbn`, `rating`) VALUES ('$id', '$isbn', '$rating')";

            echo $sql;

            $result = mysqli_query($conn, $sql);

            echo $result;


        }

        if (sql) {
            echo "Upload completed";

        }
    } else {
        echo "invalid file type";
    }

}
?>


<html>
<head>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Book Suggestions</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet'
              type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    </head>

<body>


<form method="post" action="ratingUp.php" enctype="multipart/form-data">
    <input type="file" name="file" accept=".csv">
    <br/><br/>
    <input type="submit" name="submit" value="Submit">
</form>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>

</html>