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
                    <div class="meta">
                        <p>
                            erstellt am: <?php the_date('d.m.Y'); ?> |
                            von: <?php the_author(); ?> |
                            Kategorie(n): <?php the_category(', '); ?>
                        </p>
                    </div>
                </header>
                <div class="entry">
                    <?php the_content(); ?>
                </div>
                </article><?php
            endwhile; ?>
            <div class="post-navigation">
                <?php the_post_navigation(); ?>
            </div> <?php
        endif;
        ?>
    </div>
<?php
get_sidebar();
get_footer();