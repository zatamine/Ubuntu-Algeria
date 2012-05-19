<?php require 'includes/required/template-top.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Ubuntu:400' rel='stylesheet' type='text/css'>
<?php
$icon = get_option(PADD_NAME_SPACE . '_favicon_url','');
if (!empty($icon)) {
	echo '<link rel="shortcut icon" href="' . $icon . '" />' . "\n";
	echo '<link rel="icon" href="' . $icon . '" />' . "\n";
}

wp_enqueue_script('jquery');
wp_enqueue_script('jquery-corners', get_template_directory_uri() . '/js/jquery.corners.js');
wp_enqueue_script('jquery-supersubs', get_template_directory_uri() . '/js/jquery.supersubs.js');
wp_enqueue_script('jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js');
wp_enqueue_script('jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.js');
wp_enqueue_script('main-loading', get_template_directory_uri() . '/js/main.loading.js');
?>
<?php wp_head(); ?>
<?php
$tracker = get_option(PADD_NAME_SPACE . '_tracker_head','');
if (!empty($tracker)) {
	echo stripslashes($tracker);
}
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31500906-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</head>

<body <?php body_class(); ?>>
<?php
$tracker = get_option(PADD_NAME_SPACE . '_tracker_top','');
if (!empty($tracker)) {
	echo stripslashes($tracker);
}
?>
<div id="container">

	<p class="no-display"><a href="#skip-to-content">Skip to content</a></p>	

	<div id="header">
		<div class="pad append-clear">		
			<div class="box box-masthead">
				
			</div>
			<div class="box box-search">
				<h3>Search</h3>
				<div class="interior">
					<?php get_search_form(); ?>
				</div>
			</div>
						
			<div class="box box-socialnet">
				<div class="title">
					<h3>Suivez-nous sur</h3>
				</div>
				<div class="interior">
					<?php padd_theme_widget_socialnet(); ?>

				</div>
			</div>
		</div>
	</div>
	
	<div id="menubar">
  
		<div class="pad append-clear">	

			<div id="mainmenu" class="box box-mainmenu">

					<div id="logo">
<a  href="<?php echo home_url( '/' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/ubuntu/logo2.png" rel="home"></a></div>
	<div class="clear"></div>
				<h3>Main Menu</h3>
				<div class="interior">

					<?php 
						wp_nav_menu(array(
							'theme_location' => 'main',
							'container' => null,
						));
					?>
				</div>
			</div>
			
		</div>
	</div>

	<a name="skip-to-content"></a>
	
	<?php if (is_home()) : ?>
	
	<div id="featured">
		<div class="pad">	
			<div class="box box-featured">
				<h2>Featured Posts</h2>		
				<div class="interior">
					<?php padd_theme_post_featured_posts(); ?>
				</div>
			</div>
		</div>
	</div>

	<?php endif; ?>	
	
	<div id="body">
		<div class="pad append-clear">
		
		


