<style type="text/css">
	table, td, tr{
		/*border: 1px solid red;*/
        padding: 10px;
	}
	img{
		float: right;
		width: 40vw ;
	}
</style>
<?php 
	require('include/headerAdmin.html');
	require("connection/connect.php");
	$ma_tc= $_REQUEST['ma_tc'];
	$query="Select * from thu_cung join loai_thu_cung on thu_cung.ma_loai_tc = loai_thu_cung.ma_loai_tc WHERE ma_tc = '$ma_tc'";
	$result=mysqli_query($dbc,$query);		
		if(mysqli_num_rows($result)<>0)
		{	$rows=mysqli_num_rows($result);
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<table width=70% align="center">
					<tr>
						<td colspan="2" style="text-align: center; color: OrangeRed;"><h3>BẠN ĐÃ XÓA '.$row['ten_tc'].'</h3><td>
					</tr>
					<tr>
						<td>
							<img id="anh_sp" height="50%" src="image/'.$row['anh_minh_hoa'].'" />
						</td>
						<td>
							<b style="color: red;">'.$row['don_gia'].' vnđ</b>
							<p>
								Kho: '.$row['so_luong_ton'].'<br>Mô tả:<br>'.$row['mo_ta'].'<br>Loại: '.$row['ten_loai_tc'].'
							</p>
						</td>
					</tr>
					<tr>
						<td colspan="2"><a class="btn btn-success" href="thucung.php">Quay lại danh sách</a></td>
					</tr>
				</table>';
			}
		}
		if(isset($_REQUEST['ma_tc']) and $_REQUEST['ma_tc']!=""){
			$sql = "DELETE FROM thu_cung WHERE ma_tc='$ma_tc'";
			if (mysqli_query($dbc, $sql)) {
			echo "Xoá thành công!";
			} else {
			echo "Lỗi !";
			}
		}
	mysqli_close($dbc);
	require('include/footerAdmin.html');
 ?>

