<html>
    <head>
        <title>REGISTER Fage</title>
        <link rel="stylesheet"  type="text/css" href="include/login.css">
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
    $username_err ='';
    // $a = "admin01";
    // $us = "select * from quan_tri where username = '$a'";
    // $result3=mysqli_query($dbc,$us);
    // if(mysqli_affected_rows($dbc)>0){
    //     echo "Có username đã tồn tại.";
    // }else{
    //     echo "...";
    // }

if($_SERVER['REQUEST_METHOD']=="POST"){
	$errors=array(); //khởi tạo 1 mảng chứa lỗi
   
    // $id=trim($_POST['id']);
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
  //   if(empty($id)){
		// $errors[]="Bạn chưa nhập id";
  //   }
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
            // kiem tra username
        $us = "select * from quan_tri where username = '$username'";
        $result3=mysqli_query($dbc,$us);
        if(mysqli_affected_rows($dbc)>0){
            $username_err = "Có username đã tồn tại.";
            $errors[]=$username_err;
        }
      if(empty(isset($_POST['radGT']))){
        $errors[]="Bạn chưa nhập giới tính";
      } else {
        $gioitinh=trim($_POST['radGT']); 
      }
    }else if($nhanvien=='khachhang'){
                    // kiem tra username
        $us = "select * from khach_hang where username = '$username'";
        $result3=mysqli_query($dbc,$us);
        if(mysqli_affected_rows($dbc)>0){
            $username_err = "Có username đã tồn tại.";
            $errors[]=$username_err;
        }
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
        $check2 = "SELECT * FROM quan_tri";
        $result2=mysqli_query($dbc,$check2);
        $ma2 = mysqli_num_rows($result2);
        if ($ma2>9) {
            $id2= "AD".$ma2+1;
        }else{
            $id2= "AD0".$ma2+1;
        }
        

        $query="INSERT INTO quan_tri VALUES ('$id2','$ten','$gioitinh','$sdt','$diachi','$ten_hinh','$username','$pass')";
            $result=mysqli_query($dbc,$query);
            if(mysqli_affected_rows($dbc)==1){
              $thongbao="<div class='alert alert-success' role='alert'>Đã đăng ký thành công !<script> setTimeout(function(){window.location='login.php';},2000);</script></div>";
            }else{
                $thongbao= "có lỗi không thể thêm";
            }
      }
      else if($nhanvien=='khachhang'){
        $check = "SELECT * FROM khach_hang";
        $result1=mysqli_query($dbc,$check);
        $ma = mysqli_num_rows($result1);
        if ($ma>9) {
            $id= "KH".$ma+1;
        }else{
            $id= "KH0".$ma+1;
        }

        $query="INSERT INTO khach_hang VALUES ('$id','$ten','$ngaysinh','$diachi','$sdt','$ten_hinh','$username','$pass')";
	    $result=mysqli_query($dbc,$query);
        if(mysqli_affected_rows($dbc)==1){
          $thongbao="<div class='alert alert-success' role='alert'>Đã đăng ký thành công !<script> setTimeout(function(){window.location='login.php';},2000);</script></div>";
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
                            <input type="radio" name="nhanvien" value="khachhang" style="width: auto;margin-left: 100px; display: none;" id="A"
                            <?php if(isset($_POST['nhanvien'])&&($_POST['nhanvien'])=="khachhang") echo 'checked'?> checked/>
                            <input type="radio" name="nhanvien" value="admin" style="width: auto;margin-left: 20px; display: none;" id="B"
                            <?php if(isset($_POST['nhanvien'])&&($_POST['nhanvien'])=="admin") echo 'checked'?> />
                    </div>
                    <div class="name-sdt" style="display: flex;">
                        <input type="text" name="ten" placeholder="Nhập họ và tên" value="<?php echo $ten; ?>" >
                        <input type="text" name="sdt" placeholder="Nhập SDT" style="margin-left: 20px;" value="<?php echo $sdt ?>" >
                    </div>
                    <div class="name-sdt" style="display: flex;">
                        <input type="text" name="username" placeholder="Nhập Username" value="<?php echo $username; ?>" >
                        <input type="text" name="password" placeholder="Nhập Password" style="margin-left: 20px;" value="<?php echo $pass; ?>" >
                    </div><h4 style="margin-bottom: 5px"><?php echo $username_err; ?></h4>
                    <input type="number" class="form-control" name="ngaysinh" min="1970" max="2017" placeholder="Nhập năm sinh" id='a' value="<?php echo $ngaysinh ?>" >
                    <div class="radio-button" style="display: flex;" id='b'>
                        <p style="width: 100px;">Giới tính:</p>
                        <input checked="checked" type="radio" name="radGT" value="1" style="width: auto;"
                        <?php if(isset($_POST['radGT'])&&($_POST['radGT'])=="nam") echo 'checked'?>/>Nam
                        <input type="radio" name="radGT" value="0" style="width: auto;margin-left: 20px;"
                        <?php if(isset($_POST['radGT'])&&($_POST['radGT'])=="nu") echo 'checked'?>/>Nữ
                    </div>
                    <input type="text" name="diachi" placeholder="Nhập địa chỉ" value="<?php echo $diachi ?>" >
                    <div class="images" style="display: flex;">
                        <p style="width: 100px;">Chọn ảnh:</p>
                        <input type="file" name="hinh" value="<?php if(isset($_POST['hinh'])) echo $_POST['hinh'];?>" require/>
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
       $(document).ready(function() {
        var checkedValue = $('input[type=radio][name="nhanvien"]:checked').val();
        if(checkedValue == "khachhang") {
            $("#a").show();
            $("#b").hide();
        }
        else if(checkedValue == "admin") {
            $("#a").hide();
            $("#b").show();
        }
        $('input[type=radio][name=nhanvien]').change(function() {
            if (this.value == 'khachhang') {
                $("#b").hide();
                $("#a").show();
            } else if (this.value == 'admin') {
                $("#a").hide();
                $("#b").show();
            }
        });
    });
       </script>
       
</html>
