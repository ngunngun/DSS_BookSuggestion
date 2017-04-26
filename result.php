<?php

include('connect.php');

$age = $_POST['age'];
$town = $_POST['town'];
$city = $_POST['city'];
$country = $_POST['country'];


?>

<html>
<head>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Result | Book Suggestions</title>
        
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <link href="assets/css/soon.css" rel="stylesheet">
        
        <link href="assets/css/blog-post.css" rel="stylesheet">

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
                        </tr>
                        </thead>
                        
                        <tbody>
                <?php
                    //Find then select similar USER 
                    $sql = "SELECT *, ABS(age-'".$age."') as diff_age
                            FROM DSS_Users
                            WHERE town = '".$town."'
                            ORDER BY diff_age ASC
                            LIMIT 1;";

                    $result = mysqli_query($conn, $sql);
                    

                    if (mysqli_num_rows($result)==0) { 
                        $sql = "SELECT *, ABS(age-'".$age."') as diff_age
                            FROM DSS_Users
                            WHERE city = '".$city."'
                            ORDER BY diff_age ASC
                            LIMIT 1;";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result)==0) { 
                            $sql = "SELECT *, ABS(age-'".$age."') as diff_age
                                FROM DSS_Users
                                WHERE country = '".$country."'
                                ORDER BY diff_age ASC
                                LIMIT 1;";
                            $result = mysqli_query($conn, $sql);
                        }
                        
                    }


                    while ($row = mysqli_fetch_assoc($result)) {
                        $userID = $row["userID"];
                    }

                    // End of Find then select similar USER 
                    

                    // Find then select hight rating book
                    $sql = "SELECT isbn, rating 
                            FROM DSS_Rating 
                            Where userID='".$userID."' and rating = (SELECT MAX(rating) FROM DSS_Rating )
                            ORDER BY RAND();";
                    
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $isbn = $row["isbn"];
                        // Find then select close distant books/ 5 books
                        $sql = "SELECT * 
                                FROM DSS_Distance 
                                Where first_id='".$isbn."'
                                ORDER BY distance ASC
                                LIMIT 5;";
                        
                        $result2 = mysqli_query($conn, $sql);
                       
                        if (mysqli_num_rows($result2)!=0) { 
                            while ($row = mysqli_fetch_assoc($result2)) {
                            $isbn_r = $row["SECOND_ID"];
                            $sql = "SELECT *
                                    FROM DSS_Books 
                                    Where isbn='".$isbn_r."';";
                            
                            $result3 = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result3)) {
                                echo '<tr>
                                        <td><img src ='.$row["img"].' width=50% height=auto></td>
                                        <td>'.$row["title"].'</td>
                                        <td>'.$row["author"].'</td>
                                    </tr>
                                    ';
                                }
                            }
                            break;
                        }
                        // End of Find then select close distant books
                    }
                    // End of Find then select hight rating book

                    
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