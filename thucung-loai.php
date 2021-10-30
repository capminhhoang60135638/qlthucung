<?php
	include ('include/header.php');
	require("connection/connect.php");

	$ma_loai_tc=$_REQUEST['loai'];
	$a = "SELECT ten_loai_tc FROM loai_thu_cung WHERE ma_loai_tc = '$ma_loai_tc'";
	$qr = mysqli_query($dbc,$a);
	$row=mysqli_fetch_array($qr);
	echo '<div class="container ">
    	<div class="title"><h2>THÚ CƯNG - '.$row["ten_loai_tc"].'</h2></div>
    <div class="row">';
		$strSQL = "SELECT * FROM thu_cung WHERE ma_loai_tc = '$ma_loai_tc'";
		$result = mysqli_query($dbc,$strSQL);
		if(mysqli_num_rows($result) == 0){
			echo "Chưa có dữ liệu";
		}
		else
		{	$stt=1;
			while ($row = mysqli_fetch_array($result)){
				echo '<div class="col-lg-4 col-md-12 p-1 w-100 rounded">
					<div class="box m-1">
					<a href="thucung-xem.php?ma_tc='.$row['0'].'"><img style="height:250px;" class="img-fluid w-100" src="images/'.$row['5'].'" alt="Card image" /></a>
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