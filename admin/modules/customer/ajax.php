<?php
/**
 * gọi file autoload
 */

    require_once __DIR__ .'/../../autoload.php';

    /**
     *  lấy id url
     */
    $id = (int)Input::get('id');

    /**
     * lấy id cần  sửa
     * kiểm tra xem có tồn tại trong csdl không
     */


    $sql = "SELECT tbl_donhang.*, tbl_khachhang.* FROM tbl_donhang  
        LEFT JOIN tbl_khachhang ON tbl_khachhang.id_khachhang = tbl_donhang.khachhang_id  WHERE 1 and khachhang_id =  ".$id;
    $transaction = DB::fetchsql($sql);

?>


<?php if($transaction) :?>
<td colspan="6" style="padding: 20px" class="item_product_content">
    <div class="row" class="" style="background: white;">
        <table class="table table-bordered" style="width: 100%" border="1">
            <tr>
                <td>ID</td>
                <td>Tổng tiền</td>
                <td>Ngày mua</td>
                <td>Trạng thái</td>
            </tr>
        <?php foreach($transaction as $item) :?>
            <tr>
                <td><?= $item['id_donhang'] ?></td>
                <td><?= formatPrice($item['tongtien']) ?> đ</td>
                <td><?= $item['ngaytao'] ?> </td>
                <td>
                    <a href="#" class="custome-btn label <?= $item['trangthai'] == 1 ? 'label-info' : 'label-default' ?>"><span> <?= $item['trangthai'] == 1 ? ' Đã thanh toán ' : ' Chưa thanh toán ' ?></span></a>
                </td>
            </tr>
        <?php endforeach ;?>
        </table>
    </div>
</td>
<?php endif ; ?>
