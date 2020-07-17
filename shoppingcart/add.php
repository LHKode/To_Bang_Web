<?php 
	require_once __DIR__. '/../autoload.php';
	
	// B1 =. Lay id cua sp can them vao gio hang
    $qty = 1;
    if( isset($_GET['qty']))
    {
        $qty = $_GET['qty'];
    }

    if( isset($_GET['idProduct']))
    {
        $id = $_GET['idProduct'];
    }
    // kiem tra xem số lượng sản phẩm mua
    // có lớn hơn số lượng sản phẩm trong giỏ hàng không
    // nếu lơn hơn thì thông báo 
    // bé hơn thì tiếp tục mua hàng
    $product = DB::fetchOne("tbl_sanpham"," id_sanpham = ".(int)$id);

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
            if ($_SESSION['cart'][$id]['qty'] + $qty > $product['soluong'])
            {
                $data = ['qty'=>0, 'status'=>0];
                die(json_encode($data));
            }
            $_SESSION['cart'][$id]['qty'] += $qty;
        }
        else 
        {
            $_SESSION['cart'][$id]['qty'] = isset($qty) ? $qty : 1;
        }
        
        $_SESSION['cart'][$id]['id'] = $product['id_sanpham'];
        $_SESSION['cart'][$id]['name'] = $product['tensanpham'];
        $_SESSION['cart'][$id]['img']   = $product['anhsanpham'];
        $_SESSION['cart'][$id]['price'] = money($product['giasanpham'],$product['giamgia']);
        
        $qty = 0;
        foreach($_SESSION['cart'] as $item) {
            $qty = $qty + $item['qty'];
        }
        $data = ['qty'=>$qty, 'status'=>1];

        die(json_encode($data));
    }
    else 
    {
        $_SESSION['cart'][$id]['id'] = $product['id_sanpham'];
        $_SESSION['cart'][$id]['qty']   = 1;
        $_SESSION['cart'][$id]['name'] = $product['tensanpham'];
        $_SESSION['cart'][$id]['img']   = $product['anhsanpham'];
        $_SESSION['cart'][$id]['price'] = money($product['giasanpham'],$product['giamgia']);
        
        $qty = 0;
        foreach($_SESSION['cart'] as $item) {
            $qty = $qty + $item['qty'];
        }
        $data = ['qty'=>$qty, 'status'=>1];
        die(json_encode($data));
    }

	