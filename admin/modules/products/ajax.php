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

    $product = DB::fetchOne('tbl_sanpham',' id_sanpham = '.$id);

//    /**
//     * nếu trống thì id không tồn tại
//     */
//
//    if ( empty($editProduct))
//    {
//        $_SESSION['error'] = '  Không có dữ liệu trong DB   ';
//        header("Location: ".base_url().'/admin/modules/products');exit();
//    }
//


?>
<tr class='item_product_content' style="background: white">
    <td colspan="6" style="padding: 20px">
        <h4>CHI TIẾT SẢN PHẨM </h4>
        <div style="overflow: hidden;width: 100%;height: 100%">
            <?= $product['noidung'] ?>
        </div>

    </td>
</tr>
