

<?php
    $con=mysqli_connect("localhost","kbu3","1234","member");
if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_set_charset($con,"uft8");

$res = mysqli_query($con,"SELECT  temp, humm, create_date from datawave WHERE user_code= 9 ORDER BY create_date DESC LIMIT 1");

$result = array();
while ( $row = $res->fetch_assoc()) { $result[]=$row; }

echo json_encode($result);

mysqli_close($con); 
?>
