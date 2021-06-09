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
			<div class="button">
				<a href="../index.php"><img src="../6img/menu.jpg" width="80%"></a>
			</div>
			<p>
				수납 완료
			</p>
			<p>
				모든 절차가 완료 되었습니다.
			</p>
			<image src="../8img/100.png"width="150"></image>
			<P>
				감사합니다.
			</P>
		</div>
	</body>
</html>
