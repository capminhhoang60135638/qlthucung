<?php 
	include 'include/header-ad.php';
	include 'connection/connect.php';
    $strSQL = 'SELECT * FROM hang_sp';
    $result = mysqli_query($dbc,$strSQL);
    if(mysqli_num_rows($result) == 0){
        echo "Chưa có dữ liệu";
    }
    else
    {   
        echo " <fieldset>
     <legend>HÃNG SẢN PHẨM</legend>
        <table class='table table-striped' width='100%'>
            <thead>
                <td><b>STT</b></td>
                <td><b>Mã hãng</b></td>
                <td><b>Tên hãng</b></td>
                <td><b>Số điện thoại</b></td>
                <td><b>Địa chỉ</b></td>
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
                echo "<td>$row[3]</td>";
                echo "<td></td>";
                echo "</tr>";
            }
            else{
                echo "<tr>";
                echo "<td>$stt</td>";
                echo "<td>$row[0]</td>";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "<td>$row[3]</td>";
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