<?php
    $connect = mysqli_connect("localhost", "kbu3", "1234", "member");
    $email = $_POST['email'];
    $sql = "SELECT userid FROM users where email='$email'";
    $result = mysqli_query($connect, $sql);
    if($email==""){
        echo "<script>alert('이메일을 입력해주세요.');history.back();</script>";
    }else if($result == false){
        echo "<script>alert('아이디가 존재하지 않습니다.');history.back();</script>";
    }else{
        while($row = mysqli_fetch_array($result)){
            echo "<script>alert('회원님의 ID는 ".$row['userid']."입니다');history.back();</script>";
        }
        echo "<script>location.href='login.html';</script>";
    }
?>
