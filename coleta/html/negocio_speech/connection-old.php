<?php
//esconder erros e warnings do php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

function OpenCon()
 {
	$servername = "localhost";
	$username = "usuario";
	$password = "senha";
	$dbname = "speech";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	 return $conn;
 }

function CloseCon($conn)
{
 $conn -> close();
}

?>
