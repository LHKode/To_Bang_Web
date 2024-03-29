<header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url() ?>" target="_blank" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?= INFO_NAME ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="/public/images/default-user.png" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?= $_SESSION['admin_name'] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url() ?>/admin/modules/admins/profile.php" class="btn btn-success btn-flat"> Cập nhật thông tin </a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url() ?>/authenticate/thoat.php" class="btn btn-danger btn-flat"> Thoát hệ thống </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>