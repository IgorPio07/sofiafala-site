<?php
  //ini_set('display_errors', 1);
  $navbar = false;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head runat="server">
  <title>Projeto Sofia - Entrar</title>
  <meta charset="utf-8">

  <?php include_once("resources/template/header.php"); ?>
</head>

<body>
  <div class="content">
    <br />
    <h3 class="widgetheading" style="text-align: center">Área Restrita (Login Fonoaudiólogos)</h3>

    <div id="dvLogin" class="card card-container col-md-8 col-md-offset-2">
      <form class="frmLogin" method="POST" action="resources/library/verificar-login.php">
        <span id="reauth-email" class="reauth-email"></span>
        <input type="text" id="txtUsuario" name="Usuario" class="form-control" placeholder="Usuario" required="required" autofocus="autofocus" />
        <br />
        <input type="password" id="txtSenha" name="Senha" class="form-control" placeholder="Senha" required />
        <br />
        <button id="btnLogar" name="btnLogar" class="btn btn-lg btn-primary btn-block btn-signin" type="submit" value="entrar">Entrar</button>
      </form>
    </div>
</div>

<?php include_once("resources/template/footer.php"); ?>
</body>

</html>
