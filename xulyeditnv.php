<?php
    $maqt=$_POST['maqt'];
    $ho_ten=$_POST['ho_ten'];
    //$gioi_tinh=$_POST['gioi_tinh'];
    if($_POST['gioi_tinh']=="Nam")
        $gioi_tinh=1;
    else $gioi_tinh=0;
    $sdt=$_POST['sdt'];
    $dia_chi=$_POST['dia_chi'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    
    require("connection/connect.php");
    $sql= mysqli_query($dbc,"update quan_tri set ma_qt='$maqt',ho_ten='$ho_ten', gioi_tinh='$gioi_tinh',sdt='$sdt',dia_chi='$dia_chi' where ma_qt='$maqt'") or die ("Loi khong update dc");
    if($sql){
        header("location: index-nhanvien.php");
    }

?>