<?php
session_start();
$id = $_POST['login'];
$password = $_POST['password'];
//$connect = mysqli_connect("localhost", "root", "", "test");
$connect = mysqli_connect("localhost", "kbu3", "1234", "member");

$sql = "SELECT userid,password,username,user_code FROM users where userid='$id'";
$result = mysqli_query($connect, $sql);
if($result->num_rows==1){
    echo "1111111111";
    $row=$result->fetch_array(MYSQLI_ASSOC); //하나의 열을 배열로 가져오기
    if($row['password']==$password){ //MYSQLI_ASSOC 필드명으로 첨자 가능
             $_SESSION['userid']=$row['userid']; //로그인 성공 시 세션 변수 만들기
             $_SESSION['username']=$row['username']; //로그인 성공 시 세션 변수 만들기
             $_SESSION['user_code']=$row['user_code']; //로그인 성공 시 세션 변수 만들기
        if(isset($_SESSION['userid'])) //세션 변수가 참일 때
        {
            $_SESSION['msg']=$_SESSION['username'].$_SESSION['userid'];
             header('Location: ./index.php'); //로그인 성공 시 페이지 이동
        }
        else{
            $_SESSION['msg']="세션 저장 실패";
            echo "세션 저장 실패";

        }
    }
    else{
        $_SESSION['msg']='wrong id or pw';
    }
}
else{
    $_SESSION['msg']='wrong id or pw';
    header('Location: ./login.php'); //로그인 성공 시 페이지 이동
}
?>