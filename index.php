
<?php
	$conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
	
    include("top.php");
?>
<?php
	
		
	
?>

				<div class="grid__row app__content">
					<div class="grid__col-2">
						<nav class="category">
							<h3 class="category__heading">
								<i class="category__heading-icon fas fa-list"></i>
								DANH MỤC
							</h3>
							
							<ul class="category-list">
								<?php

									$sql = "SELECT TenNhom FROM `nhomhanghoa`";
									$result = mysqli_query($conn,$sql);
									if(mysqli_num_rows($result) > 0){
										
										while($row = mysqli_fetch_assoc($result)){
											$id = $row['TenNhom'];
											
											echo '<li >
												 <a id = "'.$id.'" class="category-link" >'. $row["TenNhom"] .'</a>
											</li>';
										}
										mysqli_free_result($result);
									}
									?>
								<!-- <li id = "active1">
									<span onclick="active('active1','active2','active3');" class="category-link">Men</span>
								</li>
								<li id = "active2">
									<span onclick="active('active2','active1','active3');" class="category-link">Women</span>
								</li>
								<li id = "active3">
									<span onclick="active('active3','active1','active2');" class="category-link">Kid</span>
								</li> -->
							</ul>
						</nav>
					</div>
					<div class="grid__col-10">
						<div class="home-filter">
							<span class="home-filter-label">Sắp xếp theo</span>
							<button class="home-filter-btn btn">Phổ biến</button>
							<button class="home-filter-btn btn btn--primary">Mới nhất</button>
							<button class="home-filter-btn btn">Bán chạy</button>
							<div class="select-input">
								<span class="select-input-label">Giá</span>
								<i class="fas fa-angle-down"></i>
								<ul class="select-input-list">
									<li class="select-input-item">
										<a href="" class="select-input-link">Giá thấp đến cao</a>
									</li>
									<li class="select-input-item">
										<a href="" class="select-input-link">Giá cao đến thấp</a>
									</li>
								</ul>
							</div>
							<div class="home-filter-page">
								<span class="home-filter-page-num">
									<span class="home-filter-page-current">1</span>/10
								</span>
								<div class="home-filter-page-control">
									<a href="" class="home-filter-page-btn disable">
										<i class="home-filter-page-icon fas fa-angle-left"></i>
									</a>
									<a href="" class="home-filter-page-btn">
										<i class="home-filter-page-icon fas fa-angle-right"></i>
									</a>
								</div>
							</div>
						</div>

						<div class="home-product">
							<div class=" app__container">
								<div id="product_listItem" class="grid__row">
									
									
									<?php
									$sql = "SELECT * FROM `hanghoa`";
									$result = mysqli_query($conn,$sql);
									if(mysqli_num_rows($result) > 0){
										for($i=1;$i<=10;$i++){
											$row = mysqli_fetch_assoc($result);
											echo '<div class="grid__col-2-10"><a href="#" id="'. $row['MSHH'] .'" class="home-product-item1">
												<div class="home-product-item">
													<img class="home-product-item-img" src="img\\product\\'.$row["Hinh"].'" alt="">
													<div class="home-product-info">
														<span class="home-product-item-name">'.$row["TenHH"] .'</span>
														<span class="home-product-item-price">'. $row["Gia"].'VND</span>
													</div>
												</div></a>
											</div>';
										}
										mysqli_free_result($result);
									}
									
									?>
									
								</div>
							</div>
						</div>

						<ul class="page home-product-page">
							<li class="page-item">
								<a href="" class="page-item-link">
									<i class="page-item-icon fas fa-angle-left"></i>
								</a>
							</li>
							<li class="page-item page-item-active">
								<a href="" class="page-item-link">1</a>
							</li>
							<li class="page-item">
								<a href="" class="page-item-link">2</a>
							</li>
							<li class="page-item">
								<a href="" class="page-item-link">3</a>
							</li>
							<li class="page-item">
								<a href="" class="page-item-link">4</a>
							</li>
							<li class="page-item">
								<a href="" class="page-item-link">...</a>
							</li>
							<li class="page-item">
								<a href="" class="page-item-link">10</a>
							</li>
							<li class="page-item">
								<a href="" class="page-item-link">
									<i class="page-item-icon fas fa-angle-right"></i>
								</a>
							</li>

						</ul>
					</div>
				</div>
            </div>



<?php
	include("bottom.php");
	mysqli_close($conn);
?>