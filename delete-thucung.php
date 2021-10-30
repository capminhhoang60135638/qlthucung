<?php 
	require('include/header-ad.php');
	require("connection/connect.php");
	$ma_tc= $_REQUEST['ma_tc'];
	$query="SELECT * FROM thu_cung JOIN loai_thu_cung on thu_cung.ma_loai_tc = loai_thu_cung.ma_loai_tc WHERE ma_tc = '$ma_tc'";
	$result=mysqli_query($dbc,$query);		
		if(mysqli_num_rows($result)<>0)
		{	$rows=mysqli_num_rows($result);
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<form method="post" enctype="multipart/form-data"><fieldset>
                <legend>XÓA</legend>';
				if(($_SERVER['REQUEST_METHOD'] == 'POST')){
					$sql = "DELETE FROM thu_cung WHERE ma_tc ='$ma_tc'";
					if (mysqli_query($dbc, $sql)) {
						echo "<div class='alert alert-success' role='alert'>Xóa mặt hàng thành công !
						</div><script> setTimeout(function(){window.location='index-thucung.php';},10000);</script>";
					} else {
						echo "<div class='alert alert-danger' role='alert'>Xóa mặt hàng không thành công !</div>";
					}
				}
				echo '<div class="border_box">
				 	<h3 style="text-align: center;">Bạn có chắc chắn muốn xóa thú cưng '.$row['ten_tc'].' ?</h3>
				 	<div class="row">
				 		<div class="col-lg-6 col-sm-12"><img style="width:80%; float:right" src="images/'.$row['anh_minh_hoa'].'" /></div>
				 		<div class="col-lg-6 col-sm-12">
				 			<label>Mã thú cưng:'.$row['ma_tc'].'</label><br>
				 			<label>Loại:'.$row['ten_loai_tc'].'</label><br>
				 			<label>Mô tả:'.$row['mo_ta'].'</label><br>
				 			<label>Số lượng tồn:'.$row['so_luong_ton'].'</label><br>
				 			<label>Đơn giá: '.$row['don_gia'].' vnđ</label><br>
				 		</div>
				 	</div>
				 </div>
				 <center>
				 <input class="btn btn-danger" type="submit" value="Xóa" name="xoa"/>
				 <a class="btn btn-success" href="index-thucung.php">Quay lại danh sách</a>
				 </center> </fieldset></form>';
			}
		}
	mysqli_close($dbc);
	require('include/footer-ad.html');
 ?>