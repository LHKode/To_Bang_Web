<?php 
	require_once __DIR__ .'/../../autoload.php';
	$id = $_GET['id'];

    $id = intval($id);

	$sanpham = DB::fetchOne('tbl_sanpham', ' id_sanpham = "'.$id.'"');

	if(empty($sanpham)) {
		redirectUrl('/admin/modules/warehouses');
	}

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
    				<h1>Phiếu Nhập Kho </h1>
    				<p>Số phiếu : 1231234 </p>
    			</div>
    			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
    				<p><b>Mã số : 01 - VT</b></p>
    			</div>
    		</div> 
    		<div class="row">
    			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    					<table class="table table-hover">
    						
    						<tbody>
    							<tr>
    								<td>Họ và tên người nhập:</td>
    								<td><?= $_SESSION['admin_name'] ?></td>
    							</tr>
    							<tr>
    								<td>Theo hóa đơn số</td>
    								<td>1231234</td>
    							</tr>
    							<tr>
    								<td>Ngày nhập </td>
    								<td><?= $sanpham['ngaytao'] ?></td>
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
    				</thead>
    				<tbody>
    					<tr>
    						<td>1</td>
    						<td><?= $sanpham['tensanpham'] ?></td>
    						<td><?= $sanpham['masanpham'] ?></td>
    						<td><?= $sanpham['soluong'] ?></td>
    						<td><?= format_price($sanpham['giasanpham']) ?>đ</td>
    						<td><?= format_price($sanpham['giasanpham'] * $sanpham['soluong'] ) ?>đ</td>
    					</tr>
    					<tr>
    						<td>1</td>
    						<td colspan="3" class="text-center">Cộng</td>
    						
    						<td colspan="2"> <?= format_price($sanpham['giasanpham'] * $sanpham['soluong'] ) ?>đ</td>
    					</tr>
    				</tbody>
    			</table>
    		</div>
    		<div class="row">
    			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
    				<p><b>Người nhập kho</b></p>
    				<p><i>(Ký , Họ Tên) </i></p>
    			</div>
    			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
    				<p><b>Người thủ kho</b></p>
    				<p><i>(Ký , Họ Tên) </i></p>
    			</div>
    			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
    				<p><b>Người kế toán trưởng</b></p>
    				<p><i>(Ký , Họ Tên) </i></p>
    			</div>
    			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
    				<p><b>Giám đốc</b></p>
    				<p><i>(Ký , Họ Tên) </i></p>
    			</div>
    		</div>
    	</div>
    </body>
</html>