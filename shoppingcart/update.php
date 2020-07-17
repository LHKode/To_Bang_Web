<?php 
	require_once __DIR__. '/../autoload.php';
	
	// B1 =. Lay id cua sp can them vao gio hang

    if( isset($_POST['qty']))
    {
        $qty = $_POST['qty'];
    }

    if( isset($_POST['id']))
    {
        $id = $_POST['id'];
    }
    $product = DB::fetchOne("tbl_sanpham",'id_sanpham = '.(int)$id);
    
    if( $product['soluong'] < $qty )
    {
        echo 0;die;
    }
    
	// B2 
    // Ktra xem da ton tai session['cart'] 


	if(isset($_SESSION['cart']))
    {
        /// da ton tai 
        if(isset($_SESSION['cart'][$id]))
        {
            if( $product['soluong'] < $qty )
            {
                echo 0;die;
            }
            $_SESSION['cart'][$id]['qty'] = $qty;
            $total = 0 ;
            $qty = 0;
            foreach($_SESSION['cart'] as $key => $item)
            {
                $total += $item['qty'] * $item['price'];

                if ($key == $id)
                {
                    $total_item = $item['qty'] * $item['price'];
                }

                $qty = $qty + $item['qty'];
            }

            echo json_encode([
                'qty'        => $qty,
                'code'       => 1,
                'total'      => format_price($total) .'đ',
                'total_item' => format_price($total_item).'đ'
            ]);die;
        }
    }
    echo 0;die;