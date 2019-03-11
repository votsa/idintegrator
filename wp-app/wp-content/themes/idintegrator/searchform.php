<form role="search" method="get" class="searchform idintegrator-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="search-input-wrap">
    <span class="search-icon"><img src="/wp-content/themes/idintegrator/assets/images/search.svg" /></span>
    <input type="text" class="s form-control form-control-lg" name="s" placeholder="<?php esc_attr_e( 'Search', 'idintegrator' ); ?>" value="<?php the_search_query(); ?>" />
  </div>
</form>
