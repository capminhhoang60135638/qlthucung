<?php
	include ('include/header.php');
	require("connection/connect.php");

	$ma_loai=$_REQUEST['loai'];
	$a = "SELECT ten_loai FROM loai_sp WHERE ma_loai = '$ma_loai'";
	$qr = mysqli_query($dbc,$a);
	$row=mysqli_fetch_array($qr);
	echo '<div class="container ">
    	<div class="title"><h2>'.$row["ten_loai"].'</h2></div>
    <div class="row">';
		$strSQL = "SELECT * FROM san_pham WHERE ma_loai = '$ma_loai'";
		$result = mysqli_query($dbc,$strSQL);
		if(mysqli_num_rows($result) == 0){
			echo "Chưa có dữ liệu";
		}
		else
		{	$stt=1;
			while ($row = mysqli_fetch_array($result)){
				echo '<div class="col-lg-4 col-md-12 p-1 w-100 rounded">
					<div class="box m-1">
					<a href="sanpham-xem.php?ma_sp='.$row['0'].'"><img style="height:300px;" class="img-fluid w-100" src="images/'.$row['5'].'" alt="Card image" /></a>
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
	include ('include/footer.php');
 ?>