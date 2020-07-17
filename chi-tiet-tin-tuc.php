<?php
    require_once __DIR__. '/autoload.php';

    $sql = "SELECT * FROM  posts  ORDER BY id DESC LIMIT 8";
    $new_hot = DB::fetchsql($sql);

    $id = $_GET['id'];

    $id = intval($id);
  
    $sql = "SELECT * FROM  posts WHERE id = {$id} ";
    $new = DB::fetchsql($sql);

    if(empty($new)) {
        header("Location: ".base_url().'/tin-tuc.php');exit();
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
                                        <li itemtype="" itemscope="" class="icon-li">
                                            <a title="Tin tức" href="tin-tuc.php" itemprop="url"><span itemprop="title">Tin tức</span></a>
                                        </li>
                                        <li class="icon-li"><strong><?php echo $new[0]['p_title'] ?></strong> </li>
                                    </ul>
                                </div>
                                <script type="text/javascript">
                                    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                                </script>
                                <div class="news-detail">
                                    <h1 class="page-heading">
                                        <span class="page-heading-title2"><?php echo $new[0]['p_title'] ?></span>
                                    </h1>
                                    <article class="entry-detail">
                                        <div class="entry-meta-data">
                                            <!-- <span class="author">
                                            <i class="fa fa-user"></i>
                                            by: 
                                            </span>
                                            <span class="comment-count">
                                            <i class="fa fa-comment-o"></i> 0
                                            </span> -->
                                            <span class="date"><i class="fa fa-calendar"></i> <?php echo $new[0]['created_at'] ?></span>
                                        </div>
                                        <div class="body-content content-text clearfix">
                                            
                                            <?php echo $new[0]['p_content'] ?>
                                        </div>
                                    </article>
                                    <!-- <div class="news-other">
                                        <h3><span>Tin tức liên quan</span></h3>
                                        <ul>
                                        </ul>
                                    </div> -->
                                    <!-- Comment -->
                                    <div class="single-box">
                                    </div>
                                    <!-- ./Comment -->
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