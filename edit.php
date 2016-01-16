<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Proiect Camil - Editare angajat</title>
  </head>

  <body>
  	<?php include "navigation.php"; ?>

    <div class="container">
      <h1> Editare angajat </h1>
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
    <button id="editButton" class="btn btn-primary pull-right">Editare !</button>
    </div>
    </form>


    </div> <!-- /container -->


    <script type="text/javascript">
    
      $(document).ready(function(){

        var getEmployee = makeAjaxRequest('api/edit_employee.php', {});

        getEmployee.success(function(data){

          var dataParsed = JSON.parse(data);
          console.log(dataParsed);

            /*
              $('#lastNameField').val(getEmployee.lastNameField);
              $('#firstNameField').val(getEmployee.firstNameField);
              $('#functionField').val(getEmployee.functionField);
              $('#salarNegoField').val(getEmployee.salarNegoField);
              $('#salarRealField').val(getEmployee.salarRealField);
              $('#experienceField').val(getEmployee.experienceField);
              $('#sporField').val(getEmployee.sporField);
              $('#bruteprizeField').val(getEmployee.bruteprizeField);
              $('#compensationField').val(getEmployee.compensationField);
              $('#avansField').val(getEmployee.avansField);
              $('#retineriField').val(getEmployee.retineriField);

              */

       });  



      $('#editButton').click(function(event){
        

        event.preventDefault();


      });



      });
    
      

    </script>

  </body>
</html>
