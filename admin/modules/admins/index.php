<?php
    $modules = 'admins';
    $title_global = 'Danh sách quản lý';
    require_once __DIR__ .'/../../autoload.php';

    // level = 1 || cap do cong tac vien
    // level = 2 || admin
    // level = 3 || superAdmin

    $admins = Pagination::pagination('tbl_quantrivien','SELECT * FROM tbl_quantrivien WHERE capdo <= 2','page',9);
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
                        <li><a href="#"> Quản lý </a></li>
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
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Cấp độ</th>
                                            <th>Trang Thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                        <?php if($admins) :?>
                                            <?php foreach ($admins as $admin) :?>
                                                <tr>
                                                    <td><?= $admin['id_quantrivien'] ?></td>
                                                    <td><?= $admin['hoten'] ?></td>
                                                    <td><?= $admin['email'] ?></td>
                                                    <td><?= $admin['sodienthoai'] ?></td>
                                                    <td>
                                                        <a href="#" class="custome-btn label <?= $admin['capdo'] == 1 ? 'label-info' : 'label-danger' ?>"><span><?= $admin['capdo'] == 1 ? 'Cộng tác viên' : 'Quản trị viên' ?></span></a>
                                                    </td>
                                                    <td>
                                                        <a href="active.php?id=<?= $admin['id_quantrivien'] ?>" class="custome-btn label <?= $admin['trangthai'] == 1 ? 'label-info' : 'label-default' ?>"><span><?= $admin['trangthai'] == 1 ? 'Hiện' : 'Ẩn' ?></span></a>
                                                        <a href="#" class="custome-btn label <?= $admin['hoatdong'] == 1 ? 'label-info' : 'label-default' ?>"><span><?= $admin['hoatdong'] == 1 ? 'Đang online' : 'Offline' ?></span></a>
                                                    </td>
                                                    <td>
                                                        <a href="update.php?id=<?= $admin['id_quantrivien']?>" class="custome-btn btn-info btn-xs"><i class="fa fa-pencil-square"></i> Cập nhật </a>
                                                        <a href="delete.php?id=<?= $admin['id_quantrivien']?>" class="custome-btn btn-danger btn-xs delete comfirm_delete" ><i class="fa fa-trash"></i> Xoá </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif ;?>
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
