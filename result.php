<?php

include('connect.php');

$age = $_POST['age'];
$city = $_POST['city'];
$country = $_POST['country'];

$sql = "SELECT *
        FROM DSS_Users
        WHERE 1;";

$result = mysqli_query($conn, $sql);
$tmp = 0;
$asciiCity = "";
$asciiCountry = "";

//for($i = 0; $i!=strlen($city); $i++){
//    //ord(), convert string to ascii
//    $asciiCity = $asciiCity.ord($city[$i]);
//}
//echo $asciiCity;
//
//for($i = 0; $i!=strlen($country); $i++){
//    $asciiCountry = $asciiCountry.ord($country[$i]);
//}
//echo $asciiCountry;
 
while ($row = mysqli_fetch_assoc($result)) {
    $threeLocal = $row["location"];
    $dbAge = $row["age"];
    $local = explode(", ", $threeLocal); // split by ( ,)
    
    if($age == $dbAge){
        if ((in_array($city, $local)==0) && (in_array($country, $local)==0)) {
            $tmp = 3;
        }else if((in_array($country, $local)==0) && (in_array($city, $local)!=0)){
            $tmp = 2;
        }else{
            $tmp = 1;
        }
    }else{
        if ((in_array($city, $local)==0) && (in_array($country, $local)==0)) {
            $tmp = 2;
        }else if((in_array($country, $local)==0) && (in_array($city, $local)!=0)){
            $tmp = 1;
        }else{
            $tmp = 0;
        }
    }
    
     
}

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
                            <th>Rating</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Book image</th>
                            <th>Book name</th>
                            <th>Author(s)</th>
                            <th>Rating</th>
                        </tr>
                        </tfoot>
                        <tbody>
                <?php
                      $sql = "SELECT *
                            FROM `DSS_Users`, `DSS_Books`, `DSS_Rating`
                            WHERE DSS_Users.userID = DSS_Rating.userID AND
                            DSS_Rating.isbn = DSS_Books.isbn AND
                            age = '$age' AND location LIKE '%$city, $country';";

                      $result = mysqli_query($conn, $sql);

                      while ($row = mysqli_fetch_assoc($result)) {
                        $paid = false;
                    echo '<tr>
                            <td>'.$row["img"].')</td>
                            <td>'.$row["title"].'</td>
                            <td>'.$row["author"].'</td>
                            <td>'.$row["rating"].'</td>
                          </tr>
                        ';
                      }
                 ?>
                </tbody>
              </table>

        </div>

    </div>
</section>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>

</html>