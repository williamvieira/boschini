<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package boschini
 */

get_header();
?>

	<?php if (is_page('home')) : ?>
		<div class="">
	<?php else : ?>
		<img class="banner-tijolo" src="<?php echo get_template_directory_uri(); ?>/images/img-tijolo.png" alt="">
		<section class="product-i section-page">
			<?php while ( have_posts() ) : the_post(); ?>
			<h1 class="title-product"><?php the_title()?></h1>
			<?php endwhile; ?>
			<div class="container bg-produto padding-bg-produto">
		
	<?php endif; ?>
	 	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); endwhile; ?>
	
<?php if (is_page('home')) : ?>
		</div>
	<?php else : ?>
				
			</div>
		</section>
	<?php endif; ?>

	










<?php
// get_sidebar();
get_footer();
