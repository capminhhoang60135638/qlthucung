<?php 
	include('include/headerAdmin.html');
	require("connection/connect.php");
?>
<style type="text/css">
/*		table,tr,td{
            border: 1px solid LightSteelBlue;
            border-collapse: collapse;
        }*/
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
<?php 
	// $strSQL = "SELECT * FROM thu_cung;";
	// $result = mysqli_query($dbc,$strSQL);
	// $ma_tc =  mysqli_num_rows($result)+1;
 ?>
<form action="" method="post" enctype="multipart/form-data">
<table align="center" id="table_themnv">
	<thead>
		<td colspan="2">THÊM MỚI THÚ CƯNG</td>
	</thead>
	<tr>
		<td id="fl_right">Mã thú cưng: </td>
		<td><input type="text" name="ma_tc"  value="<?php if(isset($_POST['ma_tc'])) echo $_POST['ma_tc'];?>"/></td>
	</tr>
	<tr>
		<td>Loại thú cưn: </td>
		<td><select name="loai_thu_cung">
				<?php 
					$query="select * from loai_thu_cung";	//Hiển thị tên các loại sữa
					$result=mysqli_query($dbc,$query);
					if(mysqli_num_rows($result)<>0){
						while($row=mysqli_fetch_array($result)){
							$ma_loai_tc=$row['ma_loai_tc'];
							$ten_loai_tc=$row['ten_loai_tc'];
							echo "<option value='".$ma_loai_tc."' "; 
								if(isset($_REQUEST['loai_thu_cung']) && ($_REQUEST['loai_thu_cung']==$ma_loai_tc)) echo "selected='selected'";
							echo ">".$ten_loai_tc."</option>";
						}
					}
					mysqli_free_result($result);
				?>								
			</select>
		</td>
	</tr>
	<tr>
		<td id="fl_right">Tên thú cưng: </td>
		<td><input type="text" name="ten_tc"  value="<?php if(isset($_POST['ten_tc'])) echo $_POST['ten_tc'];?>" required/></td>
	</tr>
	<tr>
		<td>Tuổi: </td>
		<td><input type="number" name="tuoi" value="<?php if(isset($_POST['tuoi'])) echo $_POST['tuoi'];?>" required/></td>
	</tr>
	<tr>
		<td>Kho: </td>
		<td><input type="number" name="so_luong_ton" min="1" value="<?php if(isset($_POST['so_luong_ton'])) echo $_POST['so_luong_ton'];?>" required/></td>
	</tr>
	<tr>
		<td>Mô tả: </td>
		<td><textarea name="mo_ta" rows="3" cols="53"> <?php if(isset($_POST['mo_ta'])) echo $_POST['mo_ta'];?> </textarea></td>
	</tr>
	<tr>
		<td>Ảnh thú cưng: </td>
		<td><input type="FILE" name ="anh_minh_hoa" value="<?php if(isset($_POST['anh_minh_hoa'])) echo $_POST['anh_minh_hoa'];?>" required/></td>
	</tr>
	<tr>
		<td>Giá bán: </td>
		<td><input type="number" min="10000" name="don_gia" value="<?php if(isset($_POST['don_gia'])) echo $_POST['don_gia'];?>" required/></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input class="btn btn-success" type="submit" name ="them" size="10" value="Thêm mới" /></td>
	</tr>
</table>
</form>
<?php 
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
			move_uploaded_file($tmp,"image/".$ten_anh_minh_hoa);
		}
	}
	$query="INSERT INTO thu_cung VALUES ('$ma_tc','$ten_tc','$tuoi','$so_luong_ton','$mo_ta','$ten_anh_minh_hoa','$don_gia','$ma_loai_tc')";
	$result=mysqli_query($dbc,$query);
	if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
		echo "<div align='center' style='color: red;'>Thêm mới thú cưng thành công!</div>
		  	<script> setTimeout(function(){window.location='thucung.php';},5000);</script>";
	}
	else //neu khong them duoc
	{
		echo "<div align='center' style='color: red;'>MÃ THÚ CƯNG ĐÃ TỒN TẠI</div>";
	}
}
	mysqli_close($dbc);
 ?>