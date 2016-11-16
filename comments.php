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

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'Comment <span>(1)</span>', 'Comment <span>(%1$s)</span>', get_comments_number(), 'comments title', 'dgt-soraka' ), number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<?php dragontheme_comment_nav(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments(array(
					'avatar_size'	=> 50,
					'max_depth'		=> 5,
					'style'			=> 'ul',
					'callback'		=> 'dgt_soraka_comments',
					'type'			=> 'all'
				));
			?>
		</ol><!-- .comment-list -->

		<?php dragontheme_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'dgt-soraka' ); ?></p>
	<?php endif; ?>

	<?php if ( 'open' == $post->comment_status ) : ?>
		<div id="respond-wrap">
			<?php
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$fields =  array(
				'author' => '<p class="comment-form-author"><input placeholder="'.esc_html__('*Name', 'dgt-soraka').'" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . esc_attr($aria_req) . ' /></p>',
				'email' => '<p class="comment-form-email"><input placeholder="'.esc_html__('*Email', 'dgt-soraka').'" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . esc_attr($aria_req) . ' /></p>',
				'url' => '<p class="comment-form-url"><input placeholder="'.esc_html__('*Company', 'dgt-soraka').'" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
			);
			$comments_args = array(
				'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
				'logged_in_as'		   => '<p class="logged-in-as">' . sprintf( wp_kses(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'dgt-soraka' ), array('a' => array('href', 'title'))), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', esc_url(get_permalink()) ) ) ) . '</p>',
				'title_reply'          => esc_html__( 'Leave Comment', 'dgt-soraka' ),
				'title_reply_to'       => esc_html__( 'Leave a reply to %s', 'dgt-soraka' ),
				'cancel_reply_link'    => esc_html__( 'Click here to cancel the reply', 'dgt-soraka' ),
				'label_submit'         => esc_html__( 'Post comment', 'dgt-soraka' ),
				'comment_field'		   => '<p class="comment-form-comment"><textarea placeholder="*Message" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
				'must_log_in'		   => '<p class="must-log-in">' .  sprintf( wp_kses(__( 'You must be <a href="%s">logged in</a> to post a comment.', 'dgt-soraka' ), array('a' => array('href'))), wp_login_url( apply_filters( 'the_permalink', esc_url(get_permalink()) ) ) ) . '</p>',
			);
			?>

			<?php comment_form($comments_args); ?>
		</div>
	<?php endif /* if ( 'open' == $post->comment_status ) */ ?>

</div><!-- .comments-area -->