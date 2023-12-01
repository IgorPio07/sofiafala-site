<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="imagem/png" href="imagens/favicon.png" />
  <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">

  <title>Sofia Fala - Coleta</title>
</head>
<body>


<?php

$servername = "localhost";
$port = "5432";
$dbname = "projetosofiafala";
//$username = "usuariocoletaweb";
//$password = "senhaColetaWeb0815#";

// teste
$username = "projetosofiafala";
$password = "#s0fi@#";

$conn_string = "host=" . $servername .
            " port=" . $port . " user=" . $username . " password=" . $password . " dbname=" . $dbname;

///echo $conn_string;
$conn = pg_connect($conn_string);

if ($conn) {

  echo 'Connection attempt succeeded.';

} else {
  echo 'Connection attempt failed.';
  echo pg_last_error($conn);
  die("Connection failed: ");

}
echo "<h3>Connection Information</h3>";
echo "DATABASE NAME:" . pg_dbname($conn) . "<br>";
echo "HOSTNAME: " . pg_host($conn) . "<br>";
echo "PORT: " . pg_port($conn) . "<br>";



// precisa mudar o insc toda vez que executar para numero diferente

$sql = "INSERT INTO participante (insc,nome,email,nasc,cel,rg,endereco,cid,cep,uf)
        VALUES ('20', 'o nome', 'o email', '11/11/1111', '(16) 11111-1111', 'o rg', 'o endereco', 'cidade', '14100-000', 'SP')";

echo $sql;


$result = pg_query($conn, $sql);
if (!$result) {
  echo "An error occurred.\n";
}
else {
echo "\nINSERT OK.\n";

}
//echo pg_errormessage($conn);
echo "LAST ERROR " . pg_last_error($conn);

echo "<br>\n";

$sql = "SELECT * FROM participante where insc <= '2'";
$result = pg_query($conn, $sql);

if ($result) {
  echo "Select OKAY <br>\n";
  while($row = pg_fetch_assoc($result)) {
    echo $row["insc"] . ", " . $row["email"] . ", " . $row["nome"] . "<br>\n";
  }

}
else {
  echo "Select ERRO <br>\n";
  echo "LAST ERROR " . pg_last_error($conn);
}


pg_close($conn);


?>

</body>
</html>
