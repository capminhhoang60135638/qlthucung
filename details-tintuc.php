<?php 
	require('include/header-ad.php');
	require("connection/connect.php");
	$ma_tin_tuc= $_REQUEST['ma_tin_tuc'];
	$query="Select * from tin_tuc WHERE ma_tin_tuc = '$ma_tin_tuc'";
	$result=mysqli_query($dbc,$query);		
		if(mysqli_num_rows($result)<>0)
		{	$rows=mysqli_num_rows($result);
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<form method="post" enctype="multipart/form-data">
                <fieldset>
                <legend>CHI TIẾT</legend>';
				echo ' <div class="border_box p-2">
					<h3 style="text-align: center;">'.$row['tieu_de'].'-'.$row['ma_tin_tuc'].'</h3>
					<img style="width:300px; src="images/'.$row['anh_bia'].'" />
					<br><b>Lượt xem:'.$row['luot_xem'].'</b><br>
					<div>'.$row['noi_dung'].'</div>
				</div>
				 <center>
				 <a class="btn btn-success" href="index-tintuc.php">Quay lại danh sách</a>
				 </center> </fieldset></form>';
			}
		}
	mysqli_close($dbc);
	require('include/footer-ad.html');
 ?>
