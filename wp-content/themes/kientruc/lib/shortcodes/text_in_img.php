<?php
/**
 * Created by PhpStorm.
 * User: dinh0
 * Date: 10/8/2018
 * Time: 10:16 PM
 */

function text_in_img_shortcode( $atts ) {
    $imgBanner = $atts['imgbanner'] ? : 'https://static1.squarespace.com/static/5b8bf301e2ccd13e972a0ab4/t/5b9b914c032be4e77bd05197/1537516294161/tramdecor.jpg?format=750w';
    $titleContent = $atts['titlecontent'] ? : 'TẠI SAO CHỌN TRAMDECOR';
    $listContents = $atts['listcontents'];
    $aryListContent = array_filter(explode("/", $listContents),"strlen");
    $bgColorContent = $atts['bgolorcontent'] ? : 'rgba(54,54,54,.73)';
    $linkBtn = $atts['link'];
    $textLink = $atts['text'];
    $html = '';
    $html .=  '<div class="block-site">';
        $html .=  '<div class="block html-block">';
            $html .=  '<div class="image-block-outer-wrapper row">';
                $html .=  '<div class="intrinsic col">';
                    $html .=  '<div class="image-inset content-fit">';
                        $html .=  '<img
                            src="' . $imgBanner . '"
                            alt="">';
                    $html .=  '</div>';
                $html .=  '</div>';
                $html .=  '<div class="col image-card-wrapper align-self-center">';
                    $html .=  '<div class="image-card" style = "
                                    width: 90%;
                                    margin-left: 10%;
                                    background-color: ' . $bgColorContent . ';
                                    padding: 10%;
                                    box-sizing: border-box;
                                    margin-top: 10%;
                    ">';
                        $html .=  '<div class="image-title-wrapper">';
                            $html .=  '<div class="image-title sqs-dynamic-text">';
                                $html .=  '<p>' . $titleContent . '</p>';
                            $html .=  '</div>';
                        $html .=  '</div>';
                        $html .=  '<div class="image-subtitle-wrapper">';
                            $html .=  '<div class="image-subtitle sqs-dynamic-text">';
                                foreach ($aryListContent as $content) {
                                    $html .=  '<p>- ' . $content . '</p>';
                                }
                                if ($linkBtn && $textLink) {
                                    $html .=  '<div class="img-button-wrapper">';
                                        $html .='<a href="' . $linkBtn . '">' . $textLink . '</a>';
                                    $html .=  '</div>';
                                }

                            $html .=  '</div>';
                        $html .=  '</div>';
                    $html .=  '</div>';
                $html .=  '</div>';
            $html .=  '</div>';
        $html .=  '</div>';
    $html .=  '</div>';
    return $html;
}
add_shortcode( 'text_in_img', 'text_in_img_shortcode' );
    