<?php
function autoren_widget_init(){
    wp_add_dashboard_widget(
        'autoren-widget',
        'Der letzte Post',
        'autoren_widget_render',
        'autoren_widget_optionen'
    );
}
add_action( 'wp_dashboard_setup', 'autoren_widget_init' );

function autoren_widget_render(){
    $default = array( 'autor' => 1, 'anz' => 5 );
    $optionen = get_option( 'autoren_widget', $default );
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $optionen['anz'],
        'author'         => $optionen['autor'],
    );



    $query = new WP_Query( $args );
    if( $query->have_posts() ):
        while( $query->have_posts() ):
            $query->the_post();
            ?>
            <article>
                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
                <?php the_excerpt(); ?>
            </article>
            <?php
        endwhile;
    else:
        ?><p>Es liegen noch keine Artikel vor.</p><?php
    endif;
}