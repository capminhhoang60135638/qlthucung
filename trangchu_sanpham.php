<?php
	include ('include/header.html');
	require("connection/connect.php");

	echo '<div class="col"><h1 style="color: tomato; font-family:Bahnschrift" class="text-center mb-0">SẢN PHẨM THÚ CƯNG</h1><div class="row">';
		$strSQL = "SELECT * FROM san_pham";
		$result = mysqli_query($dbc,$strSQL);
		if(mysqli_num_rows($result) == 0){
			echo "Chưa có dữ liệu";
		}
		else
		{	$stt=1;
			while ($row = mysqli_fetch_array($result)){
				echo '<div class="col-lg-4 col-md-12 p-1 w-100 rounded">
					<div class="a m-1">
					<a href="details_sanpham.php?ma_sp='.$row['0'].'"><img class="img-fluid w-100" id="anh_sp" src="image/'.$row['5'].'" alt="Card image" /></a>
					<div class="card-body">
						<h4 class="card-title">'.$row['1'].'</h4>
						<b style="color: red;">'.$row['6'].' vnđ</b>
						<input type="submit" class="btn btn-danger" name="" value="Thêm vào giỏ hàng">
					</div>
					</div></div>';
			}
			echo '</div>';
		}
		echo '</div></div>';
		mysqli_close($dbc);
		include ('include/footer.html');
 ?>
