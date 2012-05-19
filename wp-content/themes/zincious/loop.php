


<?php if (!have_posts()) : ?>

<div id="post-0" class="hentry post error404 not-found">
	<div class="title">
		<h2>Not Found</h2>
	</div>
	<div class="content">
		<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
	</div>
</div>

<?php else : ?>

	<?php add_filter('excerpt_length', 'padd_theme_hook_excerpt_index_length'); ?>
	<?php $i = 1; ?>
	<?php while (have_posts()) : ?>
		<?php the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('append-clear hentry-' . $i ); ?>>
			<div class="title">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			</div>
			<div class="thumbnail">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php
						$padd_image_def = get_template_directory_uri() . '/images/thumbnail.jpg';
						if (has_post_thumbnail()) {
							the_post_thumbnail(PADD_THEME_SLUG . '-thumbnail');
						} else {
							echo '<img class="image-thumbnail" alt="Default thumbnail." src="' . $padd_image_def . '" />';
						}
					?>
				</a>
			</div>
			<div class="meta">
				<p>Auteur <?php the_author(); ?> on <?php the_time('j F, Y'); ?></p>
			</div>
			<div class="excerpt">
				<?php the_excerpt();?>
			</div>
			<?php 
				if (3 == $i) { 
					$i = 1; 
				} else { 
					$i++; 
				}
			?>
		</div>
	<?php endwhile; ?>
	<?php remove_filter('excerpt_length', 'padd_theme_hook_excerpt_index_length'); ?>

	<?php Padd_PageNavigation::render(); ?>

<?php endif; ?>









	
	
