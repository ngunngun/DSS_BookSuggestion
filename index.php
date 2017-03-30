<html>
<head>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Book Suggestions</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/soon.css" rel="stylesheet">

        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet'
              type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    </head>

<body>

<!--
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="index.php" style="color:black;">Home</a></li>
            <li><a href="#" style="color:black;">Recommendation</a></li>
            <li><a href="#" style="color:black;">About us</a></li>
          </ul>
        </div>
-->

<div class="col-md-4">
    <img src="assets/img/book.jpg" height="100%" width="100%">
</div>

<!-- START HEADER -->
<section id="header">
    <div class="container">
        <!-- HEADLINE -->
        <h1><span style="background:#A6E496;padding:30px;border-radius:60px;"><b>BOOK</b> Suggestions</span></h1>

        <br><br>

        <form method="post" action="result.php">

            <h4 style="color:black">Please enter your age :
                <input type="text" name="age" id="age" maxlength="3"
                       onkeypress='return event.charCode >= 48 && event.charCode <= 57' required> years old
            </h4>
            <br>
            <h4 style="color:black">Please enter your town :
                <input type="text" name="town" id="town" required>
            </h4>
            <h4 style="color:black">Please enter your city :
                <input type="text" name="city" id="city" required>
            </h4>
           
            <h4 style="color:black">Please enter your country :
                <input type="text" name="country" id="country" required>
            </h4>

            <br><br>

            <button type="submit" class="btn-lg btn-success">Search</button>

        </form>
    </div>
</section>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>

</body>

</html>