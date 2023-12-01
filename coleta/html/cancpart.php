<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="imagem/png" href="imagens/favicon.png" />
  <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">

  <title>Sofia Fala - Coleta</title>
</head>
<body>

  <!--carregando sources javascrip -->
  <script src="jquery-3.3.1.min.js"></script>
  <script src="bootstrap4/js/bootstrap.min.js"></script>

  <div class="container">
    <div align="center">
      <img src="imagens/logo_stt.png" class="img-fluid" alt="Responsive image" width="100">
    </div>
  </br></br>
  <p class="text-xl-center" style="font-size:180%; font-family:verdana; color:#666;">Cancelamento de Participação na pesquisa</p>
</br>
<p class="text-xl-center" style="font-size:100%; font-family:verdana; color:#666;"><b>Identificador (ID)</b> insira o código para realizar o cancelamento da participação</p>

<div class="input-group input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-lg">ID</span>
  </div>
  <input type="text" class="form-control" id="tInscPart" name="tInscPart" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
</div>
<p class="text-xl-center" style="font-size:70%; font-family:verdana; color:#09F;"><b>Exemplo: 01590c3c-84ff-4a64-b2c8-02956dbe8b59</p>


  <div align="center" style="margin-top:10px;">
    <button type="button" class="btn btn-secundary" onClick="inicio()">Voltar</button>
    <button type="button" id="canc_part" name="canc_part" class="btn btn-info" onClick="cancelar()">Confirmar</button>
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
function inicio(){
  window.location.replace("inicio.php");
}

$("#canc_part").click(function(event){
  event.preventDefault();
  //alert("Sua participação foi cancelada com exito!");
  //window.location.replace("negocio_speech/canc_part.php");

  var form = new FormData();
  form.append('id_part_exc', document.getElementById("tInscPart").value);

  $.ajax({
    url: "negocio_speech/canc_part.php",
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
        $('#exampleModal').find('.modal-body').text('Cancelamento executado com êxito, aguardando redirecionamento...');
        setTimeout(function(){
          window.location.replace("inicio.php");
        }, 5000);
        $('#exampleModal').modal('show');

      }else if(data == "0"){
        //alert("Dados enviados com sucesso!");
        $('#exampleModal').find('.modal-title').text('Atenção!');
        $('#exampleModal').find('.modal-body').text('Não foi encontrada a participação com a inscrição informada, aguardando redirecionamento...');
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
});

//function cancelar(){}
</script>

</html>
