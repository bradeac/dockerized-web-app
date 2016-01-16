<?php
	
	function getConnection(){
		$database = "localhost";
		$user = "root";
		$password = "";
		$database_name = "PROIECT_CAMIL";

		$connection = mysql_connect($database, $user, $password);

		if($connection){
			mysql_select_db($database_name);			
		}

		return $connection;
	}

	function calculateTaxes($params){
		$result = array();
		$result['TOTAL_BRUT'] = (intval($params['salarNegoField']) * intval($params['salarRealField']) / 100)
								* (1 + (intval($params['experienceField'])/100) + (intval($params['sporField'])/100) )
								+ intval($params['bruteprizeField']) + intval($params['compensationField']);

		$result['CAS'] = $result['TOTAL_BRUT'] * $params['CAS'];
		$result['SOMAJ'] = $result['TOTAL_BRUT'] * $params['SOMAJ'];
		$result['SANATATE'] = $result['TOTAL_BRUT'] * $params['SANATATE'];
		$result['BRUT_IMPOZABIL'] = $result['TOTAL_BRUT'] - $result['CAS'] - $result['SOMAJ'] - $result['SANATATE'];
		$result['IMPOZIT'] = $result['BRUT_IMPOZABIL'] * $params['IMPOZIT'];
		$result['REST_PLATA'] = $result['TOTAL_BRUT'] - $result['IMPOZIT'] - $result['CAS'] - $result['SOMAJ'] - $result['SANATATE'] - $params['retineriField'] - $params['avansField'];  

		foreach($result as $key => $value){
			$result[$key] = ceil($value);
		}

		//print_r($result);

		return $result;

	}


?>