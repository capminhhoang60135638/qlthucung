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
	include ('include/header.html');
	$id = $_GET['ma_tc'];
		require("connection/connect.php");
		$query="Select * from thu_cung join loai_thu_cung on thu_cung.ma_loai_tc = loai_thu_cung.ma_loai_tc WHERE ma_tc = '$id'";

		$result=mysqli_query($dbc,$query);		
		if(mysqli_num_rows($result)<>0)
		{	$rows=mysqli_num_rows($result);
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<table width=70% align="center">
					<tr>
						<td colspan="2" style="text-align: center; color: OrangeRed;"><h3>'.$row['ten_tc'].'</h3><td>
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
						<td colspan="2"><center><input type="submit" class="btn btn-danger" name="" value="Thêm vào giỏ hàng"></center></td>
					</tr>
				</table>';
			}
		}
	include ('include/footer.html');
?>