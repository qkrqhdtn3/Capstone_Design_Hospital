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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <style media="screen">
            body {
                width: 90%;
				max-width: 500px;
                margin: 0 auto;
            }
            div.elem-group {
                margin: 10px 0;
            }
            div.title-name {
                width: 85%;
                display: inline-block;
                float: front;
                margin-left: 0;
                font-size: 0.95em;
            }
            div.elem-group.inlined {
                width: 85%;
                display: inline-block;
                float: front;
                margin-left: 0;
                font-size: 0.95em;
                border-width: 10px border-color: black;
                border-style: solid;
            }
            label {
                display: block;
                font-family: 'Nanum Gothic';
                padding-bottom: 2px;
                font-size: 1.25em;
            }
            div.elem-group.inlined input {
                width: 20%;
                display: inline-block;
            }
            hr {
                border: 1px dotted #ccc;
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
            div.button1:hover {
                border: 2px solid black;
            }
            div.button2 {
                float: right;
            }
            div.button2:hover {
                border: 2px solid black;
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
				height: 9%;
				background-color: #EFFBEF;
			}
        </style>
    </head>
    <body>
		<div class="bgImg">
			<br>
			<div class="menu">
				<div style="float: left; font-size: 24px; padding: 2% 0 0 2%;">
					문진표
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
			<form class="medicalInquiryForm" action="5reservationhtml.php" method="post">
            
                <div class="title-Name">
                    <label for="reservation-date">발열증상이 있다.</label>
                </div>
                <div class="elem-group inlined">
                    <label><input type="radio" name="no1" value="yes">
                        예</label>
                    <label><input type="radio" name="no1" value="no">
                        아니요</label>
                </div>
                <div class="title-Name">
                    <label for="reservation-date">기침,인후통등 호흡기 증상이 있다.</label>
                </div>
                <div class="elem-group inlined">
                    <label><input type="radio" name="no2" value="yes">
                        예</label>
                    <label><input type="radio" name="no2" value="no">
                        아니요</label>
                </div>
                <div class="title-Name">
                    <label for="reservation-date">몸살이나 근육통 증상이 있다.</label>
                </div>
                <div class="elem-group inlined">
                    <label><input type="radio" name="no3" value="yes">
                        예</label>
                    <label><input type="radio" name="no3" value="no">
                        아니요</label>
                </div>
                <div class="title-Name">
                    <label for="reservation-date">현재 자가격리중이다.</label>
                </div>
                <div class="elem-group inlined">
                    <label><input type="radio" name="no4" value="yes">
                        예</label>
                    <label><input type="radio" name="no4" value="no">
                        아니요</label>
                </div>
                <div class="title-Name">
                    <label for="reservation-date">14일 이내로 확진자와 접촉한 사실이 있다.</label>
                </div>
                <div class="elem-group inlined">
                    <label><input type="radio" name="no5" value="yes">
                        예</label>
                    <label><input type="radio" name="no5" value="no">
                        아니요</label>
                </div>
                <div class="title-Name">
                    <label for="reservation-date">14일 이내로 자가격리자와 접촉한 사실이 있다.</label>
                </div>
                <div class="elem-group inlined">
                    <label><input type="radio" name="no6" value="yes">
                        예</label>
                    <label><input type="radio" name="no6" value="no">
                        아니요</label>
                </div>
                <div class="title-Name">
                    <label for="reservation-date">14일 이내로 코로나 위험지역에 방문한 0이 있다.</label>
                </div>
                <div class="elem-group inlined">
                    <label><input type="radio" name="no7" value="yes">
                        예</label>
                    <label><input type="radio" name="no7" value="no">
                        아니요</label>
                </div>
                <hr>
                <div class="button1">
                    <button input type="button" onclick="location.href='index.php'">이전페이지</button>
                </div>
                <div class="button2">
                    <button input type="button" onclick="dontGoNextPage()">다음페이지</button>
                </div>
			</form>
		</div>
        <script>
            function dontGoNextPage() {
                var q1 = document.getElementsByName('no1');
                var q1Choice; // 여기에 선택된 radio 버튼의 값이 담기게 된다.
                for (var i = 0; i < q1.length; i++) {
                    if (q1[i].checked) {
                        q1Choice = q1[i].value;
                    }
                }
                var q2 = document.getElementsByName('no2');
                var q2Choice; // 여기에 선택된 radio 버튼의 값이 담기게 된다.
                for (var i = 0; i < q2.length; i++) {
                    if (q2[i].checked) {
                        q2Choice = q2[i].value;
                    }
                }
                var q3 = document.getElementsByName('no3');
                var q3Choice; // 여기에 선택된 radio 버튼의 값이 담기게 된다.
                for (var i = 0; i < q3.length; i++) {
                    if (q3[i].checked) {
                        q3Choice = q3[i].value;
                    }
                }
                var q4 = document.getElementsByName('no4');
                var q4Choice; // 여기에 선택된 radio 버튼의 값이 담기게 된다.
                for (var i = 0; i < q4.length; i++) {
                    if (q4[i].checked) {
                        q4Choice = q4[i].value;
                    }
                }
                var q5 = document.getElementsByName('no5');
                var q5Choice; // 여기에 선택된 radio 버튼의 값이 담기게 된다.
                for (var i = 0; i < q5.length; i++) {
                    if (q5[i].checked) {
                        q5Choice = q5[i].value; // qn[0].value="yes" 되고, qn[1].value="no"가 된다
                    }
                }
                var q6 = document.getElementsByName('no6');
                var q6Choice; // 여기에 선택된 radio 버튼의 값이 담기게 된다.
                for (var i = 0; i < q6.length; i++) {
                    if (q6[i].checked) {
                        q6Choice = q6[i].value; // qn[0].value="yes" 되고, qn[1].value="no"가 된다
                    }
                }
                var q7 = document.getElementsByName('no7');
                var q7Choice; // 여기에 선택된 radio 버튼의 값이 담기게 된다.
                for (var i = 0; i < q7.length; i++) {
                    if (q7[i].checked) {
                        q7Choice = q7[i].value; // qn[0].value="yes" 되고, qn[1].value="no"가 된다
                    }
                }
                // alert(`${q1Choice}, ${q2Choice}, ${q3Choice}, ${q4Choice}, ${q5Choice}, ${q6Choice}, ${q7Choice}`);
                if (q1Choice == 'yes' || q2Choice == 'yes' || q3Choice == 'yes' || q4Choice == 'yes' || q5Choice == 'yes' || q6Choice == 'yes' || q7Choice == 'yes') {
                    alert("코로나 의심 증상으로 인해 병원 진료가 불가능 합니다.");
                    return 0;
                }
                // $('.button2').submit();
                document.getElementsByClassName('medicalInquiryForm')[0].submit();
                return 0;
            }
        </script>
    </body>
</html>