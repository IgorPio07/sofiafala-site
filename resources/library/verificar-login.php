<?php

//Habilitar para debugar
ini_set('display_errors', 1);

session_unset();

session_start();

include_once('database.php');
include_once('funcoes.php');

try {

  //Original
  $login = strtolower($_POST['Usuario']);
  $senha = md5($_POST['Senha']);

  //Regras
  if ((!isset($login) || trim($login) === '') || (!isset($senha) || trim($senha) === '')) {
    echo "<script language='javascript' type='text/javascript'>alert('Dados inválidos. Acesso não permitido. Ação logada!');window.location.href='/sofiafala/login.php';</script>";
    die();
  } else if (preg_match("/[^-a-z0-9_.]/i", $login) || preg_match("/[^-a-z0-9_]/i", $senha)) {
    echo "<script language='javascript' type='text/javascript'>alert('Dados inválidos. Acesso não permitido. Ação logada!');window.location.href='/sofiafala/login.php';</script>";
    die();
  }

  $query = 'SELECT ID_USUARIO, USUARIO, NOME, EMAIL, FOTO, ID_PERMISSAO FROM USUARIO WHERE (USUARIO = $1 OR EMAIL = $1) AND SENHA = $2;';
  $array_params = array('usuario' => $login, 'senha' => $senha);

  $db = new database;
  $resultado = $db->query_login($query, $array_params);
  if (!$resultado){
    echo"<script language='javascript' type='text/javascript'>alert('Dados inválidos. Acesso não permitido. Ação logada!');window.location.href='/sofiafala/login.php';</script>";
    die();
  } else if (count($resultado)<=0) {

          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='/sofiafala/login.php';</script>";

          die();

      } else if (count($resultado)>0){
        echo"<script language='javascript' type='text/javascript'>alert('Chegou aqui');</script>";
          $_SESSION['idusuario'] = $resultado['id_usuario'];
          $_SESSION['usuario'] = $resultado['usuario'];
          $_SESSION['nome'] = $resultado['nome'];
          $_SESSION['foto'] = $resultado['foto'];
          $_SESSION['email'] = $resultado['email'];
          $_SESSION['permissao'] = $resultado['id_permissao'];


          setcookie("logado", $login);

          header("Location:/sofiafala/default.php");

      }
  $db->close();
} catch (\Exception $e) {
  var_dump($e->getMessage());
}
