<?php get_header() ?>
<?php get_template_part( 'template-parts/breadcrumbs' ) ?>

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
						<?php if ( have_posts() ):while ( have_posts() ):the_post(); ?>
                            <div <?php post_class( 'blog-post  wow fadeInUp' ); ?>>
                                <a href="blog-details.html"><img class="img-responsive"
                                                                 src="<?php echo get_template_directory_uri() ?>/assets/images/blog-post/blog_big_01.jpg"
                                                                 alt=""></a>
                                <h1><a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                </h1>
                                <span class="author"><?php the_author() ?></span>
                                <span class="review"><?php comments_popup_link( __( 'Leave a comment', 'flipmart' ), __( '1 Comment', 'flipmart' ), __( '% Comments', 'flipmart' ), 'comments-link', __( 'Comments are off for this post', 'flipmart' ) ); ?></span>
                                <span class="date-time"><?php echo get_the_date( 'd/m/Y h.iA' ) ?></span>
                                <p><?php esc_html_e( wp_trim_words( get_the_content(), 70, ' ' ) ) ?></p>
                                <a href="<?php the_permalink(); ?>"
                                   class="btn btn-upper btn-primary read-more"><?php esc_html_e( 'read
                                    more', 'flipmart' ); ?></a>
                            </div>
						<?php endwhile;endif; ?>


                        <div class="clearfix blog-pagination filters-container  wow fadeInUp"
                             style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul><!-- /.list-inline -->
                                </div><!-- /.pagination-container -->    </div><!-- /.text-right -->

                        </div><!-- /.filters-container -->                </div>
					<?php get_sidebar() ?>
                </div>
            </div>
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15">
                            <a href="#" class="image">
                                <img data-echo="<?php echo get_template_directory_uri() ?>/assets/images/brands/brand1.png"
                                     src="<?php echo get_template_directory_uri() ?>/assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item m-t-10">
                            <a href="#" class="image">
                                <img data-echo="<?php echo get_template_directory_uri() ?>/assets/images/brands/brand2.png"
                                     src="<?php echo get_template_directory_uri() ?>/assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="<?php echo get_template_directory_uri() ?>/assets/images/brands/brand3.png"
                                     src="<?php echo get_template_directory_uri() ?>/assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="<?php echo get_template_directory_uri() ?>/assets/images/brands/brand4.png"
                                     src="<?php echo get_template_directory_uri() ?>/assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="<?php echo get_template_directory_uri() ?>/assets/images/brands/brand5.png"
                                     src="<?php echo get_template_directory_uri() ?>/assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="<?php echo get_template_directory_uri() ?>/assets/images/brands/brand6.png"
                                     src="<?php echo get_template_directory_uri() ?>/assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="<?php echo get_template_directory_uri() ?>/assets/images/brands/brand2.png"
                                     src="<?php echo get_template_directory_uri() ?>/assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="<?php echo get_template_directory_uri() ?>/assets/images/brands/brand4.png"
                                     src="<?php echo get_template_directory_uri() ?>/assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="<?php echo get_template_directory_uri() ?>/assets/images/brands/brand1.png"
                                     src="<?php echo get_template_directory_uri() ?>/assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="<?php echo get_template_directory_uri() ?>/assets/images/brands/brand5.png"
                                     src="<?php echo get_template_directory_uri() ?>/assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->

            </div><!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
    </div>
<?php get_footer() ?>