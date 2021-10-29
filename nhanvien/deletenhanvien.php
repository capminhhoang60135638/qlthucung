<?php
    $id = $_GET['manv'];
    require("../connect.php");

    $sql= mysqli_query($dbc,"delete from quan_tri where ma_qt='$id'") or die ("Loi khong xoa dc");
    if($sql){
        header("location: nhanvienpage.php");
    }

?>