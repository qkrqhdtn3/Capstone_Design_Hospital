<?php
	session_start();
	include "./dbConnection.php";
	date_default_timezone_set('Asia/Seoul');
	
	$id = $_SESSION['userId'];
	$medicalDepartment = $_REQUEST['medicalDepartment'];
	$medicalProfessor = $_REQUEST['medicalProfessor'];
	$dateOfTreatment = $_REQUEST['dateOfTreatment'];
	$timeOfTreatment = $_REQUEST['timeOfTreatment'];
	$reservationDate = date("Y-m-d H:i:s");
	$symptomsEtc = $_REQUEST['symptomsEtc'];
	
	/*
	if(!$medicalDepartment){
		echo "<script>alert(\"진료과를 선택하세요.\");location.href=\"../5reservationhtml.php\";</script>";
		exit();
	}
	if(!$medicalProfessor){
		echo "<script>alert(\"진료 교수를 선택하세요.\");location.href=\"../5reservationhtml.php\";</script>";
		exit();
	}
	if(!$dateOfTreatment){
		echo "<script>alert(\"진료 날짜를 선택하세요.\");location.href=\"../5reservationhtml.php\";</script>";
		exit();
	}
	*/
	if(!$timeOfTreatment){
		echo "<script>alert(\"진료 시간을 선택하세요.\");location.href=\"../5reservationhtml.php\";</script>";
		exit();
	}
	
	// 진료과 교수, 진료 날짜 겹치면 예약 불가 (테스트 필요)
	$result = getRowsInTable('reservation', 'dateOfTreatment', $dateOfTreatment);
	// reservationList = 조건문으로 데이터베이스에서 가져온 예약목록
	$reservationList = array();
	while($row = mysqli_fetch_array($result))
	{
		array_push($reservationList, $row);
	}
	
	// 진료 날짜를 기준으로 탐색해 교수또는 사용자가 이미 예약이 있는지 확인하는 예외처리
	for($i=0 ; $i < count($reservationList) ; $i++){
		/*
		if($id==$reservationList[$i]['id']){
			echo "<script>
				alert(`{$_SESSION['userName']}님께서는 이미 해당 날짜로 예약된 기록이 있습니다.\n다른 날짜로 예약해주세요.\n진료 날짜: {$dateOfTreatment}, 진료 교수: {$reservationList[$i]['medicalProfessor']}, 예약 환자 이름: {$_SESSION['userName']}`);
				location.href = '../5reservationhtml.php';
				</script>";
			exit();
		}
		if($medicalProfessor==$reservationList[$i]['medicalProfessor']){
			echo "<script>
				alert(`선택하신 교수님과 날짜는 이미 예약이 되어있습니다.\n다시 예약해주세요.\n진료 날짜: {$dateOfTreatment}, 진료 교수: {$medicalProfessor}`);
				location.href = '../5reservationhtml.php';
				</script>";
			exit();
		}
		*/
	}
	
	// 예약 시작
	$result = insertRowIntoReservationDb($id, $medicalDepartment, $medicalProfessor, $dateOfTreatment, $timeOfTreatment, $reservationDate, $symptomsEtc);
	if($result == true){
		$_SESSION['progressMedicalDepartment']=$medicalDepartment;
		echo "<script>alert('예약이 완료되었습니다.'); location.href = '../7indexhtml.php';</script>";
	}
?>