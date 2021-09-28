	<?php
	session_start();
		// $host = 'localhost';
		// $user = 'kbu3';
		// $pw = '1234';
		// $dbName = 'member';
		
		$host = 'localhost';
		$user = 'root';
		$pw = '';
		$dbName = 'test';

		$mysqli = new mysqli($host, $user, $pw, $dbName);
		$flag =false;
		$userid = $_POST['id'];
        $email = $_POST['email'];
		$username = $_POST['name'];
	    $username = addslashes($username);
        $pwd1 = $_POST['pwd1'];
        $pwd2 = $_POST['pwd2'];
		$chid = $_POST['chid'];
		$flag = $_POST['flag'];
	    

		$sql = "UPDATE users SET
				email = '$email',
                username ='$username',
                password = '$pwd1'
				where userid = '$userid'
		";
		echo '하하하하하하하하하'; 
		if($flag){
				
			if($userid==""||$username==""||$email==""||$pwd1==""){
				echo '<script>alert("정보를 빠짐없이 입력해주세요");history.back();</script>';
				exit;
			}else if($pwd1!=$pwd2){
				echo '<script>alert("비밀번호가 일치하지 않습니다");history.back();</script>';
				exit;
			}
			
			if($mysqli->query($sql)){ 
				echo '<script>alert("정보수정 성공하였습니다");</script>'; 
				$_SESSION['username']=$username;
			}else{ 
				echo '<script>alert("회원가입에 실패하였습니다");history.back();</script>';
				exit;
			}
		
	
		  mysqli_close($mysqli);
		}
?>

