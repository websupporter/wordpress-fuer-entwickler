<?php
/* Template Name: Seite ohne Sidebar */
get_header(); ?>
  <div id="container">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post(); ?>

        <article
          id="post-<?php the_ID(); ?>"
          <?php post_class(); ?>
        >
          <h2><?php the_title(); ?></h2>
          <div class="entry">
            <?php the_content(); ?>
          </div>
        </article>
        <?php
      endwhile;
    endif;
    ?>
  </div>
<?php get_footer();