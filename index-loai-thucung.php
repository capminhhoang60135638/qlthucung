<?php 
	include 'include/header-ad.php';
	include 'connection/connect.php';
    $strSQL = 'SELECT * FROM loai_thu_cung';
    $result = mysqli_query($dbc,$strSQL);
    if(mysqli_num_rows($result) == 0){
        echo "Chưa có dữ liệu";
    }
    else
    {   
        echo " <fieldset>
     <legend>CÁC LOẠI THÚ CƯNG</legend>
        <table class='table table-striped' width='100%'>
            <thead>
                <td><b>STT</b></td>
                <td><b>Mã loại</b></td>
                <td><b>Tên loại</b></td>
                <td><b>Ghi chú</b></td>
                <td><b>Chức năng</b></td>
            </thead>";
        $stt=1;
        while ($row = mysqli_fetch_array($result))
        {
            if($stt%2!=0){
                echo "<tr>";
                echo "<td>$stt</td>";
                echo "<td>$row[0]</td>";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "<td></td>";
                echo "</tr>";
            }
            else{
                echo "<tr>";
                echo "<td>$stt</td>";
                echo "<td>$row[0]</td>";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "<td></td>";
                echo "</tr>";
            }
            $stt+=1;
        }
        echo '</table> </fieldset>';
    }
    mysqli_close($dbc);
    include 'include/footer-ad.html';
 ?>