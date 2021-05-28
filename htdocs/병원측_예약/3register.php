<?php
	$host = 'hospital-21-1.cwpsy3rccui5.ap-northeast-2.rds.amazonaws.com';
	$user = 'root';
	$pw = '11223344';
	$dbName = 'Hospital_DB_21_1';
	$con = new mysqli($host, $user, $pw, $dbName, '3306');
	if (mysqli_connect_errno())
	{
		echo "An error occured. Please try again later.";
		exit();
	}
	$id = $_REQUEST['id'];
	$password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
	$name = $_REQUEST['name'];
	$sex = $_REQUEST['sex'];
	$dateBirth = $_REQUEST['dateBirth'];
	$phoneNumber = $_REQUEST['phoneNumber'];
	$identityVerificationEmail = $_REQUEST['identityVerificationEmail'];
	$sql = "
		INSERT INTO userHospital
		(id, password, name, sex, dateBirth, phoneNumber, identityVerificationEmail)
		VALUES('{$id}','{$password}','{$name}', '{$sex}', '{$dateBirth}', '{$phoneNumber}', '{$identityVerificationEmail}'
		)";
	$result = mysqli_query($con, $sql);
	
	if($result == false){
		/*
		echo "error";
		echo mysqli_error($con);
		*/
		echo "<script>alert('중복된 ID입니다. 회원가입에 실패했습니다.'); location.href = '1main.html';</script>";
	}
	else{
		echo "<script>alert('회원가입에 성공했습니다.'); location.href = '1main.html';</script>";
	}
	mysqli_close($con);
?>