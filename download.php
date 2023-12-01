<html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <title>SofiaFala - Software Inteligente de Apoio &agrave; Fala</title>
    <?php include_once("resources/template/header.php"); ?>

    <style>
      .button {
        background-color: #BC7271;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 12px;
      }

      .button-small {
        background-color: #BC7271;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
      }

      .button-small-close {
        background-color: #9C5251;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
      }

      .download {
        color: rgb(24, 22, 22);
      }
    </style>
  </head>

<body>
  <div>
    <div id="divInformacoesImportantes" style="text-align: center;">
      <h1>Importante</h1>
      <h3>Leia antes de continuar</h3>
      <h4><b>Este software somente está disponível para o sistema Android</b></h4>
      <div id="divTextInformacoesImportantes" style="text-align: justify;">
        <p>O download do SofiaFala deve ser feito pelo fonoaudiólogo que irá indicar o uso e realização de exercícios com o aplicativo. Para fazer o download, o fonoaudiólogo deve preencher o cadastro clicando no botão "Para Fonos" para então receber códigos de acesso e distribuir aos seus pacientes.</p>

        <p>Com o código fornecido pelo fonoaudiólogo, o paciente poderá baixar o aplicativo clicando no botão "Para Pacientes" e para utilizar o aplicativo, um usuário/senha será cadastrado diretamente pelo profissional fonoaudiólogo no aplicativo de uso exclusivo deste.</p> 

        <p>Infelizmente, o fato do aplicativo ter sido gerado como produto de um projeto de pesquisa já finalizado indisponibiliza suporte técnico para eventuais dúvidas e problemas técnicos. Em relação a dúvidas, os seguintes <a href="http://dcm.ffclrp.usp.br/sofiafala/index.php#demonstracao">vídeos</a> de demonstração foram preparados para esse fim.</p>
      </div>
    </div>
    <div id="divDownloadUsuario" style="text-align: center">
      <h1 class="download">Download</h1>
      <button type="button" class="button" data-toggle="modal" data-target="#modalDownload">
        Para Pacientes
      </button>
      <button type="button" onclick="showHideComponent('divDownloadFono')" class="button">Para Fonos</button></a>
    </div>

    <div class="modal fade" id="modalDownload" tabindex="-1" role="dialog" aria-labelledby="modalDownloadLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="modalDownloadLabel">Download SofiaFala</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div style="text-align: center" class="modal-body">
            <label for="token">Digite sua chave de acesso:</label>
            <input id="token" type=text></input>
          </div>
          <div class="modal-footer text-center">
            <button type="button" class="button-small-close" data-dismiss="modal">Fechar</button>
            <button class="button-small" onclick="checkDownload(document.getElementById('token').value);">Download</button>
          </div>
        </div>
      </div>
    </div>

    <div id="divDownloadFono" style="text-align: center; display: none;">
      <p>Caso você seja profissional da área de fonoaudiologia, preencha o formulário abaixo, para solicitar acesso e começar a utilizar o SofiaFala com seus pacientes!</p>

    <div style="text-align: center">
      <iframe id="formgoogle" src="https://docs.google.com/forms/d/e/1FAIpQLScpeqxCYwrTzZtruLY_oE9AWcxgQdsDsAtafyjloZ-5x2WopA/viewform?embedded=true" width="100%" height="2640" frameborder="0" marginheight="0" marginwidth="0" onload="loaded()">Carregando...</iframe>
    </div>

    <div id="codigosAcesso" style="display: none; text-align: center; border-style: ridge; position: relative; top: -200px;">
      <img id="logoCodigosAcesso" align="left" src="img/layout/logo_sofiafala.jpg" width="20%" height="auto" />
      <h4 style="display: inline-block; font-weight: bold;">Códigos de Acesso<br>
        <h5>Abaixo estão seus códigos de acesso. Cada código permite que 01 (um) paciente faça o download do aplicativo SofiaFala.</h5>
      </h4>
      <table style="text-align: center" id="codesTable" class="table table-bordered">
        <tbody></tbody>
      </table>
    </div>
    </div>
    
  </div>

  <br />
  <br />
  <br />

  <?php include_once("resources/template/footer.php"); ?>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</body>

</html>