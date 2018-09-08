<?php 
/*
Template Name: Aplicaciones
*/
 ?>
<?php get_header(); ?>  
<?php 
$do_not_duplicate = array();
  $values = array(
    'post_type'=>'slider',
    //'orderby'=>'date',
    'meta_key'=> 'meta-box-slider-orden',
    'orderby'=> 'meta_value',                            
    'order'=>'ASC'    
    );
  $query = new WP_Query($values);
 ?>
<div id="homeCarousel" class="carousel slide" data-ride="carousel">
        <!--<ol class="carousel-indicators">
          <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#homeCarousel" data-slide-to="1"></li>
          <li data-target="#homeCarousel" data-slide-to="2"></li>
        </ol>-->
        
  <ol class="carousel-indicators">
    <?php if( have_posts () ) : while ($query->have_posts () ) : $query->the_post(); ?>
    <li href="#homeCarousel" data-slide-to="<?php echo $query->current_post; ?>" class="<?php if($query->current_post == 0): ?>active <?php endif; ?>"></li>
  <?php endwhile; endif; ?>
    
  </ol>
  <div class="carousel-inner">  
    <?php if( have_posts () ) : while ($query->have_posts () ) : $query->the_post(); ?>
      <?php 
      $thumbnail_id = get_post_thumbnail_id();
      $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'foto-slider', true);
      $thumbnail_meta = get_post_meta($thumbnail_id,'_wp_attachment_image_alt', true);
       ?>
      <div class="carousel-item <?php if($query->current_post == 0): ?>active <?php endif; ?>">
        <section class="jumbotron">
            <div class="text-center">
              <h2 class="borde-lat text-center"><?php the_title(); ?></h2>    
              <span class="filete d-block"></span>
              <p><?php echo get_post_meta( get_the_ID(), 'meta-box-slider-01', true );?></p>              
            </div>
        </section>
        <section class="jumbotron fon-gris-claro p-0">        
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="col-md-6 texto-slider">
                <!--<div class="carousel-caption">            -->
                  <h3 class="text-dorado"><?php the_title(); ?></h3>
                  <?php the_content(); ?>                                  
                <!--</div>-->
              </div>
              <div class="col-md-6 img-slider">
                <img class="" src="<?php echo $thumbnail_url[0]; ?>" alt="">
              </div>
            </div>
          </div>
          </section>
          <section class="jumbotron">
            <div class="container text-center">
              <h3 class="text-dorado">INNUMERABLES APLICACIONES</h3>
              <p><?php echo get_post_meta( get_the_ID(), 'meta-box-slider-02', true );?></p>
            </div>
          </section>
      </div>
    <?php $do_not_duplicate[] = $post->ID; ?>
    <?php endwhile; endif; ?>          
  </div>
        <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
</div>
<?php if( have_posts () ) : while (have_posts () ) : the_post(); ?>

        <?php the_content(); ?>
        <?php endwhile; else : ?>
        <div class="page-header">
          <h1> Falta contenido </h1>
        </div>
      <?php endif; ?>
<?php get_footer(); ?>
