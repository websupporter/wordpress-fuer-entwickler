<?php
add_filter( 'wp_insert_post_data', 'neue_posts_pruefen', 10, 2 );
function neue_posts_pruefen( $data, $raw ){
    $blacklist = array(
        preg_quote(' sex '),
        preg_quote(' drugs '),
        preg_quote(" Rock'n'Roll "),
    );
    foreach ($blacklist as $delete ) {
        $data['post_title'] = preg_replace(
            '^' . $delete . '^i',
            ' --censored-- ',
            $data['post_title']
        );
        $data['post_content'] = preg_replace(
            '^' . $delete . '^i',
            ' --censored-- ',
            $data['post_content']
        );
    }
    return $data;
}
