
<html class="no-js" lang="en">
	<?php
		include_once('DataProvider.php');
	?>
    <head>
		<!-- Basic page needs
        ============================================ -->   
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Tài khoản | Alldayflower</title>
        <meta name="description" content="">
		<!-- Mobile specific metas --> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Favicon============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		<!-- font awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- carousel CSS  -->
		<link rel="stylesheet" href="css/owl.carousel.css">
		<!-- carousel Theme CSS  -->
		<link rel="stylesheet" href="css/owl.my_theme.css">
		<!-- carousel transitions CSS  -->
		<link rel="stylesheet" href="css/owl.transitions.css">
		<!-- nivo slider slider css -->
        <link rel="stylesheet" href="css/nivo-slider.css">
		<!-- animate css -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- Price jquery-ui  -->
        <link rel="stylesheet" href="css/jquery-ui.css">
		<!-- fancy-box theme -->
        <link rel="stylesheet" href="fancy-box/jquery.fancybox.css">
		<!-- normalizer  -->
        <link rel="stylesheet" href="css/normalize.css">
		<!-- bootstrap  -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Mobile menu css -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- main  -->
        <link rel="stylesheet" href="css/main.css">
		<!-- style  -->
        <link rel="stylesheet" href="style.css">
		<!-- Responsive css -->
        <link rel="stylesheet" href="css/responsive.css">
		<!-- modernizr JS ============================================ -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<!--Start Header Top area -->
		<div class="header_area_top"> 
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<!--Start Search area -->
						<form action="#" name="myForm">
							<div class="search_box">
								<input  id="itp" class="input_text" type="text" placeholder="Tìm kiếm"/>
								<button type="submit" class="btn-search">
									<span><i class="fa fa-search"></i></span>
								</button>
							</div>
						</form> 
						<!--End Search area -->
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<!--Start Logo area -->
						<div class="logo"> 
							<a href="index.html">
								<img src="img/logo/logo3.png" alt="" />
							</a>
						</div> 
						<!--End Logo area -->
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<!--Start Header Right Cart area -->
						<div class="account_card_area"> 
							<ul id="account_nav">
								<li><a href="#"><i class="fa fa-key"></i>Tài khoản</a>
									<div class="account_menu_list">
										<div class="account_single_item">
											<ul id="account_single_nav_3">
												<li><a href="my-account.html">Tài khoản tôi</a></li>
												<li><a href="">Danh sách yêu thích</a></li>
												<li><a href="cart.html">Giỏ hàng</a></li>
												<li><a href="checkout.html">Thanh toán</a></li>
												<li>
													<div class="signn_up">
														<form action="Login.html">
															<button id="btn_Sign_up"type="submit" class="signn">
																<span>Đăng nhập</span>
															</button>
														</form>
														<form action="CreateAcc.html">
															<button id="btn_Sign_up"type="submit" class="signn">
																<span>Đăng ký</span>
															</button>
														</form>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i>Giỏ hàng <span class="cart_zero">2</span></a>
									<div class="cart_down_area">
										<div class="cart_single">
											<a href="#"><img src="img/cart/cart-1.jpg" alt="" /></a>
											<h2><a href="#">Pellentesque hendrerit</a> <a href="#"><span><i class="fa fa-trash"></i></span></a></h2>
											<p>1 x $11.00</p>
										</div>
										<div class="cart_single">
											<a href="#"><img src="img/cart/cart-2.jpg" alt="" /></a>
											<h2><a href="#">Pellentesque hendrerit</a> <a href="#"><span><i class="fa fa-trash"></i></span></a></h2>
											<p>1 x $22.00</p>
										</div>
										<div class="cart_shoptings">
											<a href="checkout.html">Thanh toán</a>
										</div>
									</div>
								</li>
							</ul>
						</div> 
						<!--End Header Right Cart area -->
					</div>
				</div>
			</div>
		</div> 
		<!--End Header Top area -->
		<!--Start Main Menu area -->
		<div class="header_botttom_area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!--Start desktop menu area -->
						<div class="main_menu">
							<ul id="nav_menu" class="active_cl">
								<li>
									<a href="index.html"><span class="Home">Trang chủ</span></a>
								</li>
								<li><a href="shop.html"><span class="Clothings">Mua sắm</span></a>
									<div class="mega_menu_list">
										<div class="single_megamenu">
											<h2><a href="shop.html">Theo Chủ đề</a></h2>
											<div class="items_list">
												<a href="shop.html"><i class="fa fa-angle-right"></i>Hoa Sinh nhật</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Hoa Tình yêu</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Hoa Chúc mừng</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Hoa Chia buồn</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Ngày của mẹ</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Ngày nhà giáo VN</a>
											</div>
										</div>
										<div class="single_megamenu">
											<h2><a href="shop.html">Theo Thiết kế</a></h2>
											<div class="items_list">
												<a href="shop.html"><i class="fa fa-angle-right"></i>Bó Hoa</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Bình Hoa</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Hộp Hoa</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Lẵng Hoa</a>
											</div>
										</div>
										<div class="single_megamenu">
											<h2><a href="shop.html">Hoa tươi</a></h2>
											<div class="items_list">
												<a href="shop.html"><i class="fa fa-angle-right"></i>Hoa Hồng</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Hoa Ly</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Hoa Lan</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Hoa Sen</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Hoa Tulip</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Hoa Hướng Dương</a>
											</div>
										</div>
										<div class="single_megamenu">
											<h2><a href="shop.html">Quà tặng kèm</a></h2>
											<div class="items_list">
												<a href="shop.html"><i class="fa fa-angle-right"></i>Gấu bông</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Chocolate</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Giỏ trái cây</a>
												<a href="shop.html"><i class="fa fa-angle-right"></i>Giỏ quà tặng</a>
											</div>
										</div>
									</div>
								</li>
								<li><a href="shop.html"><span class="Lookbook">Ý Nghĩa Hoa</span></a>
								</li>
								<li>
									<a href="single-blog.html"><span class="Footwear">Blog</span></a>
								</li>
								<li>
									<a href="about-us.html"><span class="Footwear">Đội Ngũ</span></a>
								</li>
								<li>
									<a href="contact.html"><span class="Footwear">Liên Hệ</span></a>
								</li>
							</ul>
						</div>
						<!--End desktop menu area -->
					</div>
				</div>
			</div>
			<!--start Mobile Menu area -->
			<div class="mobile-menu-area">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="mobile-menu">
								<nav id="dropdown">
									<ul>
										<li><a href="index.html">Trang chủ</a>
										</li>
										<li><a href="shop.html">Mua sắm</a>
											<ul>										
												<li><a href="shop.html">Theo Chủ Đề</a>
													<ul>										
														<li><a href="shop.html">Hoa Sinh Nhật</a></li>
														<li><a href="shop.html">Hoa Tình Yêu</a></li>
														<li><a href="shop.html">Hoa Chúc Mừng</a></li>
														<li><a href="shop.html">Hoa Chia Buồn</a></li>
														<li><a href="shop.html">Ngày Của Mẹ</a></li>
														<li><a href="shop.html">Ngày Nhà Giáo VN</a></li>
													</ul>
												</li>
												<li><a href="shop.html">Theo Thiết Kế</a>
													<ul>										
														<li><a href="shop.html">Bó Hoa</a></li>
														<li><a href="shop.html">Bình Hoa</a></li>
														<li><a href="shop.html">Hộp Hoa</a></li>
														<li><a href="shop.html">Lẵng Hoa</a></li>
													</ul>
												</li>
												<li><a href="shop.html">Hoa Tươi</a>
													<ul>
														<li><a href="shop.html">Hoa Hồng</a></li>
														<li><a href="shop.html">Hoa Ly</a></li>
														<li><a href="shop.html">Hoa Lan</a></li>
														<li><a href="shop.html">Hoa Sen</a></li>
														<li><a href="shop.html">Hoa Tulip</a></li>
														<li><a href="shop.html">Hoa Hướng Dương</a></li>
													</ul>
												</li>
												<li><a href="shop.html">Quà Tặng Kèm</a>
													<ul>
														<li><a href="shop.html">Gấu Bông</a></li>
														<li><a href="shop.html">Chocolate</a></li>
														<li><a href="shop.html">Giỏ Trái Cây</a></li>
														<li><a href="shop.html">Giỏ Quà Tặng</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li><a href="shop.html">Ý Nghĩa Hoa</a>
										</li>
										<li><a href="single-blog.html">Blog</a>
										</li>
										<li><a href="about-us.html">Đội Ngũ</a>
										</li>
										<li><a href="contact.html">Liên Hệ</a>
										</li>
									</ul>
								</nav>
							</div>					
						</div>
					</div>
				</div>
			</div>
			<!--End Mobile Menu area -->
		</div>
		<!--End Main Menu area -->
		<!--Start Register & login area -->
		<div class="my_account_page_area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="create_account">
							<h2>Login or Create an Account</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="new_customer">
							<h3>NEW CUSTOMERS</h3>
							<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
						</div>
						<div class="create_button_area">
							<button onclick="location.href='CreateAcc.html'" type="submit" class="create_button" >
								Đăng ký tài khoản
							</button>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="new_customer">
							<h3>Registered Customers</h3>
							<p>If you have an account with us, please log in.</p>
							<ul class="register_form">
								<li>Email Address<span>*</span></li>
								<li>
									<div class="email_address">
										<input type="text" class="email_test"/>
									</div>
								</li>
								<li>Password<span>*</span></li>
								<li>
									<div class="email_address">
										<input type="text" class="password"/>
									</div>
								</li>
								<li><h2><span>*</span>Required Fields</h2></li>
							</ul>
						</div>
						<div class="create_button_area">
							<a href="">Forgot Your Password?</a>
							<button type="submit" class="create_button" onclick="location.href='Login.html'">
								Login
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End Register & login area -->
		
		<!--Start Footer area -->
		<div class="footer_area home1_margin_top">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="feature_text feature_newsletter">
							<h4>Thông tin</h4>
							<p>Đăng ký nhận những thông tin và ưu đãi mới nhất </p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="sign_up">
							<form action="#">
								<input class="sign_text" type="text" placeholder="Nhập gmail của bạn ..." />
								<button type="submit" class="sign">
									<span>Đăng ký</span>
									<img src="img/arrow/bkg_newsletter-1.png" alt="" />
								</button>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="footer_menu_area">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<div class="help_support">
								<h2>Văn phòng điều hành</h2>
								<p>All day flower: <span>191 Phạm Ngọc Thạch, Quận 1, Tp.HCM</span></p>
								<p>Số điện thoại <span>(+84) 123 45 6789</span></p>
								<p>Email: <span>alldayflower@gmail.com</span></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<div class="help_support help_border">
								<h2>Chi nhánh</h2>
								<ul class="footer_menu">
									<li><a href="https://goo.gl/maps/rzongXrTQEqZhSmt7" >192 Phạm Ngọc Thạch, Quận 1, Tp.HCM</a></li>
									<li><a href="https://goo.gl/maps/rzongXrTQEqZhSmt7">193 Phạm Ngọc Thạch, Quận 1, Tp.HCM</a></li>
									<li><a href="https://goo.gl/maps/rzongXrTQEqZhSmt7">194 Phạm Ngọc Thạch, Quận 1, Tp.HCM</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<div class="help_support help_border">
								<h2>Chăm sóc khách hàng</h2>
								<ul class="footer_menu">
									<li><a href="Security.html">Chính sách bảo mật thông tin</a></li>
									<li><a href="Commitment.html">Cam kết hài lòng</a></li>
									<li><a href="Complain.html">Thắc mắc khiếu nại</a></li>
									<li><a href="Checkout_tutorial.html">Hướng dẫn thanh toán</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<div class="help_support help_border">
								<h2>Các vị trí tuyển dụng</h2>
								<ul class="footer_menu">
									<li><a href="Recruitment.html">Nhân viên bán hàng</a></li>
									<li><a href="Recruitment_1.html">Nhân viên giao hàng</a></li>
									<li><a href="Recruitment.html">Nhân viên thu ngân</a></li>
									<li><a href="Recruitment.html">Nhân viên bảo vệ</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End Footer area -->
        <!-- jquery JS  -->
        <script src="js/vendor/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS -->
        <script src="js/bootstrap.min.js"></script>
		<!-- Mobile menu JS -->
        <script src="js/jquery.meanmenu.js"></script>
		<!-- jquery.easing js -->
        <script src="js/jquery.easing.1.3.min.js"></script>
		<!-- knob circle js -->
        <script src="js/jquery.knob.js"></script>
		<!-- fancybox JS -->
        <script src="fancy-box/jquery.fancybox.pack.js"></script>
		<!-- price slider JS  -->
        <script src="js/price-slider.js"></script>
		<!-- nivo slider JS -->
        <script src="js/jquery.nivo.slider.pack.js"></script>
		<!-- wow JS -->
        <script src="js/wow.js"></script>
		<!-- nivo-plugin JS -->
		<script src="js/nivo-plugin.js"></script>
		<!-- scrollUp JS -->
		<script src="js/jquery.scrollUp.js"></script>
		<!-- carousel JS  -->
        <script src="js/owl.carousel.min.js"></script>
		<!-- plugins JS  -->
        <script src="js/plugins.js"></script>
		<!-- main JS  -->
        <script src="js/main.js"></script>
    </body>
</html>