<?php
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}
require 'connection.php';
include 'connection.php';
$username = $_SESSION["username"];
$resultu = "SELECT * FROM users U where U.username = '".$username."' ";
$resultu = mysqli_query($conn, $resultu);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>User Profile</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="img/titleIcon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/profilePageStyle.css"> </head>

    <body>
            <?php  $resu = mysqli_fetch_array($resultu); ?>
                <div class="container" id="top">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <center>
                                        <h1>Welcome <?php echo $resu['username'];?>
                            </h1>
                                 <a href="edit_profile.php">Edit Profile</a> </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
                    </div>
                </div>
               <div class="container-fluid" id="tab">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <table class="table">
                                                    <tr>
                                                        <td>Username: </td>
                                                        <td>
                                                            <?php echo $resu['username']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>User ID:</td>
                                                        <td>
                                                            <?php echo $resu['id']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Contact no:</td>
                                                        <td>
                                                            <?php echo $resu['con']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email:</td>
                                                        <td>
                                                            <?php echo $resu['email'];?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>House & Street no:</td>
                                                        <td>
                                                            <?php echo $resu['hNs_no']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Area:</td>
                                                        <td>
                                                            <?php echo $resu['area']; ?>
                                                        </td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td>Zip Code:</td>
                                                        <td>
                                                            <?php echo $resu['zip_code'];?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Usage:</td>
                                                        <td>
                                                            <?php echo $resu['total_usage'];?>
                                                        </td>
                                                    </tr>
                                                </table>
                                                </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <a href="index.php">Home</a><br>
            <a href="logout.php">Logout</a>
    </body>

    </html>