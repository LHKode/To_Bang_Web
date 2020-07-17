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
    
    $transaction = DB::fetchOne('tbl_donhang',' id_donhang = '.$id);

    /**
     * nếu trống thì id không tồn tại
     */

    if ( empty($transaction))
    {
        $_SESSION['error'] = '  Không có dữ liệu trong DB   ';
        header("Location: ".baseServerName().'/admin/modules/transactions');exit();
    }

    $ngaythanhtoan = date('Y-m-d');
    $hot = $transaction['trangthai'] == 1 ? 0 : 1;
    $update = DB::update("tbl_donhang",array('trangthai' => $hot,'ngaythanhtoan' => $ngaythanhtoan) ,array("id_donhang" => $id));

    if ( $update && $update > 0 )
    {
        $orders = DB::query('tbl_chitietdonhang','*',' and donhang_id = '. $id);

        if ( $orders )
        {
            foreach ($orders as $key => $item) {
                $product = DB::fetchOne('tbl_sanpham','id_sanpham = '.(int)$item['sanpham_id']);
                if( $product )
                {
                    //  trừ đi số lượng 
                    $pay    = ($hot  == 1) ? $product['soluong'] - $item['soluong'] : $product['soluong'] + $item['soluong'];
                    $upPay  = DB::update("tbl_sanpham",array('soluong' => $pay) ,array("id_sanpham" => (int)$item['sanpham_id']));
                }
            }
        }
        $_SESSION['success'] = ' Cập nhật thành công ';
    }else 
    {
        $_SESSION['error'] = ' Cập nhật thất bại  ';
    }
    
    header("Location: ".baseServerName().'/admin/modules/transactions');exit();
 ?>