<?php
    require_once __DIR__. '/autoload.php';
    if( !isset($_SESSION['cart']))
    {   $_SESSION['danger'] = ' Không tồn tại giỏ hàng ';
        header("Location: ".base_url().'/');exit();
    }   
   
    $shoppingCart = $_SESSION['cart'];
    //bien chua tong tien 
    $total = 0;
?>

<!DOCTYPE html>
<html>
<head>
   <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta charset="UTF-8" />
    <title></title>
    <link href="<?php echo base_url('/public/frontend/')  ?>uploads/images/favicon.png" rel="shortcut icon" type="image/x-icon" />
    <?php require_once('layouts/inc_head.php'); ?>
    
</head>

    <body ng-app="appMain" style="" class="home option2">
        <div id="fb-root"></div>
        <div class="wrapper ">
             <!--  header -->
            <?php require_once('layouts/inc_header.php'); ?>
            <!--  end header -->
            <!--  header -->
            <?php require_once('layouts/inc_menu_tog.php'); ?>
            <!--  end header -->
            <div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Thanh toán</strong> </li>
                    </ul>
                </div>
            
                <div class="payment-content ng-scope" ng-controller="orderController" ng-init="initCheckoutController()">
                    <h1 class="page-heading"><span>Thanh toán</span></h1>
                    <div class="steps clearfix">
                        <ul class="clearfix">
                            <li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
                            <li class="payment active col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
                            <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
                        </ul>
                    </div>
                    <form class="payment-block clearfix" action="xu-ly-thanh-toan.php" method="post" id="checkout-container" >
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step2">
                            <h4>1. Địa chỉ thanh toán và giao hàng</h4>
                            <div class="step-preview clearfix">
                                
                                <!-- ngIf: CustomerId>0 -->
                                <!-- ngIf: CustomerId<=0 -->
                                <div class="form-block ng-scope">
                                   
                                    <br>
                                    <div class="form-group" style="margin-top: 20px;">
                                        <input class="form-control" name="tenkhachhang" value="<?php echo  isset($_SESSION['users']['tenkhachhang']) ? $_SESSION['users']['tenkhachhang'] : '' ?>" placeholder="Họ &amp; Tên" type="text"  required="true" >
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="sodienthoai" value="<?php echo  isset($_SESSION['users']['sodienthoai']) ? $_SESSION['users']['sodienthoai'] : '' ?>" placeholder="Số điện thoại" type="text" required="true" >
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="email" value="<?php echo  isset($_SESSION['users']['email']) ? $_SESSION['users']['email'] : '' ?>" placeholder="Email" type="email" required="true">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="diachi"  value="<?php echo  isset($_SESSION['users']['diachi']) ? $_SESSION['users']['diachi'] : '' ?>"  placeholder="Địa chỉ" type="text" required="true" >
                                    </div>
                                    <textarea class="form-control" name="ghichu" rows="4" placeholder="Ghi chú đơn hàng"></textarea>
                                </div>
                                <!-- end ngIf: CustomerId<=0 -->
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step3">
                            <h4>2. Vận chuyển</h4>
                            <div class="step-preview clearfix">
                                <h2 class="title">Vận chuyển</h2>
                                <div class="form-group ">
                                    <select class="form-control" id="vanchuyen" name="vanchuyen">
                                        <option value="1" selected="selected">Chuyể phát nhanh</option>
                                        <option value="2" selected="selected">Giao hàng bình thường</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step1">
                            <h4>3. Thông tin đơn hàng</h4>
                            <div class="step-preview">
                                <div class="cart-info">
                                    <div class="cart-items">
                                        <!-- ngRepeat: item in OrderDetails -->
                                    </div>
                                    <?php 
                                        $total = 0;
                                        foreach($shoppingCart as $key => $cart) {

                                            $total += $cart['qty'] * $cart['price']; 
                                        }
                                    ?>
                                    <div class="total-price">
                                        Thành tiền  <label class="ng-binding"><?= format_price($total) ?>đ</label>
                                        <input type="hidden" name="thanhtien" id="thanhtien" value="<?php echo $total ?>">
                                    </div>
                                    <div class="shiping-price">
                                        Phí vận chuyển  <label class="ng-binding" id="phivanchuyen">30000 ₫</label>
                                    </div>
                                    <div class="total-payment">
                                        Thanh toán <span class="ng-binding" id="text-tong-tien"><?= format_price($total + 30000) ?>đ</span>
                                        <input type="hidden" name="tongtien" id="tongtien" value="<?php echo $total + 30000 ?>">
                                    </div>
                                    <div class="button-submit">
                                        <a href="chi-tiet-don-hang.php" ><button class="btn btn-primary" type="submit">Đặt hàng</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
            
            <!-- footer -->
            <?php require_once('layouts/inc_footer.php'); ?>
            <!--  end footer -->
        </div>
    </div>


    <div style="display: none;" id="loading-mask">
        <div id="loading_mask_loader" class="loader">
            <img alt="Loading..." src="<?php echo base_url('/public/frontend/')  ?>assets/img/ajax-loader-main.gif" />
            <div>
                Please wait...
            </div>
        </div>
    </div>
    <a href="#" class="scroll_top" title="Scroll to Top" style="display: none;">Scroll</a>
</body>

</html>
<script type="text/javascript">
    $(".header-content").css({
        "background": ''
    });
    $("html").addClass('');
</script>