<?php
    $id = $_GET['ma_kh'];
    require("connection/connect.php");

    $sql= mysqli_query($dbc,"delete from khach_hang where ma_kh='$id'") or die ("Loi khong xoa dc");
    if($sql){
        header("location: index-khachhang.php");
    }

?>