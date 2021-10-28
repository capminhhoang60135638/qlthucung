<?php
    $makh=$_POST['makh'];
    $tenkh=$_POST['tenkh'];
    $namsinh=$_POST['namsinh'];
    $diachi=$_POST['diachi'];
    $sdt=$_POST['sdt'];
    echo $makh;
    require("../connect.php");
    $sql= mysqli_query($dbc,"update khach_hang set ten_kh='$tenkh',nam_sinh='$namsinh',dia_chi='$diachi',sdt='$sdt' where ma_kh='$makh'") or die ("Loi khong update dc");
    if($sql){
        header("location: khachhangpage.php");
    }

?>