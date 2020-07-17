<?php
    $modules = 'transactions';
    $title_global = ' Danh sách đơn hàng ';
    require_once __DIR__ .'/../../autoload.php';

    $sql = "SELECT * FROM tbl_donhang  
        LEFT JOIN tbl_khachhang ON tbl_khachhang.id_khachhang = tbl_donhang.khachhang_id
    WHERE 1 ";
    $filter = [];

    $keyword = Input::get('keyword');
    if ( $keyword ) {
        $sql .= ' AND tenkhachhang LIKE \'%'.$keyword.'%\'' ;
        $filter['keyword'] = $keyword;
    }

    if ( Input::get('email') ) {
        $sql .= ' AND email LIKE \'%'.Input::get('email').'%\'' ;
        $filter['email'] = Input::get('email');
    }
    if ( Input::get('madonhang') ) {
        $sql .= ' AND madonhang LIKE \'%'.Input::get('madonhang').'%\'' ;
        $filter['madonhang'] = Input::get('madonhang');
    }

    if ( Input::get('trangthai') ) {
        $trangthai = Input::get('trangthai') == 2 ? 0 : 1;
        $sql .= ' AND trangthai = '. $trangthai ;
        $filter['trangthai'] = Input::get('trangthai');
    }

    if ( Input::get('date') ) {
        $date_start= date_create(Input::get('date'));
        $date_start = date_format($date_start, "Y-m-d H:i:s" );
        $date_end = date_create(Input::get('date'). "23:59:59");
        $date_end = date_format($date_end, "Y-m-d H:i:s" );
        $sql .= ' AND tbl_donhang.ngaytao  BETWEEN "'.$date_start.'" AND "'.$date_end.'"';
        $filter['ngaytao'] = Input::get('date');
    }

    if (Input::get('create'))
    {
        $create = Input::get('create');
        $time_create = get_start_and_time($create);

        $sql .= " AND tbl_donhang.ngaytao >= '".$time_create['start']."' AND tbl_donhang.ngaytao <= '".$time_create['end']."' ";
        $filter['create'] = Input::get('create');
    }

    if (Input::get('pay'))
    {
        $pay = Input::get('pay');
        $pay_create = get_start_and_time($pay);

        $sql .= " AND trangthai = 1 AND  tbl_donhang.ngaythanhtoan >= '".$pay_create['start']."' AND tbl_donhang.ngaythanhtoan <= '".$pay_create['end']."' ";
        $filter['pay'] = Input::get('pay');
    }

    if ( Input::get('id') ) {
        $sql .= ' AND id_donhang = '.Input::get('id') ;
        $filter['id'] = Input::get('id');
    }

    if ( Input::get('id_kh') ) {
        $sql .= ' AND tbl_khachhang.id_khachhang = '.Input::get('id_kh') ;
        $filter['id_kh'] = Input::get('id_kh');
    }


    $transactions = Pagination::pagination('tbl_donhang',$sql,'page',9);
    $_SESSION['all_bill'] = $transactions;
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
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <style type="text/css">
            #reportrange { position: relative; }
            #reportrange:before {
                content : "\f073";
                position: absolute;
                font-family: FontAwesome;
                top: 50%;
                transform: translateY(-50%);
            }
            /*<i class="fa fa-calendar"></i>&nbsp;*/
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
                        <li><a href="#"> Đơn hàng  </a></li>
                        <li class="active"> Danh sách</li>
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
                                <div class="form-group col-sm-3">
                                    <input type="text" class="form-control" name="keyword" placeholder=" Tên khách hàng  " value="<?= Input::get('keyword') ? Input::get('keyword') : '' ?>">
                                </div>
                                 <div class="form-group col-sm-3">
                                    <input type="text" class="form-control" name="email" placeholder=" Email khách hàng  " value="<?= Input::get('email') ? Input::get('email') : '' ?>">
                                </div>
                                <div class="form-group col-sm-2">
                                    <input type="number" class="form-control" name="id_kh" placeholder="Mã KH  " value="<?= Input::get('id_kh') ? Input::get('id_kh') : '' ?>">
                                </div>

                                <div class="form-group col-sm-2">
                                    <input type="text" class="form-control" name="madonhang" placeholder="Mã Đơn Hàng  " value="<?= Input::get('madonhang') ? Input::get('madonhang') : '' ?>">
                                </div>

                                <div class="form-group col-sm-1">
                                    <input type="number" name="id" class="form-control" value="<?= Input::get('id') ?>" placeholder="ID">
                                </div>
                                <div class="form-group col-sm-2">
                                    <select class="form-control" name="trangthai">
                                        <option>-- Trạng thai --</option>
                                        <option value="1" <?= Input::get('trangthai') && Input::get('trangthai') == 1? "selected = 'selected'" : "" ?>>Đã thanh toán</option>
                                        <option value="2" <?= Input::get('trangthai') && Input::get('trangthai') == 2? "selected = 'selected'" : "" ?>>Chưa thanh toán</option>
                                    </select>
                                </div>
                                <div id="reportrange" style="background: #fff; cursor: pointer;border-radius: 2px" class="form-group col-sm-3">
                                    <input type="text" style="text-indent: 13px;"  value="<?= Input::get('create') ? Input::get('create') : '' ?>" name="create" autocomplete="off" placeholder="Ngày mua" class="form-control w-300 time_processing">
                                </div>
                                <div id="reportrange" style="background: #fff; cursor: pointer;border-radius: 2px" class="form-group col-sm-3">
                                    <input type="text" style="text-indent: 13px;"  value="<?= Input::get('pay') ? Input::get('pay') : '' ?>" name="pay" autocomplete="off" placeholder="Ngày thanh toán" class="form-control w-300 time_processing">
                                </div>
                                <div class="form-group col-sm-3">
                                    <input type="submit" value="Tìm Kiếm" class="btn  btn-success">
                                    <a  href="index.php" class="btn  btn-danger"> Làm mới<a/>
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-body">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Pay</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        <?php foreach ($transactions as $key => $item) :?>
                                            <tr>
                                                <td> <?= $item['id_donhang'] ?></td>
                                                <td><?= $item['tenkhachhang'] ?></td>
                                                <td><?= $item['email'] ?></td>
                                                <td><?= $item['sodienthoai'] ?></td>
                                                <td><?= $item['diachi'] ?></td>
                                                <td><?= format_price($item['tongtien']) ?> đ</td>
                                                <td>
                                                    <a href="status.php?id=<?= $item['id_donhang'] ?>" class="custome-btn label <?= $item['trangthai'] == 1 ? 'label-info' : 'label-default' ?>"><span> <?= $item['trangthai'] == 1 ? ' Đã thanh toán ' : ' Chưa thanh toán ' ?></span></a>
                                                </td>
                                                <td>
                                                    <a href="javascript:;void(0)" class="custome-btn btn-info btn-xs item-order" data-id=<?= $item['id_donhang' ] ?>><i class="fa fa-pencil-square"></i> Xem chi tiết </a>
                                                    <a href="delete.php?id=<?= $item['id_donhang']?>" class="custome-btn btn-danger btn-xs delete" ><i class="fa fa-trash"></i> Huỷ đơn hàng  </a>
                                                    <a href="invoice_details.php?id=<?= $item['id_donhang']?>" class="custome-btn btn-info btn-xs " ><i class="fa fa-fw fa-barcode"></i> Hóa đơn  </a>
                                                     <a href="path.php?id=<?= $item['id_donhang']?>" class="custome-btn btn-info btn-xs " ><i class="fa fa-fw fa-road"></i> Chỉ đường </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ; ?>
                                        
                                    
                                    </tbody>
                                </table>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                     <a  href="all_bill.php" class="btn  btn-info " style="float: right;"><i class="fa fa-fw fa-print"></i> All hóa đơn<a/>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="custome-paginate">
                                <div class="pull-left">
                                    <p>Trang 1 - Số bản ghi hiển thị 20 - Tổng số trang 1 - Tổng số bản ghi 3</p>
                                </div>
                                <div class="pull-right"></div>
                            </div>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->
                </section>
            </div>
            <div class="modal fade" id="modal-vieworder">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"> Chi tiết đơn hàng </h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover" id="vieworder-content">
                                <tbody>
                                    <tr class="bg-tr">
                                        <th>Tên sản phẩm</th>
                                        <th> Hình ảnh </th>
                                        <th class="text-center">Giá </th>
                                        <th>Số Lượng</th>
                                        <th>Thành Tiền</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </tbody>
                                <tbody id="order-content">
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =======================END CONTENT======================== -->
            <?php require_once __DIR__ .'/../../layouts/inc_footer.php'; ?>
        </div>
        <?php require_once __DIR__ .'/../../layouts/inc_js.php'; ?>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });

            $('#reportrange input').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                },
                ranges: {
                    'Hôm nay': [moment(), moment()],
                    'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 ngày trước': [moment().subtract(6, 'days'), moment()],
                    '30 ngày trước': [moment().subtract(29, 'days'), moment()],
                    'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                    'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            })
                .on('apply.daterangepicker', function (ev, picker) {
                    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
                })
                .on('cancel.daterangepicker', function (ev, picker) {
                    $(this).val('');
                });

        </script>