<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
			$(document).ready(function() {
		var checkedValue = $('input[type=radio][name="rdDanhMuc"]:checked').val();
		if(checkedValue == "Sản phẩm" || checkedValue =="Thú cưng") {
			$(".mh").show();
			$(".hd").hide();
		}
		else{
			$(".mh").hide();
			$(".hd").show();
		}
		$('input[type=radio][name=rdDanhMuc]').change(function() {
			if (this.value == 'Sản phẩm' || this.value =='Thú cưng') {
				$(".hd").hide();
				$(".mh").show();
			} else if (this.value == 'Hóa đơn') {
				$(".mh").hide();
				$(".hd").show();
			}
		});
	});
</script>
<?php 
	include 'include/header-ad.php';
	include 'connection/connect.php';
	$err = NULL;
	$bangTK = "";
	// $date = getdate();
	if(($_SERVER['REQUEST_METHOD'] == 'POST')){
		$nguoiThongKe = trim($_POST['nguoiThongKe']);
		$loaiThongKe = $_POST['loaiThongKe'];
		if (isset($_POST['rdDanhMuc'])) {
			$rdDanhMuc = $_POST['rdDanhMuc'];
			if (isset($_POST['loaiThongKe']) && $_POST['loaiThongKe']!='NULL') {
				$matk = (random_int(1000, 9999)) ;
				$bangTK .= '<fieldset>
					<legend>Chi tiết thống kê:</legend>
					 <div class="border_box p-5" style="pading:10px">
					 	<center><h1>BẢNG BÁO CÁO THỐNG KÊ</h1></center><br>
					 	<b>Mã thống kê: </b> TK'.$matk.'
						<br><b>Họ và tên người lập thống kê:</b> '.$nguoiThongKe.'
						<br><b>Ngày thống kê: </b> '.date("d/m/Y").'
						<br><b>Danh mục thống kê: </b> '.$rdDanhMuc.'
						<br><b>Loại thống kê: </b>'.$rdDanhMuc.' '.$loaiThongKe.'<table class="table table-striped">';
						if($rdDanhMuc == "Thú cưng" && $loaiThongKe == "bán chạy"){
							$strSQL = 'SELECT * FROM thu_cung JOIN loai_thu_cung on thu_cung.ma_loai_tc = loai_thu_cung.ma_loai_tc ORDER BY so_luong_ton LIMIT 0,5';
						    $result = mysqli_query($dbc,$strSQL);
						    if(mysqli_num_rows($result) == 0){
						        $bangTK .= '<p style="color:blue">Không có dữ liệu để thống kê.</p>';
						    }
						    else{
						    	$bangTK .= '<thead><td>#</td><td>Tên mặt hàng</td><td>Loại</td><td>Số lượng tồn</td><td>Đơn giá (vnđ)</td></thead>';
						    	while ($row = mysqli_fetch_array($result)){
						    		$bangTK .= '<tr>
						    		<td>'.$row["ma_tc"].'</td>
						    		<td>'.$row["ten_tc"].'</td>
						    		<td>'.$row["ten_loai_tc"].'</td>
						    		<td><span>'.$row["so_luong_ton"].'</span></td>
						    		<td>'.$row["don_gia"].'</td>
						    		</tr>';
						    	}
						    }
						}
						elseif ($rdDanhMuc == "Thú cưng" && $loaiThongKe == "mới nhập") {
							$strSQL = 'SELECT * FROM thu_cung JOIN loai_thu_cung on thu_cung.ma_loai_tc = loai_thu_cung.ma_loai_tc ORDER BY ma_tc DESC LIMIT 0,5';
						    $result = mysqli_query($dbc,$strSQL);
						    if(mysqli_num_rows($result) == 0){
						        $bangTK .= '<p style="color:blue">Không có dữ liệu để thống kê.</p>';
						    }
						    else{
						    	$bangTK .= '<thead><td>#</td><td>Tên mặt hàng</td><td>Loại</td><td>Số lượng tồn</td><td>Đơn giá (vnđ)</td></thead>';
						    	while ($row = mysqli_fetch_array($result)){
						    		$bangTK .= '<tr>
						    		<td><span>'.$row["ma_tc"].'</span></td>
						    		<td>'.$row["ten_tc"].'</td>
						    		<td>'.$row["ten_loai_tc"].'</td>
						    		<td>'.$row["so_luong_ton"].'</td>
						    		<td>'.$row["don_gia"].'</td>
						    		</tr>';
						    	}
						    }
						}
						elseif ($rdDanhMuc == "Sản phẩm" && $loaiThongKe == "mới nhập") {
							$strSQL = 'SELECT * FROM san_pham join loai_sp on san_pham.ma_loai = loai_sp.ma_loai ORDER BY ma_sp DESC LIMIT 0,5';
						    $result = mysqli_query($dbc,$strSQL);
						    if(mysqli_num_rows($result) == 0){
						        $bangTK .= '<p style="color:blue">Không có dữ liệu để thống kê.</p>';
						    }
						    else{
						    	$bangTK .= '<thead><td>#</td><td>Tên mặt hàng</td><td>Loại</td><td>Số lượng tồn</td><td>Đơn giá (vnđ)</td></thead>';
						    	while ($row = mysqli_fetch_array($result)){
						    		$bangTK .= '<tr>
						    		<td><span>'.$row["ma_sp"].'</span></td>
						    		<td>'.$row["ten_sp"].'</td>
						    		<td>'.$row["ten_loai"].'</td>
						    		<td>'.$row["so_luong_ton"].'</td>
						    		<td>'.$row["don_gia"].'</td>
						    		</tr>';
						    	}
						    }
						}
						elseif ($rdDanhMuc == "Sản phẩm" && $loaiThongKe == "bán chạy") {
							$strSQL = 'SELECT * FROM san_pham join loai_sp on san_pham.ma_loai = loai_sp.ma_loai ORDER BY so_luong_ton LIMIT 0,5';
						    $result = mysqli_query($dbc,$strSQL);
						    if(mysqli_num_rows($result) == 0){
						        $bangTK .= '<p style="color:blue">Không có dữ liệu để thống kê.</p>';
						    }
						    else{
						    	$bangTK .= '<thead><td>#</td><td>Tên mặt hàng</td><td>Loại</td><td>Số lượng tồn</td><td>Đơn giá (vnđ)</td></thead>';
						    	while ($row = mysqli_fetch_array($result)){
						    		$bangTK .= '<tr>
						    		<td>'.$row["ma_sp"].'</td>
						    		<td>'.$row["ten_sp"].'</td>
						    		<td>'.$row["ten_loai"].'</td>
						    		<td><span>'.$row["so_luong_ton"].'</span></td>
						    		<td>'.$row["don_gia"].'</td>
						    		</tr>';
						    	}
						    }
						}
						elseif ($rdDanhMuc == "Hóa đơn" && $loaiThongKe == "tất cả"){
							$strSQL = 'SELECT * FROM hoa_don join khach_hang on hoa_don.ma_kh = khach_hang.ma_kh';
						    $result = mysqli_query($dbc,$strSQL);
						    if(mysqli_num_rows($result) == 0){
						        $bangTK .= '<p style="color:blue">Không có dữ liệu để thống kê.</p>';
						    }
						    else{
						    	$bangTK .= '<thead><td>#</td><td>Tên khách hàng</td><td>Ngày đặt hàng</td><td>SĐT</td><td>Thành tiền (vnđ)</td></thead>';
						    	while ($row = mysqli_fetch_array($result)){
						    		$bangTK .= '<tr>
						    		<td>'.$row["ma_hd"].'</td>
						    		<td>'.$row["ten_kh"].'</td>
						    		<td>'.$row["ngay_mua"].'</td>
						    		<td>'.$row["sdt"].'</td>
						    		<td>'.$row["tong_tien"].'</td>
						    		</tr>';
						    	}
						    }
						}
						elseif ($rdDanhMuc == "Hóa đơn" && $loaiThongKe == "trong tháng 9"){
							$strSQL = 'SELECT * FROM hoa_don join khach_hang on hoa_don.ma_kh = khach_hang.ma_kh WHERE substring(hoa_don.ngay_mua,4,2) = 9';
						    $result = mysqli_query($dbc,$strSQL);
						    if(mysqli_num_rows($result) == 0){
						        $bangTK .= '<p style="color:blue">Không có dữ liệu để thống kê.</p>';
						    }
						    else{
						    	$bangTK .= '<thead><td>#</td><td>Tên khách hàng</td><td>Ngày đặt hàng</td><td>SĐT</td><td>Thành tiền (vnđ)</td></thead>';
						    	while ($row = mysqli_fetch_array($result)){
						    		$bangTK .= '<tr>
						    		<td>'.$row["ma_hd"].'</td>
						    		<td>'.$row["ten_kh"].'</td>
						    		<td><span>'.$row["ngay_mua"].'</span></td>
						    		<td>'.$row["sdt"].'</td>
						    		<td>'.$row["tong_tien"].'</td>
						    		</tr>';
						    	}
						    }
						}
						elseif ($rdDanhMuc == "Hóa đơn" && $loaiThongKe == "trong tháng 10"){
							$strSQL = 'SELECT * FROM hoa_don join khach_hang on hoa_don.ma_kh = khach_hang.ma_kh WHERE substring(hoa_don.ngay_mua,4,2) = 10';
						    $result = mysqli_query($dbc,$strSQL);
						    if(mysqli_num_rows($result) == 0){
						        $bangTK .= '<p style="color:blue">Không có dữ liệu để thống kê.</p>';
						    }
						    else{
						    	$bangTK .= '<thead><td>#</td><td>Tên khách hàng</td><td>Ngày đặt hàng</td><td>SĐT</td><td>Thành tiền (vnđ)</td></thead>';
						    	while ($row = mysqli_fetch_array($result)){
						    		$bangTK .= '<tr>
						    		<td>'.$row["ma_hd"].'</td>
						    		<td>'.$row["ten_kh"].'</td>
						    		<td><span>'.$row["ngay_mua"].'</span></td>
						    		<td>'.$row["sdt"].'</td>
						    		<td>'.$row["tong_tien"].'</td>
						    		</tr>';
						    	}
						    }
						}
				$bangTK .= '</table></div></fieldset>';
				$err = '<div class="alert alert-success" role="alert">Thống kê hoàn thành.</div>';
			}else $err = '<div class="alert alert-danger" role="alert">Bạn chưa chọn loại thống kê.</div>';
		}else $err = '<div class="alert alert-danger" role="alert">Bạn chưa chọn danh mục thống kê.</div>';
	}
 ?>
