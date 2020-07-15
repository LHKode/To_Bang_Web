<html lang="en">
    <?php
    session_start();
?>
<?php
    include_once('DataProvider.php')
?>
<?php
         if(isset($_REQUEST['signin'])){
            $name = $_REQUEST['your_name'];
            $pass = $_REQUEST['your_pass'];
            $qr="SELECT * FROM khachhang WHERE khachhang.TenKH = '$name'";
            $result = DataProvider::ExecuteQuery($qr);
            if($result){
                while($row=mysqli_fetch_array($result)){
                    if($pass == $row['MatKhauKH']){
                        header('location:index.html');
                    }
                    else{
                        
                    }
                }
            }else{
                echo ("");
            }
            ?>
        <?php
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
        <!-- Sign in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="Login/images/signin-image.jpg" alt="..."></figure>
                        <a href="CreateAcc.html" class="signup-image-link">Tạo tài khoản</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>
                        <form method="post" class="register-form" id="login-form" action="">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
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