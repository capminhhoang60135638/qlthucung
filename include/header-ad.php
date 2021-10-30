<?php
session_start();
    if (!isset($_SESSION['username'])) {
       header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ADMIN - PETSHOP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    <link rel="stylesheet" href="include/style-ad.css"> <!--css noi dung trang admin-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
<div class="vertical-nav " id="sidebar">
  <div class="py-4 px-3 mb-4" style="border-bottom: 1px solid white;">
    <div class="media d-flex align-items-center"><img src="images/logo5.jpg" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 style="color: white;" class="m-0">PETSHOP</h4>
      </div>
      <hr>
    </div>
  </div>
  <ul class="nav flex-column mb-0"> 
    <li class="nav-item">
      <a href="admin.php" class="nav-link">
            <i class="fas fa-home mr-3"></i>
            HOME
        </a>
    </li>
  </ul>
  <p class="text-light text-uppercase px-3 small py-4 mb-0">QUẢN LÝ</p>
    <ul class="nav flex-column mb-0"> 
    <li class="nav-item">
      <a href="index-nhanvien.php" class="nav-link">
            <i class="fas fa-user-tie mr-3"></i>
            NHÂN VIÊN
        </a>
    </li>
    
    <li class="nav-item">
      <a href="#" class="nav-link">
                <i class="fas fa-wallet mr-3"></i>
                HÓA ĐƠN
            </a>
    </li>
    <li class="nav-item">
      <a href="index-thucung.php" class="nav-link">
                <i class="fas fa-paw mr-3"></i> THÚ CƯNG
            </a>
    </li>
    <li class="nav-item">
      <a href="index-sanpham.php" class="nav-link">
                <i class="fa fa-cubes mr-3"></i> SẢN PHẨM
            </a>
    </li>
  </ul>

  <p class="text-light text-uppercase px-3 small py-4 mb-0">DANH MỤC</p>
  <ul class="nav flex-column mb-0">
    <li class="nav-item">
      <a href="index-loai-thucung.php" class="nav-link">
                <i class="fa fa-box mr-3"></i>
                LOẠI THÚ CƯNG
            </a>
    </li>
    <li class="nav-item">
      <a href="index-loai-sanpham.php" class="nav-link">
                <i class="fa fa-box mr-3"></i>
                LOẠI SẢN PHẨM
            </a>
    </li>
    <li class="nav-item">
      <a href="index-hang-sanpham.php" class="nav-link">
                <i class="fas fa-trademark mr-3"></i>
                THƯƠNG HIỆU
            </a>
    </li>
    <li class="nav-item">
      <a href="index-tintuc.php" class="nav-link">
                <i class="far fa-newspaper mr-3"></i>
                TIN TỨC
            </a>
    </li>
    <li class="nav-item">
      <a href="index-khachhang.php" class="nav-link">
                <i class="fas fa-users mr-3"></i>
                KHÁCH HÀNG
            </a>
    </li>
  </ul>
  <p class="text-light text-uppercase px-3 small py-4 mb-0">BÁO CÁO THỐNG KÊ</p>
  <ul class="nav flex-column mb-0">
    <li class="nav-item">
      <a href="thongke.php" class="nav-link">
                <i class="far fa-chart-bar mr-3"></i>
                THỐNG KÊ
            </a>
    </li>
</ul>
</div>

<div class="page-content" id="content">
  <div class="banner" style="height: 85px;">
    <h1 align="center"><i class="fas fa-paw"></i> P E T S H O P <i class="fas fa-paw"></i></h1>
      <?php 
        if (isset($_SESSION['username']) && $_SESSION['username']!=NULL) {
      ?>
      <div class="dropdown" style="float:right; padding-right: 50px;">
      <h4><a class="dropbtn">XIN CHÀO <?php echo $_SESSION['username']; ?></a></h4>
        <div class="dropdown-content">
          <a href="details-nhanvien.php?us=<?php echo $_SESSION['username']; ?>"> <i class="fas fa-user-alt"></i> Thông tin của bạn </a>
          <a href="logout.php"> <i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
        </div>
      </div>
  </div>
      <?php 
        }
      ?>
      
  <div class="p-5">
