<?php
	include "./php/dbConnection.php";
	
	$medicalProfessor = $_SESSION['userName'];
	$result = getRowsInTable('reservation', 'medicalProfessor', $medicalProfessor);
	
	// reservationList = 데이터베이스에서 가져온 id 중복이 허용된 예약목록
	// idList = 데이터베이스에서 가져온 id가 중복되지 않은 아이디 리스트
	$reservationList = array();
	$idList = array();
	while($row = mysqli_fetch_array($result))
	{
		array_push($reservationList, $row);
	}
	//
	$t=0;
	for($i=0 ; $i < count($reservationList) ; $i++){
		//echo $reservationList[$i]['1'];
		for($j=0 ; $j < count($idList) ; $j++){
			if($idList[$j]==$reservationList[$i]['id']){
				$t=1;
				break;
			}
			//echo $idList[$j];
		}
		if($t==0){
			array_push($idList, $reservationList[$i]['id']);
		}
		$t=0;
	}
	//print_r($idList);
	//echo count($reservationList);
	
	$rowList = array();
	for($i=0 ; $i < count($idList) ; $i++){
		$result = getRowsInTable('user', 'id', $idList[$i]);
		if($result == false){
			echo "error";
			echo mysqli_error($con);
		}
		array_push($rowList, mysqli_fetch_array($result));
	}
	/*
	print_r($rowList[0]['0']);
	print_r($rowList[0]['2']);
	print_r($rowList[0]['3']);
	print_r($rowList[0]['5']);
	print_r($rowList[0]['4']);
	*/
	$reservationUserList = array();
	for($i=0 ; $i < count($reservationList) ; $i++){
		for($j=0 ; $j < count($rowList) ; $j++){
			if($rowList[$j]['id']==$reservationList[$i]['id']){
				array_push($reservationUserList, $rowList[$j]);
				break;
			}
		}
	}
	/*
	for($i=0 ; $i < count($reservationList) ; $i++){
		echo "
		<tr>
			<td>{$reservationUserList[$i]['2']}</td>
			<td>{$reservationUserList[$i]['3']}</td>
			<td>{$reservationUserList[$i]['4']}</td>
			<td>{$reservationUserList[$i]['5']}</td>
			<td>{$reservationList[$i]['dateOfTreatment']} {$reservationList[$i]['timeOfTreatment']}:00</td>
			<td>{$reservationList[$i]['symptomsEtc']}</td>
		</tr>";
	}
	*/
	for($i=0 ; $i < count($reservationList) ; $i++){
		echo "
		<tr>
			<td>{$reservationUserList[$i]['2']}/<br>{$reservationUserList[$i]['3']}</td>
			<td>{$reservationUserList[$i]['4']}/<br>{$reservationUserList[$i]['5']}</td>
			<td>{$reservationList[$i]['dateOfTreatment']} {$reservationList[$i]['timeOfTreatment']}:00</td>
			<td>{$reservationList[$i]['symptomsEtc']}</td>
		</tr>";
	}
	unset($result);
?>