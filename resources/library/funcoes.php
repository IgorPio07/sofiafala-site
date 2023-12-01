<?php

include_once("database.php");
class funcoes
{
  /**
   * Insere uma classe na Index e tira em outras páginas
   *
   * @param string $pagina Nome da página atual
   * @return string
   *
   */
  function remover_classe($pagina)
  {
    if (strpos($pagina, "index.php") !== false) {
      return 'class="scroll"';
    } else {
      return '';
    }
  }

  /**
   * Retorna os arquivos do diretório do SofiaFala para download
   * @return file
   */
  private $sofiafalaarquivos;
  function getsofiafalaarquivos()
  {
    $sofiafalaarquivos = "/var/www/https/sofiafala/arquivos/";
    return $sofiafalaarquivos;
  }

  /**
   * Gera um código randômico
   */
  function gerar_codigo_acesso($length = 5)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  /**
   * Gravar códigos gerados
   */
  function gravar_codigos_gerados($ip, $codigos)
  {
    foreach ($codigos as $codigo) {
      $query = "INSERT INTO TOKEN (TOKEN, IP_GERACAO, IP_DOWNLOAD, DATA_CRIACAO, UTILIZADO, UTILIZADO_DATA) VALUES ($1, $2, $3, $4, $5, $6);";

      $now = date('Y-m-d H:i:s');

      $array_params = array(
        'token' => $codigo,
        'ip_geracao' => $ip,
        'ip_download' => null,
        'data_criacao' => $now,
        'utilizado' => 'f',
        'utilizado_data' => null
      );
      $db = new database;
      $resultado = $db->query_with_params($query, $array_params);
    }
    $db->close();
    return $resultado;
  }

  /**
   * Registra os dados do usuário realizando o download do aplicativo
   */
  function gravar_download($codigo, $ip){
      $query = "UPDATE TOKEN SET IP_DOWNLOAD = $1, UTILIZADO = $2, UTILIZADO_DATA = $3 WHERE TOKEN = $4 RETURNING TRUE;";

      $now = date('Y-m-d H:i:s');

      $array_params = array(
        'ip_download' => $ip,
        'utilizado' => 't',
        'utilizado_data' => $now,
        'token' => $codigo
      );
      $db = new database;
      $resultado = $db->query_with_params($query, $array_params);
      
      $db->close();

      if ($resultado){
        return true;
      }
      return false;
  }

  /**
   * Valida o código fornecido para download
   */
  function checar_codigo_download($codigo, $ip)
  {
    $query = "SELECT COUNT(*) AS ENCONTRADO FROM TOKEN WHERE TOKEN = $1;";

    $array_token = array(
      'token' => $codigo
    );
    $db = new database;
    $resultado = $db->query_with_params($query, $array_token);
    
    if ($resultado["encontrado"] == 0) {
      return "Código de download inválido!";
    }

    $array_utilizado = array(
      'utilizado' => 'f',
      'token' => $codigo
    );

    $sql = "SELECT COUNT(*) AS ENCONTRADO FROM TOKEN WHERE UTILIZADO = $1 AND TOKEN = $2;";
    $utilizado = $db->query_with_params($sql, $array_utilizado);

    if ($utilizado["encontrado"] == 0) {
      return "Esse código de download já foi utilizado! Caso você tenha tido problemas ao realizador o download, por favor entre em contato através do email: sofiafala.contato@gmail.com";
    }

    $fileLocation = "extra/apk/v2/modulo_crianca_2020_producao.apk";

    $download_registrado = $this->gravar_download($codigo, $ip);

    if ($download_registrado){
      return $fileLocation;
    }
    return "Problema ao realizar o download. tente inserir o código novamente.";
  }
  

  /**
   * Grava os erros ocorridos para análise
   * @param string $erro Informa o erro ocorrido para logar.
   */
  function logar_erros($erro)
  {
    $fp = fopen('img/resultados/log.txt', 'ab');
    if (false === $fp) {
      throw new RuntimeException('Unable to open log file for writing');
    }

    $bytes = fwrite($fp, date('j/m/y-H:i:s') . "-" . $erro . PHP_EOL);
    fclose($fp);
  }

  /**
   * Checa se o usuario já fez algum teste, se já, comeca dai
   *
   */
  function continuar_analise(&$records, &$page, &$start_from, $idusuario)
  {

    $query = "SELECT MAX(TV.ID_VIDEO) FROM teste_resultado AS TR INNER JOIN TESTE_VIDEO AS TV ON TR.ID_VIDEO = TV.ID_VIDEO WHERE TR.ID_USUARIO = " . $idusuario;

    $db = new database;
    $teste_realizado = $db->query($query);
    $continuar_teste_desde = $db->fetch_array($teste_realizado);

    if ($teste_realizado !== '') {
      $start_from = $continuar_teste_desde[0];
      $page = $start_from + 1;
      return true;
    }
    return false;
  }

  /**
   * Checa se é um postback ou não
   *
   */
  function is_postback($metodo, $pagina_chamadora, $pagina_atual)
  {
    $_pagina_chamadora = strpos(basename($pagina_chamadora), "?") ? substr(basename($pagina_chamadora), 0, strpos(basename($pagina_chamadora), "?")) : basename($pagina_chamadora);

    if (strtoupper($metodo) == 'GET') {
      if ($_pagina_chamadora != basename($pagina_atual)) {
        return false;
      }
    }
    return true;
  }

  /**
   * Remove o arquivo que havia sido armazenado
   *
   */
  function remover_arquivo($idresultado)
  {
    $mascara = $idresultado . '-*';
    array_map('unlink', glob('/var/www/html/grupo/sofiafala/www/img/resultados/' . $mascara));
  }

  /**
   * Deleta registros órfãos, caso a pessoa tenha selecionado menos de 3 movimentos de um tipo_video
   *
   */
  function deleta_registros_orfaos($idusuario, $tipo_movimento)
  {
    $sql = "SELECT TV.VIDEO AS VIDEO, COUNT(TV.VIDEO) AS QTD FROM TESTE_RESULTADO AS TR
              INNER JOIN TESTE_VIDEO AS TV ON TR.ID_VIDEO = TV.ID_VIDEO
              WHERE TR.ID_USUARIO = " . $idusuario . "
              	AND TV.ID_TIPO = " . $tipo_movimento . "
              GROUP BY TV.VIDEO;";

    $db = new database;
    $resultado = $db->query($sql);

    $linhas = $db->num_rows($resultado);

    if ($linhas != 0) {
      while ($linha = $db->fetch_array($resultado)) {
        if ($linha['qtd'] < 3) {

          $ids_resultado = "SELECT TR.ID_RESULTADO FROM TESTE_RESULTADO AS TR
                            INNER JOIN TESTE_VIDEO AS TV ON TR.ID_VIDEO = TV.ID_VIDEO
                            WHERE TR.ID_USUARIO = $idusuario
                            	AND TV.ID_TIPO = $tipo_movimento
                            	AND TV.VIDEO LIKE '%" . $linha['video'] . "%';";

          $total_ids = $db->query($ids_resultado);

          while ($idresultado = $db->fetch_array($total_ids)) {
            $delete = array();
            $delete['id_resultado'] = $idresultado['id_resultado'];

            $final = $db->delete('teste_resultado', $delete);

            if ($final) {
              self::remover_arquivo($idresultado['id_resultado']);
            }
          }
        }
      }
    }

    return true;
  }
}
