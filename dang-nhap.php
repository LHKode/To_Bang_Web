<?php
    require_once __DIR__. '/autoload.php';
    
    $db = new DB();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // bat dau tien hanh su ly form
            $errors = array();
            $data = array();

            // kiem tra xem nguoi dung co nhap dung password
            if(isset($_POST['matkhau']) && preg_match('/^[\w\'.-]{2,20}$/i',trim($_POST['matkhau'])))
            {
                $password = md5($_POST['matkhau']);
                // neu mat khau trung khop thi lu vao csdl
  
            }else
            {
                // mat khau khong trung khop thi thong bao ra ngoai
                    $errors[] = "matkhau";
            }
            
            if(empty($_POST['matkhau']))
            {
                $errors[] = "matkhau";
            }
            
            // kiem tra email co ton tai va dung dinh dang 
            if(isset($_POST['email'])&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                $email = $_POST['email'];
            }
            else
            {
                $errors[] = "email";
            }
            
            // neu cac truong deu ton tai thi ta tien hanh Insert vào csdl
            if(empty($errors))
            {
               
                $sql  = "SELECT * FROM tbl_khachhang WHERE email = '". $email ."'AND matkhau = '".$password."'";
            
                $datas = $db ->fetchsql($sql);

                if(!empty($datas))
                {
                    $_SESSION['success']      = " Chúc mừng bạn đã đăng nhập thành công";
                    $_SESSION['users'] = $datas[0];
                } else {

                    $_SESSION['error'] = "Tài khoản hoặc mật khẩu không đúng";
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
              <div class="main">
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
                                    <li class="icon-li"><strong>Đăng nhập</strong> </li>
                                </ul>
                            </div>
                        
                            <div class="login-content">
                                <h1 class="page-heading"><span>Đăng nhập hệ thống</span></h1>
                                
                                <div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
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
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="Email" class="col-sm-4 control-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="email" name="email" class="form-control"  ng-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Password" class="col-sm-4 control-label">Mật khẩu</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="matkhau" class="form-control" ng-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                                
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