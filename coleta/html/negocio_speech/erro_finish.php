<?php
//esconder erros e warnings do php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();

//encerrar sessão
session_destroy();


echo("<script> window.location.replace('../inicio.php');</script>");

?>
