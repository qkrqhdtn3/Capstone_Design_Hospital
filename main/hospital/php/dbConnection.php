<?php
	function dbConnection(){
		$host = 'hospital-21-1.cwpsy3rccui5.ap-northeast-2.rds.amazonaws.com';
		$user = 'root';
		$pw = '11223344';
		$dbName = 'Hospital_DB_21_1';
		$port = '3306';
		$con = new mysqli($host, $user, $pw, $dbName, $port);
		if (mysqli_connect_errno()){
			echo mysqli_connect_errno();
			exit();
		}
		return $con;
	}
	
	function getRowsInTable($tableName, $columnName, $val){
		$con = dbConnection();
		$sql = "
		SELECT * FROM {$tableName} WHERE {$columnName} = '{$val}' LIMIT 100
		";
		$result = mysqli_query($con, $sql);
		if($result == false){
			echo "error";
			echo mysqli_error($con);
		}
		mysqli_close($con);
		return $result;
	}

	function getRowsInTableToTwoElements($tableName, $columnName, $val, $columnName2, $val2){
		$con = dbConnection();
		$sql = "
		SELECT * FROM {$tableName} WHERE {$columnName} = '{$val}' AND {$columnName2} = '{$val2}' LIMIT 100
		";
		$result = mysqli_query($con, $sql);
		if($result == false){
			echo "error";
			echo mysqli_error($con);
		}
		mysqli_close($con);
		return $result;
	}
	
	function insertRowIntoUserHospitalDb($id, $password, $name, $sex, $dateBirth, $phoneNumber, $identityVerificationEmail){
		$con = dbConnection();
		$sql = "
			INSERT INTO userHospital
			(id, password, name, sex, dateBirth, phoneNumber, identityVerificationEmail)
			VALUES('{$id}','{$password}','{$name}', '{$sex}', '{$dateBirth}', '{$phoneNumber}', '{$identityVerificationEmail}'
			)";
		$result = mysqli_query($con, $sql);
		if($result == false){
		}
		mysqli_close($con);
		return $result;
	}
?>