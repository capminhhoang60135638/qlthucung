<style type="text/css">
	table, td, tr{
		/*border: 1px solid red;*/
        padding: 10px;
	}
	img{
		float: right;
		width: 40vw ;
	}
	form{
		float: center;
		width: 500px;
	}
</style>
<?php
	require('include/headerAdmin.html');
	require("connection/connect.php");
?>
<form>
	<table bgcolor="#eeeeee" align="center" width="70%" border="1" 
	   cellpadding="5" cellspacing="5" style="border-collapse: collapse;">
	<tr>
		<td align="center"><font color="blue"><h3>TÌM KIẾM THÔNG TIN SẢN PHẨM THÚ CƯNG</h3></font></td>
	</tr>
	<tr>
		<td align="center">Tên sản phẩm: <input type="text" name="ten_sp" size="30" 
					value="<?php if(isset($_GET['ten_sp'])) echo $_GET['ten_sp'];?>">
				<input type="submit" name="tim" value="Tìm kiếm"></td>
	</tr>
	</table>
</form>
	<div class="row">
	<?php 
		
		if($_SERVER['REQUEST_METHOD']=='GET')
		{
			if(empty($_GET['ten_sp'])) echo "<p align='center'>Vui lòng nhập tên sản phẩm</p>";
			else
			{
				$ten_tc=$_GET['ten_sp'];	

				$query="Select san_pham.*, ten_sp 
				      from thu_cung,loai_san_pham 
				      WHERE san_pham.ma_loai_sp=loai_san_pham.ma_loai_sp
							AND ten_sp like '%$ten_sp%'";
				$result=mysqli_query($dbc,$query);		
				if(mysqli_num_rows($result)<>0)
				{	$rows=mysqli_num_rows($result);
					echo "<div align='center'><b>Có $rows sản phẩm được tìm thấy.</b></div>";
					while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
					{
						echo '<div class="col-lg-4 col-sm-6"><table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
							<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>'.
								$row['ten_sp'].' - '.$row['hang_sp'].' - 
								'.$row['so_luong_ton'] . '<br>
								'.$row['don_gia'] . ' <br> 
								'.$row['ma_loai_sp'].'</h3></td></tr>';
						echo '<tr><td width="200" align="center"><img style="width: 350px; height: 300px" src="image/'.$row['anh_minh_hoa'].'"/></td>';
						
						echo '</td></tr></table></div>';
					}
				}
				else echo "<div><b>Không tìm thấy sản phẩm này.</b></div>";
			}
		}
		
	?>
	</div>

<?php
	require('include/footerAdmin.html');
?>



