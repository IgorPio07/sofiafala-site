<?php
//esconder erros e warnings do php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
include "negocio_speech/save_part.php";

$_SESSION['video_ok'] = "pass";

//salvando videos em arquivos
if(isset($_FILES['audios_data1'])){
	$total = $_POST['total_arquivos'];
	for ($x = 0; $x < $total; $x++) {
		$new_name = 'audios_collect/'.$_SESSION["id"]."-frase".$_POST['id_frase'.$x]."-idioma".$_POST['cod_idioma']."-".date("Y.m.d-H.i.s").".wav";
		//$new_name = 'teste'.$x.'.wav';

		if (move_uploaded_file($_FILES['audios_data'.$x]['tmp_name'], $new_name)) {


		} else {
			echo "failure ".$new_name;
			// alert("failure".$new_name);
			$_SESSION['video_ok'] = "not";
		}
	}
	save_part();
}else{
	echo "audios_data not exist";
	$_SESSION['video_ok'] = "not";
}

//$blob = $_POST['teste'];
//return $blob;
//file_put_contents('test.wav', $blob);

//salvando participante, funcao de save_part.php, dps encerrando sessão e enviando email


?>
