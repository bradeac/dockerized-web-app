<?php

include "util.php";

$mysql = getConnection();

$id = $_GET['id'];

$getEmployeeQuery = "
    SELECT * FROM ANGAJATI WHERE ID = ".$id."
";

$editResult = array();

$result = mysql_query($getEmployeeQuery);

while($row = mysql_fetch_assoc($result)){
	$editResult[] = $row;
}

echo json_encode($editResult);

//header('Location: ../edit.php');