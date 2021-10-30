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
    $strSQL = 'SELECT * FROM san_pham LIMIT '.$offset.','.$rowPerPage;
    $stt=1;
    $result = mysqli_query($dbc,$strSQL);
    while ($row = mysqli_fetch_array($result))
    {
    	$dl .= '<div class="col-lg-4 col-md-12 p-1 w-100 rounded">
                    <div class="box m-1">
                    <a href="sanpham-xem.php?ma_sp='.$row['0'].'"><img style="height:300px;" class="img-fluid w-100" src="images/'.$row['5'].'" alt="Card image" /></a>
                    <div class="card-body">
                        <h4 class="card-title">'.$row['1'].'</h4>
                        <b style="color: red;">'.$row['6'].' vnđ</b>
                        <input type="submit" class="btn btn-danger" name="" value="Thêm vào giỏ hàng">
                    </div>
                    </div></div>';
    }
?>
<div class="container ">
    <div class="title"><h2>SẢN PHẨM</h2></div>
    <div class="row">
		<?php echo $dl;?>
	</div>
	<?php 
                echo '<center>';
        $re = mysqli_query($dbc, 'select * from thu_cung');
        // tổng số mẫu tin 
        $numRow = mysqli_num_rows($re);
        // tooneg so trang
        $maxPage = floor($numRow/$rowPerPage)+1;
        // echo 'Tổng số trang: '.$maxPage;
        //tạo link tương ứng tới các trang


        for ($i=1 ; $i<=$maxPage ; $i++)
        {   if ($i == $_GET['page'])
            { echo '<b class="btn" style="color:black">'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
            }
            else
            echo "<a class='btn' href=".$_SERVER['PHP_SELF']. "?page=".$i.">".$i."</a> ";
        }

        echo '</center>';
    ?>
</div>
<?php 
    mysqli_close($dbc);
	include 'include/footer.php';
 ?>

