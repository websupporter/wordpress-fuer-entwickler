<?php

class Walker_The_Menu extends Walker
{
    public $db_fields = array(
        'parent' => 'menu_item_parent',
        'id'     => 'db_id',
    );
    public function start_el(&$output, $item)
    {
        $output .= '<div>';
        $output .= '<a href="' . $item->url . '">';
        $output .= $item->title;
        $output .= '</a>';
    }
    public function end_el(&$output, $item)
    {
        $output .= '</div>';
    }
    public function start_lvl(&$output)
    {
        $output .= '<div
    class="sub-menu"
    style="margin-left:10px"
>';
    }
    public function end_lvl(&$output)
    {
        $output .= '</div>';
    }
}

add_filter('wp_nav_menu_args', 'show_menu');
function show_menu($args)
{
    $args['walker'] = new Walker_The_Menu();

    return $args;
}