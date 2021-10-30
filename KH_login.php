<?php
    session_start();
?>
<html>
<head>
    <title>ĐĂNG NHẬP HỆ THỐNG</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <style type="text/css">
    	
    </style>
</head>
<body style="background-image: linear-gradient(to right ,DeepPink, Blue);">
<?php
    $mess = "";
    require_once ("connection/connect.php");
    // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
    if (isset($_POST["login"])) {
        // lấy thông tin người dùng
        $username = $_POST["username"];
        $password = $_POST["password"];
        //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
        //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = addslashes($password);
        if ($username != "" && $password !="") {
            $sql = "select * from khach_hang where username = '$username' and password = '$password' ";
            $query = mysqli_query($dbc,$sql);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows==0) {
                $mess .= "<div class='alert alert-danger' role='alert'>
                  username hoặc password chưa đúng!
                </div>";
            }else{
                $_SESSION['username'] = $username;
                header('Location: trangchu.php');
            }
        }
    }
?>
<form action="KH_login.php" method="post" style="display: flex;justify-content: center; padding-top: 50px;">
    <fieldset style="width: 30%;color: white;">
        <legend style="text-align: center;color: white;">ĐĂNG NHẬP</legend>
        <?php echo $mess; ?>
        <i>USERNAME</i>
        <input style="margin: 5px;" type="text" class="form-control" name="username" />
        <i>PASSWORD</i>
        <input style="margin: 5px;" type="password" class="form-control" name="password" />
        <center style="margin: 10px;"><input class="btn btn text-primary m-3" type="submit" name="login" value="Đăng nhập"></center>
        <i>username: dinhchi <br>passwork: abc</i>
    </fieldset>
</form>
</body>
</html>