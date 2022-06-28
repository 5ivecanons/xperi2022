<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<link rel="stylesheet" id="magnific-css"  href="<?php echo get_template_directory_uri().'/assets/css/magnific-popup.css'; ?>" type="text/css" media="all" />
<link rel="stylesheet" id="sections-css"  href="<?php echo get_template_directory_uri().'/assets/css/sections.css'; ?>" type="text/css" media="all" />
<style>
	#layer-content .layer:before {
		display: block;
    position: absolute;
    top: 25%;
    left: -230px;
    background-image: url(/wp-content/uploads/2022/06/search-left-blocks.svg);
    content: '';
    width: 382px;
    height: 383px;
    background-position: 50% 50%;
    background-repeat: no-repeat;
    z-index: 1;
	}
	#layer-content .layer:after {
		display: block;
    position: absolute;
    bottom: 10%;
    right: -260px;
    background-image: url(/wp-content/uploads/2022/06/search-bottom-blocks.svg);
    content: '';
    width: 435px;
    height: 440px;
    background-position: 50% 50%;
    background-repeat: no-repeat;
    z-index: 1;
	}
	#layer-content .layer .container {
		position: relative;
		z-index: 2;
	}
	#layer-content .page-header {
		padding: 40px 50px;
		margin: 0 2% 40px;
		width: 100%;
		max-width: 100%;
		border-bottom: 0;
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		position: relative;
	}
	#layer-content .page-header > div {
		position: relative;
		z-index: 3;
	}
	#layer-content .page-header:before {
		display: block;
    position: absolute;
    top: 50%;
    right: 10%;
    background-image: url(/wp-content/uploads/2022/06/searchbar-blocks.svg);
    content: '';
    width: 382px;
    height: 383px;
    background-position: 50% 50%;
    background-repeat: no-repeat;
	transform: translatey(-50%);
    z-index: 1;
	}
	#layer-content .page-header:after {
		content: '';
		backdrop-filter: blur(21.864px);
	-webkit-backdrop-filter: blur(21.864px);
    border-radius: 10px;
    top: 0;
    left: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 2;
		background: rgb(24,24,24);
background: linear-gradient(180deg, rgba(24,24,24,0.18) 0%, rgba(98,38,167,0.2) 100%);
	}
	.inner-header {
		width: 40%;
	}
	.searchbar {
		width: 50%;
		margin-left: 10%;
	}
	#layer-content .page-header h1 {
		color: #fff;
		font-family: 'gotham';
		font-weight: 500;
		font-size: 30px;
		text-transform: none;
		margin-bottom: 0;
	}
	.search-term {
		color: #78BE20;
	}
	.search-result-count {
		color: #9D9D9D;
		font-size: 20px;
	}
	.search-form {
		flex-direction: row;
		max-width: 100%;
    width: 100%;
	}
	.search-form .search-field {
		border: 1px solid #0C9DD9;
    border-radius: 5px;
    background: transparent;
    color: #fff !important;
    line-height: 1;
    padding: 10px 20px;
    width: calc(100% - 260px);
    margin-bottom: 0px;
		outline: none !important;
	}
	.attributes .date.page {
		padding-left: 0;
	}
	.attributes .date.page:after {
		display: none;
	}
	.news-wrapper.version2 {
		justify-content: flex-start;
	}
	@media (max-width:992px){
		.inner-header, .searchbar {
			width: 100%;
			margin-left: 0;
		}
		.search-result-count {
			margin: 0;
		}
		.search-form {
			flex-direction: column;
			margin-top: 20px;
			align-items: flex-start;
		}
		.search-form .search-field {
			width: 100%;
		}
		.search-form .button {
			margin-left: 0;
		}
	}
</style>
<div id="layer-content">
<section class="layer">
	<div class="container">
		<header class="page-header alignwide">
		<div class="inner-header">
		<h1 class="page-title">
			<?php
			printf(
				/* translators: %s: Search term. */
				esc_html__( 'Results for "%s"', 'twentytwentyone' ),
				'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
			);
			?>
		</h1>
		<div class="search-result-count default-max-width">
		<?php
		printf(
			esc_html(
				_n(
					'We found %d result for your search.',
					'We found %d results for your search.',
					(int) $wp_query->found_posts,
					'twentytwentyone'
				)
			),
			(int) $wp_query->found_posts
		);
		?>
		</div><!-- .search-result-count -->
		</div>
		<div class="searchbar">
			<?php get_search_form(); ?>
		</div>
	</header><!-- .page-header -->
<?php
if ( have_posts() ) {
	?>
	<?php
	// Start the Loop.
	$content .= '<div class="news-wrapper version2">';
	while ( have_posts() ) {
		the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		//get_template_part( 'template-parts/content/content-excerpt', get_post_format() );
		$content .= '<article class="news-tile">';
			if(get_the_post_thumbnail()){
				$content .= '<div class="news-tile-image"><img src="'.get_the_post_thumbnail_url().'" alt="'.get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ).'"></div>';
			}else{
				$content .= '<div class="news-tile-image"><img src="/wp-content/uploads/2022/05/Xperi-Featured-Image.jpg" alt="Page Image"></div>';
			}
			$category = get_the_category(); 
			$catname = $category[0]->cat_name;
		$content .= '<div class="news-tile-content">';
		if(get_post_type() == 'page'){
			$content .= '<div class="attributes">
<span class="date page">Page</span>
</div>';
		}else{
			$content .= '<div class="attributes">
<span class="date">'.get_the_date('F j, Y').'</span>
<span class="category">'.$catname.'</span>
</div>';
		}
			$content .= '<h4 class="news-tile-title">'.wp_trim_words(get_the_title(), 7, '...').'</h4>';
			$content .= '<div class="news-tile-excerpt">'.wp_trim_words(get_the_content(), 25, '...').'</div>';
			$content .= '<div class="news-tile-cta"><a href="'.get_permalink().'" class="btn button">Read More</a></div></div>';
			$content .= '</article>';
	} // End the loop.
	$content .= '</div>';
	echo $content;
	// Previous/next page navigation.
	twenty_twenty_one_the_posts_navigation();

	// If no content, include the "No posts found" template.
} else {
	//get_template_part( 'template-parts/content/content-none' );
}
?>
</div>
</section>
</div>
<?php
get_footer();
