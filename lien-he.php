<?php
    require_once __DIR__. '/autoload.php';
   
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        /**
         *  lay giá trị từ input
         */
        $name       = Input::get("name");
        $email      = Input::get("email");
        $tieude     = Input::get("title");
        $noidung    = Input::get("noidung");
        

        $data = [
            'hoten'     => $name ,
            'email'     => $email ,
            'tieude'    => $tieude ,
            'noidung'   => $noidung
        ];

        //tiến hành insert
        $id_insert = DB::insert('tbl_lienhe',$data);

        if($id_insert > 0)
        {
            // insert thanh cong
            // gán session thông báo thành công
            //chuyển về trang index trong thư mục category_products
            $_SESSION['success'] = " Gửi thông tin thành công! Cảm ơn bạn đã phản hồi cũng như đóng góp ý kiến ";
        
            header("Location: ".base_url().'/lien-he.php');exit();
        }
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
            <div id="page">
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <script src="/app/services/moduleServices.js"></script>
                    <script src="/app/controllers/moduleController.js"></script>
                    <!--Begin-->
                    <div class="box-support-online ng-scope" ng-controller="moduleController" ng-init="initSupportOnlineController('Shop','SupportOnlines')">
                        <h3><span>Hỗ trợ trực tuyến</span></h3>
                        <div class="support-online-block">
                            <div class="support-hotline">
                                HOTLINE<br><span class="ng-binding">0916.888.916</span>
                            </div>
                            <!-- ngRepeat: item in SupportOnlines -->
                        </div>
                    </div>
                    <!--End-->
                           
                </div>
                <div class="col-md-9">
                    <div class="breadcrumb clearfix">
                        <ul>
                            <li itemtype="" itemscope="" class="home">
                                <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                            </li>
                            <li class="icon-li"><strong>Liên hệ</strong> </li>
                        </ul>
                    </div>
                
                    <!--Begin-->
                    <div class="contact-shop contact-content ng-scope" ng-controller="contactController" ng-init="initController('Shop','Maps')">
                        <div id="layout-page">
                            <div class="header-contact header-page clearfix">
                                <h1>Liên hệ</h1>
                            </div>
                            <div class="content-contact content-page clearfix">
                                <div class="col-md-7" id="col-left contactFormWrapper">
                                    <h3>Viết nhận xét</h3>
                                    <hr class="line-left">
                                    <p>
                                        Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể .
                                    </p>
                                    <?php if( isset($_SESSION['success'])) :?>
                                    <p style="color:red"> <?php echo $_SESSION['success'] ;unset($_SESSION['success'])?></p>
                                    <?php endif ; ?>
                                    <form method="POST" action="" class="contact-form ng-pristine ng-invalid ng-invalid-required ng-valid-email">
                                        <div class="form-group">
                                            <label for="contactFormName" class="sr-only">Tên</label>
                                            <input name="name" required="" type="text" id="contactFormName" class="form-control input-lg ng-pristine ng-untouched ng-invalid ng-invalid-required"  placeholder="Tên của bạn" autocapitalize="words" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="contactFormEmail" class="sr-only">Email</label>
                                            <input name="email" required="" type="email" name="contact[email]" placeholder="Email của bạn" id="contactFormEmail" class="form-control input-lg ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required" autocorrect="off" autocapitalize="off" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="contactFormTitle" class="sr-only">Tiêu đề</label>
                                            <input name="title" required="" type="text" id="contactFormTitle" class="form-control input-lg ng-pristine ng-untouched ng-invalid ng-invalid-required"  placeholder="Tiêu đề" autocapitalize="words" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="contactFormMessage" class="sr-only">Nội dung</label>
                                            <textarea  required="" rows="6" name="noidung" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" placeholder="Viết bình luận" id="contactFormMessage"></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-lg" value="Gửi liên hệ">
                                    </form>
                                </div>
                                <div class="col-md-5" id="col-right">
                                    <h3>Chúng tôi ở đây</h3>
                                    <hr class="line-right">
                                    <h3 class="name-company ng-binding">Công Ty Cổ phần Giải Pháp Và Đầu Tư THANH</h3>
                                    <p class="ng-binding"></p>
                                    <ul class="info-address">
                                        <li>
                                            <i class="glyphicon glyphicon-map-marker"></i>
                                            <span class="ng-binding">Số nhà 24, ngõ 58 đường Trần Bình-Phường Mai Dịch-Quận Cầu Giấy-Hà Nội</span>
                                        </li>
                                        <li>
                                            <i class="glyphicon glyphicon-envelope"></i>
                                            <span class="ng-binding">info@enterviet.com</span>
                                        </li>
                                        <li>
                                            <i class="glyphicon glyphicon-phone-alt"></i>
                                            <span class="ng-binding">0916.888.916</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End-->
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