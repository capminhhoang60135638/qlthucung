<?php 
    require('include/header-ad.php');
    require("connection/connect.php");
    $us = $_GET['ma_nv'];
    $gt="";
    // echo $us;
    $query="SELECT * FROM quan_tri WHERE ma_qt = '$us'";
    $result=mysqli_query($dbc,$query);      
        if(mysqli_num_rows($result)<>0)
        {   $rows=mysqli_num_rows($result);
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                if($row['gioi_tinh'] == 1) $gt = "Nam";
                else $gt = "Nữ";
                 echo '<fieldset>
    <legend>THÔNG TIN NHÂN VIÊN</legend>
    <div class="boder-box">
        <div class="row">
    <div class="col-lg-6"><img src="images/'.$row['anh_dai_dien'].'" style="border-radius: 50%;float:right;" width="200px" height="200px"></div>
    <div class="col-lg-6" style="font-size:20px">
        <i>Mã nhân viên:</i><b>'.$row['ma_qt'].'</b></br>
        <i>Họ và tên:</i><b>'.$row['ho_ten'].'</b></br>
        <i>Giới tính:</i><b>'.$gt.'</b></br>
        <i>Số điện thoại:</i><b>'.$row['sdt'].'</b></br>
        <i>Địa chỉ:</i><b>'.$row['dia_chi'].'</b></br>
        <i>Username:</i><b>'.$row['username'].'</b> 
    </div>
</div>
    </div>     
</fieldset>';

            }
        }
    mysqli_close($dbc);
    require('include/footer-ad.html');
 ?>
