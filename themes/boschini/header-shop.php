<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package boschini
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/reset.css"> <!-- CSS reset -->

	<!-- Menu CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/menu/style.css">
	<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"
  integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw"
  crossorigin="anonymous">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400|Merriweather:300,400" rel="stylesheet">

	<!-- FONTAWESOME -->
	<script src="https://use.fontawesome.com/8df0f545f4.js"></script>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
	<script>	
		document.addEventListener('gesturestart', function (e) {
			e.preventDefault();
		});
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php //if (is_page('home')) : ?>
<nav class="desktop navbar navbar-default navbar-fixed-top navbar-bootsnipp animate menu-scroll-yes" role="navigation">
<?php //else : ?>
<!-- <nav class="menu-scroll desktop navbar navbar-default navbar-fixed-top navbar-bootsnipp animate" role="navigation"> -->
<?php //endif; ?>
	<div class="container">
		<div class="col-md-12 col-sm-12 menu-absolute no-padding-mobile">
			<?php
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'bs-example-navbar-collapse-1',
					'menu_class'        => 'nav navbar-nav',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker()
				) );
			?>
		</div>
	</div>
	<div class="border-menu"></div>
</nav>

<div id="telefone" class="units-contact animated yes-left">
	<div class="item-phone">
		<div class="phone-icon"></div>
	</div>
	<div class="contact-body">
		<p class="contact-title">Telefones para Contato</p>
		<?php $page = new WP_Query([
			'post_type' => 'bannersProjetos'
		]); 
		$i=0;
		while($page->have_posts()) : $page->the_post() ?>
		<div class="contact-item">
			<p><?php the_title(); ?></p>
			<?php the_content(); ?>
		</div>
		<?php $i++; endwhile; ?>
	</div>
</div>

<div class="header-mobile mobile">
	<div class="row">
		<div class="col-xs-6">
			<a href="<?php echo get_home_url() ?>" class="logo">Boschini</a>
		</div>
		<div class="col-xs-6">
			<div id="o-wrapper" class="menu-collapse o-wrapper menu-mobile">
				<div class="btn-menu o-content">
					<div class="o-container">
						<div class="c-buttons">
							<button type="button" id="c-button--slide-right" class="navbar-toggle c-button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Menu Mobile -->
<nav id="c-menu--slide-right" class="c-menu c-menu--slide-right">
	<div id="menu-mobile" class="mobile" role="navigation">
		<div class="row">	
		<?php

				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
				) );

		?>
		</div>
		<button class="c-menu__close">&rarr;</button>
	</div>
</nav>

<div id="c-mask" class="c-mask"></div><!-- /c-mask -->

<!-- menus script -->
<script src="<?php echo get_template_directory_uri(); ?>/menu/menu.js"></script>

<!-- scripts -->
<script src="<?php echo get_template_directory_uri(); ?>/menu/scripts.js"></script>

<img class="banner-tijolo" src="<?php echo get_template_directory_uri(); ?>/images/img-tijolo.png" alt="">
		<section class="product-i section-page">

			<?php if ( is_singular( 'product' ) ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<h1 class="title-product"><?php the_title()?></h1>
				<?php endwhile; ?>
		    <?php else : ?>
		     	<h1 class="title-product"><?php woocommerce_page_title(); ?></h1>
		    <?php endif; ?>
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-sm-9 bg-produto padding-bg-woo">
					