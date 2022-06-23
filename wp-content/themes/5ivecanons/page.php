<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

?>
<link rel="stylesheet" id="magnific-css"  href="<?php echo get_template_directory_uri().'/assets/css/magnific-popup.css'; ?>" type="text/css" media="all" />
<link rel="stylesheet" id="sections-css"  href="<?php echo get_template_directory_uri().'/assets/css/sections.css'; ?>" type="text/css" media="all" />
<link rel="stylesheet" id="sections-css"  href="<?php echo get_template_directory_uri().'/assets/css/raulQA.css'; ?>" type="text/css" media="all" />
<div id="layer-content">
<?php
if( have_rows('section') ):
	while( have_rows('section') ): the_row();
		$layout = get_row_layout();
        include(get_template_directory().'/template-parts/sections/'.$layout.'.php');
    endwhile;
endif;
?>
</div>
<?php
get_footer();
