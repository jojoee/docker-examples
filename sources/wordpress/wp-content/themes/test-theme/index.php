<?php get_header(); ?>

<div id="main">
  <div id="content">
    <h1>Main Area</h1>
    <?php
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
      
          the_title();
          echo '<br />';
          the_content( __( 'more...' ) );
        }

      } else {
        _e( 'Sorry' );
      }
    ?>
  </div>
  
  <div id="sidebar">
    <?php get_sidebar(); ?>  
  </div>
</div>

<?php get_footer(); ?>
