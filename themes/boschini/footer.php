<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package boschini
 */

?>

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="col-md-11 col-sm-11 col-centered footer-container">
				<?php $page = new WP_Query([
					'post_type' => 'footer',
					'posts_per_page' => '1'
				]); 
				$i=0;
				while($page->have_posts()) : $page->the_post() ?>
				<?php $content = apply_filters( 'the_content', get_the_content() ); ?>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<?php echo $content; ?>
						</div>
						<div class="col-md-6 col-sm-6 footer-img">
							<?php the_post_thumbnail(); ?>
						</div>
					</div>
				<?php $i++; endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</footer>
<script>
	$(document).ready(function() {
		$('#telefone .item-phone').click(function(e) {  
			if ($('#telefone').hasClass('yes-left')) {
				$('#telefone').addClass("fadeInRight units-none");
				$('#telefone').removeClass("yes-left fadeIn");
			} else {
				$('#telefone').addClass("fadeIn yes-left");
				$('#telefone').removeClass("fadeInRight units-none");
			}	
		});
	});
</script>


<?php wp_footer(); ?>

<script src="<?php bloginfo('template_directory');?>/js/jquery.easing.min.js"></script>
		<script src="<?php bloginfo('template_directory');?>/js/scrolling-nav.js"></script>

</body>
</html>
