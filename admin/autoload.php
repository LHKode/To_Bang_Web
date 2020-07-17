<?php
@ob_start();
session_start();
// goi file Function
require_once __DIR__ .'/../vendor/init.php';

// goi file Config
require_once __DIR__ .'/../config.php';

// check login admin 
if ( ! isset($_SESSION['admin_name']))
{
	header("Location: ".base_url().'/authenticate/login.php');exit();
}

//if (isset($_SESSION['cate']))
//{
//    unset($_SESSION['cate']);
//}
//
//
//if (isset($_SESSION['hinhanh']))
//{
//    unset($_SESSION['hinhanh']);
//}

// phan quyen

$config_url = [
    1 => [
        base_url().'/admin/' => 'home',
        base_url().'/admin/modules/admins/profile.php' => 'home',
        base_url().'/admin/modules/categories/'    => 'Danh sách danh mục',
        base_url().'/admin/modules/categories/add.php' => 'Thêm mới danh mục',
        base_url().'/admin/modules/categories/update.php' => 'Câp nhật danh mục',
        base_url().'/admin/modules/products/'    => 'Danh sách danh mục',
        base_url().'/admin/modules/products/add.php' => 'Thêm mới danh mục',
        base_url().'/admin/modules/products/update.php' => 'Câp nhật danh mục',
        base_url().'/admin/modules/posts/'    => 'Danh sách danh mục',
        base_url().'/admin/modules/posts/add.php' => 'Thêm mới danh mục',
        base_url().'/admin/modules/posts/update.php' => 'Câp nhật danh mục',
    ],
    2 => [
        'full' => 'Có đủ các quyền hạn '
    ],
    3 => [
        'full' => 'Có đủ các quyền hạn '
    ]
];

$capdo_quyenhan = $_SESSION['admin_level'];
$list_quyen = $config_url[$capdo_quyenhan];

if (count($list_quyen)  > 1)
{
    $url_hientai = curPageURL();
    if (!array_key_exists($url_hientai,$list_quyen))
    {
        $_SESSION['error'] = 'XIN LỖI ! BẠN KHÔNG CÓ QUYỀN TRUY CẬP VÀO TRANG NÀY';
        header("Location: ".base_url().'/admin');exit();
    }
}