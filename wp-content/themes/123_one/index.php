<?php get_header(); ?>

<main class="home">
	<section class="home-hero hero">
		<div class="home-hero-text hero-text">
			<h1 class="home-hero-text-header hero-text-header"><?php echo get_field('home-hero-header-text', 'option'); ?></h1>
			<a href="<?php echo site_url(); ?>/company" class="home-hero-text-button">learn more</a>	
		</div>
		<?php $rows = get_field('general-home-slider', 'option'); ?>
		<?php if(have_rows('general-home-slider', 'option') && count($rows) >= 3): ?>
		<div class="home-hero-slides">
			<?php while(have_rows('general-home-slider', 'option')): the_row(); ?>
				<div style="background-image: url('<?php echo get_sub_field('general-home-slider-image'); ?>');" class="home-hero-slides-slide"></div>
			<?php endwhile; ?>
		<?php else: ?>
			<div style="background-image: url('<?php echo get_template_directory_uri(); ?>/library/img/home/slides/slide01.jpg');" class="home-hero-slides-slide"></div>
			<div style="background-image: url('<?php echo get_template_directory_uri(); ?>/library/img/home/slides/slide02.jpg');" class="home-hero-slides-slide"></div>
			<div style="background-image: url('<?php echo get_template_directory_uri(); ?>/library/img/home/slides/slide03.jpg');" class="home-hero-slides-slide"></div>
			<div style="background-image: url('<?php echo get_template_directory_uri(); ?>/library/img/home/slides/slide04.jpg');" class="home-hero-slides-slide"></div>
		</div>
		<?php endif; ?>
		<div class="home-hero-tint hero-tint"></div>
	</section>
	<?php if(get_field('services-toggle', 'option')): ?>
	<section class="services-services">
		<h2 class="home-services-header section-header">Services</h2>
		<?php if(have_rows('services-repeater', 'option')) : ?>
		<div class="services-services-grid">
			<?php while(have_rows('services-repeater', 'option')): the_row();  ?>
			<div class="services-services-grid-item">
				<h3 class="services-services-grid-item-header"><?php echo get_sub_field('service-name', 'option'); ?></h3>
				<div class="services-services-grid-item-imagecontainer">
					<img src="<?php echo get_sub_field('service-image', 'option'); ?>" class="services-services-grid-item-imagecontainer-image">
				</div>
				<div class="services-services-grid-item-descriptioncontainer">
					<div class="services-services-grid-item-descriptioncontainer-description"><?php echo get_sub_field('service-description', 'option'); ?></div>
				</div>
				<div class="services-services-grid-item-pricecontainer">
					<div class="services-services-grid-item-pricecontainer-price"><?php echo get_sub_field('service-price', 'option'); ?></div>
				</div>
			</div>
			<?php 
			if(get_row_index() > 1){
				break;
			}
			endwhile; ?>
		</div>
		<a href="<?php echo site_url(); ?>/services" class="home-services-viewall">view all</a>
		<?php endif; ?>
	</section>
	<?php endif; ?>
	<?php if(have_rows('testimonials-repeater', 'option') && get_field('testimonials-toggle', 'option')): ?>
	<section class="<?php echo get_field('services-toggle', 'option') == false ? 'unfancytestimonials' : ''; ?> home-testimonials section">
		<h2 class="home-testimonials-header section-header">Testimonials</h2>
		<?php if(have_rows('testimonials-repeater', 'option')): ?>
		<div class="home-testimonials-grid">
			<?php while(have_rows('testimonials-repeater', 'option')): the_row(); 

			$select = get_sub_field('testimonials-repeater-select', 'option');
			$grid_item_class = $select == 'youtube' ? 'testimonials-youtubegriditem' : ''; 

			?>
			<div class="home-testimonials-grid-item <?php echo $grid_item_class ?>">
				<?php if( get_sub_field('testimonials-repeater-select', 'option') == 'personal' ): ?>
				<div class="home-testimonials-grid-item-quote">“<?php echo get_sub_field('testimonials-repeater-quote'); ?>”</div>
				<div class="home-testimonials-grid-item-personinfo">
					<div class="home-testimonials-grid-item-personinfo-name">- <?php echo get_sub_field('testimonials-repeater-name'); ?></div>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/library/img/home/testimonials/quotemark.png" class="home-testimonials-grid-item-quotemark">
				<img src="<?php echo get_sub_field('testimonials-repeater-image') ?>" class="home-testimonials-grid-item-image">
				<?php endif; ?>
				<?php if( get_sub_field('testimonials-repeater-select', 'option') == 'youtube' ): ?>
					<div class="home-testimonials-grid-item-youtubecontainer"><iframe width="320" height="240" src="https://www.youtube.com/embed/<?php echo get_sub_field('testimonials-repeater-youtube', 'option'); ?>" frameborder="0" allowfullscreen></iframe></div>
				<?php endif; ?>
			</div>
			<?php endwhile; ?>
			<div class="home-testimonials-arrows">
				<i class="home-testimonials-arrows-left fa fa-angle-left grey"></i>
				<i class="home-testimonials-arrows-right fa fa-angle-right"></i>
			</div>
		</div>
		<?php endif; ?>
		<a href="<?php echo site_url() ?>/testimonials" class="home-testimonials-viewall">view all</a>
	</section>
	<?php endif; ?>
	<section class="home-areasserved section">
		<h2 class="home-areasserved-header section-header">Areas Served</h2>
		<div class="home-areasserved-map">
			<a href="<?php echo site_url(); ?>/areas-served" class="home-areasserved-map-learnmore" href="<?php echo get_template_directory_uri() ?>/areasserved">learn more</a>
			<div class="home-areasserved-map-tint"></div>
			<div class="home-areasserved-map-gmap" id="map"></div>
		</div>
	</section>
</main>

<?php get_footer(); ?>