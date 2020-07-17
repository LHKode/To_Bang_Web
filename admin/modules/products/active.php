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

    $editProduct = DB::fetchOne('tbl_sanpham',' id_sanpham = '.$id);

    /**
     * nếu trống thì id không tồn tại
     */

    if ( empty($editProduct))
    {
        $_SESSION['error'] = '  Không có dữ liệu trong DB   ';
        header("Location: ".base_url().'/admin/modules/products');exit();
    }



    $active = $editProduct['trangthai'] == 1 ? 0 : 1;
    $update = DB::update("tbl_sanpham",array('trangthai' => $active) ,array("id_sanpham" => $id));

    $update && $update > 0 ? $_SESSION['success'] = ' Cập nhật thành công  ' : $_SESSION['error'] = ' Cập nhật thất bại  ';

    header("Location: ".base_url().'/admin/modules/products');exit();
?>