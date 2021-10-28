<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<?php
    $makh = $_GET['makh'];
    require("../connect.php");

    $sql= mysqli_query($dbc,"select * from khach_hang where ma_kh='$makh'") or die ("Loi khong tim thấy ");
    $kq = mysqli_fetch_array($sql);
    print_r($kq);

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Chỉnh sửa thông tin khách hàng</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <form method="POST" action="xulyeditkh.php">
        <h2>THÊM KHÁCH HÀNG</h2> 
            <table>
                <tr>
                    <td>Mã khách hàng:</td>
                    <td> <input type="hidden" name="makh" value="<?php echo $kq['ma_kh'];?>" ></td>
                </tr>         
                <tr>
                    <td>Tên khách hàng:</td>
                    <td> <input type="text" name="tenkh" placeholder="<?php echo $kq['ten_kh'];?>" ></td>
                </tr> 
                <tr>
                    <td>Năm sinh:</td>
                    <td> <input type="text" name="namsinh" placeholder="<?php echo $kq['nam_sinh'];?>" ></td>
                </tr> 
                <tr>
                    <td>Địa chỉ:</td>
                    <td> <input type="text" name="diachi" placeholder="<?php echo $kq['dia_chi'];?>" ></td>
                </tr> 
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input type="text" name="sdt" placeholder="<?php echo $kq['sdt'];?>" ></td>
                </tr> 
                
            </table> 
            <input type="submit" name="submit" value="Sửa">

        </form>
        <script src="" async defer></script>
    </body>
</html>