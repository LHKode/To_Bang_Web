<?php 
	require_once __DIR__. '/../autoload.php';
	
	// B1 =. Lay id cua sp can them vao gio hang
    if( isset($_POST['id']))
    {
        $id = $_POST['id'];
    }
    
	// B2 
    // Ktra xem da ton tai session['cart'] 

    if(isset($_SESSION['cart']))
    {
        /// da ton tai 
        if(isset($_SESSION['cart'][$id]))
        {
            unset($_SESSION['cart'][$id]);

            $total = 0 ;
            if (count($_SESSION['cart']) != 0)
            {
                foreach($_SESSION['cart'] as $key => $item)
                {
                    $total += $item['qty'] * $item['price'];
                }
            }

            $qty = 0;
            foreach($_SESSION['cart'] as $item) {
                $qty = $qty + $item['qty'];
            }

            echo json_encode([
                'qty'   => $qty,
                'code'  => 1,
                'total' => format_price($total) .'đ'
            ]);die;
        }
        echo 0;die;
    }
    echo 0;die;

	