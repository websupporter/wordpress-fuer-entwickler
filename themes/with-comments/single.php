<?php get_header(); ?>
  <div id="container">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        get_template_part( 'content', get_post_format() );
        ?>
        <div class="post-navigation">
          <?php
          the_post_navigation(
            array(
              'next_text' => '%title &raquo;',
              'prev_text' => '&laquo; %title',
              'screen_reader_text' => 'Weitere Beiträge'
            )
          );
          ?>
        </div>
        <?php
        if ( comments_open() ) :
          comments_template();
        endif;
      endwhile;
    endif;
    ?>
  </div>
<?php get_sidebar();
get_footer();