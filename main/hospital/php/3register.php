<?php
	include "./dbConnection.php";
	
	$id = $_REQUEST['id'];
	$password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
	$name = $_REQUEST['name'];
	$sex = $_REQUEST['sex'];
	$dateBirth = $_REQUEST['dateBirth'];
	$phoneNumber = $_REQUEST['phoneNumber'];
	$identityVerificationEmail = $_REQUEST['identityVerificationEmail'];
	
	$result = insertRowIntoUserHospitalDb($id, $password, $name, $sex, $dateBirth, $phoneNumber, $identityVerificationEmail);
	if($result == false){
		echo "<script>alert('중복된 ID입니다. 회원가입에 실패했습니다.'); location.href = '../index.php';</script>";
	}
	else{
		echo "<script>alert('회원가입에 성공했습니다.'); location.href = '../index.php';</script>";
	}
?>