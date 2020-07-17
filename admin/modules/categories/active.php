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

    $EditCategory = DB::fetchOne('tbl_danhmuc',' id_danhmuc = '.$id);

    /**
     * nếu trống thì id không tồn tại
     */

    if ( empty($EditCategory))
    {
        $_SESSION['error'] = '  Không có dữ liệu trong DB   ';
        header("Location: ".base_url().'/admin/modules/categories');exit();
    }



    $active = $EditCategory['trangthai'] == 1 ? 0 : 1;
    $update = DB::update("tbl_danhmuc",array('trangthai' => $active) ,array("id_danhmuc" => $id));

    $update && $update > 0 ? $_SESSION['success'] = ' Cập nhật thành công  ' : $_SESSION['error'] = ' Cập nhật thất bại  ';

    header("Location: ".base_url().'/admin/modules/categories');exit();
?>