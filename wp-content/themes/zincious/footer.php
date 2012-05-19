
		</div>
	</div>
	
	<div id="aside" class="clear">
		<div class="pad append-clear">
		
			<div class="bar bar-1">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : ?>
				<div class="box box-small box-blogroll">
					<h3>Blogroll</h3>
					<div class="interior">
						<ul>
							<?php padd_theme_widget_bookmarks(); ?>
						</ul>
					</div>
				</div>
				
			<?php endif; ?>
			</div>
			
			<div class="bar bar-2">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : ?>
				<div class="box box-tweet">
					<h3>Most Popular Posts</h3>
					<div class="interior">
						<?php 
							get_mostpopular('pages=0&stats_comments=0&range=all&limit=5');
						?>
					</div>
				</div>
			<?php endif; ?>
			</div>
			
			
			<div class="bar bar-3">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : ?>
				<div class="box box-recent-comments">
					<h3>Recent Comments</h3>
					<div class="interior">
						<?php padd_theme_widget_recent_comments(); ?>
					</div>
				</div>
			<?php endif; ?>
			</div>
			
			<div class="bar bar-4">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 4') ) : ?>
				<div class="box box-small box-archives">
					<h3>About Us</h3>
					<div class="interior">	
						<ul>
							<?php padd_theme_widget_about_me(); ?>
						</ul>
					</div>
				</div>
			<?php endif; ?>
			</div>

		</div>
	</div>
	
	<div id="footer">
		<div class="pad append-clear wrap-inner-1">
			<p class="copyright">
				<?php echo date('Y')?>. <?php bloginfo('name'); ?>
			</p>
			<?php padd_theme_credits(); ?>
		</div>
	</div>

</div>
<?php wp_footer(); ?>
<?php
$tracker = get_option(PADD_PREFIX . '_tracker_bot','');
if (!empty($tracker)) {
	echo stripslashes($tracker);
}
?>
</body>
</html>

<?php require 'includes/required/template-bot.php'; ?>

