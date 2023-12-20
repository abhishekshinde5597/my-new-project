<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

include('functions-gsap.php');
include('functions-circular-slider.php');

//require('gsap.php');
// require('circular-slider.php');
define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);
	 
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri().'/css/slick.css', array(), (string) time(), '' );
	wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri().'/css/slick-theme.css', array(), (string) time(), '' );
	wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri().'/js/slick.js?rand='.rand(1,100), array( 'jquery' ), false, true );
    wp_enqueue_style( 'customcss', get_stylesheet_directory_uri() . '/css/custom.css', array(), (string) time(), 'all' );
    wp_enqueue_style( 'custom2css', get_stylesheet_directory_uri() . '/css/custom2.css', array(), (string) time(), 'all' );
    wp_enqueue_style( 'circle-slider', get_stylesheet_directory_uri() . '/css/circle-slider.css', array(), (string) time(), 'all' );
    wp_enqueue_style( 'homecss', get_stylesheet_directory_uri() . '/css/home.css', array(), (string) time(), 'all' );
    wp_enqueue_style( 'recrutementcss', get_stylesheet_directory_uri() . '/css/recrutement.css', array(), (string) time(), 'all' );
    
	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array(), (string) time(),'true' );  
    wp_enqueue_script( 'custom2-js', get_stylesheet_directory_uri() . '/js/custom2.js', array(), (string) time(),'true' );
    
    wp_enqueue_script( 'sliderjs', 'https://kenwheeler.github.io/slick/slick/slick.js', array(), (string) time(), true );
    wp_enqueue_script( 'gsap-library', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js', array(), (string) time(), true );
    wp_enqueue_script( 'gsap-scroll', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js', array(), (string) time(), true );

    wp_enqueue_script( 'gsap-slider', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js', array(), (string) time(), true );
    wp_enqueue_script( 'gsap-motion', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/MotionPathPlugin.min.js', array(), (string) time(), true );
    wp_enqueue_script( 'gsap-js', get_stylesheet_directory_uri() . '/js/gsap.js', array(), (string) time(),'true' );
    //wp_localize_script('your-script-handle', 'jm_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
    wp_localize_script( 'custom-js', 'ajax_object', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'ajax_nonce' ),
    ) );

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );



// ** Allow SVG **
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

	  $filetype = wp_check_filetype( $filename, $mimes );
	
	  return [
		  'ext'             => $filetype['ext'],
		  'type'            => $filetype['type'],
		  'proper_filename' => $data['proper_filename']
	  ];
	
	}, 10, 4 );
	
	function cc_mime_types( $mimes ){
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter( 'upload_mimes', 'cc_mime_types' );
	
	function fix_svg() {
	  echo '<style type="text/css">
			.attachment-266x266, .thumbnail img {
				 width: 100% !important;
				 height: auto !important;
			}
			</style>';
	}
	add_action( 'admin_head', 'fix_svg' );
	
	// ** End Allow SVG **

	//*inovation post type*//
function create_custom_post_type_Innovation() {
    $labels = array(
        'name'               => __('Innovations', 'text-domain'),
        'singular_name'      => __('Innovation', 'text-domain'),
        'menu_name'          => __('Innovations', 'text-domain'),
        'add_new'            => __('Add New', 'text-domain'),
        'add_new_item'       => __('Add New Innovation', 'text-domain'),
        'edit_item'          => __('Edit Innovation', 'text-domain'),
        'new_item'           => __('New Innovation', 'text-domain'),
        'view_item'          => __('View Innovation', 'text-domain'),
        'search_items'       => __('Search Innovations', 'text-domain'),
        'not_found'          => __('No innovations found', 'text-domain'),
        'not_found_in_trash' => __('No innovations found in Trash', 'text-domain'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'innovations'),
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-admin-tools', // You can choose an appropriate icon from Dashicons.
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
    );

    register_post_type('innovation', $args);
}
//add_action('init', 'create_custom_post_type_Innovation');

//**product post type */
function create_custom_post_type_Production() {
    $labels = array(
        'name'               => __('Productions', 'text-domain'),
        'singular_name'      => __('Production', 'text-domain'),
        'menu_name'          => __('Productions', 'text-domain'),
        'add_new'            => __('Add New', 'text-domain'),
        'add_new_item'       => __('Add New Production', 'text-domain'),
        'edit_item'          => __('Edit Production', 'text-domain'),
        'new_item'           => __('New Production', 'text-domain'),
        'view_item'          => __('View Production', 'text-domain'),
        'search_items'       => __('Search Productions', 'text-domain'),
        'not_found'          => __('No productions found', 'text-domain'),
        'not_found_in_trash' => __('No productions found in Trash', 'text-domain'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'productions'),
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-admin-tools', // You can choose an appropriate icon from Dashicons.
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
    );

    register_post_type('Production', $args);
}
add_action('init', 'create_custom_post_type_Production');

//**our entites */

function create_custom_post_type_Entities() {
    $labels = array(
        'name'               => __('Entities', 'text-domain'),
        'singular_name'      => __('Entity', 'text-domain'),
        'menu_name'          => __('Entities', 'text-domain'),
        'add_new'            => __('Add New', 'text-domain'),
        'add_new_item'       => __('Add New Entity', 'text-domain'),
        'edit_item'          => __('Edit Entity', 'text-domain'),
        'new_item'           => __('New Entity', 'text-domain'),
        'view_item'          => __('View Entity', 'text-domain'),
        'search_items'       => __('Search Entities', 'text-domain'),
        'not_found'          => __('No entities found', 'text-domain'),
        'not_found_in_trash' => __('No entities found in Trash', 'text-domain'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'entities'),
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-admin-post', // You can choose an appropriate icon from Dashicons.
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
    );

    register_post_type('entity', $args);
}
add_action('init', 'create_custom_post_type_Entities');


function create_custom_taxonomy_for_entities() {
    $labels = array(
        'name'              => _x('Categories', 'taxonomy general name', 'text-domain'),
        'singular_name'     => _x('Category', 'taxonomy singular name', 'text-domain'),
        'search_items'      => __('Search Categories', 'text-domain'),
        'all_items'         => __('All Categories', 'text-domain'),
        'parent_item'       => __('Parent Category', 'text-domain'),
        'parent_item_colon' => __('Parent Category:', 'text-domain'),
        'edit_item'         => __('Edit Category', 'text-domain'),
        'update_item'       => __('Update Category', 'text-domain'),
        'add_new_item'      => __('Add New Category', 'text-domain'),
        'new_item_name'     => __('New Category Name', 'text-domain'),
        'menu_name'         => __('Categories', 'text-domain'),
    );

    $args = array(
        'hierarchical'      => true,  // Set this to false if you want a non-hierarchical taxonomy (like tags).
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'category'),  // Change 'category' to your desired slug.
    );

    register_taxonomy('entity_category', array('entity'), $args);
}

