<?php get_header() ?>
<?php get_template_part( 'template-parts/breadcrumbs' ) ?>

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
						<?php if ( have_posts() ):while ( have_posts() ):the_post(); ?>
                            <div <?php post_class( 'blog-post  wow fadeInUp' ); ?>>
                                <a href="<?php the_permalink(); ?>">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );
									} ?>
                                </a>
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
										<?php the_posts_pagination( array(
											'screen_reader_text' => ' ',
											'mid_size'           => 4,
											'prev_text'          => '<i class="fa fa-angle-left"></i>',
											'next_text'          => '<i class="fa fa-angle-right"></i>',
										) ); ?>
                                    </ul><!-- /.list-inline -->

                                </div><!-- /.pagination-container -->    </div><!-- /.text-right -->

                        </div><!-- /.filters-container -->                </div>
					<?php get_sidebar() ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer() ?>