<?php
    $modules = 'products';
    $title_global = 'Danh Sách Sản Phẩm ';
    require_once __DIR__ .'/../../autoload.php';

    $sql = "SELECT tbl_sanpham.* , tbl_danhmuc.tendanhmuc FROM tbl_sanpham 
        LEFT JOIN tbl_danhmuc ON tbl_danhmuc.id_danhmuc = tbl_sanpham.danhmuc_id
        WHERE 1
    ";

    $filter = [];
    $keyword = Input::get('keyword');
    if ( $keyword ) {
        $sql .= ' AND tensanpham LIKE \'%'.$keyword.'%\'' ;
        $filter['keyword'] = $keyword;
    }

    if ( Input::get('category') ) {
        $sql .= ' AND tbl_sanpham.danhmuc_id = '.Input::get('category') ;
        $filter['category'] = Input::get('category');
    }

    if ( Input::get('id') ) {
        $sql .= ' AND id_sanpham = '.(int)Input::get('id') ;
        $filter['id'] = Input::get('id');
    }
    if ( Input::get('price') ) {
        $key = Input::get('price');
        if(array_key_exists($key,$arrayPrice))
        {
            if(count($arrayPrice[$key]) == 2)
            {
                $sql .= ' AND giasanpham BETWEEN ' .$arrayPrice[$key][0] . ' AND ' . $arrayPrice[$key][1] . ' ';
            }else 
            {
                $sql .= ' AND giasanpham > ' .$arrayPrice[$key] . ' ';
            }
            $filter['price'] = $key;
        }
        
    }



    $products = Pagination::pagination('tbl_sanpham',$sql,'page',9);
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
        <style>
            
        </style>
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
                        <li class="active"> Danh sách sản phẩm </li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Bộ Lọc Tìm Kiếm </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <form action="">
                                <div class="form-group col-sm-5">
                                    <input type="text" class="form-control" name="keyword" placeholder=" Tên sản phẩm cần tìm " value="<?= Input::get('keyword') ? Input::get('keyword') : '' ?>">
                                </div>
                                <div class="form-group col-sm-3">
                                    <select name="category" id="" class="form-control">
                                        <option value="">-- Lọc theo danh mục  --</option>
                                        <?php foreach($categorySort as $cate) :?>
                                            <option value="<?= $cate['id_danhmuc'] ?>" <?= Input::get('category') && Input::get('category') == $cate['id_danhmuc'] ? "selected='selected'" : "" ?>> <?= $cate['tendanhmuc'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <select name="price" id="" class="form-control">
                                        <option value="">-- Lọc theo giá   --</option>
                                        <option value="1-3" <?= Input::get('price') == "1-3" ? "selected='selected'" : '' ?>> 1 đến 3tr đồng </option>
                                        <option value="3-5" <?= Input::get('price') == "3-5" ? "selected='selected'" : '' ?>> 3 đến 5tr đồng </option>
                                        <option value="5-7" <?= Input::get('price') == "5-7" ? "selected='selected'" : '' ?>> 5 đến 7tr đồng </option>
                                        <option value="7-10" <?= Input::get('price') == "7-10" ? "selected='selected'" : '' ?>> 7 đến 10tr đồng </option>
                                        <option value="10-15" <?= Input::get('price') == "10-15" ? "selected='selected'" : '' ?>> 10 đến 15tr đồng </option>
                                        <option value="15-20" <?= Input::get('price') == "15-20" ? "selected='selected'" : '' ?>> 15 đến 20tr đồng </option>
                                        <option value="20" <?= Input::get('price') == "20" ? "selected='selected'" : '' ?>> trên 20tr  </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <input type="number" name="id" class="form-control" value="<?= Input::get('id') ?>" placeholder="ID sản phẩm">
                                </div>
                                <div class="form-group col-sm-3">
                                    <input type="submit" value="Tìm Kiếm" class="btn btn-xs btn-success">
                                    <a  href="index.php" class="btn btn-xs btn-danger"> Làm mới<a/>
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header with-border">
                            <a href="add.php" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Thêm mới </a>
                            <span> Kết quả tìm kiếm : </span>
                        </div>
                        <div class="box-body">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover border">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th style="width: 30%">Tên sản phẩm</th>
                                            <th>Hình Ảnh</th>
                                            <th>Thông tin</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php foreach($products as $pro) :?>
                                            <tr class='<?= $pro['soluong'] <= 5 ? "bg-danger-nhat" : "" ?> item_product' data-id="<?= $pro['id_sanpham'] ?>"  data-toggle="tooltip" data-placement="top" title="Click vào đây để xem chi tiết sản phẩm !">
                                                <td><?= $pro['id_sanpham'] ?></td>
                                                <td><?= $pro['tensanpham'] ?></td>
                                                <td>
                                                    <img src="<?= base_url('/public/uploads/') ?><?= $pro['anhsanpham'] ?>" alt="<?= $pro['anhsanpham'] ?>" style="width:50px;height:50px;" class="img img-responsive">
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Danh Mục  <span class="label label-success"><?= $pro['tendanhmuc'] ?></span></li>
                                                        <li>Số Lượng  <b><?= $pro['soluong'] ?></b> | Sale : <b><?= $pro['giamgia'] ?> (%) </b></li>
                                                        <li>Giá : <b> <?= format_price($pro['giasanpham']) ?> đ </b> <?= $pro['giamgia'] != 0 ? " | <b>".format_price($pro['giasanpham'],$pro['giamgia'])." đ</b>" : '' ?></li>
                                                    </ul>

                                                </td>
                                                <td><a href="active.php?id=<?= $pro['id_sanpham'] ?>" class="custome-btn label <?= $pro['trangthai'] == 1 ? 'label-info' : 'label-default' ?>"><span><?= $pro['trangthai'] == 1 ? 'Hiện' : 'Ẩn' ?></span></a></td>
                                                <td>
                                                    <a href="update.php?id=<?= $pro['id_sanpham'] ?>" class="custome-btn btn-info btn-xs"><i class="fa fa-pencil-square"></i> Cập nhật </a>
                                                    <a href="delete.php?id=<?= $pro['id_sanpham'] ?>" class="custome-btn btn-danger btn-xs delete comfirm_delete" ><i class="fa fa-trash"></i> Xoá </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="custome-paginate">
                                <div class="pull-left">
                                    <p>Trang 1 - Số bản ghi hiển thị 20 - Tổng số trang 1 - Tổng số bản ghi 3</p>
                                </div>
                                <div class="pull-right">
                                    <?php echo Pagination::getListpage($filter) ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->
                </section>
            </div>
            <!-- =======================END CONTENT======================== -->
            <?php require_once __DIR__ .'/../../layouts/inc_footer.php'; ?>
        </div>
        <?php require_once __DIR__ .'/../../layouts/inc_js.php'; ?>


        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });

            $(function () {
                $(".item_product").click(function(){
                    let $that = $(this);

                    $(".item_product_content").remove();
                    if ($that.hasClass('active'))
                    {
                        $that.removeClass('active');
                        return false;
                    }else{
                        $that.addClass("active")
                    }

                    let id = $that.attr("data-id");

                    $.ajax({
                        url: location.origin + '/admin/modules/products/ajax.php',
                        type:'POST',
                        data:{'id':id},
                        async:true,
                        success:function(data)
                        {
                            $that.after(data);
                        }
                    })
                });
            })
        </script>