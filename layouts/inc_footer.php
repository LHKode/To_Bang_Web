<div class="footer">
    <script src="<?php echo base_url('/public/frontend/')  ?>app/services/moduleServices.js"></script>
    <script src="<?php echo base_url('/public/frontend/')  ?>app/controllers/moduleController.js"></script>
    <script src="<?php echo base_url('/public/app/js/cart.js')?>"></script>
    <footer id="footer">
        <div class="container">
            <!-- introduce-box -->
            <div id="introduce-box" class="row">
                <div class="col-md-3">
                    <div id="address-box">
                        <a href="/"><img src="<?php echo base_url('/public/frontend/')  ?>uploads/images/logo2.png" alt="logo" /></a>
                        <div id="address-list">
                            <div class="tit-name">Địa chỉ:</div>
                            <div class="tit-contain"></div>
                            <div class="tit-name">Điện thoại:</div>
                            <div class="tit-contain"></div>
                            <div class="tit-name">Email:</div>
                            <div class="tit-contain"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="introduce-title">Về ch&#250;ng t&#244;i</div>
                            <ul class="introduce-list">
                                <li class="item">
                                    <a href="/gioi-thieu.php">
                                                        Giới thiệu
                                                    </a>
                                </li>
                                <li class="item">
                                    <a href="">
                                                        Giao h&#224;ng - Đổi trả
                                                    </a>
                                </li>
                                <li class="item">
                                    <a href="">
                                                        Ch&#237;nh s&#225;ch bảo mật
                                                    </a>
                                </li>
                                <li class="item">
                                    <a href="">
                                                        Li&#234;n hệ
                                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">Trợ gi&#250;p</div>
                            <ul class="introduce-list">
                                <li class="item">
                                    <a href="">
                                                        Hướng dẫn mua h&#224;ng
                                                    </a>
                                </li>
                                <li class="item">
                                    <a href="">
                                                        Hướng dẫn thanh to&#225;n
                                                    </a>
                                </li>
                                <li class="item">
                                    <a href="">
                                                        T&#224;i khoản giao dịch
                                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="contact-box" ng-controller="moduleController" ng-init="initController()">
                        <!-- <div class="introduce-title">Đăng ký nhận tin</div>
                        <form "" class='contact-form'>
                            <div class="input-group" id="mail-box">
                                <input ng-model="newsletter.Email" type="email" placeholder="Đăng ký email" required="required" />
                                <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">Gửi</button>
                        </span>
                            </div>
                            /input-group -->
                        <!-- </form> -->
                        <div class="introduce-title">Liên kết</div>
                        <div class="social-link">
                            <a><i class="fa fa-facebook"></i></a>
                            <a><i class="fa fa-youtube"></i></a>
                            <a><i class="fa fa-twitter"></i></a>
                            <a><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#introduce-box -->
            <!-- #trademark-box -->
            <div id="trademark-box" class="row">
                   
            </div>
        </div>
    </footer>
</div>