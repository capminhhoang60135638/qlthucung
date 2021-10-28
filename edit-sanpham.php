<?php 
	include 'include/header-ad.php';
	include 'connection/connect.php';
	$tb = "";
	$ma_sp= $_REQUEST['ma_sp'];
	$query="select * from san_pham where ma_sp = '$ma_sp'";
	$result=mysqli_query($dbc,$query);
	$row=mysqli_fetch_array($result);
	
	$ma_sp = $row['ma_sp'];
	$ten_sp = $row['ten_sp'];
	$so_luong_ton = $row['so_luong_ton'];
	$don_gia = $row['don_gia'];
	$mo_ta = $row['mo_ta'];
	$anh_minh_hoa = $row['anh_minh_hoa'];
	$loai_sp = $row['ma_loai'];
	$hang_sp = $row['ma_hang'];

if($_SERVER['REQUEST_METHOD']=="POST"){
	$ma_sp = $ma_sp;
	$ten_sp = trim($_POST['ten_sp']);
	$so_luong_ton = $_POST['so_luong_ton'];
	$don_gia = $_POST['don_gia'];
	$mo_ta = $_POST['mo_ta'];
	$loai_sp = $_POST['loai_sp'];
	$hang_sp = $_POST['hang_sp'];

	if($_FILES['anh_minh_hoa']['name']!=""){
		$anh_minh_hoa=$_FILES['anh_minh_hoa'];
		$ten_anh_minh_hoa=$anh_minh_hoa	['name'];
		$type=$anh_minh_hoa['type'];
		$size=$anh_minh_hoa['size'];
		$tmp=$anh_minh_hoa['tmp_name'];
		if(($type=='image/jpeg' || ($type=='image/bmp') || ($type=='image/gif') && $size<8000))
		{
			move_uploaded_file($tmp,"image/".$ten_anh_minh_hoa);
		}$query="UPDATE san_pham
		SET ten_sp = '$ten_sp', ma_loai = '$loai_sp', so_luong_ton = '$so_luong_ton', don_gia = '$don_gia', mo_ta = '$mo_ta', 
	 	anh_minh_hoa = '$ten_anh_minh_hoa', ma_hang = '$hang_sp'
	WHERE ma_sp = '$ma_sp'";
	}else{
		$query="UPDATE san_pham
		SET ten_sp = '$ten_sp', ma_loai = '$loai_sp',
	  	so_luong_ton = '$so_luong_ton',
	 	don_gia = '$don_gia', mo_ta = '$mo_ta', ma_hang = '$hang_sp'
		WHERE ma_sp = '$ma_sp'";
	}

	$result=mysqli_query($dbc,$query);
	if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
		$tb .= "<div class='alert alert-success' role='alert'>Cập nhật thông tin sản phẩm thành công !<script> setTimeout(function(){window.location='index-sanpham.php';},2000);</script></div>";
	}
	else
	{
		$tb .= "<div class='alert alert-danger' role='alert'>Lỗi!<br>Vui lòng thử lại.</div>";
	}
}?>
<form method="post" enctype="multipart/form-data">
	<fieldset>
    <legend>CẬP NHẬT THÔNG TIN SẢN PHẨM</legend>
  <div class="form-group">
  	<?php echo $tb; ?>
  	<label>Mã sản phẩm:</label><span>(*)</span>
  	<input class="form-control" type="text" name="ma_sp" value="<?php echo $ma_sp;?>" disabled/>
  	<label>Tên sản phẩm:</label><span>(*)</span>
  	<input class="form-control" type="text" name="ten_sp" value="<?php echo $ten_sp;?>" required/>

  	<label>Danh mục:</label><span>(*)</span>
  			<select name="loai_sp" class="form-control" >
				<?php 
					$query="select * from loai_sp";	
					$result=mysqli_query($dbc,$query);
					if(mysqli_num_rows($result)<>0){
						while($row=mysqli_fetch_array($result)){
							$ma_loai=$row['ma_loai'];
							$ten_loai=$row['ten_loai'];
							echo "<option value='".$ma_loai."' "; 
								if($loai_sp==$ma_loai) echo "selected='selected'";
							echo ">".$ten_loai."</option>";
						}
					}
					mysqli_free_result($result);
				?>								
			</select>

	<label>Hãng:</label><span>(*)</span>
  			<select name="hang_sp" class="form-control">
				<?php 
					$query="select * from hang_sp";
					$result=mysqli_query($dbc,$query);
					if(mysqli_num_rows($result)<>0){
						while($row=mysqli_fetch_array($result)){
							$ma_hang =$row['ma_hang'];
							$ten_hang =$row['ten_hang'];
							echo "<option value='".$ma_hang."' "; 
								if($hang_sp==$ma_hang) echo "selected='selected'";
							echo ">".$ten_hang."</option>";
						}
					}
					mysqli_free_result($result);
				?>								
			</select>

	<label>Kho:</label><span>(*)</span>
	<input class="form-control" type="number" name="so_luong_ton" min="1" value="<?php echo $so_luong_ton;?>" required/>

	<label>Mô tả:</label><textarea class="form-control" name="mo_ta" rows="3" cols="53"> <?php echo $mo_ta;?> </textarea>

	<label>Kho:</label><span>(*)</span>
	<input class="form-control" type="number" name="so_luong_ton" min="1" value="<?php echo $so_luong_ton;?>" required/>
	
	<label>Đơn giá:</label><span>(*)</span>
	<input class="form-control" min="10000" type="number" name="don_gia" placeholder="Đơn giá phải trên 10000" value="<?php echo $don_gia;?>" required/>

	<label>Ảnh minh họa:</label><span>(*)</span>
	<input class="form-control-file" type="FILE" name ="anh_minh_hoa"/>

	<center><button type="submit" align="center" class="btn btn-primary" name ="capNhat">Cập nhật</button></center>
  </div>
</fieldset>
</form>
<?php 
	mysqli_close($dbc);
	include 'include/footer-ad.html';
 ?>