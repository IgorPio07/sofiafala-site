<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="imagem/png" href="imagens/favicon.png" />
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">

    <title>SofiaFala - Coleta Participativa</title>
  </head>
  <body>

    <div class="container" style="width:98%;margin-bottom:20px;">
      
      <div class="container" align="center">
        <div align="center" style="margin-top:20px;margin-bottom:10px;">
          <img src="imagens/logo_stt.png" class="img-fluid" alt="Responsive image" width="100">
        </div>
        <h2>Bem-vindo ao projeto SofiaFala - Coleta Participativa de Áudio</h2>
      </div>
      
      <div class="text-justify" style="font-size:90%; font-family:verdana; margin-left:5px; margin-right:5px; margin-top: 5px;">
        <p class="text-xl-left">Estamos convidando pessoas (crianças, adolescentes e adultos) com distúrbio de fala para participar da criação de um conjunto de gravações de áudios de fala comprometida anonimizados (sem identificação pessoal) para serem oferecidos à comunidade científica que investiga o processamento da língua portuguesa. Com essa atitude, pretende-se divulgar, incentivar e engajar essa comunidade no desenvolvimento de ferramentas computacionais de suporte ao processo de identificação, reabilitação e acompanhamento de crianças, adolescentes ou adultos com transtorno de linguagem e fala.</p>
        <p>Esta pesquisa armazena dados de voz (gravação em áudio) dos participantes a partir da pronúncia (emissão de fala) obtida a partir da leitura de frases pelo participante, as quais serão gravadas em formato de arquivo de áudio digital em um banco de dados do computador que hospeda o site de coleta. A partir deste banco de dados, não é possível a identificação do participante que forneceu a voz com a pronúncia dos textos.</p> 
        <p>A participação da coleta é dividida em 3 passos: (1) Aceite do TCLE, (2) Cadastro de dados básicos, e (3) Gravação das frases. Este projeto é uma parceria entre a Profa. Dra. Alessandra Alaniz Macedo da FFCLRP-USP e a Profa Dra Patrícia Pupin Mandrá da FMRP-USP.</p>
        <p>Se você deseja participar deste estudo, fornecendo o áudio de sua voz, clique no botão <b>"Desejo participar"</b>.</p>
        <p>  <b>Observação:</b> Caso já tenha participado, e, por qualquer motivo, deseja sair do estudo, clique no botão <b>"Desejo cancelar a minha participação" *</b>.</p>
        <p>  <b>(*) Para cancelar a participação, tenha em mãos o código gerado no momento do seu cadastro de participação. Sem ele não é possível remover os seus dados. Ele estará disponível no seu e-mail, que foi utilizado no formulário de cadastro deste projeto de pesquisa.</b></p>

        <button type="button" class="btn btn-success btn-lg" style="margin-bottom:10px;" onClick="irTermo()">Desejo participar</button>
        <button type="button" class="btn btn-danger btn-lg" style="margin-bottom:10px;" onClick="irCancelarPart()">Desejo cancelar minha participação</button>
      </div>
    </div>
    <script>

      function irTermo(){
        // Mesmo comportamento de um Redirecionamento HTTP
        window.location.replace("termo.php");

        // Mesmo comportamento de um click em um link
        //window.location.href = "cadastroDoador.html";
      }

      function irCancelarPart(){
        // Mesmo comportamento de um Redirecionamento HTTP
        window.location.replace("cancpart.php");

        // Mesmo comportamento de um click em um link
        //window.location.href = "cadastroDoador.html";
      }


    </script>

</html>
