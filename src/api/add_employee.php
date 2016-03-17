<?php

include "util.php";

$mysql = getConnection();
$status = true;
$message = "";

//get the inputs
$requestData = array();
$requestData['lastNameField'] = (isset($_POST['lastNameField']) && (trim($_POST['lastNameField']) != '') ) ? $_POST['lastNameField'] : false;
$requestData['firstNameField'] = (isset($_POST['firstNameField']) && (trim($_POST['firstNameField']) != '') ) ? $_POST['firstNameField'] : false;
$requestData['functionField'] = (isset($_POST['functionField']) && (trim($_POST['functionField']) != '') ) ? $_POST['functionField'] : false;
$requestData['salarNegoField'] = (isset($_POST['salarNegoField']) && (trim($_POST['salarNegoField']) != '') ) ? $_POST['salarNegoField'] : false;
$requestData['salarRealField'] = (isset($_POST['salarRealField']) && (trim($_POST['salarRealField']) != '') ) ? $_POST['salarRealField'] : false;
$requestData['experienceField'] = (isset($_POST['experienceField']) && (trim($_POST['experienceField']) != '') ) ? $_POST['experienceField'] : false;
$requestData['sporField'] = (isset($_POST['sporField']) && (trim($_POST['sporField']) != '') ) ? $_POST['sporField'] : false;
$requestData['bruteprizeField'] = (isset($_POST['bruteprizeField']) && (trim($_POST['bruteprizeField']) != '') ) ? $_POST['bruteprizeField'] : false;
$requestData['compensationField'] = (isset($_POST['compensationField']) && (trim($_POST['compensationField']) != '') ) ? $_POST['compensationField'] : false;
$requestData['avansField'] = (isset($_POST['avansField']) && (trim($_POST['avansField']) != '') ) ? $_POST['avansField'] : false;
$requestData['retineriField'] = (isset($_POST['retineriField']) && (trim($_POST['retineriField']) != '') ) ? $_POST['retineriField'] : false;

//get percentages table defaults
$percentagesResult = mysql_query("SELECT * FROM PROCENTE");
$percentagesFetched = mysql_fetch_assoc($percentagesResult);


if($requestData['salarNegoField'] != false && $requestData['salarRealField'] != false
	 && $requestData['experienceField'] != false && $requestData['sporField'] != false
	 && $requestData['bruteprizeField'] != false && $requestData['compensationField'] != false){

	$taxes = calculateTaxes(array_merge($requestData, $percentagesFetched));
	
	$insertSqlQuery = "
		INSERT 
			INTO ANGAJATI
		(
			NUME,
			PRENUME, 
			FUNCTIE, 
			SALAR_NEGOCIAT,
			SALAR_REALIZAT,
			VECHIME,
			SPOR,
			PREMII_BRUTE,
			COMPENSATIE,
			TOTAL_BRUT,
			BRUT_IMPOZABIL,
			IMPOZIT,
			CAS,
			SOMAJ,
			SANATATE,
			AVANS,
			RETINERI,
			REST_PLATA
		)
		VALUES 
		(
			'".$requestData['lastNameField']."',
			'".$requestData['firstNameField']."',
			'".$requestData['functionField']."',
			".$requestData['salarNegoField'].",
			".$requestData['salarRealField'].",
			".$requestData['experienceField'].",
			".$requestData['sporField'].",
			".$requestData['bruteprizeField'].",
			".$requestData['compensationField'].",
			".$taxes['TOTAL_BRUT'].",
			".$taxes['BRUT_IMPOZABIL'].",
			".$taxes['IMPOZIT'].",
			".$taxes['CAS'].",
			".$taxes['SOMAJ'].",
			".$taxes['SANATATE'].",
			".$requestData['avansField'].",
			".$requestData['retineriField'].",
			".$taxes['REST_PLATA']."			
		)
	";

	$queryResult = mysql_query($insertSqlQuery);

	if($queryResult){
		$status = true;
		$message = "Angajat adaugat cu succes!";
	}else{
		echo mysql_error();
		$status = false;
		$message = "Angajat nu a fost adaugat. Au aparut probleme!";
	}


}else{
	$message = "Te rog sa completezi toate campurile din formular.";
	$status = false;
}

echo json_encode(array(
	'message' => $message,
	'status' => $status
));




