<?php 
    $db = new DB();
    $sql_hot = "SELECT * FROM  tbl_sanpham WHERE noibat = 0 AND trangthai = 1 ORDER BY id_sanpham DESC";

    $dataHot = $db->fetchsql($sql_hot);
?>

 <div id="left_column">
    <div class="block left-module">
        <p class="title_block">Sản phẩm Hot</p>
        <div class="block_content">
            <ul class="products-block best-sell">
                <?php foreach ($dataHot as $key => $item):?>
                    <li class="clearfix">
                        <div class="products-block-left">
                            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id_sanpham'] ?>">
                                <img class="img-responsive" alt="" src="<?php echo base_url('/public/')  ?>uploads/<?php echo $item['anhsanpham'] ?>">
                            </a>
                        </div>
                        <div class="products-block-right">
                            <p class="product-name">
                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id_sanpham']?>">
                                    <?php echo $item['tensanpham'] ?>
                                </a>
                            </p>
                            <p class="product-price">
                                <span class="price product-price">
                                    <?php
                                        $price = ($item['giasanpham'] * (100 - $item['giamgia']))/100;
                                         echo format_price($price);
                                    ?>
                                </span>
                                <span class="price old-price">
                                    <?php echo format_price($item['giasanpham']); ?>₫
                                </span>
                            </p>
                            <p class="product-star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </p>
                        </div>
                    </li>
                <?php endforeach; ?>
                
            </ul>
        </div>
    </div>
</div>