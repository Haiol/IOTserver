<?php
    $connect = mysqli_connect("localhost", "kbu3", "1234", "member");
    $email = $_POST['email'];
    $sql = "SELECT userid FROM users where email='pjs707013'";
    $result = mysqli_query($connect, $sql);
    if($result == false){
        echo "검색된 결과가 없습니다.";
    }else{
        while($row = mysqli_fetch_array($result)){
            echo $row;
        }
    }
?>