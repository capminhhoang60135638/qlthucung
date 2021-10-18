<style type="text/css">
<?php include ('include/admin.css'); ?>
</style>
<?php 
	require('include/headerAdmin.html');
	require("connection/connect.php");
	$strSQL = "SELECT * FROM san_pham join loai_sp join hang_sp on san_pham.ma_loai = loai_sp.ma_loai and san_pham.ma_hang = hang_sp.ma_hang";
	$result = mysqli_query($dbc,$strSQL);
	if(mysqli_num_rows($result) == 0){
		echo "Chưa có dữ liệu";
	}
	else
	{	echo "<h1>SẢN PHẨM</h1>
		<a class='btn btn-success m-2' href='create_sanpham.php'>Thêm mới</a>
		<table width='100%' align=center>
			<thead>
				<td><b>STT</b></td>
				<td><b>Mã sản phẩm</b></td>
				<td><b>Tên sản phẩm</b></td>
				<td><b>Loại sản phẩm</b></td>
				<td><b>Hãng</b></td>
				<td><b>Số lượng tồn</b></td>
				<td><b>Đơn giá</b></td>
				<td><b>Chức năng</b></td>
			</thead>";
		$stt=1;
		while ($row = mysqli_fetch_array($result))
		{
			if($stt%2!=0){
				echo "<tr>";
				echo "<td>$stt</td>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1]</td>";
				echo "<td>$row[9]</td>";
				echo "<td>$row[11]</td>";
				echo "<td>$row[3]</td>";
				echo "<td>$row[6] VNĐ</td>";
				echo "<td><a class='edit-btn' href='ad_detail_sanpham.php?ma_sp=".$row[0]."'><abbr title='xem sản phẩm'><img src='image/details.png' width='20px' height='20px' /></abbr></a>|<a class='edit-btn' href='#'><abbr title='sửa sản phẩm'><img src='image/edit.png' width='20px' height='20px' /></abbr></a>|<a class='edit-btn' href='delete_sanpham.php?ma_sp=".$row[0]."'><abbr title='Xóa sản phẩm'><img src='image/delete.png' width='20px' height='20px' /></abbr></a></td>";
				echo "</tr>";
			}
			else{
				echo "<tr id=mau>";
				echo "<td>$stt</td>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1]</td>";
				echo "<td>$row[9]</td>";
				echo "<td>$row[11]</td>";
				echo "<td>$row[3]</td>";
				echo "<td>$row[6] VNĐ</td>";
				echo "<td><a class='edit-btn' href='ad_detail_sanpham.php?ma_sp=".$row[0]."'><abbr title='xem sản phẩm'><img src='image/details.png' width='20px' height='20px' /></abbr></a>|<a class='edit-btn' href='#'><abbr title='sửa sản phẩm'><img src='image/edit.png' width='20px' height='20px' /></abbr></a>|<a class='edit-btn' href='delete_sanpham.php?ma_sp=".$row[0]."'><abbr title='Xóa sản phẩm'><img src='image/delete.png' width='20px' height='20px' /></abbr></a></td>";
				echo "</tr>";
			}
			$stt+=1;
		}
		echo '</table>';
	}
	mysqli_close($dbc);
	include ('include/footer.html');
?>

</body>
</html>
