<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="한림대학교 캡스톤디자인 팀-Hospital">
        <meta name="description" content="복잡한 병원 절차를 도와주는 반응형 웹이다. 예약, 문진표, 진료 절차의 현재 진행 상황, 찾아가는 길을 알려준다. 환자가 편하게 현재 진행 상황을 확인하고 대기시간을 줄일 수 있다.">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <style media="screen">
            body {
                width: 100%;
				max-width: 500px;
                margin: 0 auto;
            }
            .pageBtn {
                display: flex;
                flex-wrap: wrap;
                justify-content: flex-end;
                margin: 40px 0 20px;
            }
            .chkAll {
                margin: 0;
            }
            .chkNec,
            .chk {
                margin: 30px 0 3px;
            }
			.logoImg {
				text-align: center;
			}
            .logoImg img {
                width: 50%;
            }
			.menu {
				height: 21%;
				background-color: #EFFBEF;
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
    </head>
    <body>
        <div class="bgImg">
            <br>
			<div class="menu">
				<div class="logoImg">
					<img src="./logo.png">
				</div>
			</div>
            <p class="chkAll"><input type="checkbox" id="chkAll" name="chkAll" value="1">hospital 이용약관, 개인정보 수집 및 이용, 위치정보 이용약관(선택)에 모두 동의합니다.</p>
            <p class="chkNec"><input type="checkbox" name="chkNec" value="1">hospital 이용약관 동의
                <span style="color:blue">(필수)</span>
            </p>
            <div style="border:1px solid black; overflow:auto; width:60%; height:80px;">
제1장 총칙<br>
제1조 (목적)<br>
본 약관은 병원에서 운영하는 인터넷 홈페이지에서 제공하는 인터넷 관련 서비스의 이용에 관한 사항을 규정함을 목적으로 합니다.<br>
제2조 (정의)<br>
이용자(회원): 인터넷 웹사이트에 로그인하여 본 약관에 따라 병원이 제공 하는 서비스를 받는 자를 말합니다.<br>
운영자: 서비스의 전반적인 관리와 원활한 운영을 위하여 병원에서 선정한 사람을 말합니다.<br>
연결사이트: 웹사이트와 하이퍼링크 방식(하이퍼링크의 대상에는 문자, 정지 및 동화상 등이 포함됨) 등으로 연결된 웹 사이트를 말합니다.<br>
개인정보: 당해 정보에 포함되어 있는 성명, 환자등록번호 등의 사항에 의하여 특정 개인을 식별할 수 있는 정보(당해 정보만으로는 특정 개인을 인식할 수 없더라도 다른 정보와 용이하게 결합하여 식별할 수 있는 것을 포함한다)를 말합니다.<br>
해지: 이용자가 서비스 개통 후 이용계약을 해약하는 것을 말합니다.</div>
            <p class="chkNec"><input type="checkbox" name="chkNec" value="2">개인정보 수집 및 이용 동의
                <span style="color:blue">(필수)</span>
            </p>
            <div style="border:1px solid black; overflow:auto; width:60%; height:80px;">개인정보의 처리 목적<br>
"병원"은 수집한 개인정보를 다음의 목적을 위해 활용합니다.<br>
이용자가 제공한 모든 정보는 하기 목적에 필요한 용도 이외로는 사용되지 않으며 이용 목적이 변경될 시에는 사전 동의를 구할 것입니다.<br>
<br>
<br>
진단 및 치료를 위한 진료서비스(협의진료에 필요한 개인정보 및 진료정보 공유 포함)<br>
진료ㆍ건진 예약, 예약조회 및 회원제 서비스(고객의소리,건강상담,건강검진예약상담, 의약품부작용상담) 이용에 따른 본인 확인 절차에 이용<br>
고지사항 전달, 불만처리 등을 위한 원활한 의사소통 경로의 확보,<br>
병원 이용 안내 서비스 제공</div>
            <p class="chk"><input type="checkbox" name="chk" value="3">위치정보 이용약관 동의
                <span style="color:blue">(선택)</span>
            </p>
            <div style="border:1px solid black; overflow:auto; width:60%; height:80px;">제 1 조 (목적)<br>
본 약관은 이 애플리케이션이 제공하는 위치기반서비스에 대해 회사와 위치기반서비스를 이용하는 개인위치정보주체(이하 "이용자")간의 권리·의무 및 책임사항, 기타 필요한 사항 규정을 목적으로 합니다.
			</div>
			<br>
			<div class="button1">
				<button input type="button" onclick="javascript:history.back()">이전페이지</button>
			</div>
			<div class="button2">
				<button input type="button" onclick="goNextPage()">다음페이지</button>
			</div>
            <script>
                // 모두 동의 체크시 모두 체크한다. 다음 페이지 이동, 기다리는 버튼은 체크를 해제한다.
                // 모두 동의 체크 해제시 모두 체크 해제한다.
                $('#chkAll').click(function () {
                    if ($("input:checkbox[id='chkAll']").prop("checked")) {
                        $("input[type=checkbox]").prop("checked", true);
                        $("input[name='navyBtn']").prop("checked", false);
                        $("input[name='waitBtn']").prop("checked", false);
                    } else {
                        $("input[type=checkbox]").prop("checked", false);
                    }
                });
                // 다음 페이지로 이동하는 함수. 필수 이용약관이 모두 동의 안됬을 때는 다음 페이지 넘어갈 수 없다.
                function goNextPage() {
                    chkNecLen = document.getElementsByName("chkNec").length;
                    for (var i = 0; i < chkNecLen; i++) {
                        if (document.getElementsByName("chkNec")[i].checked == false) {
                            alert("필수 이용약관에 동의해주세요.");
                            $("input[name='navyBtn']").prop('checked', false);
                            return 0;
                        }
                    }
                    location.href = '3registerhtml.php';
                    return 0;
                }
            </script>
        </div>
    </body>
</html>