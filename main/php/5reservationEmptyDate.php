<?php
	include "./php/dbConnection.php";
	
	// 만약 진료날짜, 진료교수 값 없으면 위를 먼저 선택하라고 커서 옮기고 알림.
	// 진료날짜인 date 값 들어온다고 가정, 진료교수 김형섭 값 들어온다고 가정.
	function getTimeList($dateOfTreatment, $medicalProfessor){
		//echo $dateOfTreatment;
		//echo $medicalProfessor;
		$result = getRowsInTableToTwoElements('reservation', 'dateOfTreatment', $dateOfTreatment, 'medicalProfessor', $medicalProfessor);
		
		// reservationList = 데이터베이스에서 가져온 특정 진료 날짜와 일치하는 모든 예약목록
		// idList = 데이터베이스에서 가져온 id가 중복되지 않은 예약 시간 리스트
		$reservationList = array();
		$timeList = array();
		while($row = mysqli_fetch_array($result))
		{
			array_push($reservationList, $row);
		}
		
		// 진료 날짜를 기준으로 탐색해 교수또는 사용자가 이미 예약이 있는지 확인하는 예외처리
		$t=0;
		for($i=0 ; $i < count($reservationList) ; $i++){
			// (추가 구현 기능) count($timeList)가 최대값일 때 break하는 조건문
			for($j=0 ; $j < count($timeList) ; $j++){
				if($timeList[$j]==$reservationList[$i]['timeOfTreatment']){
					$t=1;
					break;
				}
			}
			if($t==0){
				array_push($timeList, $reservationList[$i]['timeOfTreatment']);
			}
			$t=0;
		}
		return $timeList;
	}
?>