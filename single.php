
<?php get_header(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <?php if( have_posts () ) : while (have_posts () ) : the_post(); ?>
      <div class="mw-57 mx-auto">
          <?php the_post_thumbnail('single-principal', array('class'=>'img-fluid mb-3')); ?>
          <div class="clearfix"></div>
          <div class="page-header">
          <h2> <?php the_title(); ?> </h2>
          <p class="datos-noticia">
                  <!--<i class="fa fa-user"></i> <?php the_author(); ?> | -->
                  <i class="far fa-calendar-alt"></i> <?php the_time('j, F Y'); ?> | <a href="<?php the_permalink() ?>#comments" title="Ver comentarios" class="mr-15">
                  <i class="fas fa-comments"></i> <?php $numero_de_comentarios = get_comments_number(); echo $numero_de_comentarios;?></a> 
                </p>                    

        </div>
        
          <?php the_content(); ?>
        
        <?php if(has_tag()) : ?>
        <div class="mt-20"><?php 
          echo pll__('Etiquetado como: ');
          the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>' );
         ?></div>
       <?php endif; ?>
        <div class="clearfix"></div>
        <div>
          <p class="mt-30 mb-0"><?php echo pll__('Comparte este artículo:') ?></p>         
          <?php get_template_part('content', 'share');?>
        </div>
        <?php comments_template(); ?>
        </div>
        <?php endwhile; else : ?>                 
      <?php endif; ?>
      </div>

        <?php get_sidebar('blog'); ?>
      
  </div>
</div>
    
<?php get_footer(); ?>
