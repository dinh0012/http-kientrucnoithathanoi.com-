<?php
/**
 * Created by PhpStorm.
 * User: dinh0
 * Date: 10/8/2018
 * Time: 10:16 PM
 */

function branddesign_shortcode( $atts ) {
    $title = $atts['title'] ? : 'DỊCH VỤ THIẾT KẾ THƯƠNG HIỆU';
    $caption1 = $atts['caption1'] ? : 'Thiết kế Logo';
    $img1 = $atts['img1'];
    $caption2 = $atts['caption2'] ? : 'THIẾT KẾ NHẬN DIỆN THƯƠNG HIỆU';
    $img2 = $atts['img2'];
    $link1 = $atts['link1'];
    $link2 = $atts['link1'];
    $html = '';
    $html = '<div class="block-site">';

        $html = '<div class="block html-block">';
            $html = '<h2>' . $title . '</h2>';   
        $html .= '</div>';
        $html .= '<div class="row block html-block">';
            $html .= '<div class="col-6 image-block">';
                $html .= '<div class="row">';
                    $html .= '<div class="intrinsic col-lg-6 ">';
                        $html .= '<a href="' .$link1 . '">';
                            $html .= '<img
                                src="' .$img1. '">';
                                // https://static1.squarespace.com/static/5b8bf301e2ccd13e972a0ab4/t/5b9b9549898583f86272a956/1537516294152/?format=300w
                        $html .= '</a>';
                    $html .= '</div>';
                    $html .= '<div class="image-inset content-fit col align-self-center">';
                        $html .= '<div class="image-title-wrapper">';
                            $html .= '<strong>' .$caption1. '</strong>';//Thiết kế Logo
                        $html .= '</div>';
                    $html .= '</div>';
                $html .= '</div>';

            $html .= '</div>';
            $html .= '<div class="col-6 image-block">';
                $html .= '<div class="row">';
                    $html .= '<div class="intrinsic col-lg-6 ">';
                        $html .= '<a href="' .$link2 . '">';
                            $html .= '<img
                                src="'.$img2.'">';// https://static1.squarespace.com/static/5b8bf301e2ccd13e972a0ab4/t/5b9b955d352f53d4d57641b7/1537516294154/thiet-ke-thuong-hieu.jpg?format=300w
                        $html .= '</a>';
                    $html .= '</div>';
                    $html .= '<div class="image-inset content-fit col align-self-center">';
                        $html .= '<div class="image-title-wrapper">';
                            $html .= '<strong>' .$caption2. '</strong>';// THIẾT KẾ NHẬN DIỆN THƯƠNG HIỆU
                        $html .= '</div>';
                    $html .= '</div>';
                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode( 'branddesign', 'branddesign_shortcode' );
    