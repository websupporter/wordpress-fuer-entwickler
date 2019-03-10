<?php get_header(); ?>
    <div id="container">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
            <article
                id="post-<?php the_ID(); ?>"
                <?php post_class(); ?>
            >
                <header>
                    <h1><?php the_title(); ?></h1>
                </header>
                <div class="entry">
                    <?php the_content(); ?>
                </div>
                </article><?php
            endwhile;
        endif;
        ?>
    </div>
<?php
get_sidebar();
get_footer();