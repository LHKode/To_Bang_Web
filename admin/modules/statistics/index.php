<?php
    // bien module de active cai menu
    $modules = 'categories';
    $title_global = 'Số lượng sản phẩm bán ra ';
    require_once __DIR__ .'/../../autoload.php';

   $day = date('d');

    $sqltime2 = "SELECT *  FROM tbl_chitietdonhang WHERE 1 AND DAY(created_at) = $day";
    $amountDay = DB::fetchsql($sqltime2);

    $data = [];
    foreach($amountDay as $key => $item) {
        $data[$key] =  $item['sanpham_id'];
    }

    $result = array_unique($data);
    $dataDay = array();
    foreach($result as $item) {
        $sql = "SELECT   SUM(soluong) as banra FROM tbl_chitietdonhang  WHERE sanpham_id = {$item}";
        $dataDay[$item] = DB::fetchsql($sql);
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?= isset($title_global) ? $title_global : 'Trang admin ' ?>  </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php require_once __DIR__ .'/../../layouts/inc_css.php'; ?>
    <!-- <link rel="stylesheet" href="/public/admin/css/bootstrap-tagsinput.css"> -->
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <?php require_once __DIR__ .'/../../layouts/inc_header.php'; ?>
    <!-- ======================HEADER========================= -->
    <?php require_once __DIR__ .'/../../layouts/inc_sidebar.php'; ?>
    <!-- =======================SIDEBAR======================== -->
    <!-- ======================= CONTENT======================== -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <?= isset($title_global) ? $title_global : '' ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"><?= isset($title_global) ? $title_global : '' ?> </a></li>
                <li class="active"> Danh sách</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                
                <div class="box-body">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover border">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Ngày tạo</th>
                            </tr>
                            <?php $total = 0 ?>
                            <?php foreach ($dataDay as $key => $value): ?>
                                    <?php
                                        $sql = "SELECT * FROM tbl_sanpham  WHERE id_sanpham = {$key}";
                                        $product = DB::fetchsql($sql);
                                    ?>
                                    <tr>
                                        <td><?php echo $product[0]['id_sanpham'] ?></td>
                                        <td><?php echo $product[0]['tensanpham'] ?></td>
                                        <td><?php echo $value[0]['banra'] ?></td>
                                        <td><?php echo date("Y-m-d"); ?></td>
                                    </tr>
                                    <?php $total = $total + $value[0]['banra'] ?>
                            <?php endforeach ?>
                            
                            <tr>
                                <td  colspan="2" rowspan="" headers="" class="text-center"> <b>Tổng sản lượng bán ra hôm nay</b></td>
                                <td colspan="2"> <?php echo  $total ?></td>
                                
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </section>
    </div>
    <!-- =======================END CONTENT======================== -->
    <?php require_once __DIR__ .'/../../layouts/inc_footer.php'; ?>
</div>
<?php require_once __DIR__ .'/../../layouts/inc_js.php'; ?>

