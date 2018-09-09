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
</div>
<div class="col-md-3 col-sm-3 bg-produto product-menu">
	<p class="title-img-border">PRODUTOS</p>
	<div class="border-img-red"></div>

	<?php

		  $taxonomy     = 'product_cat';
		  $orderby      = 'name';  
		  $show_count   = 0;      // 1 for yes, 0 for no
		  $pad_counts   = 0;      // 1 for yes, 0 for no
		  $hierarchical = 1;      // 1 for yes, 0 for no  
		  $title        = '';  
		  $empty        = 0;

		  $args = array(
		         'taxonomy'     => $taxonomy,
		         'orderby'      => $orderby,
		         'show_count'   => $show_count,
		         'pad_counts'   => $pad_counts,
		         'hierarchical' => $hierarchical,
		         'title_li'     => $title,
		         'hide_empty'   => $empty
		  );
		 $all_categories = get_categories( $args );
		 foreach ($all_categories as $cat) {

		 	if ($cat->name == "Sem categoria") {
		 		continue;
		 	}
		    if($cat->category_parent == 0) {
		        $category_id = $cat->term_id;  
		        if (is_product_category($cat->name)) {
		            echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'" class="menu-active-item">'. $cat->name .'</a>';
		        } else {
		        	echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
		        }     
		        

		        $args2 = array(
		                'taxonomy'     => $taxonomy,
		                'child_of'     => 0,
		                'parent'       => $category_id,
		                'orderby'      => $orderby,
		                'show_count'   => $show_count,
		                'pad_counts'   => $pad_counts,
		                'hierarchical' => $hierarchical,
		                'title_li'     => $title,
		                'hide_empty'   => $empty
		        );
		        $sub_cats = get_categories( $args2 );
		        if($sub_cats) {
		            foreach($sub_cats as $sub_category) {
		                // echo  $sub_category->name ;
		            }   
		        }
		    }       
		}
		?>
</div>
</div>
</div>
</section>
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