add_action('init', 'create_custom_taxonomy_for_entities');

// //**services post type  */
function create_custom_post_type_Services() {
    $labels = array(
        'name'               => __('Services', 'text-domain'),
        'singular_name'      => __('Service', 'text-domain'),
        'menu_name'          => __('Services', 'text-domain'),
        'add_new'            => __('Add New', 'text-domain'),
        'add_new_item'       => __('Add New Service', 'text-domain'),
        'edit_item'          => __('Edit Service', 'text-domain'),
        'new_item'           => __('New Service', 'text-domain'),
        'view_item'          => __('View Service', 'text-domain'),
        'search_items'       => __('Search Services', 'text-domain'),
        'not_found'          => __('No services found', 'text-domain'),
        'not_found_in_trash' => __('No services found in Trash', 'text-domain'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'services'),
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-admin-post', // You can choose an appropriate icon from Dashicons.
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
    );

    register_post_type('service', $args);
}
add_action('init', 'create_custom_post_type_Services');

//** */
function create_custom_post_type_Expertises() {
    $labels = array(
        'name'               => __('Expertises', 'text-domain'),
        'singular_name'      => __('Expertise', 'text-domain'),
        'menu_name'          => __('Expertises', 'text-domain'),
        'add_new'            => __('Add New', 'text-domain'),
        'add_new_item'       => __('Add New Expertise', 'text-domain'),
        'edit_item'          => __('Edit Expertise', 'text-domain'),
        'new_item'           => __('New Expertise', 'text-domain'),
        'view_item'          => __('View Expertise', 'text-domain'),
        'search_items'       => __('Search Expertises', 'text-domain'),
        'not_found'          => __('No expertises found', 'text-domain'),
        'not_found_in_trash' => __('No expertises found in Trash', 'text-domain'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'expertises'),
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-admin-post', // You can choose an appropriate icon from Dashicons.
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
    );

    register_post_type('expertise', $args);
}
add_action('init', 'create_custom_post_type_Expertises');
/*shortcode for expertise /



//**inovation post shortcode*/
add_shortcode('innovation', 'innovation_shortcode');
function innovation_shortcode() {
    ob_start();
    $args = array(
        'post_type'      => 'innovation',
        'posts_per_page' => -1,
        'order'          => 'DESC', 
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        echo '<div class="innovation-post-slider">';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div class="innovation-post-type-item">';
            echo '<div class="innovation-post-type-item-inner">';
            if (has_post_thumbnail()) {
                echo '<figure class="innovation-post-type-thumbnail">';
                the_post_thumbnail();
                echo '</figure>';
            }
            echo '<div class="innovation-content">';
            echo '<h4 class="innovation-post-type-title">' . get_the_title() . ' </h4>';
            echo '</div>';

			echo '<div class="innovation-hover-content">';
            echo '<div class="innovation-post-type-hover-title">' . get_the_title() . ' </div>';
			echo '<div class="innovation-post-type-hover-content">' . get_the_excerpt() . ' </div>';
			echo '<a href="" class="btn">Voir le site <img src="/wp-content/uploads/2023/10/white_arrow.svg" alt="arrow"></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No posts found.</p>';
    }
    wp_reset_postdata();

    return ob_get_clean();
}




