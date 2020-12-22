<?php

include 'connection.php';

$result = "SELECT * FROM  dashboard d";
$result = mysqli_query($conn, $result);

?>

<!DOCTYPE html>
    <html>

    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <style>
            table {
                counter-reset: section;
            }
            
            .count:before {
                counter-increment: section;
                content: counter(section);
            }
        </style>
    </head>

    <body>
        <?php include 'Header.php'; ?>
            <div class="container-fluid" id="top">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h1 align="center">Dashboard</h1>
                        <hr> </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="container-fluid" id="tab">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>User Id</th>
                                    <th>Gas Used</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    
                                </tr>
                            </thead>
                            <?php 
                    while($res = mysqli_fetch_array($result)) { 
                    ?>
                                <tbody>
                                    <tr>
                                        <td class="count"></td>
                                        
                                        <td>
                                            <?php echo $res['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $res['used_gas'];?>
                                        </td>
                                        
                                        <td>
                                            <?php echo $res['time'];?>
                                        </td>
                                        <td>
                                            <?php echo $res['date'];?>
                                        </td>                                    </tr>
                                </tbody>
                                <?php   
                    }
                    ?>
                        </table>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <?php include 'Footer.php'; ?>
    </body>

    </html>