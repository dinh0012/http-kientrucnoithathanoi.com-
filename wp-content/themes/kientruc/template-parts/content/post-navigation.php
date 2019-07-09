<?php
    $previous = get_previous_post();
    $next = get_next_post();
?>
<div class="btn_next_page_blog">
    <div class="row">
        <div class="col previous-post">
            <?php if ($previous) { ?>
                <div class="BlogItem-pagination-link-label blogItem-previous">Previous</div>
                <a href="<?php echo $previous->guid ?>">
                    <h4 class="BlogItem-pagination-link-title"><?php echo $previous->post_title ?></h4>
                </a>
                <?php $catsPrevious = get_the_terms($previous->ID, 'blog_category') ?>
                <?php foreach ($catsPrevious as $cat) { ?>
                    <a class="item-cat" href="/<?php echo $cat->slug ?>">
                        <span class="BlogItem-pagination-link-meta-item BlogItem-pagination-link-meta-item--categories"><?php echo $cat->name ?></span>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="col next-post">
            <?php if ($next) { ?>
                <div class="BlogItem-pagination-link-label blogItem-next">Next</div>
                <a href="<?php echo $next->guid ?>">
                    <h4 class="BlogItem-pagination-link-title"><?php echo $next->post_title ?></h4>
                </a>
                <?php $catsNext = get_the_terms($next->ID, 'blog_category') ?>
                <div class="cat-next-item">
                    <?php foreach ($catsNext as $cat) { ?>
                        <a class="item-cat" href="/<?php echo $cat->slug ?>">
                            <span class="BlogItem-pagination-link-meta-item BlogItem-pagination-link-meta-item--categories"><?php echo $cat->name ?></span>
                        </a>
                    <?php } ?>
                </div>

            <?php } ?>
        </div>
    </div>
</div>