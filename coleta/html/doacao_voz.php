<?php
//esconder erros e warnings do php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
include "negocio_speech/connection.php";

if(strcasecmp($_SESSION["termo_aceito"],'101') == 0){

	/*
	  echo("ID ".$_POST['tIdCad']);
	  echo("nome ".$_POST['tNome']);
	  echo("cad ".$_POST['tEmail']);
	  //sleep
	  ob_flush();
	  flush();
	  usleep(150000);*/

//  if((!empty($_POST['tIdCad'])) && (!empty($_POST['tNome'])) && (!empty($_POST['tEmail']))){
  if((!empty($_POST['tIdCad'])) && (!empty($_POST['tEmail']))){

    //carregando dados do cadastro em session para salvar posteriormente
    $_SESSION["id"] = addslashes($_POST['tIdCad']);
//    $_SESSION["nome"] = addslashes($_POST['tNome']);
    $_SESSION["nome"] = "Anônimo";
    $_SESSION["email"] = addslashes($_POST['tEmail']);
    $_SESSION["nasc"] = addslashes($_POST['tNasc']);
    $_SESSION["sexo"] = addslashes($_POST['tSexo']);
    $_SESSION["disturbio"] = addslashes($_POST['tDisturbio']);//2 sindrome de down
    $_SESSION["tel"] = addslashes($_POST['tTel']);
    $_SESSION["rg"] = addslashes($_POST['tRg']);
    $_SESSION["end"] = addslashes($_POST['tEnd']);
    $_SESSION["cid"] = addslashes($_POST['tCid']);
    $_SESSION["cep"] = addslashes($_POST['tCep']);
    $_SESSION["uf"] = addslashes($_POST['tUf']);

    ?>

    <!doctype html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="icon" type="imagem/png" href="imagens/favicon.png" />
      <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">

      <title>SofiaFala - Coleta</title>

	  <style>
			#myImg {
				border-radius: 5px;
				cursor: pointer;
				transition: 0.3s;
			}

			#myImg:hover {opacity: 0.7;}

		</style>

    </head>
    <body>

      <!--carregando sources javascrip -->
      <script src="jquery-3.3.1.min.js"></script>
      <script src="bootstrap4/js/bootstrap.min.js"></script>
      <script src="booststrapmask/dist/js/bootstrap-formhelpers.js"></script>
	
      <div class="container" style="width:98%;margin-bottom:20px;">
		<!-- The Modal -->

        <div class="container" align="center">
              <div align="center" style="margin-top:20px;margin-bottom:10px;">
                    <img src="imagens/logo_stt.png" class="img-fluid" alt="Responsive image" width="100">
              </div>
              <h2>Terceiro passo - Gravação das frases</h2>
        </div>
        <div class="text-justify" style="font-size:90%; font-family:verdana; margin-left:5px; margin-right:5px; margin-top: 5px;">
        	<p>
              <!--Para iniciar as gravações aperte o botão 'Iniciar Leitura'. Em seguida,-->
              Contamos com 50 frases, e solicitamos a gravação de pelo menos 10. Após 10 ou mais frases, aperte o botão 'Enviar Dados' para submeter sua doação. Vamos fazer as gravações:
			  	<ol>
					<li>leia cada frase ou escute (aperte '&#9654; Ouvir' junto à frase)</li>
					<li>aperte o botão 'Iniciar Gravação'</li>
					<li>repita a frase apresentada em letras pretas (ignore a leitura do texto em azul)</li>
					<li>aperte o botão 'Terminar Gravação'. Cada gravação feita está em 'Áudios gravados'</li>
				</ol>
				Repita os passos (1,2,3 e 4) enquanto aparecerem frases.
          	
  			</p>
			<p>
				Para refazer alguma gravação, aperte o botão 'Refazer Tudo' (isso removerá as gravações efetuadas, permitindo reiniciar as gravações).
			</p>
        </div>
        <input class="form-check-input" type="hidden" name="idioma" id="iPort" value="Português" checked>
        <!--
          <div class="card" align="left" style="width:22rem;">
              <div class="card-body" align="left">
                <div class="form-check form-check-inline" align="left">
                  <input class="form-check-input" type="radio" name="idioma" id="iPort" value="Português" checked>
                  <label class="form-check-label" for="iPort">Português</label>
                </div>
              </div>
          </div>
          <br><br>
          -->
          <!-- escolha o idioma e clique em iniciar leitura para carregar as frases -->

<!--
          <div>
-->
            <!-- foi colocada chamada ao iniciarLeitura() no inicio do script -->
            <!--<button type="button" id="initDonation" onClick="iniciarLeitura()" class="btn btn-warning">Iniciar Leitura</button>-->
<!--
            <button type="button" id="btReload" name="btReload" class="btn btn-danger">Refazer Tudo</button>
          </div>
-->

          <div class="input-group mb-2 mr-sm-2"style="margin-top:.5rem!important;">
            <div class="input-group-prepend">
              <div class="input-group-text" id="divContador" name="divContador" style="color:#09F;">Frase: 1
              </div>
            </div>
            <input type="text" class="form-control" id="tFrase" style="height:auto" placeholder="Aguardando iniciar leitura." readonly>
    			  <audio id="aFrase" preload="auto"></audio>
            <button type="button" class="btn btn-warning" onclick="audio_play_pause()">&#9654; Ouvir</button>
          </div>


        <span class="buttons">
          <button type="button" id="play" name="play" class="btn btn-success">Iniciar Gravação</button>
          <!--<button type="button" id="pause" name="pause" class="btn btn-danger" disabled>Pausa</button>-->
          <button type="button" id="stop" name="stop" class="btn btn-primary" disabled>Terminar Gravação</button>
          <!--<button type="button" id="next" class="btn btn-primary" onClick="nextPhrase()" >Próxima frase</button>-->
        </span>

        <div class="card" align="left" style="width:20rem; margin-top:20px; margin-bottom:10px;">
          <div class="card-body" align="left">
            <div class="audios" align="left" >
              <p class="text-xl-left" align="left" style="font-size:120%; font-family:verdana; color:#09F;">Áudios gravados:</p>
            </div>
          </div>
        </div>

        <!--  <span class="buttons">
        <button id="play">play</button>
        <button id="pause" disabled>Pause</button>
        <button id="stop" disabled>Stop</button>
        </span>
        <span class="audios">
        </span> -->

        <div align="center" style="margin-top:10px;margin-bottom:10px;">
          <button type="button" id="btReload" name="btReload" class="btn btn-danger">Refazer Tudo</button>
          <button type="button" class="btn btn-secundary" onClick="inicio()">Voltar</button>
          <button type="button" class="btn btn-secundary" onClick="inicio()">Cancelar</button>
          <button type="button" class="btn btn-info" id="env_dados_server" name="env_dados_server">Enviar Dados</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body" style="align-self: center">
					<img id="img01"  src="imagens/termoAssentimento.png">	
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceito</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
              </div>
            </div>
          </div>
        </div>
  </div>

	<script>
		total_frases=49;
		//informar qual frase foi lida to server
		index_frase=0;
		index_frase_server=[];
		//armazena as frases
		frases_leitura = [];
		//armazenar os audios
		audio_server=[];
		idioma_leitura="";
		frase_atual=0;
		
		// colocado aqui para remover botao Iniciar leitura
		iniciarLeitura();

		function carregarFrasesPortCriancas(){
			frases_leitura[0]="Que dia lindo!";
			frases_leitura[1]="Está chovendo";
			frases_leitura[2]="Olha a borboleta está voando";
			frases_leitura[3]="Vamos brincar?";
			frases_leitura[4]="Eu não quero comer";
			frases_leitura[5]="Mamãe, estou com sono";
			frases_leitura[6]="Eu não quero dormir agora";
			frases_leitura[7]="Posso comer chocolate?";
			frases_leitura[8]="Eu vou escovar o dente";
			frases_leitura[9]="Eu não quero tomar banho";
			total_frases=9;		
			index_frase = Math.floor((Math.random() * total_frases));
					index_frase_server[frase_atual]=index_frase;
		};

		function carregarFrasesPort(){
			frases_leitura[0]="Gosto de jogar peteca com  minha irmã";
			frases_leitura[1]="O palhaço tem nariz vermelho";
			frases_leitura[2]="João caminhou na praia calmamente";
			frases_leitura[3]="O problema é que estou com fraqueza";
			frases_leitura[4]="Zeca, corra bem rápido pra igreja";
			frases_leitura[5]="A pesca é proibida nesse canto";
			frases_leitura[6]="O casarão foi vendido sem pressa";
			frases_leitura[7]="A chupeta da menina é amarela";
			frases_leitura[8]="O travesseiro é fofo e leve";
			frases_leitura[9]="Não gosto de frutas vermelhas";
			frases_leitura[10]="O elefante correu atrás da lebre";
			frases_leitura[11]="Você gosta de sorvete de abacaxi?";
			frases_leitura[12]="Esses são nossos bebezinhos";
			frases_leitura[13]="João deu dinheiro pro seu pai comprar um jogo";
			frases_leitura[14]="Vi Zé fazer essas viagens seis vezes";
			frases_leitura[15]="A pesca é proibida";
			frases_leitura[16]="Analfabetismo é um problema chato";
			frases_leitura[17]="Agindo sem pressa acertamos mais";
			frases_leitura[18]="Recebi meu pai pra almoçar";
			frases_leitura[19]="Trabalho é a vida do povo";
			frases_leitura[20]="Isso se resolverá de maneira tranquila";
			frases_leitura[21]="Os pesquisadores não acreditam nessa história";
			frases_leitura[22]="Nosso telefone está mudo";
			frases_leitura[23]="Desculpe se te chamo de velho";
			frases_leitura[24]="Ela não tem fome quando sai de casa";
			frases_leitura[25]="Preciso preservar a flora porque  a natureza é linda!";
			frases_leitura[26]="Neste caso, a gente fica mais  tranquilo";
			frases_leitura[27]="Foi muito difícil entender a canção de natal";
			frases_leitura[28]="Ainda não se sabe o dia da prova";
			frases_leitura[29]="A escuridão do quarto assustou a criança";
			frases_leitura[30]="Minha mãe não quer ir pro shopping";
			frases_leitura[31]="O gramado está florido";
			frases_leitura[32]="Será que hoje tem arroz com bife?";
			frases_leitura[33]="Ainda faltam seis minutos";
			frases_leitura[34]="Ela seguia discretamente";
			frases_leitura[35]="Hoje, eu não pude fazer minha ginástica";
			frases_leitura[36]="É possível que ele já esteja fora de perigo";
			frases_leitura[37]="Depois do almoço te encontro pro chá";
			frases_leitura[38]="Quero te ver bem quando ele voltar lá";
			frases_leitura[39]="Tenho muito orgulho de nossa gente";
			frases_leitura[40]="O inspetor faz a vistoria completa";
			frases_leitura[41]="Será muito difícil conseguir que eu";
			frases_leitura[42]="Você quer me dizer a data?";
			frases_leitura[43]="Desculpe, mas me atrasei no casamento";
			frases_leitura[44]="Faz um desvio em direção ao mar";
			frases_leitura[45]="O velho tigre ainda aceita combate";
			frases_leitura[46]="É hora do homem se humanizar mais";
			frases_leitura[47]="Ela ficou na fazenda por uma hora";
			frases_leitura[48]="Hoje irei precisar de você";
			frases_leitura[49]="Em ele o tempo flui num ritmo suave";
			total_frases=49;
			
			index_frase = Math.floor((Math.random() * total_frases));
					index_frase_server[frase_atual]=index_frase;
		}

		function carregarFrasesEsp(){
			frases_leitura[0]="Frase Espanhol 1";
			frases_leitura[1]="Frase Espanhol 2";
			frases_leitura[2]="Frase Espanhol 3";
			frases_leitura[3]="Frase Espanhol 4";
			frases_leitura[4]="Frase Espanhol 5";
			frases_leitura[5]="Frase Espanhol 6";
			frases_leitura[6]="Frase Espanhol 7";
			frases_leitura[7]="Frase Espanhol 8";
			frases_leitura[8]="Frase Espanhol 9";
			frases_leitura[9]="Frase Espanhol 10";
			total_frases=9;
			index_frase = Math.floor((Math.random() * total_frases));
					index_frase_server[frase_atual]=index_frase;
		}

		function carregarFrasesIng(){
			frases_leitura[0]="Frase Ingles 1";
			frases_leitura[1]="Frase Ingles 2";
			frases_leitura[2]="Frase Ingles 3";
			frases_leitura[3]="Frase Ingles 4";
			frases_leitura[4]="Frase Ingles 5";
			frases_leitura[5]="Frase Ingles 6";
			frases_leitura[6]="Frase Ingles 7";
			frases_leitura[7]="Frase Ingles 8";
			frases_leitura[8]="Frase Ingles 9";
			frases_leitura[9]="Frase Ingles 10";
			total_frases=9
		}

		function audio_play_pause() {
			var myAudio = document.getElementById("aFrase");
			if (myAudio.paused) {
				myAudio.play();
			} else {
				myAudio.pause();
			}
		}

		function iniciarLeitura(){

			if(true){//document.getElementById("iPort").checked == true){
				//limpando array frase e audio
				idioma_leitura="0";
				frases_leitura = [];
				audio_server=[];
				<?php
					$disturbio = $_POST["tDisturbio"];
				?>
				disturbio= <?=$disturbio?>;
				<?php
					$data =  $_POST['tNasc'];
				
					// separando yyyy, mm, ddd
					list($ano, $mes, $dia) = explode('-', $data);

					// data atual
					$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
					// Descobre a unix timestamp da data de nascimento do fulano
					$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

					// cálculo
					$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
				?>	
				idade = <?=$idade?>;
				if(disturbio==2 && idade<=12){
					carregarFrasesPortCriancas();
					document.getElementById("aFrase").src ="frases_audio_criancas/Frase"+index_frase+".wav";
				}
				else {
					carregarFrasesPort();
					document.getElementById("aFrase").src ="frases_audio/Frase"+index_frase+".wav";
				}
				document.getElementById("tFrase").value = frases_leitura[index_frase];
				//alert("A doação é composta de 10 frases fonéticamente balanceadas\napós a leitura de cada frase, clique em STOP, e vá para a próxima frase.\nao termino da leitura das 10 frases, enviar os dados para o servidor.");
					if(idade<=17){
						$('#exampleModal').find('.modal-title').text('Atenção!');
						$('#exampleModal').modal('show');
					}
				}else if(document.getElementById("iEsp").checked == true){
				//limpando array frase e audio
				idioma_leitura="1";
				frases_leitura = [];
				audio_server=[];
				carregarFrasesEsp();
				document.getElementById("tFrase").value = frases_leitura[frase_atual];
				document.getElementById("aFrase").src ="frases_audio/Frase"+frase_atual+".wav";
				//alert("A doação é composta de 10 frases fonéticamente balanceadas\napós a leitura de cada frase, clique em STOP, e vá para a próxima frase.\nao termino da leitura das 10 frases, enviar os dados para o servidor.");
				$('#exampleModal').find('.modal-title').text('Atenção!');
				$('#exampleModal').find('.modal-body').text('A doação é composta de frases fonéticamente balanceadas, após a leitura de cada frase, clique em STOP.No termino da leitura das frases, favor enviar os dados para o servidor.');
				$('#exampleModal').modal('show');
				}else if(document.getElementById("iIng").checked == true){
				//limpando array frase e audio
				idioma_leitura="2";
				frases_leitura = [];
				audio_server=[];
				carregarFrasesIng();
				document.getElementById("tFrase").value = frases_leitura[frase_atual];
				document.getElementById("aFrase").src ="frases_audio/Frase"+frase_atual+".wav";

				//alert("A doação é composta de 10 frases fonéticamente balanceadas\napós a leitura de cada frase, clique em STOP, e vá para a próxima frase.\nao termino da leitura das 10 frases, enviar os dados para o servidor.");
				$('#exampleModal').find('.modal-title').text('Atenção!');
				$('#exampleModal').find('.modal-body').text('A doação é composta de 10 frases fonéticamente balanceadas, após a leitura de cada frase, clique em STOP.No termino da leitura das 10 frases, favor enviar os dados para o servidor.');
				$('#exampleModal').modal('show');
		  	}else{
				//alert("Favor escolher um idioma.");
				$('#exampleModal').find('.modal-title').text('Atenção!');
				$('#exampleModal').find('.modal-body').text('Favor escolher um idioma.');
				$('#exampleModal').modal('show');
		  	}

		}

		let midia = {
		  audio: true,
		  video: false
		};

		let audioBlob, mediaRecorder;

		navigator.mediaDevices.getUserMedia(midia).then(stream =>{

		  mediaRecorder = new MediaRecorder(stream)

		  let chunks = []

		  mediaRecorder.ondataavailable = data => {
			chunks.push(data.data)
		  }

		  mediaRecorder.onstop = () => {

			let type = {
			  type: 'audio/wav'
			}
			audioBlob = new Blob(chunks, type)
			const reader = new window.FileReader()
			reader.readAsDataURL(audioBlob)


			reader.onloadend = () => {
			  //adicionando o audio para envio ao server
			  let binary = atob(reader.result.split(',')[1]);
			  let buffer = new ArrayBuffer(binary.length);
			  let bytes = new Uint8Array(buffer);
			  for (let i = 0; i < buffer.byteLength; i++) {
				bytes[i] = binary.charCodeAt(i) & 0xFF
			  }

			  audio_server.push(new Blob([bytes], type));
			  //alert("add");

			  //adicionando o player para preview
			  const audio = document.createElement('audio')
			  audio.src = reader.result
			  audio.autoplay = false
			  audio.controls = true
			  audio.controlsList = "nodownload"
			  const aud = document.createElement('div')
			  aud.appendChild(audio)
			  document.querySelector('.audios').appendChild(aud)

			  /*document.querySelectorAll('.down').forEach(item => {
			  item.addEventListener('click', e => {
			  let object = e.target
			  let binary = atob(object.parentNode.querySelector('audio').src.split(',')[1])
			  let buffer = new ArrayBuffer(binary.length)
			  let bytes = new Uint8Array(buffer)
			  for (let i = 0; i < buffer.byteLength; i++) {
			  bytes[i] = binary.charCodeAt(i) & 0xFF
			}
			//audio
			//let blob = new Blob([bytes], type)

			//enviarDados(new Blob([bytes], type));
			audio_server.push(new Blob([bytes], type));
			alert("add");
			//object.href = window.URL.createObjectURL(blob)
			//object.download = Math.random() * 1000 + '.wav'
			// window.URL.revokeObjectURL(object.href)
		  })
		})*/
				chunks = []
			  }
			}
		}).catch(err => {
		  let p = document.createElement('p')

		  p.innerText = 'An Error Occourred or browser dont have support'
		  document.querySelector('body').appendChild(p)
		  console.log(err)
		});

		let pl = document.querySelector('#play'),
		sp = document.querySelector('#stop')

		pl.addEventListener('click', () => {
		  if(idioma_leitura != ""){
			//if(frase_atual<10){
			  sp.disabled = !sp.disabled
			  pl.disabled = !pl.disabled
			  mediaRecorder.start()
			//}else{
          //alert("Leitura concluída, favor enviar os dados para terminar a doação.");
        // $('#exampleModal').find('.modal-title').text('Atenção!');
        //$('#exampleModal').find('.modal-body').text('Leitura concluída, favor enviar os dados para terminar a doação.');
        //$('#exampleModal').modal('show');
			//}
		  }else{
			//alert("Primeiro escolher o idiomar e iniciar a leitura.");
			$('#exampleModal').find('.modal-title').text('Atenção!');
			$('#exampleModal').find('.modal-body').text("Primeiro aperte o botão 'Iniciar Leitura.");
			$('#exampleModal').modal('show');
		  }
		});

		sp.addEventListener('click', () => {
		  sp.disabled = !sp.disabled
		  pl.disabled = !pl.disabled
		  mediaRecorder.stop()
		  // if(frase_atual<10){
		  //   if(frase_atual==9){
		  //     frase_atual++;
		  //     document.getElementById("tFrase").value = "FIM... Necessario enviar dados para o servidor!";
		  //     //document.getElementById("divContador").alt = "Frase "+frase_atual+":";
		  //   }else{

			  //frases_leitura.splice(index_frase, 1);
          frase_atual++;
        			  //enquanto o random gerar numeros de frases já lidas, gerar novamente outro numero
		  while($.inArray(index_frase, index_frase_server) !== -1){
				index_frase = Math.floor((Math.random() * total_frases));
		  }
			//total_frases--;
			//adicionando frase atual para o servidor e o array para controle das frases ditas
			index_frase_server[frase_atual]=index_frase;
			document.getElementById("tFrase").value = frases_leitura[index_frase];
			document.getElementById("aFrase").src ="frases_audio/Frase"+index_frase+".wav";
			jQuery("#divContador").html("Frase "+(frase_atual+1));

			  //document.getElementById("divContador").innerHTML = "Frase "+frase_atual;

		  //  }
		  // }else{
		  //   //alert("Leitura concluída, favor enviar os dados para terminar a doação.");
		  //   $('#exampleModal').find('.modal-title').text('Atenção!');
		  //   $('#exampleModal').find('.modal-body').text('Leitura concluída, favor enviar os dados para terminar a doação..');
		  //   $('#exampleModal').modal('show');
		  // }
		});

		function inicio(){
		  window.location.replace("inicio.php");
		}

		$("#btReload").click(function(event){
		  event.preventDefault();
		  location.reload();    // to reload the same page again
		});

		$("#env_dados_server").click(function(event){
		  event.preventDefault();
		  if(frase_atual >= 10){
			var form = new FormData();
			var i;
			var name = 'audios_data';
			for (i = frase_atual-1; i >= 0; i--) {
			  form.append('audios_data'+i, audio_server.pop());
			  form.append('id_frase'+i, index_frase_server[i]);
			}
      form.append('total_arquivos', frase_atual);
			form.append('cod_idioma', idioma_leitura);

			$.ajax({
			  url: "save_doacao.php",
			  type: 'POST',
			  data: form,
			  processData: false,
			  contentType: false,
			  cache: false,
			  success: function (data) {
				//debug resposta server
				//alert(data);
				if(data == "saved_part_sucess"){
				  //alert("Dados enviados com sucesso!");
				  $('#exampleModal').find('.modal-title').text('Atenção!');
				  $('#exampleModal').find('.modal-body').text('Participação concluida com sucesso, aguardando redirecionamento...');
				  setTimeout(function(){
					window.location.replace("inicio.php");
				  }, 5000);
				  $('#exampleModal').modal('show');

				}else{
				  //alert("Erro ao enviar dados ao servidor1!");
				  $('#exampleModal').find('.modal-title').text('Atenção!');
				  $('#exampleModal').find('.modal-body').text('Erro ao enviar dados ao servidor, aguardando redirecionamento...');
				  setTimeout(function(){
					window.location.replace("negocio_speech/erro_finish.php");
				  }, 5000);
				  $('#exampleModal').modal('show');
				}
			  },
			  error: function (error) {
          //alert("Erro ao enviar dados ao servidor2!");
          $('#exampleModal').find('.modal-title').text('Atenção!');
          $('#exampleModal').find('.modal-body').text('Erro ao enviar dados ao servidor, aguardando redirecionamento...');
          setTimeout(function(){
            window.location.replace("negocio_speech/erro_finish.php");
          }, 5000);
				  $('#exampleModal').modal('show');
			  }
			});

		  }else{
        //alert("Concluir a leitura das frases primeiro!");
        $('#exampleModal').find('.modal-title').text('Atenção!');
        $('#exampleModal').find('.modal-body').text('Por favor, grave pelo menos 10 frases!');
        $('#exampleModal').modal('show');
		  }
		});

		//function enviarDados(){}
		// Get the modal
		var modal = document.getElementById("myModal");

		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var img = document.getElementById("myImg");
		var modalImg = document.getElementById("img01");
		var captionText = document.getElementById("caption");
		img.onclick = function(){
			modal.style.display = "block";
			modalImg.src = this.src;
			captionText.innerHTML = this.alt;
		}

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() { 
			modal.style.display = "none";
		}

	</script>

	<?php
	}else{
	  ?>
	  <script>
		  //alert("Não foi possivel obter o ID, Nome e Email, favor iniciar novamente a doação.");
		  $('#exampleModal').find('.modal-title').text('Atenção!');
		  $('#exampleModal').find('.modal-body').text('Não foi possivel obter o ID, Nome e Email, favor iniciar novamente a doação.');
		  $('#exampleModal').modal('show');
		  window.location.replace("inicio.php");
	  </script>
<?php
	}

}else{
  ?>
	<script>
	  //alert("Necessário aceitar o termo (TCLE) e (TCUISV)!");
	  $('#exampleModal').find('.modal-title').text('Atenção!');
	  $('#exampleModal').find('.modal-body').text('Necessário aceitar os termos (TCLE) e (TCUISV) para continuar.');
	  $('#exampleModal').modal('show');
	  window.location.replace("inicio.php");
	</script>
<?php
}
?>
</html>
