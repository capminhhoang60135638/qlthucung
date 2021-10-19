<?php
	include ('include/header.html');
?>
<div class="col">
	<h1 style="color: tomato; font-family:Bahnschrift" class="text-center mb-0">TIN TỨC</h1>
	<div class="row">
	<?php 
		require("connection/connect.php");
		$strSQL = "SELECT * FROM tin_tuc";
		$result = mysqli_query($dbc,$strSQL);
		if(mysqli_num_rows($result) == 0){
			echo "Chưa có dữ liệu";
		}
		else{
			while ($row = mysqli_fetch_array($result)){
				echo '<div  class="col-lg-4 col-md-12 p-1 w-100 rounded">
					<div class="a m-1">
					<a href="xem_tintuc.php?ma_tin_tuc='.$row['0'].'"><img style="height:250px;" class="img-fluid w-100" src="image/'.$row['2'].'" alt="Card image" /></a>
					<div class="card-body">
						<h4 class="card-title">'.$row['1'].'</h4>
						<i>Đã có '.$row['5'].' lượt xem</i>
					</div>
					</div>
				</div>';
			}
		}
		mysqli_close($dbc);
	 ?>
	</div>
</div>
<?php
	include ('include/footer.html');
?>
