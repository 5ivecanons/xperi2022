<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php //get_template_part( 'template-parts/footer/footer-widgets' ); ?>
	<div class="footermenus layer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="logo-footer">
						<img src="/wp-content/uploads/2022/05/xperi-logo.svg" alt="xperi logo" width="270" height="56">
					</div>
					<div class="footer-socials">
						<a href="#" target="_blank"><img src="/wp-content/uploads/2022/05/Icon-awesome-instagram.svg" alt="Instagram" width="25" height="25"></a>
						<a href="#" target="_blank"><img src="/wp-content/uploads/2022/05/Icon-awesome-linkedin.svg" alt="LinkedIn" width="25" height="25"></a>
						<a href="#" target="_blank"><img src="/wp-content/uploads/2022/05/Icon-awesome-facebook-square.svg" alt="Facebook" width="25" height="25"></a>
						<a href="#" target="_blank"><img src="/wp-content/uploads/2022/05/Icon-awesome-envelope.svg" alt="Email" width="33" height="25"></a>
					</div>
				</div>
				<div class="col-md-3">
					<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Footer Column 1 menu', 'twentytwentyone' ); ?>" class="footer-navigation">
				<ul class="footer-menu-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'fallback_cb'    => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
				</div>
				<div class="col-md-3">
					<?php if ( has_nav_menu( 'footer_2' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Footer Column 2 menu', 'twentytwentyone' ); ?>" class="footer-navigation">
				<ul class="footer-menu-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer_2',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'fallback_cb'    => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
				</div>
				<div class="col-md-3">
					<?php if ( has_nav_menu( 'footer_3' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Footer Column 3 menu', 'twentytwentyone' ); ?>" class="footer-navigation">
				<ul class="footer-menu-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer_3',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'fallback_cb'    => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="site-name">
				<div class="copyright">
					&copy;<?php echo date('Y'); ?> XPERI CORPORATION
				</div>
			</div><!-- .site-name -->
			<div class="credit-links">
				<?php if ( has_nav_menu( 'credits' ) ) : ?>
					<nav aria-label="<?php esc_attr_e( 'Credits menu', 'twentytwentyone' ); ?>" class="footer-credits">
						<ul class="footer-navigation-wrapper">
						<?php
						wp_nav_menu(
						array(
							'theme_location' => 'credits',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'fallback_cb'    => false,
						)
						);
						?>
						</ul><!-- .footer-navigation-wrapper -->
					</nav><!-- .footer-navigation -->
				<?php endif; ?>
				<div class="poweredby">
					<a href="https://5ivecanons.com" target="_blank">Powered by 5ivecanons</a>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="/wp-content/themes/5ivecanons/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/wp-content/themes/5ivecanons/assets/map/mapdata.js"></script>
<script src="/wp-content/themes/5ivecanons/assets/map/worldmap.js"></script>
<script>
(function($){
if($('#map').length){
   $.ajax({
    url: "<?php echo admin_url('admin-ajax.php'); ?>",
    data: {
        action: "get_locations"
    },
	method : 'POST',
    success: function (response){
        console.log(response);
		var $items = JSON.parse(response);
		var $count = 0;
		for(var i = 0; i < $items.length; i++) {
			var $item = $items[i];
			simplemaps_worldmap_mapdata.locations[i] = {name: $item['name'], description: $item['description'], lat: $item['latitude'], lng: $item['longitude']};
			$count++;
      }
      simplemaps_worldmap.load();
		$('.locations-hero h1').html($count+' Locations');
		$('.locations-hero h1').addClass('active');
    }
	});
} 
var $grid = $('.locations-wrapper').isotope({
  itemSelector: '.location',
  layoutMode: 'fitRows'
});
$('.countries').on( 'change', function() {
  var filterValue = this.value;
	console.log(filterValue);
  $('.locations-wrapper').isotope({ filter: filterValue });
});
$('.close-mm').click(function(e){
	$('.subnavigation .megamenu-wrapper').hide(function(){
		$('.subnavigation, .primary-navigation > div > .menu-wrapper li.active').removeClass('active');
	$('.subnavigation .inner-wrap').slideUp(500);
	});
});
if($(window).width() > 992){
$('.menu-item-has-children.mm--dropdown a').hover(function(e){
	if(!$('.menu-item-has-children').hasClass('active')){
	e.preventDefault();
	$(this).parent().toggleClass('active');
	var classList = $(this).parent().attr('class');
	var $text = $(this).text();
	var $search = 'megamenu--'+$text.toLowerCase();
	if(classList.indexOf('megamenu--') !== -1){
		var classes = classList.split(/\s+/);
		for (var i = 0; i < classes.length; i++) {
			if (classes[i].indexOf('megamenu--') !== -1) {
				var $mm = classes[i].split('--');
				$('.subnavigation .menu--'+$mm[1]).show(function(){
					$('.subnavigation').toggleClass('active');
					$('.subnavigation .inner-wrap').slideDown(500);
				});
			}
		}
	}
	}
},function(e){
	/*if(!$(this).parent().hasClass('active')){
	e.preventDefault();
	$(this).parent().toggleClass('active');
	var classList = $(this).parent().attr('class');
	if(classList.indexOf('megamenu--') !== -1){
		var classes = classList.split(/\s+/);
		for (var i = 0; i < classes.length; i++) {
			if (classes[i].indexOf('megamenu--') !== -1) {
				var $mm = classes[i].split('--');
				$('.subnavigation .menu--'+$mm[1]).toggle(function(){
					$('.subnavigation').toggleClass('active');
					$('.subnavigation .inner-wrap').slideToggle(500);
				});
			}
		}
	}
	}*/
});
}
$('.wistia-video').magnificPopup({
    type: 'inline',
	closeBtnInside: false,
    preloader: false,
});
$('.layer-block--carousel').slick();
$('.logo-carousel .col-sm-12').slick({
	slidesToShow: 4,
  slidesToScroll: 1,
	infinite: true,
	autoplay: true,
	dots: false,
	arrows: false,
	responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
	{
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },
	]
});
$('.partners-wrapper').slick({
	slidesToShow: 1,
  slidesToScroll: 1,
	infinite: true,
	autoplay: true,
	dots: true,
	arrows: true,
});
$('.news-wrapper:not(.version2)').slick({
	slidesToShow: 3,
  slidesToScroll: 1,
	autoplay: false,
	dots: true,
	arrows: true,
	responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },
	{
      breakpoint: 800,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
	]
});
$('.mf-wrapper .mf-items').isotope({
  layoutMode: 'fitRows'
});
var qsRegex;
var $grid = $('.mf-wrapper .mf-items').isotope({
  layoutMode: 'fitRows',
  filter: function() {
    return qsRegex ? $(this).text().match( qsRegex ) : true;
  }
});
var $quicksearch = $('.searchfield').keyup( debounce( function() {
  qsRegex = new RegExp( $quicksearch.val(), 'gi' );
  $grid.isotope();
}, 200 ) );
function debounce( fn, threshold ) {
  var timeout;
  threshold = threshold || 100;
  return function debounced() {
    clearTimeout( timeout );
    var args = arguments;
    var _this = this;
    function delayed() {
      fn.apply( _this, args );
    }
    timeout = setTimeout( delayed, threshold );
  };
}
})(jQuery);
</script>
</body>
</html>
