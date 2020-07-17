<?php
    require_once __DIR__ .'/../../autoload.php';
    $id = (int)Input::get('id');
    try{

        $orders = DB::query('tbl_chitietdonhang','*',' and donhang_id = '.$id);

        foreach($orders as $order)
        {
            DB::delete('tbl_chitietdonhang','donhang_id = '.$id);
        }

        $iddelete = DB::delete('tbl_donhang','id_donhang = '.$id);
        // 
        ( $iddelete ) ? $_SESSION['success'] = ' Xoá Thành Công ' : $_SESSION['error'] = ' Xoá Thất Bại  ';

        // xoa tiep o chi tiet don hang 

        header("Location: ".baseServerName().'/admin/modules/transactions');exit();
    }catch (\Exception $e)
    {
        dd(" Xoá đơn hàng thất bại  " . $e->getMessage());
    }