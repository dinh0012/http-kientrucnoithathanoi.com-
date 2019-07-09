<?php
/**
 * Created by PhpStorm.
 * User: dinh0
 * Date: 10/8/2018
 * Time: 10:16 PM
 */
function blog_shortcode( $atts ) {
    $num = $atts['number'];
    $posts = new WP_Query( array( 'post_type' => 'blog', 'posts_per_page' => $num ) );

    $html = '';
    $html .= '<div class="block-site blog-list">';
        $html .= '<div class="row">';
        if( $posts->have_posts() ) : while( $posts->have_posts() ) : $posts->the_post();
            $html .= '<div class="col-md-4 col-6 blog-item">';
                $html .= '<article id="" class="blogList-item">';
                    $html .= '<div class="blogList-item-image">';
                        $html .= '<a href="' . get_the_permalink() . '" class="BlogList-item-image-link">';
                            $html .='<img alt="' . get_the_title() . '" class="" src="' . get_the_post_thumbnail_url() . '">';
                        $html .= '</a>';
                    $html .= '</div>';
                    $html .= '<div class="Blog-meta BlogList-item-meta">';
                        $html .= '<time class="Blog-meta-item Blog-meta-item--date" datetime="' . get_the_date('d/m/Y') .'">';
                            $html .= '<span class="time-on-list">'.get_the_date('F t, Y') . '</span>';
                        $html .= '</time>';
                        foreach (get_the_terms(get_the_ID(), 'blog_category') as $cat) {
                            $html .= '<span class="Blog-meta-item Blog-meta-item--categories">';
                                $html .= '<a href="/' .  $cat->taxonomy . '/' .  $cat->slug . '" class="Blog-meta-item-category">' . $cat->name . '</a>';
                            $html .= '</span>';
                        }

                    $html .= '</div>';
                    $html .= '<div class="blockLis-item-title">';
                        $html .= '<a href="' . get_the_permalink() . '" class="BlogList-item-title">' . get_the_title() . '</a>';
                    $html .= '</div>';
                $html .= '</article>';
            $html .= '</div>';
        endwhile; endif;
        $html .= '</div>';
    $html .= '</div>';

    return $html;
}
add_shortcode( 'blog', 'blog_shortcode' );

