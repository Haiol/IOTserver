<html>
<!-- <meta charset="utf-8"> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<?php

		$host = 'localhost';
		$user = 'kbu3';
		$pw = '1234';
		$dbName = 'member';
		$mysqli = new mysqli($host, $user, $pw, $dbName);

		$userid = $_POST['id'];
        $email = $_POST['email'];
		$username = $_POST['name'];
	    $username = addslashes($username);
        $pwd1 = $_POST['pwd1'];
        $pwd2 = $_POST['pwd2'];
		$chid = $_POST['chid'];
	    

		$sql = "insert into users (
				userid,
				email,
                username,
                password
		)";
		
		$sql = $sql. "values (
				'$userid',
				'$email',
                '$username',
                '$pwd1'
		)";
		
		if($userid==""||$username==""||$email==""||$pwd1==""){
			echo '<script>alert("정보를 빠짐없이 입력해주세요");history.back();</script>';
			exit;
		}else if($chid=='0'){
			echo '<script>alert("아이디 중복체크를 해주세요");history.back();</script>';
            exit;
		}else if($pwd1!=$pwd2){
            echo '<script>alert("비밀번호가 일치하지 않습니다");history.back();</script>';
            exit;
        }

		if($mysqli->query($sql)){ 
			echo '<script>alert("회원가입에 성공하였습니다");</script>'; 
			echo "<script>location.href='login.php';</script>"; 
		  }else{ 
			echo '<script>alert("회원가입에 실패하였습니다");history.back();</script>';
			exit;
		  }
  
		  mysqli_close($mysqli);
	?>


</html>