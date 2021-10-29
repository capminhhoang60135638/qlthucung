<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->

<?php
    $manv = $_GET['manv'];
    require("../connect.php");

    $sql= mysqli_query($dbc,"select * from quan_tri where ma_qt='$manv'") or die ("Loi khong tim thấy ");
    $kq = mysqli_fetch_array($sql);
    print_r($kq);

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Chỉnh sửa thông tin nhân viên</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <form method="POST" action="xulyeditnv.php">
        <h2>CHỈNH SỬA THÔNG TIN NHÂN VIÊN</h2> 
            <table>
                <tr>
                    <td>Mã nhân viên:</td>
                    <td> <input type="hidden" name="maqt" value="<?php echo $kq['ma_qt'];?>" ></td>
                </tr>         
                <tr>
                    <td>Họ và tên nhân viên:</td>
                    <td> <input type="text" name="ho_ten" value="<?php echo $kq['ho_ten'];?>" ></td>
                </tr> 
                <tr>
                    <td>Giới tính:</td>
                    <td> <input type="text" name="gioi_tinh" value="<?php if($kq['gioi_tinh'])  echo 'Nam'; else echo 'Nữ';?>" ></td>
                </tr> 
                <tr>
                    <td>Số điện thoại:</td>
                    <td> <input type="text" name="sdt" value="<?php echo $kq['sdt'];?>" ></td>
                </tr> 
                
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input type="text" name="dia_chi" value="<?php echo $kq['dia_chi'];?>" ></td>
                </tr> 
                
            </table> 
            <input type="submit" name="submit" value="Sửa">

        </form>
        <script src="" async defer></script>
    </body>
</html>