<?php 
	include 'include/header-ad.php';
	include 'connection/connect.php';
	$tb = "";
$ma_tc = $ten_tc = $tuoi = $so_luong_ton = $don_gia = $mo_ta = NULL;
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['ma_tc'])){
		$ma_tc="";
	}
	else{
		$ma_tc=trim($_POST['ma_tc']);
	}
	if(empty($_POST['ten_tc'])){
		$ten_tc="";
	}
	else{
		$ten_tc=trim($_POST['ten_tc']);
	}

	$ma_loai_tc = $_POST['loai_thu_cung'];

	if(empty($_POST['so_luong_ton'])){
		$so_luong_ton="";
	}
	else{
		$so_luong_ton=$_POST['so_luong_ton'];
	}
	if(empty($_POST['tuoi'])){
		$tuoi="";
	}
	else{
		$tuoi=$_POST['tuoi'];
	}

	if(empty($_POST['don_gia'])){
		$don_gia="";
	}
	else{
		$don_gia=$_POST['don_gia'];
	}

	if(empty($_POST['mo_ta'])){
		$mo_ta="";
	}
	else{
		$mo_ta=$_POST['mo_ta'];
	}

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
	}
	$query="INSERT INTO thu_cung VALUES ('$ma_tc','$ten_tc','$tuoi','$so_luong_ton','$mo_ta','$ten_anh_minh_hoa','$don_gia','$ma_loai_tc')";
	$result=mysqli_query($dbc,$query);
	if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
		$tb .= "<div class='alert alert-success' role='alert'>Bạn vừa thêm thú cưng thành công !<script> setTimeout(function(){window.location='index-thucung.php';},2000);</script></div>";
	}
	else //neu khong them duoc
	{
		$tb .= "<div class='alert alert-danger' role='alert'>Mã thú cưng này đã tồn tại!<br>Vui lòng đặt mã khác.</div>";
	}
}?>
<form method="post" enctype="multipart/form-data">
	<fieldset>
    <legend>THÊM MỚI THÚ CƯNG</legend>
  <div class="form-group">
  	<?php echo $tb; ?>
  	<label>Mã thú cưng: </label><span>(*)</span>
  	<input class="form-control" type="text" name="ma_tc" placeholder="Mã thú cưng bắt đầu bằng 'TC'" value="<?php if(isset($_POST['ma_tc'])) echo $_POST['ma_tc'];?>" pattern="[TC0-9]*" required/>

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
								if(isset($_REQUEST['loai_thu_cung']) && ($_REQUEST['loai_thu_cung']==$ma_loai)) echo "selected='selected'";
							echo ">".$ten_loai."</option>";
						}
					}
					mysqli_free_result($result);
				?>								
			</select>	

	<label>Tên thú cưng:</label><span>(*)</span>
	<input class="form-control" type="text" name="ten_tc"  value="<?php if(isset($_POST['ten_tc'])) echo $_POST['ten_tc'];?>" required/>

	<label>Tuổi:</label><span>(*)</span>
	<input class="form-control" type="number" name="tuoi" value="<?php if(isset($_POST['tuoi'])) echo $_POST['tuoi'];?>" required/>

	<label>Kho:</label><span>(*)</span>
	<input class="form-control" type="number" name="so_luong_ton" min="1" value="<?php if(isset($_POST['so_luong_ton'])) echo $_POST['so_luong_ton'];?>" required/>


	<label>Mô tả:</label>
	<textarea class="form-control" name="mo_ta" rows="3" cols="53"> <?php if(isset($_POST['mo_ta'])) echo $_POST['mo_ta'];?> </textarea>

	<label>Đơn giá:</label><span>(*)</span>
	<input class="form-control" min="10000" type="number" name="don_gia" placeholder="Đơn giá phải trên 10000" value="<?php if(isset($_POST['don_gia'])) echo $_POST['don_gia'];?>" required/>

	<label>Ảnh minh họa:</label><span>(*)</span>
	<input class="form-control-file" type="FILE" name ="anh_minh_hoa" value="<?php if(isset($_POST['anh_minh_hoa'])) echo $_POST['anh_minh_hoa'];?>" required/>

	<center><button type="submit" align="center" class="btn btn-primary" name ="them">Thêm mới</button></center>
  </div>
</fieldset>
</form>
<?php 
	mysqli_close($dbc);
	include 'include/footer-ad.html';
 ?>