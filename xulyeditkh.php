<?php
    $makh=$_POST['ma_kh'];
    $tenkh=$_POST['ten_kh'];
    $namsinh=$_POST['nam_sinh'];
    $diachi=$_POST['dia_chi'];

    $sdt=$_POST['sdt'];
    $username=$_POST['username'];
    $password=$_POST['password'];
   
    require("connection/connect.php");
    $sql= mysqli_query($dbc,"update khach_hang set ten_kh='$tenkh',nam_sinh='$namsinh',dia_chi='$diachi',sdt='$sdt',username='$username',password='$password'  where ma_kh='$makh'") or die ("Loi khong update dc");
    if($sql){
        header("location: index-khachhang.php");
    }

?>