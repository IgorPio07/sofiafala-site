<?php
//esconder erros e warnings do php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();

if(isset($_POST["tact"])){
  $_SESSION["termo_aceito"] = $_POST["tact"];
}

if(strcasecmp($_SESSION["termo_aceito"],'101') == 0){
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
  </head>
  <body>

    <!--carregando sources javascrip -->
    <script src="jquery-3.3.1.min.js"></script>
    <script src="bootstrap4/js/bootstrap.min.js"></script>
    <script src="booststrapmask/dist/js/bootstrap-formhelpers.js"></script>

    <div class="container" style="width:98%;margin-bottom:20px;">
      <div class="container" align="center">
          <div align="center" style="margin-top:20px;margin-bottom:10px;">
            <img src="imagens/logo_stt.png" class="img-fluid" alt="Responsive image" width="100">
          </div>
            <h2>Segundo Passo - Cadastro de participante com distúrbio de fala</h2>
            <!-- gerado no final do formulario -->
            <h3 id="inscricao">
            </h3>
      </div>
      <p class="text-xl-center" align="center" style="font-size:100%; font-family:verdana; color:#F00;">(*) Campos obrigatórios</p>

<form id="formDados" name="formDados" method="POST" action="doacao_voz.php">
  <div class="form-row">

    <div class="form-group col-md-3">
      <label for="tIdCad">ID</label>
      <input type="text" class="form-control" id="tIdCad" name="tIdCad" value="" readonly>
    </div>

<!--
    <div class="form-group col-md-4">
      <label for="tNome">Nome </label><label style="color:#F00">*</label>
      <input type="text" class="form-control" id="tNome" name="tNome" placeholder="Insira seu nome">
    </div>
-->

    <div class="form-group col-md-4">
      <label for="tEmail">E-mail </label><label style="color:#F00">*</label>
      <input type="text" class="form-control" id="tEmail" name="tEmail" placeholder="Insira seu e-mail">
      <small id="emailHelp" class="form-text text-muted">Exemplo asdf@domain.com</small>
    </div>

    <div class="form-group col-md-2">
      <label for="tSexo">Sexo</label><label style="color:#F00">*</label>
        <select id="tSexo" name="tSexo" class="custom-select" required>
          <option value="">Escolha</option>
          <option value="F">Feminino</option>
          <option value="M">Masculino</option>
        </select>
    </div>

    <div class="form-group col-md-2">
      <label for="tDisturbio">Distúrbio advém</label><label style="color:#F00">*</label>
      <select id="tDisturbio" name="tDisturbio" class="custom-select" required>
        <option value="">Escolha</option>
        <option value="1">Alteração de fala em criança/articulatória/apraxia/disartria</option>
        <option value="2">Síndrome de Down (T21)</option>
        <option value="3">Transtorno do Espectro Autista (TEA)</option>
        <option value="4">Acidente Vascular Cerebral (AVC)</option>
        <option value="5">Deficiência Auditiva</option>
        <option value="6">Deficiência Intelectual</option>
        <option value="7">Outro: ___</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="tNasc">Data de nascimento</label><label style="color:#F00">*</label>
      <input type="date" class="form-control" id="tNasc" name="tNasc" placeholder="Nascimento" data-format="dd/mm/aaaa">
      <small id="nascHelp" class="form-text text-muted">Exemplo dd/mm/aaaa</small>
    </div>

<!--
    <div class="form-group col-md-4">
      <label for="tCid">Cidade de nascimento</label><label style="color:#F00">*</label>
      <input type="text" class="form-control" id="tCid" name="tCid" placeholder="Cidade">
      <small id="cidHelp" class="form-text text-muted">Exemplo Ribeirão Preto</small>
    </div>

    <div class="form-group col-md-2">
      <label for="tUf">UF</label><label style="color:#F00">*</label>
      <select id="tUf" name="tUf" class="custom-select" required>
        <option value="">Escolha</option>
        <option value="ac">Acre</option>
        <option value="al">Alagoas</option>
        <option value="am">Amazonas</option>
        <option value="ap">Amapá</option>
        <option value="ba">Bahia</option>
        <option value="ce">Ceará</option>
        <option value="df">Distrito Federal</option>
        <option value="es">Espírito Santo</option>
        <option value="go">Goiás</option>
        <option value="ma">Maranhão</option>
        <option value="mt">Mato Grosso</option>
        <option value="ms">Mato Grosso do Sul</option>
        <option value="mg">Minas Gerais</option>
        <option value="pa">Pará</option>
        <option value="pb">Paraíba</option>
        <option value="pr">Paraná</option>
        <option value="pe">Pernambuco</option>
        <option value="pi">Piauí</option>
        <option value="rj">Rio de Janeiro</option>
        <option value="rn">Rio Grande do Norte</option>
        <option value="ro">Rondônia</option>
        <option value="rs">Rio Grande do Sul</option>
        <option value="rr">Roraima</option>
        <option value="sc">Santa Catarina</option>
        <option value="se">Sergipe</option>
        <option value="sp">São Paulo</option>
        <option value="to">Tocantins</option>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="tTel">Celular</label>
      <input type="text" class="form-control bfh-phone" id="tTel" name="tTel" placeholder="Telefone" data-format="dd ddddd-dddd">
      <small id="telHelp" class="form-text text-muted">Exemplo (45) 12345-9876</small>
    </div>

    <div class="form-group col-md-4">
      <label for="tRg">RG</label>
      <input type="text" class="form-control" id="tRg" name="tRg" placeholder="RG">
      <small id="rgHelp" class="form-text text-muted">Exemplo 12345678-9</small>
    </div>

    <div class="form-group col-md-3">
      <label for="tEnd">Endereço</label>
      <input type="text" class="form-control" id="tEnd" name="tEnd" placeholder="Endereço">
      <small id="endHelp" class="form-text text-muted">Exemplo Av. Brasil, 1000 - Centro</small>
    </div>

    <div class="form-group col-md-4">
      <label for="tCidRes">Cidade/UF de Residência Atual</label><label style="color:#F00">*</label>
      <input type="text" class="form-control" id="tCidRes" name="tCidRes" placeholder="Cidade/UF">
      <small id="cidResHelp" class="form-text text-muted">Exemplo Ribeirão Preto/SP</small>
    </div>
-->
<!--
    <div class="form-group col-md-2">
      <label for="tCep">CEP</label>
      <input type="text" class="form-control" id="tCep" name="tCep" placeholder="CEP">
    </div>
-->
<!--
    <div class="form-group col-md-2">
      <label for="tUf">UF</label>
      <select id="tUf" name="tUf" class="custom-select" required>
        <option value="">Escolha</option>
        <option value="ac">Acre</option>
        <option value="al">Alagoas</option>
        <option value="am">Amazonas</option>
        <option value="ap">Amapá</option>
        <option value="ba">Bahia</option>
        <option value="ce">Ceará</option>
        <option value="df">Distrito Federal</option>
        <option value="es">Espírito Santo</option>
        <option value="go">Goiás</option>
        <option value="ma">Maranhão</option>
        <option value="mt">Mato Grosso</option>
        <option value="ms">Mato Grosso do Sul</option>
        <option value="mg">Minas Gerais</option>
        <option value="pa">Pará</option>
        <option value="pb">Paraíba</option>
        <option value="pr">Paraná</option>
        <option value="pe">Pernambuco</option>
        <option value="pi">Piauí</option>
        <option value="rj">Rio de Janeiro</option>
        <option value="rn">Rio Grande do Norte</option>
        <option value="ro">Rondônia</option>
        <option value="rs">Rio Grande do Sul</option>
        <option value="rr">Roraima</option>
        <option value="sc">Santa Catarina</option>
        <option value="se">Sergipe</option>
        <option value="sp">São Paulo</option>
        <option value="to">Tocantins</option>
      </select>
    </div>
-->
  </div>
</form>

  <div align="center" style="margin-top:10px;margin-bottom:15px;">
    <button type="button" class="btn btn-secundary" onClick="voltar()">Voltar</button>
    <button type="button" class="btn btn-secundary" onClick="inicio()">Cancelar</button>
    <button type="button" class="btn btn-info" onClick="continuar()">Continuar</button>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

<script>

//função para gerar id UUID para o cadastro
function uuidv4() {
  return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
    return v.toString(16);
  });
}

