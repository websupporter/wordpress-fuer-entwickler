<?php
get_header();
if( have_posts() ):
    while( have_posts() ):
        the_post();
        ?>
        <h2>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <?php the_content();
    endwhile;
endif;

get_sidebar();
get_footer();