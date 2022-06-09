<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>

<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" role="banner">
	<div class="container">
	<?php get_template_part( 'template-parts/header/site-branding' ); ?>
	<?php get_template_part( 'template-parts/header/site-nav' ); ?>
	</div>
</header><!-- #masthead -->
<div class="subnavigation">
	<div class="inner-wrap">
	<?php
		$args = array(
    	'post_type' => 'megamenu',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	$content = '';
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
        	$the_query->the_post();
			$content .= '<div class="megamenu-wrapper menu--'.strtolower(get_the_title()).'"><div class="container"><div class="row">';
			$cols = get_field('columns');
			foreach($cols as $c){
				$content .= '<div class="megamenu-column col-sm-'.$c['column_size'].'">';
				foreach($c['elements'] as $e){
					$content .= '<div class="megamenu-element">';
					if($e['element'] == 'Image'){
						$content .= '<img src="'.$e['image']['url'].'" alt="'.$e['image']['alt'].'" width="'.$e['image']['width'].'" height="'.$e['image']['height'].'" />';
					}
					if($e['element'] == 'Content'){
						$content .= $e['content'];
					}
					if($e['element'] == 'Button'){
						$content .= '<a href="'.$e['button_url'].'" class="btn button">'.$e['button_text'].'</a>';
					}
					$content .= '</div>';
				}
				$content .= '</div>';
			}
			$content .= '</div></div></div>';
		}
	}
	echo $content;
	wp_reset_postdata();
	?>
	</div>
</div>