function validar(){
  //var nome = document.getElementById("tNome");
  var email = document.getElementById("tEmail");
  var nasc = document.getElementById("tNasc");
  var sexo = document.getElementById("tSexo");
  var disturbio = document.getElementById("tDisturbio");
  //var tel = document.getElementById("tTel");
  //var rg = document.getElementById("tRg");
  //var end = document.getElementById("tEnd");
  // var cid = document.getElementById("tCid");
  //var cidRes = document.getElementById("tCidRes");
  //var cep = document.getElementById("tCep");
  //var uf = document.getElementById("tUf");

/*
  if(nome.value == ""){
    //alert("Nome é obrigatório.");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('Nome é obrigatório.');
    $('#exampleModal').modal('show')
    return false;
  }
*/
  if(email.value == ""){
    //alert("E-mail é obrigatório");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('E-mail é obrigatório.');
    $('#exampleModal').modal('show');
    return false;
  }

  if(nasc.value == ""){
    //alert("Data de nascimento é obrigatório");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('Data de nascimento é obrigatório.');
    $('#exampleModal').modal('show');
    return false;
  }

  if(sexo.value == ""){
    //alert("Sexo é obrigatório");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('Sexo é obrigatório.');
    $('#exampleModal').modal('show');
    return false;
  }

  if(disturbio.value == ""){
    //alert("Tipo de Distúrbio é obrigatório");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('Tipo de Distúrbio é obrigatório.');
    $('#exampleModal').modal('show');
    return false;
  }
/*
   if(tel.value == ""){
    //alert("Telefone é obrigatório");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('Telefone é obrigatório.');
    $('#exampleModal').modal('show');
    return false;
  }

   if(rg.value == ""){
    //alert("RG é obrigatório");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('RG é obrigatório.');
    $('#exampleModal').modal('show');
    return false;
  }

   if(end.value == ""){
    //alert("Endereço é obrigatório");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('Endereço é obrigatório.');
    $('#exampleModal').modal('show');
    return false;
  }

   if(cid.value == ""){
    //alert("Endereço é obrigatório");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('Cidade de Nascimento é obrigatório.');
    $('#exampleModal').modal('show');
    return false;
  }

   if(cidRes.value == ""){
    //alert("Endereço é obrigatório");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('Cidade de Residência é obrigatório.');
    $('#exampleModal').modal('show');
    return false;
  }

   if(cep.value == ""){
    //alert("CEP é obrigatório");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('CEP é obrigatório.');
    $('#exampleModal').modal('show');
    return false;
  }

 if(uf.value == ""){
    //alert("Estado é obrigatório");
    $('#exampleModal').find('.modal-title').text('Atenção!');
    $('#exampleModal').find('.modal-body').text('Estado é obrigatório.');
    $('#exampleModal').modal('show');
    return false;
  }
*/
  return true;
}

function continuar(){
  if(validar()){
    //window.location.replace("doacao_voz.php");
    document.getElementById("formDados").submit();
  }
}

function inicio(){
  window.location.replace("inicio.php");
}

function voltar(){
  window.location.replace("termo.php");
}

//gerando id para o cadastro
var tID = document.getElementById("tIdCad");
tID.value = uuidv4();

document.getElementById("inscricao").innerHTML = "Coloquei o valor aqui";

</script>

<?php
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
