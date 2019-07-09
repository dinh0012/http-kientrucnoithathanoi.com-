<?php
/**
 * Post Share
 *
 * @package Smart Blog
 * @since 1.0
 */

if ( ! function_exists( 'social_share' ) ) {
	function social_share() {
        $new_window = ' target="_blank"';
        $social_sharing_links = [
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'googleplus' => 'googleplus',
            'linkedin' => 'linkedin',
            'stumbleupon' => 'stumbleupon',
            'reddit' => 'reddit',
            'tumblr' => 'tumblr',
            'pinterest' => 'pinterest',
        ];
        global $post;
		$link = get_permalink($post->ID);
		$title = the_title_attribute( 'echo=0' );
		$img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
//print_r($social_sharing_links);
		$output = '';
        foreach ($social_sharing_links as $key => $value) {
            if ($key == 'facebook' && $value) {
                $output .= '<div class="item_bl"><a href="http://www.facebook.com/sharer.php?u=' . urlencode($link) .
                    '" data-toggle="tooltip" data-placement="top" 
                    title="' . __('Share on Facebook', 'themepixels') . '" ' . $new_window . '>
                    <svg class="Share-buttons-item-icon" viewBox="0 0 64 64">
                        <use xlink:href="'. get_template_directory_uri() .'/img/social-accounts.svg#facebook-icon"></use>
                    </svg>
                    </a></div>';
            }

            if ($key == 'twitter' && $value) {
                $output .= '<div class="item_bl">
                     <a href="https://twitter.com/share?url=' . urlencode($link) . '&text=' . esc_attr($title) .
                    '"data-toggle="tooltip" data-placement="top" 
                    title="' . __('Share on Twitter', 'themepixels') . '" ' . $new_window . '>
                    <svg class="Share-buttons-item-icon" viewBox="0 0 64 64">
                        <use xlink:href="'. get_template_directory_uri() .'/img/social-accounts.svg#twitter-icon"></use>
                    </svg>
                    </a></div>';
            }
            if ($key == 'linkedin' && $value) {
                $output .= '<div class="item_bl"><a href="http://www.linkedin.com/shareArticle?url=' . urlencode($link) . '&title=' . esc_attr($title) .
                    '" data-toggle="tooltip" data-placement="top" 
                    title="' . __('Share on Linkedin', 'themepixels') . '" ' . $new_window . '>
                    <svg class="Share-buttons-item-icon" viewBox="0 0 64 64">
                        <use xlink:href="'. get_template_directory_uri() .'/img/social-accounts.svg#linkedin-icon"></use>
                    </svg>
                    </a></div>';
            }
            if ($key == 'stumbleupon' && $value) {
                $output .= '<div class="item_bl"><a href="http://rebadger.stumbleupon.com/badge/?url=' . urlencode($link) . '&title=' . esc_attr($title) .
                    '" data-toggle="tooltip" data-placement="top" 
                    title="' . __('Share on Stumbleupon', 'themepixels') . '" ' . $new_window . '>
                    <svg class="Share-buttons-item-icon" viewBox="0 0 64 64">
                        <use xlink:href="'. get_template_directory_uri() .'/img/social-accounts.svg#stumbleupon-icon"></use>
                    </svg>
                    </a></div>';
            }
            if ($key == 'reddit' && $value) {
                $output .= '<div class="item_bl"><a href="https://www.reddit.com/login?dest=' . urlencode($link) . '&title=' . esc_attr($title) .
                    '" data-toggle="tooltip" data-placement="top" 
                    title="' . __('Share on Reddit', 'themepixels') . '" ' . $new_window . '>
                    <svg class="Share-buttons-item-icon" viewBox="0 0 64 64">
                        <use xlink:href="'. get_template_directory_uri() .'/img/social-accounts.svg#reddit-icon"></use>
                    </svg>
                    </a></div>';
            }
            if ($key == 'tumblr' && $value) {
                $output .= '<div class="item_bl"><a href="https://www.tumblr.com/widgets/share/tool/preview?shareSource=legacy&canonicalUrl=&url=' . urlencode($link) . '&title=' . esc_attr($title) .
                    '" data-toggle="tooltip" data-placement="top" 
                    title="' . __('Share on tumblr', 'themepixels') . '" ' . $new_window . '>
                    <svg class="Share-buttons-item-icon" viewBox="0 0 64 64">
                        <use xlink:href="'. get_template_directory_uri() .'/img/social-accounts.svg#tumblr-icon"></use>
                    </svg>
                    </a></div>';
            }

            if ($key == 'pinterest' && $value) {
                $output .= '<div class="item_bl">
                <a href="https://pinterest.com/pin/create/bookmarklet/?media=' . $img . '&url=' . urlencode($link) . '&is_video=false&description=' . esc_attr($title) .
                    '" data-toggle="tooltip" data-placement="top" title="' . __('Share on Pinterest', 'themepixels') . '" ' . $new_window . '>
                    <svg class="Share-buttons-item-icon" viewBox="0 0 64 64">
                        <use xlink:href="'. get_template_directory_uri() .'/img/social-accounts.svg#pinterest-icon"></use>
                    </svg>
                    </a></div>';
            }

            if ($key == 'googleplus' && $value) {
                $output .= '<div class="item_bl"><a href="https://plus.google.com/share?url=' . urlencode($link) .
                    '" data-toggle="tooltip" data-placement="top" 
                    title="' . __('Share on Google Plus', 'themepixels') . '" ' . $new_window . '>
                    <svg class="Share-buttons-item-icon" viewBox="0 0 64 64">
                        <use xlink:href="'. get_template_directory_uri() .'/img/social-accounts.svg#google-icon"></use>
                    </svg>
                    </a></div>';
            }

        }

        echo $output;

	}
}