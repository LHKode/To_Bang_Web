<div id="header" class="header">
    <script src="<?php echo base_url('/public/frontend/')  ?>scripts/common/login.js" type="text/javascript"></script>
    <section class="top-link clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav navbar-nav topmenu-contact pull-left">
                        <li><i class="fa fa-phone"></i> <span>Hotline:0928.817.228 </span></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right topmenu  hidden-xs hidden-sm">
                       <!--  <li class="order-check"><a href="/kiem-tra-don-hang.html"><i class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng</a></li> -->
                        <li class="order-cart"><a href="../gio-hang.php"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                        <?php if(!isset($_SESSION['users'])): ?>
                        <li class="account-login"><a href="../dang-nhap.php"><i class="fa fa-sign-in"></i> Đăng nhập </a></li>
                        <li class="account-register"><a href="../dang-ky.php"><i class="fa fa-key"></i> Đăng ký </a></li>
                        <?php else :?>
                            <li class="account-register"><a href=""><i class="fa fa-fw fa-user"></i>Xin chào : <?php echo $_SESSION['users']['tenkhachhang']?> </a></li>
                            <li class="account-register"><a href="thoat.php"><i class="fa fa-fw fa-arrow-circle-right"></i>Đăng Xuất</a></li>
                        <?php endif ?>

                    </ul>
                    <div class="show-mobile hidden-lg hidden-md">
                        <div class="quick-user">
                            <div class="quickaccess-toggle">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="inner-toggle">
                                <ul class="login links">
                                    <li>
                                        <a href="/dang-ky.html"><i class="fa fa-sign-in"></i> Đăng ký</a>
                                    </li>
                                    <li>
                                        <a href="/dang-nhap.html"><i class="fa fa-key"></i> Đăng nhập</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="quick-access">
                            <div class="quickaccess-toggle">
                                <i class="fa fa-list"></i>
                            </div>
                            <div class="inner-toggle">
                                <ul class="links">
                                    <!-- <li><a id="mobile-wishlist-total" href="/kiem-tra-don-hang.html" class="wishlist"><i class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng</a></li> -->
                                    <li><a href="gio-hang.php" class="shoppingcart"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="/" class="logo" title="">
                    <img src="<?php echo base_url('/public/frontend/')  ?>uploads/images/logo2.png" alt="">
                </a>
                <h1 style="display: none;">
                    
                </h1>
            </div>
            <div class="col-xs-7 col-sm-7 header-search-box">
                <div class="search-box">
                    <form class="search form-inline" method="get" action="tim-kiem.php">
                        <div class="form-group input-serach">
                            <input type="text" name="search" class="search_box" id="txtsearch" onblur="if(this.value=='')this.value='Nhập từ khóa tìm kiếm...'" onfocus="if(this.value=='Nhập từ khóa tìm kiếm...')this.value=''" value="Nhập từ kh&#243;a t&#236;m kiếm..." />
                        </div>
                        <button id="btnsearch" class="pull-right btn-search">
                        <span class="hidden-400">Tìm kiếm</span>
                        <span class="show-400"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </button>
                    </form>
                </div>
            </div>
            <div class="col-xs-5 col-sm-2 group-button-header new-login">
                <a title="Đăng nhập" href="dang-nhap.php" class="btn-heart"></a>
                <div class="btn-cart" id="cart-block">
                    <a title="My cart" href="gio-hang.php"></a>
                    <span class="text-show"></span>
                    <span class="notify notify-right">
                        <?php if(isset($_SESSION['cart'])): ?>
                            
                            <?php  $qty = 0; ?>
                            <?php foreach($_SESSION['cart'] as $item ): ?>
                                <?php 
                                   
                                    $qty = $qty + $item['qty'];
                                ?>
                            <?php  endforeach; ?>
                            <?php echo $qty; ?>
                        <?php else: ?>
                            0
                        <?php endif; ?>
                    </span>
                    
                </div>
            </div>
        </div>
    </div>
</div>