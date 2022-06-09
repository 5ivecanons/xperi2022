<?php
/**
* Sections: Layer
*
* @package WordPress
*/

?>

<?php
$modal = 0;
$custom = get_sub_field('customization');
$alignment = get_sub_field('column_alignment');
$padding = get_sub_field('section_padding');
$margin = get_sub_field('section_margin');
$bgcolor = get_sub_field('section_background_color');
$bgimage = get_sub_field('section_background_image');
$bgpos = get_sub_field('section_background_position');
$bgoverlayColor = get_sub_field('section_background_overlay_color');
$bgoverlayFill = get_sub_field('section_background_overlay_fill');
$gradient = get_sub_field('gradient_colors');
$id = get_sub_field('section_id');
$classes = get_sub_field('section_classes');
$attributes = get_sub_field('section_data_attributes');
$overlay = '';
$style = ' style="';
if($padding && in_array('Padding', $custom)){
	$style .= 'padding: '.$padding.'; ';
}
if($margin && in_array('Margin', $custom)){
	$style .= 'margin: '.$margin.'; ';
}
if($bgcolor && in_array('Background Color', $custom)){
	$style .= 'background-color: '.$bgcolor.'; ';
}
if($bgimage && in_array('Background Image', $custom)){
	$style .= 'background-image: url('.$bgimage['url'].'); ';
	if($bgpos){
		$style .= 'background-position: '.$bgpos.'; ';
	}
}
if($bgoverlayColor && $bgoverlayFill && in_array('Background Overlay', $custom)){
	$overlay .= '<div class="section-overlay" style="background-color: '.$bgoverlayColor.'; opacity: '.$bgoverlayFill.';"></div>';
}
if($gradient && in_array('Gradient Background', $custom)){
	$count = 1;
	foreach($gradient as $g){
		if($count == 1){
			$style .= 'background: '.$g['color'].'; background: linear-gradient('.$g['degree'].'deg, ';
		}
		if($count != count($gradient)){
			$style .= $g['color'].' '.$g['percentage'].'%, ';
		}else{
			$style .= $g['color'].' '.$g['percentage'].'%';
		}
		$count++;
	}
	$style .= '); ';
}
$style .= '"';
?>

