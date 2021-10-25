<?php
  session_start();
  $username="";
  if(!empty($_SESSION['username'])){
	  $username=$_SESSION['username'];

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
            <a href="#"><img src="images/LOGO5.JPG"></a> 
          </div>
            
          <div class="menu">
              <div class="menu-right">
                <ul>
                  <li  class="menu-item">
                    <a href="#">TRANG CHỦ</a>
                  </li>
                    <li class="menu-item dropdown">
           
                       
                        <a href="#" class="droplink" style="margin-right: 0;">THÚ CƯNG</a>
                        <span class="submenu-button" id="menu-a" style="color: black;"><i class="fas fa-angle-down"></i></span>
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
                                <a href="#">KHÁC</a>
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
                        <span class="menu-button" id="menu-a"><i class="far fa-newspaper" style="font-size: 30px;"></i></span>
                      </a>
               
                        <!--<a href="#">TIN TỨC</a>--> 
                    </li>
                    <li class="menu-item">
                      <a href="#">
                        <span class="menu-button" id="menu-a"><i class="far fa-comments"style="font-size: 30px;"></i></span>
                      </a>
                     
                        <!--<a href="#">CHAT</a>--> 
                    </li>
                    <li class="menu-item">
                      <a href="#">
                        <span class="menu-button" id="menu-a"><i class="fas fa-exclamation" style="font-size: 30px;"></i></span>
                      </a>
                      
                        <!--<a href="#">ĐĂNG NHẬP</a>--> 
                    </li>
                </ul>
               
              </div>
          </div>
        </div>
    </header>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="images/slide4.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/slide5.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/slide6.jpg" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/slide8.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
    <div class="container ">
      <div class="title"><h2>SẢN PHẨM CỦA SHOP</h2></div>
    </div>
    <div class="container grid-img">
      <!--Cho-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="#">
          <div class="img-value">
            <img src="images/DOG2.jpg" >
          </div>
          <div class="title-desktop"><h3>CHÓ</h3></div>
        </a>
      </div>
      <!--meo-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="#">
          <div class="img-value">
            <img src="images/CAT3.jpg" >
          </div>
          <div class="title-desktop"><h3>MÈO</h3></div>
        </a>
      </div>
      <!--phu kien-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="#">
          <div class="img-value">
            <img src="images/shirt.jpg" >
          </div>
          <div class="title-desktop"><h3>PHỤ KIỆN</h3></div>
        </a>
      </div>
       <!--thu cung khac-->
       <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="#">
          <div class="img-value">
            <img src="images/OTHER2.jpg" >
          </div>
          <div class="title-desktop"><h3>THÚ CƯNG LẠ</h3></div>
        </a>
      </div>
      <!--chuot-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="#">
          <div class="img-value">
            <img src="images/HAMTER2.jpg" >
          </div>
          <div class="title-desktop"><h3>CHUỘT</h3></div>
        </a>
      </div>
      <!--chim-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="#">
          <div class="img-value">
            <img src="images/BIRD2.jpg" >
          </div>
          <div class="title-desktop"><h3>CHIM</h3></div>
        </a>
      </div>
     
      
      <!--thuoc-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="#">
          <div class="img-value">
            <img src="images/medicine3.jpg" >
          </div>
          <div class="title-desktop"><h3>THUỐC</h3></div>
        </a>
      </div>
      <!--thuc an-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="#">
          <div class="img-value">
            <img src="images/FOOD2.jpg" >
          </div>
          <div class="title-desktop"><h3>THỨC ĂN</h3></div>
        </a>
      </div>
    </div>


  
   

    <div class="info-box">

      <div class="container-xl">
          <div class="col-md-4 col-sm-4 col-xs-6 item-desktop">
            <a href="#">
              <div class="img-value">
                <img id="A"  src="images/icon truck.png" >
              </div>
              <div class="title-desktop"><h2>VẬN CHUYỂN MAU LẸ</h2></div>
              <div class="title-desktop"><h3>Miễn phí giao hàng trong nội thành thành phố Nha Trang</h3></div>
            </a>
          </div>
    
          <div class="col-md-4 col-sm-4 col-xs-6 item-desktop">
            <a href="#">
              <div class="img-value">
                <img id="A" src="images/chamthan.png" >
              </div>
              <div class="title-desktop"><h2>HỖ TRỢ KHÁCH HÀNG</h2></div>
              <div class="title-desktop"><h3>Hỗ trợ trực tiếp qua đường dây nóng 24/7</h3></div>
            </a>
          </div>
    
          <div class="col-md-4 col-sm-4 col-xs-6 item-desktop">
            <a href="#">
              <div class="img-value">
                <img id="A" src="images/tim.png" >
              </div>
              <div class="title-desktop"><h2>SẢN PHẨM CHẤT LƯỢNG</h2></div>
              <div class="title-desktop"><h3>Đảm bảo chất lượng tốt nhất khi đến tay khách hàng</h3></div>
            </a>
          </div>
       
        </div>
       
        <footer class="footer">
          <div class="footer-middle">
            <div class="container">
              <div class="row" style="margin-top:20px ;">
                <div class="col-md-4 col-sm-4">
                  <div class="footer-logo">
                    <a href="#" title="Logo"><img src="images/LOGO8.JPG"></a>
                   
                  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <p style="margin-top:10px;">
                    Pet Shop là shop chuyên việc trao đổi, tư vấn, hỗ trợ, mua bán về thú cưng cũng như các phụ kiện phục vụ như cầu nuôi thú cảnh với sản phẩm chất lượng cao nhất.
                  </p>
                  <p>
                    GPKD: 3500376775 - Ngày cấp: 24/1/2015
                  </p>
                  <p>       
                    Nơi cấp: sở kế hoạch và đầu tư tỉnh Khánh Hòa
                  </p>
                </div>
                <div class="col-md-4 col-sm-4" >
                  <h4 style="text-align: center;">LIÊN HỆ</h4>
                  <div class="contacts-info">
                    <span class="menu-button" id="menu-a"><i class="fas fa-map-marker-alt" style="font-size: 30px;margin-right: 10px;"></i></span>139 2/4 Nha Trang Khánh Hòa <br>
                    <br>
                    <span class="menu-button" id="menu-a"><i class="fas fa-phone-alt" style="font-size: 30px;margin-right: 10px;"></i></span>092 114 2256 <br>
                    <br>
                    <span class="menu-button" id="menu-a"><i class="fas fa-envelope" style="font-size: 30px;margin-right: 10px;"></i></span>petshop@gmail.com
                    
                  </div>
                </div>
              </div>
            </div>

          </div>
        </footer>

            
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script language="javascript" src="assets/scripts/java.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
</body>