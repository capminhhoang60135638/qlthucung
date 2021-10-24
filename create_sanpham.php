<?php 
include 'include/headerAdmin.html';
	require("connection/connect.php");
?>
<style type="text/css">
    thead{
        	text-align: center;
        	color: red;
        	font-weight: bold;
        	font-size: 40px;
        }
        td{ 
            padding: 5px 5px;
        }
        button{
            font-weight: bold;
            padding: 5px 25px;
            cursor: pointer;
            text-align: center;
            color: black;
            background-color: Cornsilk ;
            border-radius: 15px;
        }
        input, select, textarea{
            padding: 5px;
            border-radius: 15px;
        }
        select, input{
        	width: 100%;

        }
</style>
<form method="post" enctype="multipart/form-data">
<table align="center" id="table_themnv">
	<thead>
		<td colspan="2">THÊM MỚI SẢN PHẨM</td>
	</thead>
	<tr>
		<td id="fl_right">Mã sản phẩm: </td>
		<td><input type="text" name="ma_sp" value="<?php if(isset($_POST['ma_sp'])) echo $_POST['ma_sp'];?>"/></td>
	</tr>
	<tr>
		<td id="fl_right">Tên sản phẩm: </td>
		<td><input type="text" name="ten_sp" value="<?php if(isset($_POST['ten_sp'])) echo $_POST['ten_sp'];?>" required/></td>
	</tr>
	<tr>
		<td>Danh mục: </td>
		<td><select name="loai_sp">
				<?php 
					$query="select * from loai_sp";
					$result=mysqli_query($dbc,$query);
					if(mysqli_num_rows($result)<>0){
						while($row=mysqli_fetch_array($result)){
							$ma_loai=$row['ma_loai'];
							$ten_loai=$row['ten_loai'];
							echo "<option value='".$ma_loai."' "; 
								if(isset($_REQUEST['loai_sp']) && ($_REQUEST['loai_sp']==$ma_loai)) echo "selected='selected'";
							echo ">".$ten_loai."</option>";
						}
					}
					mysqli_free_result($result);
				?>								
			</select>
		</td>
	</tr>
	<tr>
		<td id="fl_right">Hãng: </td>
		<td><select name="hang_sp">
				<?php 
					$query="select * from hang_sp";	//Hiển thị tên các loại sản phẩm
					$result=mysqli_query($dbc,$query);
					if(mysqli_num_rows($result)<>0){
						while($row=mysqli_fetch_array($result)){
							$ma_hang =$row['ma_hang'];
							$ten_hang =$row['ten_hang'];
							echo "<option value='".$ma_hang."' "; 
								if(isset($_REQUEST['hang_sp']) && ($_REQUEST['hang_sp']==$ma_hang)) echo "selected='selected'";
							echo ">".$ten_hang."</option>";
						}
					}
					mysqli_free_result($result);
				?>								
			</select>
		</td>
	</tr>
	<tr>
		<td>Kho: </td>
		<td><input type="number" name="so_luong_ton" value="<?php if(isset($_POST['so_luong_ton'])) echo $_POST['so_luong_ton'];?>" required/></td>
	</tr>
	<tr>
		<td>Mô tả: </td>
		<td><textarea name="mo_ta" rows="3" cols="53"> <?php if(isset($_POST['mo_ta'])) echo $_POST['mo_ta'];?> </textarea></td>
	</tr>
	<tr>
		<td>Ảnh sản phẩm: </td>
		<td><input type="FILE" name ="anh_minh_hoa" value="<?php if(isset($_POST['anh_minh_hoa'])) echo $_POST['anh_minh_hoa'];?>" required/></td>
	</tr>
	<tr>
		<td>Giá bán: </td>
		<td><input type="number" name="don_gia" value="<?php if(isset($_POST['don_gia'])) echo $_POST['don_gia'];?>" required/></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input class="btn btn-success" type="submit" name ="them" size="10" value="Thêm mới" /></td>
	</tr>
</table>
</form>
<?php 
	$ma_sp = $ten_sp =  $so_luong_ton =  $don_gia = $mo_ta = NULL;
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['ma_sp'])){
		$ma_sp="";
	}
	else{
		$ma_sp=trim($_POST['ma_sp']);
	}
	if(empty($_POST['ten_sp'])){
		$ten_sp="";
	}
	else{
		$ten_sp=trim($_POST['ten_sp']);
	}

	$ma_hang = $_POST['hang_sp'];
	$ma_loai = $_POST['loai_sp'];

	if(empty($_POST['so_luong_ton'])){
		$so_luong_ton="";
	}
	else{
		$so_luong_ton=$_POST['so_luong_ton'];
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
			move_uploaded_file($tmp,"image/".$ten_anh_minh_hoa);
		}
	}
	$query="INSERT INTO san_pham VALUES ('$ma_sp','$ten_sp','$ma_hang','$so_luong_ton','$mo_ta','$ten_anh_minh_hoa','$don_gia','$ma_loai')";
	$result=mysqli_query($dbc,$query);
	if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
		echo "<div align='center' style='color: red;'>Thêm mới sản phẩm thành công!</div>
		  	<script> setTimeout(function(){window.location='sanpham.php';},5000);</script>";
	}
	else //neu khong them duoc
	{
		echo "<div align='center' style='color: red;'>MÃ SẢN PHẨM ĐÃ TỒN TẠI</div>";
	}
}
	mysqli_close($dbc);

	include 'include/footerAdmin.html';
 ?>

