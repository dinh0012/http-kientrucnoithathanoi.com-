<?php

class Custom_Walker_Nav_Menu_Footer extends Walker_Nav_Menu
{
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        echo '<h3>';
        echo '<a target="' . $item->target . '" href="' . $item->url . '">' . $item->title;
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        echo '</a></h3>';
    }

}