<?php ?><article
    id="post-<?php the_ID(); ?>"
    <?php post_class(); ?>
>
    <header>
        <h2>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
    </header>
    <div class="entry">
        <?php the_excerpt(); ?>
    </div>
</article>