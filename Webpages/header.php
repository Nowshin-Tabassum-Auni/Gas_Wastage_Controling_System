<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/HeaderFooterStyle.css"> </head>

    <body>
        <!-- Start Header Container -->
        <div class="container-fluid" id="header">
            <div class="row">
            <div class="col-md-4">
                <div class="logo"> <a href="index.php"><img src="img/gas-iot_Logo.png" height= "70px" alt="logo"></a></div>
            </div>
            <div class="col-md-8">
                <div class="menu">
                    <ul>
                        <li><a href="index.php#about">About</a></li>
                        <li><a href="index.php#situation">Situation</a></li>
                        <li><a href="index.php#services">Services</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                        <li><a href="index.php#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <!-- Header container ends -->
    </body>