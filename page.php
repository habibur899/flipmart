<?php get_header() ?>
<?php get_template_part( 'template-parts/breadcrumbs' ) ?>
<?php while ( have_posts() ) :the_post(); ?>
    <div class="body-content">
        <div class="container">
            <div class="row">
				<?php the_content(); ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer() ?>