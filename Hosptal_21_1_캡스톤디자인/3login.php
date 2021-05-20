<?php
	//$host = 'localhost';
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
	$password = $_REQUEST['password'];
	$sql = "
		SELECT * FROM user WHERE id = '{$id}'
		";
	$result = mysqli_query($con, $sql);
	if($result == false){
		echo "error";
		echo mysqli_error($con);
	}
	else{
		echo "완료";
	}
	
	// DB 정보, 비밀번호 가져온다.
	$row = mysqli_fetch_array($result);
	$hashedPassword = $row['password'];
	foreach($row as $key => $r){
		echo "{$key} : {$r} <br>";
	}
	
	// 비밀번호 검증
	$passwordResult = password_verify($password, $hashedPassword);
	if($passwordResult == true){
		// 로그인 성공
		// 세션에 id 저장
		session_start();
		$_SESSION['userId'] = $row['id'];
		print_r($_SESSION);
		echo $_SESSION['userId'];
		echo "<script>
			alert('로그인에 성공했습니다.');
			location.href='4medical_inquiry.html';</script>";
	}
	else{
		echo "<script>
			alert('로그인에 실패했습니다.');
			location.href='3login.html';</script>";
	}
	mysqli_close($con);
?>