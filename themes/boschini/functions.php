<?php
/**
 * boschini functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package boschini
 */

if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
	// file exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

if ( ! function_exists( 'boschini_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function boschini_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on boschini, use a find and replace
		 * to change 'boschini' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'boschini', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'cunha' ),
			'produtos' => esc_html__( 'Menu Produtos', 'cunha' )
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'boschini_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'boschini_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function boschini_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'boschini_content_width', 640 );
}
add_action( 'after_setup_theme', 'boschini_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function boschini_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'boschini' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'boschini' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'boschini_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function boschini_scripts() {
	wp_enqueue_style( 'boschini-style', get_stylesheet_uri() );

	wp_enqueue_script( 'boschini-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'boschini-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'boschini_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action('init', 'twtema_action_init');
function twtema_action_init()
{
	twtema_registrar_custom_post_type();
}

function twtema_registrar_custom_post_type() {

	$descritivosCategorias = array(
		'name' => 'Page Categoria',
		'singular_name' => 'Page Categoria',
		'add_new' => 'Adicionar Nova Categoria',
		'add_new_item' => 'Adicionar Categoria',
		'edit_item' => 'Editar Categoria',
		'new_item' => 'Nova Categoria',
		'view_item' => 'Ver Categoria',
		'search_items' => 'Procurar Categoria',
		'not_found' =>  'Nenhum Categoria encontrado',
		'not_found_in_trash' => 'Nenhum Categoria na Lixeira',
		'parent_item_colon' => '',
		'menu_name' => 'Page Categoria'
	);

	$argsCategorias = array(
		'labels' => $descritivosCategorias,  //Insere o Array de labels dentro do argumento de labels
		'public' => true,  //Se o Custom Type pode ser adicionado aos menus e exibidos em buscas
		'hierarchical' => false,  //Se o Custom Post pode ser hierarquico como as páginas
		'menu_position' => 5,  //Posição do menu que será exibido
		'menu_icon'           => 'dashicons-category',
		'supports' => array('thumbnail','title', 'custom-fields') //Quais recursos serão usados (metabox)
    );

	register_post_type( 'categorias' , $argsCategorias );


	flush_rewrite_rules();

	$telefoneContato = array(
		'name' => 'Telefone',
		'singular_name' => 'Telefone',
		'add_new' => 'Adicionar Novo Telefone',
		'add_new_item' => 'Adicionar Telefone',
		'edit_item' => 'Editar Telefone',
		'new_item' => 'Novo Telefone',
		'view_item' => 'Ver Telefone',
		'search_items' => 'Procurar Telefone',
		'not_found' =>  'Nenhum Telefone encontrado',
		'not_found_in_trash' => 'Nenhum Telefone na Lixeira',
		'parent_item_colon' => '',
		'menu_name' => 'Telefones'
	);

	$argsTelefone = array(
		'labels' => $telefoneContato,  //Insere o Array de labels dentro do argumento de labels
		'public' => true,  //Se o Custom Type pode ser adicionado aos menus e exibidos em buscas
		'hierarchical' => false,  //Se o Custom Post pode ser hierarquico como as páginas
		'menu_position' => 5,  //Posição do menu que será exibido
		'menu_icon' => 'dashicons-phone',
		'supports' => array('title', 'editor') //Quais recursos serão usados (metabox)
    );

	register_post_type( 'bannersProjetos' , $argsTelefone );


	flush_rewrite_rules();

	$footer = array(
		'name' => 'Footer',
		'singular_name' => 'Footer',
		'add_new' => 'Adicionar Novo Footer',
		'add_new_item' => 'Adicionar Footer',
		'edit_item' => 'Editar Footer',
		'new_item' => 'Novo Footer',
		'view_item' => 'Ver Footer',
		'search_items' => 'Procurar Footer',
		'not_found' =>  'Nenhum Footer encontrado',
		'not_found_in_trash' => 'Nenhum Footer na Lixeira',
		'parent_item_colon' => '',
		'menu_name' => 'Footer'
	);

	$argsFooter = array(
		'labels' => $footer,  //Insere o Array de labels dentro do argumento de labels
		'public' => true,  //Se o Custom Type pode ser adicionado aos menus e exibidos em buscas
		'hierarchical' => false,  //Se o Custom Post pode ser hierarquico como as páginas
		'menu_position' => 5,  //Posição do menu que será exibido
		'menu_icon' => 'dashicons-editor-insertmore',
		'supports' => array('title', 'editor', 'thumbnail') //Quais recursos serão usados (metabox)
    );

	register_post_type( 'footer' , $argsFooter );


	flush_rewrite_rules();

	$marcas = array(
		'name' => 'Marca',
		'singular_name' => 'Marca',
		'add_new' => 'Adicionar Nova Marca',
		'add_new_item' => 'Adicionar Marca',
		'edit_item' => 'Editar Marca',
		'new_item' => 'Nova Marca',
		'view_item' => 'Ver Marca',
		'search_items' => 'Procurar Marca',
		'not_found' =>  'Nenhum Marca encontrado',
		'not_found_in_trash' => 'Nenhum Marca na Lixeira',
		'parent_item_colon' => '',
		'menu_name' => 'Marcas Home'
	);

	$argsMarcas = array(
		'labels' => $marcas,  //Insere o Array de labels dentro do argumento de labels
		'public' => true,  //Se o Custom Type pode ser adicionado aos menus e exibidos em buscas
		'hierarchical' => false,  //Se o Custom Post pode ser hierarquico como as páginas
		'menu_position' => 5,  //Posição do menu que será exibido
		'menu_icon' => 'dashicons-awards',
		'supports' => array('title', 'thumbnail') //Quais recursos serão usados (metabox)
    );

	register_post_type( 'marcas' , $argsMarcas );


	flush_rewrite_rules();
	
	$Produtos = array(
		'name' => 'Produto',
		'singular_name' => 'Produto',
		'add_new' => 'Adicionar Nova Produto',
		'add_new_item' => 'Adicionar Produto',
		'edit_item' => 'Editar Produto',
		'new_item' => 'Novo Produto',
		'view_item' => 'Ver Produto',
		'search_items' => 'Procurar Produto',
		'not_found' =>  'Nenhum Produto encontrado',
		'not_found_in_trash' => 'Nenhum Produto na Lixeira',
		'parent_item_colon' => '',
		'menu_name' => 'Produtos Home'
	);

	$argsProdutos = array(
		'labels' => $Produtos,  //Insere o Array de labels dentro do argumento de labels
		'public' => true,  //Se o Custom Type pode ser adicionado aos menus e exibidos em buscas
		'hierarchical' => false,  //Se o Custom Post pode ser hierarquico como as páginas
		'menu_position' => 5,  //Posição do menu que será exibido
		'menu_icon' => 'dashicons-warning',
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields') //Quais recursos serão usados (metabox)
    );

	register_post_type( 'produtosHome' , $argsProdutos );


	flush_rewrite_rules();

	$Sobre = array(
		'name' => 'Sobre',
		'singular_name' => 'Sobre',
		'add_new' => 'Adicionar Nova Sobre',
		'add_new_item' => 'Adicionar Sobre',
		'edit_item' => 'Editar Sobre',
		'new_item' => 'Nova Sobre',
		'view_item' => 'Ver Sobre',
		'search_items' => 'Procurar Sobre',
		'not_found' =>  'Nenhum Sobre encontrado',
		'not_found_in_trash' => 'Nenhum Sobre na Lixeira',
		'parent_item_colon' => '',
		'menu_name' => 'Sobre Home'
	);

	$argsSobre = array(
		'labels' => $Sobre,  //Insere o Array de labels dentro do argumento de labels
		'public' => true,  //Se o Custom Type pode ser adicionado aos menus e exibidos em buscas
		'hierarchical' => false,  //Se o Custom Post pode ser hierarquico como as páginas
		'menu_position' => 5,  //Posição do menu que será exibido
		'menu_icon' => 'dashicons-id-alt',
		'supports' => array('title', 'editor', 'thumbnail') //Quais recursos serão usados (metabox)
    );

	register_post_type( 'sobre' , $argsSobre );


	flush_rewrite_rules();
}

// function vComp(){
// 	// Item size (set here the number of posts for each group)
//    $i = 1; 

//    // Set the arguments for the query
//    global $post; 
//    $args = array( 
// 	 'numberposts'   => -1, // -1 is for all
// 	 'post_type'     => 'banners', // or 'post', 'page'
// 	 'orderby'       => 'title', // or 'date', 'rand'
// 	 'order' 	      => 'ASC', // or 'DESC'
//    );

//    // Get the posts
//    $myposts = get_posts($args);

//    // If there are posts
//    if($myposts):

// 	 // Groups the posts in groups of $i
// 	 $chunks = array_chunk($myposts, $i);
// 	 $html = '<!-- BANNER --><div id="bannerHome" class="carousel slide bannerHome" data-ride="carousel">';

// 	 $countPoint = 0;
	 
	 
// 	// 	$html.= '<ol class="carousel-indicators"><!-- Indicators -->';
// 	//  foreach($chunks as $chunk):
	
// 	// 	 ($chunk === reset($chunks)) ? $active = "active" : $active = "";
// 	// 	 $html .= '<li data-target="#bannerHome" data-slide-to="' . $countPoint . '" class="' . $active . '"></li>';
		 
	
// 	// 	$countPoint++;
// 	//  endforeach;
// 	//  $html.= '</ol>';
	

	

// 	 $html .= '<div class="carousel-inner">';

// 	 /*
// 	  * Item
// 	  * For each group (chunk) it generates an item
// 	  */
// 	 $count = 0;
// 	 foreach($chunks as $chunk):
// 	   // Sets as 'active' the first item
// 	   ($chunk === reset($chunks)) ? $active = "active" : $active = "";
// 	   $html .= '<div class="item '.$active.'">';

// 	   /*
// 		* Posts inside the current Item
// 		* For each item it generates the posts HTML
// 		*/

// 		foreach($chunk as $post):
		 
// 			$custom_logo_id = get_theme_mod( 'custom_logo' );
// 			$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			
// 			$html .= '<div class="banner">';
// 			$html .= get_the_post_thumbnail( $post_id ); 
// 			$html .= '<div class="banner-absolute">';
// 			$html .= '<img src="';
// 			$html .= $image[0];
// 			$html .= '">';
// 			$html .= '<a href="'; 
// 			$html .= get_post_meta($post->ID, 'Link da página', true);
// 			$html .= '">';
// 			$html .= get_the_title();
// 			$html .= '</a>';
// 			$html .= '</div>';
// 			$html .= '</div>';
			
// 		   endforeach;


// 	   $html .= '</div>';	

// 	 endforeach;
// 	 wp_reset_postdata();

// 	 // if ($count > 1) {
//   //    		$html .= '<a class="carousel-control left" href="#carousel" data-slide="prev"><div class="arrows-left"></div></a>
// 		   //           <a class="carousel-control right" href="#carousel" data-slide="next"><div class="arrows-right"></div></a>';
// 	 // }
// 	   $html .= '</div></div>';

// 	 // Prints the HTML
// 	 echo $html;

//    endif;
// }

// add_shortcode( 'bannerHomePrincipal', 'vComp' );

function marcasS(){
$html .= '<!-- Carousel -->
<div id="marca-carousel" class="desktop carousel slide marca-carousel" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">';

    // Item size (set here the number of posts for each group)
    $i = 6; 

    // Set the arguments for the query
    global $post; 
    $args = array( 
      'numberposts'   => -1, // -1 is for all
      'post_type'     => 'marcas', // or 'post', 'page'
    );

    // Get the posts
    $myposts = get_posts($args);

    // If there are posts
    if($myposts):

      // Groups the posts in groups of $i
      $chunks = array_chunk($myposts, $i);

      /*
       * Item
       * For each group (chunk) it generates an item
       */
      foreach($chunks as $chunk):
        // Sets as 'active' the first item
        ($chunk === reset($chunks)) ? $active = "active" : $active = "";
        $html .= '<div class="item '.$active.'"><div class="container-fluid padding-left-right-60"><div class="row">';

        /*
         * Posts inside the current Item
         * For each item it generates the posts HTML
         */
        foreach($chunk as $post):
          $html .= '<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">';
          $html .= '<figure>';
          $html .= get_the_post_thumbnail( $post_id );
          $html .= '</figure>';
          $html .= '</div>';
        endforeach;

        $html .= '</div></div></div>';	

      endforeach;


	endif;
	
	$html .= '</div> <!-- carousel inner -->
  <!-- Controls -->
  <a class="left carousel-control" href="#marca-carousel" role="button" data-slide="prev">
 	 <div class="arrow-left"></div>
  </a>
  <a class="right carousel-control" href="#marca-carousel" role="button" data-slide="next">
    <div class="arrow-right"></div>
  </a>
</div> <!-- /carousel -->';

return $html;

}

add_shortcode( 'marcasHome', 'marcasS' );

function marcasMobile(){
$html .= '<!-- Carousel -->
<div id="marca-mobile" class="mobile carousel slide marca-carousel" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">';

    // Item size (set here the number of posts for each group)
    $i = 1; 

    // Set the arguments for the query
    global $post; 
    $args = array( 
      'numberposts'   => -1, // -1 is for all
      'post_type'     => 'marcas', // or 'post', 'page'
    );

    // Get the posts
    $myposts = get_posts($args);

    // If there are posts
    if($myposts):

      // Groups the posts in groups of $i
      $chunks = array_chunk($myposts, $i);

      /*
       * Item
       * For each group (chunk) it generates an item
       */
      foreach($chunks as $chunk):
        // Sets as 'active' the first item
        ($chunk === reset($chunks)) ? $active = "active" : $active = "";
        $html .= '<div class="item '.$active.'"><div class="container-fluid padding-left-right-60"><div class="row">';

        /*
         * Posts inside the current Item
         * For each item it generates the posts HTML
         */
        foreach($chunk as $post):
          $html .= '<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">';
          $html .= '<figure>';
          $html .= get_the_post_thumbnail( $post_id );
          $html .= '</figure>';
          $html .= '</div>';
        endforeach;

        $html .= '</div></div></div>';	

      endforeach;


	endif;
	
	$html .= '</div> <!-- carousel inner -->
  <!-- Controls -->
  <a class="left carousel-control" href="#marca-mobile" role="button" data-slide="prev">
 	 <div class="arrow-left"></div>
  </a>
  <a class="right carousel-control" href="#marca-mobile" role="button" data-slide="next">
    <div class="arrow-right"></div>
  </a>
</div> <!-- /carousel -->';

return $html;

}

add_shortcode( 'marcasHomeMobile', 'marcasMobile' );

function produtosFunc() {

	global $post; 

    $argsProduto = array(
		'post_type' => 'produtosHome',
		'posts_per_page' => '3'
    );
    $produtoHome = new  WP_Query( $argsProduto );

     $output .= '<section class="section-absolute">
	 <div class="container bg-product">
		 <div class="row">';
	$i = 0;
    while ( $produtoHome->have_posts() ) : $produtoHome->the_post();
	$content = apply_filters( 'the_content', get_the_content() );	   
		if($i == 1) {
			$outputDiv = '<div class="col-md-4 col-sm-4 bg-pink align-center product-body">';
		} else {
			$outputDiv = '<div class="col-md-4 col-sm-4 align-center product-body">';
		}
		$output .= $outputDiv.
		get_the_post_thumbnail().
                   '<div class="project-body-hover"></div>'.
   				   '<p class="title-img-border">'.
                   get_the_title().
                   '</p>'.
                   '<div class="border-img-red"></div>'.
				   '<p class="text-products">'.
                   get_the_content().
				   '</p>'.  
				   '<a href="'. 
				   get_post_meta($post->ID, 'Link da página', true).
				   '" class="btn-more">ver mais +</a>'.
				   '</div>'; 
				   $i++; 
				endwhile;
				wp_reset_query();

      $output .= '</div>
	  </div>
  </section>';
    return $output;
}

add_shortcode('produtosHome', 'produtosFunc');

function sobreFunc() {

	global $post; 

	$output .= '<div class="container bg-about">
	<div id="aboutCarousel" class="carousel slide carousel-fade " data-ride="carousel">';

	$argsSobre = array(
		'post_type' => 'sobre',
		'posts_per_page' => '4'
    );
    $produtoSobre = new  WP_Query( $argsSobre );


	$iBall = 0;
	$output .= '<ol class="carousel-indicators">';
		while ( $produtoSobre->have_posts() ) : $produtoSobre->the_post();
		if ($iBall == 0) {
			$iActive = 'active';
		} else {
			$iActive = '';
		}
		$output .= '<li data-target="#aboutCarousel" data-slide-to="' . $iBall .'" class="' . $iActive . '"></li>';
		$iBall++;
		endwhile;
	wp_reset_query();
	$output .= '</ol><div class="carousel-inner">';

    $argsSobre = array(
		'post_type' => 'sobre',
		'posts_per_page' => '4'
    );
    $produtoSobre = new  WP_Query( $argsSobre );
	$i = 0;
    while ( $produtoSobre->have_posts() ) : $produtoSobre->the_post();
		$content = apply_filters( 'the_content', get_the_content() );
		if ($i == 0) {
			$itemActive = '<div class="item active"><div class="col-md-6 col-sm-6">';
		} else {
			$itemActive = '<div class="item"><div class="col-md-6 col-sm-6">';
		} 
		$output .= $itemActive.
			       get_the_post_thumbnail().
                   '</div><div class="col-md-6 col-sm-6" style="padding-left: 50px;">'.
                   $content.
				   '</div></div>'; 
				   $i++; 
				endwhile;
				wp_reset_query();

      $output .= '</div>
	  </div>
	</div>';
    return $output;
}

add_shortcode('sobreHome', 'sobreFunc');

function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Banner', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Banner', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Banner Principal', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Banner', 'twentythirteen' ),
        'all_items'           => __( 'Todos Banner', 'twentythirteen' ),
        'view_item'           => __( 'Vizualizar Banner', 'twentythirteen' ),
        'add_new_item'        => __( 'Adicionar novo Banner', 'twentythirteen' ),
        'add_new'             => __( 'Adicionar novo', 'twentythirteen' ),
        'edit_item'           => __( 'Editar Banner', 'twentythirteen' ),
        'update_item'         => __( 'Atualizar Banner', 'twentythirteen' ),
        'search_items'        => __( 'Procurar Banner', 'twentythirteen' ),
        'not_found'           => __( 'Não encontrado', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Não encontrado dentro da Lixeira', 'twentythirteen' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Banner', 'twentythirteen' ),
        'description'         => __( 'Banners Principal', 'twentythirteen' ),
        'labels'              => $labels,
        'supports' => array('thumbnail','title', 'custom-fields'), //Quais recursos serão usados (metabox)
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'menu_icon'           => 'dashicons-format-image',
        // This is where we add taxonomies to our CPT
        'taxonomies'          => array( 'category' ),
    );
     
    // Registering your Custom Post Type
    register_post_type( 'bannerPrincipal', $args );

    flush_rewrite_rules();
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'post', 'bannerPrincipal'); // don't forget nav_menu_item to allow menus to work!
    $query->set('post_type',$post_type);
    return $query;
    }
}

