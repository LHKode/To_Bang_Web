<?php
@ob_start();
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

$admin = DB::fetchOne('tbl_quantrivien',' id_quantrivien = '.$id);



/**
 * nếu trống thì id không tồn tại
 */

if ( empty($admin))
{
    $_SESSION['error'] = '  Không có dữ liệu trong DB   ';
    header("Location: ".base_url().'/admin/modules/admins');exit();
}

if( $_SESSION['admin_level'] <= $admin['capdo'])
{
    $_SESSION['error'] = ' Bạn không có quyền chỉnh sửa thông tin của người có cùng cấp độ hoạc lớn hơn cấp độ của bạn ';
    header("Location: ".base_url().'/admin/modules/admins');exit();
}



$active = $admin['trangthai'] == 1 ? 0 : 1;
$update = DB::update("tbl_quantrivien",array('trangthai' => $active) ,array("id_quantrivien" => $id));

$update && $update > 0 ? $_SESSION['success'] = ' Cập nhật thành công  ' : $_SESSION['error'] = ' Cập nhật thất bại  ';

header("Location: ".base_url().'/admin/modules/admins');exit();
?>