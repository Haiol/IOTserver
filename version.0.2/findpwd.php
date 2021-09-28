<?php
    $connect = mysqli_connect("localhost", "kbu3", "1234", "member");
    $id = $_POST['id'];
    $name = $_POST['name'];
    $sql = "SELECT password FROM users where userid='$id' and username='$name'";
    $result = mysqli_query($connect, $sql);
    if($id==""){
        echo "<script>alert('아이디를 입력해주세요.');history.back();</script>";
    }else if($name==""){
        echo "<script>alert('이름을 입력해주세요.');history.back();</script>";
    }else if($result == false){
        echo "<script>alert('오류가 발생하였습니다. 관리자에게 문의해주세요');history.back();</script>";
    }else{
        while($row = mysqli_fetch_array($result)){
            echo "<script>alert('회원님의 비밀번호는 ".$row['password']."입니다');</script>";
            echo "<script>location.href='login.html';</script>";
        }
    }
?>
