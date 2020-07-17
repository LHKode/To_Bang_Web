<?php
    // bien module de active cai menu
    $modules = 'categories';
    $title_global = 'Danh sách danh mục ';
    require_once __DIR__ .'/../../autoload.php';

    $category = DB::query('tbl_danhmuc');

    recursive($category,0,1,$categorySort);

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
                <li><a href="#">Danh mục sản phẩm </a></li>
                <li class="active"> Danh sách</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <a href="add.php" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Thêm mới </a>
                </div>
                <div class="box-body">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover border">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Vị trí</th>
                                <th>Kiểu danh mục</th>
                                <th>Trang thái</th>
                                <th>Khác</th>
                                <th>Thao tác</th>
                            </tr>
                            <?php if($categorySort)  :?>
                            <?php foreach ($categorySort as $key => $cate): ?>
                                <tr>
                                    <td>
                                        <?= $cate['id_danhmuc'] ?>
                                    </td>
                                    <td>
                                        <?php $str = '' ;for($i = 0; $i < $cate['level'] ; $i++) {echo $str ; $str.=" -- ";} ?>
                                        <?= $cate['tendanhmuc'] ?>
                                    </td>
                                    <td> <?= $cate['vitri'] ?></td>
                                    <td> <span class="btn btn-xs btn-info"><?= $cate['kieudanhmuc'] == 1 ? "Sản phẩm" : "Tin tức" ?></span></td>
                                    <td><a href="active.php?id=<?= $cate['id_danhmuc'] ?>" class="custome-btn label <?= $cate['trangthai'] == 1 ? 'label-info' : 'label-default' ?>"><span><?= $cate['trangthai'] == 1 ? 'Hiện' : 'Ẩn' ?></span></a></td>
                                    <td><a href="hot.php?id=<?= $cate['id_danhmuc'] ?>" class="custome-btn label <?= $cate['noibat'] == 1 ? 'label-info' : 'label-default' ?>"><span><?= $cate['noibat'] == 1 ? 'Nổi bật' : 'Thường' ?></span></a></td>
                                    <td>
                                        <a href="update.php?id=<?= $cate['id_danhmuc'] ?>" class="custome-btn btn-info btn-xs"><i class="fa fa-pencil-square"></i> Cập nhật </a>
                                        <a href="delete.php?id=<?= $cate['id_danhmuc'] ?>" class="custome-btn btn-danger btn-xs delete comfirm_delete" ><i class="fa fa-trash"></i> Xoá  </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <?php endif ?>

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

