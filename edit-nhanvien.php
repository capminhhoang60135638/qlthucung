<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->

<?php
    $manv = $_GET['ma_nv'];
    require("connection/connect.php");

    $sql= mysqli_query($dbc,"select * from quan_tri where ma_qt='$manv'") or die ("Loi khong tim thấy ");
    $kq = mysqli_fetch_array($sql);
   

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
        <?php
    include 'include/header-ad.php';
	
    ?>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <form method="POST" action="xulyeditnv.php" style="font-size: 20px; ">
        <h2 style="text-align: center; color: orangered;">CHỈNH SỬA THÔNG TIN NHÂN VIÊN</h2> 
            <table style="display: flex; justify-content: center; font-size: 20px;">
                <tr>
                    <td rowspan="7"><img width="200px"  src="<?php echo 'images/'.$kq['anh_dai_dien']?>"></img></td>
                    <td></td>
                    <td> <input type="hidden" name="maqt" value="<?php echo $kq['ma_qt'];?>" ></td>
                </tr>         
                <tr>
                    <td style='text-align: left;'>Họ và tên nhân viên:</td>
                    <td> <input type="text" name="ho_ten" value="<?php echo $kq['ho_ten'];?>" ></td>
                </tr> 
                <tr>
                    <td style='text-align: left;'>Giới tính:</td>
                    <td> <input type="text" name="gioi_tinh" value="<?php if($kq['gioi_tinh'])  echo 'Nam'; else echo 'Nữ';?>" ></td>
                </tr> 
                <tr>
                    <td style='text-align: left;'>Số điện thoại:</td>
                    <td> <input type="text" name="sdt" value="<?php echo $kq['sdt'];?>" ></td>
                </tr> 
                
                <tr>
                    <td style='text-align: left;'>Địa chỉ:</td>
                    <td><input type="text" name="dia_chi" value="<?php echo $kq['dia_chi'];?>" ></td>
                </tr> 
                <tr>
                    <td style='text-align: left;'>Username:</td>
                    <td><input type="text" name="username" value="<?php echo $kq['username'];?>" ></td>
                </tr> 
                <tr>
                    <td style='text-align: left;'>Password:</td>
                    <td><input type="password" name="password" value="<?php echo $kq['password'];?>" ></td>
                </tr> 
                <tr>
                    <td colspan="3"><input type="submit" name="submit" value="Sửa"></td>
                </tr>
            </table> 
            

        </form>
        <?php
    include 'include/footer-ad.html';
	
    ?>
        <script src="" async defer></script>
    </body>
</html>