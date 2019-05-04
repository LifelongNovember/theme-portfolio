<?php    
/**
 *Photostat Lite Theme Customizer
 *
 * @package Photostat Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function photostat_lite_customize_register( $wp_customize ) {	
	
	function photostat_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function photostat_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'photostat_lite_optionpanel_wrap', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'photostat-lite' ),		
	) );
	
	//Site Layout Options
	$wp_customize->add_section('photostat_lite_sitelayout_option',array(
		'title' => __('Layout Options','photostat-lite'),			
		'priority' => 1,
		'panel' => 	'photostat_lite_optionpanel_wrap',          
	));		
	
	$wp_customize->add_setting('photostat_lite_boxlayout_option',array(
		'sanitize_callback' => 'photostat_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'photostat_lite_boxlayout_option', array(
    	'section'   => 'photostat_lite_sitelayout_option',    	 
		'label' => __('Check to Box Layout','photostat-lite'),
		'description' => __('If you want to box layout please check the Box Layout Option.','photostat-lite'),
    	'type'      => 'checkbox'
     )); // Layout Options
	
	$wp_customize->add_setting('photostat_lite_color_scheme',array(
		'default' => '#dd3333',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'photostat_lite_color_scheme',array(
			'label' => __('Color Scheme Options','photostat-lite'),			
			'description' => __('More color options in available PRO Version','photostat-lite'),
			'section' => 'colors',
			'settings' => 'photostat_lite_color_scheme'
		))
	);	
	
	// Slider Section		
	$wp_customize->add_section( 'photostat_lite_frontpage_slider_option', array(
		'title' => __('Frontpage Slider Options', 'photostat-lite'),
		'priority' => null,
		'description' => __('Default image size for frontpage slider is 1400 x 620 pixel.','photostat-lite'), 
		'panel' => 	'photostat_lite_optionpanel_wrap',           			
    ));
	
	$wp_customize->add_setting('photostat_lite_front_sliderpge1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'photostat_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('photostat_lite_front_sliderpge1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','photostat-lite'),
		'section' => 'photostat_lite_frontpage_slider_option'
	));	
	
	$wp_customize->add_setting('photostat_lite_front_sliderpge2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'photostat_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('photostat_lite_front_sliderpge2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','photostat-lite'),
		'section' => 'photostat_lite_frontpage_slider_option'
	));	
	
	$wp_customize->add_setting('photostat_lite_front_sliderpge3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'photostat_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('photostat_lite_front_sliderpge3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','photostat-lite'),
		'section' => 'photostat_lite_frontpage_slider_option'
	));	// Slider Section	
	
	$wp_customize->add_setting('photostat_lite_front_sliderpgemore',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('photostat_lite_front_sliderpgemore',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','photostat-lite'),
		'section' => 'photostat_lite_frontpage_slider_option',
		'setting' => 'photostat_lite_front_sliderpgemore'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('photostat_lite_front_sliderpgeshowoption',array(
		'default' => false,
		'sanitize_callback' => 'photostat_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'photostat_lite_front_sliderpgeshowoption', array(
	    'settings' => 'photostat_lite_front_sliderpgeshowoption',
	    'section'   => 'photostat_lite_frontpage_slider_option',
	     'label'     => __('Check To Show This Section','photostat-lite'),
	   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	 
	// Services Page Column section
	$wp_customize->add_section('photostat_lite_services_pagesection', array(
		'title' => __('Services Page Column Section','photostat-lite'),
		'description' => __('Select pages from the dropdown for services section','photostat-lite'),
		'priority' => null,
		'panel' => 	'photostat_lite_optionpanel_wrap',          
	));	
	
	$wp_customize->add_setting('photostat_lite_services_pagecolumn1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'photostat_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'photostat_lite_services_pagecolumn1',array(
		'type' => 'dropdown-pages',			
		'section' => 'photostat_lite_services_pagesection',
	));		
	
	$wp_customize->add_setting('photostat_lite_services_pagecolumn2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'photostat_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'photostat_lite_services_pagecolumn2',array(
		'type' => 'dropdown-pages',			
		'section' => 'photostat_lite_services_pagesection',
	));
	
	$wp_customize->add_setting('photostat_lite_services_pagecolumn3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'photostat_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'photostat_lite_services_pagecolumn3',array(
		'type' => 'dropdown-pages',			
		'section' => 'photostat_lite_services_pagesection',
	));
	
	$wp_customize->add_setting('photostat_lite_services_pagecolumn4',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'photostat_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'photostat_lite_services_pagecolumn4',array(
		'type' => 'dropdown-pages',			
		'section' => 'photostat_lite_services_pagesection',
	));
	
	
	$wp_customize->add_setting('photostat_lite_services_pagecolumn_showsection',array(
		'default' => false,
		'sanitize_callback' => 'photostat_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'photostat_lite_services_pagecolumn_showsection', array(
	   'settings' => 'photostat_lite_services_pagecolumn_showsection',
	   'section'   => 'photostat_lite_services_pagesection',
	   'label'     => __('Check To Show This Section','photostat-lite'),
	   'type'      => 'checkbox'
	 ));//Show Services Page Column Section
	 
	 
	 // Welcome section 
	$wp_customize->add_section('photostat_lite_sitewelcome_section', array(
		'title' => __('Welcome Section','photostat-lite'),
		'description' => __('Select Pages from the dropdown for welcome section','photostat-lite'),
		'priority' => null,
		'panel' => 	'photostat_lite_optionpanel_wrap',          
	));		
	
	$wp_customize->add_setting('photostat_lite_sitewelcome_page',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'photostat_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'photostat_lite_sitewelcome_page',array(
		'type' => 'dropdown-pages',			
		'section' => 'photostat_lite_sitewelcome_section',
	));		
	
	$wp_customize->add_setting('show_photostat_lite_sitewelcome_page',array(
		'default' => false,
		'sanitize_callback' => 'photostat_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_photostat_lite_sitewelcome_page', array(
	    'settings' => 'show_photostat_lite_sitewelcome_page',
	    'section'   => 'photostat_lite_sitewelcome_section',
	    'label'     => __('Check To Show This Section','photostat-lite'),
	    'type'      => 'checkbox'
	));//Show Welcome Section	
		 
}
add_action( 'customize_register', 'photostat_lite_customize_register' );

function photostat_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .blogpost_layout_style h2 a:hover,
        #sidebar ul li a:hover,								
        .blogpost_layout_style h3 a:hover,				
        .postmeta a:hover,
        .button:hover,		
        .footercolumn ul li a:hover, 
        .footercolumn ul li.current_page_item a,        
        .header-contactpart a:hover,
		.welcome_contentcolumn h3 span,		
		.sitefooter ul li a:hover, 
		.sitefooter ul li.current_page_item a,
        .sitehdrmenu ul li a:hover, 
        .sitehdrmenu ul li.current-menu-item a,
        .sitehdrmenu ul li.current-menu-parent a.parent,
        .sitehdrmenu ul li.current-menu-item ul.sub-menu li a:hover				
            { color:<?php echo esc_html( get_theme_mod('photostat_lite_color_scheme','#dd3333')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,					
        .nivo-controlNav a.active,        
		.sitefour_pagecolumn:hover,	
		.nivo-caption .slide_more:hover,											
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,       		
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('photostat_lite_color_scheme','#dd3333')); ?>;}	
			
		.sitefour_pagecolumn:hover .page_imagecolumn,
		h3.widget-title,
		.button:hover
            { border-color:<?php echo esc_html( get_theme_mod('photostat_lite_color_scheme','#dd3333')); ?>;}		
			
						
         	
    </style> 
<?php                                              
}
         
add_action('wp_head','photostat_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function photostat_lite_customize_preview_js() {
	wp_enqueue_script( 'photostat_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'photostat_lite_customize_preview_js' );