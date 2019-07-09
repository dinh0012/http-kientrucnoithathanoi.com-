<?php
/**
 * Template Name: Has SideBar
 *
 * @package Smart Blog
 * @since 1.0
 */

get_header(); ?>

<div id="primary" class="main-wrapper clearfix">
	<main id="main" class="site-main" role="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="wth_theme_main">
                <section class="new_page">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-8">
                                <?php
                                // Start the loop.
                                while ( have_posts() ) : the_post();

                                    // Include the page content template.
                                    the_content();
                                    // End of the loop.
                                endwhile;
                                ?>

                            </div>
                            <div class="col-md-4">
                                <div class="right_new_page">
                                    <?php get_sidebar( 'primary-sidebar' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
	</main><!-- .site-main -->


</div><!-- .content-area -->

<?php get_footer(); ?>
