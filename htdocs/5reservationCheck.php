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
	$id = $_SESSION['userId'];
	$sql = "
		SELECT * FROM reservation WHERE id = '{$id}' LIMIT 100
		";
	$result = mysqli_query($con, $sql);
	if($result == false){
		echo "error";
		echo mysqli_error($con);
	}
	else{
		//echo "완료<br>";
	}
	/*
	$row = mysqli_fetch_array($result);
	foreach($row as $key => $r){
		echo "{$key} : {$r} <br>";
	}
	*/
	/*
	while($row = mysqli_fetch_array($result)){
		echo "진료날짜 {$row['3']} 진료과 {$row['2']} 진료교수명 {$row['4']} 추가내용<br>";
	}
	*/
	/*
	if($row['id']==''){
		echo "<script>
			alert('아이디가 존재하지 않습니다. 로그인에 실패했습니다.');
			location.href='3login.html';</script>";
	}
	*/
	
	
	
	//echo "{$userId}";
	//mysqli_close($con);
?>