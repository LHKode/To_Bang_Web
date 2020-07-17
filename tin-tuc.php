<?php
    require_once __DIR__. '/autoload.php';


    $paginations = new Pagination();

    $news = Pagination::pagination('posts','','page',8);

    $sql = "SELECT * FROM  posts  ORDER BY id DESC LIMIT 8";
    $new_hot = DB::fetchsql($sql);
   
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

            <div id="blog-template">
                <div class="main">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="breadcrumb clearfix">
                                    <ul>
                                        <li itemtype="" itemscope="" class="home">
                                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                        </li>
                                        <li class="icon-li"><strong>Tin tức</strong> </li>
                                    </ul>
                                </div>
                                <script type="text/javascript">
                                    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                                </script>
                                <div class="news-content">
                                    <h2 class="page-heading">
                                        <span class="page-heading-title2">Tất cả bài viết</span>
                                    </h2>
                                    <!-- Begin: Nội dung blog -->
                                    <ul class="blog-posts">
                                        <?php foreach($news as $item): ?>
                                            <li class="post-item">
                                                <article class="entry">
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <div class="entry-thumb image-hover2 text-center">
                                                                <a href="chi-tiet-tin-tuc.php?id=<?php echo $item['id'] ?>">
                                                                <img src="<?php echo base_url('/public/uploads/posts/').$item['p_thunbar']  ?>" alt="<?php echo $item['p_slug'] ?>">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <div class="entry-ci">
                                                                <h3 class="entry-title">
                                                                    <a href="chi-tiet-tin-tuc.php?id=<?php echo $item['id'] ?>"><?php echo $item['p_title'] ?></a>
                                                                </h3>
                                                                <div class="entry-meta-data">
                                                                    <!-- <span class="author">
                                                                    <i class="fa fa-user"></i>
                                                                    by: CÔNG TY TNHH PHÁT TRIỂN CÔNG NGHỆ RUNTIME
                                                                    </span>
                                                                    <span class="comment-count">
                                                                    <i class="fa fa-comment-o"></i> 0
                                                                    </span> -->
                                                                    <span class="date">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <?php echo $item['created_at'] ?>
                                                                     </span>
                                                                </div>
                                                                <div class="entry-excerpt">
                                                                    <p><?php echo $item['p_descriptions'] ?></p>
                                                                </div>
                                                                <div class="entry-more">
                                                                    <a href="chi-tiet-tin-tuc.php?id=<?php echo $item['id'] ?>">Xem thêm</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <div class="col-md-12 content_sortPagiBar pagi">
                                        <div id="pagination" class="clearfix">
                                            
                                             <?php echo Pagination::getListpage() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php require_once('layouts/category_new.php'); ?>
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