<style type="text/css">
	table, td, tr{
        padding: 10px;
	}
	img{
		float: right;
		width: 40vw ;
	}
</style>
<?php 
include 'include/headerAdmin.html';
	require("connection/connect.php");
	$ma_sp= $_REQUEST['ma_sp'];
	$query="Select * from san_pham join hang_sp on san_pham.ma_hang = hang_sp.ma_hang WHERE ma_sp = '$ma_sp'";
	$result=mysqli_query($dbc,$query);		
		if(mysqli_num_rows($result)<>0)
		{	$rows=mysqli_num_rows($result);
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<table width=70% align="center">
					<tr>
						<td colspan="2" style="text-align: center; color: OrangeRed;"><h3>'.$row['ten_sp'].'</h3><td>
					</tr>
					<tr>
						<td>
							<img id="anh_sp" height="50%" src="image/'.$row['anh_minh_hoa'].'" />
						</td>
						<td>
							<b style="color: red;">'.$row['don_gia'].' vnđ</b>
							<p>
								Kho: '.$row['so_luong_ton'].'<br>Mô tả:<br>'.$row['mo_ta'].'<br>Hãng: '.$row['ten_hang'].'
							</p>
						</td>
					</tr>
					<tr>
						<td colspan="2"><a class="btn btn-success" href="sanpham.php">Quay lại danh sách</a></td>
					</tr>
				</table>';
			}
		}
		if(isset($_REQUEST['ma_sp']) and $_REQUEST['ma_sp']!=""){
			$sql = "DELETE FROM san_pham WHERE ma_sp='$ma_sp'";
			if (mysqli_query($dbc, $sql)) {
			echo "Xoá thành công!";
			} else {
			echo "Lỗi !";
			}
		}
	mysqli_close($dbc);

	include 'include/footerAdmin.html';
 ?>


