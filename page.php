<?php get_header(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php if( have_posts () ) : while (have_posts () ) : the_post(); ?>
        <!--<div class="page-header">
          <h1> <?php the_title(); ?> </h1>
        </div>-->
        <?php the_content(); ?>
        <?php endwhile; else : ?>
        <div class="page-header">
          <h1> Falta contenido </h1>
        </div>
      <?php endif; ?>
      </div>


      
  </div>
</div>
    
<?php get_footer(); ?>
