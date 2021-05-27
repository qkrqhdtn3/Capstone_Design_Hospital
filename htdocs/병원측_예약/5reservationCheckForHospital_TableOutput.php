<?php
	$con = new mysqli($host, $user, $pw, 'user', '3307');
	$rowList = array();
	for($i=0 ; $i < count($idList) ; $i++){
		$sql = "
			SELECT * FROM user WHERE id = '{$idList[$i]}'
			";
		$result = mysqli_query($con, $sql);
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
			if($rowList[$j]['0']==$reservationList[$i]['1']){
				array_push($reservationUserList, $rowList[$j]);
				break;
			}
		}
	}
	for($i=0 ; $i < count($reservationList) ; $i++){
		echo "
		<tr>
			<td>{$reservationUserList[$i]['2']}</td>
			<td>{$reservationUserList[$i]['3']}</td>
			<td>{$reservationUserList[$i]['5']}</td>
			<td>{$reservationUserList[$i]['4']}</td>
			<td>{$reservationList[$i]['3']}</td>
			<td>{$reservationList[$i]['1']}</td>
		</tr>";
	}
	unset($result);
	mysqli_close($con);
?>