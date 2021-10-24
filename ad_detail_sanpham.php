<style type="text/css">
	table, td, tr{
        padding: 10px;
	}
	img{
		float: right;
	}
</style>
<?php
	include 'include/headerAdmin.html';
	$id = $_GET['ma_sp'];
		require("connection/connect.php");
		$query="Select * from san_pham join hang_sp on san_pham.ma_hang = hang_sp.ma_hang WHERE ma_sp = '$id'";

		$result=mysqli_query($dbc,$query);		
		if(mysqli_num_rows($result)<>0)
		{	$rows=mysqli_num_rows($result);
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<table align="center">
					<tr>
						<td colspan="2" style="text-align: center; color: OrangeRed;"><h3>THÔNG TIN SẢN PHẨM<br>'.$row['ten_sp'].'</h3><td>
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
						<td colspan="2"><a href="sanpham.php" class="btn btn-success"><< Quay lại danh sách</a></td>
					</tr>
				</table>';
			}
		}
	mysqli_close($dbc);
	include 'include/footerAdmin.html';
?>
