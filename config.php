<?php 
// duong dan toi module trong admin
define("MODULES", $_SERVER['DOCUMENT_ROOT'] ."/admin/modules/");

// duong dan toi  layouts 
define("MAIN", $_SERVER['DOCUMENT_ROOT'] ."/admin/layouts/main/");

// duong dan upload 
define("UPLOADS", $_SERVER['DOCUMENT_ROOT'] ."/public/uploads/");


// config database
define("LOCALHOST","localhost");
define("USER","root");
define("PASS","");
define("DATABASE","db_webbanhoa");


// Config thông tin website

define("INFO_NAME","Quốc Học");
define("INFO_CLASS","");
define("INFO_ADDRESS","");
define("INFO_PHONE","");
define("INFO_EMAIL","");

$arrayPrice = [
    '1-3' => [
        '1000000',
        '3000000'
    ],
    '3-5' =>[
        '3000000',
        '5000000'
    ],
    '5-7' =>[
        '5000000',
        '7000000'
    ],
    '7-10' => [
        '7000000',
        '10000000'
    ],
    '10-15' => [
        '10000000',
        '15000000'
    ],
    '15-20' => [
        '15000000',
        '20000000'
    ],
    '20' =>
    [
        '20000000'
    ]
];


$array_admin_level = [
    1 => 'Cộng tác viên',
    2 => 'Quản lý'
];