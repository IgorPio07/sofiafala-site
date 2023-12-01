<?php if ($navbar): ?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js" integrity="sha384-lZmvU/TzxoIQIOD9yQDEpvxp6wEU32Fy0ckUgOH4EIlMOCdR823rg4+3gWRwnX1M" crossorigin="anonymous"></script>

<link href="css/style4.css" rel="stylesheet">
<link href="css/checkbox.css" rel="stylesheet">

<style>

.navbar-fixed-top {
  height: 0px;
}

body {
  padding-top: 50px;
}

.selecionar-frame {
  line-height: 2;
}

html, body, .container {
  height: 100%;
}

textarea.form-control {
  height: 100%;
  resize: none;
}

.btn-primary {
  padding: 8px 20px;
  background: #BC7271;
  color: #fff;
  border: none;
  margin-top: 10px;
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open>.dropdown-toggle.btn-primary {
  background: #FFB4B3;
  outline: none;
  box-shadow: none;
}

.navbar-logado{
  padding-top: 0px;
  background: #BC7271;
}

.dropdown-item:hover{
  background-color: #FFB4B3;
}

.btn-primary:disabled {
  background-color: #cccccc;
  color: #666666;
}

</style>

<div class="container-fluid"></div>
<nav id="navbar-login" class="navbar fixed-top transparent navbar-logado navbar-expand-md">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse"
        data-target=".navbar-collapse.collapse"> <span class="sr-only">Toggle navigation</span>
&#x2630;</button> <a class="navbar-brand"
        href="index.php"><span><img src="img/layout/logo_sofiafala.jpg" class="img-fluid" width="75" height="47.5" alt=""></span></a>
        <div
        class="navbar-collapse collapse">
            <div class="menu with-nav-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="nav-item"><a href="default.php" class="nav-link">P&#xE1;gina Inicial</a>
                    </li>
                    <li class="dropdown nav-item"> <a href="#" data-toggle="dropdown" class="nav-link">An&#xE1;lise <span class="caret"></span></a>
                        <ul
                        class="dropdown-menu" role="menu">
                            <li class="dropdown-item"><a href="analise.php?t=1">Beijo</a>
                            </li>
                            <li class="dropdown-item"><a href="analise.php?t=2">Estalo de L&#xED;ngua</a>
                            </li>
                            <li class="dropdown-item"><a href="analise.php?t=3">Sopro</a>
                            </li>
                </ul>
                </li>
                <?php if ($_SESSION[ 'permissao']==1 ): ?>
                <li role="presentation" class="nav-item"><a href="usuario.php" class="nav-link">Usu&#xE1;rios</a>
                </li>
                <li role="presentation" class="nav-item"><a href="foto.php" class="nav-link">Fotos</a>
                </li>
                <?php endif ?>
                <li role="presentation" class="text-right nav-item"><a href="index.php" class="nav-link">Sair</a>
                </li>
                </ul>
            </div>
    </div>
    </div>
</nav>

<?php endif ?>
