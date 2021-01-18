<?php

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
<html>
<head>
	<title></title>
</head>
<body>
	<?php  $resu = mysqli_fetch_array($resultu); 
    $user_id = $resu['user_id'];
            ?>
	<h1>MOnthly Entries</h1>
 <?php

include_once("connection.php");

$resultw = "SELECT
  YEAR(date) AS YEAR, MONTH(date) AS MONTH, SUM(used_gas) AS USED
FROM gas_uses
WHERE id = '$user_id'
GROUP BY YEAR(date), MONTH(date)
ORDER BY YEAR(date) ASC, MONTH(date) ASC";
   
$resultw = mysqli_query($conn, $resultw);

?>

 <table class="table table-hover">
                    <thead> <tr>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Gas Used</th>
                    </tr> </thead>
                    <?php 
                    while($res = mysqli_fetch_array($resultw)) { 
                    ?>
                    <tbody><tr> 
                    <td><?php echo $res['YEAR']; ?></td>
                    <td><?php echo $res['MONTH']; ?></td>    
                    <td><?php echo $res['USED'];?></td>
                    </tr> </tbody> 
                    <?php   
                    }
                    ?>

                </table>
                    </div>

                    <div class="col-md-1"></div>
</div>
</div>
</body>
</html>