<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->

<?php 
    class NhanVien{
        public $manv,$tennv,$gioitinh,$namsinh,$sdt,$diachi;
        function __contruct($ma,$ten,$gioitinh,$namsinh,$sd,$dia){
            $this->makh=$ma;
            $this->tenkh=$ten;
            $this->gioitinh=$gioitinh;
            $this->namsinh=$namsinh;
            $this->diachi=$dia;
            $this->sdt=$sd;
            
        }
        public function setMaNV($ma)
        {
            $this->manv=$ma;
        }
        public function getMaKH()
        {
            return $this->manv;
        }

        public function setTenNV($ten)
        {
            $this->tennv=$ten;
        }
        public function getTenNV()
        {
            return $this->tennv;
        }

        public function setNamSinh($ns)
        {
            $this->namsinh=$ns;
        }
        public function getNamSinh()
        {
            return $this->namsinh;
        }

        public function setDiaChi($dc)
        {
            $this->diachi=$dc;
        }
        public function getDiaChi()
        {
            return $this->diachi;
        }
        public function setSoDienThoai($sd)
        {
            $this->sdt=$sd;
        }
        public function getSoDienThoai()
        {
            return $this->sdt;
        }
        public function setGioiTinh($gt)
        {
            $this->gioitinh=$gt;
        }
        public function getGioiTinh()
        {
            return $this->gioitinh;
        }



    }
    require("connect.php");
 ?>   
  

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Thêm khách hàng</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <form method="post" action="" enctype="multipart/form-data">
            <h2>THÊM NHÂN VIÊN</h2> 
            <table>
                <tr>
                    <td>Mã nhân viên:</td>
                    <td> <input type="text" name="manv" placeholder="Nhập vào mã nhân viên" ></td>
                </tr>         
                <tr>
                    <td>Tên nhân viên:</td>
                    <td> <input type="text" name="tennv" placeholder="Nhập vào tên nhân viên" ></td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td><input type="radio" name="gt" value="1">Nam  <input type="radio" name="gt" value="0">Nữ</td>
                </tr> 
                <tr>
                    <td>Năm sinh:</td>
                    <td> <input type="text" name="namsinh" placeholder="Nhập vào năm sinh nhân viên" ></td>
                </tr> 
                <tr>
                    <td>Địa chỉ:</td>
                    <td> <input type="text" name="diachi" placeholder="Nhập vào địa chỉ nhân viên" ></td>
                </tr> 
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input type="text" name="sdt" placeholder="Nhập vào số điện thoại nhân viên" ></td>
                </tr> 
                
            </table> 
            <input type="submit" name="submit" value="Thêm">
             
<!--  php 
//       if(isset($_POST['submit']))
//       {
           
