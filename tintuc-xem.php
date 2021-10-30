<?php
	include ('include/header.php');
	$id = $_GET['ma_tin_tuc'];
		require("connection/connect.php");
		$query="Select *  from tin_tuc WHERE ma_tin_tuc = '$id'";
		$result=mysqli_query($dbc,$query);	
		echo '<div class="container">';	
		if(mysqli_num_rows($result)<>0)
		{	$rows=mysqli_num_rows($result);
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<div class="title"><h1>'.$row['tieu_de'].'</h1></div>
			        <center><img id="anh_sp" width="60%" src="images/'.$row['anh_bia'].'" /></center>
			        <div class="p-5">
		                    '.$row['noi_dung'].'
			        </div>
				</div>';
			}
		}
		echo '</div>';
    mysqli_close($dbc);
	include ('include/footer.php');
?>