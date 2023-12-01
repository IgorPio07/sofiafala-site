<html>
<!DOCTYPE html>

  <html xmlns="http://www.w3.org/1999/xhtml">

  <head runat="server">
    <title>Sofia Fala</title>
    <meta charset="utf-8">

    <?php include_once("resources/template/header.php"); ?>

  </head>

  <body>

  <div class="container" id="sobre">>
    <div class="row">
	 <div class="col-md-10 col-md-offset-1 text-center">
    </div>
     <h2>Bem vindo ao projeto Sofia Fala</h2>
	 <div class="text-justify">
</br>

<p class="text-xl-left">Este projeto é uma parceria entre A Profa. Dra. Alessandra Alaniz Macedo da FFCLRP-USP e a Profa Dra Patrícia Pupin Mandrá da FMRP-USP</br> </br>
  Esta pesquisa visa armazenar dados de voz (gravação em áudio) dos participantes a partir da pronúncia (emissão de fala) obtida a partir da  leitura de 10 (dez) frases pelo  participante, as quais serão gravadas em formato de arquivo de áudio digital em um banco de dados do computador que hospeda o site de coleta. A partir deste banco de dados, não é possível a identificação do participante que forneceu a voz com a pronúncia dos textos. O objetivo é que a partir de uma quantidade considerável de participantes, onde cada um lê o mesmo texto, seja possível treinar um sistema de computador (rede neural) para que ele possa compreender o mecanismo de fala e fonética, e então, a partir da recepção do áudio em um microfone, este sistema tenha a capacidade de transcrever de maneira textual, e avaliar aquilo que foi dito pelo participante.
. Se você deseja participar deste estudo, fornecendo o áudio de sua voz, clique no botão <b>"Desejo participar"</b>.</br> </br>

  <b>Observação:</b> Caso já tenha participado, e, por qualquer motivo, deseja sair do estudo, clique no botão <b>"Desejo cancelar a minha participação" *</b>.</br> </br>

  <b>(*) Para cancelar a participação, tenha em mãos o código gerado no momento do seu cadastro de participação. Sem ele não é possível remover os seus dados. Ele estará disponível no seu e-mail, que foi utilizado no formulário de cadastro deste projeto de pesquisa.</b>
</p>


<button type="button" class="btn btn-success btn-lg" onClick="irTermo()">Desejo participar</button>
<button type="button" class="btn btn-danger btn-lg" onClick="irCancelarPart()">Desejo cancelar minha participação</button>
</div>

<script>

 <br />

          <div class="text-center">
              <form method="get" action="img/content/projeto-sofiafala-divulgacao.pdf">
              <button id="btnDivulgacao" name="btnDivulgacao" class="btn btn-lg btn-primary btn-signin" type="submit">Saiba um pouco mais!</button>
            </form>
            </div>
        </div>
      </div>
    </div>


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

 <?php include_once("resources/template/footer.php"); ?>
  </body>
</html>
