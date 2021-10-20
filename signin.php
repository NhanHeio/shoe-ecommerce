
<?php
    session_start();
    $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    $email =($_POST['email']);
    $password =($_POST['pass']);
    if (!$email || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu";
        echo "<a href='signin.html' >Về đăng nhập</a>";
        exit;
    }
    $sql = "SELECT * FROM `khachhang` WHERE Email='$email'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) == 0) {
        $sql1 = "SELECT * FROM `nhanvien` WHERE Email='$email'";
        $result1 = mysqli_query($conn,$sql1);
        if (mysqli_num_rows($result1) == 0) {
            echo "Tên đăng nhập này không tồn tại";
            echo "<a href='signin.html' >Về đăng nhập</a>";
            exit;
        }
        $row1 = mysqli_fetch_assoc($result1);
        $adminname = $row1['HoTenNV'];
        $adminimage = $row1['Image'];
        $msnv = $row1['MSNV'];
        if($password !== $row1['Matkhau']){
            echo "Sai mật khẩu!!";
            echo "<a href='signin.html' >Về đăng nhập</a>";
            exit;
        }else{
            mysqli_free_result($result1);
            $_SESSION['HoTenNV'] = $adminname;
            $_SESSION['Image'] = $adminimage;
            $_SESSION['MSNV'] = $msnv;
            header("location:admin.php");
        }
        mysqli_free_result($result1);
        
    }
    
    $row = mysqli_fetch_assoc($result);
    $username = $row['HoTenKH'];
    $image = $row['Image'];
    $mskh = $row['MSKH'];
    if($password !== $row['Matkhau']){
        echo "Sai mật khẩu!!";
        echo "<a href='signin.html' >Về đăng nhập</a>";
        exit;
    }else{
        mysqli_free_result($result);
        $_SESSION['HoTenKH'] = $username;
        $_SESSION['Image'] = $image;
        $_SESSION['MSKH'] = $mskh;
        header("location:index.php");
    }
    mysqli_free_result($result);
    
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
                <!--Form sign in-->
                <div id="formsignin" class="formlog__container formlog__container--singup">
                    <div class="formlog"><form action="signin.php" method="POST">
                        <div class="formlog__header">
                            <h3 class="formlog-heading">Đăng nhập</h3>
                        </div>
                        <div class="formlog__form">
                            <input type="text" name="email"	class="formlog__input" placeholder="Email của bạn">
                            <input type="password" name="pass"	class="formlog__input" placeholder="Mật khẩu của bạn">
                        </div>
                        <div class="formlog__help">
                            <a href="" class="formlog__help-link formlog__help-forgot">Quên mật khẩu</a>
                            <a href="" class="formlog__help-link">Cần trợ giúp?</a>
                        </div>
                        <div class="formlog__controls">
                            <button onclick="header('location:index.php')" class="btn">TRỞ LẠI</button>
                            <button class="btn btn--primary" type="submit">ĐĂNG NHẬP</button>
                        </div></form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>