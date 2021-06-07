<?php
	session_start();
	// 로그인 안됬을 시 index page로 이동
	if(!isset($_SESSION['userId'])) {
		echo "<script>location.href = 'index.php';</script>";
	}
	include "./php/5reservationEmptyDate.php";
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
            div.elem-group {
                margin: 15zpx 0;
            }
            div.elem-group.inlined {
                width: 95%;
                display: inline-block;
                float: front;
                margin-left: 1%;
            }
            label {
                display: block;
                font-family: 'Nanum Gothic';
                padding-bottom: 10px;
                font-size: 1.25em;
            }
            input,
            select,
            textarea {
                border-radius: 2px;
                border: 2px solid #777;
                box-sizing: border-box;
                font-size: 1.25em;
                font-family: 'Nanum Gothic';
                width: 100%;
                padding: 10px;
            }
            div.elem-group.inlined input {
                width: 95%;
                display: inline-block;
            }
            textarea {
                height: 100px;
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
			div.button {
				float: right;
				cursor: pointer;
				margin: 1% 0 1% 0;
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
				padding: 0 0 0 0;
				background-color: #EFFBEF;
			}
			.emptyTimeOfTreatment {
				display: flex;
				flex-wrap: wrap;
			}
			.emptyTimeOfTreatment div {
				text-align: center;
				line-height: 50px;
				margin: 10px 10px 0 0;
				width: 50px;
				height: 50px;
				background-color: #04C758;
			}
        </style>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script>
			var timeListForCheck = ['9','10','11','12','13','14','15','16','17','18'];
			var timeList = [];
			function clickEmptyTimeDiv(hour){
				for(var i = 0 ; i < timeListForCheck.length ; i++){
					document.getElementById("emptyTime"+timeListForCheck[i]).style.backgroundColor = "#04C758";
				}
				document.getElementById("emptyTime"+hour).style.backgroundColor = "#C71304";
				document.getElementById("timeOfTreatment").value = hour;
			}
			function showUser(str1, str2) {
				if (str1 == "" || str2 == "") {
					return;
				} else {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							timeList = JSON.parse(this.responseText);
							// 외부 함수에서 리턴해 사용하고 싶지만 xmlhttp.open의 true 인수가 비동기라서 그런건지 외부 함수에서 return 해도 값이 안되서 여기다 씀.
							// 해결은 내부 함수에서 외부 함수 리턴하면 될 것 같지만 방법은 모르겠음.
							
							// 이미 예약된 시간 안보이게함.
							divVisibleControlTimeList(timeList);
						}
					};
					xmlhttp.open('POST','./php/5reservationTimeListControl.php',true);
					xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					xmlhttp.send('dateOfTreatment='+str1+'&medicalProfessor='+str2);
				}
			}
			function divVisibleControlTimeList(timeList){
				for (var i = 0 ; i < timeListForCheck.length ; i++){
					document.getElementById("emptyTime"+timeListForCheck[i]).style.display = "block";
				}
				for (var i = 0 ; i < timeList.length ; i++){
					//console.log(timeList[i]);
					document.getElementById("emptyTime"+timeList[i]).style.display = "none";
				}
			}
			function divVisibleControlMedicalProfessor(num){
				for (var i = 1 ; i < 6 ; i++){
					for (var j = 1 ; j < 4 ; j++){
						document.getElementById("professor"+i+'0'+j).style.display = "none";
					}
				}
				for (var i = 1 ; i < 4 ; i++){
					document.getElementById("professor"+num+'0'+i).style.display = "block";
				}
			}
		</script>
    </head>
    <body>
		<div class="bgImg">
			<br>
			<div class="menu">
				<div style="float: left; font-size: 24px; padding: 2% 0 0 2%;">
					진료 예약
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
			<image src="covid.png" width="450" ,height="700"></image>
			<form action="./php/5reservation.php" method="post">
                <div class="elem-group">
                    <label for="reservation-date">진료과</label>
                    <select name="medicalDepartment" id="medicalDepartment" required>
                        <option value="">진료과를 선택해주세요</option>
                        <option id="medicalDepartment1" value="내과">내과</option>
                        <option id="medicalDepartment2" value="외과">외과</option>
                        <option id="medicalDepartment3" value="피부과">피부과</option>
                        <option id="medicalDepartment4" value="산부인과">산부인과</option>
                        <option id="medicalDepartment5" value="안과">안과</option>
                    </select>
                </div>
                <div class="elem-group inlined">
                    <label for="doctor">진료교수</label>
                    <select name="medicalProfessor" id="medicalProfessor" required>
                        <option value="">진료교수를 선택해주세오.</option>
                        <option id="professor101" value="김형섭">김형섭 교수/내과/본관 2층</option>
                        <option id="professor102" value="박준용">박준용 교수/내과/본관 2층</option>
						<option id="professor103" value="배원기">배원기 교수/내과/본관 2층</option>
						<option id="professor201" value="박인성">박인성 교수/외과/본관 2층</option>
						<option id="professor202" value="손유정">손유정 교수/외과/본관 2층</option>
						<option id="professor203" value="신경화">신경화 교수/외과/본관 2층</option>
						<option id="professor301" value="하소미">하소미 교수/피부과/별관 2층</option>
						<option id="professor302" value="남지성">남지성 교수/피부과/별관 2층</option>
						<option id="professor303" value="양인식">양인식 교수/피부과/별관 2층</option>
						<option id="professor401" value="최정수">최정수 교수/산부인과/본관 2층</option>
						<option id="professor402" value="오민영">오민영 교수/산부인과/본관 2층</option>
						<option id="professor403" value="정태식">정태식 교수/산부인과/본관 2층</option>
						<option id="professor501" value="심대현">심대현 교수/안과/별관 2층</option>
						<option id="professor502" value="남궁지웅">남궁지웅 교수/안과/별관 2층</option>
						<option id="professor503" value="조재원">조재원 교수/안과/별관 2층</option>
                    </select>
                </div>
                <div class="elem-group inlined">
                    <label for="reservation-date">진료 희망 날짜</label>
                    <input type="date" id="dateOfTreatment" name="dateOfTreatment" min="2021-06-01" max="2026-06-01" required>
                </div>
				<div class="elem-group">
                    <label for="reservation-date">진료 시간</label>
					<!-- 자바스크립트 함수 껴넣어서 동적 페이지 만들기-->
					<input type="hidden" class="timeOfTreatment" name="timeOfTreatment" id="timeOfTreatment">
					<div class="emptyTimeOfTreatment" name="emptyTimeOfTreatment" id="emptyTimeOfTreatment">
						<div name="emptyTime" id="emptyTime" style="display: none">
							
						</div>
						<div name="emptyTime9" id="emptyTime9" onclick="clickEmptyTimeDiv(9)">
							9
						</div>
						<div name="emptyTime10" id="emptyTime10" onclick="clickEmptyTimeDiv(10)">
							10
						</div>
						<div name="emptyTime11" id="emptyTime11" onclick="clickEmptyTimeDiv(11)">
							11
						</div>
						<div name="emptyTime12" id="emptyTime12" onclick="clickEmptyTimeDiv(12)">
							12
						</div>
						<div name="emptyTime13" id="emptyTime13" onclick="clickEmptyTimeDiv(13)">
							13
						</div>
						<div name="emptyTime14" id="emptyTime14" onclick="clickEmptyTimeDiv(14)">
							14
						</div>
						<div name="emptyTime15" id="emptyTime15" onclick="clickEmptyTimeDiv(15)">
							15
						</div>
						<div name="emptyTime16" id="emptyTime16" onclick="clickEmptyTimeDiv(16)">
							16
						</div>
						<div name="emptyTime17" id="emptyTime17" onclick="clickEmptyTimeDiv(17)">
							17
						</div>
						<div name="emptyTime18" id="emptyTime18" onclick="clickEmptyTimeDiv(18)">
							18
						</div>
					</div>
                </div>
                <div class="elem-group">
                    <label for="message">증상/기타사항 (100자 이내)</label>
                    <textarea id="symptomsEtc" name="symptomsEtc" placeholder="특이사항이 있으시면 적어주십시오."></textarea>
                </div>
                <hr>
                <div style="padding: 0 0 40px 0;">
                    <div class="button1">
                        <button type="button" onclick="location.href='4medical_inquiryhtml.php'">이전페이지</button>
                    </div>
                    <div class="button2">
                        <button type="submit">다음페이지</button>
                    </div>
                </div>
			</form>
		</div>
		<script>
			$("#dateOfTreatment").change(function(){
				var inputDateOfTreatment = document.getElementById("dateOfTreatment");
				var inputDateOfTreatmentValue = inputDateOfTreatment.value;
				var selectOptionMedicalProfessor = document.getElementById("medicalProfessor");
				var selectOptionMedicalProfessorValue = selectOptionMedicalProfessor.options[selectOptionMedicalProfessor.selectedIndex].value;
				if(inputDateOfTreatmentValue && selectOptionMedicalProfessorValue){
					showUser(inputDateOfTreatmentValue, selectOptionMedicalProfessorValue);
				}
				// 진료시간 바뀌고 버튼 클릭 초기화
				clickEmptyTimeDiv('');
			});
			$("#medicalProfessor").change(function(){
				var inputDateOfTreatment = document.getElementById("dateOfTreatment");
				var inputDateOfTreatmentValue = inputDateOfTreatment.value;
				var selectOptionMedicalProfessor = document.getElementById("medicalProfessor");
				var selectOptionMedicalProfessorValue = selectOptionMedicalProfessor.options[selectOptionMedicalProfessor.selectedIndex].value;
				if(inputDateOfTreatmentValue && selectOptionMedicalProfessorValue){
					showUser(inputDateOfTreatmentValue, selectOptionMedicalProfessorValue);
				}
				// 진료시간 바뀌고 버튼 클릭 초기화
				clickEmptyTimeDiv('');
			});
			$("#medicalDepartment").change(function(){
				var num = 0 ;
				$("#medicalProfessor option:eq(0)").prop("selected", true);
				if($("#medicalDepartment").val()=="내과") num = 1;
				else if($("#medicalDepartment").val()=="외과") num = 2;
				else if($("#medicalDepartment").val()=="피부과") num = 3;
				else if($("#medicalDepartment").val()=="산부인과") num = 4;
				else if($("#medicalDepartment").val()=="안과") num = 5;
				divVisibleControlMedicalProfessor(num);
			});
				
		</script>
    </body>
</html>