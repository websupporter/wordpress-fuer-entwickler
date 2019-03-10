<?php
class Mein_Widget extends WP_Widget {
	function __construct() {
	    parent::__construct(
	        'widget-id',
	        'Widget Titel',
	        array(
	            'description' => 'Beschreibung'
	        )
	    );
	}

	function widget( $args, $instance ) {
	    echo $args['before_widget'];
	    if ( ! empty( $instance['title'] ) ) {
	        echo $args['before_title'] .
	        apply_filters(
	            'widget_title',
	            $instance['title']
	            ).
	        $args['after_title'];
	    }
	    echo 'Hallo Welt';
	    echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ){
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		return $instance;
	}

	function form( $instance ) {
	  $defaults = array( 'title' => 'Titel' );
	  $instance = wp_parse_args( (array) $instance, $defaults );
	  ?>
	  <p>
	      <label
	          for="<?php echo $this->get_field_id( 'title' )?>">
	          Titel:
	      </label>
	  </p>
	  <input
	     id="<?php echo $this->get_field_id( 'title' ); ?>"
	     name="<?php echo $this->get_field_name( 'title' ); ?>"
	     value="<?php echo $instance['title']; ?>">
	  <?php
	}
}