<?php
  include_once("resources/library/funcoes.php");

  $funcoes = new funcoes();

  if($_SERVER['HTTP_REFERER']!=$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"])
  {
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
          $_SERVER['HTTP_X_REQUESTED_WITH']  == 'XMLHttpRequest' )
    {
      $codigo = $_POST["codigo"];
      $ip = $_POST["ip"];

      try {
        $response = $funcoes->checar_codigo_download($codigo, $ip);
        echo $response;
      }catch (Exception $e){
        echo json_encode($e->getMessage());
      }
    }else{
        header("Location: https://dcm.ffclrp.usp.br/sofiafala/download.php");
        echo "<script language='javascript' type='text/javascript'>alert('Dados inválidos. Download não autorizado');</script>";
    }
  }
