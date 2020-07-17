<?php
    require_once __DIR__. '/autoload.php';

    // kiem tra gio hang co ton tai khong hoac || neu ton tai co so luong ko 
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
    <div class="wrapper page-home">
         <!--  header -->
        <?php require_once('layouts/inc_header.php'); ?>
        <!--  end header -->
        <!--  header -->
        <?php require_once('layouts/inc_menu_tog.php'); ?>
        <!--  end header -->
            <div id="cart">
                <div class="main" style="background-color: #FFFFFF;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb clearfix">
                                    <ul>
                                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                        </li>
                                        <li class="icon-li"><strong>Giỏ hàng</strong> </li>
                                    </ul>
                                </div>
                            
                                <div class="cart-content ng-scope">
                                    <h1 class="page-heading"><span>Giỏ hàng của tôi</span></h1>
                                    <div class="steps clearfix">
                                        <ul class="clearfix">
                                            <li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
                                            <li class="payment col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
                                            <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
                                        </ul>
                                    </div>
                                    <div class="cart-block-info">
                                        <div class="cart-info table-responsive">
                                            <table class="table product-list">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Thành tiền</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($shoppingCart as $key => $cart) :?>
                                                    <tr class="ng-scope">
                                                        <td class="image">
                                                            <a href="/san-pham/dam-mac-nha-tay-lo-nitimo-2001.html"> <img ng-src="<?php echo base_url() ?>/public/uploads/<?= $cart['img'] ?>" class="img-responsive" src="/Uploads/shop2198/images/product/p51_large.jpg"></a>
                                                        </td>
                                                        <td class="des">
                                                            <a href="/san-pham/dam-mac-nha-tay-lo-nitimo-2001.html" class="ng-binding"><?= $cart['name'] ?></a>
                                                            <span class="ng-binding"></span>
                                                        </td>
                                                        <td class="price ng-binding"><?= format_price($cart['price']) ?>đ</td>
                                                        <td class="quantity">
                                                            <input type="number" value="<?= $cart['qty'] ?>" class="change-qty-cart" data-id-product="<?= $key ?>">
                                                        </td>
                                                        <td class="amount ng-binding"><span class="total-item"><?= format_price($cart['qty'] * $cart['price']) ?>đ</span></td>
                                                        <td class="">
                                                            <a  href="javascript:void(0)" class="item-product-remove" data-id-product="<?= $key ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        // tong tien tung  san pham
                                                        $total += $cart['qty'] * $cart['price']; 
                                                    ?>
                                                    <?php endforeach ; ?>
                                                    <!-- end ngRepeat: item in OrderDetails -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="clearfix text-right" style="padding-bottom:20px">
                                            <span><b>Tổng thanh toán:</b></span>
                                            <span class="pay-price ng-binding" id="total-cart"><?= format_price($total) ?>đ</span>
                                        </div>
                                        <div class="text-right">
                                            <a class="comeback" href="/" onclick="window.history.back()">Tiếp tục mua hàng</a>
                                            <a class="button-default" id="checkout" href="thanh-toan.php">Tiến hành thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- footer -->
        <?php require_once('layouts/inc_footer.php'); ?>
        <!--  end footer -->
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
