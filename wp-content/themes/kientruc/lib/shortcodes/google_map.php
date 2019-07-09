<?php
/**
 * Created by PhpStorm.
 * User: dinh0
 * Date: 10/8/2018
 * Time: 10:16 PM
 */

function google_map_shortcode( $atts ) {
    $width = $atts['width'] ?: '1200';
    $height = $atts['height'] ?: '1000';
    $address = $atts['address'] ?: "university%20of%20san%20francisco";
    $html = '';
    $html .=  '<div class="mapouter">';
    $html .=  '<div class="gmap_canvas">';
    $html .=  '<iframe id="gmap_canvas" src="https://maps.google.com/maps?q=' . htmlentities($address) . '&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" width="' . $width . '" height="' . $height . '" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe><a href="https://www.pureblack.de">pureblack.de</a>';
    $html .=  '</div>';
    $html .=  '<style>.mapouter{text-align:right;height:' . $height . ';width:' . $width . ';}.gmap_canvas {overflow:hidden;background:none!important;height:' . $height . ';width:' . $width . ';}</style></div>';
    return $html;
}
add_shortcode( 'google_map', 'google_map_shortcode' );
    