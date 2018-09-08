<?php get_header(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    
<div class="container listado-posts">
  <div class="row">      
      <?php if( have_posts () ) : while (have_posts () ) : the_post(); ?>                
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
          <div class="card">
              <?php if ( has_post_thumbnail($post->ID)) : ?>
                  <a href="<?php the_permalink() ?>" title="Leer más">
                  <?php the_post_thumbnail('min-blog', array('class'=>'card-img-top img-fluid')); ?>          
                </a>
              <?/*php else : */?>
                <!--<img src="<?php echo get_template_directory_uri(); ?>/images/no-foto-blog.png" class="img-responsive" alt="<?php the_title(); ?>">-->
              <?php endif; ?>   
              <div class="card-body">
                <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                <div class="contenido-intro-noticia">
                  <p class="datos-noticia">
                  <!--<i class="fa fa-user"></i> <?php the_author(); ?> | -->
                  <i class="far fa-calendar-alt"></i> <?php the_time('j, F Y'); ?> | <a href="<?php the_permalink() ?>#comments" title="Ver comentarios" class="mr-15">
                  <i class="fas fa-comments"></i> <?php $numero_de_comentarios = get_comments_number(); echo $numero_de_comentarios;?></a> 
                </p> 
                
                <?php the_excerpt() ;?>          
                </div>                   
                <div class="mb-1">
                  <a href="<?php the_permalink() ?>" class="btn btn-danger" role="button" title="Leer más"><?php echo pll__("Leer más") ?></a>
                </div>
              </div>                  
          </div>            
        </div>
          
          
          <?php endwhile; else : ?>

        <div class="page-header">
          <h1> Falta contenido </h1>
        </div>
      <?php endif; ?>
      
            <!--paginador-->
            </div><!--row-->         
          <div class="row paginador mb-50">

            <?php
            $args = array(  
            'prev_next'          => true,
            'prev_text'          => __('« '),
            'next_text'          => __(' »')
          );
            echo paginate_links( $args ); ?>
          </div>
   <!--Fin Paginador-->
   
</div><!--container-->

    
<?php get_footer(); ?>
