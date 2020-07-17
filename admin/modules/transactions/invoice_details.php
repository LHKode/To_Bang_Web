<?php 
    require_once __DIR__ .'/../../autoload.php';
    $id = $_GET['id'];

    $id = intval($id);
     $sql = "SELECT * FROM tbl_donhang  
        INNER JOIN tbl_khachhang ON tbl_khachhang.id_khachhang = tbl_donhang.khachhang_id
    WHERE   id_donhang =  ".$id;

    $info_bill = DB::fetchsql($sql);

     $sql = "SELECT  tensanpham, masanpham, tbl_chitietdonhang.soluong as soluong, tbl_chitietdonhang.giasanpham as giasanpham, tbl_donhang.trangthai FROM tbl_chitietdonhang  
        INNER JOIN tbl_sanpham ON tbl_chitietdonhang.sanpham_id = tbl_sanpham.id_sanpham INNER JOIN  tbl_donhang ON tbl_donhang.id_donhang = tbl_chitietdonhang.donhang_id
    WHERE   donhang_id =  ".$id;

    $sanpham = DB::fetchsql($sql);

    $tong = 0;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
       <?php require_once __DIR__ .'/../../layouts/inc_css.php'; ?>
        <!-- <link rel="stylesheet" href="/public/admin/css/bootstrap-tagsinput.css"> -->
    </head>
    <body>
        <div class="container" style="margin-top: 30px">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <p><b>Công Ty Cổ Phần Giải Pháp Và Đầu Tư Thanh</b></p>
                    <p><i>Thanh Trì Hà nội</i></p>
                    <p><i>0916.888.916</i></p>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
                    <h1>HÓA ĐƠN</h1>
                    <p>Mã hóa đơn : <?= $info_bill[0]['madonhang'] ?> </p>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
                    <p><b>Mã số : 01 - VT</b></p>
                </div>
            </div> 
            <div class="row" style="margin-top: 71px;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <table class="table table-hover">
                            
                            <tbody>
                                <tr>
                                    <td>Khách hàng :</td>
                                    <td><?= $info_bill[0]['tenkhachhang'] ?></td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại :</td>
                                    <td><?= $info_bill[0]['sodienthoai'] ?></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ </td>
                                    <td><?= $info_bill[0]['diachi'] ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày đặt hàng</td>
                                    <td><?= $info_bill[0]['ngaytao'] ?></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái đơn hàng :</td>
                                    <td>
                                        <?php 
                                            if($info_bill[0]['trangthai'] == 1) {
                                                echo "Đã thanh toán ";
                                            } else {
                                                echo "Chưa thanh toán";
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Mã số sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php foreach($sanpham  as $key => $item): ?>
                            <tr>
                                <td><?= $key +1  ?></td>
                                <td><?= $item['tensanpham'] ?></td>
                                <td><?= $item['masanpham'] ?></td>
                                <td><?= $item['soluong'] ?></td>
                                <td><?= format_price($item['giasanpham']) ?> đ</td>
                                <td><?= format_price($item['giasanpham'] * $item['soluong'] ) ?> đ</td>
                            </tr>
                            <?php  $tong = $tong + $item['giasanpham'] * $item['soluong']  ?>
                        <?php endforeach ?>
                        <tr>
                            <td></td>
                            <td colspan="3" class="text-center">Cộng</td> 
                            <td colspan="2"><?= format_price($tong) ?>đ</td>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                    <p><b>Người Giao Hàng</b></p>
                    <p><i>(Ký , Họ Tên) </i></p>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                    
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                    
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                    <p><b>Khách Hàng</b></p>
                    <p><i>(Ký , Họ Tên) </i></p>
                </div>
            </div>
           
        </div>
    </body>
</html>