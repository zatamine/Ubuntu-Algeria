<?php
/*
Template Name: Single Post
*/
?>
<?php get_header(); ?>

<div id="content" class="content-singular content-single">
	<div class="pad">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php while (have_posts()) : ?>
	<?php the_post(); ?>

<h1><?php the_title(); ?></h1>	
<div class="meta">
	<p>Auteur <?php the_author(); ?> le <?php the_time('j F, Y'); ?></p>
</div>

<div class="content">
	<?php the_content(); ?>
	<?php wp_link_pages(array('before' => '<p class="pages"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

<?php
	$desc = get_the_author_meta('description');
	if (!empty($desc)) {
?>
<div class="post-box post-box-about-author">
	<div class="title">
		<h2>About the Author</h2>
	</div>
	<div class="interior">
		<?php echo get_avatar(get_the_author_meta('email'),53) ?>
		<p><?php echo $desc; ?></p>
		<div class="clear"></div>
	</div>
</div>
<?php 
	}
?>
<div class="post-box post-box-sb">
	<div class="title">
		<h2>Si vous aimez, partagez notre article</h2>
	</div>
	<?php
		remove_filter('excerpt_more','padd_theme_hook_excerpt_index_more');
		add_filter('get_the_excerpt','padd_theme_hook_excerpt_bookmark');
		add_filter('excerpt_more','padd_theme_hook_excerpt_bookmark_more');
		$padd_sb_url = urlencode(get_permalink());
		$padd_sb_title = urlencode(get_the_title());
		$padd_sb_notes = urlencode(get_the_excerpt());
		$padd_img_path = get_template_directory_uri() . '/images/icon-bm-32-%s.png';
	?>
	<div class="interior">
		<ul>
		<li>
		<a href="https://twitter.com/share" class="twitter-share-button" data-via="ubuntudz" data-lang="fr" data-size="large" data-hashtags="ubuntu">Tweeter</a>
		</li>
		<li>
		<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo $padd_sb_url; ?>&amp;send=false&amp;layout=box_count&amp;width=55&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90&amp;appId=291632744236914" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:55px; height:90px;" allowTransparency="true"></iframe>

		</li>
		<?php
		/*
			global $padd_socialbook;
			foreach ($padd_socialbook as $k => $psb) {
				$psb->set_ref_url($padd_sb_url);
				$psb->set_title($padd_sb_title);
				$psb->set_excerpt($padd_sb_notes);
				$psb->set_content('<img alt="' . $psb->get_network() . '" src="' . sprintf($padd_img_path, $k) . '" />');
				echo '<li>' . $psb . '</li>';
			}
			*/
		?>
		</ul>
	</div>
</div>
<?php 
	$enabled = get_option(PADD_NAME_SPACE . '_rp_enable');
	if ($enabled) { 
?>
<div class="post-box post-box-related">
	<div class="title">
		<h2>Article (s) en relation </h2>
	</div>
	<div class="interior">
		<?php
			padd_theme_single_related_posts(get_the_ID());
		?>
	</div>
</div>
<?php } ?>
<?php comments_template('',true); ?>
<?php endwhile; ?>

		</div>
	</div>
</div>

<?php get_sidebar(); ?>

<div class="clear"></div>

<?php get_footer(); ?>
