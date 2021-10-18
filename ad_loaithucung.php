<style type="text/css">
<?php 
	include ('include/admin.css');
?>
</style>
<?php 
	require('include/headerAdmin.html');
	require("connection/connect.php");

	$strSQL = "SELECT * FROM loai_thu_cung";
	$result = mysqli_query($dbc,$strSQL);
	if(mysqli_num_rows($result) == 0){
		echo "Chưa có dữ liệu";
	}
	else
	{	echo "<h1>CÁC LOẠI THÚ CƯNG ĐANG KINH DOANH TẠI SHOP</h1>
		<table width='100%' align=center>
			<thead>
				<td><b>STT</b></td>
				<td><b>Mã loại</b></td>
				<td><b>Tên loại</b></td>
				<td><b>Ghi chú</b></td>
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
				echo "<td>$row[2]</td>";
				echo "<td></td>";
				echo "</tr>";
			}
			else{
				echo "<tr id=mau>";
				echo "<td>$stt</td>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1]</td>";
				echo "<td>$row[2]</td>";
				echo "<td></td>";
				echo "</tr>";
			}
			$stt+=1;
		}
		echo '</table>';
	}
	mysqli_close($dbc);
	include ('include/footer.html');
?>