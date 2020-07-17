<?php
    require_once __DIR__. '/autoload.php';
    $db = new DB();
    $id = $_GET['id'];

    $id = intval($id);

    $sql = "SELECT * FROM  tbl_sanpham WHERE id_sanpham = ".$id;

    $product = $db->fetchsql($sql);

    $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = ".$product[0]['danhmuc_id'];

    $dataCate = $db->fetchsql($sql);

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
        <div id="product">
            <div class="main" style="background-color: #FFFFFF;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="breadcrumb clearfix">
                                <ul>
                                    <li itemtype="" itemscope="" class="home">
                                        <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                    </li>
                                    <li itemtype=" itemscope="" class="category17 icon-li">
                                        <div class="link-site-more">
                                            <a title="" href="chi-tiet-danh-muc.php?id=<?php echo $dataCate[0]['id_danhmuc'] ?>" itemprop="url">
                                            <span itemprop="title"><?php echo $dataCate[0]['tendanhmuc'] ?></span>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="productname icon-li"><strong><?php echo $product[0]['tensanpham'] ?></strong> </li>
                                </ul>
                            </div>
                            <div class="product-detail clearfix relative ng-scope"">
                               
                                <!--Begin-->
                                <div class="product-block clearfix">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 product-image clearfix">

                                            <div class="sp-wrap sp-non-touch" style="display: inline-block;">
                                                <div class="sp-large">
                                                    <a href="<?php echo base_url('/public/uploads/') ?><?php echo $product[0]['anhsanpham'] ?>" class="ng-scope .sp-current-big">
                                                        <img src="<?php echo base_url('/public/uploads/') ?><?php echo $product[0]['anhsanpham'] ?>">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 clearfix">
                                            <h2 class="ng-binding"><?php echo $product[0]['tensanpham'] ?></h2>
                                    
                                            <div class="price ">
                                                <div class="ng-scope">
                                                    <span class="price-new"> <?php
                                                            $price = ($product[0]['giasanpham'] * (100 - $product[0]['giamgia']))/100;
                                                             echo format_price($price);
                                                             ?></span>
                                                    <span class="price-old"><?php echo format_price($product[0]['giasanpham']); ?>₫</span>
                                                </div>
                                               
                                                <span class="product-code ng-binding">Mã SP: <?php echo $product[0]['masanpham'] ?></span>
                                            </div>
                                            
                                            <div class="des ng-binding" >
                                                <p><?php echo $product[0]['mota'] ?></p>
                                            </div>
                                            
                                            <div class="quantity clearfix">
                                                <label>Số lượng</label>
                                                <div class="quantity-input">
                                                    <input type="number" value="1" id="qty" class="text ng-pristine ng-untouched ng-valid">
                                                </div>
                                            </div>
                                           
                                            <div class="action-cart ng-scope">
                                                <a href="javascript:;void(0)" class="btn btn-default add-to-car" data-id-product="<?= $product[0]['id_sanpham'] ?>">
                                                    <i class="glyphicon glyphicon-shopping-cart"></i> Thêm giỏ hàng
                                                </a>
                                                <!-- <a href="" ng-click="" class="btn btn-primary">
                                                    <i class="glyphicon glyphicon-ok"></i> Mua ngay
                                                </a> -->
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tabs">
                                    <ul class="nav nav-tabs">
                                        <li role="presentation"  class="ng-scope active">
                                            <a data-toggle="tab" href="#tab1" class="ng-binding">Mô tả </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <?php echo $product[0]['noidung'] ?>
                                    </div>
                                </div>
                                <!--End-->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <script src="<?php echo base_url('/public/frontend/')  ?>app/services/moduleServices.js"></script>
                            <script src="<?php echo base_url('/public/frontend/')  ?>app/controllers/moduleController.js"></script>
                            <!--Begin-->
                            <div class="box-sale-policy ng-scope" ng-controller="moduleController" ng-init="initSalePolicyController('Shop')">
                                <h3><span>Chính sách bán hàng</span></h3>
                                <div class="sale-policy-block">
                                    <ul>
                                        <li>Giao hàng TOÀN QUỐC</li>
                                        <li>Thanh toán khi nhận hàng</li>
                                        <li>Hoàn ngay tiền mặt</li>
                                        <li>Chất lượng đảm bảo</li>
                                        
                                    </ul>
                                </div>
                                <div class="buy-guide">
                                    <h3>Hướng Dẫn Mua Hàng</h3>
                                    <ul>
                                        <li>
                                            Mua hàng trực tiếp tại website
                                            <b class="ng-binding">http://hoatuoidatlat.abc</b>
                                        </li>
                                        <li>
                                            Gọi điện thoại <strong class="ng-binding">
                                            0916.888.916
                                            </strong> để mua hàng
                                        </li>
                                        <li>
                                            Mua tại Trung tâm CSKH:<br>
                                            <strong class="ng-binding"></strong>
                                            <a href="" rel="nofollow" target="_blank">Xem Bản Đồ</a>
                                        </li>
                                        <li>
                                            Mua sỉ/buôn xin gọi <strong class="ng-binding">
                                            
                                            </strong> để được
                                            hỗ trợ.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--End-->
                            <?php require_once('layouts/inc_product_hot.php'); ?>
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