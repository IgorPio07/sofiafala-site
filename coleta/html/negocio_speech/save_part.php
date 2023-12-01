<?php
//esconder erros e warnings do php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
include "connection.php";
include "env_email.php";

//nao é necessario, pois quem chama ja inicia
//session_start();

function save_part(){

	//videos salvos corretamente
	if(strcasecmp($_SESSION["video_ok"],'pass') == 0){
		//termo_aceito, garante que o termo foi aceito
		if(strcasecmp($_SESSION["termo_aceito"],'101') == 0){

			//garante que os campos obrigatórios foram preenchidos
			if((!empty($_SESSION['id'])) && (!empty($_SESSION['nome'])) && (!empty($_SESSION['email']))){

				$conn = OpenCon();
				//salvar dados partivipante
        $sql = "INSERT INTO participante
        (insc,nome,email,nasc,cel,rg,endereco,cid,cep,uf,sexo,disturbio)
				VALUES ('".$_SESSION["id"]."',
                '".$_SESSION["nome"]."',
                '".$_SESSION["email"]."',
                '".$_SESSION["nasc"]."',
	              '".$_SESSION["tel"]."',
                '".$_SESSION["rg"]."',
                '".$_SESSION["end"]."',
                '".$_SESSION["cid"]."',
                '".$_SESSION["cep"]."',
                '".$_SESSION["uf"]."',
                '".$_SESSION["sexo"]."',
                '".$_SESSION["disturbio"]."'
        )";
//        echo $sql . "<br>\n"
        $result = pg_query($conn, $sql);
        if ($result) {
						echo "saved_part_sucess";
				} else {
						echo "Error: " . $sql . "<br>" . pg_last_error($conn);
				}
				CloseCon($conn);

				//enviar email
				//tipo_email avisa para anexar o termo, email de salvar cadastro
				$_SESSION['tipo_email'] = "Sv";
				$_SESSION["email_subj"] = 'Doacao de voz para o projeto Sofia Fala - Coleta';
				$_SESSION["email_body"] = $_SESSION['nome'].' agradecemos sua particição no projeto,</br> Sua chave de inscrição é <b>'.$_SESSION['id'].'</b>.</br></br> Caso queira cancelar a sua participação, entre no site do projeto novamente e utilize sua chave de inscrição para efetuar o cancelamento.</br></br> A equipe do projeto agradece sua participação. Para mais informações entre em contato conosco pelo e-mail: projetosofiafalacoleta@gmail.com';
				$_SESSION["email_abody"] = $_SESSION['nome'].' agradecemos sua particição no projeto,</br> Sua chave de inscrição é <b>'.$_SESSION['id'].'</b>.</br></br> Caso queira cancelar a sua participação, entre no site do projeto novamente e utilize sua chave de inscrição para efetuar o cancelamento.</br></br> A equipe do projeto agradece sua participação. Para mais informações entre em contato conosco pelo e-mail: projetosofiafalacoleta@gmail.com' ;
				sendEmailPart();
			}

		}
	}
}

?>
