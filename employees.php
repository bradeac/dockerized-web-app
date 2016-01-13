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
      <h1> Angajati </h1>
      <hr/>
      <div id="table_area"></div>
    </div> <!-- /container -->

    <script type="text/javascript">
      $(document).ready(function(){
        var getEmployees = makeAjaxRequest('api/read_employees.php', {});
        getEmployees.success(function(data){
          var dataParsed = JSON.parse(data);
          var header = [];
          if(dataParsed.length > 0){
            for(var i in dataParsed[0]){
              header.push(i);
            }
          }

          console.log(header);

          console.log(data);

          var table_area = document.getElementById('table_area');

          var table = document.createElement('table');
          table.className = "table table-bordered";

          //build the header
          var thead = document.createElement('thead');
          var trThead = document.createElement('tr');
          for(var i in header){
            var th = document.createElement('th');
            th.innerHTML = header[i];
            trThead.appendChild(th);
          }
          //add the extra action column
          var actionColumnHeader = document.createElement('th');
          actionColumnHeader.innerHTML = 'Actions';
          trThead.appendChild(actionColumnHeader);
          thead.appendChild(trThead);


          //build the table body
          var tbody = document.createElement('tbody');
          for(var i in dataParsed){
            var tr = document.createElement('tr');
            for(var j in dataParsed[i]){
              var td = document.createElement('td');
              td.innerHTML = dataParsed[i][j];
              tr.appendChild(td);
            }

            var editButton = document.createElement('a');
            editButton.innerHTML = "Edit";
            editButton.className = 'btn btn-default';
            editButton.href = 'edit.php?id=' + dataParsed[i].ID;
            tr.appendChild(editButton);

            var deleteButton = document.createElement('a');
            deleteButton.innerHTML = "Delete";
            deleteButton.className = 'btn btn-danger';
            deleteButton.href = 'api/delete.php?id=' + dataParsed[i].ID;
            tr.appendChild(deleteButton);
            tbody.appendChild(tr);
          }
          
          table.appendChild(thead);
          table.appendChild(tbody);
          table_area.appendChild(table);

        });

      });

    </script>

  </body>
</html>
