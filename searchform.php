
<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
    <div class="input-wrapper">
        <input type="search" class="form-control" placeholder="<?php echo pll__('Buscar')?>" value="<?php echo get_search_query() ?>" name="s" title="Search" />
        <span class="input-icon fa fa-search"></span>
    </div>
</form>