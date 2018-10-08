<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">

        <script src="vendor/jquery/dist/jquery.js"></script>
        <script src="js/index.js"></script>

    </head>
    <body class="bg-dark">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

<!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <a class="navbar-brand" href="#">#</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active mr-4">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Wyloguj</a>
                    </li>
                </ul>
            </div>
        </nav>
<!-- END OF NAVBAR -->

    <div class="container test-box-wrapper">
        <div class="row mb-4">
            <div class="col text-center text-light text-uppercase"><h2>Wybierz test do edycji:</h2></div>
        </div>
        <div class="row align-items-center" style="height: 316px;">
            <div class="col-3 h-100 bg-light">
                <div class="row h-100 no-gutters align-items-center">
                    <div class="col text-center"><img src="img/logo.png" alt=""></div>
                </div>
            </div>
            <div class="col-9">
                <div class="row no-gutters">
                    <div class="col m-2 test-box bg-info"><a href="edit-test.php?lang=angielski" class="text-box__link">angielski</a></div>
                    <div class="col m-2 test-box bg-info"><a href="edit-test.php?lang=niemiecki" class="text-box__link">niemiecki</a></div>
                </div>
                  <div class="row no-gutters">
                    <div class="col m-2 test-box bg-info"><a href="edit-test.php?lang=hiszpanski" class="text-box__link">hiszpański</a></div>
                    <div class="col m-2 test-box bg-info"><a href="edit-test.php?lang=francuski" class="text-box__link">francuski</a></div>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>