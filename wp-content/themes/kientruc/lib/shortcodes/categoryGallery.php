<?php
/**
 * Created by PhpStorm.
 * User: dinh0
 * Date: 10/8/2018
 * Time: 10:16 PM
 */
function category_shortcode( $atts ) {
    $num = $atts['number'];
    $style = $atts['style'];
    $cat_id = $atts['category'];
    $teams = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $num , 'cat' => $cat_id,) );
    $category = get_category($cat_id);
    $html = '';
    $classStyle = '';
    if ($style == 2) {
        $classStyle = 'style-2';
    }
    $html .= '<div class="block-site block-category '.$classStyle.'">';
        $html .= '<div class="block html-block">';
            $html .= '<h2>' . $category->cat_name . '</h2>';
        $html .= '</div>';
        if ($style == 1) {
            $html .= '<em class="intro-category">Click vào hình để xem chi tiết</em>';
        }
        $html .= '<div class="block html-block">';
            $html .= '<div class="row">';
                if( $teams->have_posts() ) : while( $teams->have_posts() ) : $teams->the_post();
                    $html .= '<div class=" col-6 col-md-4 col">';
                        $html .= '<div class="team-detail">';
                            $html .= '<div class="intrinsic">';
                                $html .= '<a href="' . get_the_permalink() . '">';
                                    $html .= '<img  src="' . get_the_post_thumbnail_url() . '" alt=""/>';
                                $html .= '</a>';
                            $html .= '</div>';

                            $html .= '<div class="info-person">';
                                $html .= '<div class="person-name">';
                                    $html .= '<p class="font_gothic_r">' . get_the_title() . '</p>';
                                $html .= '</div>';
                                $html .= '<div class="person-position">';
                                    $html .= '<p class="font_gothic_r">' . get_the_content() . '</p>';
                                $html .= '</div>';
                            $html .= '</div>';
                        $html .= '</div>';
                    $html .= '</div>';
                endwhile; endif;
            $html .= '</div>';
        $html .= '</div>';
    $html .= '</div>';

    return $html;
}
add_shortcode( 'categoryGallery', 'category_shortcode' );

