<?php
	session_start();
	//$host = 'localhost';
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
	$id = $_SESSION['userId'];
	$medicalDepartment = $_REQUEST['medical_office'];
	$dateOfTreatment = $_REQUEST['reservation'];
	$medicalProfessor = $_REQUEST['medicalProfessor'];
	
	/*
	$dateOfTreatmentTmp = $_REQUEST['reservation'];
	list($year, $month, $date) = explode('-',$dateOfTreatmentTmp);
	var_dump($year, $month, $date);
	$dateOfTreatment = $year.$month.$date;
	*/
	
	// echo $name, $medicalDepartment, $dateOfTreatment, $medicalProfessor;
	
	$sql = "
		INSERT INTO reservation
		(id, medicalDepartment, dateOfTreatment, medicalProfessor)
		VALUES('{$id}', '{$medicalDepartment}', '{$dateOfTreatment}', '{$medicalProfessor}'
		)";
	//echo $sql;
	$result = mysqli_query($con, $sql);
	
	if($result == false){
		echo "error";
		echo mysqli_error($con);
	}
	else{
		echo "<script>alert('예약이 완료되었습니다.'); location.href = '6mapNpercent.html';</script>";
	}
	mysqli_close($con);
?>