<?php
  session_start();
?>

<html>
    <head>
        <title>Login Fage</title>
        <link rel="stylesheet"  type="text/css" href="login.css">

    </head>
    <body>
    <?php
    require("connect.php");
  $error=array();
  $username="";
  $password="";
  $usernameErr="";
  $passwordErr="";
  $accountErr="";
  $thongbao="";

  if($_SERVER['REQUEST_METHOD']=='POST'){
      $username = $_POST['username'];
      $password = $_POST['password'];
    
      if((empty($password))&&(empty($username))){
        $accountErr=" vui lòng nhập tài khoản";
        $error[]= $accountErr;
        $thongbao=$accountErr;
      }
        else if(empty($username)){
            $usernameErr="vui lòng điền tên tài khoản";
            $error[]= $usernameErr;
            //echo $usernameErr;
            $thongbao=$usernameErr;
        }
            else if(empty($password)){
                $passwordErr=" vui lòng nhập mật khẩu";
                $error[]= $passwordErr;
               // echo $passwordErr;
               $thongbao=$passwordErr;
            }
    
      if(empty($error)){
          $sql = "SELECT * FROM user WHERE username='$username' AND pass='$password'"; 
          $result =mysqli_query($dbc,$sql);

          if(mysqli_num_rows($result)>0){
             
              $_SESSION['username']=$username;
              header('location: index.php');
              
             }  
            else{
                    $thongbao="vui lòng nhâp chính xác tài khoản ";
              }

      }
  }

 ?>
        <div class="loginbox">
            <img src="images/icon2.png" class="avatar">
                <h1>LOGIN HERE</h1>
                <form action="trangchu.php" method="post">
                    <P>Username</P>
                    <input type="text" name="username" placeholder="Enter Username">
                    <p>Password</p>
                    <input type="password" name="password" placeholder="Enter Password">
                    <input type="submit" name="login" value="Login">
                    <h3><?php echo $thongbao;?></h3>
                    <a href="register.html"> Don't have account ?</a>
                </form>
        </div>
    </body>
</html>
