<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="BlogList-filter">
				Posts in
				<?php
				echo get_the_archive_title();
				?>
			</header>


			<?php
			$html .= '<div class="block-site blog-list">';
			$html .= '<div class="row">';
			// Start the Loop.
			while (have_posts()) : the_post();
				$html .= '<div class="col-md-4 col-6 blog-item">';
				$html .= '<article id="" class="blogList-item">';
				$html .= '<div class="blogList-item-image">';
				$html .= '<a href="' . get_the_permalink() . '" class="BlogList-item-image-link">';
				$html .= '<img alt="' . get_the_title() . '" class="" src="' . get_the_post_thumbnail_url() . '">';
				$html .= '</a>';
				$html .= '</div>';
				$html .= '<div class="Blog-meta BlogList-item-meta">';
				$html .= '<time class="Blog-meta-item Blog-meta-item--date" datetime="' . get_the_date('d/m/Y') . '">';
				$html .= '<span class="time-on-list">' . get_the_date('F t, Y') . '</span>';
				$html .= '</time>';
				foreach (get_the_terms(get_the_ID(), 'blog_category') as $cat) {
					$html .= '<span class="Blog-meta-item Blog-meta-item--categories">';
					$html .= '<a href="/' . $cat->taxonomy . '/' . $cat->slug . '" class="Blog-meta-item-category">' . $cat->name . '</a>';
					$html .= '</span>';
				}

				$html .= '</div>';
				$html .= '<div class="blockLis-item-title">';
				$html .= '<a href="' . get_the_permalink() . '" class="BlogList-item-title">' . get_the_title() . '</a>';
				$html .= '</div>';
				$html .= '</article>';
				$html .= '</div>';
				// End the loop.
			endwhile;
			$html .= '</div>';
			$html .= '</div>';
			echo $html;

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
