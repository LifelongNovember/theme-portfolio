<?php
/**
 *Photostat Lite About Theme
 *
 * @package Photostat Lite
 */

//about theme info
add_action( 'admin_menu', 'photostat_lite_abouttheme' );
function photostat_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'photostat-lite'), __('About Theme Info', 'photostat-lite'), 'edit_theme_options', 'photostat_lite_guide', 'photostat_lite_mostrar_guide');   
} 

//Info of the theme
function photostat_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'photostat-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Photostat Lite is a visually stunning, clean, modern, creative and beautiful Free photography WordPress theme. Photostat is an professional and attractive photography multipurpose WordPress theme that has been designed in order to provide a complete and full set solution for professional photographers to quickly and effortlessly create their own unique, distinct and beautiful photography website. This theme is suitable for photography, portfolio, designers, personal and other creative photography related projects. ','photostat-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'photostat-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'photostat-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'photostat-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'photostat-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'photostat-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'photostat-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'photostat-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'photostat-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'photostat-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( PHOTOSTAT_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'photostat-lite'); ?></a> | 
            <a href="<?php echo esc_url( PHOTOSTAT_LITE_PROTHEME_URL ); ?>" target="_blank"><?php esc_html_e('Purchase Pro', 'photostat-lite'); ?></a> | 
            <a href="<?php echo esc_url( PHOTOSTAT_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'photostat-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>