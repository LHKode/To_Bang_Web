<?php
    require_once __DIR__. '/autoload.php';
    if(isset($_SESSION['madonhang'])) {
        $chitietdon = DB::fetchOne('tbl_donhang', ' madonhang = "'.$_SESSION['madonhang'].'"');
        
        $sql = "SELECT tensanpham, tbl_chitietdonhang.giasanpham , tbl_chitietdonhang.soluong, tongtien FROM tbl_donhang INNER JOIN  tbl_chitietdonhang ON tbl_donhang.id_donhang = tbl_chitietdonhang.donhang_id INNER JOIN tbl_sanpham ON tbl_chitietdonhang.sanpham_id =  tbl_sanpham.id_sanpham WHERE madonhang = '".$_SESSION['madonhang']."'";

       $dulieudon = DB::fetchsql($sql);
       unset($_SESSION['madonhang']);
    } else {
      redirectUrl('/index.php');
    }
  
?>


<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta charset="UTF-8" />
    <title></title>
    <link href="<?php echo base_url('/public/frontend/')  ?>uploads/images/favicon.png" rel="shortcut icon" type="image/x-icon" />
   
      
   
    <?php require_once('layouts/inc_head.php'); ?>
</head>

    <body ng-app="appMain" style="" class="home option2">
        <div id="fb-root"></div>
        <div class="wrapper ">
             <!--  header -->
            <?php require_once('layouts/inc_header.php'); ?>
            <!--  end header -->
            <!--  header -->
            <?php require_once('layouts/inc_menu_tog.php'); ?>
            <!--  end header -->
            
            <div class="main">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="breadcrumb clearfix">
                           <ul>
                              <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                                 <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                              </li>
                              <li class="icon-li"><strong>Hoàn tất</strong> </li>
                           </ul>
                        </div>
                       
                        <div class="payment-end">
                           <div class="">
                              <?php if(isset($_SESSION['alert'])): ?>
                              <div class="alert alert-success fade in">
                                 <i class="fa-fw fa fa-check"></i>
                                 <strong>Success! </strong>
                                 <span>Đơn hàng của bạn đã được mua thành công. Chúng tôi đã tạo tài khoản cho bạn để tiện trong quá trình mua hàng . Mật khẩu mặc định của bạn là 123456</span>
                              </div>
                             <?php endif ?>
                             <?php unset($_SESSION['alert']) ?>
                           </div>
                           <div class="payment-order clearfix">
                              <h3>Mã đơn hàng của bạn: <b><?php echo $chitietdon['madonhang'] ?></b></h3>
                              <p><b>Ngày đặt:</b> <i><?php echo $chitietdon['ngaytao'] ?></i></p>
                              <p><b>Phương thức vận chuyển :</b> <i><?php echo $chitietdon['vanchuyen'] == 1 ? "Chuyể phát nhanh" :"Giao hàng bình thường"?></i></p>
                              <h1 class="page-heading">Thông tin đơn hàng</h1>
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>STT</th>
                                       <th>Sản phâm</th>
                                       <th>Đơn giá</th>
                                       <th>Số lượng</th>
                                       <th>Thành tiền</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                  <?php  foreach($dulieudon as $item):?> 
                                    <tr>
                                       <td>1</td>
                                       <td>
                                          <span><?php echo $item['tensanpham'] ?></span>
                                          <p class="note"></p>
                                       </td>
                                       <td><?php echo format_price($item['giasanpham']) ?></td>
                                       <td><?php echo $item['soluong'] ?></td>
                                       <td><?php echo format_price($item['giasanpham'] * $item['soluong']) ?></td>
                                    </tr>
                                  <?php endforeach; ?>
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <td colspan="4" class="text-right label-payment"><b>Tổng thanh toán:</b></td>
                                     
                                       <td class="total-payment"> <?php  echo format_price($dulieudon[0]['tongtien']) ?>đ </td>

                                    </tr>
                                 </tfoot>
                              </table>
                              <span class="print-order"><a href="#"><i class="fa fa-print"></i>In đơn hàng</a></span>
                           </div>
                           <div class="clearfix col-md-12">
                              <div class="text-right">
                                 <a class="btn btn-default" href="/">Tiếp tục mua hàng</a>
                                 <!-- <a class="btn btn-primary" href="/don-hang.html">Đơn hàng của tôi</a> -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- footer -->
            <?php require_once('layouts/inc_footer.php'); ?>
            <!--  end footer -->
        </div>
    </div>


    <div style="display: none;" id="loading-mask">
        <div id="loading_mask_loader" class="loader">
            <img alt="Loading..." src="<?php echo base_url('/public/frontend/')  ?>assets/img/ajax-loader-main.gif" />
            <div>
                Please wait...
            </div>
        </div>
    </div>
    <a href="#" class="scroll_top" title="Scroll to Top" style="display: none;">Scroll</a>
</body>

</html>
<script type="text/javascript">
    $(".header-content").css({
        "background": ''
    });
    $("html").addClass('');
</script>