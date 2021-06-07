<?php
	session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="한림대학교 캡스톤디자인 팀-Hospital">
        <meta name="description" content="복잡한 병원 절차를 도와주는 반응형 웹이다. 예약, 문진표, 진료 절차의 현재 진행 상황, 찾아가는 길을 알려준다. 환자가 편하게 현재 진행 상황을 확인하고 대기시간을 줄일 수 있다.">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
        <style media="screen">
            body {
                width: 90%;
				max-width: 500px;
                margin: 0 auto;
            }
			.navImg {
				width: 60%;
			}
			.logoImg {
				text-align: center;
			}
            .logoImg img {
				margin: 0 0 0 0%;
                width: 60%;
            }
			.welcomeUser {
				text-align: right;
				background-color: #EFFBEF;
			}
			.menu {
				height: 25.4%;
				background-color: #EFFBEF;
				margin: 0 0 9% 0;
			}
        </style>
    </head>
    <body>
        <div class="bgImg">
			<br>
			<div class="menu">
				<div class="logoImg">
					<img src="logo.png">
				</div>
				<div class="welcomeUser">
					<?php
						if (isset($_SESSION['userId'])) {
							echo "접속중인 id : {$_SESSION['userId']}<br>{$_SESSION['userName']}님 환영합니다.";
						}
					?>
				</div>
			</div>
			<br>
            <?php
				if (isset($_SESSION['userId'])) {
			?>
			<div align="center">
				<a class="navLinkLogout" href="3logouthtml.php"><img class="navImg" src="../3img/logout.jpg" width="60%"></a>
			</div>
			<br><br>
			<div align="center">
				<a class="navLinkNextPage" href="5reservationCheckhtml.php"><img class="navImg" src="../3img/reservationCheck.jpg" width="60%"></a>
			</div>
			<br><br
            <?php
				} else {
			?>
			<div align="center">
				<a class="navLinkLogin" href="3loginhtml.php"><img class="navImg" src="../3img/login.jpg" width="60%"></a>
			</div>
			<br><br>
			<div align="center">
				<a class="navLinkeActive" aria-current="page" href="2termsOfServicehtml.php"><img class="navImg" src="../3img/register.jpg" width="60%"></a>
			</div>
			<br><br>
            <?php
				}
			?>
        </div>
    </body>
</html>