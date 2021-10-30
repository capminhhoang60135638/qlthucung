<?php 
	include 'include/header.php';
	include 'connection/connect.php';
    $gt = $_REQUEST['gt'];

    $dstc=$dssp="";
    $rowPerPage=3;
    if(!isset($_GET['page'])){
        $_GET['page']=1;
    }
    $offset=($_GET['page']-1)*$rowPerPage;


    $queryTC = 'SELECT * 
        FROM thu_cung JOIN loai_thu_cung
        ON thu_cung.ma_loai_tc = loai_thu_cung.ma_loai_tc
        WHERE thu_cung.ten_tc like "%'.$gt.'%" OR loai_thu_cung.ten_loai_tc like "%'.$gt.'%"
        LIMIT '.$offset.','.$rowPerPage;
    $result = mysqli_query($dbc,$queryTC);
    if(mysqli_num_rows($result) == 0)
    {
        $dstc .= "<b style='color:red;; padding-left:30px'>Không tìm thấy mặt hàng bạn cần tìm.</b>";
    }else{
        while ($row = mysqli_fetch_array($result)){
        $dstc .= '<div class="col-lg-4 col-md-12 p-1 w-100 rounded">
            <div class="box m-1">
                <a href="thucung-xem.php?ma_tc='.$row['0'].'"><img style="height:250px;" class="img-fluid w-100" src="images/'.$row['5'].'" alt="Card image" /></a>
                <div class="card-body">
                    <h4 class="card-title">'.$row['1'].'</h4>
                    <b style="color: red;">'.$row['6'].' vnđ</b>
                        <input type="submit" class="btn btn-danger" name="" value="Thêm vào giỏ hàng">
                </div>
            </div>
        </div>';
        }
    }

    $querySP = 'SELECT * 
        FROM san_pham join loai_sp join hang_sp 
        ON san_pham.ma_loai = loai_sp.ma_loai and san_pham.ma_hang = hang_sp.ma_hang 
        WHERE san_pham.ten_sp like "%'.$gt.'%" OR hang_sp.ten_hang like "%'.$gt.'%" OR loai_sp.ten_loai like "%'.$gt.'%"
        LIMIT '.$offset.','.$rowPerPage;
    $result = mysqli_query($dbc,$querySP);
    if(mysqli_num_rows($result) == 0)
    {
        $dssp .= "<b style='color:red; padding-left:30px'>Không tìm thấy mặt hàng bạn cần tìm.</b>";
    }else{
        while ($row = mysqli_fetch_array($result)){
        $dssp .= '<div class="col-lg-4 col-md-12 p-1 w-100 rounded">
                    <div class="box m-1">
                    <a href="sanpham-xem.php?ma_sp='.$row['0'].'"><img style="height:300px;" class="img-fluid w-100" src="images/'.$row['5'].'" alt="Card image" /></a>
                    <div class="card-body">
                        <h4 class="card-title">'.$row['1'].'</h4>
                        <b style="color: red;">'.$row['6'].' vnđ</b>
                        <input type="submit" class="btn btn-danger" name="" value="Thêm vào giỏ hàng">
                    </div>
                    </div></div>';
        }
    }


?>

<div class="container">
    <fieldset>
        <legend>THÚ CƯNG</legend>
        <div class="row"><?php echo $dstc; ?></div>
        <a class="btn" style="float:right; color: tomato;" href="thucung.php"><b>Xem thêm >></b></a>
    </fieldset>

    <fieldset>
        <legend>SẢN PHẨM CHO THÚ CƯNG</legend>
        <div class="row"><?php echo $dssp; ?></div>
        <a class="btn" style="float:right; color: tomato;" href="sanpham.php"><b>Xem thêm >></b></a>
    </fieldset>
</div>
<?php 
    mysqli_close($dbc);
	include 'include/footer.php';
 ?>

