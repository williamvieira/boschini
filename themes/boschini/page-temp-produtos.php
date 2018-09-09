<?php



/**

 * Template Name: Produtos

 */



get_header(); 



?>


<img class="banner-tijolo" src="<?php echo get_template_directory_uri(); ?>/images/img-tijolo.png" alt="">
<section class="product-i section-page">
	<?php while ( have_posts() ) : the_post(); ?>
	<h1 class="title-product"><?php the_title()?></h1>
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9 bg-produto padding-bg-woo">
					<?php the_content(); ?>
			</div>
	<?php endwhile; ?>
			<div class="col-md-3 col-sm-3 bg-produto product-menu">
				<p class="title-img-border">PRODUTOS</p>
				<div class="border-img-red"></div>
				<?php

						wp_nav_menu( array(
							'theme_location' => 'produtos',
							'menu_id'        => 'menu-Produtos',
						) );

				?>
        	</div>
        </div>
    </div>
</section>





<?php

get_footer();