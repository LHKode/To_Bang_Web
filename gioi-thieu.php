<?php
    require_once __DIR__. '/autoload.php';
   
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
    <div class="wrapper page-home">
         <!--  header -->
        <?php require_once('layouts/inc_header.php'); ?>
        <!--  end header -->
        <!--  header -->
        <?php require_once('layouts/inc_menu_tog.php'); ?>
        <!--  end header -->
            <div id="page">
                <div class="main" style="background-color: #FFFFFF;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="menu-about">
                                    <h3>
                                        <span>
                                        Giới thiệu
                                        </span>
                                    </h3>
                                    <ul>
                                        <li><a href="/gioi-thieu/ve-chung-toi.html">Về chúng tôi</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="breadcrumb clearfix">
                                    <ul>
                                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                        </li>
                                        <li class="icon-li"><strong>Giới thiệu</strong> </li>
                                    </ul>
                                </div>
                                <script type="text/javascript">
                                    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                                </script>
                                <div id="layout-page">
                                    <div class="header-page clearfix">
                                        <h1> CÔNG TY CỔ PHẦN GIẢI PHÁP VÀ ĐẦU TƯ THANH</h1>
                                    </div>
                                    <div class="content-page">
                                        <div>
                                            <div>
                                                <div>
                                                    <p>Chủ sở hữu: Trần Công Thành</p>
                                                    <p>Địa chỉ : Số nhà 24, ngõ 58 đường Trần Bình-Phường Mai Dịch-Quận Cầu Giấy-Hà Nội </p>
                                                    <div>
                                                        <ul>
                                                            <li>Ngành nghề kinh doanh:Bán buôn ,bán lẻ máy vi tính thiết bị ngoại vi và phần mền. Bán buôn thiết bị linh kiện điện tử  viễn thông.Tư vấn tổng thể:Phân tích  môi trường và ngành, Định hướng marketing online , Định hướng SEO( lộ trình từ khóa).Thiết kế web cao cấp :Thiết kế theo yêu cầu, Thiết kế bộ nhận diện, Banner hình ảnh, Hồ sơ năng lực,catong.Phát triển website : Quản trị website làm đẹp tăng khả năng bán hàng tối ưu thông số kỹ thuật , Giải pháp SEO tổng thể bền vững, Giải pháp quản lý báo cáo tự động.Quảng cáo theo yêu cầu khác mà khách hàng yêu cầu.
                                                            <li>Công ty gồm 20 nhân viên, gồm 9 người trong ban lãnh đạo và tổng số các cán bộ nhân viên trong các lĩnh vực có trên 11 người và 100% đã tốt nghiệp đại học, cao đẳng chính quy về các chuyên ngành CNTT và kinh tế </li>
                                                            <li>Thành lập từ năm 2016, Công ty Cổ Phần Giải Pháp à Đầu Tư THANH là một trong những công ty hàng đầu  trong lĩnh vực bán lẻ phần cứng công nghệ thông tin. Công ty chúng tôi hiện là đại lý của các hãng nổi tiếng: Intel, Microsoft, Dell, Asus, HP, Acer…Chúng tôi luôn duy trì được tốc độ tăng trưởng ở mức độ cao và vững chắc trên mọi mặt. Công ty luôn chiếm được sự tin tưởng của khách hàng trong và ngoài tỉnh bởi các chính sách, cam kết, dịch vụ…và "giải pháp công nghệ thông tin toàn diện" cho doanh nghiệp mà rất nhiều công ty máy tính khác không làm được.</li>
                                                            <li>Liên kết đến các trang mạng xã hội (Twitter, Facebook)</li>
                                                        </ul>
                                                    </div>
                                                    <p>Bạn có thể chỉnh sửa hoặc xoá bài viết này tại <a href="https://kute-shop.myharavan.com/admin/page#/detail/1000136574"><strong>đây</strong></a> hoặc thêm những bài viết mới trong phần quản lý <a href="https://kute-shop.myharavan.com/admin/page#/new"><strong>Trang nội dung</strong></a>.</p>
                                                    <div>&nbsp;</div>
                                                </div>
                                            </div>
                                        </div>
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