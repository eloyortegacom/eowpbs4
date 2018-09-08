<?php 
/*
Template Name: Con Sidebar
*/
 ?>
<?php get_header(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <?php if( have_posts () ) : while (have_posts () ) : the_post(); ?>        
        <?php the_content(); ?>
        <?php endwhile; else : ?>        
      <?php endif; ?>
      </div>

        <?php get_sidebar('blog'); ?>
      
  </div>
</div>
    
<?php get_footer(); ?>
