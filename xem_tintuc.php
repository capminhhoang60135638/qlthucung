<?php
	include 'include/header.html';
    
	$id = $_GET['ma_tin_tuc'];
		require("connection/connect.php");
		$query="Select * 
		      from tin_tuc
		      WHERE ma_tin_tuc = '$id'";

		$result=mysqli_query($dbc,$query);		
		if(mysqli_num_rows($result)<>0)
		{	$rows=mysqli_num_rows($result);
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<div class="mt-4">
			        <h2>'.$row['tieu_de'].'</h2>
			        <center><img id="anh_sp" width="60%" src="image/'.$row['anh_bia'].'" /></center>
			        <div class="container">
		                    '.$row['noi_dung'].'
			        </div>
				</div>';
			}
		}
	include ('include/footer.html');
?>