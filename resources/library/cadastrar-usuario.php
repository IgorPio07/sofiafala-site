<?php
session_start();
include_once("database.php");

if(!isset($_SESSION['permissao']) || ($_SESSION['permissao'] != 1)){
   echo"<script language='javascript' type='text/javascript'>alert('Você não tem permissão para acessar essa página!');window.location.href='/sofiafala/index.php';</script>";
}

//Habilitar para debugar
ini_set('display_errors', 1);

if (isset($_POST['NomeUsuario']) || isset($_POST['Usuario']) || isset($_POST['Email']) || isset($_POST['Senha']) || isset($_POST['Permissao'])){
  $nome = $_POST['NomeUsuario'];
  $usuario = strtolower($_POST['Usuario']);
  $email = strtolower($_POST['Email']);
  $senha = md5($_POST['Senha']);
  $permissao = $_POST['Permissao'];
}else{
  echo "Erro ao cadastrar dados!";
}

if (isset($_FILES['foto'])){
$_foto = base64_encode(file_get_contents($_FILES['foto']));
$foto_tipo = $_FILES['foto']['type'];

$foto = 'data:image/'.$foto_tipo.';base64,'.$_foto;

}else{
  $foto = null;
  $foto_tipo = null;
}

if (isset($_POST['submit']) && ($_POST['submit'] == "Atualizar")){
  $sql = "UPDATE USUARIO SET nome = '$nome', usuario = '$usuario', email = '$email', senha = '$senha', foto = '".$foto."', foto_tipo = '$foto_tipo', permissao = '$permissao' WHERE ID_USUARIO = '$id_usuario';";
}else{
  $sql = "INSERT INTO USUARIO (NOME, USUARIO, EMAIL, SENHA, FOTO, FOTO_TIPO, ID_PERMISSAO) VALUES ('$nome', '$usuario', '$email', '$senha', '".$foto."', '$foto_tipo', '$permissao');";
}

  $db = new database;

try {
  if ($db){
      if ($db->query($sql)){
        echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='/sofiafala/default.php';</script>";
      }else{
        echo "Erro ao conectar no banco de dados!";
        die();
      }
  }else {
      print($connect_errno);
  }
  $db->close();
}catch (\Exception $e) {
    var_dump($e->getMessage());
}

?>
