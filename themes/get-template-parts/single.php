<?php get_header(); ?>
    <div id="container">
        <?php
        if (have_posts()) :
            while( have_posts() ): the_post();
                get_template_part( 'content' );
            endwhile;
        endif;
        ?>
    </div>
<?php
get_sidebar();
get_footer();