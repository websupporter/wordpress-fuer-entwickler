<?php
add_action( 'widgets_init', 'ppc_init' );
function ppc_init() {
  register_widget('PopularPostsWidget');
}

class PopularPostsWidget extends WP_Widget {
  public function __construct() {
    parent::__construct(
      'popular-posts-client',
      'Popular Posts Client',
      [
        'description' => 'This widget displays the popular posts',
      ]
    );
  }

  public function widget( $args, $instance ) {
    $response = wp_remote_get(
      $instance['url'] . '/wp-json/statify/v1/popular'
    );
    if ( 200 !== wp_remote_retrieve_response_code($response) ) {
      return;
    }
    $data = json_decode( wp_remote_retrieve_body( $response ) );
    echo $args['before_widget'];
    echo $args['before_title'];
    echo 'Popular Posts';
    echo $args['after_title'];
    echo '<ol>';
    foreach( $data as $item ) {
      echo '<li>';
      echo '<a href="' . esc_url( $item->permalink ) . '">';
      echo esc_html( $item->title ).' ('.(int) $item->count.')';
      echo '</a>';
      echo '</li>';
    }
    echo '</ol>';
    echo $args['after_widget'];
  }

  function update( $new_instance, $old_instance ){
    $instance = $old_instance;
    $instance['url'] = sanitize_text_field($new_instance['url']);
    return $instance;
  }

  public function form($instance) {
    $instance = wp_parse_args($instance, [
      'url' => 'https://example.com',
    ]);
    ?>
    <p>
      <label
        for="<?php echo $this->get_field_id( 'url' )?>">
        URL:
      </label>
    </p>
    <input
      id="<?php echo $this->get_field_id( 'url' ); ?>"
      name="<?php echo $this->get_field_name( 'url' ); ?>"
      value="<?php echo esc_attr( $instance['url'] ); ?>">
    <?php
  }
}