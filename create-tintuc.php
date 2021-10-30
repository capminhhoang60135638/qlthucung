<?php 
	include 'include/header-ad.php';
	include 'connection/connect.php';
	$tb = "";
	$ma_tin_tuc = $tieu_de = $noi_dung = $tom_tat = NULL;
	$check = "SELECT * FROM tin_tuc";
        $result1=mysqli_query($dbc,$check);
        $ma = mysqli_num_rows($result1);
        if ($ma>9) {
            $ma_tin_tuc= "TT0".$ma+1;
        }else{
            $ma_tin_tuc= "TT00".$ma+1;
        }
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['ma_tin_tuc'])){
		$ma_tin_tuc="";
	}
	else{
		$ma_tin_tuc=trim($_POST['ma_tin_tuc']);
	}
	if(empty($_POST['tieu_de'])){
		$tieu_de="";
	}
	else{
		$tieu_de=$_POST['tieu_de'];
	}
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
		}
	}
	$query="INSERT INTO tin_tuc VALUES ('$ma_tin_tuc','$tieu_de','$ten_anh_bia','$tom_tat','$noi_dung',$luot_xem,'$nguoi_dang')";
	$result=mysqli_query($dbc,$query);
	if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
		$tb .= "<div class='alert alert-success' role='alert'>Bạn vừa thêm tin thành công !<script> setTimeout(function(){window.location='index-tintuc.php';},5000);</script></div>";
	}
	else //neu khong them duoc
	{
		$tb .= "<div class='alert alert-danger' role='alert'>Mã tin này đã tồn tại!<br>Vui lòng đặt mã khác.</div>";
	}
}
?>
<form method="post" enctype="multipart/form-data">
	<fieldset>
    <legend>THÊM MỚI TIN</legend>
  <div class="form-group">
	<?php echo $tb;?>
  	<label>Mã tin:</label>
  	<input class="form-control" type="text" name="ma_tin_tuc" value="<?php echo $ma_tin_tuc;?>" disabled/>
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
								if(isset($_REQUEST['nguoi_dang']) && ($_REQUEST['nguoi_dang']==$ma_qt)) echo "selected='selected'";
							echo ">".$ten_qt."</option>";
						}
					}
					mysqli_free_result($result);
				?>								
			</select>
	<label>Tiêu đề:</label><span>(*)</span>
	<input class="form-control" type="text" name="tieu_de" value="<?php if(isset($_POST['tieu_de'])) echo $_POST['tieu_de'];?>" required/>
	<label>Tóm tắt:</label><span>(*)</span>
	<textarea class="form-control" name="tom_tat" rows="3" cols="53" required> <?php if(isset($_POST['tom_tat'])) echo $_POST['tom_tat'];?> </textarea>
	<label>Nội dung:</label><span>(*)</span>
	<textarea class="form-control" name="noi_dung" rows="20" cols="53" required> <?php if(isset($_POST['noi_dung'])) echo $_POST['noi_dung'];?> </textarea>
	<label>Ảnh bìa:</label><span>(*)</span>
	<input class="form-control-file" type="FILE" name ="anh_bia" value="<?php if(isset($_POST['anh_bia'])) echo $_POST['anh_bia'];?>" required/>
	<center><button type="submit" align="center" class="btn btn-primary" name ="them">Tạo tin</button></center>
  </div>
</fieldset>
</form>
<?php
	mysqli_close($dbc);
	include 'include/footer-ad.html';
 ?>

		  	
