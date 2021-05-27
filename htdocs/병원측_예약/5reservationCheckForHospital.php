<?
	$host = '127.0.0.1';
	$user = 'root';
	$pw = '112233';
	$dbName = 'reservation';
	$con = new mysqli($host, $user, $pw, $dbName, '3307');
	if (mysqli_connect_errno())
	{
		echo "An error occured. Please try again later.";
		exit();
	}
	$medicalProfessor = $_SESSION['userName'];
	$sql = "
		SELECT * FROM reservation WHERE medicalProfessor = '{$medicalProfessor}'
		";
	$result = mysqli_query($con, $sql);
	if($result == false){
		echo "error";
		echo mysqli_error($con);
	}
	else{
		echo "<script>alert('완료');</script>";
	}
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
			if($idList[$j]==$reservationList[$i]['1']){
				$t=1;
				break;
			}
			//echo $idList[$j];
		}
		if($t==0){
			array_push($idList, $reservationList[$i]['1']);
		}
		$t=0;
	}
	//print_r($idList);
	//echo count($reservationList);
	unset($result);
	mysqli_close($con);
?>