<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die();
}?>
<form method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="dgt-search-form">
        <div class="dgt-input-seach">
            <input type="text" placeholder="<?php echo esc_html__('Type and hit enter', 'dgt-soraka'); ?>" name="s" id="s" />
            <input type="hidden" value="post" name="post_type" id="posttype" />
            <span class="dgt-search-close"><i class="ion-close-round"></i></span>
        </div>
    </div>
</form>
