<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Id_integrator
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

<div id="comments" class="comments-area card">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h5 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					/* translators: %d: number of comments. */
					esc_html( _n( '%d comment', '%d comments', get_comments_number(), 'idintegrator' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h5><!-- .comments-title -->

		<?php
		the_comments_navigation( array(
			'next_text' => esc_html__( 'Newer Comments', 'idintegrator' ),
			'prev_text' => esc_html__( 'Older Comments', 'idintegrator' ),
		) ); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'          => 'ul',
					'short_ping'     => true,
					'avatar_size'	 => 60,
					'callback'       => 'Id_integrator_comment'
				) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation( array(
			'next_text' => esc_html__( 'Newer Comments', 'idintegrator' ),
			'prev_text' => esc_html__( 'Older Comments', 'idintegrator' ),
		) );

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'idintegrator' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().
	?>

	<?php if( comments_open() ) : ?>
		<div class="wb-comment-form">
			<?php
				$Id_integrator_comment_field = '<div class="comment-form-textarea form-group col-md-12"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control" placeholder="'. esc_attr__('Enter your comment...*', 'idintegrator') .'"></textarea></div>';
				$Id_integrator_fields =  array(
				  'author' => '<div class="comment-form-author form-group col-md-4"><input id="author" placeholder="'. esc_attr__('Name *', 'idintegrator') .'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30" class="form-control" required /></div>',
				  'email'  => '<p class="comment-form-email form-group col-md-4"><input id="email" placeholder="'. esc_attr__('Email *', 'idintegrator') .'" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) .'" size="30" class="form-control" required /></p>',
				  'url'    => '<p class="comment-form-url form-group col-md-4"><input id="url" placeholder="'. esc_attr__('Website', 'idintegrator') .'" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) .'" size="30" class="form-control" /></p>',
				);

				comment_form( array(
					'title_reply_before'   => '<h5 class="reply-title">',
					'title_reply_after'    => '</h5>',
					'title_reply'          => esc_html__('Leave a Reply', 'idintegrator'),
					'cancel_reply_link'    => esc_html__('Cancel', 'idintegrator'),
					'label_submit'         => esc_html__('Post Comment', 'idintegrator'),
					'class_submit'         => 'submit btn btn-primary comment-submit-btn',
					'submit_field'         => '<div class="form-submit w-100 text-center">%1$s %2$s</div>',
					'cancel_reply_before'  => '<small class="wb-cancel-reply">',
					'class_form'           => 'comment-form row align-items-center',
					'comment_notes_before' => '<div class="col-md-12 text-muted wb-comment-notes"><p>' . __( 'Your email address will not be published. Required fields are marked *', 'idintegrator' ) . '</p></div>',
					'comment_notes_after'  => '',
					'comment_field'        => $Id_integrator_comment_field,
					'fields'               => $Id_integrator_fields,
				) );
			?>
		</div>
	<?php endif; ?>

</div><!-- #comments -->
