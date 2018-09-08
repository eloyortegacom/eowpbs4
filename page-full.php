<?php 
/*
Template Name: Ancho completo
*/
 ?>
<?php get_header(); ?>  
<?php if( have_posts () ) : while (have_posts () ) : the_post(); ?>

        <?php the_content(); ?>
        <?php endwhile; else : ?>
        <div class="page-header">
          <h1> Falta contenido </h1>
        </div>
      <?php endif; ?>
<?php get_footer(); ?>
