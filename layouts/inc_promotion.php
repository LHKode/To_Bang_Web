<?php
    $db = new DB();
    $sql  = "SELECT * FROM tbl_sanpham WHERE  trangthai = 1 ORDER BY giamgia DESC LIMIT 4 ";
    $dataPro = $db->fetchsql($sql);
    
 ?>
<div class="adv">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <script src="<?php echo base_url('/public/frontend/')  ?>app/services/productServices.js"></script>
                <script src="<?php echo base_url('/public/frontend/')  ?>app/controllers/productController.js"></script>
                <!--Begin-->
                <div class="product-content" ng-controller="productController" ng-init="initProductPromotionSlideController('ProductPromotionSlides')">
                    <h2 class="page-heading">
                        <span class="page-heading-title">SẢN PHẨM KHUYẾN MẠI</span>
                    </h2>
                    <div class="latest-deals-product">
                        <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true" data-margin="10">
                            <?php foreach ($dataPro as $key => $item):?>
                            <li>
                                <div class="left-block">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id_sanpham']  ?>"><img style="height: 300px ;" class="img-responsive" alt="" title="" src="<?php echo base_url('/public/')  ?>uploads/<?php echo $item['anhsanpham'] ?>" /></a>
                                    <div class="add-to-cart">
                                        <a class="add-to-car" data-id-product="<?php echo $item['id_sanpham']  ?>" href="javascript:void(0);">Thêm vào giỏ</a>
                                    </div>
                                    <div class="price-percent-reduction2">
                                        Sale
                                        <br> <?php echo $item['giamgia'] ?><strong>%</strong>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name" style="min-height:36px;"><a href="chi-tiet-san-pham.php?id=<?php echo $item['id_sanpham']  ?>"><?php echo $item['tensanpham'] ?></a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">
                                             <?php
                                                $price = ($item['giasanpham'] * (100 - $item['giamgia']))/100;
                                                 echo format_price($price);
                                             ?>
                                             đ
                                        </span>
                                        <span class="price old-price"><?php echo format_price($item['giasanpham']); ?>₫</span>
                                        <span class="price product-price"></span>
                                        <span class="price product-price"></span>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price"></span>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <!--End-->
                <script src="<?php echo base_url('/public/frontend/')  ?>assets/js/slides.js"></script>
            </div>
        </div>
    </div>
</div>
