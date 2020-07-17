<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo baseServerName() ?>/public/images/default-user.png" class="img-circle" alt="User Image" style="height: 45px;">
            </div>
            <div class="pull-left info">
                <p>Quốc Học</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Bảng Điều Khiển</li>
            <li class="">
                <a href="/admin"><i class="fa fa-dashboard"></i> <span>Home</span></a>
            </li>
            <li class="<?= isset($modules) && $modules == 'categories' ? 'active' : ''?>">
                <a href="<?= base_url('/admin/modules/categories') ?>"><i class="fa fa-list-alt "></i> <span>Danh mục</span></a>
            </li>
            <li class="<?= isset($modules) && $modules == 'products' ? 'active' : ''?>">
                <a href="/admin/modules/products"><i class="fa fa-database"></i> <span>Sản phẩm</span></a>
            </li>

            <li class="<?= isset($modules) && $modules == 'posts' ? 'active' : ''?>">
                <a href="/admin/modules/posts"><i class="fa fa-pencil"></i> <span>Bài viết</span></a>
            </li>
            <li class="<?= isset($modules) && $modules == 'contact' ? 'active' : ''?>">
                <a href="/admin/modules/contact/"><i class="fa fa-book"></i> <span>Liên hệ</span></a>
            </li>
            <li class="header"> Hệ thống </li>
            <li class="<?= isset($modules) && $modules == 'transactions' ? 'active' : ''?>">
                <a href="/admin/modules/transactions"><i class="fa fa-book"></i> <span> Đơn hàng </span></a>
            </li>
            <!-- <li class="<?= isset($modules) && $modules == 'comment' ? 'active' : '' ?>">
                <a href="/admin/modules/comments"><i class="fa fa-comment"></i> Quản lý comment </a>
            </li>
            <li class="<?= isset($modules) && $modules == 'feedback' ? 'active' : '' ?>">
                <a href="/admin/modules/feedback"><i class="fa fa-comment"></i> Quản lý phản hồi </a>
            </li> -->
            <li class="<?= isset($modules) && $modules == 'customer' ? 'active' : ''?>">
                <a href="/admin/modules/customer"><i class="fa fa-user-plus"></i> <span> Quản lý Khách Hàng </span></a>
            </li>

            <li class="<?= isset($modules) && $modules == 'statistics' ? 'active' : ''?>">
                <a href="/admin/modules/statistics"><i class="fa fa-book"></i> <span> Sản lượng bán ra hôm nay </span></a>
            </li>
            <li class="<?= isset($modules) && $modules == 'admins' ? 'active' : ''?>">
                <a href="/admin/modules/admins"><i class="fa fa-users"></i> <span> Quản lý Admin </span></a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>