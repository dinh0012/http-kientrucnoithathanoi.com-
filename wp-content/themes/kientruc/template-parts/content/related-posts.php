<?php
/**
 * Related Posts
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<?php
global $post;

$related_posts_count = '5';

$categories = wp_get_post_terms($post->ID, 'category');
$category_ids = array();
foreach ($categories as $individual_category) {
    $category_ids[] = $individual_category->term_id;
}
$args = array(
    'posts_per_page' => $related_posts_count,
    'orderby' => 'rand',
    'ignore_sticky_posts' => 1,
    'no_found_rows' => 1,
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID)
);

$related_posts_query = new WP_Query($args);
?>

<?php if ($related_posts_query->have_posts()) { ?>
    <div class="latest_new_page">
        <div class="title_latest_new font_open">
            <span>RELATED POSTS</span>
        </div>
        <div class="sli_latest_theme">
            <div class="sli_l left_new_page">
                <?php
                $count = 0;

                foreach ($related_posts_query->posts as $post) : setup_postdata($post); ?>
                    <div class="item">
                        <div class="item_n cell-md-6 cell-sm-6 cell-xs-12">
                            <?php if (has_post_thumbnail($post->ID)) { ?>
                                <div class="img_n">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-responsive">
                                </div>
                            <?php } ?>
                            <div class="content_n">
                                <h3 class="">
                                    <a class="h3_title_blog font_gothic_bold" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="date_new font_open">
                                    <span><i class="fa fa-calendar"></i> <?php echo the_date('d/m/Y'); ?> </span> |
                                    <span> <i class="fa fa-eye" aria-hidden="true"></i> <?php echo getPostViews(get_the_ID()); ?></span>
                                </div>
                                <div class="span_c font_open">
                                    <?php echo get_the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="pull-right bnt_a_blog">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div><!-- End .related-posts-wrapper -->
<?php } ?>
