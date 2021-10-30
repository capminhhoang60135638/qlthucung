<?php 
	include 'include/header-ad.php';
	include 'connection/connect.php';
	$tb = "";
	$ma_tc= $_REQUEST['ma_tc'];
	$query="select * from thu_cung where ma_tc = '$ma_tc'";
	$result=mysqli_query($dbc,$query);
	$row=mysqli_fetch_array($result);
	
	$ma_tc = $row['ma_tc'];
	$ten_tc = $row['ten_tc'];
	$tuoi = $row['tuoi'];
	$so_luong_ton = $row['so_luong_ton'];
	$don_gia = $row['don_gia'];
	$mo_ta = $row['mo_ta'];
	$loai_thu_cung = $row['ma_loai_tc'];
	$anh_minh_hoa = $row['anh_minh_hoa'];

if($_SERVER['REQUEST_METHOD']=="POST"){
	$ma_tc=$ma_tc;
	$ten_tc=trim($_POST['ten_tc']);
	$loai_thu_cung = $_POST['loai_thu_cung'];
	$so_luong_ton=$_POST['so_luong_ton'];
	$tuoi=$_POST['tuoi'];
	$don_gia=$_POST['don_gia'];
	$mo_ta=$_POST['mo_ta'];

	if($_FILES['anh_minh_hoa']['name']!=""){
		$anh_minh_hoa=$_FILES['anh_minh_hoa'];
		$ten_anh_minh_hoa=$anh_minh_hoa	['name'];
		$type=$anh_minh_hoa['type'];
		$size=$anh_minh_hoa['size'];
		$tmp=$anh_minh_hoa['tmp_name'];
		if(($type=='image/jpeg' || ($type=='image/bmp') || ($type=='image/gif') && $size<8000))
		{
			move_uploaded_file($tmp,"images/".$ten_anh_minh_hoa);
		}
		$query="UPDATE thu_cung
		SET ten_tc = '$ten_tc', ma_loai_tc = '$loai_thu_cung',
	 	tuoi ='$tuoi', so_luong_ton = '$so_luong_ton',
	 	don_gia = '$don_gia', mo_ta = '$mo_ta', 
		anh_minh_hoa = '$ten_anh_minh_hoa'
		WHERE ma_tc = '$ma_tc'";
	}else{
		$query="UPDATE thu_cung
		SET ten_tc = '$ten_tc', ma_loai_tc = '$loai_thu_cung',
		 tuoi ='$tuoi', so_luong_ton = '$so_luong_ton',
		 don_gia = '$don_gia', mo_ta = '$mo_ta'
		WHERE ma_tc = '$ma_tc'";
	}

	$result=mysqli_query($dbc,$query);
	if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
		$tb .= "<div class='alert alert-success' role='alert'>Cập nhật thông tin thú cưng thành công !<script> setTimeout(function(){window.location='index-thucung.php';},2000);</script></div>";
	}
	else //neu khong them duoc
	{
		$tb .= "<div class='alert alert-danger' role='alert'>Mã thú cưng này đã tồn tại!<br>Vui lòng đặt mã khác.</div>";
	}
}?>
<form method="post" enctype="multipart/form-data">
	<fieldset>
    <legend>CẬP NHẬT THÔNG TIN THÚ CƯNG</legend>
  <div class="form-group">
  	<?php echo $tb; ?>
  	<label>Mã thú cưng: </label><span>(*)</span>
  	<input class="form-control" type="text" name="ma_tc" value="<?php echo $ma_tc;?>" disabled/>

  	<label>Loại:</label><span>(*)</span>
  		<select name="loai_thu_cung" class="form-control" >
				<?php 
					$query="select * from loai_thu_cung";	
					$result=mysqli_query($dbc,$query);
					if(mysqli_num_rows($result)<>0){
						while($row=mysqli_fetch_array($result)){
							$ma_loai=$row['ma_loai_tc'];
							$ten_loai=$row['ten_loai_tc'];
							echo "<option value='".$ma_loai."' "; 
								if($loai_thu_cung==$ma_loai) echo "selected='selected'";
							echo ">".$ten_loai."</option>";
						}
					}
					mysqli_free_result($result);
				?>								
			</select>	
	<label>Tên thú cưng:</label><span>(*)</span>
	<input class="form-control" type="text" name="ten_tc"  value="<?php echo $ten_tc;?>" required/>

	<label>Tuổi:</label><span>(*)</span>
	<input class="form-control" type="number" name="tuoi" value="<?php echo $tuoi;?>" required/>

	<label>Kho:</label><span>(*)</span>
	<input class="form-control" type="number" name="so_luong_ton" min="1" value="<?php echo $so_luong_ton;?>" required/>


	<label>Mô tả:</label><span>(*)</span>
	<textarea class="form-control" name="mo_ta" rows="3" cols="53"> <?php echo $mo_ta;?> </textarea>

	<label>Đơn giá:</label><span>(*)</span>
	<input class="form-control" min="10000" type="number" name="don_gia" value="<?php echo $don_gia;?>" required/>

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