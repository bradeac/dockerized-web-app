<?php

include "api/util.php";

$mysql = getConnection();

$extraQuery = "";
$extraQuery .= isset($_GET['id']) ? "WHERE ID=". $_GET['id'] : "";

$getEmployeeQuery = "
    SELECT 
    	*
    FROM 
    ANGAJATI
    ".$extraQuery."
";

$data = array();

$result = mysql_query($getEmployeeQuery);

$total_salar_neg = 0;
$total_rest_plata = 0;
while($row = mysql_fetch_assoc($result)){
	$data[] = $row;
	$total_salar_neg += $row['SALAR_NEGOCIAT']; 
	$total_rest_plata += $row['REST_PLATA']; 

}
?>



<!DOCTY
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Proiect TI - Stat de plata</title>
  </head>

  <body>
  	<?php include "navigation.php"; ?>
  	<div style="margin-left:2%;" > 
	  	<div class='row'>
	  		<div class='col-md-4'><h2>STAT DE PLATA<h2></div>
	  		<div class='col-md-4'><h2><?php echo date('Y-m-d'); ?><h2></div>
	  		<div class='col-md-4'><button class="btn btn-default" id="printBtn">Tipareste</button></div>
	  	</div> 
  	
	  	<div class="row">
	  		<table class='table table-bordered table-striped'>
	  			<thead>
	  				<?php
	  					$resultColums = (count($data) > 0 ) ? array_keys($data[0]) : array();
	  					foreach($resultColums as $columnName){
	  						echo "<th>" . $columnName . "</th>";
	  					}
	  				?>
	  			</thead>
	  			<tbody>
	  				<?php
	  					foreach($data as $angajat){
	  						echo "<tr>"; 
	  						foreach($angajat as $key => $value) {
	  							echo "<td>" . $value . "</td>";
	  						}
	  						echo "</tr>";
	  					}
	  				?>

	  			</tbody>
	  		</table> 

	  	</div> 
	  	<div class="row">
	  		 <?php
	  			echo "Total salar negociat: ".$total_salar_neg;
	  			echo "<hr/>";
	  			echo "Total rest de plata: ".$total_rest_plata;
	  		?>
	  	</div>

  	</div>




  	<script type="text/javascript">
  		$("#printBtn").click(function(event){
  			window.print();
  		});
  	</script>

  </body>
 </html>
