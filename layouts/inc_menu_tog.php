<?php
    
    $db = new DB();

    $sql = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id = 0 AND trangthai = 1 ORDER BY vitri DESC";
    $dataCate = $db->fetchsql($sql);
    foreach ($dataCate as $key => $subCate) {
        # code...
        $sql  = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id = ". $subCate['id_danhmuc']." AND trangthai = 1 ORDER BY vitri DESC";
        $dataCate[$key]['subcate'] = $db->fetchsql($sql);
    }
?>
<div id="nav-top-menu" class="nav-top-menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-3" id="box-vertical-megamenus">
                 <div class="box-vertical-megamenus menu-quick-select">
                        <h4 class="title click-menu">
                            <span class="title-menu">Danh mục sản phẩm</span>
                            <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                        </h4>
                         <div class="vertical-menu-content is-home no-home" style="display: none;" >
                            <ul class='vertical-menu-list'>
                                <?php foreach($dataCate as $item): ?>
                                    <li class="level0">
                                        <a class="" href="chi-tiet-danh-muc.php?id=<?php echo  $item['id_danhmuc']?>">
                                            <?php if(!empty($item['anhdanhmuc'])): ?>
                                                <img class="icon-menu" src="<?php echo base_url('/public/uploads/')  ?><?php echo !empty($item['anhdanhmuc'])? $item['anhdanhmuc'] : 's2.png' ?>">
                                            <?php else :?>
                                                 <i class="icon-menu <?php echo !empty($item['icon']) ? $item['icon'] : 'fa fa-dashboard' ?>" style="font-size: 18px; margin-right: 10px;"></i>
                                             <?php endif; ?>

                                            <span><?php echo $item['tendanhmuc'] ?></span>
                                        </a>
                                    </li>

                                <?php endforeach; ?>
                                
                            </ul class='vertical-menu-list'>
                        </div>
                    </div>
            </div>
            <div id="main-menu-new" class="col-sm-12 col-md-9 main-menu">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#new-menu" aria-expanded="false" aria-controls="navbar">
                            <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="#">MENU</a>
                        </div>
                        <div id="new-menu" class="navbar-collapse collapse" style="background-color=#ff2b2b;">
                            <ul class="menu t-menu nav">
                                <li class="level0"><a class='' href='../index.php'><span>Trang chủ</span></a></li>
                                <li class="level0"><a class='' href='../gioi-thieu.php'><span>Giới thiệu</span></a></li>
                                <li class="level0"><a class='' href='../san-pham.php'><span>Sản phẩm</span></a></li>
                                <li class="level0"><a class='' href='../tin-tuc.php'><span>Tin tức</span></a></li>
                                <li class="level0"><a class='' href='../lien-he.php'><span>Liên hệ</span></a></li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </nav>
            </div>
        </div>
        <!-- userinfo on top-->
        <div id="form-search-opntop">
        </div>
        <!-- userinfo on top-->
        <!-- CART ICON ON MMENU -->
        <div id="shopping-cart-box-ontop" style="display: none;">
                <a href="gio-hang.php">
                    <span class="icon-cart-ontop" style="margin-top: 10px;"></span>
                </a>
                <?php if(isset($_SESSION['cart'])): ?>
                    <?php  $qty = 0; ?>
                    <span class="cart-items-count">
                        <?php foreach($_SESSION['cart'] as $item ): ?>
                            <?php 
                                $qty = $qty + $item['qty'];
                            ?>
                        <?php  endforeach; ?>
                        <?php echo $qty; ?>
                     </span>
                <?php endif; ?>
                <div class="shopping-cart-box-ontop-content">
                </div>
            </div>
    </div>
</div>