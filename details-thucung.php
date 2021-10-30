<?php 
    require('include/header-ad.php');
    require("connection/connect.php");
    $ma_tc= $_REQUEST['ma_tc'];
    $query="SELECT * FROM thu_cung JOIN loai_thu_cung on thu_cung.ma_loai_tc = loai_thu_cung.ma_loai_tc WHERE ma_tc = '$ma_tc'";
    $result=mysqli_query($dbc,$query);      
        if(mysqli_num_rows($result)<>0)
        {   $rows=mysqli_num_rows($result);
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                echo '<form method="post" enctype="multipart/form-data">
                 <fieldset>
                <legend>THÔNG TIN CHI TIẾT</legend>
                <div class="border_box">
                    <h3 style="text-align: center;">'.$row['ten_tc'].'</h3>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12"><img style="width:80%; float:right" src="images/'.$row['anh_minh_hoa'].'" /></div>
                        <div class="col-lg-6 col-sm-12">
                            <label>Mã thú cưng: '.$row['ma_tc'].'</label><br>
                            <label>Loại: '.$row['ten_loai_tc'].'</label><br>
                            <label>Tuổi: '.$row['tuoi'].'</label><br>
                            <label>Mô tả:'.$row['mo_ta'].'</label><br>
                            <label>Số lượng tồn: '.$row['so_luong_ton'].'</label><br>
                            <label>Đơn giá: '.$row['don_gia'].' vnđ</label><br>
                        </div>
                    </div>
                 </div>
                 <center>
                 <a class="btn btn-warning" href="edit-thucung.php?ma_tc='.$ma_tc.'">Sửa</a>
                 <a class="btn btn-success" href="index-thucung.php">Quay lại</a>
                 </center> </fieldset>
                 </form>';
            }
        }
    mysqli_close($dbc);
    require('include/footer-ad.html');
 ?>