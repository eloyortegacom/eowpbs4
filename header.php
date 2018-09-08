<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->        
    <title><?php wp_title('-',true, 'right'); ?><?php bloginfo('name'); ?></title>    
    <?php wp_head(); ?>
  </head>
  <body id="arriba" <?php body_class();?>>
     <header>       
      <nav id="cabecera" class="navbar fixed-top cab-scroll-arriba navbar-expand-lg d-block pt-0 pr-0 pl-0">
        <div class="container">   
          <div class="row justify-content-between flex-grow-1 d-block d-lg-flex align-items-center">                                                 
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" alt="<?php bloginfo('name'); ?>" class="img-fluid" width="187"></a>
            
            <div class="flex-column top-header">                        
              <div class="d-flex flex-row justify-content-end">
              <!--<i class="fas fa-globe"></i>-->
              <?php if (dynamic_sidebar('top')); ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <div id="navbarCollapse" class="navbar-collapse collapse justify-content-end">
                <?php 
                $params = array(
                  'menu' => 'MENU 1',
                  'menu_class' => 'navbar-nav',
                  'walker'			=> new WP_Bootstrap_Navwalker(),
                  'container'=>'false'
                  );
                wp_nav_menu($params); ?>
                
              </div>
            </div>            
          </div>
        </div>        
      </nav> 
      <?php if (!is_front_page()) : ?>
        <div class="cabecera-int">                       
            <div class="container">
              <div class="row cabecera-int-int align-items-end">                                  
                  <div class="page-header">
                    <h1><?php wp_title('', true, 'left'); ?> </h1>                                        
                  </div>
              </div>
            </div>
        </div>
      <?php endif; ?>
      <!--Fin Cabecera int-->         
    </header>
    <main>