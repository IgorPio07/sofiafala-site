<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Sofia Fala: Coleta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<body>

<script>
function copyToClipboard(element) {
	  var $temp = $("<input>");
	    $("body").append($temp);
	    $temp.val($(element).text()).select();
	      document.execCommand("copy");
	      $temp.remove();
	      }
</script>

<div class="container">

<?php
//--------------------------------------------------------
// param   $dataHifen data formato yyyy-mm-dd
//         indica data dos arquivos a serem compactados
// returns código html contendo link para arquivo compactado + infos
function zipAudioFiles( $dataHifen ) {
  $dataPonto = str_replace("-", ".", $dataHifen);
//  echo "dataHifen = " . $dataHifen . " dataPonto = " . $dataPonto . "<br>";
  $dirAudio = "html/audios_collect/";
  $dirZip   = "html/zip/";

  $zip = new ZipArchive();
  $filename = $dirZip . $dataHifen . ".zip";
  if ($zip->open($filename, (ZipArchive::CREATE | ZipArchive::OVERWRITE) ) !== TRUE) {
      echo "cannot open <$filename><br>";
      exit("cannot open <$filename>\n");
  }
  $now = date_create('now')->format('Y-m-d H:i:s');
  $zip->addFromString( $dataHifen . ".txt" ,
        "Zip files for date $dataHifen created at " . $now . "\n");
//     $zip->addFile( $dirAudio . "*-". $dataPonto . "-*.wav");

  $directory = $dirAudio;
  $directoryIterator = new RecursiveDirectoryIterator($directory);
  $iteratorIterator  = new RecursiveIteratorIterator($directoryIterator);
  $fileList = new RegexIterator($iteratorIterator, '/^.*'. $dataPonto .'.*\.(wav|WAV)$/');
//  echo "DATE: " . $dataHifen .  "<br>";
  $count = 0;
  foreach($fileList as $file) {
//      echo "--> " . $file . "<br>";
      $zip->addFile( $file );
      $count++;
  }
  // $zip->numFiles starts at 0 to numFiles-1
  $str = "<a href=\"$filename\">$dataHifen.zip</a>" .
         " (wav files: " . $count .
         ", files: " . ($zip->numFiles-1) . ", status: " . $zip->status . ")";
  $zip->close();
  return $str;
}
//--------------------------------------------------------
if ($_REQUEST["hash"] != "C456A35D6868E3BF") die;

$servername = "localhost";
$port = "5432";
$dbname = "projetosofiafala";
$username = "projetosofiafala";
$password = "#s0fi@#";
$conn_string = "host=$servername port=$port user=$username password=$password dbname=$dbname";
$conn = pg_connect($conn_string);

if (! $conn) {
  echo 'Connection attempt failed.';
  echo pg_last_error($conn);
  die("Connection failed: ");
}

?>

<h2>Sofia Fala: Coleta</h2>
  <ul class="nav nav-tabs">
    <li class="nav-item">
	<a class="nav-link active" data-toggle="tab" href="#home">Resumo</a>
    </li>
    <li class="nav-item">
	<a class="nav-link" data-toggle="tab" href="#menu1">Dados</a>
    </li>
    <li class="nav-item">
	<a class="nav-link" data-toggle="tab" href="#menu2">Dados CSV</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane container active">
      <h3>Resumo</h3>
<?php
$sql = "select date(created_at),count(*)" .
       " from participante" .
       " group by date(created_at)" .
       " order by date(created_at) desc;";
$result = pg_query($conn, $sql);
if (!$result) {
  echo "An error occurred.\n" . pg_last_error($conn) ;
}
$cont=0;
echo "<table class='table'>";
while($row = pg_fetch_assoc($result)) {
	if ($cont == 0) {
		echo "<thead><tr>";
		foreach ($row as $key => $value)
			echo "<th>$key</th>";
    // zip
    echo "<th>zip file</th>";

		echo "</tr></thead>";
	}
	echo "<tr>";
	foreach ($row as $key => $value)
		echo "<td>$value</td>";
  // zip
  $dataHifen = $row["date"];
  $value = zipAudioFiles( $dataHifen );
  echo "<td>$value</td>";

	echo "</tr>";
	$cont++;
}
echo "</table>";
?>
    </div>

    <div id="menu1" class="tab-pane continer fade">
      <h3>Dados</h3>
<?php
$sql = "select * from participante order by created_at asc";
$result = pg_query($conn, $sql);
$cont=0;
echo "<table class='table table-responsive'>";
while($row = pg_fetch_assoc($result)) {
	if ($cont == 0) {
		echo "<thead><tr>";
		foreach ($row as $key => $value)
			echo "<th>$key</th>";
		echo "</tr></thead>";
	}
	echo "<tr>";
	foreach ($row as $key => $value)
		echo "<td>$value</td>";
	echo "</tr>";
	$cont++;
}
echo "</table>";
?>
    </div>
    <div id="menu2" class="tab-pane container fade">
      <h3>Dados CSV</h3>
<button type="button" class="btn" onclick="copyToClipboard('#text')">Copiar para Área de Trabalho</button>
<?php
$sql = "select * from participante order by created_at asc";
$result = pg_query($conn, $sql);
$cont=0;
echo "<pre id='text'>";
while($row = pg_fetch_assoc($result)) {
	if ($cont == 0) {
		foreach ($row as $key => $value)
			echo "$key;";
		echo "\n";
	}
	foreach ($row as $key => $value)
		echo "$value;";
	echo "\n";
	$cont++;
}
echo "</pre>";
?>
    </div>
</div>
<?php
pg_close($conn);
?>
</div>
</body>
</html>
