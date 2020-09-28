<?php
session_start();
if(!empty($_SESSION["username"]))
{
        header('Location: user_profile.php');
}
require 'connection.php';
if(isset($_POST['username']) && isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login_user ="select * from users where username='$username' && password ='$password'";
    $result = $conn->query($login_user);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $_SESSION["username"] = $row['username'];
       // $_SESSION["email"] = $row['email'];
      }
      if($username =="admin")
      {
        header('Location: admin_profile.php');
      }else{
        header('Location: user_profile.php');
      }
    }else{
      echo "<script>alert('wrong username & Password')</script>";
    }
  
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>User Sign In </title>
        <link rel="icon" type="image/png" href="img/titleIcon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/signInPageStyle.css"> </head>
    <style>
        body {
            background-image: url("img/bg.jpg");
        }
    </style>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"></div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <center>
                                <h4>User Sign In</h4></center>
                        </div>
                        <div class="panel-body">
                            <form action="login_user.php" method="post">
                                <div class="form-group">
                                    <label for="username">User Name:</label>
                                    <input type="text" class="form-control" id="username" name="username" required placeholder="Username"> </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                                    <input type="checkbox" onclick="myFunction()"> &nbsp;Show Password </div>
                                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                            </form>
                        </div>
                        <div class="panel-footer" align="right">
                            <p>Return to <a href="index.php">Home Page</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            }
            else {
                x.type = "password";
            }
        }
    </script>