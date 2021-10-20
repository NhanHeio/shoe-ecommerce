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
		<div class = "app">
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
												$conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
												$sql = "SELECT * FROM `dathang`ORDER BY SoDonDH DESC LIMIT 3";
												$result = mysqli_query($conn,$sql);
												while($row = mysqli_fetch_assoc($result)){
													
													echo '<li class="header__noti-item">
														<a href="" class="header__noti-link">
														
														<div class="header__noti-info">
															<span class="header__noti-name">Mã số khách hàng: '. $row["MSKH"] .'</span>
															<p class="header__noti-description">Ngày đặt hàng: '. $row["NgayDH"] .'</p>
														</div>
														</a>
													</li>';
												}
											
											?>
											
											
										</ul>
										<footer class="header__noti-footer">
											<a href="" class="header__noti-footer-btn">Xem tất cả</a>
										</footer>
									</div>
							</li>
							<li class="header__navbar-item">
								<a href=# class="header__navbar-item-link">
									<i class="far fa-question-circle"></i>
									Trợ giúp</a>
							</li>
							<?php
								if(isset($_SESSION['HoTenNV']) && $_SESSION['HoTenNV']){
									
									echo '<li class="header__navbar-item header__user-info">
										<img src="img\\avatar\\'.$_SESSION["Image"].'" alt="" class="header__user-img">
										<span class="header__user-name">'.$_SESSION["HoTenNV"].'</span>
										<ul class="header__user-list">
											<li class="header__user-item">
												<a href="">Tài khoản của tôi</a>
											</li>
											<li class="header__user-item">
												<
												a href="">Đơn mua</a>
											</li>
											<li class="header__user-item header__user-separate">
												<a href="logout.php">Đăng xuất</a>
											</li>
										</ul>
									</li>';
									
								}else{
									exit;
								}
							?>
							
						</ul>
					</nav>
				</div>
		</header>
		<div class="app__container">
				<div class="grid__row app__content">
				<div class="grid__col-2">
						<nav class="category">
							<h3 class="category__heading">
								<i class="category__heading-icon fas fa-list"></i>
								DANH MỤC
							</h3>
							<ul class="category-list">
								<li class="category-item">
									<span id="all-order" class="admin-category-link">Tất cả đơn hàng</span>
								</li>
								<li class="category-item">
									<span id="unconfirmed-order" class="admin-category-link">Đơn hàng chưa duyệt</span>
								</li>
								<li class="category-item">
									<span id="confirmed-order" class="admin-category-link">Đơn hàng đã duyệt</span>
								</li>
								
							</ul>
						</nav>
					</div>
				
				<div class="grid__col-10">
						<div class="home-filter">							
							<button id="home-admin-edit" class="btn btn--primary" style="margin-right: 12px;" onclick="document.getElementById('edit-product').style.display='block'">Chỉnh sửa shop</button>
							<button id="home-admin-add" class="btn btn--primary" style="margin-right: 12px;" onclick="document.getElementById('add-product').style.display='block'">Thêm hàng mới</button>																					
						</div>
						<div id="edit-product" class="edit-product">
						<?php
									$sql = "SELECT * FROM `hanghoa`";
									$result = mysqli_query($conn,$sql);
									if(mysqli_num_rows($result) > 0){
										$i=1;
										echo '<table border="1" cellspacing="0" >';
										echo '<tr>
											<th class="product-text">STT</th>
											<th class="product-text">MSHH</th>
											<th class="product-text">Tên hàng hóa</th>
											<th class="product-text">Giá</th>
											<th class="product-text">Số lượng</th>
											<th class="product-text">Mã nhóm</th>
											<th class="product-text">Mô tả hàng hóa</th>
											
										</tr>';
										while($row = mysqli_fetch_assoc($result)){
											echo '
													<tr>
														<th class="product-text">'. $i .'</th>
														<th class="product-text">'. $row["MSHH"] .'</th>
														<th class="product-text">'. $row["TenHH"] .'</th>
														<th class="product-text">'. $row["Gia"] .'</th>
														<th class="product-text">'. $row["SoLuongHang"] .'</th>
														<th class="product-text">'. $row["MaNhom"] .'</th>
														<th class="product-text">'. $row["MoTaHH"] .'</th>
													</tr>';	
													$i++;
										}
										echo '</table>';
									}
									?>
								<button id="edit-product" class="btn btn--primary" style="margin-right: 12px;" onclick="document.getElementById('editor').style.display='block'">Chỉnh sửa</button>
								<button type="button" onclick="document.getElementById('edit-product').style.display='none'" class="btn" style="margin-top: 10px;">Cancel</button>
								<div class="editor" id="editor">
									<form action="xulyedit.php" method="POST" enctype="multipart/form-data">
										<span class="upload-label">Mã số hàng hóa: </span>
										<input type = "text" name="MSHH" class="form-add-product">
										<span class="upload-label">Tên sản phẩm: </span>
										<input type = "text" name="TenHH" class="form-add-product">
										<span class="upload-label">Giá: </span>
										<input type = "text" name="Gia" class="form-add-product">
										<span class="upload-label">Số lượng: </span>
										<input type = "text" name="SoLuongHang" class="form-add-product">
										<span class="upload-label">Mã nhóm: </span>
										<input type = "text" name="MaNhom" class="form-add-product" placeholder="Men:1 , Women:2 , Kids:3">
										<span class="upload-label">Mô tả sản phẩm: </span>
										<input type = "text" name="MoTaHH" class="form-add-product">
										<div class="edit-size">
											<input type="text" name="Size39" class="form-add-product" placeholder="Sl Size 39">
											<input type="text" name="Size40" class="form-add-product" placeholder="Sl Size 40">
											<input type="text" name="Size41" class="form-add-product" placeholder="Sl Size 41">
										</div>														
										<button class="btn btn--primary" type="submit">Save</button>
									</form>
								</div>
						</div>
						<div id="add-product" class="add-product">
							<form action="xulyupload.php" method="POST" enctype="multipart/form-data">
								<span class="upload-label">Tên sản phẩm: </span>
								<input type = "text" name="TenHH" class="form-add-product">
								<span class="upload-label">Giá: </span>
								<input type = "text" name="Gia" class="form-add-product">
								<span class="upload-label">Số lượng: </span>
								<input type = "text" name="SoLuongHang" class="form-add-product">
								<div class="edit-size">
									<input type="text" name="Size39" class="form-add-product" placeholder="Sl Size 39">
									<input type="text" name="Size40" class="form-add-product" placeholder="Sl Size 40">
									<input type="text" name="Size41" class="form-add-product" placeholder="Sl Size 41">
								</div>
								<span class="upload-label">Mã nhóm: </span>
								<input type = "text" name="MaNhom" class="form-add-product" placeholder="Men:1 , Women:2 , Kids:3">
								<span class="upload-label">Mô tả sản phẩm: </span>
								<input type = "text" name="MoTaHH" class="form-add-product">
								<span class="upload-label">Upload hình ảnh sản phẩm: </span>
								<input type = "file" name="image-upload" id="image-upload" class="form-add-product">
								<button class="btn btn--primary" type="submit">Submit</button>
								<button type="button" onclick="document.getElementById('add-product').style.display='none'" class="btn" style="margin-top: 10px;">Cancel</button>
							</form>
						</div>
						<div id="admin-list-item-cart">

						</div>
				</div>
			</div>
		</div>
	</div>
	

	<?php mysqli_close($conn); ?>
	</body>
</html>