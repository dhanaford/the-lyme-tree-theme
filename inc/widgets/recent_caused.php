<?php
/**
 * Plugin Name: Latest Posts Widget
 */

add_action( 'widgets_init', 'dgt_soraka_latest_cause_widget' );

function dgt_soraka_latest_cause_widget() {
	register_widget( 'dgt_soraka_latest_cause_widget' );
}

class dgt_soraka_latest_cause_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'dgt_soraka_latest_cause_widget', 'description' => esc_html__('A widget that displays your latest posts from all categories or a certain', 'dgt-soraka') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'dgt_soraka_latest_cause_widget' );

		/* Create the widget. */
		parent::__construct( 'dgt_soraka_latest_cause_widget', esc_html__('DGT: Latest Cause', 'dgt-soraka'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$categories = $instance['categories'];
		$number = $instance['number'];


		$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'cat' => $categories);

		$loop = new WP_Query($query);
		if ($loop->have_posts()) :

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . esc_html($title) . $after_title;

		?>
			<div class="dgt-cause-sidebar">

			<?php  while ($loop->have_posts()) : $loop->the_post(); ?>
				<div class="dgt-cause-item">
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
						<div class="cause-image">
							<a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark" title="<?php esc_html_e('Permanent Link:', 'dgt-soraka'); ?> <?php the_title(); ?>">
								<?php the_post_thumbnail('medium'); ?>
							</a>
						</div>
					<?php endif; ?>
					<div class="dgt-cause-infomation">
						<h4 class="dgt-cause-title dgt-blog-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h4>
						<?php
						$currency_position = get_post_meta(get_the_ID(), 'dgtfw_currency_position', true);
						$currency = get_post_meta(get_the_ID(), 'dgtfw_currency', true);
						$current_funding = get_post_meta(get_the_ID(), 'dgtfw_current_funding', true);
						$goal = get_post_meta(get_the_ID(), 'dgtfw_goal', true);
						$thousand_separator = get_post_meta(get_the_ID(), 'dgtfw_thousand_separator', true);
						?>
						<div class="dgt-cause-raised">
							<p class="dgt-raised-number">
								<span><?php esc_html_e('Raised', 'dgt-soraka'); ?></span><?php echo esc_html(dgt_money_format($current_funding, $currency_position, $currency, $thousand_separator)); ?>
							</p>
							<p class="dgt-goal-number">
								<span><?php esc_html_e('Goal', 'dgt-soraka'); ?></span><?php echo esc_html(dgt_money_format($goal, $currency_position, $currency, $thousand_separator)); ?>
							</p>
						</div>
						<?php echo dgtfw_get_template_part('cause/donate', 'button') ?>
					</div>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>

		</div>

		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['categories'] = $new_instance['categories'];
		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'title' => esc_html__('Latest Caused', 'dgt-soraka'),
			'number' => 4,
			'categories' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:', 'dgt-soraka'); ?></label>
			<input  type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>"  />
		</p>

		<!-- Category -->
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php echo esc_html__('Filter by Category:', 'dgt-soraka'); ?></label>
		<select id="<?php echo esc_attr($this->get_field_id('categories')); ?>" name="<?php echo esc_attr($this->get_field_name('categories')); ?>" class="widefat categories" style="width:100%;">
			<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php echo esc_html__('All categories', 'dgt-soraka'); ?></option>
			<?php $categories = get_terms('dgtfw_cause_category'); ?>
			<?php foreach($categories as $category) { ?>
			<option value='<?php echo esc_attr($category->term_id); ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo esc_attr($category->name); ?></option>
			<?php } ?>
		</select>
		</p>

		<!-- Number of posts -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e('Number of posts to show:', 'dgt-soraka'); ?></label>
			<input  type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($instance['number']); ?>" size="3" />
		</p>

	<?php
	}
}
