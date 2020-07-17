<?php
    require_once __DIR__. '/../autoload.php';

    DB::update('tbl_quantrivien',array('hoatdong' => 0)," id_quantrivien =  ".(int)$_SESSION['admin_id']);

    unset($_SESSION['admin_name']);
    unset($_SESSION['admin_level']);
    unset($_SESSION['admin_id']);

    $_SESSION['success'] = ' Đăng xuất thành công ! Cảm ơn bạn đã quan tâm tới website ';
    header("Location: ".baseServerName().'/authenticate/login.php');exit();
    
