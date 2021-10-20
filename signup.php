<?php
    session_start();
    $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    $email =($_POST['email']);
    $password =($_POST['pass']);
    $repass = ($_POST['repass']);
    $name =($_POST['hoten']);
    $address = ($_POST['diachi']);
    $sdt = ($_POST['sdt']);
    if (!$email || !$password || !$repass || !$name || !$address || !$sdt)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    if (mysqli_num_rows(mysqli_query($conn, "SELECT Email FROM khachhang WHERE Email='$email'")) > 0){
        echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    $str=$_POST["email"];
	$res = substr($str, strlen($str) - 10, 10);
	if($res!='@gmail.com'){
        echo "Gmail sai định dạng! <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
    if (mysqli_num_rows(mysqli_query($conn, "SELECT Email FROM khachhang WHERE Email='$email'")) > 0)
    {
        echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    if (strlen($password)<8 || strlen($password)>16){
        echo "Vui lòng nhập mật khẩu dài từ 8 đến 16 kí tự. <a href='javascript: history.go(-1)'>Trở lại</a>";
    }

    if ($password !== $repass){
        echo "Mật khẩu không khớp.<a href='javascript: history.go(-1)'>Trở lại</a>";
    }
    $sql = "SELECT COUNT(*) FROM `khachhang`";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row['COUNT(*)']<=9){
        $mskh = "KH00".($row['COUNT(*)']+1);
    }else{
        $mskh = "KH0".($row['COUNT(*)']+1);
    }
    $addmenber = mysqli_query($conn, "
        INSERT INTO khachhang(
            MSKH,
            HoTenKH,
            DiaChi,
            SoDienThoai,
            Email,
            Matkhau
            )
        VALUES(
            '{$mskh}',
            '{$name}',
            '{$address}',
            '{$sdt}',
            '{$email}',
            '{$password}'
            )
    ");
    if($addmenber){
        echo "Đăng ký thành công. <a href='signin.html'>Đăng nhập</a>";
        mysqli_free_result($result);
        exit;
    }else{
        echo "Có lỗi xảy ra. Vui lòng đăng ký lại! <a href='signup.html'>Đăng nhập</a>";
    }
    
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Nhân Shop</title>
		<link rel="stylesheet" href="css\main.css">
		<link rel="stylesheet" href="css\base.css">
		<link rel="stylesheet" href="fontawesome-free-5.15.1-web\css\all.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="modal" class="modal" >
            <div class="modal__overlay"></div>
            <div class="modal__body">
                <!--Form sign up -->
                <div id="formsignup" class="formlog__container">
                    <div class="formlog"><form action="signup.php" method="POST">
                            <div class="formlog__header">
                                <h3 class="formlog-heading">Đăng ký</h3>
                            </div>
                            <div class="formlog__form">
                            <input type="text" name="email"	class="formlog__input" placeholder="Email của bạn">
                                <input type="password" name="pass"	class="formlog__input" placeholder="Mật khẩu của bạn">
                                <input type="password" name="repass"	class="formlog__input" placeholder="Nhập lại mật khẩu. 8-16 ký tự">
                                <input type="text" name="hoten" class="formlog__input" placeholder="Họ và tên của bạn">
                                <input type="text" name="diachi" class="formlog__input" placeholder="Địa chỉ của bạn">
                                <input type="text" name="sdt"	class="formlog__input" placeholder="Số điện thoại của bạn">
                            </div>
                            <div class="formlog__rule">
                                <p class="formlog__rule-text">
                                    Bằng việc đăng ký, bạn đồng ý với Nhân Shop về <a href="">Điều khoản dịch vụ</a> và <a href="">chính sách bảo mật</a>
                                </p>
                            </div>
                            <div class="formlog__controls">
                                <button onclick="window.history.back();" class="btn">TRỞ LẠI</button>
                                <button class="btn btn--primary" type="submit">ĐĂNG KÝ</button>
                            </div></form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>