//           if(isset($_POST['makh'])&&isset($_POST['tenkh'])&&isset($_POST['namsinh'])&&isset($_POST['diachi'])&&isset($_POST['sdt']))
    //        {
    //            $connect= mysqli_connect('localhost','root','','quanlythucung') or die('Khong the ket noi toi database'.mysqli_connect_error());
    //            $kh=new KhachHang($_POST['makh'],$_POST['tenkh'],$_POST['namsinh'],$_POST['diachi'],$_POST['sdt']);
    //         $sql="INSERT INTO khach_hang(ma_kh,ten_kh,nam_sinh,dia_chi,sdt) values ('". $kh->getMaKH()."','".$kh->getTenKH()."','".$kh->getNamSinh()."','".$kh->getDiaChi().'","'.$kh->getSoDienThoai().")";
    //         $result = mysqli_query($connect,$sql);

    //         mysqli_free_result($result);    
    //         mysqli_close($connect);
    //        }
    //        else
    //            echo "<script type='text/javascript'>alert('Có thông tin chưa được nhập');</script>";
    //    } -->
    <?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
	$errors=array(); //khởi tạo 1 mảng chứa lỗi
	//kiem tra ma sua
	if(empty($_POST['manv'])){
		$errors[]="Bạn chưa nhập mã nhân viên";
	}
	else{
		$manv=trim($_POST['manv']);
	}
	//kiểm tra tên sản phẩm
	if(empty($_POST['tennv'])){
		$errors[]="Bạn chưa nhập tên nhân viên";
	}
	else{
		$tennv=trim($_POST['tennv']);
	}
	if(empty($_POST['gt'])){
		$errors[]="Bạn chưa chọn giới tính";
	}
	else{
		$gt=trim($_POST['gt']);
	}
    if(empty($_POST['namsinh'])){
		$errors[]="Bạn chưa nhập nam sinh";
	}
	else{
		$namsinh=trim($_POST['namsinh']);
	}

    if(empty($_POST['diachi'])){
		$errors[]="Bạn chưa nhập dia chi";
	}
	else{
		$diachi=trim($_POST['diachi']);
	}

    if(empty($_POST['sdt'])){
		$errors[]="Bạn chưa nhập so dien thoai";
	}
	else{
		$sdt=trim($_POST['sdt']);
	}

	// //cap nhat thanh phan dinh duong va loi ich
	// $tp_dinh_duong=$_POST['tp_dinh_duong'];
	// $loi_ich=$_POST['loi_ich'];
	// //kiểm tra hình sản phẩm và thực hiện upload file
	// if($_FILES['hinh']['name']!=""){
	// 	$hinh=$_FILES['hinh'];
	// 	$ten_hinh=$hinh	['name'];
	// 	$type=$hinh['type'];
	// 	$size=$hinh['size'];
	// 	$tmp=$hinh['tmp_name'];
	// 	if(($type=='image/jpeg' || ($type=='image/bmp') || ($type=='image/gif') && $size<8000))
	// 	{
	// 		move_uploaded_file($tmp,"Hinh_sua/".$ten_hinh);
	// 	}
	// }
	if(empty($errors))//neu khong co loi xay ra
	{ 
		$query="INSERT INTO nhan_vien VALUES ('$manv','$tennv','$gt','$namsinh','$diachi','$sdt')";
		$result=mysqli_query($dbc,$query);
		if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
			echo "<div align='center'>Thêm mới thành công!</div>";			
			// $query="Select sua.*, Ten_hang_sua from Sua,hang_sua WHERE sua.ma_hang_sua=hang_sua.ma_hang_sua
			// 		AND ma_sua ='". $ma_sua. "'";
			// $result=mysqli_query($dbc,$query);
			// if(mysqli_num_rows($result)==1)
			// {	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
				// echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
				// 		<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>'.$row['Ten_sua'].' - '.$row['Ten_hang_sua'].'</h3></td></tr>';
				// 	echo '<tr><td><img src="Hinh_sua/'.$row['Hinh'].'"/></td>';
				// 				echo '<td><i><b>Thành phần dinh dưỡng:</i></b><br />'.$row['TP_Dinh_Duong'].'<br />';
				// 				echo '<i><b>Lợi ích:</b></i>'.$row['Loi_ich'].'<br />';
				// 				echo '<i><b>Trọng lượng: </b></i>'.$row['Trong_luong'].' gr - <i><b>Đơn giá: </b></i>'.$row['Don_gia'].' VNĐ';
				// 						echo '</td></tr></table>';				
			//}
		}
		else //neu khong them duoc
		{
			echo "<p>Có lỗi, không thể thêm được</p>";
			echo "<p>".mysqli_error($dbc)."<br/><br />Query: ".$query."</p>";	
		}
	}
	else
	{//neu co loi
		echo "<h2>Lá»—i</h2><p>Có lỗi xảy ra:<br/>";
		foreach($errors as $msg)
		{
			echo "- $msg<br /><\n>";
		}
		echo "</p><p>Hãy thử lại.</p>";
	}
}
    //mysqli_close($dbc);
?>


        </form>
        <script src="" async defer></script>
    </body>
</html>