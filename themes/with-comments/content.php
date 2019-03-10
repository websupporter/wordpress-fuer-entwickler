<article
    id="post-<?php the_ID(); ?>"
    <?php post_class(); ?>
>
    <header>
        <h2><?php the_title(); ?></h2>
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
</article>