//**production post shortcode */
add_shortcode('Production', 'production_shortcode');
function production_shortcode() {
    ob_start();
    $args = array(
        'post_type'      => 'production',
        'posts_per_page' => -1,
        'order'          => 'DESC',
        
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        echo '<div class="production-post-slider">';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div class="production-post-type-item">';
            if (has_post_thumbnail()) {
                echo '<figure class="production-post-type-thumbnail">';
                the_post_thumbnail();
                echo '</figure>';
            }
            echo '<div class="production-content-wrapper">';
			 echo '<div class="production-post-type-title mob">' . get_the_title() . ' </div>';
            $content = get_field('hover_content');
          
            echo' <div class="production-post-type-content">'.get_the_content().'</div> ';
            
           
            echo '</div>';
			
            echo '</div>';
        }
        echo'</div>';
    } else {
        echo '<p>No posts found.</p>';
    }
    wp_reset_postdata();

    return ob_get_clean();
}
//shortcode for production title
add_shortcode('production_title', 'production_title');
function production_title() {
    ob_start();
    $args = array(
        'post_type'      => 'production',
        'posts_per_page' => -1,
        'order'          => 'DESC',
        
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        echo '<ul class="elementor-icon-list-items">';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<li class="service-post">';
            echo '<div class="service-post-inner">';
            echo '<div class="service_img"><img src="/wp-content/uploads/2023/10/AQUAPROX-O_White.svg" alt="arrow"></div><span class="service-post-title">' . get_the_title() . ' </span>';
            echo '</div>';
            echo '</li>';
        }
        echo'</ul>';
    } else {
        echo '<p>No posts found.</p>';
    }
    wp_reset_postdata();

    return ob_get_clean();
}

