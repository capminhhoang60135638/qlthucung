<?php 
	include 'include/header-ad.php';
	include 'connection/connect.php';
	$dl = "";
	$gt = "";
	$rowPerPage=6;
    if(!isset($_GET['page'])){
        $_GET['page']=1;
    }
    $offset=($_GET['page']-1)*$rowPerPage;
	$strSQL = 'SELECT * FROM san_pham join loai_sp join hang_sp on san_pham.ma_loai = loai_sp.ma_loai and san_pham.ma_hang = hang_sp.ma_hang LIMIT '.$offset.','.$rowPerPage;
	if(($_SERVER['REQUEST_METHOD'] == 'POST')){
		if(isset($_POST['gt'])){
			$gt = $_POST['gt'];
		}else{
			$gt = "";
		}
		$strSQL = 'SELECT * 
		FROM san_pham join loai_sp join hang_sp 
		ON san_pham.ma_loai = loai_sp.ma_loai and san_pham.ma_hang = hang_sp.ma_hang 
		WHERE san_pham.ten_sp like "%'.$gt.'%" OR hang_sp.ten_hang like "%'.$gt.'%" OR loai_sp.ten_loai like "%'.$gt.'%"
		LIMIT '.$offset.','.$rowPerPage;
	}
	$stt=1;
	$result = mysqli_query($dbc,$strSQL);
    while ($row = mysqli_fetch_array($result)){
                $dl .=  "<tr>";
                $dl .=  "<td>$stt</td>";
                $dl .=  "<td>$row[0]</td>";
                $dl .=  "<td>$row[1]</td>";
                $dl .=  "<td>$row[9]</td>";
                $dl .=  "<td>$row[11]</td>";
                $dl .=  "<td>$row[3]</td>";
                $dl .=  "<td>$row[6]</td>";
                $dl .=  "<td><a class='edit-btn' href='details-sanpham.php?ma_sp=".$row[0]."'><abbr title='xem sản phẩm'><img src='images/details.png' width='20px' height='20px' /></abbr></a>|<a class='edit-btn' href='edit-sanpham.php?ma_sp=".$row[0]."'><abbr title='sửa sản phẩm'><img src='images/edit.png' width='20px' height='20px' /></abbr></a>|<a class='edit-btn' href='delete-sanpham.php?ma_sp=".$row[0]."'><abbr title='Xóa sản phẩm'><img src='images/delete.png' width='20px' height='20px' /></abbr></a></td>";
                $dl .=  "</tr>";
            $stt+=1;
    }
    $re = mysqli_query($dbc,$strSQL);
    $numRow = mysqli_num_rows($re);
    $maxPage = floor($numRow/$rowPerPage)+1;
?>

<form method="post">
<fieldset>
	<legend>SẢN PHẨM</legend>
	<div class="input-group mb-1" style="float: right; width: 200px;">
		<input type="text" class="form-inline" name="gt" placeholder="Tên, loại, thương hiệu..." width="500px" value="<?php echo $gt; ?>">
  		<div class="input-group-append">
  			<button type="submit" class="btn btn-success" name="timKiem"><i class="fas fa-search fa-sm"></i></button>
  		</div>
	</div>
	<a class='btn btn-success mb-1' href='create-sanpham.php'>Thêm mới <i class='far fa-edit'></i></a>
	<table class='table table-striped' width='100%'>
        <thead>
                <td><b>STT</b></td>
                <td><b>Mã SP</b></td>
                <td><b>Tên sản phẩm</b></td>
                <td><b>Loại sản phẩm</b></td>
                <td><b>Hãng</b></td>
                <td><b>Số lượng tồn</b></td>
                <td><b>Đơn giá(vnđ)</b></td>
                <td><b>Chức năng</b></td>
        </thead>
        <tr>
        	<?php echo $dl;?>
        </tr>
    </table>
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
        echo '</center> </fieldset>';
    ?>
</fieldset>
</form>
<?php 
    mysqli_close($dbc);
    include 'include/footer-ad.html';
 ?>

