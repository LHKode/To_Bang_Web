<?php
$modules = 'contact';
$title_global = 'Danh sách liên hệ';
require_once __DIR__ .'/../../autoload.php';


$contact = Pagination::pagination('tbl_lienhe','','page',9);
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
                <li><a href="#"> Khách hàng </a></li>
                <li class="active"> Danh sách</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
              
                <div class="box-body">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Thao tác</th>
                            </tr>
                            <?php if($contact) :?>
                                <?php foreach ($contact as $admin) :?>
                                    <tr>
                                        <td><?= $admin['id_lienhe'] ?></td>
                                        <td><?= $admin['hoten'] ?></td>
                                        <td><?= $admin['email'] ?></td>
                                        <td><?= $admin['tieude'] ?></td>
                                        <td><?= $admin['noidung'] ?></td>
                                        <td>
                                            <a href="delete.php?id=<?= $admin['id_lienhe']?>" class="custome-btn btn-danger btn-xs delete comfirm_delete" ><i class="fa fa-trash"></i> Xoá </a>
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
