<?php
 $connect = mysqli_connect("localhost", "kbu3", "1234", "member");

 $id=$_GET['userid'];
 
 $query="select count(*) from users where userid='$id'";
 $result=mysqli_query($connect,$query);
 $row=mysqli_fetch_array($result);
 
 mysqli_close($connect);

?>
<script>
 var row="<?=$row[0]?>";
 if(row==1){
 parent.document.getElementById("chid").value="0";
 parent.alert("이미 사용중인 아이디입니다.");
 }
 else{
 parent.document.getElementById("chid").value="1";
 parent.document.getElementById("id").readOnly=true;
 parent.alert("사용 가능합니다.");
 }
</script>   
