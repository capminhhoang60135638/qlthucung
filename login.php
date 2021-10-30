<?php
  session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>LOGIN</title>
<link rel="stylesheet" href="include/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="include/login.css">
</head>
<body>

<?php
require("connection/connect.php");
  $error=array();
  $username="";
  $password="";
  $usernameErr="";
  $passwordErr="";
  $accountErr="";
  $radErr="";
  $thongbao="";
  $level=0;//xác định phân quyền 1 là khách hàng , 2 là admin

  if($_SERVER['REQUEST_METHOD']=='POST'){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $rad=isset($_POST['nhanvien']);
      if((empty($password))&&(empty($username))){
        $accountErr=" vui lòng nhập tài khoản";
        $error[]= $accountErr;
        $thongbao=$accountErr;
      }
        else if(empty($username)){
            $usernameErr="vui lòng nhập username";
            $error[]= $usernameErr;
            //echo $usernameErr;
            $thongbao=$usernameErr;
        }
            else if(empty($password)){
                $passwordErr=" vui lòng nhập password";
                $error[]= $passwordErr;
               // echo $passwordErr;
               $thongbao=$passwordErr;
            }else if(empty($rad)){
              $radErr="vui lòng chọn quyền đăng nhập";
              $error[]=$radErr;
              $thongbao=$radErr;
            }
    
      if(empty($error)){
        if($_POST['nhanvien']=='khachhang'){
          $sql = "SELECT * FROM khach_hang WHERE username='$username' AND password='$password'"; 
          $result =mysqli_query($dbc,$sql);

          if(mysqli_num_rows($result)>0){
              $level=1;
              $_SESSION['level']=$level;
              $_SESSION['username']=$username;
              header('location: index.php');
              
             }  
            else{
                    $thongbao="vui lòng nhập chính xác tài khoản ";
              }
        }else if ($_POST['nhanvien']=='admin'){
          $sql = "SELECT * FROM quan_tri WHERE username='$username' AND password='$password'"; 
          $result =mysqli_query($dbc,$sql);
          if(mysqli_num_rows($result)>0){
              $level=2;
              $_SESSION['level']=$level;
              $_SESSION['username']=$username;
              header('location: admin.php');
              
             }  
            else{
                    $thongbao="vui lòng nhập chính xác tài khoản ";
              }
        }
      }
  }

 ?>


        <div class="loginbox" style="height: 500px;">
            <img src="images/icon2.png" class="avatar">
                <h1>ĐĂNG NHẬP</h1>
                <form action="login.php" method="post">
                    <P>Username</P>
                    <input type="text" name="username" placeholder="Nhập Username">
                    <p>Password</p>
                    <input type="password" name="password" placeholder="Nhập Password">
                    <div class="radio-button" style="display: flex;">

                    <input type="radio" name="nhanvien" value="khachhang" style="width: auto;"
					          <?php if(isset($_POST['nhanvien'])&&($_POST['nhanvien'])=="khachhang") echo 'checked'?>/>Khách Hàng
				            <input type="radio" name="nhanvien" value="admin" style="width: auto;margin-left: 20px;"
					          <?php if(isset($_POST['nhanvien'])&&($_POST['nhanvien'])=="admin") echo 'checked'?>/>Quản trị
                    </div>
                    <input type="submit" name="login" value="Đăng nhập">
                    <p>Bạn chưa có tài khoản ?</p>
                    <a href="register.php"><h4 style="margin: 0;">ĐĂNG KÝ NGAY</h4></a>
                    <h4><?php echo$thongbao?> </h4>
                </form>
        </div>
</body>