<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:index.php");
}
include_once('funcoes.php');
include_once('database.php');

$funcao = new funcoes();

//Habilitar para debugar
ini_set('display_errors', 1);
error_reporting(E_ALL);

switch (true) {
  case isset($_POST['deletar']):
    $idvideo  = $_POST['id_video'];
    $idusuario = $_SESSION['idusuario'];
    deletar_registro_banco($idvideo, $idusuario);
  break;
  case !isset($_POST['nome_video']):
    $erro = "Não foi possível gravar o nome do vídeo do usuário " . $_SESSION['usuario'] .".";
    $funcao->logar_erros($erro);
    break;
  case !isset($_POST['timestamp']):
    $erro = "Não foi possível gravar o timestamp do vídeo do usuário " . $_SESSION['usuario'] .".";
    $funcao->logar_erros($erro);
    break;
  case !isset($_POST['tipo_movimento']):
    $erro = "Não foi possível gravar o tipo do movimento do vídeo do usuário " . $_SESSION['usuario'] .".";
    $funcao->logar_erros($erro);
    break;
  case !isset($_POST['tipo_video']):
    $erro = "Não foi possível gravar o tipo do vídeo do(a) usuário(a) " . $_SESSION['usuario'] .".";
    $funcao->logar_erros($erro);
    break;
  case !isset($_POST['usuario']):
    $erro = "Não foi possível gravar o usuário do vídeo do(a) usuário(a) " . $_SESSION['usuario'] .".";
    $funcao->logar_erros($erro);
    break;
  case !isset($_POST['motivo']):
    $erro = "Não foi possível gravar o motivo do(a) usuário(a) " . $_SESSION['usuario'] .".";
    $funcao->logar_erros($erro);
    break;
  case !isset($_SESSION['idusuario']):
    $erro = "Não foi possível gravar o id do(a) usuário(a) " . $_SESSION['usuario'] .".";
    $funcao->logar_erros($erro);
    break;

   default:
      $idvideo  = $_POST['id_video'];
      $nome_video = $_POST['nome_video'];
      $timestamp = $_POST['timestamp'];
      $tipo_movimento = strtolower($_POST['tipo_movimento']);
      $tipo_video = strtolower($_POST['tipo_video']);
      $usuario = strtolower($_POST['usuario']);
      $idusuario = $_SESSION['idusuario'];
      $motivo = $_POST['motivo'];
      $analisavel = isset($_POST['analisavel']) ? false : true;

      if ($analisavel) {
          $idresultado = gravar_registro_banco($idusuario, $idvideo, $timestamp, $motivo, video_ja_selecionado($idvideo, $idusuario), $analisavel = true);

          gravar_arquivo($idresultado, $nome_video, $tipo_video, $tipo_movimento, $usuario, $timestamp);
      } else {
          gravar_registro_banco($idusuario, $idvideo, $timestamp, $motivo, video_ja_selecionado($idvideo, $idusuario), $analisavel);
      }

      break;
}

/**
  * Insere a escolha no banco de dados, caso já não tenha sido feita.
  *
*/
  function gravar_registro_banco($idusuario, $idvideo, $timestamp, $motivo, $video_ja_selecionado = false, $analisavel)
  {
      if ($video_ja_selecionado == false and $analisavel == true) {
          $sql = "INSERT INTO TESTE_RESULTADO (ID_USUARIO, ID_VIDEO, FRAME_ESCOLHIDO, MOTIVO, DATA_ESCOLHA)
              VALUES (". $idusuario .", ". $idvideo .", ". pg_escape_literal($timestamp) .", ". pg_escape_literal($motivo) .", now()) RETURNING ID_RESULTADO;";
      } elseif ($video_ja_selecionado == false and $analisavel == false) {
          $sql = "INSERT INTO TESTE_RESULTADO (ID_USUARIO, ID_VIDEO, FRAME_ESCOLHIDO, ANALISAVEL, MOTIVO, DATA_ESCOLHA)
            VALUES (". $idusuario .", ". $idvideo .", 0, FALSE, ". pg_escape_literal($motivo) .", now()) RETURNING ID_RESULTADO;";
      } elseif ($video_ja_selecionado == true and $analisavel == false) {
          $sql = "UPDATE TESTE_RESULTADO
            SET MOTIVO = ". pg_escape_literal($motivo) .",
            ANALISAVEL = false,
            DATA_ESCOLHA = now()
            WHERE ID_RESULTADO = ". $video_ja_selecionado ." RETURNING ID_RESULTADO;";
      } else {
          $sql = "UPDATE TESTE_RESULTADO
              SET FRAME_ESCOLHIDO = ". pg_escape_literal($timestamp) .",
              MOTIVO = ". pg_escape_literal($motivo) .",
              DATA_ESCOLHA = now()
              WHERE ID_RESULTADO = ". $video_ja_selecionado ." RETURNING ID_RESULTADO;";
      }

      $db = new database;
      $query = $db->query($sql);
      $resultado = $db->retornar_uma_linha($query);

      $db->close();

      if ($video_ja_selecionado) {
          $funcao->remover_arquivo($resultado[0]);
      }

      return $resultado[0];
  }

/**
  * Apaga definitivamente um frame já selecionado
  *
*/
  function deletar_registro_banco($idvideo, $idusuario)
  {
      $resultado = video_ja_selecionado($idvideo, $idusuario);

      if (!$resultado || $resultado !== '') {
          $delete = array();
          $delete['id_resultado'] = $resultado;

          $db = new database;
          $final = $db->delete('teste_resultado', $delete);

          if ($final) {
              $funcao->remover_arquivo($resultado);
          }
      }
  }

/**
  * Verifica se o vídeo em questão já foi selecionado alguma vez
  *
*/
  function video_ja_selecionado($idvideo, $idusuario)
  {
      $sql = "SELECT ID_RESULTADO AS IDRESULTADO FROM TESTE_RESULTADO WHERE ID_VIDEO = ".$idvideo." AND ID_USUARIO = ".$idusuario.";";

      $db = new database;
      $resultado = $db->query($sql);

      if ($resultado) {
          if ($db->num_rows($resultado) != 0) {
              $linha = $db->retornar_uma_linha($resultado);

              if ($linha!=='') {
                  return $linha[0];
              } else {
                  return false;
              }
          } else {
              return false;
          }
      }
  }

/**
  * Armazena o frame escolhido num arquivo de imagem
  *
*/
  function gravar_arquivo($id_resultado, $nome_video, $tipo_video, $tipo_movimento, $usuario, $timestamp)
  {
      $tmp_extensao = pathinfo($nome_video);
      $arquivo_analisado = basename($nome_video, '.'.$tmp_extensao['extension']);
      $extensao = ".jpg";
      $separador = "-";

      $arquivo_final = $id_resultado . $separador . $tipo_video . $separador . $tipo_movimento . $separador . $usuario . $separador . $arquivo_analisado . $separador . $timestamp . $extensao;

      $comando = 'ffmpeg -ss 00:00:'.$timestamp.' -i ../../'.$nome_video.' -vframes 1 -q:v 3 ../../img/resultados/'.$arquivo_final;

      $saida = shell_exec($comando);

      if (isset($saida) || trim($saida)!=='') {
          $funcao = new funcoes();
          $funcao->logar_erros("Houve um problema ao salvar a foto: ".$saida);
      }
  }
