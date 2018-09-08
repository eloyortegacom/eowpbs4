<?php 
require_once get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php';
function theme_styles(){
	wp_enqueue_style('bs_css', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('bsca_css', get_template_directory_uri() . '/css/carousel.css');
    wp_enqueue_style('ie10vw_css', get_template_directory_uri() . '/css/ie10-viewport-bug-workaround.css');
    wp_enqueue_style('fa_css', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css');
    wp_enqueue_style('cookieconsent_css', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css');    
	wp_enqueue_style('googlefont01_css', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&amp;subset=latin-ext');
	//wp_enqueue_style('googlefont01_css', 'https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext');
	//wp_enqueue_style('googlefont02_css', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&amp;subset=latin-ext');
	//wp_enqueue_style('googlefont03_css', 'https://fonts.googleapis.com/css?family=Questrial');
	
    
    


    wp_enqueue_style('style_css', get_template_directory_uri() . '/style.css', false, filemtime(get_stylesheet_directory() . '/style.css'));
	//wp_enqueue_style('style_css', get_template_directory_uri() . '/style.css');
}
add_action ('wp_enqueue_scripts', 'theme_styles');

function theme_js(){
	global $wp_scripts;
	wp_register_script('html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js', '','',false);
	wp_register_script('respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '','',false);
	wp_register_script('ie10vw_js', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', '','',false);

	$wp_scripts->add_data('html5_shiv','conditional', 'lt IE 9');
	$wp_scripts->add_data('respond_js','conditional', 'lt IE 9');
	$wp_scripts->add_data('ie10vw_js','conditional', 'lt IE 10');

    wp_enqueue_script('cookieconsent_js', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js', '', '', true);   
    /*wp_enqueue_script('cookieconsenteo_js', get_template_directory_uri() . '/js/cookieconsent_eo.js', '', '', true);   */
    wp_enqueue_script('eo_js', get_template_directory_uri() . '/js/eo.min.js', array('jquery'), '', true);  
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);	
    wp_enqueue_script('modernizr-webp_js', get_template_directory_uri() . '/js/modernizr-webp.min.js', '', '', true);   
	


}
add_action ('wp_enqueue_scripts','theme_js');

/*Font Awesome*/
// Enqueue Font Awesome.
add_action( 'wp_enqueue_scripts', 'custom_load_font_awesome' );
function custom_load_font_awesome() {
    wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/releases/v5.0.1/js/all.js', array(), null );
}

add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 2 );
/**
 * Filter the HTML script tag of `font-awesome` script to add `defer` attribute.
 *
 * @param string $tag    The <script> tag for the enqueued script.
 * @param string $handle The script's registered handle.
 *
 * @return   Filtered HTML script tag.
 */
function add_defer_attribute( $tag, $handle ) {
    if ( 'font-awesome' === $handle ) {
        $tag = str_replace( ' src', ' defer src', $tag );
    }

    return $tag;
}

/*Fin */



add_theme_support('post-thumbnails');



add_theme_support('menus');
function eo_theme_menus() {
	register_nav_menus(
		array(
            'header-menu'=> __('Menú Principal'),
            'footer-menu'=> __('Menú Pie')
		)
	);
}
add_theme_support( 'html5',array('search-form'));


add_action('init','eo_theme_menus');

function eo_menu_classes($classes, $item, $args) {
	if($args->theme_location == 'Menú Principal') {
	  $classes[] = 'prueba-class nav-item';
	}
	return $classes;
  }
  add_filter('nav_menu_css_class','eo_menu_classes',1,3);

  /*------------------------------------------POSTS PERSONALIZADOS------------------------------------*/
/*  Sliders */
// La función no será utilizada antes del 'init'.
add_action( 'init', 'crear_post_type_slider' );
/* Here's how to create your customized labels */
function crear_post_type_slider() {
    $labels = array(
    'name' => _x( 'SLIDER', 'post type general name' ),
        'singular_name' => _x( 'Slider', 'post type singular name' ),
        'add_new' => _x( 'Añadir nuevo', 'slider' ),
        'add_new_item' => __( 'Añadir nuevo Slider' ),
        'edit_item' => __( 'Editar Slider' ),
        'new_item' => __( 'Nuevo Slider' ),
        'view_item' => __( 'Ver Slider' ),
        'search_items' => __( 'Buscar Sliders' ),
        'not_found' =>  __( 'No se han encontrado Sliders' ),
        'not_found_in_trash' => __( 'No se han encontrado Sliders en la papelera' ),
        'parent_item_colon' => ''
    );
 
    // Creamos un array para $args
    $args = array( 'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-slides',
        'supports' => array( 'title', 'editor', 'thumbnail' )
    );
 
    register_post_type( 'slider', $args ); /* Registramos y a funcionar */
}
/*Fin SLIDERS*/
/*columnas slider wpadmin*/
/*cargarlos*/
 // adding our table columns with this function:  
function slider_custom_table_head( $defaults ) {  
    $defaults['orden']   = 'Orden';  
    return $defaults;  
}  
// change the _event_ part in the filter name to your CPT slug  
add_filter('manage_slider_posts_columns', 'slider_custom_table_head');  
  
  
// now let's fill our new columns with post meta content  
function slider_custom_table_content( $column_name, $post_id ) {  
    if ($column_name == 'orden') { 
        echo get_post_meta( $post_id, 'meta-box-slider-orden', true ); 
    } 
} 
// change the _event_ part in the filter name to your CPT slug 
add_action( 'manage_slider_posts_custom_column', 'slider_custom_table_content', 10, 2 );  

/*ORDENARLOS FILTRO*/
add_filter( 'manage_edit-slider_sortable_columns', 'my_slider_sortable_columns' );

function my_slider_sortable_columns( $columns ) {

    $columns['orden'] = 'orden';

    return $columns;
}

/**/
/*Meta BOXES*/
/*Propiedades Sliders*/
/*1*/

function add_custom_meta_box_slider()
{
    add_meta_box("slider-meta-box", "Propiedades slider", "custom_meta_box_slider_markup", "slider", "side", "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box_slider");
/*2*/
function custom_meta_box_slider_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
<div>
    <label for="meta-box-slider-01">Subtítulo 01</label>
    <input name="meta-box-slider-01" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-slider-01", true); ?>">
    <br />
    <label for="meta-box-slider-02">Subtítulo 02</label>
    <input name="meta-box-slider-02" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-slider-02", true); ?>">
    <br />
    <label for="meta-box-slider-orden">Orden</label>
    <input name="meta-box-slider-orden" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-slider-orden", true); ?>">
</div>
<?php  
}

/*3*/
function save_custom_meta_box_slider($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "slider";
    if($slug != $post->post_type)
        return $post_id;

	$meta_box_slider_01_value = "";
	$meta_box_slider_02_value = "";              
    $meta_box_slider_orden_value = "";

    if(isset($_POST["meta-box-slider-01"]))
    {
        $meta_box_slider_01_value = $_POST["meta-box-slider-01"];
    }   
    update_post_meta($post_id, "meta-box-slider-01", $meta_box_slider_01_value);

    if(isset($_POST["meta-box-slider-02"]))
    {
        $meta_box_slider_02_value = $_POST["meta-box-slider-02"];
    }   
    update_post_meta($post_id, "meta-box-slider-02", $meta_box_slider_02_value);

     if(isset($_POST["meta-box-slider-orden"]))
    {
        $meta_box_slider_orden_value = $_POST["meta-box-slider-orden"];
    }   
    update_post_meta($post_id, "meta-box-slider-orden", $meta_box_slider_orden_value);
}

add_action("save_post", "save_custom_meta_box_slider", 10, 3);

/*Fin MetaBoxes Sliders*/


  /*WIDGETS*/

  function create_widget($name, $id, $description){
	register_sidebar( array(
		'name'          => __( $name ),
		'id'            => $id,
		'description'   => __( $description ),
	    'class'         => '',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>'
		)
	);
}
//create_widget('Top','top','Se muestra arriba para el menú de idiomas');


//create_widget('Sidebar','sidebar','Se muestra en el sidebar');
//create_widget('Sidebar Blog','blog','Sidebar para el blog');

create_widget('PrePie01','PrePie01','PrePie 01');
create_widget('PrePie02','PrePie02','PrePie 02');
create_widget('PrePie03','PrePie03','PrePie 03');
create_widget('Pie01','pie01','Pie 01');
create_widget('Pie02','pie02','Pie 02');
create_widget('Pie03','pie03','Pie 03');


create_widget('SobrePie','sobrepie','Sobre Pie');

/*Editor remove brs*/




 ?>