<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Proiect Camil - Adaugare angajat</title>
  </head>

  <body>
  	<?php include "navigation.php"; ?>

    <div class="container">
      <h1> Adaugare angajat </h1>
      <hr/>

    <form>
    <div class="row">
      <div class="form-group col-md-3">
        <label for="lastNameField">Nume</label>
        <input type="text" class="form-control" id="lastNameField">
      </div>

      <div class="form-group col-md-3">
        <label for="firstNameField">Prenume</label>
        <input type="text" class="form-control" id="firstNameField">
      </div>

      <div class="form-group col-md-3">
        <label for="functionField">Functie</label>
        <input type="text" class="form-control" id="functionField">
      </div>

      <div class="form-group col-md-3">
        <label for="salarNegoField">Salar Negociat</label>
        <input type="text" class="form-control" id="salarNegoField">
      </div>

      <div class="form-group col-md-3">
        <label for="salarRealField">Salar Realizat</label>
        <input type="text" class="form-control" id="salarRealField">
      </div>

      <div class="form-group col-md-3">
        <label for="experienceField">Experience</label>
        <input type="text" class="form-control" id="experienceField">
      </div>

      <div class="form-group col-md-3">
        <label for="sporField">Spor</label>
        <input type="text" class="form-control" id="sporField">
      </div>

      <div class="form-group col-md-3">
        <label for="bruteprizeField">Premii Brute</label>
        <input type="text" class="form-control" id="bruteprizeField">
      </div>

      <div class="form-group col-md-3">
        <label for="compensationField">Compensatie</label>
        <input type="text" class="form-control" id="compensationField">
      </div>

      <div class="form-group col-md-3">
        <label for="avansField">Avans</label>
        <input type="text" class="form-control" id="avansField">
      </div>


      <div class="form-group col-md-3">
        <label for="retineriField">Retineri</label>
        <input type="text" class="form-control" id="retineriField">
      </div>

    </div>
    
    <div class="row">
    <button id="addButton" class="btn btn-primary pull-right">Adauga!</button>
    </div>
    </form>


    </div> <!-- /container -->
    

    <script type="text/javascript">
      $('#addButton').click(function(event){
        

        event.preventDefault();

        var requestData = {}; 

        requestData.lastNameField =  $('#lastNameField').val();
        requestData.firstNameField =  $('#firstNameField').val();
        requestData.functionField =  $('#functionField').val();
        requestData.salarNegoField =  $('#salarNegoField').val();
        requestData.salarRealField =  $('#salarRealField').val();
        requestData.experienceField =  $('#experienceField').val();
        requestData.sporField =  $('#sporField').val();
        requestData.bruteprizeField =  $('#bruteprizeField').val();
        requestData.compensationField =  $('#compensationField').val();
        requestData.avansField =  $('#avansField').val();
        requestData.retineriField =  $('#retineriField').val();

        console.log(requestData);

        var addRequest = makeAjaxRequest('api/add_employee.php', requestData);

        addRequest.success(function(data){
          var dataParsed = JSON.parse(data);
          if(dataParsed.status){
            alert('succes: ' + dataParsed.message);
          }else{
            alert('eroare: ' + dataParsed.message);
          }
          console.log(dataParsed);
        });



      });

    </script>

  </body>
</html>
