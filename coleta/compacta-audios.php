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
  if ($zip->open($filename, ZipArchive::CREATE) !== TRUE) {
      echo "cannot open <$filename><br>";
      exit("cannot open <$filename>\n");
  }
  $zip->addFromString( $dataHifen . ".txt" , "Zip files for date $dataHifen.\n");
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

if ($_REQUEST["hash"] != "C456A35D6868E3BF")
	  die;

//  $servername = "localhost";
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
  if (! $conn) {
    echo 'Connection attempt failed.';
    echo pg_last_error($conn);
    die("Connection failed: ");
  }
  //--------------------------------------------------------
  $sql = "select date(created_at),count(*)" .
         " from participante" .
         " group by date(created_at)" .
         " order by date(created_at) desc;";
  $result = pg_query($conn, $sql);
  if (!$result) {
    echo "An error occurred.\n" . pg_last_error($conn) ;
  }
  while($row = pg_fetch_assoc($result)) {
     $dataHifen = $row["date"];
     echo $dataHifen . " em while <br>";
     $str = zipAudioFiles( $dataHifen );
//$str = "vazio";
     echo "RETORNO: " . $str . "<br>";
  }

  $str = zipAudioFiles( "2021-08-17" );
  echo "FORA: " . $str . "<br>";

  //--------------------------------------------------------
  pg_close($conn);
  //--------------------------------------------------------
?>

</body>
</html>
