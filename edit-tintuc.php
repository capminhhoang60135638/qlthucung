<?php 
	include 'include/header-ad.php';
	include 'connection/connect.php';

	$tb = "";
	$ma_tin_tuc = $_REQUEST['ma_tin_tuc'];
	$query="select * from tin_tuc where ma_tin_tuc = '$ma_tin_tuc'";
	$result=mysqli_query($dbc,$query);
	$row=mysqli_fetch_array($result);
	
	$ma_tin_tuc = $row['ma_tin_tuc'];
	$tieu_de = $row['tieu_de'];
	$tom_tat = $row['tom_tat'];
	$noi_dung = $row['noi_dung'];
	$anh_bia = $row['anh_bia'];
	$nguoi_dang = $row['ma_nv'];

if($_SERVER['REQUEST_METHOD']=="POST"){
	$ma_tin_tuc=$ma_tin_tuc;
	$tieu_de=$_POST['tieu_de'];
	$tom_tat=$_POST['tom_tat'];
	$noi_dung=$_POST['noi_dung'];
	$nguoi_dang = $_POST['nguoi_dang'];
	$luot_xem = rand(100,500);
	if($_FILES['anh_bia']['name']!=""){
		$anh_bia=$_FILES['anh_bia'];
		$ten_anh_bia=$anh_bia['name'];
		$type=$anh_bia['type'];
		$size=$anh_bia['size'];
		$tmp=$anh_bia['tmp_name'];
		if(($type=='image/jpeg' || ($type=='image/bmp') || ($type=='image/gif') && $size<8000))
		{
			move_uploaded_file($tmp,"images/".$ten_anh_bia);
		}$query="UPDATE tin_tuc
	SET tieu_de = '$tieu_de', anh_bia= '$ten_anh_bia', tom_tat = '$tom_tat', noi_dung = '$noi_dung', ma_nv = '$nguoi_dang' WHERE ma_tin_tuc = '$ma_tin_tuc'";
	}else{
		$query="UPDATE tin_tuc
	SET tieu_de = '$tieu_de', tom_tat = '$tom_tat', noi_dung = '$noi_dung', ma_nv = '$nguoi_dang' WHERE ma_tin_tuc = '$ma_tin_tuc'";
	}
	
	$result=mysqli_query($dbc,$query);
	if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
		$tb .= "<div class='alert alert-success' role='alert'>Đã lưu tin tức thành công !<script> setTimeout(function(){window.location='index-tintuc.php';},2000);</script></div>";
	}
	else
	{
		$tb .= "<div class='alert alert-danger' role='alert'>Lỗi!<br>Vui lòng thử lại.</div>";
	}
}
  ?>
<form method="post" enctype="multipart/form-data">
	 <fieldset>
     <legend>SỬA BÀI ĐĂNG</legend>
  <div class="form-group">
  	<?php echo $tb; ?>
  	<label>Mã tin:</label><span>(*)</span>
  	<input class="form-control" type="text" name="ma_tin_tuc" value="<?php echo $ma_tin_tuc; ?>" disabled/>
  	<label>Người đăng:</label><span>(*)</span>
  	<select name="nguoi_dang" class="form-control">
				<?php 
					$query="select * from quan_tri";	//Hiển thị tên các loại sản phẩm
					$result=mysqli_query($dbc,$query);
					if(mysqli_num_rows($result)<>0){
						while($row=mysqli_fetch_array($result)){
							$ma_qt =$row['ma_qt'];
							$ten_qt =$row['ho_ten'];
							echo "<option value='".$ma_qt."' "; 
								if($nguoi_dang==$ma_qt) echo "selected='selected'";
							echo ">".$ten_qt."</option>";
						}
					}
					mysqli_free_result($result);
				?>								
			</select>
	<label>Tiêu đề:</label><span>(*)</span>
	<input class="form-control" type="text" name="tieu_de" value="<?php echo $tieu_de; ?>" required/>
	<label>Tóm tắt:</label><span>(*)</span>
	<textarea class="form-control" name="tom_tat" rows="3" cols="53" required> <?php echo $tom_tat;?> </textarea>
	<label>Nội dung:</label><span>(*)</span>
	<textarea class="form-control" name="noi_dung" rows="20" cols="53" required> <?php echo $noi_dung;?> </textarea>
	<label>Ảnh bìa:</label><span>(*)</span>
	<input class="form-control-file" type="FILE" name ="anh_bia"/>
	<center><input type="submit" align="center" class="btn btn-primary" name ="them" value="Lưu tin"/></center>
  </div></fieldset>
</form> 
<?php
	mysqli_close($dbc);
	include 'include/footer-ad.html';
 ?>

		  	
