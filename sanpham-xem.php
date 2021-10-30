<?php
	include ('include/header.php');
	$id = $_GET['ma_sp'];
		require("connection/connect.php");
		$query="Select * from san_pham join hang_sp join loai_sp 
		on san_pham.ma_hang = hang_sp.ma_hang and san_pham.ma_loai = loai_sp.ma_loai
		WHERE ma_sp = '$id'";

		$result=mysqli_query($dbc,$query);		
		if(mysqli_num_rows($result)<>0)
		{	$rows=mysqli_num_rows($result);
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<div class="container">
    			<table width=70% align="center">
					<tr>
						<td colspan="2" style="text-align: center; color: OrangeRed;"><h3>'.$row['ten_sp'].'</h3><td>
					</tr>
					<tr>
						<td style="float:right">
							<img id="anh_sp" height="50%" width="400px" src="images/'.$row['anh_minh_hoa'].'" />
						</td>
						<td>
							
							<p>
								Kho: '.$row['so_luong_ton'].'<br>Mô tả:<br>'.$row['mo_ta'].'<br>Loại: '.$row['ten_loai'].'
							</p>
						</td>
					</tr>
					<tr>
						<td colspan="2"><center><b style="color: red;">'.$row['don_gia'].' vnđ</b><input type="submit" class="btn btn-danger" name="" value="Thêm vào giỏ hàng"></center></td>
					</tr>
				</table></div>';
			}
		}
    mysqli_close($dbc);
	include ('include/footer.php');
?>