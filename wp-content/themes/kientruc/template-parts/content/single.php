<?php $cats = get_the_terms($post->ID, 'blog_category') ?>
<div class="content-post">
    <div class="Blog-meta BlogList-item-meta">
        <time class="Blog-meta-item Blog-meta-item--date" datetime="<?php echo get_the_date('d/m/Y') ?>">
            <span class="time-on-detail"><?php echo get_the_date('F t, Y') ?></span>
            <?php foreach ($cats as $cat) { ?>
                <a class="item-cat" href="/<?php echo $cat->taxonomy ?>/<?php echo $cat->slug ?>">
                    <span class="cat-post"><?php echo $cat->name ?></span>
                </a>
            <?php } ?>

        </time>
    </div>
    <div class="title-post">
        <h2 class="font_open title_new_detail center"><?php the_title() ?></h2>
    </div>
    <div class="main-content">
        <?php the_content() ?>
    </div>
</div>


<div class="BlogItem-share">
    <?php social_share(); ?>
</div>
<?php get_template_part( 'template-parts/content/post-navigation' );?>