//**for service ,experise , production post type */
add_shortcode('expertise_shortcode', 'expertise_shortcode');
function expertise_shortcode($atts) {
    // Define default attributes
    $atts = shortcode_atts(
        array(
            'post_type'      => 'expertise',
            'posts_per_page' => -1,
            'order'          => 'DESC',
        ),
        $atts,
        'expertise_shortcode'
    );

    ob_start();

    $args = array(
        'post_type'      => $atts['post_type'],
        'posts_per_page' => $atts['posts_per_page'],
        'order'          => $atts['order'],
        
    );

    $expertisePost = new WP_Query($args);

    if ($expertisePost->have_posts()) {
        $allPostData = $expertisePost->posts;
        echo '<div class="production-post-slider">';

        foreach($allPostData as $post){
            ?>
            <div class="production-post-type-item">
                <?php if (has_post_thumbnail($post->ID)) { ?>
                    <figure class="production-post-type-thumbnail">
                        <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="<?php echo $post->post_title; ?>">
                    
                    </figure>
                <?php } ?>
                <div class="production-content-wrapper">
                    <div class="production-post-type-title mob"><?php echo $post->post_title; ?></div>
                    <div class="production-post-type-content"><?php echo $post->post_content; ?></div>
                </div>
            </div>
            <?php
        }
        echo '</div>';
    } else {
        echo '<p>No posts found.</p>';
    }
    wp_reset_postdata();

    return ob_get_clean();
}

add_shortcode('expertise_title', 'expertise_title_shortcode');

function expertise_title_shortcode($atts) {
    // Define default attributes
    $atts = shortcode_atts(
        array(
            'post_type'       => 'expertise',
            'posts_per_page'  => -1,
            'order'           => 'DESC',
        ),
        $atts,
        'expertise_title'
    );

    ob_start();
    
    $args = array(
        'post_type'      => $atts['post_type'],
        'posts_per_page' => $atts['posts_per_page'],
        'order'          => $atts['order'],
    );
    
    $expertise_titlePosts = new WP_Query($args);
    
    if ($expertise_titlePosts->have_posts()) {

        $expertise_titlePostsData = $expertise_titlePosts->posts;

        echo '<ul class="elementor-icon-list-items">';
        foreach( $expertise_titlePostsData as $data  ) { ?>
            <li class="service-post">
                <div class="service-post-inner">
                    <div class="service_img"><img src="<?php echo get_site_url();?>/wp-content/uploads/2023/10/AQUAPROX-O_White.svg" alt="arrow"></div>
                    <span class="service-post-title"><?php echo $data->post_title; ?></span>
                </div>
            </li> <?php
        }
        echo '</ul>';
    } else {
        echo '<p>No posts found.</p>';
    }
    wp_reset_postdata();

    
    return ob_get_clean();
}



//breadcumb shortcode
function yoast_breadcrumb_shortcode() {
    ob_start(); // Start output buffering
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    return ob_get_clean(); // Return the buffered content
}

add_shortcode('yoast_breadcrumb', 'yoast_breadcrumb_shortcode');


//**our entites shortcode */
add_shortcode('entites', 'entites_shortcode');

function entites_shortcode() {
    ob_start();

    $args = array(
        'post_type'      => 'entity',
        'posts_per_page' => 13,
        'order'          => 'DESC',
        'paged'          => max(1, get_query_var('paged')),
        
    );

    $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="entites-post-slider">';
    echo'<div class="entites-post-main">';
        while ($query->have_posts()) {
            $query->the_post();
            $category_name = ''; // Move the initialization here
    
            echo '<div class="entites-post-type-item">';
            echo '<div class="entites-post-type-item-inner">';

            if (has_post_thumbnail()) {
                echo '<figure class="entites-post-type-thumbnail">';
                the_post_thumbnail();
                echo '</figure>';
            }

            echo '<div class="entites-content">';
            
            global $post;
            $categories = get_the_terms($post->ID, 'entity_category');

            if (!empty($categories)) {
                foreach ($categories as $category) {
                    $category_name = esc_html($category->name); // Get the name of each category
                    echo '<img src="/wp-content/uploads/2023/11/Group-253.svg" alt="arrow">';
                    echo '<p class="entites-post-type-entites_category">' . $category_name . '</p>';
                    echo '<h4 class="entites-post-type-title">' . get_the_title() . ' </h4>';
                }
            }
          
            echo '</div>';

            echo '<div class="entites-hover-content">';
            $image_url = get_field('company');
            $address = get_field('address');
            $link = get_field('link');
            $button = get_field('button');

            if (is_array($image_url) && !empty($image_url['url'])) {
                echo '<img src="' . esc_url($image_url['url']) . '" class="entites-post-type-image" alt="Thumbnail">';
            }
            echo'<div class="entites-wrap">';
            echo '<div class="entites-post-type-hover-excerpt">' . get_the_excerpt() . ' </div>';

            if (!empty($address)) {
                echo '<div class="entites-post-type-hover-address">' . $address . ' </div>';
            }
            echo'</div>';

            if (!empty($link) && !empty($button)) {
                echo '<a href="' . $link . '" class="btn" target="_blank">'.$button.' <img src="/wp-content/uploads/2023/10/white_arrow.svg" alt="arrow"></a>';
            }
             

            echo '</div>';
            echo '</div>';
            echo '</div>';
            
        }
    echo '</div>';
        $total_pages = $query->max_num_pages;

        if ($total_pages > 1) {

            echo '<div class="entity-post-pagination">';
            echo '<div class="pagination ">';
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'current'   => max(1, get_query_var('paged')),
                'prev_text' => '<div class="entity-prev">' . __('« ') . '</div>',
                'next_text' => '<div class="entity-next">' . __('»') . '</div>',
                'total'     => $total_pages,
                'prev_next' => TRUE,
            ));
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    } else {
        echo '<p>No posts found.</p>';
    }
    wp_reset_postdata();

    return ob_get_clean();
}

