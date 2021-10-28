<?php
  session_start();
  $username="";
  if(!empty($_SESSION['username'])){
	  $username=$_SESSION['username'];

  }
  else{
	  header('location:login.php');
  }
  $level="";
  if(!empty($_SESSION['level'])){
	  $level=$_SESSION['level'];

  }
  else{
	  header('location:login.php');
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100&family=Open+Sans+Condensed:wght@300&family=Roboto+Condensed:wght@300&family=Titillium+Web:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="trangchu.css">
    <title>Cửa hàng thú cưng</title>
</head>
<body>

  <header>
    <div class="top-header">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                  <div class="phone hidden-xs">
                    <div class="phone-box">
                        <strong>Hotline:</strong>
                        <span>031.363.3364</span>
                    </div>
                  </div>
                  <div class="welcome ">
                      Xin chào bạn <?php echo $username?>
                  </div>
              </div>
              
              <div class="col-lg-6 col-sm-6" style="display: inline-flex;">
                <div class="welcome ">
                    Cảm ơn bạn đã chọn dịch vụ của <strong>PET SHOP</strong>
                </div>
                <div class="button-signout">
                  <form action="logout.php" method="post">
                    <input type="submit" value="SIGN OUT" name="signout"  style="height:40px";> 
                  </form>
                  
                </div>
            </div>
            </div>
          </div>
    </div>
    <div class="container-xl">
      <div class="logo">
        <a href="#"><img src="images/logo2.jpg"></a> 
      </div>
        
      <div class="menu">
          <div class="menu-right">
            <ul>
                <li class="menu-item dropdown">
       
                    <span class="submenu-button" id="menu-a"><i class="fas fa-angle-down"></i></span>
                    <a href="#" class="droplink">THÚ CƯNG</a>
                    <div class="dropdown-content" id="A">
                      <ul>           
                        <li class="dropdown-item">
                          <a href="#">CHÓ</a>
                        </li>
                        <li class="dropdown-item">
                          <a href="#">MÈO</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="#">CHUỘT</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="#">CHIM</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="#">THÚ CƯNG KHÁC</a>
                        </li>
                      </ul>
                    </div>
           
                </li>
                <li  class="menu-item">
                    <a href="#">PHỤ KIỆN</a>
                </li>
                <li  class="menu-item">
                    <a href="#">THUỐC</a>
                </li>
                <li  class="menu-item">
                    <a href="#">THỨC ĂN</a>
                </li>
            </ul>
          </div>

          <div class="menu-left">
            <ul>
                <li class="menu-item">
                  <a href="#">
                    <span class="menu-button" id="menu-a"><i class="far fa-newspaper"></i></span>
                  </a>
           
                    <!--<a href="#">TIN TỨC</a>--> 
                </li>
                <li class="menu-item">
                  <a href="#">
                    <span class="menu-button" id="menu-a"><i class="far fa-comments"></i></span>
                  </a>
                 
                    <!--<a href="#">CHAT</a>--> 
                </li>
                <li class="menu-item">
                  <a href="#">
                    <span class="menu-button" id="menu-a"><i class="fas fa-sign-in-alt"></i></span>
                  </a>
                  
                    <!--<a href="#">ĐĂNG NHẬP</a>--> 
                </li>
            </ul>
           
          </div>
      </div>
    </div>

  </header>