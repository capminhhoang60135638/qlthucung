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
                <legend>XÓA</legend>';
				if(($_SERVER['REQUEST_METHOD'] == 'POST')){
					$sql = "DELETE FROM tin_tuc WHERE ma_tin_tuc ='$ma_tin_tuc'";
					if (mysqli_query($dbc, $sql)) {
						echo "<div class='alert alert-success' role='alert'>Xóa tin thành công !
						</div><script> setTimeout(function(){window.location='index-tintuc.php';},10000);</script>";
					} else {
						echo "<div class='alert alert-danger' role='alert'>Xóa không thành công !</div>";
					}
				}
				echo '<div class="border_box">
				 	<h3 style="text-align: center;">'.$row['tieu_de'].' ?</h3>
				 	<div class="row">
				 		<div class="col-lg-6 col-sm-12"><img style="width:80%; float:right" src="image/'.$row['anh_bia'].'" /></div>
				 		<div class="col-lg-6 col-sm-12">
				 			<label>Mã tin:'.$row['ma_tin_tuc'].'</label><br>
				 			<label>Nội dung tóm tắt:</label><br><i>'.$row['tom_tat'].'<i><br>
				 			<label>Lượt xem:'.$row['luot_xem'].'</label><br>
				 		</div>
				 	</div>
				 </div>
				 <center>
				 <input class="btn btn-danger" type="submit" value="Xóa" name="xoa"/>
				 <a class="btn btn-success" href="index-tintuc.php">Quay lại danh sách</a>
				 </center> </fieldset></form>';
			}
		}
	mysqli_close($dbc);
	require('include/footer-ad.html');
 ?>