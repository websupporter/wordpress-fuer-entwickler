<div id="kommentare">
  <?php if ( have_comments() ) : ?>
    <h2 class="kommentar-titel">
      <?php
      echo get_comments_number(); ?> Kommentar(e)
    </h2>
    <ol class="kommentar-liste">
      <?php
      wp_list_comments( array(
        'style'     => 'ol',
        'short_ping'  => true,
        'avatar_size' => 56,
      ) );
      ?>
    </ol>
  <?php else: ?>
    <p class="keine-kommentare">
      Noch keine Kommentare vorhanden.
    </p>
  <?php endif; ?>

  <?php comment_form(); ?>
</div>