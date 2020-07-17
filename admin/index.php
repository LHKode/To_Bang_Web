<?php
    require_once __DIR__ .'/autoload.php';
	date_default_timezone_set('Asia/Ho_Chi_Minh');//change zone as per need

    // tong so san pham
    $countProduct = DB::countTable('tbl_sanpham');
    // tong so user 
    $countUsers = DB::countTable('tbl_khachhang');
    // tong so don hang
    $countTransactions = DB::countTable('tbl_donhang');
    // danh muc san pham
    $countCatePro = DB::countTable('tbl_danhmuc');

    // doanh thu ngay 
    $day = date('d');

    $sqltime2 = "SELECT SUM(tongtien) as doanhthu FROM tbl_donhang WHERE 1 AND trangthai = 1 AND DAY(ngaythanhtoan) = $day";

    $amountDay = DB::fetchsql($sqltime2);

    // doanh thu tháng
    $month = date('m');
    $sqltime3 = "SELECT SUM(tongtien) as doanhthu FROM tbl_donhang WHERE 1 AND trangthai = 1 AND MONTH(ngaythanhtoan) = $month";
    $amountMonth = DB::fetchsql($sqltime3);

    /**
     * danh thu theo  tuần
     */
    
    $dates = date('Y-m-d');


    $week = date('W', strtotime($dates));

    $sqltime4 = "SELECT SUM(tongtien) as doanhthu FROM tbl_donhang WHERE 1 AND trangthai = 1 AND WEEK(ngaythanhtoan,1) =  $week";

    $amountWeek = DB::fetchsql($sqltime4);

    // tong doanh thu

    $sqltime5 = "SELECT SUM(tongtien) as doanhthu FROM tbl_donhang WHERE 1";
    $amountSum = DB::fetchsql($sqltime5);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> <?= isset($title_global) ? $title_global : 'Trang admin ' ?>  </title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php require_once __DIR__ .'/layouts/inc_css.php'; ?>
        <!-- <link rel="stylesheet" href="/public/admin/css/bootstrap-tagsinput.css"> -->
    </head>
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            
            <?php require_once __DIR__ .'/layouts/inc_header.php'; ?>
            <!-- ======================HEADER========================= -->
            <?php require_once __DIR__ .'/layouts/inc_sidebar.php'; ?>
            <!-- =======================SIDEBAR======================== -->
            <!-- ======================= CONTENT======================== -->
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>QUẢN TRỊ WEBSITE</h1>
                    <ol class="breadcrumb">
                        <li class="active"><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-body border mr-t-10">
                            <div class="row">
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h3><?= $countTransactions ?></h3>
                                            <p> Đơn hàng </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="/admin/modules/transactions" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h3><?= $countCatePro ?></h3>
                                            <p> Danh Mục Sản Phẩm </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="/admin/modules/categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-yellow">
                                        <div class="inner">
                                            <h3><?= $countUsers ?></h3>
                                            <p> Khách hàng </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="/admin/modules/customer" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <h3><?= $countProduct ?></h3>
                                            <p> Sản Phẩm </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a href="/admin/modules/products" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-aqua">
                                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Doanh thu hôm nay</span>
                                            <span class="info-box-number"><?= format_price($amountDay[0]['doanhthu']) ?> đ</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%"></div>
                                            </div>

                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-green">
                                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Doanh thu tuần</span>
                                            <span class="info-box-number"><?= format_price($amountWeek[0]['doanhthu']) ?></span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%"></div>
                                            </div>

                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-yellow">
                                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Doanh Thu Tháng Nay</span>
                                            <span class="info-box-number"><?= format_price($amountMonth[0]['doanhthu']) ?>đ</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%"></div>
                                            </div>

                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-red">
                                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Doanh Thu Năm </span>
                                            <span class="info-box-number"><?= format_price($amountSum[0]['doanhthu']) ?>đ</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%"></div>
                                            </div>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </section>
            </div>
            <!-- =======================END CONTENT======================== -->
            <?php require_once __DIR__ .'/layouts/inc_footer.php'; ?>
        </div>
        <?php require_once __DIR__ .'/layouts/inc_js.php'; ?>