 <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Insert</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
         </head>

    <body>
        <?php include 'header.php'; ?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                        <h1>Gas Data insert</h1>
                        <hr>
                        <form action="insert.php" method="post" name="inserForm" id="inserForm">
                            <div class="form-group">
                                <h3>User ID:
                            <input type="text" name="id" placeholder="Enter User ID" required></h3> </div>
                            <div class="form-group">
                                <h3>Gas Used:
                            <input type="text" name="gas_value" placeholder="Enter Gas Used" required></h3> </div>
                            
                                <button type="submit" class="btn btn-dark" style="font-weight:900;" value="submit">Submit</button>
                        </form>
                    </div>
                </div> </div>


<?php
//Creates new record as per request
    //Connect to database
    $servername = "localhost";		//example = localhost or 192.168.0.0
    $username = "root";		//example = root
    $password = "";	
    $dbname = "gas_iot";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

    //Get current date and time
    date_default_timezone_set('Asia/Dhaka');
    $d = date("Y-m-d");
    $t = date("H:i:s");

    if(!empty($_POST['gas_value']))
    {
        echo "online";
		$value = $_POST['gas_value'];
        $id = $_POST['id'];

	    $sql = "INSERT INTO dashboard (id, used_gas, time, date) VALUES ('".$id."', '".$value."', '".$t."', '".$d."')"; 
echo "insert";
		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


	$conn->close();
?>

        <?php include 'footer.php'; ?>
  </body>
  </html>