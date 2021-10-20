<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Nhân Shop</title>
		<script src="javascript/jquery.js"></script>
		<script src="javascript/main.js"></script>
		<link rel="stylesheet" href="css\main.css">
		<link rel="stylesheet" href="css\base.css">
		<link rel="stylesheet" href="fontawesome-free-5.15.1-web\css\all.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="app">
			<header class="header">
				<div class="gird">
					<nav class="header__navbar">
						<ul class="header__navbar-list">
							<li class="header__navbar-item"><a href="https://goo.gl/maps/FjZdB9QQtKZmV4dk9" target="blank">Nguyễn Văn Linh, phường An Khánh, NK, CT</a></li>
						</ul>
						<ul class="header__navbar-list">
							<li class="header__navbar-item header__navbar-item-noti">
								<a href=# class="header__navbar-item-link">
									<i class="fas fa-bell"></i>
									Thông báo</a>
									<div class="header__noti">
										<header class="header__noti-header">
											<h3>Thông báo mới nhận</h3>
										</header>
										<ul class="header__noti-list">
											<?php
													//Cập nhật hàng mới thêm vào csdl vào phần thông báo

												$sql = "SELECT * FROM `hanghoa`ORDER BY MSHH DESC LIMIT 3";
												$result = mysqli_query($conn,$sql);
												while($row = mysqli_fetch_assoc($result)){
													
													echo '<li class="header__noti-item">
														<a href="" class="header__noti-link">
														<img src="img\\product\\'.$row["Hinh"].'" alt="" class="header__noti-img">
														<div class="header__noti-info">
															<span class="header__noti-name">'. $row["TenHH"] .'</span>
															<p class="header__noti-description">'. $row["MoTaHH"] .'</p>
														</div>
														</a>
													</li>';
												}
												mysqli_free_result($result);
											?>
										</ul>
										<div class="header__noti-footer">
											<a href="" class="header__noti-footer-btn">Xem tất cả</a>
										</div>
									</div>
							</li>
							<li class="header__navbar-item">
								<a href="https://www.facebook.com/nhantrung.ho/" target="_blank" class="header__navbar-item-link">
									<i class="far fa-question-circle"></i>
									Trợ giúp</a>
							</li>
							<?php
								if(isset($_SESSION['HoTenKH']) && $_SESSION['HoTenKH']){
									
									echo '<li class="header__navbar-item header__user-info">
										<img src="img\\avatar\\'.$_SESSION["Image"].'" alt="" class="header__user-img">
										<span class="header__user-name">'.$_SESSION["HoTenKH"].'</span>
										<ul class="header__user-list">
											<li class="header__user-item">
												<a href="profile.php">Tài khoản của tôi</a>
											</li>
											<li class="header__user-item">
												<a href="productinfo.php">Đơn mua</a>
											</li>
											<li class="header__user-item header__user-separate">
												<a href="logout.php">Đăng xuất</a>
											</li>
										</ul>
									</li>';
									
								}else{
									echo '<li class="header__navbar-item header__navbar-item--separate"><a href="signin.html" target="_self"><b>Đăng nhập</b></a></li>';
									echo '<li class="header__navbar-item"><a href="signup.html" target="_self"><b>Đăng ký</b></a></li>';
									
								}
							?>
							
						</ul>
						
					</nav>
					<!--Header search-->
					<div class="header-with-search">
						<a href="index.php" class="header__logo-link">
							<div class="header__logo">
								<img class="header__logo-img" src="img\MyLoGo.png" alt="">
							</div>
						</a>				
						<div class="header__search">
							<!--Search History-->
							<div class="header__search-input-wrap">
								<input type="text" class="header__search-input" placeholder="Nhập để tìm kiếm">
								<div class="header__search-history">
									<h3 class="header__search-heading">Lịch sử tìm kiếm</h3>
									<ul class="header__search-list">
										<li class="header__search-item">
											<a href="">Nike Air Jordan 1</a>
										</li>
										<li class="header__search-item">
											<a href="">Nike Air Jordan 2</a>
										</li>
									</ul>
								</div>
							</div>
							<button onclick="noUpdate();" class="header__search-icon">
								<i class="header__search-btn fas fa-search"></i>
							</button>
						</div>
						<!--Cart Layout-->
						<!--Cart item-->
						<?php
						
						//Sau khi đăng nhập mới có thể xem được giỏ hàng. Khi chưa đăng nhập xem như giỏ hàng trống
						echo '<div class="header__cart">
							<div class="header__cart--wrap">
								<i class="header__cart-icon fas fa-shopping-cart"></i>';
								

											if(isset($_SESSION['HoTenKH']) && $_SESSION['HoTenKH']){
												$mskh = $_SESSION['MSKH'];
												//$conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
												$result = mysqli_query($conn,"SELECT * FROM `giohang` WHERE MSKH='$mskh'");
												
												
												$sl = 0;
												while($r = mysqli_fetch_assoc($result)){
													$sl += $r['SoLuong'];
												}										
												
												echo '<span class="header__cart-notice">'.$sl.'</span>
												<div class="header__cart-list ">';
												
												if($sl>0){
													$query = mysqli_query($conn,"SELECT * FROM `giohang` WHERE MSKH='$mskh'");
													while($row = mysqli_fetch_assoc($query)){
														
														$mshh = $row['MSHH'];
														$tenhh = $row['TenHH'];
														$sl = $row['SoLuong'];
														$size = $row['Size'];
														$result1 = mysqli_query($conn,"SELECT * FROM `hanghoa` WHERE MSHH='$mshh'");
														$row1 = mysqli_fetch_assoc($result1);
															
														
														echo '<h3 class="header__cart-heading">Sản phẩm đã thêm</h3>
															<ul class="header__cart-list-item">';
														
														
														echo '<li class="header__cart-item">
																<img src="img\\product\\'.$mshh.'.jpg" alt="" class="header__cart-img">
																	<div class="header__cart-info">
																		<div class="header__cart-item-head">
																			<h5 class="header__cart-item-name">'. $tenhh .'</h5>
																			<div class="header__cart-item-wrap">
																				<span class="header__cart-item-price">'. $row1["Gia"] .'VND</span>
																				<span class="header__cart-item-multiply">x</span>
																				<span class="header__cart-item-amount">'. $sl .'</span>	
																			</div>
																		</div>
																		<div class="header__cart-item-body">
																			<span class="header__cart-item-description">'. $row1["MoTaHH"] .'.Size :'. $size .'</span>
																			<span id="'.$mshh.'" class="header__cart-item-remove">Xóa</span>
																		</div>
																	</div>
																</li>';
																mysqli_free_result($result1);
															}
													echo '</ul> 
													<a href="order.php" class="header__cart-buy">Đặt hàng</a>';
												mysqli_free_result($query);
												
												}else{
													echo '
													
													<img src="img\empty_cart.png" alt="Empty" class="header__cart-nocart-img">';
												}
												mysqli_free_result($result);
											}else{
												echo '<span class="header__cart-notice">0</span>
												<div class="header__cart-list ">
												<img src="img\empty_cart.png" alt="Empty" class="header__cart-nocart-img">';
											}
										?>
								</div>
							</div>
							
						</div>

					</div>

				</div>
			</header>
			<div class="app__container">