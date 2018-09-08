<?php get_header(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="page-header">
        <h1><?php wp_title(''); ?></h1>
        </div>
        
        
        
      <?php if( have_posts () ) : while (have_posts () ) : the_post(); ?>
        
        <article class="post">
          <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>          
          <p>Escrito por:  <?php the_author(); ?>            
          Fecha <?php the_time('l j, F Y'); ?>
          Categoría: <?php the_category(', '); ?>
          </p>          
          <?php the_post_thumbnail('medium', array('class'=>'img-responsive')); ?>
          <?php the_excerpt() ;?>          
        </article>
        <hr>

        
        <?php the_content(); ?>
        <?php endwhile; else : ?>
        <div class="page-header">
          <h1> Falta contenido </h1>
        </div>
      <?php endif; ?>
      </div>

        <?php get_sidebar('blog'); ?>
      
  </div>
</div>
    
<?php get_footer(); ?>