function vCompPrincipal($atts){
	// Item size (set here the number of posts for each group)
   $i = 1; 

   // Set the arguments for the query
   global $post; 

   $args = array(
    'post_type' => 'bannerPrincipal',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'name',
            'terms'    => $atts['categoryname'],
        ),
    ),
);

   // Get the posts
   $myposts = get_posts($args);

   // If there are posts
   if($myposts):

	 // Groups the posts in groups of $i
	 $chunks = array_chunk($myposts, $i);
	 $html = '<!-- BANNER --><div id="bannerHome" class="carousel slide bannerHome" data-ride="carousel">';

	 $countPoint = 0;
	 
	 
	// 	$html.= '<ol class="carousel-indicators"><!-- Indicators -->';
	//  foreach($chunks as $chunk):
	
	// 	 ($chunk === reset($chunks)) ? $active = "active" : $active = "";
	// 	 $html .= '<li data-target="#bannerHome" data-slide-to="' . $countPoint . '" class="' . $active . '"></li>';
		 
	
	// 	$countPoint++;
	//  endforeach;
	//  $html.= '</ol>';
	

	

	 $html .= '<div class="carousel-inner">';

	 /*
	  * Item
	  * For each group (chunk) it generates an item
	  */
	 $count = 0;
	 foreach($chunks as $chunk):
	   // Sets as 'active' the first item
	   ($chunk === reset($chunks)) ? $active = "active" : $active = "";
	   $html .= '<div class="item '.$active.'">';

	   /*
		* Posts inside the current Item
		* For each item it generates the posts HTML
		*/

		foreach($chunk as $post):
		 
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			
			$html .= '<div class="banner">';
			$html .= get_the_post_thumbnail( $post_id ); 
			$html .= '<div class="banner-absolute">';
			// $html .= '<img src="';
			// $html .= $image[0];
			// $html .= '">';
			$html .= '<p class="logo-desktop">Boschini</p>';
			$html .= '<div class="border-logo fadeInRight animated"></div>';
			$html .= '<a href="'; 
			$html .= get_post_meta($post->ID, 'Link da página', true);
			$html .= '">';
			$html .= get_the_title();
			$html .= '</a>';
			$html .= '</div>';
			$html .= '</div>';
			
		   endforeach;


	   $html .= '</div>';	

	 endforeach;
	 wp_reset_postdata();

	 // if ($count > 1) {
  //    		$html .= '<a class="carousel-control left" href="#carousel" data-slide="prev"><div class="arrows-left"></div></a>
		   //           <a class="carousel-control right" href="#carousel" data-slide="next"><div class="arrows-right"></div></a>';
	 // }
	   $html .= '</div></div>';

	 // Prints the HTML
	 echo $html;

   endif;
}

add_shortcode('bannerPrincipal', 'vCompPrincipal');


// Removendo todo CSS Woocommerce

// add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// add_theme_support( 'woocommerce');

// add_action( 'after_setup_theme', 'after_yourtheme_setup' );
// function after_yourtheme_setup() {
// 	add_theme_support( 'wc-product-gallery-zoom' );
// 	add_theme_support( 'wc-product-gallery-lightbox' );
// 	add_theme_support( 'wc-product-gallery-slider' );
// }



