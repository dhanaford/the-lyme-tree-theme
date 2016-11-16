<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die();
}
$categories = get_the_category(get_the_ID());

	$category_ids = array();

	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

	$args = array(
		'post_type' => 'post',
		'post__not_in' => array(get_the_ID()),
		'showposts' => 3
	);


	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) { ?>
		<div class="post-related"><div class="post-box"><h5 class="post-box-title"><span><?php echo esc_html__('You Might Also Like', 'dgt-soraka'); ?></span></h5></div>
        <div class="row">
		<?php while( $my_query->have_posts() ) {
			$my_query->the_post();?>
				<div class="item-related col-sm-4 col-md-4">
					<?php get_template_part('content', 'grid'); ?>
				</div>
		<?php
		}
		echo '</div></div>';
	}

wp_reset_postdata();
