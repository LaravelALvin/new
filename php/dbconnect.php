<?php
	$dsn = "mysql:host=remotemysql.com:3306;dbname=MK2DS7ujfG";
	$user = "MK2DS7ujfG";
	$password = "f3GsAffDKQ";


	$pdo = new PDO($dsn, $user, $password);

	if(!$pdo){
		echo "Failed to connect to our mySQL database";
		exit();
	}

	$servername = "remotemysql.com";
    $username = "MK2DS7ujfG";
    $password = "f3GsAffDKQ";
    $database = "MK2DS7ujfG";
    $port = "3306";
    $con=mysqli_connect($servername, $username, $password, $database);

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }



?>