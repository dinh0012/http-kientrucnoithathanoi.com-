<?php
/**
 * Created by PhpStorm.
 * User: dinh0
 * Date: 10/8/2018
 * Time: 10:16 PM
 */
function teams_shortcode( $atts ) {
    $num = $atts['number'];
    $title = $atts['title'] ? : 'ĐỘI NGŨ SÁNG TẠO VÀ CHUYÊN NGHIỆP';
    $teams = new WP_Query( array( 'post_type' => 'team', 'posts_per_page' => $num ) );

    $html = '';
    $html .= '<div class="block-site team">';
        $html .= '<div class="block html-block">';
            $html .= '<h2>' . $title . '</h2>';
        $html .= '</div>';
        $html .= '<div class="block html-block">';
            $html .= '<div class="row">';
                if( $teams->have_posts() ) : while( $teams->have_posts() ) : $teams->the_post();
                    $html .= '<div class=" col-6 col-md-4 col">';
                        $html .= '<div class="team-detail">';
                            $html .= '<div class="intrinsic">';
                                $html .= '<img  src="' . get_the_post_thumbnail_url() . '" alt=""/>';
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
add_shortcode( 'teams', 'teams_shortcode' );

