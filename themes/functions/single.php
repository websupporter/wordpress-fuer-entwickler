<?php get_header(); ?>
<?php
while ( have_posts() ) : the_post();
  $format = get_post_format();
  $link = get_url_in_content( get_the_content() );
  ?>
  <article id="post-<?php the_ID();?>" <?php post_class();?>>
    <h1>
      <?php if( 'link' === $format && false !== $link ): ?>
        <a href="<?php echo $link; ?>"><?php the_title(); ?></a>
      <?php else: ?>
        <?php the_title(); ?>
      <?php endif; ?>
    </h1>
    <?php the_content(); ?>
  </article>
<?php endwhile; ?>
<?php get_footer();
