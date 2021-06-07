<?php
	session_start();
	// 로그인 안됬을 시 index page로 이동
	if(!isset($_SESSION['userId'])) {
		echo "<script>location.href = 'index.php';</script>";
	}
?>
<html>
    <body>
        <?php
			echo "<script>
				window.onload = function() {
					const data = confirm('로그아웃 하시겠습니까?');
					if (data) {";
						session_unset();   // 모든 세션 변수의 등록 해지
						session_destroy(); // 세션 아이디의 삭제
						//session_start();
						//alert("모든 세션 변수가 등록 해지되었으며, 세션 아이디도 삭제되었습니다.");
					echo "alert('로그아웃 성공');
					location.href='index.php';
					}
				}
				</script>";
		?>
    </body>
</html>