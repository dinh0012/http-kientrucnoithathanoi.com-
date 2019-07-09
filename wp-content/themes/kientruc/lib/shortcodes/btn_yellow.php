<?php
/**
 * Created by PhpStorm.
 * User: dinh0
 * Date: 10/10/2018
 * Time: 10:22 PM
 */
function btn_yellow_shortcode( $atts ) {
    $link = $atts['link'];
    $text = $atts['text'];
    $align = $atts['align'] ?: 'left';
    if (!$text) {
        return;
    }
    $html = '';
    $html .= '<div class="block html-block row block-tbn">';
    $html .= '<div class="sqs-block-button-container--' . $align . '  col">';
    $html .= '<a href="' . $link . '"  class="btn-more levi-btn">';
    $html .= $text;
    $html .= '</a>';
    $html .= '</div>';
    $html .= '</div>';

    return $html;
}
add_shortcode( 'btnYellow', 'btn_yellow_shortcode' );