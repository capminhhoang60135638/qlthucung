<?php 
	include 'include/header-ad.php';
	include 'connection/connect.php';
    $rowPerPage=6; // số bang ghi
    if(!isset($_GET['page'])){
        $_GET['page']=1;
    }
    $offset=($_GET['page']-1)*$rowPerPage;
    $result = mysqli_query($dbc,'SELECT * FROM tin_tuc join quan_tri on tin_tuc.ma_nv = quan_tri.ma_qt LIMIT '.$offset.','.$rowPerPage);
    if(mysqli_num_rows($result) == 0){
        echo "Chưa có dữ liệu";
    }
    else
    {   
        echo " <fieldset>
     <legend>TIN TỨC</legend>
        <a class='btn btn-success mb-1' href='create-tintuc.php'>Thêm mới <i class='far fa-edit'></i></a>
        <table class='table table-striped' width='100%'>
            <thead>
                <td><b>STT</b></td>
                <td><b>Mã tin</b></td>
                <td><b>Tiêu đề</b></td>
                <td><b>Người đăng</b></td>
                <td><b>Lượt xem</b></td>
                <td><b>Chức năng</b></td>
            </thead>";
        $stt=1;
        while ($row = mysqli_fetch_array($result))
        {
                echo "<tr>";
                echo "<td>$stt</td>";
                echo "<td>$row[0]</td>";
                echo "<td>$row[1]</td>";
                echo "<td>$row[8]</td>";
                echo "<td>$row[5]</td>";
                echo "<td><a class='edit-btn' href='details-tintuc.php?ma_tin_tuc=".$row[0]."'><abbr title='truy cập bài đăng'><img src='image/details.png' width='20px' height='20px' /></abbr></a>|<a class='edit-btn' href='edit-tintuc.php?ma_tin_tuc=".$row[0]."'><abbr title='sửa bài đăng'><img src='image/edit.png' width='20px' height='20px' /></abbr></a>|<a class='edit-btn' onclick='delete();' href='delete-tintuc.php?ma_tin_tuc=".$row[0]."'><abbr title='xóa bài'><img src='image/delete.png' width='20px' height='20px' /></abbr></a></td>";
                echo "</tr>";

            $stt+=1;
        }
        echo '</table>';
        $re = mysqli_query($dbc, 'select * from tin_tuc');
        // tổng số mẫu tin 
        $numRow = mysqli_num_rows($re);
        // tooneg so trang
        $maxPage = floor($numRow/$rowPerPage)+1;
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
    }
    mysqli_close($dbc);
    include 'include/footer-ad.html';
 ?>
<a ></a>