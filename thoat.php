<?php
    require_once __DIR__. '/autoload.php';
    unset($_SESSION['users']);
    header("Location: ".baseServerName().'/index.php');
?>