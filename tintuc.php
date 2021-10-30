<?php 
	include 'include/header.php';
	include 'connection/connect.php';

	$dl = "";
    $gt = "";
    $rowPerPage=6;
    if(!isset($_GET['page'])){
        $_GET['page']=1;
    }
    $offset=($_GET['page']-1)*$rowPerPage;
    $strSQL = 'SELECT * FROM tin_tuc LIMIT '.$offset.','.$rowPerPage;
    $stt=1;
    $result = mysqli_query($dbc,$strSQL);
    while ($row = mysqli_fetch_array($result))
    {
    	$dl .= '<div  class="col-lg-4 col-md-12 p-1 w-100 rounded">
                    <div class="box m-1">
                    <a href="tintuc-xem.php?ma_tin_tuc='.$row['0'].'"><img style="height:250px;" class="img-fluid w-100" src="images/'.$row['2'].'" alt="Card image" /></a>
                    <div class="card-body">
                        <h4 class="card-title">'.$row['1'].'</h4>
                        <i>Đã có '.$row['5'].' lượt xem</i>
                    </div>
                    </div>
                </div>';
    }
    $re = mysqli_query($dbc,$strSQL);
    $numRow = mysqli_num_rows($re);
    $maxPage = floor($numRow/$rowPerPage)+1;
?>
<div class="container ">
    <div class="title"><h2>TIN TỨC</h2></div>
    <div class="row">
		<?php echo $dl;?>
	</div>
	<?php 
        echo '<center>';
        for ($i=1 ; $i<=$maxPage ; $i++)
        {   if ($i == $_GET['page'])
            {
                echo '<a class="btn btn-sm page-number disabled bg-primary"><b style="color:white">'.$i.'</b></a> ';
            }
            else
            echo "<a class='btn btn-sm btn-light' href=".$_SERVER['PHP_SELF']. "?page=".$i.">".$i."</a> ";
        }
        echo '</center>';
    ?>
</div>
<?php 
    mysqli_close($dbc);
	include 'include/footer.php';
 ?>

