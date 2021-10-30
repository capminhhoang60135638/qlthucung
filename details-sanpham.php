<?php 
    require('include/header-ad.php');
    require("connection/connect.php");
    $ma_sp= $_REQUEST['ma_sp'];
    $query="SELECT * FROM san_pham join loai_sp join hang_sp on san_pham.ma_loai = loai_sp.ma_loai and san_pham.ma_hang = hang_sp.ma_hang WHERE ma_sp = '$ma_sp'";
    $result=mysqli_query($dbc,$query);      
        if(mysqli_num_rows($result)<>0)
        {   $rows=mysqli_num_rows($result);
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                echo '<form method="post" enctype="multipart/form-data">
                <fieldset>
                <legend>THÔNG TIN CHI TIẾT</legend>
                 <div class="border_box">
                    <h3 style="text-align: center;">'.$row['ten_sp'].' ?</h3>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12"><img style="width:80%; float:right" src="images/'.$row['anh_minh_hoa'].'" /></div>
                        <div class="col-lg-6 col-sm-12">
                            <label>Mã sản phẩm:'.$row['ma_sp'].'</label><br>
                            <label>Loại: '.$row['ten_loai'].'</label><br>
                            <label>Hãng: '.$row['ten_hang'].'</label><br>
                            <label>Mô tả: '.$row['mo_ta'].'</label><br>
                            <label>Số lượng tồn: '.$row['so_luong_ton'].'</label><br>
                            <label>Đơn giá: '.$row['don_gia'].' vnđ</label><br>
                        </div>
                    </div>
                 </div>
                 <center>
                 <a class="btn btn-warning" href="edit-sanpham.php?ma_sp='.$ma_sp.'">Sửa</a>
                 <a class="btn btn-success" href="index-sanpham.php">Quay lại</a>
                 </center> </fieldset></form>';
            }
        }
    mysqli_close($dbc);
    require('include/footer-ad.html');
 ?>

