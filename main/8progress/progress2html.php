<?php
	session_start();
	// 로그인 안됬을 시 index page로 이동
	if(!isset($_SESSION['userId'])) {
		echo "<script>location.href = '../index.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
		<link rel="stylesheet" href="style.css">
		<style media="screen">
			body {
				width: 90%;
				max-width: 500px;
				margin: 0 auto;
			}
			.logoImg img {
                width: 20%;
				float: right;
            }
			.welcomeUser {
				margin: 1% 2% 0 0;
				float: right;
			}
			.menu {
				height: 12%;
				background-color: #EFFBEF;
				padding: 0 0 12% 0;
			}
			button {
                height: 40px;
                border: none;
                color: white;
                background: orange;
                font-size: 1.25em;
                font-family: 'Nanum Gothic';
                border-radius: 4px;
                cursor: pointer;
            }
			div.button {
				float: right;
				cursor: pointer;
				margin: 1% 0 1% 0;
			}
			div.button1 {
                float: left;
            }
			div.button2 {
                float: right;
            }
		</style>
		<script>
			function goNextPage2(){
				window.location.href="progress3html.php";
			}
		</script>
	</head>
	<body>
		<div class="bgImg">
			<br>
			<div class="menu">
				<div style="float: left; font-size: 24px; padding: 2% 0 0 2%;">
					진행상황
				</div>
				<div class="logoImg">
					<img src="../logo.png">
				</div>
				<div class="welcomeUser">
					<?php
						if (isset($_SESSION['userId'])) {
							echo "접속중인 id : {$_SESSION['userId']}<br>{$_SESSION['userName']}님 환영합니다.";
						}
					?>
				</div>
			</div>
			<div>
				<div class="button">
					<a href="../index.php"><img src="../6img/menu.jpg" width="80%"></a>
				</div>
				<p>
					두번째 절차는 진료입니다.
				</p>
				<p>
					<?php 
						if(isset($_SESSION['progressMedicalDepartment'])){
							echo "{$_SESSION['progressMedicalDepartment']}로 가세요.";
						}
						else{
							echo "OO과로 가세요.<br>예약을 하고 오시면 진료과를 안내합니다.";
						}
					?>
					<form action="../7indexhtml.php">
						<input type="submit" value="길찾기">
					</form>
				</p>
				<image src="../8img/80.png" width="150"></image>
				<P>
					현재 단계가 완료되면 다음 버튼을 눌러 진행하세요.
				</P>
			</div>
			<div class="button1">
				<button input type="button" onclick="javascript:history.back()">이전페이지</button>
			</div>
			<div class="button2">
				<button input type="button" onclick="goNextPage2()">다음페이지</button>
			</div>
		</div>
	</body>
</html>