<?php 
  include 'connection/connect.php';
  include 'include/header.php';
?>
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
    
    <div class="container">
      <div class="title"><h2>SẢN PHẨM CỦA SHOP</h2></div>
    </div>
    <div class="container grid-img">
      <!--Cho-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="thucung-loai.php?loai=CHO">
          <div class="img-value">
            <img src="images/DOG2.jpg" >
          </div>
          <div class="title-desktop"><h3>CHÓ</h3></div>
        </a>
      </div>
      <!--meo-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="thucung-loai.php?loai=MEO">
          <div class="img-value">
            <img src="images/CAT3.jpg" >
          </div>
          <div class="title-desktop"><h3>MÈO</h3></div>
        </a>
      </div>
      <!--phu kien-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="sanpham-loai.php?loai=LSP02">
          <div class="img-value">
            <img src="images/shirt.jpg" >
          </div>
          <div class="title-desktop"><h3>PHỤ KIỆN</h3></div>
        </a>
      </div>
       <!--thu cung khac-->
       <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="thucung-loai.php?loai=OTHER">
          <div class="img-value">
            <img src="images/OTHER2.jpg" >
          </div>
          <div class="title-desktop"><h3>THÚ CƯNG LẠ</h3></div>
        </a>
      </div>
      <!--chuot-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="thucung-loai.php?loai=HAMSTER">
          <div class="img-value">
            <img src="images/HAMTER2.jpg" >
          </div>
          <div class="title-desktop"><h3>CHUỘT</h3></div>
        </a>
      </div>
      <!--chim-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="thucung-loai.php?loai=CHIM">
          <div class="img-value">
            <img src="images/BIRD2.jpg" >
          </div>
          <div class="title-desktop"><h3>CHIM</h3></div>
        </a>
      </div>
     
      
      <!--thuoc-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="sanpham-loai.php?loai=LSP04">
          <div class="img-value">
            <img src="images/medicine3.jpg" >
          </div>
          <div class="title-desktop"><h3>THUỐC</h3></div>
        </a>
      </div>
      <!--thuc an-->
      <div class="col-md-3 col-sm-4 col-xs-6 item-desktop">
        <a href="sanpham-loai.php?loai=LSP03">
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
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script language="javascript" src="assets/scripts/java.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php 
  include 'include/footer.php';
?>