<?php 
    require('include/header-ad.php');
    require("connection/connect.php");
    $ma_kh = $_GET['ma_kh'];
    // echo $us;
    $query="SELECT * FROM khach_hang WHERE ma_kh = '$ma_kh'";
    $result=mysqli_query($dbc,$query);      
        if(mysqli_num_rows($result)<>0)
        {   $rows=mysqli_num_rows($result);
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
               
                 echo '<fieldset>
    <legend>THÔNG TIN KHÁCH HÀNG</legend>
    <div class="boder-box">
        <div class="row">
    <div class="col-lg-6"><img src="images/'.$row['anh_dai_dien'].'" style="border-radius: 50%;float:right;" width="200px" height="200px"></div>
    <div class="col-lg-6" style="font-size:20px">
        <i>Mã nhân viên:</i><b>'.$row['ma_kh'].'</b></br>
        <i>Họ và tên:</i><b>'.$row['ten_kh'].'</b></br>
        <i>Năm sinh:</i><b>'.$row['nam_sinh'].'</b></br>
        <i>Số điện thoại:</i><b>'.$row['sdt'].'</b></br>
        <i>Địa chỉ:</i><b>'.$row['dia_chi'].'</b></br>
        <i>Username:</i><b>'.$row['username'].'</b></br> 
        <i>Password:</i><b>'.$row['password'].'</b>
    </div>
</div>
    </div>     
</fieldset>
<a href=\'index-khachhang.php\'>Quay lại trang khách hàng</a>';

            }
        }
    mysqli_close($dbc);
    require('include/footer-ad.html');
 ?>
