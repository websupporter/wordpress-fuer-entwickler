<?php

function beispiel_tax_query()
{
    $args      = array(
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy'         => 'category',
                'terms'            => array(2, 3),
                'field'            => 'term_id',
                'operator'         => 'IN',
                'include_children' => true,
            ),
        ),
    );
    $content = '<ul>';
    $new_query = new WP_Query($args);
    if ($new_query->have_posts()) :
        while ($new_query->have_posts()) :
            $new_query->the_post();

            $content .= '<li>';
            $content .= '<a href="' . get_the_permalink() . '">';
            $content .= get_the_title();
            $content .= '</a></li>';
        endwhile;
    endif;
    wp_reset_postdata();
    $content .= '</ul>';
    return $content;
}