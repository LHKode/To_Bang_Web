<?php
require_once __DIR__ .'/../../autoload.php';
$id = (int)Input::get('id');
try{
    $iddelete = DB::delete('tbl_danhmuc',' id_danhmuc = '.$id);
    //
    ( $iddelete ) ? $_SESSION['success'] = ' Xoá Thành Công ' : $_SESSION['error'] = ' Xoá Thất Bại  ';
    header("Location: ".base_url().'/admin/modules/categories');exit();
}catch (\Exception $e)
{
    dd(" Lỗi Xoá Danh Mục  " . $e->getMessage());
}
