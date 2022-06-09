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
							'link_before'    => '<span>',
							'link_after'     => '</span>',
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
							'link_before'    => '<span>',
							'link_after'     => '</span>',
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
							'link_before'    => '<span>',
							'link_after'     => '</span>',
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
<script>
(function($){
/*var $current = window.location.pathname;
if($current == '/' && window.location.hash){
	var $hash = window.location.hash;
	var $target = $('.scrollto-'+$hash.slice(1)+'');
		$('html, body').animate({
          scrollTop: $target.offset().top - 100
        }, 1000);
}
$('.button, .sg-popup-id-170 a').click(function(e){
	if($(this).hasClass('button-modal-video')){
		setTimeout(function(){
			$('.sgpb-popup-dialog-main-div-wrapper').addClass('video-modal');
		},100);
	}else{
		$('.sgpb-popup-dialog-main-div-wrapper').removeClass('video-modal');
	}
});
$('.modal-link').click(function(e){
	var $html = $(this).parent().find('.bio').html();
	$('#sg-popup-content-wrapper-180 .sgpb-main-html-content-wrapper').html($html);
});
$('#masthead .primary-navigation a').click(function(e){
	var $current = window.location.pathname;
	if($current == '/'){
		e.preventDefault();
		var $hash = $(this).attr('href');
		var $target = $('.scrollto-'+$hash.slice(2)+'');
		$('html, body').animate({
          scrollTop: $target.offset().top - 100
        }, 1000);
	}
});*/
$('.menu-item-has-children a').click(function(e){
	e.preventDefault();
	$(this).parent().toggleClass('active');
	var classList = $(this).parent().attr('class');
	if(classList.indexOf('megamenu--') !== -1){
		var classes = classList.split(/\s+/);
		for (var i = 0; i < classes.length; i++) {
			console.log(classes[i]);
			if (classes[i].indexOf('megamenu--') !== -1) {
				var $mm = classes[i].split('--');
				console.log('here:'+$mm[1]);
				$('.subnavigation .menu--'+$mm[1]).toggle(function(){
					$('.subnavigation').toggleClass('active');
					$('.subnavigation .inner-wrap').slideToggle(500);
				});
			}
		}
	}
});
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
$('.news-wrapper').slick({
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