do_action( 'wpml_register_single_string', 'customstaring' , 'customname' , 'see the site' );
do_action( 'wpml_register_single_string', 'customstaring' , 'En-savoir-plus-btn' , 'Learn more' );
do_action( 'wpml_register_single_string', 'customstaring' , 'Afficher-plus-btn' , 'Show more' );
do_action( 'wpml_register_single_string', 'customstaring' , 'Accueil-breadcumb' , 'Welcome' );
//**shortcode for entities on home page */
add_shortcode('Entities_home', 'Entities_home');
function Entities_home() {
    ob_start();
    $args = array(
        'post_type'      => 'entity',
        'posts_per_page' => -1,
        'order'          => 'DESC',
        
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        echo '<div class="innovation-post-slider">';
        while ($query->have_posts()) {
            $query->the_post();
            
            echo '<div class="innovation-post-type-item">';
            echo '<div class="innovation-post-type-item-inner">';
            if (has_post_thumbnail()) {
                echo '<figure class="innovation-post-type-thumbnail">';
                the_post_thumbnail();
                echo '</figure>';
            }
            echo '<div class="innovation-content">';
            global $post;
			$categories = get_the_terms( $post->ID, 'entity_category' );
			if (!empty($categories)) {
			foreach ($categories as $category) {
			$category_name = esc_html($category->name); // Get the name of each category
			echo'<h4 class="innovation-post-type-category"> '. $category_name . '</h3>';
			}
			}
            echo '<h4 class="innovation-post-type-titles">' . get_the_title() . ' </h4>';
            echo '</div>';
           
			echo '<div class="innovation-hover-content">';
            $image_url = get_field('company');
            $address = get_field('address');
            if (is_array($image_url) && !empty($image_url['url'])) {
                echo '<img src="' . esc_url($image_url['url']) . '" class="entites-post-type-image" alt="Thumbnail">';
            }
            echo '<div class="innovation-post-type-hover-title">' . get_the_title() . ' </div>';
			echo '<div class="innovation-post-type-hover-content">' . get_the_excerpt() . ' </div>';
            if (!empty($address)) {
                echo '<div class="innovation-post-type-hover-address">' . $address . ' </div>';
            }
            $link = get_field('link');
            if(!empty($link)){
			echo '<a href="'.$link.'" class="btn" target="_blank"> '  .apply_filters( 'wpml_translate_single_string', 'see the site', 'customstaring', 'customname' ) .  '<img src="/wp-content/uploads/2023/10/white_arrow.svg" alt="arrow"></a>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No posts found.</p>';
    }
    wp_reset_postdata();

    return ob_get_clean();
}


add_shortcode('Entities_home_mobile', 'Entities_home_mobile');
function Entities_home_mobile() {
    
    ob_start();
    $firstPostsQuery  = array(
        'post_type'      => 'entity',
        'posts_per_page' => -1,
        'order'          => 'DESC',
      
       
    );
    $firstPostsQuery = new WP_Query($firstPostsQuery );
    if ($firstPostsQuery->have_posts()) {
        echo '<div class="innovation-post-slider-mob">';
        while ($firstPostsQuery->have_posts()) {
            $firstPostsQuery->the_post();
            $firstPosts[] = get_the_ID();
           
            echo '<div class="innovation-post-type-item">';
            echo '<div class="innovation-post-type-item-inner">';
            if (has_post_thumbnail()) {
                echo '<figure class="innovation-post-type-thumbnail">';
                the_post_thumbnail();
                echo '</figure>';
            }
            echo '<div class="innovation-content">';
            global $post;
			$categories = get_the_terms( $post->ID, 'entity_category' );
			if (!empty($categories)) {
			foreach ($categories as $category) {
			$category_name = esc_html($category->name); // Get the name of each category
			echo'<h4 class="innovation-post-type-category"> '. $category_name . '</h3>';
			}
			}
            echo '<h4 class="innovation-post-type-titles">' . get_the_title() . ' </h4>';
            echo '</div>';
           
			echo '<div class="innovation-hover-content">';
            $image_url = get_field('company');
            $address = get_field('address');
            if (is_array($image_url) && !empty($image_url['url'])) {
                echo '<img src="' . esc_url($image_url['url']) . '" class="entites-post-type-image" alt="Thumbnail">';
            }
            echo '<div class="innovation-post-type-hover-title">' . get_the_title() . ' </div>';
			echo '<div class="innovation-post-type-hover-content">' . get_the_excerpt() . ' </div>';
            
            $link = get_field('link');
            if(!empty($link)){
			echo '<a href="'.$link.'" class="btn" target="_blank">'  .apply_filters( 'wpml_translate_single_string', 'see the site', 'customstaring', 'customname' ) .  ' <img src="/wp-content/uploads/2023/10/white_arrow.svg" alt="arrow"></a>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No posts found.</p>';
    }
    wp_reset_postdata();

    return ob_get_clean();
}



function job_filter_shortcode() {
    ob_start(); ?>
    <form id="job-filter-form">
        <p>Rechercher une offre d’emploi</p>
      <div class="job-filter-inner">
        <input type="text" id="keyword" name="keyword" placeholder="Mots-clés">
        <input type="text" id="location" name="location" placeholder="Localisation">
     </div>


        <?php
     $parent_category = 13;
      $categories = get_terms(
        'job_listing_category',
        array(
            'hide_empty' => false,
            'parent'     => 0,
            'exclude' => $parent_category,
        )
    );
   
    $subcategories = get_terms(
        'job_listing_category',
        array(
            'hide_empty' => false,
            'parent' => 0,
            'orderby' => 'slug',
        
        )
    );
    
       // $subcategories = get_terms('job_subcategory', array('hide_empty' => false));
        ?>
        <div class="job-category">
        <select id="category" name="category">
            <option value="">Choisissez une catégorie...</option>
            <?php foreach ($categories as $cat) : ?>
                <option value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
            <?php endforeach; ?>
        </select>
       </div>
       <div class="job-subcategory">
       <select id="subcategory" name="subcategory">
    <option value="">Choisissez une entité...</option>

    <?php
    // Display parent terms
    $parentterms = get_terms(
        'job_listing_category',
        array(
            'hide_empty' => false,
           // 'parent' => 0,
            'orderby' => 'slug',
        )
    );
  
    foreach ($parentterms as $pterm) :
        ?>
        <?php
        // Get the Child terms
        $child_terms = get_terms(
            'job_listing_category',
            array(
                'parent' => $pterm->term_id,
                'orderby' => 'slug',
                'hide_empty' => false,
            )
        );

        // Display the child terms
        foreach ($child_terms as $cterm) :
            ?>
            <option value="<?php echo esc_attr($cterm->slug); ?>">&nbsp;&nbsp;<?php echo esc_html($cterm->name); ?></option>
        <?php endforeach; ?>

    <?php endforeach; ?>
</select>

        </div>
        <div class="job-submit">
          <button type="submit" value="Rechercher">Rechercher<img src="/wp-content/uploads/2023/11/Group-9.svg" alt="arrow"></button>
          
      </div>
    </form>
    <div id="job-listings">
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('job_filter', 'job_filter_shortcode');

function filter_jobs_functions() {
    ob_start();
    $keyword = isset($_POST['keyword']) ? sanitize_text_field($_POST['keyword']) : '';
    $location = isset($_POST['location']) ? sanitize_text_field($_POST['location']) : '';
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $subcategory = isset($_POST['subcategory']) ? sanitize_text_field($_POST['subcategory']) : '';
    $all_jobs = isset($_POST['all_jobs']) && $_POST['all_jobs'] === 'true';

    $args = array(
        'post_type'      => 'job_listing', 
        'posts_per_page' => -1,
        'order' => 'DESC',
        's'   => $keyword,
     );

    // Taxonomy query
    $tax_query = array('relation' => 'AND');

    if (!empty($category)) {
        $tax_query[] = array(
            'taxonomy' => 'job_listing_category',
            'field'    => 'slug',
            'terms'    => $category,
            'operator' => 'IN',
        );
    }

    if (!empty($subcategory)) {
        $tax_query[] = array(
            'taxonomy' => 'job_listing_category',
            'field'    => 'slug',
            'terms'    => $subcategory,
            'operator' => 'IN',
        );
    }

   // Location meta query
    if (!empty($location)) {
        $args['meta_query'] = array(
            'relation' => 'AND',
            array(
                'key'     => '_job_location',
                'value'   => $location,
                'compare' => 'LIKE',
            ),
        );
    }

    //Merge tax query into main query
    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
           echo'<div class="jm-post-content">';

            echo'<div class="jm-post-title">';
//             $post_categories = get_the_category();
//                if ($post_categories) {
//                foreach ($post_categories as $category) {
//                $category_image_url = get_field('image', 'job_listing_category_' . $category->term_id);
//                 if ($category_image_url) {
//                echo '<img src="' . esc_url($category_image_url) . '" alt="' . esc_attr($category_image_alt) . '">';
//         }
//     }
// }
            echo'<img src="'.site_url().'/wp-content/uploads/2023/11/AQUAPROX-INDUSTRIES-2.png">';
            echo'<div class="jm-post-inner">';
             echo '<h2>' . get_the_title() . '</h2>';
             echo'<p>AQUAPROX INDUSTRIES - Val-de-Loire</p>';
             echo'</div>';
             echo'</div>';

             echo'<div class="jm-post">';
            echo '<a href="' . get_permalink() . '">Voir l’offre</a>';
            echo'</div>';

            echo'</div>';
            
        endwhile;
    else :
        echo '<span class="ad-nojob">Aucun emploi trouvé</span>';
    endif;
    wp_reset_postdata();
    
    die();
    ob_get_clean();
}

add_action('wp_ajax_filter_jobs', 'filter_jobs_functions');
add_action('wp_ajax_nopriv_filter_jobs', 'filter_jobs_functions');

// add_action('wp_ajax_get_subcategories', 'get_subcategories');
// add_action('wp_ajax_nopriv_get_subcategories', 'get_subcategories');

// function get_subcategories() {
//     //$category = sanitize_text_field($_POST['category']);
//    // $categories = get_terms('job_listing_category', array('hide_empty' => false));
//       $category_slug = sanitize_text_field($_POST['category']);

//     if( $category_slug != '' ||  $category_slug != null ) {
//         $parent_category = get_term_by('slug', $category_slug, 'job_listing_category');
//         $parent_category_id = $parent_category->term_id;
//         $child_categories = get_terms('job_listing_category', array(
//             'hide_empty' => false,
//             'child_of' => $parent_category_id,
//         ));
    
//        // print_r($categories);
//         $options = '<option value="">Choisissez une catégorie...</option>';
//         foreach ($child_categories as $subcat) {
//             $options .= '<option value="' . $subcat->slug . '">' . $subcat->name . '</option>';
//         }
//     }
    
//     if( $options != '' || $options != null ) {
//         wp_send_json_success($options);

//     }
// }

//**custom breadcumb for pages  */
function breadcrumbs_shortcode() {
    ob_start(); 
    $current_url = get_permalink( get_page_by_path( 'map' ) );
    //$current_page = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $desired_value = ltrim(parse_url($current_url, PHP_URL_PATH), '/');
    $segments = explode('/', $desired_value); //<- split string to array 
    $segments = array_map(function($segment) {
        return str_replace('-', ' ', $segment);
    }, $segments);
   
    ?>
    <div id="breadcrumbs">
        <a href="<?php echo get_home_url(); ?>">Accueil</a> 
        
        <?php
        if($segments){
        foreach ($segments as $segment) {
            if($segment){
                $current_url = get_permalink( get_page_by_path( $segment) );
                $segment = ($segment === 'a-propos') ? 'À propos ' : $segment;
                $segment = ($segment === 'performance-industrielle') ? 'Performance industrielle' : $segment;
                $segment = ($segment === 'preservation-environnementale') ? 'Préservation environnementale' : $segment;
                //echo $segment = ($segment === 'qui-sommes-nous') ? 'Qui sommes-nous?' : $segment;
                $segment = ($segment === 'qui-sommes-nous' || $segment === 'qui sommes nous') ? 'Qui sommes-nous?' : $segment;
                $segment = ($segment === 'notre adn industriel') ? 'Notre ADN industriel' : $segment;
                $segment = ($segment === 'reseau-aquaprox') ? 'Le réseau AQUAPROX' : $segment;
                
            echo '<span class="breadcrumb_separator"> > </span>';
           
            
            echo '<span class="breadcrumb_segment"><a href="'.$current_url.'">' . $segment . '</a></span>';
            }
        }
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_breadcrumb', 'breadcrumbs_shortcode');

//**transalted text eng to frnch in single job  */
add_filter('gettext', 'translate_text');
function translate_text($translated) {
    $translated = str_ireplace('Posted %s ago', 'Publié il y a %s', $translated);
    $translated = str_ireplace('Posted %s day ago', 'Publié il y a %s jour', $translated);
    $translated = str_ireplace('Posted %s days ago', 'Publié il y a %s jours', $translated);
    $translated = str_ireplace('Posted %s month ago', 'Publié il y a %s mois', $translated);
    $translated = str_ireplace('Posted %s months ago', 'Publié il y a %s mois', $translated);
    $translated = str_ireplace('Posted %s year ago', 'Publié il y a %s an', $translated);
    $translated = str_ireplace('Posted %s years ago', 'Publié il y a %s ans', $translated);
    $translated = str_ireplace('Posted %s years ago', 'Publié il y a %s ans', $translated);
    $translated = str_ireplace('%s days', '%s jours', $translated);
    return $translated;
}

add_filter('ngettext', 'translate_plural_text', 10, 2);
function translate_plural_text($translated, $count) {
    if (strpos($translated, '%s day') !== false) {
        $translated = str_replace('%s day', '%s jour', $translated);
    } elseif (strpos($translated, '%s days') !== false) {
        $translated = str_replace('%s days', '%s jours', $translated);
    } elseif (strpos($translated, '%s month') !== false) {
        $translated = str_replace('%s month', '%s mois', $translated);
    } elseif (strpos($translated, '%s months') !== false) {
        $translated = str_replace('%s months', '%s mois', $translated);
    } elseif (strpos($translated, '%s year') !== false) {
        $translated = str_replace('%s year', '%s an', $translated);
    } elseif (strpos($translated, '%s years') !== false) {
        $translated = str_replace('%s years', '%s ans', $translated);
    }
    return $translated;
}



// function rnz_elementor_forms_validation($record, $ajax_handler) {
//     if ($field = rnz_elementor_get_field('form_fields[field_94e11c7]', $record)) {
       
//         if ($field['required'] == 'yes') {
//             $name_value = trim($field['value']);

//             if (empty($name_value)) {
//                 $ajax_handler->add_error($field['id'], 'Veuillez renseigner le champ.');
//             }
//         }
//     } else {
//         error_log('Name field not found.'); // Check if the field is not found
//     }
// }

// add_action('elementor_pro/forms/validation', 'rnz_elementor_forms_validation', 10, 2);





?>