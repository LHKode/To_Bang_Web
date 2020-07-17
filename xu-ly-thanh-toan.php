<?php
    require_once __DIR__. '/autoload.php';
?>
<?php if(isset($_SESSION['alert'])): ?>
	<script> alert('Chúng tôi đã tạo tài khoản và tự động đăng nhập cho bạn để tiện trong quá trình mua hàng . Mật khẩu mặc định của bạn là 123456')</script>
<?php endif ?>

<?php
    $db = new DB();

    if( !isset($_SESSION['cart']))
    {   $_SESSION['danger'] = ' Không tồn tại giỏ hàng ';
        header("Location: ".base_url().'/');exit();
    }   
    $shoppingCart = $_SESSION['cart'];
   
    if(isset($_SESSION['users']['id_khachhang'])) {

		$data['madonhang']    = rand_string(10);
		$data['tongtien']     = isset($_SESSION['users']['tongtien']) ? $_SESSION['users']['tongtien'] : $_POST['tongtien'];
		$data['khachhang_id'] = $_SESSION['users']['id_khachhang'];
		$data['ghichu']       = isset($_SESSION['users']['ghichu']) ? $_SESSION['users']['ghichu'] : $_POST['ghichu'];
		$data['vanchuyen']    = isset($_SESSION['users']['vanchuyen']) ? $_SESSION['users']['vanchuyen'] : $_POST['vanchuyen'];

		if($db->insert('tbl_donhang', $data)) {
			$_SESSION['madonhang'] = $data['madonhang'];
    		$dataDon = DB::fetchOne('tbl_donhang', ' madonhang = "'.$data['madonhang'].'"');
    		
    		foreach($shoppingCart as $key => $cart) {
				$dataChiTiet['donhang_id'] = $dataDon['id_donhang'];
				$dataChiTiet['sanpham_id'] = $cart['id'];
				$dataChiTiet['soluong']    = $cart['qty'];
				$dataChiTiet['giasanpham'] = $cart['price'];
                $db->insert('tbl_chitietdonhang', $dataChiTiet);
            }
            $title ="Cám ơn bạn đã đặt hàng";
            $content = "Đơn hàng của bạn đã được mua thành công. Chúng tôi sẽ liên hệ giao hàng cho bạn trong thời gian sớm nhất. Mã đơn hàng của bạn là : <b>".$data['madonhang']."</b>";
            $mTo = $_SESSION['users']['email'];
            $nTo = $_SESSION['users']['tenkhachhang'];
            sendMail($title, $content, $nTo, $mTo, $diachicc='');
            unset($_SESSION['cart']);
            unset($_SESSION['users']['tongtien']);
			redirectUrl('/chi-tiet-don-hang.php');
		}

    } else {

    	$sql = "SELECT * FROM tbl_khachhang WHERE email = '".$_POST['email']."'";
		$dataUser = $db->fetchsql($sql);
		if(empty($dataUser)) {
			$data['tenkhachhang'] = $_POST['tenkhachhang'];
			$data['email'] = $_POST['email'];
			$data['sodienthoai'] = $_POST['sodienthoai'];
			$data['diachi'] = $_POST['diachi'];
			$data['matkhau'] = md5('123456');
			$data['ghichu'] = $_POST['ghichu'];

			$db->insert('tbl_khachhang', $data);
			$_SESSION['alert'] = " Chúng tôi đã tạo tài khoản cho bạn để mua hàng . Mật khẩu của bạn là 123456";
			$sql = "SELECT * FROM tbl_khachhang WHERE email = '".$_POST['email']."'";
			$dataUser = $db->fetchsql($sql);
			$_SESSION['users'] = $dataUser[0];
			$_SESSION['users']['tongtien'] = $_POST['tongtien'];
			$_SESSION['users']['vanchuyen'] = $_POST['vanchuyen'];
			redirectUrl('/xu-ly-thanh-toan.php');

		} else {

			$_SESSION['success']      = "Vui lòng đăng nhập để mua hàng.";
			redirectUrl('/dang-nhap.php');
		}

    }
   
?>
