<?php
$user_code = $_GET['code'];
$data_name = $_GET['name'];
$temp = $_GET['temp'];
$humm = $_GET['humm'];
//$connect = mysqli_connect("localhost", "root", "", "member");
$connect = mysqli_connect("localhost", "kbu3", "1234", "member");

echo "하하하하하하";
$sql = " INSERT INTO datawave (
    user_code,
    data_name,
    temp,
    humm,
    create_date
)";
$sql =$sql."
VALUES (
    '$user_code',
    '$data_name',
    '$temp',
    '$humm',
    NOW()
)";
mysqli_query($connect, $sql);

echo $connect;
mysqli_close($connect);

?>