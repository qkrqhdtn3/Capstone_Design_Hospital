<?php
	include "./dbConnection.php";
	
	$id = $_REQUEST['id'];
	$password = $_REQUEST['password'];
	
	$result = getRowsInTable('user', 'id', $id);
	
	// DB 정보, 비밀번호 가져온다.
	$row = mysqli_fetch_array($result);
	$hashedPassword = $row['password'];
	
	if(!$row['id']){
		echo "<script>
			alert('아이디가 존재하지 않습니다. 로그인에 실패했습니다.');
			location.href='../3loginhtml.php';</script>";
	}
	
	// 비밀번호 검증
	$passwordResult = password_verify($password, $hashedPassword);
	if($passwordResult == true){
		// 로그인 성공
		// 세션에 id 저장
		//session_set_cookie_params(0,"/");
		session_start();
		$_SESSION['userId'] = $row['id'];
		$_SESSION['userName'] = $row['name'];
		echo "<script>
			alert('로그인에 성공했습니다.');
			location.href='../index.php';</script>";
	}
	else{
		echo "<script>
			alert('비밀번호가 틀렸습니다. 로그인에 실패했습니다.');
			location.href='../3loginhtml.php';</script>";
	}
?>