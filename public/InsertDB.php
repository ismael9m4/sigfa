<?php
//Creates new record as per request
    //Connect to database
    $servername = "sigfa.com";		//example = localhost or 192.168.0.0
    $username = "root";		//example = root
    $password = "";	
    $dbname = "sistema_fugas";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Conexion Fallida: " . $conn->connect_error);
    }

    //Get current date and time
    date_default_timezone_set('America/Argentina/Jujuy');
    $d = date("Y-m-d");
    $y = date("Y");
    $t = date("H:i:s");
    $t = date("L/min");

    if(!empty($_POST['ldrvalue']))
    {
		$ldrvalue = $_POST['ldrvalue'];
	    $sql = "INSERT INTO readings (year,hour, date, value, unit) VALUES ('".$y."','".$h."','".$d."','".$ldrvalue."', '".$t."')"; //nodemcu_ldr_table = Youre_table_name

		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


	$conn->close();
?>