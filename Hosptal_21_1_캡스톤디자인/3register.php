<?php
	$host = '127.0.0.1';
	$user = 'root';
	$pw = '112233';
	$dbName = 'user';
	$con = new mysqli($host, $user, $pw, $dbName, '3307');
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
		INSERT INTO user
		(id, password, name, sex, dateBirth, phoneNumber, identityVerificationEmail)
		VALUES('{$id}','{$password}','{$name}', '{$sex}', '{$dateBirth}', '{$phoneNumber}', '{$identityVerificationEmail}'
		)";
	$result = mysqli_query($con, $sql);
	
	if($result == false){
		echo "error";
		echo mysqli_error($con);
	}
	else{
		echo "<script>alert('회원가입에 성공했습니다'); location.href = '3main.html';</script>";
	}
	mysqli_close($con);
?>