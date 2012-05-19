
<div id="sidebar">
	<div class="pad">

		<h2>Sidebar</h2>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
	
<div class="box box-ads">
	<div class="title">
		<h3>Sponsors</h3>
	</div>
	<div class="interior">
		<?php padd_theme_widget_sponsors(); ?>
	</div>
</div>

<div class="box box-popular-posts">
	<div class="title">
		<h3>Popular Posts</h3>
	</div>
	<div class="interior">
		<?php 
			get_mostpopular('pages=0&stats_comments=1&range=all&limit=5&thumbnail_width=57&thumbnail_height=57&do_pattern=1&pattern_form={image}{title}{stats}');
		?>
	</div>
</div>

<div class="box box-tweet">
	<div class="title">
		<h3>Recent Tweets</h3>
	</div>
	<div class="interior">
		<?php 
			$padd_sb_twitter = unserialize(get_option(PADD_NAME_SPACE . '_sn_username_twitter'));
			echo Padd_Twitter::get_messages($padd_sb_twitter->get_username(),3,true); 
		?>
	</div>
</div>

<div class="box box-blogroll">
	<div class="title">
		<h3>Blogroll</h3>
	</div>
	<div class="interior">
		<ul>
		<?php padd_theme_widget_bookmarks(); ?>
		</ul>
	</div>
</div>

<div class="box box-flickr-rss" id="flickrrss">
	<div class="title">
		<h3>Featured Photos</h3>
	</div>
	<div class="interior">
		<?php 
			if (function_exists('get_flickrRSS')) {
				echo '<div class="inner">';
				echo get_flickrRSS();
				echo '</div>';
			} else {
				echo '<p class="notice">You have to install <a href="http://wordpress.org/extend/plugins/flickr-rss/">flickrRSS</a> plugin.</p>';
			}
		?>
	</div>
</div>

	<?php endif; ?>

	</div>
</div>


