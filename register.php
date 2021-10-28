
<html>
    <head>
        <title>REGISTER Fage</title>
        <link rel="stylesheet"  type="text/css" href="login.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 

    </head>
    <body>
<?php 
    require("connection/connect.php");
    $thongbao='';
    $nhanvien='';
    $id='';
    $ten='';
    $sdt='';
    $gioitinh='';
    $ngaysinh='';
    $diachi='';
    $username='';
    $pass='';
if($_SERVER['REQUEST_METHOD']=="POST"){
	$errors=array(); //khởi tạo 1 mảng chứa lỗi
   
    $id=trim($_POST['id']);
    $ten=trim($_POST['ten']);
    $sdt=trim($_POST['sdt']);
    $ngaysinh=trim($_POST['ngaysinh']);
    $diachi=trim($_POST['diachi']);
    $username=trim($_POST['username']);
    $pass=trim($_POST['password']);
    // kiem tra phan quyen
    if(empty(isset($_POST['nhanvien']))){
		$errors[]="Bạn chưa nhập mã nhân viên";
	  } else{
        $nhanvien=trim($_POST['nhanvien']);
    }
    if(empty($id)){
		$errors[]="Bạn chưa nhập id";
    }
    if(empty($ten)){
		    $errors[]="Bạn chưa nhập tên nhân viên";
	    }
	  if(empty($sdt)){
		    $errors[]="Bạn chưa nhập sdt";
	    }
	  if(empty($diachi)){
		  $errors[]="Bạn chưa nhập địa chỉ";
	  }
	  if(empty($username)){
		  $errors[]="Bạn chưa nhập username";
	  }
	  if(empty($pass)){
		  $errors[]="Bạn chưa nhập pass";
    }
    if($nhanvien=='admin'){
      if(empty(isset($_POST['radGT']))){
        $errors[]="Bạn chưa nhập giới tính";
      } else {
        $gioitinh=trim($_POST['radGT']); 
      }
    }else if($nhanvien=='khachhang'){
      if(empty($ngaysinh)){
		    $errors[]="Bạn chưa nhập ngày sinh";
	    }
    }
    
    // kiem tra images
	  if($_FILES['hinh']['name']!=""){
		$hinh=$_FILES['hinh'];
		$ten_hinh=$hinh	['name'];
		$type=$hinh['type'];
		$size=$hinh['size'];
		$tmp=$hinh['tmp_name'];
		if(($type=='image/jpeg' || ($type=='image/bmp') || ($type=='image/gif') && $size<8000))
		{
			move_uploaded_file($tmp,"images/".$ten_hinh);
		}
	  }
    if(empty($errors))//neu khong co loi xay ra
	{ 
      if($nhanvien=='admin'){
        $query="INSERT INTO quan_tri VALUES ('$id','$ten','$gioitinh','$sdt','$diachi','$ten_hinh','$username','$pass')";
	    $result=mysqli_query($dbc,$query);
        if(mysqli_affected_rows($dbc)==1){
          $thongbao='thêm thành công';
          header('location:login.php');
        }else{
          $thongbao= "có lỗi không thể thêm";
        }
      }
      else if($nhanvien=='khachhang'){
        $query="INSERT INTO khach_hang VALUES ('$id','$ten','$ngaysinh','$diachi','$sdt','$ten_hinh','$username','$pass')";
	    $result=mysqli_query($dbc,$query);
        if(mysqli_affected_rows($dbc)==1){
          $thongbao='thêm thành công';
          header('location:login.php');
        }else{
          $thongbao= "có lỗi không thể thêm";
        }
      }   
    }
    else{
        $thongbao ="Hãy điền đầy đủ thông tin";
    }
}
?>
        <div class="loginbox" style="height:650px;width: 500px;">
            <img src="images/icon2.png" class="avatar" style="left:200px">
                <h1 style="margin: 5px;">CREATE ACCOUNT </h1>
                <form method="post" enctype="multipart/form-data">
                    <div class="radio-button" style="display: flex;">
                            <input type="radio" name="nhanvien" value="khachhang" style="width: auto;margin-left: 100px;" id="A"
                            <?php if(isset($_POST['nhanvien'])&&($_POST['nhanvien'])=="khachhang") echo 'checked'?>/>Khách Hàng
                            <input type="radio" name="nhanvien" value="admin" style="width: auto;margin-left: 20px;" id="B"
                            <?php if(isset($_POST['nhanvien'])&&($_POST['nhanvien'])=="admin") echo 'checked'?>/>Quản trị
                    </div>
                    <input type="text" name="id" placeholder="Nhập ID">
                    <div class="name-sdt" style="display: flex;">
                        <input type="text" name="ten" placeholder="Nhập họ và tên">
                        <input type="text" name="sdt" placeholder="Nhập SDT" style="margin-left: 20px;">
                    </div>
                    <div class="name-sdt" style="display: flex;">
                        <input type="text" name="username" placeholder="Nhập Username">
                        <input type="password" name="password" placeholder="Nhập Password" style="margin-left: 20px;">
                    </div>
                    <input type="text" name="ngaysinh" placeholder="Nhập ngày sinh" id='a'>
                    <div class="radio-button" style="display: flex;" id='b'>
                        <p style="width: 100px;">Giới tính:</p>
                        <input checked="checked" type="radio" name="radGT" value="1" style="width: auto;"
                        <?php if(isset($_POST['radGT'])&&($_POST['radGT'])=="nam") echo 'checked'?>/>Nam
                        <input type="radio" name="radGT" value="0" style="width: auto;margin-left: 20px;"
                        <?php if(isset($_POST['radGT'])&&($_POST['radGT'])=="nu") echo 'checked'?>/>Nữ
                    </div>
                    <input type="text" name="diachi" placeholder="Nhập địa chỉ">
                    <div class="images" style="display: flex;">
                        <p style="width: 100px;">Chọn ảnh:</p>
                        <input type="file" name="hinh" value="<?php if(isset($_POST['hinh'])) echo $_POST['hinh'];?>"require/>
                    </div>
                    <input type="submit" name="login" value="Đăng ký">
                    <P>Bạn đã có tài khoản ?</P>
                    <a href="login.php"><h4 style="margin: 0;">ĐĂNG NHẬP NGAY</h4></a>
                    <h4><?php echo $thongbao?> </h4>
                </form>
        </div>


<?php
mysqli_close($dbc);
?>
    </body>

    <script>
        $(document).ready(function(){
         $("#A").click(function(){
           $("#a").show();
           $("#b").hide();
        
         });
       });
        
       $(document).ready(function(){
         $("#B").click(function(){
           $("#a").hide();
           $("#b").show();
        
         });
       });
       </script>
       
</html>
