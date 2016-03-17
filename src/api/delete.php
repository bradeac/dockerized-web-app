<?php

include "util.php";

$mysql = getConnection();

$id = $_GET['id'];

$getEmployeesQuery = "
	DELETE FROM ANGAJATI WHERE ID = ".$id."
";

$deleteResult = mysql_query($getEmployeesQuery);

//redirect back
header('Location: ../employees.php');

