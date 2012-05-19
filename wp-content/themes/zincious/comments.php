<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ('Please do not load this page directly. Thanks!');
}
?>
<a name="comments"></a>
<div class="post-box post-box-replies post-box-comments">
	<div class="title">
		<h2>Commentaire</h2>
	</div>
	<div class="interior post-box-comments-interior">
	<?php if (post_password_required()) : ?>
		<p class="no-comments">This post is password protected. Enter the password to view comments.</p>
	<?php elseif (!empty($comments_by_type['comment'])) : ?>
		<ol class="comments-list">
			<?php wp_list_comments('type=comment&callback=padd_theme_single_comments'); ?>
		</ol>
	<?php else : ?>
		<p class="no-comments">Soyez le premier a commenter</p>
	<?php endif; ?>
	</div>
</div>

<a name="trackbacks"></a>
<div class="post-box post-box-replies post-box-trackbacks">
	<div class="title">
		<h2>Trackbacks</h2>
	</div>
	<div class="interior post-box-trackbacks-interior">
	<?php if (post_password_required()) : ?>
		<p class="no-trackbacks">Ce poste est protégé. Entrez votre mot de passe pour visualiser trackbacks.</p>
	<?php elseif (!empty($comments_by_type['pings'])) : ?>
		<ol class="trackbacks-list">
			<?php wp_list_comments('type=pings&callback=padd_theme_single_trackbacks'); ?>
		</ol>
	<?php else : ?>
		<p class="no-trackbacks">Il n'y a pas de trackbacks pour cet article.</p>
	<?php endif; ?>
	</div>
</div>


<?php if (comments_open()) : ?>

<a name="reply"></a>
<div class="post-box post-box-reply" id="reply">
	<div class="title post-box-reply-title append-clear">
		<h2><?php comment_form_title('Ajouter un commentaire', 'Ajouter un commentaire à %s'); ?></h2>
		<p class="cancel-comment-reply"><small><?php cancel_comment_reply_link(); ?></small></p>
	</div>
	<div class="interior post-box-reply-interior">
		<?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
		<p>Doit être <a href="<?php echo wp_login_url(get_permalink()); ?>">connecté</a> pour poublier le commentaire</p>
		<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form">
			<?php if ( is_user_logged_in() ) : ?>
			<p>Se connecté <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Déconnexion &raquo;</a></p>
			<?php else : ?>
			<p class="input">
				<label for="comment-author">Nom</label>
				<input type="text" name="author" id="comment-author" value="<?php echo '' != esc_attr($comment_author) ? esc_attr($comment_author) : 'Name'; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				<small><?php if ($req) echo "Required"; ?></small>
			</p>
			<p class="input">
				<label for="comment-email">E-mail</label>
				<input type="text" name="email" id="comment-email" value="<?php echo '' != esc_attr($comment_author_email) ? esc_attr($comment_author_email) : 'Email'; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				<small><?php if ($req) echo "Required"; else echo "Optional"; ?></small>
			</p>
			<p class="input">
				<label for="comment-url">Site web</label>
				<input type="text" name="url" id="comment-url" value="<?php echo '' != esc_attr($comment_author_url) ? esc_attr($comment_author_url) : 'Website'; ?>" size="22" tabindex="3" />
				<small>Optional</small>
			</p>
			<?php endif; ?>
			<p>
				<textarea name="comment" id="comment-comment" cols="22" rows="5" tabindex="4">Message</textarea>
			</p>
			<div class="comment-notify-submit">
				<?php 
					if (function_exists('show_subscription_checkbox')) {
						show_subscription_checkbox();
					}
				?>
				<p class="comment-submit"><button type="submit" name="submit" value="submit" id="comment-submit" tabindex="5" ><span>Valider</span></button></p>
				<div class="clear"></div>
			</div>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
		<?php endif; ?>
	</div>
</div>

<?php endif; ?>
