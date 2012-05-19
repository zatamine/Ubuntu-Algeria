<?php
/*
Template Name: Archive
*/
?>
<?php get_header(); ?>

<div id="content" class="content-group content-author">
	<div class="pad">
		<div class="post-group">
			<?php the_post(); ?>
			<h1 class="title">Auteur <?php the_author(); ?></h1>
			<?php rewind_posts(); ?>		
			<?php get_template_part('loop','archive'); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
