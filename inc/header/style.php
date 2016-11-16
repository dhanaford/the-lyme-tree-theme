<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die();
}
$enable_canvas = dragontheme_get_option('enable-canvas', '0');
?>
<div class="container">
    <div class="header-section">
     <span class="header-mobile-open-icon visible-sm visible-xs<?php echo ($enable_canvas ? ' visible-md' : ''); ?>"><i class="ion-navicon"></i></span>
     <div class="row">
         <!-- Logo -->
         <div class="col-sm-3 col-md-2 col-lg-3">
             <?php get_template_part('inc/templates/logo', ''); ?>
         </div>
         <div class="hidden-sm hidden-xs col-sm-7 col-md-7<?php echo ($enable_canvas ? ' hidden-md' : ''); ?>">
             <div id="dgt-navigation" class="dgt-navigation">
                 <?php get_template_part('inc/templates/navigation', ''); ?>
             </div>
         </div>
         <div class="hidden-sm hidden-xs col-sm-2 col-md-3 col-lg-2<?php echo ($enable_canvas ? ' hidden-md' : ''); ?>">
             <?php get_template_part('inc/header/header', 'right'); ?>
         </div>
     </div>
    </div>
</div>
