

<?php if ( is_active_sidebar( 'sobrepie' )) { ?>
  <section class="text-center jumbotron fon-blanco">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="sobre-pie">
            <?php dynamic_sidebar( 'sobrepie' ); ?>          
          </div>
        </div>
      </div>
    </div>
</section>
  <?php } ?>       
      </main>      
      <section id="prefooter">
        <div class="container">
            <div class="row">
              <div class="col-md-12 col-lg-2">
              <h3><?php bloginfo('name'); ?></h3>
                <?php 
                  $params = array(
                    'menu' => 'MENU 1',
                    'menu_class' => 'navbar-nav navbar-right menu-pie',
                    'container'=>'false'
                    );
                  wp_nav_menu($params); ?>
                  <?php dynamic_sidebar( 'PrePie01' );  ?>              	            
              </div>
              <div class="col-md-12 col-lg-3">
              <?php dynamic_sidebar( 'PrePie02' );  ?>              	            
              </div>
              <div class="col-md-12 col-lg-7">
              <?php dynamic_sidebar( 'PrePie03' );  ?>              	            
              </div>
            </div>
        </div>
      </section>
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-sm-4">              
                <?php dynamic_sidebar('pie01') ?>                
            </div>
            <div class="col-sm-4 pt-4">
            <?php 
                  $params = array(
                    'menu' => 'MenuFooterDefinitivo',
                    'menu_class' => 'navbar-nav navbar-right menu-pie',
                    'container'=>'false'
                    );
                  wp_nav_menu($params); ?>
            </div>
            <div class="col-sm-4 pt-2 d-flex justify-content-end">
            <div id="socialLinks" class="mb-10">
                <div>   
                <?php dynamic_sidebar('pie03') ?>         
              </div>
              </div>
            <!--  <div id="firma_eo04">
                      <a href="https://www.eloyortega.com" target="_blank" title="Diseño web por eloyortega.com"><span class="sincss">Diseño web por eloyortega.com</span></a>
              </div>-->              
            </div>
          </div>
        </div>
        <a id="subir-arriba" href="#arriba" class="btn btn-primary btn-lg back-to-top smoothScroll" role="button" title="Click para subir arriba" data-toggle="tooltip" data-placement="left"><i class="fas fa-angle-up"></i></a>
      </footer>  
    <?php wp_footer(); ?>    
  </body>
</html>
            
 