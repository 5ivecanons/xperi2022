<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<section class="page-section" style="padding: 60px 0;">
	<header class="page-header alignwide">
		<h1 class="page-title" style="text-align: center;"><?php esc_html_e( 'Looks like nothing is here...', 'twentytwentyone' ); ?></h1>
	</header><!-- .page-header -->

	<div class="error-404 not-found default-max-width">
		<div class="page-content" style="margin-top: 50px;">
			<p><?php esc_html_e( 'Maybe try a search?', 'twentytwentyone' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .page-content -->
	</div><!-- .error-404 -->
</section>
<?php
get_footer();
