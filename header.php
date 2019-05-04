<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Photostat Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$photostat_lite_front_sliderpgeshowoption 	  	     = get_theme_mod('photostat_lite_front_sliderpgeshowoption', false);
$photostat_lite_services_pagecolumn_showsection 	 = get_theme_mod('photostat_lite_services_pagecolumn_showsection', false);
$show_photostat_lite_sitewelcome_page	             = get_theme_mod('show_photostat_lite_sitewelcome_page', false);
?>
<div id="sitelayout_type" <?php if( get_theme_mod( 'photostat_lite_boxlayout_option' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($photostat_lite_front_sliderpgeshowoption)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="site-header <?php echo $inner_cls; ?>"> 
<div class="container">    
     <div class="logo">
        <?php photostat_lite_the_custom_logo(); ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div><!-- logo -->
     <div class="hdrright_area">
       <div class="toggle">
         <a class="toggleMenu" href="#"><?php esc_html_e('Menu','photostat-lite'); ?></a>
       </div><!-- toggle --> 
       <div class="sitehdrmenu">                   
         <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
       </div><!--.sitehdrmenu -->
     </div><!--.hdrright_area -->
<div class="clear"></div>  
</div><!-- container --> 
</div><!--.site-header --> 

<?php 
if ( is_front_page() && !is_home() ) {
if($photostat_lite_front_sliderpgeshowoption != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('photostat_lite_front_sliderpge'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('photostat_lite_front_sliderpge'.$i,true));
	  }
	}
?> 
<div class="headersliderwrap">                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo $j; ?>" class="nivo-html-caption">        
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
    <?php
    $photostat_lite_front_sliderpgemore = get_theme_mod('photostat_lite_front_sliderpgemore');
    if( !empty($photostat_lite_front_sliderpgemore) ){ ?>
    	<a class="slide_more" href="<?php the_permalink(); ?>"><?php echo esc_html($photostat_lite_front_sliderpgemore); ?></a>
    <?php } ?>       
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>  
</div><!--end .headersliderwrap -->     
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
if( $photostat_lite_services_pagecolumn_showsection != ''){ ?>  
<section id="services_fixer_area">
<div class="container">                      
<?php 
for($n=1; $n<=4; $n++) {    
if( get_theme_mod('photostat_lite_services_pagecolumn'.$n,false)) {      
	$queryvar = new WP_Query('page_id='.absint(get_theme_mod('photostat_lite_services_pagecolumn'.$n,true)) );		
	while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
    
	<div class="sitefour_pagecolumn <?php if($n % 4 == 0) { echo "last_column"; } ?>">                                    
		<?php if(has_post_thumbnail() ) { ?>
		<div class="page_imagecolumn"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
		<?php } ?>
		<div class="page_desccolumn">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                     
		<?php the_excerpt(); ?>		   
		</div>                                   
	</div>
	<?php endwhile;
	wp_reset_postdata();                                  
} } ?>                                 
<div class="clear"></div>  
</div><!-- .container -->                  
</section><!-- #services_fixer_area-->                      	      
<?php } ?>


<?php if( $show_photostat_lite_sitewelcome_page != ''){ ?>  
<section id="site_welcome_fixer">
<div class="container">                               
<?php 
if( get_theme_mod('photostat_lite_sitewelcome_page',false)) {     
$queryvar = new WP_Query('page_id='.absint(get_theme_mod('photostat_lite_sitewelcome_page',true)) );			
    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>                              
     <div class="welcomepag_thumcolumn"><?php the_post_thumbnail();?></div>
     <div class="welcome_contentcolumn">   
     <h3><?php the_title(); ?></h3>   
     <?php the_excerpt(); ?>   
     <a class="button" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','photostat-lite'); ?></a>
    </div>                                    
    <?php endwhile;
     wp_reset_postdata(); ?>                                    
    <?php } ?>                                 
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #site_welcome_fixer-->
<?php } ?>
<?php } ?>