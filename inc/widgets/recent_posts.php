<?php
/**
 * Plugin Name: Latest Posts Widget
 */

add_action( 'widgets_init', 'dgt_soraka_latest_news_load_widget' );

function dgt_soraka_latest_news_load_widget() {
	register_widget( 'dgt_soraka_latest_news_widget' );
}

class dgt_soraka_latest_news_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'dgt_soraka_latest_news_widget', 'description' => esc_html__('A widget that displays your latest posts from all categories or a certain', 'dgt-soraka') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'dgt_soraka_latest_news_widget' );

		/* Create the widget. */
		parent::__construct( 'dgt_soraka_latest_news_widget', esc_html__('DGT: Latest Posts', 'dgt-soraka'), $widget_ops, $control_ops );
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
			<div class="dgt-blog-sidebar">

			<?php  while ($loop->have_posts()) : $loop->the_post(); ?>
				<div class="dgt-blog-item clearfix">
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
						<div class="blog-image">
							<a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark" title="<?php esc_html_e('Permanent Link:', 'dgt-soraka'); ?> <?php the_title(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
						</div>
					<?php endif; ?>
					<div class="blog-info">
						<h4><a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark" title="<?php esc_html_e('Permanent Link:', 'dgt-soraka'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<span class="side-item-meta"><?php the_time( get_option('date_format') ); ?></span>
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
			'title' => esc_html__('Latest Posts', 'dgt-soraka'),
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
			<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
			<?php foreach($categories as $category) { ?>
			<option value='<?php echo esc_attr($category->term_id); ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo esc_attr($category->cat_name); ?></option>
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
