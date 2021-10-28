<?php
    $id = $_GET['manv'];
    require("../connect.php");

    $sql= mysqli_query($dbc,"delete from nhan_vien where manv='$id'") or die ("Loi khong xoa dc");
    if($sql){
        header("location: nhanvienpage.php");
    }

?>