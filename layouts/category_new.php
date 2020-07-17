 <div class="col-md-3">
    <div id="left_column">
        <div class="block left-module">
            <p class="title_block">Bài viết nổi bật</p>
            <div class="block_content">
                <!-- layered -->
                <div class="layered">
                    <div class="layered-content">
                        <ul class="blog-list-sidebar clearfix">
                            <!--Begin: Bài viết mới nhất-->
                            <?php foreach( $new_hot as $item ): ?>
                            <li>
                                <div class="post-thumb">
                                    <a href="">
                                        <img src="<?php echo base_url('/public/uploads/posts/').$item['p_thunbar']  ?>" alt="<?php echo $item['p_slug'] ?>">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h5 class="entry_title"><a href="chi-tiet-tin-tuc.php?id=<?php echo $item['id'] ?>"><?php echo $item['p_title'] ?></a></h5>
                                    <div class="post-meta">
                                        <span class="date"><i class="fa fa-calendar"></i> 12/08/2017</span>
                                        <!-- <span class="comment-count">
                                        <i class="fa fa-comment-o"></i> 0
                                        </span> -->
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                           
                            <!--End: Bài viết mới nhất-->
                        </ul>
                    </div>
                </div>
                <!-- ./layered -->
            </div>
        </div>
    </div>
</div>