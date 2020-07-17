<?php
    require_once __DIR__.'/autoload.php';
    $db = new DB();
    $sql = "SELECT * FROM tbl_danhmuc WHERE noibat = 1 AND trangthai = 1 ORDER BY vitri DESC";
    $data = $db->fetchsql($sql);
    foreach ($data as $key => $item) {
        $sql  = "SELECT * FROM tbl_sanpham WHERE danhmuc_id = ". $item['id_danhmuc']." AND trangthai = 1 ORDER BY id_sanpham DESC";
        $data[$key]['product'] = $db->fetchsql($sql);
    }

    
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
        <?php require_once('layouts/inc_menu.php'); ?>
        <!-- slideshow -->
        <?php require_once('layouts/inc_slideshow.php'); ?>
        <!--  end slideshow -->
        <!-- promotion -->
        <?php require_once('layouts/inc_promotion.php'); ?>
       <!--  end promotion -->


        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-page">
                            <div class="container">
                            <?php foreach($data as $key => $item): ?>
                                <?php if(!empty($item['product'])): ?>
                                   
                                <div class="category-featured featured1">
                                    <nav class="navbar nav-menu show-brand">
                                        <div class="container">
                                            <!-- Brand and toggle get grouped for better mobile display -->
                                            <div class="navbar-brand" style="background-color: <?php echo $item['color'];?> ; border-bottom: 2px solid <?php echo !empty($item['color']) ? $item['color'] : '#ff3366';?> !important">
                                                <a href="chi-tiet-danh-muc.php?id=<?php echo  $item['id_danhmuc'] ?>">
                                                    <?php if(!empty($item['anhdanhmuc'])): ?>
                                                        <img src="<?php echo base_url('/public/uploads/')  ?><?php echo !empty($item['anhdanhmuc'])? $item['anhdanhmuc'] : 's2.png' ?>"/>
                                                        
                                                    <?php endif; ?>
                                                    <?php echo $item['tendanhmuc'] ?>
                                                </a>
                                            </div>
                                            
                                           
                                            <div class="collapse navbar-collapse" style="border-bottom: 2px solid <?php echo !empty($item['color']) ? $item['color'] : '#ff3366';?> !important">
                                            
                                            </div>
                                            <!-- /.navbar-collapse -->
                                        </div>
                                        <!-- /.container-fluid -->
                                        <div id="elevator-<?php echo $key +1 ?>" class="floor-elevator">
                                            <a href="#" class="btn-elevator up disabled fa fa-angle-up"></a>
                                            <a href="#elevator-<?php echo $key +1 ?>" class="btn-elevator down fa fa-angle-down"></a>
                                        </div>
                                    </nav>

                                    <div class="product-featured clearfix">
                                        <div class="row">
                                            <div class="col-sm-12 col-right-tab">
                                                <div class="product-featured-tab-content">
                                                    <div class="tab-container">
                                                        <div class="tab-panel active" id="tab_1">
                                                            <div class="box-right" style="width: 100%;">
                                                                <ul class="product-list row">
                                                                    <?php foreach( $item['product'] as $product ):?>
                                                                    <li class="col-sm-3">
                                                                        <div class="right-block">
                                                                            <h5 class="product-name"><a href="chi-tiet-san-pham.php?id=<?php echo $product['id_sanpham']  ?>"><?php echo $product['tensanpham'] ?></a></h5>
                                                                            <div class="content_price">
                                                                                <span class="price product-price">
                                                                                    <?php
                                                                                    $price = ($product['giasanpham'] * (100 - $product['giamgia']))/100;
                                                                                     echo format_price($price);
                                                                                     ?>
                                                                                ₫</span>
                                                                                <span class="price old-price">
                                                                                    <?php echo format_price($product['giasanpham']); ?>₫
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="left-block">
                                                                            <!-- san-pham/ten-san-pham-5.html-->
                                                                            <a href="chi-tiet-san-pham.php?id=<?php echo $product['id_sanpham'] ?>">
                                                                                <img class="img-responsive" alt="product" src="<?php echo base_url('/public/')  ?>uploads/<?php echo 
                                                                                $product['anhsanpham'] ?>"" style="height: 275px" />
                                                                            </a>
                                                                            <div class="add-to-cart">
                                                                                <a class="add-to-car" href=""  data-id-product="<?php echo $product['id_sanpham']  ?>"  onclick="AddToCard(51001,1)">Thêm vào giỏ</a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <?php endforeach; ?>
                                                                   
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- partner -->
        <?php //require_once('layouts/inc_partner.php'); ?>
       <!-- end partner -->


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