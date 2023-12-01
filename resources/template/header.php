<?php
  include_once("resources/library/funcoes.php");
  $funcoes = new funcoes();
?>

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/set2.css" />
<link href="css/overwrite.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="js/fliplightbox.min.js"></script>
<script type="text/javascript">
  $('.portfolio').flipLightBox()
</script>

<style>
  /* body {
  padding-top: 130px;
  margin: 0;
  display: flex;
  min-height: 100vh;
  flex-direction: column;
} */

  html,
  body {
    height: 100%;
  }

  body {
    padding-top: 130px;
    display: flex;
    flex-direction: column;
  }

  .content {
    flex: 1 0 auto;
  }

  .footer {
    flex-shrink: 0;
  }

  .carousel-caption {
    top: 0;
    bottom: auto;
  }

  .carousel .item {
    height: 500px;
  }

  .item img {
    position: absolute;
    top: 0;
    left: 0;
    min-height: 500px;
  }

  #navbar {
    z-index: 1;
  }

  #imagem-centro img {
    margin-left: auto;
    margin-right: auto;
    display: block;
  }

  .center {
    margin-left: auto;
    margin-right: auto;
    display: block;
  }

  ​.img {
    float: left;
    height: 155 px;
  }

  /*** PANEL DEFAULT ***/
  .with-nav-tabs .nav-tabs>.open>a,
  .with-nav-tabs .nav-tabs>.open>a:hover,
  .with-nav-tabs .nav-tabs>.open>a:focus,
  .with-nav-tabs .nav-tabs>li>a:hover,
  .with-nav-tabs .nav-tabs>li>a:focus {
    background-color: #FFB4B3;
    border-color: transparent;
  }

  .with-nav-tabs .nav-tabs>li.active>a,
  .with-nav-tabs .nav-tabs>li.active>a:hover,
  .with-nav-tabs .nav-tabs>li.active>a:focus {
    background-color: #BC7271;
    border-color: #FFB4B3;
    border-bottom-color: transparent;
  }

  .with-nav-tabs .nav-tabs>li.dropdown .dropdown-menu {
    background-color: #BC7271;
    border-color: #FFB4B3;
  }

  .with-nav-tabs .nav-tabs>li.dropdown .dropdown-menu>li>a {
    color: #fff;
  }

  .with-nav-tabs .nav-tabs>li.dropdown .dropdown-menu>li>a:hover,
  .with-nav-tabs .nav-tabs>li.dropdown .dropdown-menu>li>a:focus {
    background-color: #FFB4B3;
  }

  .with-nav-tabs .nav-tabs>li.dropdown .dropdown-menu>.active>a,
  .with-nav-tabs .nav-tabs>li.dropdown .dropdown-menu>.active>a:hover,
  .with-nav-tabs .nav-tabs>li.dropdown .dropdown-menu>.active>a:focus {
    color: #fff;
    background-color: #FFB4B3;
  }
</style>


<?php if (!isset($_SESSION['usuario'])) : ?>
  <nav id="navPrincipal" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><span><img src="img/layout/logo_sofiafala.jpg" class="img-responsive" width="112" height="95" alt="" /></span></a>
      </div>

      <div class="navbar-collapse collapse">
        <div class="menu">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="index.php">Home</a></li>
            <li role="presentation"><a href="download.php">Download</a></li>
            <li role="presentation"><a href="sobre.php">Demo</a></li>
            <li role="presentation"><a <?= $funcoes->remover_classe($_SERVER['PHP_SELF']); ?> href="index.php#pesquisa">Publicações</a></li>
            <li role="presentation"><a <?= $funcoes->remover_classe($_SERVER['PHP_SELF']); ?> href="index.php#imprensa">Imprensa</a></li>
            <li role="presentation"><a <?= $funcoes->remover_classe($_SERVER['PHP_SELF']); ?> href="index.php#membros">Membros</a></li>
            <!-- <li role="presentation" ><a <?= $funcoes->remover_classe($_SERVER['PHP_SELF']); ?> href="index.php#documentos">Documentos</a></li> -->
            <li role="presentation"><a href="login.php">Área Restrita</a></li>
          </ul>
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="https://dcm.ffclrp.usp.br/coleta/html/inicio.php?">Colabore com o SofiaFala</a></li>
          </ul>
        </div>
      </div>
  </nav>
<?php endif ?>