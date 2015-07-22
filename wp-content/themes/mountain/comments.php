<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.'.'mountaincreek');?></p>
	<?php
		return;
	}
?>
<?php if ( have_comments() ) : ?>
	<h2 id="comments"><?php comments_number('0 Comments', '1 Comment', '% Comments' );?></h2>

	<ol class="commentlist">
	<?php wp_list_comments(array('avatar_size' => 64)); ?>
	</ol>

<div style="float:left;"><?php previous_comments_link(); ?></div>
<div style="float:right;"><?php next_comments_link(); ?></div>
<div style="clear:both; float:none;"><br><br></div>

 <?php else : ?>
	<?php if ( comments_open() ) : ?>
	 <?php else : ?>
		<p class="nocomments"><?php _e('Comments are closed.','mountaincreek');?></p>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<div id="respond">
<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php _e('You must be ','mountaincreek');?><a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e ('logged in','mountaincreek');?></a><?php _e(' to post a comment.','mountaincreek');?></p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( is_user_logged_in() ) : ?>
<p><?php _e('Logged in as ','mountaincreek');?><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out &raquo;','mountaincreek');?></a></p>
<?php else : ?>
<h3><?php _e('Write you response','mountaincreek');?></h3>
<p><label for="author"><?php _e('Name','mountaincreek');?></label><br/><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></p>

<p><label for="email"><?php _e('Mail','mountaincreek');?></label><br/><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>

<p><label for="url"><?php _e('Website','mountaincreek');?></label><br/><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" /></p>

<?php endif; ?>

<?php comment_form(array(),$post->ID); ?>
</form>
<?php endif;?>
</div>
<?php endif;?>