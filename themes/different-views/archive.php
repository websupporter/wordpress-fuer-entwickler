<?php get_header(); ?>
    <div class="uebersicht">
        <?php if ( have_posts() ) : ?>
            <header>
                <h1><?php the_archive_title(); ?></h1>
                <div class="beschreibung">
                    <?php the_archive_description(); ?>
                </div>
            </header>
            <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'content' );
            endwhile;
            the_posts_pagination();
        endif;
        ?>
    </div>
<?php get_sidebar();
get_footer();