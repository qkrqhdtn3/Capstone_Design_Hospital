<?php
	session_start();
	// 로그인 안됬을 시 index page로 이동
	if(!isset($_SESSION['userId'])) {
		echo "<script>location.href = 'index.php';</script>";
	}
?>
<html>
    <head>
		<meta charset="utf-8">
        <meta name="author" content="한림대학교 캡스톤디자인 팀-Hospital">
        <meta name="description" content="복잡한 병원 절차를 도와주는 반응형 웹이다. 예약, 문진표, 진료 절차의 현재 진행 상황, 찾아가는 길을 알려준다. 환자가 편하게 현재 진행 상황을 확인하고 대기시간을 줄일 수 있다.">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
        <style>
            /*
			.reservationTableOutput{
				// border-collapse:separate;
				border-spacing: 20px 10px;
				border: 1px solid black;
			}
			td{
				border: 1px solid black;
				margin: 20px;
				padding: 10px;
			}
			*/
            body {
                width: 90%;
				max-width: 500px;
                margin: 0 auto;
            }
            table.reservationTableOutput {
                border-collapse: separate;
                border-spacing: 0;
                border: 1px solid black;
                text-align: center;
                line-height: 1.5;
                margin: 20px 10px;
            }
            table.reservationTableOutput th {
                width: 155px;
                padding: 10px;
                font-weight: bold;
                vertical-align: top;
                border-right: 1px solid #ccc;
                border-bottom: 1px solid #ccc;
                border-top: 1px solid #fff;
                border-left: 1px solid #fff;
                background: #eee;
            }
            table.reservationTableOutput td {
                width: 155px;
                padding: 10px;
                vertical-align: top;
                border-right: 1px solid #ccc;
                border-bottom: 1px solid #ccc;
            }
			.logoImg img {
                width: 20%;
				float: right;
            }
			.welcomeUser {
				margin: 1% 2% 1% 2%;
				float: right;
			}
			.menu {
				height: 9%;
				background-color: #EFFBEF;
			}
			.divNavIndex {
				padding: 1% 0 0 0;
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
        </style>
    </head>
    <body>
        <div class="bgImg">
			<br>
			<div class="menu">
				<div style="float: left; font-size: 24px; padding: 2% 0 0 2%;">
					예약 확인
				</div>
				<div class="logoImg">
					<img src="./logo.png">
				</div>
				<div class="welcomeUser">
					<?php
						echo "접속중인 id : {$_SESSION['userId']}<br>{$_SESSION['userName']}님 환영합니다.";
					?>
				</div>
			</div>
			<div class="button">
				<a href="index.php"><img src="./6img/menu.jpg" width="80%"></a>
			</div>
			
			<div class="divNavIndex">
				<?php echo $_SESSION['userName']; ?>님의 예약 목록 확인입니다.
			</div>
            <table class="reservationTableOutput">
                <thead>
                    <tr>
                        <th scope="col">진료과</th>
                        <th scope="col">진료교수</th>
                        <th scope="col">진료날짜</th>
						<th scope="col">증상/기타사항</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						include "./php/5reservationCheck_TableOutput.php";
					?>
                    <!-- css 작업용 샘플
                    <tr>
                        <td>내용</td>
                        <td>내용</td>
                        <td>내용</td>
                        <td>내용</td>
                    </tr>
                    <tr>
                        <td>내용</td>
                        <td>내용</td>
                        <td>내용</td>
                        <td>내용</td>
                    </tr>
                    <tr>
                        <td>내용</td>
                        <td>내용</td>
                        <td>내용</td>
                        <td>내용</td>
                    </tr>
					-->
                </tbody>
            </table>
        </div>
		<div class="button1">
			<button input type="button" onclick="javascript:history.back()">이전페이지</button>
		</div>
    </body>
</html>