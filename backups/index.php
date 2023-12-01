<?php
  include('_cnx.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SofiaFala - Software Inteligente de Apoio &agrave; Fala</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/set2.css" />    
	<link href="css/overwrite.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  </head>
  <body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html"><span><img src="imagens/logo_sofiafala.jpg" class="img-responsive" width="150" height="95" alt=""/></span></a>
			</div>
			<div class="navbar-collapse collapse">							
				<div class="menu">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="index.html">Home</a></li>
						<li role="presentation" ><a class="scroll" href="#sobre">Sobre</a></li>
                        <li role="presentation" ><a class="scroll" href="#pesquisa">Pesquisa</a></li>
						<li role="presentation" ><a class="scroll" href="#membros">Membros</a></li>
						<li role="presentation" ><a class="scroll" href="#documentos">Documentos</a></li>
					</ul>
				</div>
			</div>			
		</div>
	</nav>
	
	
	<div class="container">
		<div class="row">
			<div class="slider">
				<div class="img-responsive">
					<ul class="bxslider">				
						<li><img src="imagens/slider1.jpg" alt=""/></li>								
						<li><img src="imagens/slider2.jpg" alt=""/></li>	
						<li><img src="imagens/slider3.jpg" alt=""/></li>			
					</ul>
				</div>	
			</div>
		</div>
	</div>
		
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="text-center">
					<h2>Bem vindo ao SofiaFala</h2>
                    <p>O Projeto SofiaFala tem como objetivo o desenvolvimento de um sistema inteligente e interativo como tecnologia de apoio ao 
                    treinamento de fala de crianças com SD. O treinamento pretendido se dará por meio de demonstração e prática de percepção auditiva 
                    e articulatória dos sons de fala isoladamente, em palavras e durante narrativa oral (mensagem). Assim, o sistema deverá se adaptar 
                    às características do usuário para melhor conduzi-lo no processo de evolução da fala, isto é, o sistema terá comportamentos distintos 
                    com usuários diferentes devido à singularidade, dificuldade e potencialidade de cada um, e seu uso deverá ser indicado e acompanhado 
                    por um fonoaudiólogo clínico como apoio ao processo de intervenção terapêutica</p>
                    
					<!--<p>A síndrome de down é causada pela presença de três cromossomos 21 em todas ou na maior parte das células de um indivíduo. 
                       Isso ocorre na hora da concepção de uma criança. As pessoas com síndrome de Down, ou trissomia do cromossomo 21, têm 47 
                       cromossomos em suas células em vez de 46, como a maior parte da população.</p>
                       
                    <p>As pessoas com síndrome de Down têm muito mais em comum com o resto da população do que diferenças. Para inserção da pessoa 
                       com SD na sociedade, enquanto cidadão, a deficiência intelectual e as dificuldades de fala verbal não devem ser considerados 
                       um empecilho para o exercício desse direito. As limitações na área de aprendizagem devem ser fortemente consideradas, respeitando 
                       a individualidade, o potencial produtivo e a capacidade laborativa das pessoas com SD. Porém, para que essas limitações não 
                       sejam impeditivas para o desenvolvimento, o aprendizado e a participação efetiva da pessoa com SD na sociedade, a comunicação 
                       torna-se o elemento-chave.</p> 
                       
                    <p>A criança é capaz de sentir, amar, aprender, se divertir e trabalhar. Poderá ler e escrever, deverá ir à escola como qualquer 
                       outra criança e levar uma vida autônoma. Em resumo, ela poderá ocupar um lugar próprio e digno na sociedade 
                       (Fonte: APAE Rio do Sul). </p>-->

				</div>
				<hr>
			</div>
		</div>
	</div>
    
	<div class="container" id="sobre">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="text-center">
					<h2>Sobre o SofiaFala</h2>
                    <p>O projeto SofiaFala foi idealizado pela Dra. Marinalva Soares, cientista da computação e mãe da Sofia de 3 anos que tem Síndrome 
                    de Down. O projeto foi concebido e estruturado em 2016 em conjunto com a Profa. Dra. Alessandra Alaniz, coordenadora do projeto. 
                    Dra. Marinalva conseguiu unir os diferentes especialistas colaboradores de áreas distintas em prol do desenvolvimento desta proposta.<br />
                    A expectativa é que a Sofia e outras crianças possam aprimorar a comunicação verbal, por meio do uso do sistema proposto, e assim possam falar mais 
                    fluentemente e com segurança para poderem integrar e interagir no contexto familiar, educacional e social exercendo seus direitos e deveres 
                    como qualquer cidadão brasileiro. O nome do sistema, SofiaFala, foi criado pela proponente deste projeto em homenagem à “Sofia”.<br />
                    De acordo com o atual cenário, o projeto tem como principal objetivo apoiar a produção da fala de crianças com síndrome de Down. Atualmente, 
                    o projeto possui uma professora, da área de Ciência da Computação, responsável pela coordenação do projeto; uma professora do curso de 
                    Fonoaudiologia da FMRP-USP responsável pelo núcleo de fonoaudiologia; 12 pesquisadores-colaboradores, dentre os quais, encontram-se médicos, 
                    professores da USP, fonoaudiólogas, psicólogas, terapeutas; e dois bolsistas.  As pesquisas a serem conduzidas durante o projeto concentram-se, 
                    basicamente, no treinamento para percepção e produção da fala com o auxílio de tecnologias assistivas.
                    </p>
                    
                    
		<!--			<p>“Dra. Marinalva Soares, cientista da computação e pós-doutoranda em Sensoriamento Remoto, é a idealizadora deste projeto e mãe da 
                    Sofia de 3 anos que tem Síndrome de Down, a qual foi sua principal fonte de inspiração. Sua expectativa é que a Sofia e outras crianças 
                    possam melhorar a comunicação verbal, por meio do uso do sistema proposto, e assim possam falar mais fluentemente e com segurança para 
                    poderem participar efetivamente da sociedade exercendo seus direitos e deveres como qualquer cidadão brasileiro. Dra. Marinalva conseguiu 
                    unir os diferentes especialistas colaboradores de áreas distintas em prol do desenvolvimento desta proposta. O nome do sistema, SofiaFala, 
                    foi criado pela proponente deste projeto em homenagem à Sofia”
                    <br /><br />
                    De acordo com o atual cenário, o projeto foi concebido em 2016 e tem como principal objetivo apoiar a produção da fala de crianças com 
                    síndrome de down. Atualmente o projeto possui uma professora responsável pela coordenação do projeto; uma fonoaudióloga responsável pelo 
                    núcleo de fonoaudiologia; 12 pesquisadores-colaboradores, dentre os quais, encontram-se médicos, professores da USP, fonoaudiólogas, 
                    psicólogas, terapeutas; e dois bolsistas.  As pesquisas a serem conduzidas durante o projeto concentram-se, basicamente, no treinamento 
                    da fala com o auxílio de tecnologias assistivas.-->
                    </p>
				</div>
				<hr>
			</div>
		</div>
	</div> 
    
	<div class="container" id="pesquisa">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="text-center">
                    <h2>Pesquisas relacionadas</h2>
                    <p>A Síndrome de Down é um acidente genético ocorrido na divisão celular, o que pode ocorrer em qualquer gestação, independente de raça, 
                    etnia, condição social e idade. Essa síndrome não é uma doença e não é progressiva, ou seja, não se agrava com o tempo. É conhecido que 
                    as chances de se ter um filho com SD se elevam em mulheres acima de 35 anos, mas o mesmo acontece, inexplicavelmente, em mulheres abaixo 
                    dos 30 anos. A SD caracteriza-se por sinais físicos peculiares sendo a deficiência intelectual, a dificuldade na fala e a hipotonia os 
                    sintomas mais comuns.<br />
                    As pessoas com síndrome de Down têm muito mais em comum com o resto da população do que diferenças. Para inserção da pessoa com SD na 
                    sociedade, enquanto cidadão, a deficiência intelectual e as dificuldades de linguagem oral (verbal) não devem ser considerados um empecilho 
                    para o exercício desse direito, portanto a intervenção precoce e durante todo o ciclo vital é necessário, pois contribuirá para o 
                    desenvolvimento de habilidades e competências para a aprendizagem global,  consideradas, respeitando a individualidade, o potencial 
                    produtivo e a capacidade laborativa das pessoas com SD. Porém, para que essas limitações não sejam impeditivas para o desenvolvimento, 
                    o aprendizado e a participação efetiva da pessoa com SD na sociedade, a comunicação oral e escrita tornam-se o elemento-chave. <br />
                    A criança tem a capacidade de sentir, amar, aprender, se divertir e trabalhar. Poderá ler e escrever, deverá ir à escola como qualquer 
                    outra criança e levar uma vida autônoma. Em resumo, ela poderá ocupar um lugar próprio e digno na sociedade (Fonte: APAE Rio do Sul). 

                    Diversas ONGs e instituições nacionais e internacionais tem investido esforços e apoiado pessoas com deficiência intelectual e suas famílias. 
                    Dentre as quais é importante destacar:<br /><br />

                    <strong>Nacionais:</strong><br /><br />
                    
                    <a href="http://www.fsdown.org.br/" target="_blank">http://www.fsdown.org.br/</a><br />
                    <a href="http://www.movimentodown.org.br/" target="_blank">http://www.movimentodown.org.br/</a><br />
                    <a href="https://reviverdown.org.br" target="_blank">https://reviverdown.org.br</a><br />
                    <a href="http://www.federacaodown.org.br/portal/" target="_blank">http://www.federacaodown.org.br/portal/</a><br />
                    <a href="http://www.adid.org.br;" target="_blank">http://www.movimentodown.org.br/</a><br />
                    <a href="http://www.ceesd.org.br" target="_blank">http://www.ceesd.org.br</a><br /><br />
                    
                    <strong>Internacionais:</strong><br /><br />
                    
                    <a href="http://www.nads.org/" target="_blank">http://www.nads.org/</a><br />
                    <a href="http://www.globaldownsyndrome.org/" target="_blank">"http://www.globaldownsyndrome.org/</a><br />
                    <a href="https://ds-int.org" target="_blank">https://ds-int.org</a><br />
                    <a href="http://www.dsrf.org/about-us/" target="_blank">http://www.dsrf.org/about-us/</a><br />
                    <a href="http://cdss.ca/" target="_blank">http://cdss.ca/</a><br />
                    <a href="https://www.downs-syndrome.org.uk" target="_blank">https://www.downs-syndrome.org.uk</a><br />
                    <a href="https://www.downsyndromefoundation.org/" target="_blank">https://www.downsyndromefoundation.org/</a>
                    </p>
                    
					<!--<p>O Projeto SofiaFala tem como objetivo o desenvolvimento de um sistema inteligente e interativo como tecnologia de assistência ao 
                    treinamento de fala de crianças com SD. O treinamento pretendido se dará por meio de demonstração e de treinamento da articabulários, 
                    articulação das palavras e dos sons para produção da mensagem que se deseja verbalizar. Dessa maneira, o usuário (criança) terá um modelo 
                    feito pelo profissional Fonoaudiólogo para apoiar seu treinamento. O sistema deverá se adaptar às características do usuário para melhor 
                    conduzi-lo no processo de evolução da fala, isto é, o sistema terá comportamentos distintos com usuários diferentes devido à singularidade, 
                    dificuldade e potencialidade de cada um.
                    </p>-->

				</div>
				<hr>
			</div>
		</div>
	</div>                    
    
	<div class="container">
		<div class="row">
			<div class="box">
				<div class="col-md-4">
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.4s">
						<h4>Publicações</h4>					
							<div class="icon">
                                <i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i>
							</div>						
						<p>........................</p>
						<div class="ficon">
							<a href="#" class="btn btn-default" role="button">Leia Mais</a>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.0s">
						<h4>Notícias</h4>
						<div class="icon">
							<i class="fa fa-desktop fa-3x"></i>
						</div>
						<p>........................</p>
						<div class="ficon">
							<a href="#" class="btn btn-default" role="button">Leia Mais</a>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.6s">
						<h4>Eventos</h4>
						<div class="icon">
							<i class="fa fa-location-arrow fa-3x"></i>
						</div>
						<p>........................</p>
						<div class="ficon">
							<a href="#" class="btn btn-default" role="button">Leia Mais</a>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="container" id="membros">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="text-center">
					<h2>Membros</h2>
				</div>
				<hr>
			</div>
		</div>
	</div>
	
	<div class="content">
		<div class="grid">
			<figure class="effect-sofiafala"><!--effect-zoe-->
				<img src="imagens/membro_Alessandra_Alaniz.jpg" alt="Alessandra_Alaniz" />
				<figcaption>
					<h4>Prof&ordf; Dr&ordf;<br /><span>Alessandra Alaniz<br /> Macedo</span></h4>
                    <p class="icones">
						<a href="http://lattes.cnpq.br/2407277993285186" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Coordenadora do projeto</b><br/>Extra&ccedil;&atilde;o de Informa&ccedil;&atilde;o<br />FFCLRP – USP</p>
				</figcaption>			
			</figure>
			<figure class="effect-sofiafala">
				<img src="imagens/membro_Patricia_Mandra.jpg" alt="Patricia_Mandra"/>
				<figcaption>
					<h4>Prof&ordf; Dr&ordf;<br /><span>Patricia P. Mandrá</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/0726260574298864" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Docente Curso Fonoaudiologia</b><br/>Transtornos da linguagem e fala<br /> na inf&acirc;ncia, FMRP - USP</p>
				</figcaption>			
			</figure>
		</div>
	</div>

    <div class="content">
		<div class="grid">
            <figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Marinalva_D_Soares.jpg" alt="Marinalva D. Soares"/>
				<figcaption>
					<h4>Prof&ordf; Dr&ordf;<br /><span>Marinalva D. Soares</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/6047184744431931" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Reconhecimento de padrões e<br/> processamento de imagens</b><br/>Pesquisadora – INPE</p>
				</figcaption>	
			</figure>        
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Alinne_Cristinne_Correa_Santos.jpg" alt="Alinne Cristinne Corrêa dos Santos"/>
				<figcaption>
					<h4><!--Prof&ordm; -->Dr&ordf;<br /><span>Alinne Cristinne<br /> Corrêa Souza</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/7003131006996441" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Engenharia de Requisitos</b><br/>Pós-doutoranda – DCM – USP</p>
				</figcaption>			
			</figure>
		</div>
	</div> 
	
    <div class="content">
		<div class="grid">
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Francisco_Carlos_Monteiro_Souza.jpg" alt="Francisco Carlos Monteiro Souza"/>
				<figcaption>
					<h4>Dr&ordm;<br /><span>Francisco Carlos<br /> Monteiro Souza</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/0057958225738520" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Engenharia de Software baseada em Busca</b><br/>Pós-doutorando – DCM – USP</p>
				</figcaption>			
			</figure>
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/.jpg" alt="Gilberto Medeiros Nakamura"/>
				<figcaption>
					<h4><!--Prof&ordm;-->Dr&ordm;<br /><span>Gilberto Medeiros Nakamura</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/9758892425695434" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Física Estatística e Termodinâmica</b><br/>DCM – USP</p>
				</figcaption>			
			</figure>
		</div>
	</div>    
    
   <div class="content">
		<div class="grid">
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Carolina_Watanabe.jpg" alt="Carolina Yukari Veludo Watanabe"/>
				<figcaption>
					<h4>Prof&ordf; Dr&ordf;<br /><span>Carolina Yukari<br/> Veludo Watanabe</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/5070373341032103" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Processamento Gráfico</b><br/>DI – UNIR</p>
				</figcaption>			
			</figure>
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Luiz_Otavio_Murta.jpg" alt="Luiz_Otavio_Murta"/>
				<figcaption>
					<h4>Prof&ordm; Dr&ordm;<br /><span>Luiz Otavio Murta</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/0276583403489241" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Processamento de Sinais e Imagem</b><br/>Pesquisador Colaborador, USP</p>
				</figcaption>			
			</figure>
		</div>
	</div>
    
	<div class="content">
		<div class="grid">
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Jose_Augusto_Baranauskas.jpg" alt="Jose_Augusto_Baranauskas"/>
				<figcaption>
					<h4>Prof&ordm; Dr&ordm;<br /><span>José Augusto Baranauskas</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/4050202318600269" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Classificação de Dados</b><br/>Pesquisador Colaborador, USP</p>
				</figcaption>			
			</figure>
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Vilson_Rosa_Almeida.jpg" alt="Vilson R. de Almeida "/>
				<figcaption>
					<h4>Prof&ordm; Dr&ordm;<br /><span>Vilson R. de Almeida </span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/2520874965506616" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Engenharia Biomédica</b><br/>Pesquisador ITA</p>
				</figcaption>			
			</figure>            
		</div>
	</div>
    
	<div class="content">
		<div class="grid">
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Zan_Mustacchi.jpg" alt="Zan Mustacchi"/>
				<figcaption>
					<h4>Dr&ordm;<br /><span>Zan Mustacchi</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/4419319234242523" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Geneticista especialista em<br/> síndrome de Down</b><br/>Médico Geneticista e Pediatra - USP</p>
				</figcaption>			
			</figure>
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Danielle_Magalhaes_Moraes.jpg" alt="Danielle Magalhães Moraes"/>
				<figcaption>
					<h4><!--Prof&ordf;--> Dr&ordf;<br /><span>Danielle Magalhães Moraes</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/7793443233826191" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Sensores</b><br/>Pesquisadora ITA</p>
				</figcaption>			
			</figure>
		</div>
	</div>    

    <div class="content">
		<div class="grid">
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Andrea Leao_Doescher.jpg" alt="Andréa Leão Doescher"/>
				<figcaption>
					<h4><!--Prof&ordm; Dr&ordm;--><br /><span>Andréa M. Leão Doescher</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/0440854881429269" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Epidemiologia</b><br/>Psicóloga Doutoranda - UNIFESP</p>
				</figcaption>			
			</figure>
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Maraisa_Helena_Borges_Estevao_Pereira.jpg" alt="Maraísa Helena Borges Estêvão Pereira"/>
				<figcaption>
					<h4><!--Prof&ordm; Dr&ordm;--><br /><span>Maraísa Helena Borges<br /> Estêvão Pereira</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/9768757387259360" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Doutoranda em Ciencia de<br/>la Educación, Humanidad y Artes</b><br/>Especialista em neuropsicopedagogia</p>
				</figcaption>			
			</figure>            
		</div>
	</div>
    
    <div class="content">
		<div class="grid">
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Maria_Roberta_Dias_Veneziani_Cantarelli.jpg" alt="Maria Roberta Dias Veneziani Cantarelli"/>
				<figcaption>
					<h4><!--Prof&ordf; Dr&ordf;<br />--><span>Maria Roberta Dias<br />Veneziani Cantarelli</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/9166118554622109" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Fonoaudiologia e Equoterapia</b><br/>Fonoaudióloga na clínica M&W Reabilitação</p>
				</figcaption>			
			</figure>
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Myrian_Christina_Neves.jpg" alt="Myrian Christina Neves"/>
				<figcaption>
					<h4><!--Prof&ordm; Dr&ordm;--><br /><span>Myrian Christina Neves</span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/1732160193750270" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description">Fonoaudióloga na clínica M&W Reabilitação</p>
				</figcaption>			
			</figure>
		</div>
	</div>
    
    <div class="content">
		<div class="grid">

			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Aline_Saraiva.jpg" alt="Aline Saraiva Guerreiro Camargo "/>
				<figcaption>
					<h4><!--Prof&ordm; Dr&ordm;--><br /><span>Aline Saraiva<br /> Guerreiro Camargo </span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/2315626804304828" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Psicologia Cognitiva</b><br/>Psicóloga e Especialista em Psicoterapia Cognitiva<br/> na Clinica Nosso Espaço</p>
				</figcaption>			
			</figure>
			<figure class="effect-sofiafala">
				<img src="imagens/membro_bck.jpg" alt="membro_bck"/>
                <img class="foto" src="imagens/membro_Alessandra_Yoshida.jpg" alt="Alessandra Yoshida "/>
				<figcaption>
					<h4><!--Prof&ordm; Dr&ordm;--><br /><span>Alessandra Yoshida </span></h4>
					<p class="icones">
						<a href="http://lattes.cnpq.br/4360147174147661" target="_blank"><span class="icon-ellipsis"></span></a>
						<a href="#"><span class="icon-eye"></span></a>
						<a href="#"><span class="icon-paper-clip"></span></a>
					</p>
					<p class="description"><b>Fisioterapia e Terapia Ocupacional</b><br/>Terapeuta Ocupacional no<br/> Centro Terapêutico Vale Crescer</p>
				</figcaption>			
			</figure>        
		</div>
	</div>
    
	<div class="container" id="documentos">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="text-center">
					<h2>Documentos</h2>
				</div>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="text-center">
                  <?php
						   $strsql = "select dataenvio, titulo, arquivo,  
							(select descricao from projeto_sofiafala_tipoarquivos where codprojeto_sofiafala_tipoarquivos = PSA.codprojeto_sofiafala_tipoarquivos )
							from projeto_sofiafala_arquivos PSA";
	  
						   $DBV = new DB;
						   $result = $DBV->query($strsql);
						   if($result) {
							 $nrows = $DBV->num_rows($result);
							 if($nrows != 0)
							 {
								while($r = $DBV->fetch_array($result)) {
								  
								  echo '<a href="download.php?arquivo='.$r["arquivo"].'&tipo=projetosofia">'.$r["titulo"].'-'.$r["dataenvio"].'</a><br />';
								}  
								
						     }
						   } 
					  $DBV->close();		  
				  ?>

                </div>
             </div>
        </div>
        <hr>
    </div>
    
	<footer>
		<div class="inner-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 f-about">
						<a href="index.html"><h1><span>SofiaFala</span></h1></a>
						<p>Software Inteligente de Apoio &agrave; Fala</p>
					</div>
					<div class="col-md-4 l-posts">
						<h3 class="widgetheading">Últimas notícias</h3>
						<ul>
							<li><a href="http://redeglobo.globo.com/sp/tvvanguarda/vanguardamix/videos/t/edicoes/v/sindrome-de-down/6280049/">
Descobrindo a Sindrome de Down</a></li>
							<li><a href="#">Notícia 2</a></li>
							<li><a href="#">Notícia 3</a></li>
							<li><a href="#">Notícia 4</a></li>
						</ul>
					</div>
					<div class="col-md-4 f-contact">
						<h3 class="widgetheading">Contato</h3>
						<a href="#"><p><i class="fa fa-envelope"></i> mail@mail.com</p></a>
						<p><i class="fa fa-phone"></i>  (16) 3315 0000</p>
						<p><i class="fa fa-home"></i> Av. Bandeirantes, 3900<br />
							Monte Alegre, Ribeirão Preto - SP<br />
							Bloco 1, DCM - FFCLRP - USP</p>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="last-div">
			<div class="container">
				<div class="row">
					<div class="copyright">
						&copy; SofiaFala - Departamento de Computação e Matemática - USP
                        <div class="credits">
                        </div>
					</div>					
				</div>
			</div>
			<div class="container">
				<div class="row">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
					</ul>
				</div>
			</div>
			
			<a href="" class="scrollup"><i class="fa fa-chevron-up"></i></a>	
				
			
		</div>	
	</footer>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script src="js/functions.js"></script>	
	<script type="text/javascript">$('.portfolio').flipLightBox()</script>
    
    <script type="text/javascript">
    jQuery(document).ready(function($) { 
        $(".scroll").click(function(event){        
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top - 80 }, 800);
       });
    });
    </script>
    
</body>
</html>