<?php
//esconder erros e warnings do php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
//include "negocio_speech/create_termo_pdf.php";
//create_termo();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="imagem/png" href="imagens/favicon.png" />
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">

    <title>SofiaFala - Coleta Participativa de Áudio</title>
  </head>
  <body>

  <!--carregando sources javascrip -->
  <script src="jquery-3.3.1.min.js"></script>
  <script src="bootstrap4/js/bootstrap.min.js"></script>

  <div class="container" style="width:98%;margin-bottom:20px;">
      
      <div class="container" align="center">
        <div align="center" style="margin-top:20px;margin-bottom:10px;">
          <img src="imagens/logo_stt.png" class="img-fluid" alt="Responsive image" width="100">
        </div>
        <h2>Primeiro passo - Aceite dos termos de participação</h2>
      </div>
      <div class="text-justify" style="font-size:100%; font-family:verdana; margin-left:5px; margin-right:5px; margin-top: 5px;">
        <p class="text-xl-center" align="center" style="font-size:100%; font-family:verdana;">Termo de Consentimento de Livre Esclarecido (TCLE)
        </br> e Termo de Consentimento de Uso de Imagem, Som e Voz (TCUISV)</p>
      </div>  
      
      <div class="pre-scrollable" style="border-radius: 5px; border:1px solid; border-color:#CCC;">
        <p class="text-justify" style="font-size:90%; font-family:verdana; margin-left:5px; margin-right:5px; margin-top: 5px;" >
          <b>1. Apresentação da pesquisa.</b> A Profa. Dra. Alessandra Alaniz Macedo da FFCLRP-USP e a Profa Dra Patrícia Pupin Mandrá da FMRP-USP, pesquisadoras responsáveis pelo  Projeto SofiaFala, vem por meio deste convidar pessoas com transtornos de fala (trocas na fala) a participar da criação de um conjunto de gravações de  áudios de fala comprometida anonimizados (sem identificação pessoal) para serem oferecidos à comunidade científica que investiga o processamento computacional de português. Pretende-se com essa atitude divulgar, incentivar e engajar essa comunidade no desenvolvimento de ferramentas computacionais de suporte ao processo de identificação, reabilitação e acompanhamento de crianças, adolescentes ou adultos com transtorno de linguagem e fala, incluindo os com atraso de fala, transtorno fonológico, transtorno fonético, apraxia de fala na infância, disartria, associados ou não a diagnóstico de síndrome de down, transtorno do espectro do autismo e ao déficit intelectual. A sua participação e/ou a do seu(ua) filho(a) será muito importante para prover dados de teste e de treinamento de ferramentas de computação a serem criadas, que podem vir a suportar demandas e necessidades de pessoas com transtornos de fala.
          </br></br>

          <b>2. Objetivo da pesquisa.</b> Esta pesquisa visa armazenar dados de voz (gravação em áudio) dos participantes a partir da pronúncia (emissão de fala) obtida a partir da  leitura de 10 (dez) frases pelo  participante, as quais serão gravadas em formato de arquivo de áudio digital em um banco de dados do computador que hospeda o site de coleta. A partir deste banco de dados, não é possível a identificação do participante que forneceu a voz com a pronúncia dos textos. O objetivo é que a partir de uma quantidade considerável de participantes, onde cada um lê o mesmo texto, seja possível treinar um sistema de computador (rede neural) para que ele possa compreender o mecanismo de fala e fonética, e então, a partir da recepção do áudio em um microfone, este sistema tenha a capacidade de transcrever de maneira textual, e avaliar aquilo que foi dito pelo participante.
          </br></br>

          <b>3. Participação na pesquisa: inclusão e exclusão.</b> Poderão participar desta pesquisa, fornecendo seus dados de voz, pessoas de ambos os sexos com qualquer idade (menores de idade poderão ter seus cuidadores ou responsáveis legais como assinantes deste documento e apoiadores na inclusão de informações básicas e na leitura de frases para que as crianças possam repetir), e que tenham acesso à Internet. É vedada a participação de pessoas que não apresentam distúrbio de fala diagnosticado por profissional da área de Fonoaudiologia.
          A captura do áudio da leitura dos textos, fornecidas pelo participante, voluntário (a), dar-se-á em dois momentos: no primeiro momento, ao acessar o sítio web, com a plataforma, ao participante será apresentado um termo de consentimento, no qual é informado o procedimento desta pesquisa, e ainda, solicitado dados para fins estatísticos, como sexo – masculino ou feminino – faixa etária, escolaridade, ocupação e região onde reside. O termo de consentimento livre e esclarecido e o de uso de imagem, som e voz, deverá ser aceito para que o participante seja direcionado para a tela de apresentação dos textos para a leitura  e gravação em áudio. No segundo momento, na tela de leitura, os textos aparecerão em um local claro e visível, com letras em cor e tamanho adequados, juntamente com um botão de início e fim da gravação para leitura. Isto se repetirá para as dez frases preparadas pela fonoaudióloga. Ao final da leitura, ao participante será apresentado um botão com o texto "Enviar para o banco de dados", é este botão que faz o devido envio dos dados de áudio coletados para o banco de dados do computador. A qualquer momento, durante a coleta de dados de áudio, a critério do participante, poderá desistir do processo apenas pressionando o botão cancelar apresentado na tela de captura de áudio, sem qualquer ônus. O processo de captura será ofertado em um sítio web, e, portanto, é importante o participante estar em local que ofereça um ambiente livre de interferência de áudio externo ou que esta interferência seja minimizada, como no quarto da casa ou uma sala.
          </br></br>

          <b>4. Confidencialidade.</b> Informamos aos participantes da pesquisa, de forma voluntária, que não é solicitada, em momento algum do processo, qualquer tipo de dado que possibilite a sua identificação pessoal. Desta maneira, o dado de voz fornecido pelo participante, não permitirá ao programa de computador, nem a qualquer membro do projeto de pesquisa, um meio de associar a voz ao participante. Assim, os dados de voz capturados ficarão armazenados em um banco de dados de computador e só poderão ser utilizados pelos membros de grupos de pesquisa que solicitarem via cadastro, análise e permissão da equipe SofiaFala, em toda e qualquer atividade de pesquisa científica. Os dados de voz capturados e armazenados em banco de dados de computador não serão identificados, mantendo-se o sigilo das informações coletadas. E caso o participante queira desistir em qualquer momento do processo, poderá proceder sem nenhum ônus.
          </br></br>

          <b>5. Riscos e Benefícios.</b> Informamos que o procedimento desta pesquisa não é invasivo e não haverá risco para a integridade física e/ou emocional, uma vez que você e seu(ua) filho(a) irão realizar uma atividade em casa, no trabalho em qualquer momento de sua disponibilidade, usando um formulário no site do SofiaFala (http://dcm.ffclrp.usp.br/sofiafala/) que pedirá: suas informações básicas de cadastro como nome, email, idade, sexo e tipo de distúrbio diagnosticado e a repetição de algumas frases preparadas pela fonoaudióloga do grupo, Profa Patricia Mandrá, as quais serão gravadas para compor o conjunto de áudios a serem disponibilizados.
          </br></br>

          <b>6. Direito de sair da pesquisa e a esclarecimentos durante o processo.</b> Você e/ou seu(ua) filho(a) poderão parar de participar do estudo a qualquer momento, sem nenhuma penalidade. O procedimento de coleta envolverá risco mínimo quanto a quebra do sigilo. Após sua autorização clicando no botão a seguir, o formulário de informações básicas e as frases serão disponibilizados. Durante a pesquisa, o bolsista Elias Gusmão da equipe de TI do projeto e os pesquisadores responsáveis estarão à sua disposição para esclarecer possíveis dúvidas sobre o procedimento e questões éticas  do  projeto.
          </br></br>

          <b>7. Ressarcimento e indenização.</b> Não haverá ressarcimento de despesas, porém participante terá direito a indenização, conforme as leis  vigentes no país, o ressarcimento de eventuais despesas, bem como a indenização,  a título de cobertura material, para reparação de danos imediatos ou tardios,  decorrentes da sua participação na pesquisa, será feito pela pesquisadora responsável, não cabendo ao departamento de Computação e Matemática da  Faculdade de Filosofia, Ciências e Letras de Ribeirão Preto/USP e o departamento de Ciências da Saúde da Faculdade de Medicina de Ribeirão Preto qualquer  responsabilidade quanto aos referidos pagamentos. Será garantida a assistência, se algum problema decorrer desta pesquisa.
          </br></br>

          <b>CONSENTIMENTO</b>
          </br></br></br>

          Eu declaro ter conhecimento das informações contidas neste documento e ter recebido respostas claras às minhas questões a propósito da minha participação direta (ou indireta) na pesquisa e, adicionalmente, declaro ter compreendido o objetivo, a natureza, os riscos, benefícios, ressarcimento e indenização relacionados a este estudo. Após reflexão e um tempo razoável, eu decidi, livre e voluntariamente, participar deste estudo, permitindo que os pesquisadores relacionados neste documento obtenham fotografia, filmagem ou gravação de voz de minha pessoa para fins de pesquisa científica/ educacional. As fotografias, vídeos e gravações ficarão sob a propriedade do grupo de pesquisadores pertinentes ao estudo e sob sua guarda. Concordo que o material e as informações obtidas relacionadas a minha pessoa possam ser publicados em aulas, congressos, eventos científicos, palestras ou periódicos científicos. Porém, não devo ser identificado por nome ou qualquer outra forma. Estou consciente que posso deixar o projeto a qualquer momento, sem nenhum prejuízo. Após reflexão e um tempo razoável, eu decidi, livre e voluntariamente, participar deste estudo.
          (Dados informados no formulário apresentado na sequência)
          </br></br>

          Eu declaro ter apresentado o estudo, explicado seus objetivos, natureza, riscos e benefícios e ter respondido da melhor forma possível às questões formuladas.
          </br></br>

          Pesquisador(es)     </br>
              Profa. Dra. Alessandra Alaniz Macedo</br>
              Endereço: Av Bandeirantes, 3900- Campus FFCLRP-USP – Dep. Computação e Matemática - Ribeirão Preto – SP CEP: 14040-901</br>
              Telefone comercial: (16) 3315-0562 / email: ale.alaniz@usp.br</br></br>

              Profa. Dra. Patrícia Pupin   Mandrá (Pesquisadora e Fonoaudióloga responsável)</br>
              Endereço: Av Bandeirantes, 3900- Campus FMRP-USP – Dep. Oftalmologia, Otorrinolaringologia e Cirurgia de Cabeça e Pescoço. Curso de Fonoaudiologia - Ribeirão Preto – SP CEP: 14048-900</br>
              Telefone: comercial (16) 3602-2523 / e-mail: ppmandra@fmrp.usp.br</br></br>

          Contato da Equipe SofiaFala</br>
              E-mail: sofiafala.contato@gmail.com</br>
              Telefone: (16) 3315 4864</br>
              Sobre Projeto: http://dcm.ffclrp.usp.br/sofiafala/</br></br>

          Comitê de Ética em Pesquisa HC e FMRP-USP – Campus Universitário</br>
          Monte Alegre 14048-900 - Ribeirão Preto - SP - Brasil</br>
          Fone: (16) 3602-2228</br>
          E-mail : cep@herp.fmrp.usp.br</br></br>
        </p>
      </div>

      <div align="center" style="margin-top:10px;margin-bottom:15px;">
        <label><input id="cAceitar" type="checkbox" value="">Aceitar</label>
        <button type="button" class="btn btn-secundary" onClick="inicio()">Voltar</button>
        <button type="button" class="btn btn-secundary" onClick="inicio()">Cancelar</button>
        <button type="button" id="btGoCad" name="btGoCad"  class="btn btn-info" >Continuar</button>
      </div>
    <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
          </div>
        </div>
      </div>
</div>

<script>

$("#btGoCad").click(function(event){
  event.preventDefault();

  var aceito = document.getElementById("cAceitar");

  if (aceito.checked == true){

    var form = new FormData();
    var env = "101";
    form.append('tact',env );

    $.ajax({
      url: "cadastro.php",
      type: 'POST',
      data: form,
      dataType :"text",
      processData: false,
      contentType: false,
      cache: false,
      success: function (data) {
        window.location.replace("cadastro.php");
      },
      error: function (error) {
        //alert("Erro ao comunicar com o servidor!");
        $('#exampleModal').find('.modal-title').text('Atenção!');
        $('#exampleModal').find('.modal-body').text('Erro ao comunicar com o servidor!');
        $('#exampleModal').modal('show');
        window.location.replace("negocio_speech/erro_finish.php");
      }
    });



  }else{
    //alert("Necessário aceitar os termos (TCLE) e (TCUISV) para continuar.");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('Necessário aceitar os termos (TCLE) e (TCUISV) para continuar.');
    $('#exampleModal').modal('show');

  }
});

//function irParaCadastro(){}

function inicio(){
  window.location.replace("inicio.php");
}

</script>

</html>
