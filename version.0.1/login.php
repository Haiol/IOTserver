<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/style.css">


  <title>Network 3</title>
</head>
<?php
    session_start();
    if(isset($_SESSION['is_login'])){
        header('Location: ./index.php');
    }
    if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
      // echo "<script>alert(\"이렇게 띄우면 되자나\");</script>";
         unset($_SESSION['msg']);
     }
?>

<body>


  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <br><br><br>
      <!-- Login Form -->
      <form action="login_result.php" method="POST">
        <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="LogIn">
      </form>
      <div>
        <a class="underlineHover" href="create.html">Register</a>
      </div>
      
  
      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="find.html">Forgot ID or Password?</a>
      </div>
  
    </div>
  </div>

</body>

  
</html>


<!------ Include the above in your HEAD tag ---------->

