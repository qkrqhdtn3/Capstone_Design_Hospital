<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="한림대학교 캡스톤디자인 팀-Hospital">
        <meta name="description" content="복잡한 병원 절차를 도와주는 반응형 웹이다. 예약, 문진표, 진료 절차의 현재 진행 상황, 찾아가는 길을 알려준다. 환자가 더 마음을 놓고 편안하게 현재 상황을 확인하고 대기시간을 줄일 수 있다.">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
        <style>
            body {
                width: 90%;
				max-width: 500px;
                margin: 0 auto;
            }
            .loginForm {
                margin: 20% 0 0 0;
            }
            .loginForm > p {
                margin: 13 0 0 3;
                font-weight: 550;
            }
            .loginForm > input {
                margin: 0;
                height: 30px;
                font-size: 16px;
                border-radius: 8px;
            }
            .pageBtn {
                display: flex;
                flex-wrap: wrap;
                justify-content: flex-end;
                margin: 40px 0 20px;
            }
			.bgImg {
				background-image: url('logo.png');
                /* 배경이미지를 반복하지 마세요.*/
                background-repeat: no-repeat;
                /* 배경이미지를 중앙에 표시하세요.*/
                background-position: right top;
                background-size: 40%;
			}
			button {
				height: 30px;
				border: none;
				color: white;
				background: orange;
				font-size: 1.25em;
				font-family: 'Nanum Gothic';
				border-radius: 4px;
				cursor: pointer;
			}
			div.button1 {
                float: left;
            }
            div.button1:hover {
                border: 2px solid black;
            }
            div.button2 {
                float: right;
            }
            div.button2:hover {
                border: 2px solid black;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <div class="bgImg">
			<br>
            <form class="loginForm" action="./php/3login.php" method="POST">
                <p>아이디</p>
                <input type="text" name="id" id="id" size="20" required>
                <p>비밀번호</p>
                <input type="password" name="password" id="password" size="20" required>
                <br><br>
                <div class="button2">
                    <button input type="submit" onclick="goNextPage()">다음페이지</button>
				</div>
            </form>
			<div class="button1">
				<button input type="button" onclick="javascript:history.back()">이전페이지</button>
			</div>
        </div>
		<script>
			// 다음 페이지로 이동하는 함수. 필요한 내용을 작성 안했을 경우 다음 페이지로 이동할 수 없다.
			function goNextPage() {
				if ($('#id').val() == '' || $('#password').val() == '') {
					alert("모두 작성해주세요.");
					return 0;
				}
				$('.loginForm').submit();
				return 0;
			}
		</script>
    </body>
</html>