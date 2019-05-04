<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Photostat Lite
 */
?>

<div class="sitefooter">        
            <div class="container">
                  <div class="footerlogo"><?php bloginfo('name'); ?></div>
                  <?php wp_nav_menu( array('theme_location' => 'footer') ); ?>                                    
                <div class="clear"></div>
           </div><!--end .container--> 
           
           <div class="copyrightwrap">
              <div class="container">
                 <div class="footercopyright">
				    <?php esc_html_e('All Rights Reserved', 'photostat-lite');?> <a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/free-photography-wordpress-theme/', 'photostat-lite' ) ); ?>" target="_blank">
				       <?php printf( __( 'Theme by %s', 'photostat-lite' ), 'Grace Themes' ); ?>
                    </a>
                  </div>
            </div><!--end .container-->  
         </div><!--end .copyrightwrap-->     
                                 
     </div><!--end #sitefooter-->
</div><!--#end sitelayout_type-->

<?php wp_footer(); ?>
</body>
</html>