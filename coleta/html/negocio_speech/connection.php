<?php
//esconder erros e warnings do php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

function OpenCon()
{
	$servername = "localhost";
  $port = "5432";
  $dbname = "projetosofiafala";
  // alterar para role com permissao insert only em participante
//	$username = "usuariocoletaweb";
//	$password = "senhaColetaWeb0815#";

  // teste com usuario atual (remover na producao)
  $username = "projetosofiafala";
  $password = "#s0fi@#";

  $conn_string = "host=" . $servername .
                 " port=" . $port .
                 " user=" . $username .
                 " password=" . $password .
                 " dbname=" . $dbname;
//  echo $conn_string;

	// Create connection
  $conn = pg_connect($conn_string);
	// Check connection
  if ($conn) {
  //  echo 'Connection attempt succeeded.';
	}
  else {
    echo 'Connection attempt failed.';
    die("Connection failed: ");
  }

//  echo "<h3>Connection Information</h3>";
//  echo "DATABASE NAME:" . pg_dbname($conn) . "<br>";
//  echo "HOSTNAME: " . pg_host($conn) . "<br>";
//  echo "PORT: " . pg_port($conn) . "<br>";

	return $conn;
 }

function CloseCon($conn)
{
  pg_close($conn);
}

?>
