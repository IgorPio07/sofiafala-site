<?php
//esconder erros e warnings do php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
include "connection.php";
include "env_email.php";

if(!empty($_POST['id_part_exc'])){
	session_start();
	//abrindo conexão com o BD
	$conn = OpenCon();

	$sql = "SELECT * FROM participante where insc='".$_POST['id_part_exc']."'";
  $result = pg_query($conn, $sql);
	if ($result) {
		// output data of each row
		$part_insc = 0;
		while($row = pg_fetch_assoc($result)) {
			$part_insc = $row["insc"];
			$_SESSION["email"] = $row["email"];
			$_SESSION["nome"] = $row["nome"];
		}
		//salvar dados partivipante
		$sql = "DELETE FROM participante where insc = '".$part_insc."'";
    $result = pg_query($conn, $sql);
		if ($result) {
			//enviar email
			//tipo_email serve para avisar, que não adiciona o termo ao email, tipo cancelamento
			$_SESSION['tipo_email'] = 'Cn';
			$_SESSION["email_subj"] = 'Cancelamento da participacao projeto Sofia Fala - Coleta';
			$_SESSION["email_body"] = $_SESSION['nome'].'  Informamos que sua participação no projeto Sofia Fala - Coleta foi cancelada com êxito.';
			$_SESSION["email_abody"] = $_SESSION['nome'].'  Informamos que sua participação no projeto Sofia Fala - Coleta foi cancelada com êxito.';
			sendEmailPart();

			echo "saved_part_sucess";
		} else {
			echo "Error: " . $sql . "<br>" . pg_last_error($conn);
		}

	} else {
		echo "0";
	}
	//fechando conexão com o bd
	CloseCon($conn);
}
?>
