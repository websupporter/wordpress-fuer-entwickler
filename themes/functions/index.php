<?php
get_header();
if( have_posts() ):
    while( have_posts() ): the_post(); ?>
        <article class="<?php post_class(); ?>">
        <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail();
        } else {
            /**
             * Alternatives Layout,
             * beispielsweise ein Standardbild.
             **/
        }
        ?>
        <h2>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <?php the_excerpt(); ?>
        </article><?php
    endwhile;
    the_posts_navigation();
endif;

get_sidebar();
get_footer();