<section class="layer<?php if(in_array('Full Width', $custom)){ ?> full-width-layer<?php } ?><?php if($alignment && in_array('Column Alignment', $custom)){echo ' '.$alignment;} ?><?php if($classes && in_array('Custom Class', $custom)){echo ' '.$classes;} ?>"<?php if($id && in_array('ID', $custom)){echo ' id="'.$id.'"';} ?><?php echo $style; ?><?php if($attributes && in_array('Data Attributes', $custom)){foreach($attributes as $a){echo ' '.$a['name'].'='.$a['value'];}} ?>>
	<?php if(!in_array('Full Width', $custom)){ ?>
	<div class="container">
	<?php } ?>
	<div class="row">
		<?php 
		if(get_sub_field('column')){
			foreach(get_sub_field('column') as $c){
				$customization = $c['customization'];
				$columnColor = $c['background_color'];
				$columnBGimage = $c['background_image'];
				$customClass = $c['custom_class'];
				$colWidth = $c['column_width'];
				$colOffset = $c['column_offset'];
				$colType = $c['column_type'];
				$colPadding = $c['padding'];
				$colPaddingBot = $c['padding_bottom'];
				$animation = $c['animation'];
				$colStyle = ' style="';
				if($columnColor && in_array('Background Color', $customization)){
					$colStyle .= 'background-color: '.$columnColor.'; ';
				}
				if($columnBGimage && in_array('Background Image', $customization)){
					$colStyle .= 'background-image: url('.$columnBGimage['url'].'); ';
					$colStyle .= 'background-size: cover; ';
					$colStyle .= 'background-position: 50% 0; ';
				}
				if($colPadding && in_array('Margin', $customization)){
					$colStyle .= 'margin-top: '.$colPadding.'; ';
				}
				if($colPaddingBot && in_array('Margin', $customization)){
					$colStyle .= 'margin-bottom: '.$colPaddingBot.'; ';
				}
				$colStyle .= '"';
		?>
		<div class="layer-column col-sm-<?php echo $colWidth; ?><?php if(in_array('Center All Text', $customization)){echo ' layer-column--center-text';} ?><?php if($colOffset && in_array('Column Offset', $customization)){echo ' offset-sm-'.$colOffset;} ?><?php if($animation && in_array('Animate Column', $customization)){echo ' wow-animation animate__animated animate__'.$animation;}?><?php if($customClass && in_array('Custom Class', $customization)){echo ' '.$customClass;} ?>"<?php echo $colStyle; ?>>
			<?php if($colType){ ?>
			<?php foreach($colType as $t){ ?>
			<?php if($t['block'] == 'Heading'){ ?>
			<?php 
			$headingStyle = '';
			if($t['heading_color'] || $t['heading_font_size']){
				$headingStyle .= ' style="';
				if($t['heading_color']){
					$headingStyle .= 'color: '.$t['heading_color'].';';
				}
				if($t['heading_font_size']){
					$headingStyle .= 'font-size: '.$t['heading_font_size'].';';
				}
				$headingStyle .= '"';
			}
			?>
			<div class="layer-block layer-block--heading">
				<<?php echo $t['heading_tag']; ?><?php echo $headingStyle; ?>><?php echo $t['heading']; ?></<?php echo $t['heading_tag']; ?>>
			</div>
			<?php } ?>
			
			<?php if($t['block'] == 'HTML'){ ?>
			<div class="layer-block layer-block--html">
				<?php echo $t['html']; ?>
			</div>
			<?php } ?>
			
			<?php if($t['block'] == 'Image'){ ?>
			<div class="layer-block layer-block--image">
				<img src="<?php echo $t['image']['url']; ?>" alt="<?php echo $t['image']['alt']; ?>">
			</div>
			<?php } ?>
				
			<?php if($t['block'] == 'Button'){ ?>
			<div class="layer-block layer-block--button">
				<?php foreach($t['buttons'] as $b){ ?>
				<a href="<?php echo $b['button_url']; ?>" class="button btn<?php if($b['button_style'] != 'default'){ echo ' '.$b['button_style'];} ?><?php if($b['use_modal']){ echo ' button-modal';} ?><?php if($b['add_class']){ echo ' '.$b['add_class']; } ?>"<?php if(strpos($b['button_url'], 'youtube') !== false){echo ' data-lity';} ?>><?php echo $b['button_text']; ?></a>
				<?php } ?>
			</div>
			<?php } ?>

			<?php if($t['block'] == 'Leadership Tile'){ ?>
			<?php $modal = 1; ?>
			<div class="layer-block layer-block--leadership-tile">
				<div class="image">
					<img src="<?php echo $t['leadership_image']['url']; ?>" alt="<?php echo $t['leadership_image']['alt']; ?>">
				</div>
				<div class="name"><?php echo $t['leadership_name']; ?></div>
				<div class="title"><?php echo $t['leadership_title']; ?></div>
				<?php if($t['linkedin_link']){ ?>
				<div class="linkedin">
					<a href="<?php echo $t['linkedin_link']; ?>" target="_blank">
						<img src="/wp-content/uploads/2021/11/IN.jpg" alt="linkedin">
					</a>
				</div>
				<?php } ?>
				<div class="bio">
					<a href="#">Read Bio</a>
					<div class="bio-text"><?php echo $t['leadership_bio']; ?></div>
				</div>
			</div>
			<?php } ?>
				
			<?php if($t['block'] == 'Flip Tile'){ ?>
			<div class="layer-block layer-block--fliptile">
				<div class="flip-card">
					<div class="flip-card-inner">
						<div class="flip-card-front">
							<?php foreach($t['flip_tile_front'] as $b) { ?>
							<div class="heading"><?php echo $b['heading']; ?></div>
							<?php if($b['tile_image']){ ?>
							<div class="image">
								<img src="<?php echo $b['tile_image']['url']; ?>" alt="<?php echo $b['tile_image']['alt']; ?>">
							</div>
							<?php } /*?>
							<div class="indicator">
								<img src="https://assura.staging.dev/wp-content/uploads/2021/11/green-circle.png" alt="green arrow">
							</div>
							<?php*/ } ?>
						</div>
						<div class="flip-card-back">
							<?php foreach($t['flip_tile_back'] as $b) { ?>
							<div class="back-content">
								<?php echo $b['content']; ?>
							</div>
							<?php /* 
							<div class="indicator">
								<img src="https://assura.staging.dev/wp-content/uploads/2021/11/white-circle.png" alt="white arrow">
							</div>
							*/ ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
				
			<?php if($t['block'] == 'Blog Post'){ ?>
			<div class="layer-block layer-block--post">
				<?php foreach($t['blog_post'] as $b) { ?>
				<div class="type"><?php echo $b['type']; ?></div>
				<div class="image">
					<img src="<?php echo $b['image']['url']; ?>" alt="<?php echo $b['image']['alt']; ?>">
				</div>
				<div class="title"><?php echo $b['heading']; ?></div>
				<div class="meta">
					<span class="meta-item"><?php echo $b['type']; ?></span><span class="split">|</span><span class="meta-item"><?php echo $b['date']; ?></span><span class="split">|</span><span class="meta-item">by <?php echo $b['author']; ?></span>
				</div>
				<div class="excerpt">
					<?php echo $b['excerpt']; ?>
				</div>
				<div class="button-row">
					<a href="<?php echo $b['link']; ?>" class="button btn">Read More</a>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
				
			<?php if($t['block'] == 'Icon'){ ?>
			<div class="layer-block layer-block--icon">
				<?php
				$options = ' style="';
				if($t['icon_size']){
					$options .= 'font-size: '.$t['icon_size'].'; ';
				}
				if($t['icon_color']){
					$options .= 'color: '.$t['icon_color'].'; ';
				}
				$options .= '"';
				?>
				<span<?php echo $options; ?>><?php echo $t['icon']; ?></span>
			</div>
			<?php } ?>
				
			<?php if($t['block'] == 'Shortcode'){ ?>
			<div class="layer-block layer-block--shortcode">
				<?php echo do_shortcode($t['shortcode']); ?>
			</div>
			<?php } ?>
			
			<?php if($t['block'] == 'Carousel'){ ?>
			<?php
			$options = $t['carousel_options'];
			$arrows = 'false';
			$dots = 'false';
			$speed = 5000;
			$autoplay = 'true';
			if(in_array('Arrows', $options)){
				$arrows = 'true';
			}
			if(in_array('Dots', $options)){
				$dots = 'true';
			}
			if(!in_array('Autoplay', $options)){
				$autoplay = 'false';
			}
			if(in_array('Speed', $options)){
				$speed = $t['carousel_speed'];
			}
			?>
			<div class="layer-block layer-block--carousel" data-slick='{"infinite": true, "slidesToShow": 1, "slidesToScroll": 1, "arrows": <?php echo $arrows; ?>, "dots": <?php echo $dots; ?>, "autoplay": <?php echo $autoplay; ?>, "autoplaySpeed": <?php echo $speed; ?>, "prevArrow": "<i class=\"fas fa-arrow-left\"></i>", "nextArrow": "<i class=\"fas fa-arrow-right\"></i>"}'>
				<?php
				foreach($t['carousel_slides'] as $s){
					$cols = $s['columns'];
				?>
				<div class="carousel-slide"<?php if($s['background_image']){ echo ' style="background-image: url('.$s['background_image']['url'].')"'; } ?>>
					<div class="slide-inner-wrap">
						<div class="slide-content-wrap">
							<div class="row">
								<?php foreach($cols as $c) { ?>
								<div class="col-sm-<?php echo $c['column_size']; ?>">
									<?php echo do_shortcode($c['content']); ?>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
				?>
			</div>
			<?php } ?>
			<?php } ?>
			<?php } ?>
		</div>
		<?php
			}
		} ?>
	</div>
	<?php if(!in_array('Full Width', $custom)){ ?>
	</div>
	<?php } ?>
	<?php echo $overlay; ?>
	<?php if($modal == 1){ ?>
	<div class="leadership-modal">
		<div class="name">TBA</div>
		<div class="title">TBA</div>
		<div class="bio">TBA</div>
		<div class="close">X</div>
	</div>
	<?php } ?>
</section>
