<?php
/*
Template Name: Tag
*/
?>
<?php get_header(); ?>

<div id="content" class="content-group content-tag">
	<div class="pad">
		<div class="post-group">
			<h1 class="title">Article Taggué &#8216;<?php single_tag_title(); ?>&#8217;</h1>
			<?php rewind_posts(); ?>		
			<?php get_template_part('loop','tag'); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
