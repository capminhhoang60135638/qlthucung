<?php 
	include 'include/header-ad.php';
	include 'connection/connect.php';
    $rowPerPage=6;
    if(!isset($_GET['page'])){
        $_GET['page']=1;
    }
    $offset=($_GET['page']-1)*$rowPerPage;
    $strSQL = 'SELECT * FROM khach_hang LIMIT '.$offset.','.$rowPerPage;
    $result = mysqli_query($dbc,$strSQL);
    if(mysqli_num_rows($result) == 0){
        echo "Chưa có dữ liệu";
    }
    else
    {   
        echo " <fieldset>
     <legend>KHÁCH HÀNG</legend>
        <a class='btn disabled' href='#'>Thêm mới</a>
        <table class='table table-striped' width='100%'>
            <thead>
                <td><b>STT</b></td>
                <td><b>Mã khách hàng</b></td>
                <td><b>Ảnh đại diện</b></td>
                <td><b>Họ và tên</b></td>
                <td><b>Địa chỉ</b></td>
                <td><b>Số điện thoại</b></td>
                <td><b>Username</b></td>
                <td><b>Chức năng</b></td>
            </thead>";
        $stt=1;
        while ($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>$stt</td>";
            echo "<td>$row[0]</td>";
            echo "<td><img style='border-radius: 50%;' width='30px' height='30px' src='images/$row[5]'></td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            echo "<td>$row[6]</td>";
            echo "<td><a class='edit-btn' href='details-khachhang.php?ma_kh=".$row[0]."'><abbr title='xem thông tin'><img src='images/details.png' width='20px' height='20px' /></abbr></a>|<a class='edit-btn' href='edit-khachhang.php?ma_kh=".$row[0]."'><abbr title='sửa thông tin'><img src='images/edit.png' width='20px' height='20px' /></abbr></a>|<a class='edit-btn' href='delete-khachhang.php?ma_kh=".$row[0]."'><abbr title='Xóa khách hàng'><img src='images/delete.png' width='20px' height='20px' /></abbr></a></td>";
            echo "</tr>";
            $stt+=1;
        }
        echo '</table>';
        $re = mysqli_query($dbc, 'select * from khach_hang');
        // tổng số mẫu tin 
        $numRow = mysqli_num_rows($re);
        // tooneg so trang
        $maxPage = floor($numRow/$rowPerPage)+1;
        echo '<center>';
        for ($i=1 ; $i<=$maxPage ; $i++)
        {   if ($i == $_GET['page'])
            {
                echo '<a class="btn btn-sm disabled bg-primary"><b style="color:white">'.$i.'</b></a> ';
            }
            else
            echo "<a class='btn btn-sm btn-light' href=".$_SERVER['PHP_SELF']. "?page=".$i.">".$i."</a> ";
        }
        echo '</center> </fieldset>';
    }
    mysqli_close($dbc);
    include 'include/footer-ad.html';
 ?>