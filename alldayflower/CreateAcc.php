
<html lang="en">
    <?php
        include_once('DataProvider.php') 
    ?>
    <?php
        if(isset($_REQUEST['signup'])){
            $tenKH=$_POST['name'];
            $emailKH=$_POST['email'];
            $matkhauKH=$_POST['pass'];

            if (filter_var($emailKH,FILTER_VALIDATE_EMAIL)) {
                $qr="INSERT INTO `khachhang` (`MaKH`, `TenKH`, `EmailKH`, `MatKhauKH`) VALUES (NULL, '$tenKH', '$emailKH','$matkhauKH');";
                DataProvider::ExecuteQuery($qr);
                header("location:index.html");
            }
            else{}
        }
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tài khoản | Alldayflower</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="Login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="Login/css/style.css">
</head>
<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Đăng ký tài khoản</h2>
                        <form method="post" class="register-form" id="register-form" action="">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Họ Tên"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email của bạn"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Nhập lại mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý với các điều khoản và điều kiện  <a href="#" class="term-service">Điều khoản dịch vụ</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng ký"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="Login/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="Login.html" class="signup-image-link">Đã có tài khoản</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- JS -->
    <script src="Login/vendor/jquery/jquery.min.js"></script>
    <script src="Login/js/main.js"></script>
</body>

</html>