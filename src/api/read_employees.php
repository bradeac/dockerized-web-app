<?php

include "util.php";

$mysql = getConnection();

$getEmployeesQuery = "
	SELECT * FROM ANGAJATI
";

$result = array();

$resultSet = mysql_query($getEmployeesQuery);

while($row = mysql_fetch_assoc($resultSet)){
	$result[] = $row;
}

echo json_encode($result);
