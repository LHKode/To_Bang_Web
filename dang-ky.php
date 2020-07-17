<?php
    require_once __DIR__. '/autoload.php';
    $db = new DB();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // bat dau tien hanh su ly form
        $errors = array();
        $data = array();
        // kiem tra xem nguoi dung da nhap vao ten hay chua
        if(!empty($_POST['tenkhachhang']))
        {
            $data['tenkhachhang'] = $_POST['tenkhachhang'];
        }
        else
        {
            $errors[]= "tenkhachhang";
        }


        // kiem tra xem nguoi dung co nhap dung password
        if(isset($_POST['matkhau']) && preg_match('/^[\w\'.-]{2,20}$/i',trim($_POST['matkhau'])))
        {
            // neu mat khau trung khop thi lu vao csdl
            if($_POST['matkhau'] == $_POST['nhaplaimatkhau'])
            {
                $data['matkhau'] = md5($_POST['nhaplaimatkhau']);
            }
            else
            {
                // mat khau khong trung khop thi thong bao ra ngoai
                $errors[] = "matkhau";
            }
        }
        
        if(empty($_POST['matkhau']))
        {
            $errors[] = "matkhau";
        }
        if(empty($_POST['nhaplaimatkhau']))
        {
            $errors[] = "nhaplaimatkhau";
        }
        // kiem tra email co ton tai va dung dinh dang 
        if(isset($_POST['email'])&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            $data['email'] = $_POST['email'];
        }
        else
        {
            $errors[] = "email";
        }
        
        //kiem tra xem nguoi dung co nhap vao que
        if(!empty($_POST['diachi']))
        {
            $data['diachi'] = $_POST['diachi'];
            
        }
        else
        {
            $errors[] = "diachi";
            
        }
        // kiem tra nguoi dung co nhap vao so dien thoai 
        if(!empty($_POST['sodienthoai']))
        {
            $data['sodienthoai'] = trim($_POST['sodienthoai']);
        }
        else
        {
            $errors[]= "sodienthoai";
        }

        // neu cac truong deu ton tai thi ta tien hanh Insert vào csdl
        if(empty($errors))
        {
           
            $sql  = "SELECT * FROM tbl_khachhang WHERE email = '". $data['email']."'";
            
            $datas = $db ->fetchsql($sql);
            
            if(empty($datas))
            {
                if($db->insert('tbl_khachhang',$data)){

                    $_SESSION['success'] = " Chúc mừng bạn đã đăng ký thành công";

                }
            }else
            {

                $_SESSION['error'] = "Tài khoản email đã tồn tại";
            }
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
        <div class="wrapper page-home">
             <!--  header -->
            <?php require_once('layouts/inc_header.php'); ?>
            <!--  end header -->
            <!--  header -->
            <?php require_once('layouts/inc_menu_tog.php'); ?>
            <!--  end header -->
               <div class="main" style="background-color: #FFFFFF;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="menu-account">
                                    <h3>
                                        <span>
                                        Tài khoản
                                        </span>
                                    </h3>
                                    <ul>
                                        <li><a href="dang-nhap.php"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                                        <li><a href="dang-ky.php"><i class="fa fa-key"></i> Đăng ký</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="breadcrumb clearfix">
                                    <ul>
                                        <li itemtype="" itemscope="" class="home">
                                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                        </li>
                                        <li class="icon-li"><strong>Đăng ký tài khoản</strong> </li>
                                    </ul>
                                </div>
                               
                              
                                <div class="register-content clearfix ng-scope">
                                    <h1 class="page-heading"><span>Đăng ký tài khoản</span></h1>
                                    <!-- ngIf: IsError -->
                                    <!-- ngIf: IsSuccess -->
                                    <!-- ngIf: InValid -->
                                    <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">

                                        <?php 
                                            if(isset($_SESSION['success']))
                                            {
                                                echo "<h1 class ='success' style='color: #001fff;font-size: 18px;'> ".$_SESSION['success']."</h1>";
                                                unset($_SESSION['success']);

                                            }


                                            if(isset($_SESSION['error']))
                                            {
                                                echo "<h1 class='error' style='color: red;font-size: 18px;'> ".$_SESSION['error']."</h1>";
                                                unset($_SESSION['error']);
                                                
                                            }
                                        ?>
                                        <form class="form-horizontal" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                            <h2><span>Thông tin tài khoản</span></h2>

                                            <div class="form-group">
                                                <label for="Name" class="col-sm-3 control-label">Họ tên<span class="warning">(*)</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="tenkhachhang" class="form-control" required="true">
                                                    <?php
                                                        if(isset($errors) && in_array('tenkhachhang',$errors))
                                                        {
                                                            echo"<br><span class='warning mgl-255' > Mời bạn nhập vào họ và tên .</span>";
                                                        }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="Email" class="col-sm-3 control-label">Email<span class="warning">(*)</span></label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email" class="form-control"  required="true">
                                                    <?php
                                                        if(isset($errors) && in_array('name',$errors))
                                                        {
                                                            echo"<br><span class='warning mgl-255' > Mời bạn nhập vào email .</span>";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Password" class="col-sm-3 control-label">Mật khẩu<span class="warning">(*)</span></label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="matkhau" class="form-control" required="true">
                                                    <?php
                                                        if(isset($errors) && in_array('matkhau',$errors))
                                                        {
                                                            echo"<br><span class='warning mgl-255' > Mật khẩu không trùng khớp .</span>";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="RePassword" class="col-sm-3 control-label">Nhập lại mật khẩu<span class="warning">(*)</span></label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="nhaplaimatkhau"class="form-control" required="true">
                                                    <?php
                                                        if(isset($errors) && in_array('nhaplaimatkhau',$errors))
                                                        {
                                                            echo"<br><span class='warning mgl-255' > Mật khẩu không trùng khớp .</span>";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        
                                           
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Điện thoại</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="sodienthoai" class="form-control" required="true">
                                                    <?php
                                                        if(isset($errors) && in_array('sodienthoai',$errors))
                                                        {
                                                            echo"<br><span class='warning mgl-255' > Mời bạn nhập vào số điện thoại.</span>";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Địa chỉ</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="diachi" class="form-control" required="true">
                                                    <?php
                                                        if(isset($errors) && in_array('diachi',$errors))
                                                        {
                                                            echo"<br><span class='warning mgl-255' > Mời bạn nhập vào địa chỉ .</span>";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group">
                                                <div class="col-sm-offset-4 col-sm-8">
                                                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                                                </div>
                                            </div>
                                        </form>
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