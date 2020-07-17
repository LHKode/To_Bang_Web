<?php
    require_once __DIR__. '/autoload.php';
    $paginations = new Pagination();

    $products = Pagination::pagination('tbl_sanpham','','page',12);
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

            <div id="collection">
                <div class="main">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="breadcrumb clearfix">
                                    <ul>
                                        <li itemtype="" itemscope="" class="home">
                                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                        </li>
                                        <li class="icon-li"><strong>Sản phẩm</strong> </li>
                                    </ul>
                                </div>
                                
                                <div class="view-product-list">
                                    <h2 class="page-heading">
                                        <span class="page-heading-title">Sản phẩm</span>
                                    </h2>
                                   
                                    <!-- PRODUCT LIST -->
                                    <ul class="row product-list grid filter">
                                        <?php foreach( $products as $item  ): ?>
                                            <li class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="product-container product-resize fixheight" style="height: 298px;">
                                                <div class="left-block image-resize" style="height: 221px;">
                                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id_sanpham'] ?>">
                                                         <img class="img-responsive" alt="product" src="<?php echo base_url('/public/')  ?>uploads/<?php echo $item['anhsanpham'] ?>" /></a>
                                        
                                                    <div class="add-to-cart">
                                                        <a class="add-to-car"  data-id-product="<?php echo $item['id_sanpham']  ?>" onclick="AddToCard(51001,1)">Thêm vào giỏ</a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="chi-tiet-san-pham.php?id=<?php echo $item['id_sanpham'] ?>"><?php echo $item['tensanpham'] ?></a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">
                                                            <?php
                                                            $price = ($item['giasanpham'] * (100 - $item['giamgia']))/100;
                                                             echo format_price($price);
                                                             ?>
                                                        </span>
                                                        <span class="price old-price">
                                                            <?php echo format_price($item['giasanpham']); ?>₫
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endforeach; ?>
                                        
                                    </ul>
                                    <div class="col-md-12 content_sortPagiBar pagi">
                                        <div id="pagination" class="clearfix">
                                            <!-- <ul class="pagination">
                                                <li class="pagination_previous">
                                                    <a href="?page=1" title="Next »"><i class="fa fa-chevron-left"></i></a>
                                                </li>
                                                <li class="active"><span>1</span></li>
                                                <li>
                                                    <a href="?page=2" title="">2</a>
                                                </li>
                                                <li>
                                                    <a href="?page=3" title="">3</a>
                                                </li>
                                                <li class="pagination_next"><a href="?page=3" title="Next »"><i class="fa fa-chevron-right"></i></a></li>
                                                
                                            </ul> -->

                                             <?php echo Pagination::getListpage() ?>
                                        </div>
                                    </div>
                                    <!-- ./PRODUCT LIST -->
                                </div>
                                <!--Template--
                                    --End-->
                            </div>
                            <div class="col-md-3">
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