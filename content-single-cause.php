<?php
/**
 * DGT Soraka
 * @package     dgt-soraka
 * @version     1.0.0
 * @author      Dragontheme
 * @link        http://dgtthemes.com
 * @copyright   Copyright (c) 2016 Dragontheme
 * @license     Commercial
 */
?>

<?php
$class = ' has-thumbnail';
if(!has_post_thumbnail()){
	$class = ' no-thumbnail';
}
?>

<article id="post-<?php echo esc_attr(get_the_ID()); ?>" <?php post_class('single-content dgt-cause-details' . esc_attr($class)); ?>>
	<?php
		// Post thumbnail.
		dragontheme_post_thumbnail();
	?>

	<div class="dgt-cause-details-info clearfix">
		<div class="dgt-cause-details-inner row">
		<?php
		$currency_position  = get_post_meta ( get_the_ID(), 'dgtfw_currency_position', true);
		$currency           = get_post_meta ( get_the_ID(), 'dgtfw_currency', true);
		$current_funding    = get_post_meta ( get_the_ID(), 'dgtfw_current_funding', true);
		$goal               = get_post_meta ( get_the_ID(), 'dgtfw_goal', true);
		$thousand_separator = get_post_meta ( get_the_ID(), 'dgtfw_thousand_separator', true);
		$start_date         = get_post_meta ( get_the_ID(), 'dgtfw_start_date', true);
		$end_date           = get_post_meta ( get_the_ID(), 'dgtfw_end_date', true);
		?>
		<div class="dgt-cause-raised col-sm-9 col-md-9">
						<p class="dgt-raised-number">
							<span><?php esc_html_e( 'Raised: ', 'dgt-soraka'); ?></span>
							<span class="dgt-raised"><?php echo esc_html(dgt_money_format($current_funding, $currency_position, $currency, $thousand_separator )); ?></span>
							<span class="separate">/</span><?php echo esc_html(dgt_money_format($goal, $currency_position, $currency, $thousand_separator )); ?>
						</p>
						<div class="dgt-cause-process-bar dgt-mb0">
							<span class="dgt-cause-percent" data-percent="<?php echo ($goal != 0) ? esc_html(intval(($current_funding/$goal)*100)) : 0 ; ?>"></span>
						</div>
		</div>
		<div class="col-sm-3 col-md-3">
			<div class="pull-right">
			<?php echo dgtfw_get_template_part('cause/donate', 'button') ?>
			</div>
		</div>
	</div>
	</div>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-meta">
		<span><?php echo esc_html(get_the_time('M j, Y')); ?></span>
		<span><i class="ion-chatbubble-working"></i><?php comments_number( esc_html__('0 Comment', 'dgt-soraka'), esc_html__('1 Comment', 'dgt-soraka'), esc_html__('% Comments', 'dgt-soraka') ); ?></span>
		<span><i class="ion-person"></i><?php echo esc_html__('Post By:', 'dgt-soraka'); ?><a href="<?php echo esc_url(get_the_author_link()); ?>"><?php echo esc_html(get_the_author()); ?></a></span>
	</div>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				esc_html__( 'Continue reading %s', 'dgt-soraka' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
		?>
	</div><!-- .entry-content -->

	<?php
	get_template_part('inc/templates/post', 'action');
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>

</article><!-- #post-## -->
