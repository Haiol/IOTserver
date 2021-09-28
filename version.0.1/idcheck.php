<?php
    $host = 'localhost';
    $user = 'kbu3';
    $pw = '1234';
    $dbName = 'member';
    $mysqli = new mysqli($host, $user, $pw, $dbName);
	$mem_id = $_GET["mem_id"];
	$sql = mq("select * from member where id='".$mem_id."'");
	$member = $sql->fetch_array();
	if($member==0) {
	    echo"<div style='font-family:'malgun gothic'';><?php echo $mem_id; ?>는 사용가능한 아이디입니다.</div>";
	}else{
	    echo"<div style='font-family:'malgun gothic'; color:red;'><?php echo $mem_id; ?>중복된아이디입니다.<div>";
	}
?>
<button value="닫기" onclick="window.close()">닫기</button>
<script>
</script>