<form method="post" enctype="multipart/form-data">
<fieldset>
	<legend>BÁO CÁO THỐNG KÊ</legend>
<?php echo $err; ?>
	<style type="text/css">
		table,tr,td{
			padding: 5px;
		}
	</style>
	<table align="center" width="60%">
		<tr>
			<td><label style="float: right;">Người thống kê:</label></td>
			<td><input type="text" class="form-control" name="nguoiThongKe" value="<?php if(isset($_POST['nguoiThongKe'])) echo $nguoiThongKe; ?>" required/></td>
			<td><span>(*)</span></td>
		</tr>
		<tr>
			<td><label style="float: right;">Ngày thống kê:</label></td>
			<td><input type="text" class="form-control" name="ngayThongKe" disabled value="<?php echo date("d/m/Y") ?>"></td>
			<td><span>(*)</span></td>
		</tr>
		<tr>
			<td><label style="float: right;">Danh mục thống kê:</label></td>
			<td style="float: left;">
				<input  type = "radio" name = "rdDanhMuc" value = "Thú cưng" <?php if ((isset($_POST['rdDanhMuc']) && ($_POST['rdDanhMuc']) == "Thú cưng")) echo 'checked' ?>/><label> Thú cưng </label>
				<input  type = "radio" name = "rdDanhMuc" value = "Sản phẩm" <?php if ((isset($_POST['rdDanhMuc']) && ($_POST['rdDanhMuc']) == "Sản phẩm")) echo 'checked' ?>/><label>Sản phẩm</label>
				<input  type = "radio" name = "rdDanhMuc" value = "Hóa đơn" <?php if ((isset($_POST['rdDanhMuc']) && ($_POST['rdDanhMuc']) == "Hóa đơn")) echo 'checked' ?>/><label>Hóa đơn</label>
			</td>
			<td><span>(*)</span></td>
		</tr>

		<tr>
			<td><label style="float: right;">Chọn loại thống kê:</label></td>
			<td>
				<select name="loaiThongKe" class="form-control">
			    	<option value="NULL" selected>--Chọn i--</option>
			   		<option class="hd" value="tất cả"
			   		<?php if(isset($_POST['loaiThongKe'])&& $_POST['loaiThongKe']=='tất cả') echo 'selected';?>>tất cả</option>
			   		<option class="hd" value="trong tháng 9"
			   		<?php if(isset($_POST['loaiThongKe'])&& $_POST['loaiThongKe']=='trong tháng 9') echo 'selected';?>>trong tháng 9</option>
			    	<option class="hd" value="trong tháng 10"
			    	<?php if(isset($_POST['loaiThongKe'])&& $_POST['loaiThongKe']=='trong tháng 10') echo 'selected';?>>trong tháng 10</option>
			    	<option class="mh" value="bán chạy"
			    	<?php if(isset($_POST['loaiThongKe'])&& $_POST['loaiThongKe']=='bán chạy') echo 'selected';?>>Bán chạy</option>
			   		<option class="mh" value="mới nhập"
			   		<?php if(isset($_POST['loaiThongKe'])&& $_POST['loaiThongKe']=='mới nhập') echo 'selected';?>>Mới nhập</option>
			  	</select>
			</td>
			<td><span>(*)</span></td>
		</tr>
		<tr>
			<td colspan="3"><center><a href="thongke.php" class="btn btn-success">Nhập lại</a> <input class="btn btn-primary" type="submit" name="thongke" value="Thống kê">
				</center></td>
		</tr>
	</table>
</fieldset>
	<br>
	<?php echo $bangTK; ?>
</form>

<?php
	mysqli_close($dbc);
	include 'include/footer-ad.html';
 ?>

