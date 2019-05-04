<?php
/**
 * @package Photostat Lite
 */
?>
<div class="blogpost_layout_style">
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

     <?php
        if (has_post_thumbnail() ){
			echo '<div class="thumbnail_box">';
            the_post_thumbnail();
			echo '</div>';
		}
        ?>

    <header class="entry-header">
        <?php the_title( '<h3 class="single-title">', '</h3>' ); ?>
    </header><!-- .entry-header -->
     <div class="postmeta">
            <div class="post-date"><?php the_date(); ?></div><!-- post-date -->
    </div><!-- postmeta -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'photostat-lite' ),
            'after'  => '</div>',
        ) );
        ?>
        <div class="postmeta">
            <div class="post-tags"><?php the_tags(); ?> </div>
            <div class="clear"></div>
        </div><!-- postmeta -->
    </div><!-- .entry-content -->

    <footer class="entry-meta">
      <?php
      $custom_meta_prefix = "projet-";
      $custom_meta = array($custom_meta_prefix . "technologies", $custom_meta_prefix . "interoperabilite", $custom_meta_prefix . "auteurs", $custom_meta_prefix . "date");
      foreach (get_post_custom() as $key => $valuetable) {
        if(in_array($key, $custom_meta)) {
          foreach($valuetable as $index => $value) {
      ?>
          <div class=<?php echo $key ?>><span class="custommetakey <?php echo $key . "-key" ?>"><?php echo substr($key, strlen($custom_meta_prefix), strlen($key)) ?></span> : <span class="custommetavalue <?php echo $key . "-value" ?>"><?php echo $value ?></span></div>
      <?php
          }
        }
      } ?>
      <?php edit_post_link( __( 'Edit', 'photostat-lite' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->

</article>
</div><!-- .blogpost_layout_style-->
