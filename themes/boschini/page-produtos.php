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
global $product;
get_header();
?>


<img class="banner-tijolo" src="<?php echo get_template_directory_uri(); ?>/images/img-tijolo.png" alt="">
<section class="product-i section-page">
	<?php while ( have_posts() ) : the_post(); ?>
	<h1 class="title-product"><?php the_title()?></h1>
	<?php endwhile; ?>
	<div class="container bg-produto padding-bg-produto">
		<div class="row" style="padding-bottom: 15px;">
			<div class="col-md-7 col-sm-7">
				<?php


				        $args = array( 'post_type' => 'categorias', 'posts_per_page' => 4, 'product_cat' => '', 'order' => 'ASC' );
				        $loop = new WP_Query( $args );
				        $iLanc = 0;
				        while ( $loop->have_posts() ) : $loop->the_post(); 
				        echo '<div class="col-md-6 col-sm-6 body-product-i" style="padding-right: 0px;">';
				        the_post_thumbnail();
				        echo '<li class="title-product-item"><a href="' . get_post_meta($post->ID, 'Link da página', true) . '">' . get_the_title() . '</a></li>';		
				   		echo "</div>";
				   		endwhile; 
		    		 	wp_reset_query(); 
				    
				 //  	$taxonomyName = "product_cat";
					// //This gets top layer terms only.  This is done by setting parent to 0.  
				 //    $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false));
				 //    $i = 0;
				 //    foreach ($parent_terms as $pterm) {

				 //    	if ($i < 4) {
					// 	    echo '<div class="col-md-6 col-sm-6 body-product-i" style="padding-right: 0px;">';

					// 	        $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
					// 	        // get the image URL for parent category
					// 	        $image = wp_get_attachment_url($thumbnail_id);
					// 	        // print the IMG HTML for parent category
					// 	        echo "<img src='{$image}' alt='' width='400' height='400' />";

					// 	        // //show parent categories
					// 	        // echo '<li class="title-product-item"><a href="' . get_term_link($pterm->name, $taxonomyName) . '">' . $pterm->name . '</a></li>';

					// 	        if ($pterm->name == 'Blazers') {
					// 	        	//show parent categories
					// 	        echo '<li class="title-product-item"><a href="http://boschini.consultoriakairos.com.br/blazers/">' . $pterm->name . '</a></li>';
					// 	        }
					// 	         if ($pterm->name == 'Calças') {
					// 	        	//show parent categories
					// 	        echo '<li class="title-product-item"><a href="http://boschini.consultoriakairos.com.br/calcas-2/">' . $pterm->name . '</a></li>';
					// 	        }
					// 	         if ($pterm->name == 'Camisas') {
					// 	        	//show parent categories
					// 	        echo '<li class="title-product-item"><a href="http://boschini.consultoriakairos.com.br/camisas/">' . $pterm->name . '</a></li>';
					// 	        }
					// 	         if ($pterm->name == 'Camisetas') {
					// 	        	//show parent categories
					// 	        echo '<li class="title-product-item"><a href="http://boschini.consultoriakairos.com.br/camisetas-2/">' . $pterm->name . '</a></li>';
					// 	        }

					// 	        //Get the Child terms
					// 	        $terms = get_terms($taxonomyName, array('parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false));
					// 	        foreach ($terms as $term) {

					// 	            // echo '<li><a href="' . get_term_link($term->name, $taxonomyName) . '">' . $term->name . '</a></li>';
					// 	            // $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
					// 	            // // get the image URL for child category
					// 	            // $image = wp_get_attachment_url($thumbnail_id);
					// 	            // // print the IMG HTML for child category
					// 	            // echo "<img src='{$image}' alt='' width='400' height='400' />";

					// 	        }

					// 	    echo '</div>';  
				 //    	}

				 //    	$i++;
				 //    }
				?> 
			</div>
			<div class="col-md-5 col-sm-5" style="padding-left: 0px;">
				<div id="lancamentos" class="carousel slide bannerProduct" data-ride="carousel">
				 	   <!-- Indicators -->
					  <ol class="carousel-indicators">
					    <li data-target="#lancamentos" data-slide-to="0" class="active"></li>
					    <li data-target="#lancamentos" data-slide-to="1"></li>
					    <li data-target="#lancamentos" data-slide-to="2"></li>
					    <li data-target="#lancamentos" data-slide-to="3"></li>
					  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				  	<?php
				        $args = array( 'post_type' => 'categorias', 'posts_per_page' => 4, 'product_cat' => '', 'orderby' => 'rand' );
				        $loop = new WP_Query( $args );
				        $iLanc = 0;
				        while ( $loop->have_posts() ) : $loop->the_post(); global $product; 
				    ?>
				    <?php if ($iLanc == 0) : ?>
				    	<div class="item active">
				    <?php else : ?>
				        <div class="item">
				    <?php endif; ?>
				      	<?php the_post_thumbnail();  //woocommerce_show_product_sale_flash( $post, $product ); ?>
				      	<?php //if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'full'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
						<!-- <span class="price"><?php //echo $product->get_price_html(); ?></span>      -->
                        <!--  <?php //woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?> -->
						<a href="<?php echo get_post_meta($post->ID, 'Link da página', true); //echo get_permalink( $loop->post->ID ) ?>" class="bannerP-title" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
							<?php the_title(); ?>
						</a>	
						<div class="slide-product-absolute"></div>			   
				    </div>
				    <?php $iLanc++; endwhile; ?>
		    		<?php wp_reset_query(); ?>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#lancamentos" data-slide="prev">
				    <div class="product-left"></div>
				  </a>
				  <a class="right carousel-control" href="#lancamentos" data-slide="next">
				     <div class="product-right"></div>
				  </a>
				</div>
			</div>	
		</div>
		</div>
		<div class="row">
			<div class="col-md-5 col-sm-5" style="padding-right: 0px; padding-left: 30px;">
				<div id="ternos" class="carousel slide bannerProduct" data-ride="carousel">
				 	   <!-- Indicators -->
					  <ol class="carousel-indicators">
					    <li data-target="#ternos" data-slide-to="0" class="active"></li>
					    <li data-target="#ternos" data-slide-to="1"></li>
					    <li data-target="#ternos" data-slide-to="2"></li>
					    <li data-target="#ternos" data-slide-to="3"></li>
					  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				  	<?php
				        $args = array( 'post_type' => 'categorias', 'posts_per_page' => 4, 'product_cat' => '', 'orderby' => 'rand' );
				        $loop = new WP_Query( $args );
				        $iLanc = 0;
				        while ( $loop->have_posts() ) : $loop->the_post(); 
				    ?>
				    <?php if ($iLanc == 0) : ?>
				    	<div class="item active">
				    <?php else : ?>
				        <div class="item">
				    <?php endif; ?>
				      	<?php the_post_thumbnail(); //woocommerce_show_product_sale_flash( $post, $product ); ?>
				      	<?php //if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'full'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
						<!-- <span class="price"><?php //echo $product->get_price_html(); ?></span>      -->
                        <!--  <?php //woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?> -->
						<a href="<?php echo get_post_meta($post->ID, 'Link da página', true); //echo get_permalink( $loop->post->ID ) ?>" class="bannerP-title">
							<?php the_title(); ?>
						</a>	
						<div class="slide-product-absolute"></div>			   
				    </div>
				    <?php $iLanc++; endwhile; ?>
		    		<?php wp_reset_query(); ?>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#ternos" data-slide="prev">
				    <div class="product-left"></div>
				  </a>
				  <a class="right carousel-control" href="#ternos" data-slide="next">
				     <div class="product-right"></div>
				  </a>
				</div>
			</div>
			</div>
			<div class="col-md-7 col-sm-7">
				<?php 

						$args = array( 'post_type' => 'categorias', 'offset' => 4, 'posts_per_page' => 4, 'product_cat' => '', 'order' => 'ASC', 'post__not_in' => array( 578, 579 ));
				        $loop = new WP_Query( $args );
				        $iLanc = 0;
				        while ( $loop->have_posts() ) : $loop->the_post(); 

				        // if (get_the_title() === "Lançamentos") {
				        // 	continue;
				        // }

				        echo '<div class="col-md-6 col-sm-6 body-product-i" style="padding-right: 0px;">';
				        the_post_thumbnail();
				        echo '<li class="title-product-item"><a href="' . get_post_meta($post->ID, 'Link da página', true) . '">' . get_the_title() . '</a></li>';		
				   		echo "</div>";
				   		endwhile; 
		    		 	wp_reset_query(); 

				 //  	$taxonomyName = "product_cat";
					// //This gets top layer terms only.  This is done by setting parent to 0.  
				 //    $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'rand', 'hide_empty' => false));
				 //    $i = 0;
				 //    foreach ($parent_terms as $pterm) {

				 //    	if ($pterm->name == "Lançamentos" or $pterm->name == "Sem categoria" or $pterm->name == "Ternos") {
				 //    		continue;
				 //    	}

				 //    	if ($i > 3 && $i < 8) {
					// 	    echo '<div class="col-md-6 col-sm-6 body-product-i" style="padding-left: 0px;">';

					// 	        $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
					// 	        // get the image URL for parent category
					// 	        $image = wp_get_attachment_url($thumbnail_id);
					// 	        // print the IMG HTML for parent category
					// 	        echo "<img src='{$image}' alt='' width='400' height='400' />";

					// 	        //show parent categories
					// 	        // echo '<li class="title-product-item"><a href="' . get_term_link($pterm->name, $taxonomyName) . '">' . $pterm->name . '</a></li>';

					// 	        if ($pterm->name == 'Cinto') {
					// 	        	//show parent categories
					// 	        echo '<li class="title-product-item"><a href="http://boschini.consultoriakairos.com.br/cinto-2/">' . $pterm->name . '</a></li>';
					// 	        }

					// 	        if ($pterm->name == 'Gravatas') {
					// 	        	//show parent categories
					// 	        echo '<li class="title-product-item"><a href="http://boschini.consultoriakairos.com.br/gravatas-2/">' . $pterm->name . '</a></li>';
					// 	        }

					// 	        if ($pterm->name == 'Jeans') {
					// 	        	//show parent categories
					// 	        echo '<li class="title-product-item"><a href="http://boschini.consultoriakairos.com.br/jeans/">' . $pterm->name . '</a></li>';
					// 	        }

					// 	        if ($pterm->name == 'Underwear') {
					// 	        	//show parent categories
					// 	        echo '<li class="title-product-item"><a href="http://boschini.consultoriakairos.com.br/underwear-2/">' . $pterm->name . '</a></li>';
					// 	        }

					// 	        //Get the Child terms
					// 	        $terms = get_terms($taxonomyName, array('parent' => $pterm->term_id, 'orderby' => '', 'hide_empty' => false));
					// 	        foreach ($terms as $term) {

					// 	            // echo '<li><a href="' . get_term_link($term->name, $taxonomyName) . '">' . $term->name . '</a></li>';
					// 	            // $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
					// 	            // // get the image URL for child category
					// 	            // $image = wp_get_attachment_url($thumbnail_id);
					// 	            // // print the IMG HTML for child category
					// 	            // echo "<img src='{$image}' alt='' width='400' height='400' />";

					// 	        }

					// 	    echo '</div>';  
				 //    	}

				 //    	$i++;
				 //    }
				?> 
			</div>
				
		</div>
	</div>
</section>
<section class="padding-top-20 padding-bottom-50 bg-white">
	<h2 class="title-border">CONFIRA AS MARCAS QUE TRABALHAMOS</h2>
	<div class="border-title-red"></div>
	<?php
		echo do_shortcode( '[marcasHome]');
		echo do_shortcode( '[marcasHomeMobile]');
	?>
</section>

<?php
// get_sidebar();
get_footer();