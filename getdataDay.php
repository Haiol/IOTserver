

<?php
    $con=mysqli_connect("localhost","kbu3","1234","member");
if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_set_charset($con,"uft8");

$res = mysqli_query($con,"select ROUND(avg(temp),1) as 'temp', ROUND(avg(humm),1) as 'humm', DATE_FORMAT(create_date, '%y-%m-%d') as 'create_date' from datawave where user_code= 9 group by DATE_FORMAT(create_date, '%Y-%m-%d') ORDER BY create_date");

$result = array();
while ( $row = $res->fetch_assoc()) { $result[]=$row; }

echo json_encode($result);

mysqli_close($con); 
?>
