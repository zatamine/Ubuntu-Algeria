<?php


function padd_theme_widget_socialnet() {
	$padd_sb_delicious = unserialize(get_option(PADD_NAME_SPACE . '_sn_username_delicious'));
	$padd_sb_digg = unserialize(get_option(PADD_NAME_SPACE . '_sn_username_digg'));
	$padd_sb_googlebuzz = unserialize(get_option(PADD_NAME_SPACE . '_sn_username_googlebuzz'));
	$padd_sb_facebook = unserialize(get_option(PADD_NAME_SPACE . '_sn_username_facebook'));
	$padd_sb_stumbleupon = unserialize(get_option(PADD_NAME_SPACE . '_sn_username_stumbleupon'));
	$padd_sb_technorati = unserialize(get_option(PADD_NAME_SPACE . '_sn_username_technorati'));
	$padd_sb_feedburner = unserialize(get_option(PADD_NAME_SPACE . '_sn_username_feedburner'));
	$padd_sb_twitter = unserialize(get_option(PADD_NAME_SPACE . '_sn_username_twitter'));
?>
<ul class="socialnet">
	<li class="twitter">
		<a href="<?php echo $padd_sb_twitter; ?>" class="icon-twitter" title="Twitter Page">Follow my Tweets</a>
	</li>
	<li class="facebook">
		<a href="<?php echo $padd_sb_facebook; ?>" class="icon-facebook" title="Facebook Profile">Be my Facebook fan</a>
	</li>
	<li class="mail">
		<a href="http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $padd_sb_feedburner->get_username(); ?>" title="RSS Email">Subscribe via Email</a></span>
	</li>
	<li class="rss">
		<a href="<?php echo $padd_sb_feedburner; ?>" title="RSS Feed">Subscribe via RSS</a>
	</li>
</ul>
<?php
}

/**
 * Renders the banner advertisement
 */
function padd_theme_widget_banner() {
	global $ad_default_728;
	$sqbtn_1 = unserialize(get_option(PADD_NAME_SPACE . '_ads_728090_1'));
	$sqbtn_1 = $sqbtn_1->is_empty() ? $ad_default_728 : $sqbtn_1; 
	echo $sqbtn_1;
}

/**
 * Renders the advertisements.
 */
function padd_theme_widget_sponsors() {
	global $ad_default_125;
	$sqbtn_1 = unserialize(get_option(PADD_NAME_SPACE . '_ads_125125_1'));
	$sqbtn_1 =$sqbtn_1->is_empty()  ? $ad_default_125 : $sqbtn_1; 
	$sqbtn_1->set_css_class('ads1');
	$sqbtn_2 = unserialize(get_option(PADD_NAME_SPACE . '_ads_125125_2'));
	$sqbtn_2 = $sqbtn_2->is_empty() ? $ad_default_125 : $sqbtn_2; 
	$sqbtn_2->set_css_class('ads2');
	$sqbtn_3 = unserialize(get_option(PADD_NAME_SPACE . '_ads_125125_3'));
	$sqbtn_3 = $sqbtn_3->is_empty() ? $ad_default_125 : $sqbtn_3; 
	$sqbtn_3->set_css_class('ads3');
	$sqbtn_4 = unserialize(get_option(PADD_NAME_SPACE . '_ads_125125_4'));
	$sqbtn_4 = $sqbtn_4->is_empty() ? $ad_default_125 : $sqbtn_4; 
	$sqbtn_4->set_css_class('ads4');
	echo '<span class="ads1">' . $sqbtn_1 . '</span><span class="ads2">' . $sqbtn_2 . '</span><span class="ads3">'. $sqbtn_3 . '</span><span class="ads4">' . $sqbtn_4 . '</span>';
	echo '<div class="clear"></div>';
}

/**
 * Renders the advertisements.
 */
function padd_theme_widget_about_me() {
	$about = get_page(get_option(PADD_NAME_SPACE . '_post_about_page_id'));
	echo stripslashes($about->post_content);
}


/**
 * Renders the featured posts in home page.
 */
function padd_theme_widget_featured_video() {
	wp_reset_query();	
	$featured = get_option(PADD_NAME_SPACE . '_video_cat_id','1');
	$count = '1';
	query_posts('showposts=' . $count . '&cat=' . $featured  .'&orderby=ID&order=DESC');
?>
<?php while (have_posts()) : the_post(); ?>
		<?php 
			$customfields = get_post_custom(); 
			$code = $customfields['_' . PADD_NAME_SPACE . '_post_thumbnail_video_ytube'][0];
		?>
		<object width="<?php echo PADD_YTUBE_W; ?>" height="<?php echo PADD_YTUBE_H; ?>">
			<param name="movie" value="http://www.youtube.com/v/<?php echo $code; ?>&amp;hl=en_US&amp;fs=1?rel=0"></param>
			<param name="allowFullScreen" value="true"></param>
			<param name="allowscriptaccess" value="always"></param>
			<embed src="http://www.youtube.com/v/<?php echo $code; ?>&amp;hl=en_US&amp;fs=1?rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="<?php echo PADD_YTUBE_W; ?>" height="<?php echo PADD_YTUBE_H; ?>" />
		</object>
<?php endwhile; ?>
<?php
	wp_reset_query();
}

/**
 * Renders the list of bookmarks.
 */
function padd_theme_widget_bookmarks() {
	$array = array();
	$array[] = 'category_before=';
	$array[] = 'category_after=';
	$array[] = 'categorize=0';
	$array[] = 'title_li=';
	wp_list_bookmarks(implode('&',$array));
}

/**
 * Renders the list of children categories in a given parent category.
 *
 * @param int $cat_id
 */
function padd_theme_widget_get_categories($cat_id) {
	if ('' != get_the_category_by_ID($cat_id)) {
		echo '<li>';
		echo '<a href="' . get_category_link($cat_id) . '">' . get_the_category_by_ID($cat_id) . '</a>';
		if ('' != (get_category_children($cat_id))) {
			echo '<ul>';
			wp_list_categories('hide_empty=0&title_li=&child_of=' . $cat_id);
			echo '</ul>';
		}
		echo '</li>';
	}
}

/**
 * Renders the list of recent comments.
 *
 * @global object $wpdb
 * @global array $comments
 * @global array $comment
 * @param int $limit
 */
function padd_theme_widget_recent_comments($limit=5) {
	global $wpdb, $comments, $comment;

	if ( !$comments = wp_cache_get( 'recent_comments', 'widget' ) ) {
		$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT $limit");
		wp_cache_add( 'recent_comments', $comments, 'widget' );
	}
	echo '<ul class="comments-recent">';
	if ( $comments ) :
		foreach ( (array) $comments as $comment) :
			echo  '<li class="comments-recent">' . sprintf(__('%1$s on %2$s'), get_comment_author_link(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
		endforeach;
	endif;
	echo '</ul>';
}

/**
 * Renders the recent posts, optionally with dates.
 *
 * @global WP_DB $wpdb
 * @global string $wp_locale
 * @param array|string $args
 * @return string
 */
function padd_theme_widget_recent_posts($args = '') {
	global $wpdb, $wp_locale;

	$defaults = array(
		'limit' => '',
		'format' => 'html', 'before' => '',
		'after' => '', 'show_post_count' => false,
		'echo' => 1, 'show_date' => true, 'date_format' => 'F j, Y'
	);

	$r = wp_parse_args($args,$defaults);
	extract($r, EXTR_SKIP);

	if ('' == $type) {
		$type = 'monthly';
	}

	if ('' != $limit) {
		$limit = absint($limit);
		$limit = ' LIMIT ' . $limit;
	}

	$where = apply_filters('getarchives_where',"WHERE post_type = 'post' AND post_status = 'publish'",$r);
	$join = apply_filters('getarchives_join',"", $r);

	$output = '';

	$orderby = "post_date DESC ";
	$query = "SELECT * FROM $wpdb->posts $join $where ORDER BY $orderby $limit";
	$key = md5($query);
	$cache = wp_cache_get('padd_recent_posts','general');
	if (!isset($cache[ $key ])) {
		$arcresults = $wpdb->get_results($query);
		$cache[$key] = $arcresults;
		wp_cache_set('padd_recent_posts',$cache,'general');
	} else {
		$arcresults = $cache[$key];
	}
	if ($arcresults) {
		foreach ((array) $arcresults as $arcresult) {
			if ($arcresult->post_date != '0000-00-00 00:00:00' ) {
				$url = get_permalink($arcresult);
				$arc_title = $arcresult->post_title;
				if ($arc_title) {
					$text = strip_tags(apply_filters('the_title', $arc_title));
				} else {
					$text = $arcresult->ID;
				}
				$img = trim(get_the_post_thumbnail($arcresult->ID,'aside'));
				$def = get_template_directory_uri() . '/images/thumbnail-aside.jpg';
				if (empty($img)) {
					$img = '<img src="' . $def . '" alt="Thumbnail" />';
				}
				$output .= '<li>';
				$output .= '<a href="' . get_permalink($arcresult->ID) . '" title="Permalink to ' . $text . '">' . $img . '</a>';
				$output .= '<a href="' . get_permalink($arcresult->ID) . '" title="Permalink to ' . $text . '"><span class="post-title">' . $text . '</span></a>';
				$output .= '</li>';
				//$output .= get_archives_link($url, $text, $format, $before, ' - ' . date($date_format,strtotime($arcresult->post_date)) . $after);
			}
		}
	}

	if ($echo) {
		echo $output;
	} else {
		return $output;
	}
}

/**
 * Renders the list of comments.
 *
 * @param string $comment
 * @param string $args
 * @param string $depth
 */
function padd_theme_single_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="comment">
			<div class="comment-details">
				<div class="comment-author">
					<div class="comment-avatar"><?php echo get_avatar($comment,'53'); ?></div>
					<div class="comment-meta">
						<span class="author"><?php echo get_comment_author_link(); ?></span>
						<span class="time"><?php echo get_comment_date('F j, Y'); ?></span>
					</div>
					<div class="comment-actions">
						<?php edit_comment_link(__('Edit'),'<span class="edit">','</span> | ') ?>
						<?php comment_reply_link(array_merge( $args, array('respond_id' => 'reply' ,'add_below' => 'reply', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="comment-details-interior">
					<div class="comment-details-interior-wrapper">
						<?php comment_text(); ?>
						<?php if ($comment->comment_approved == '0') : ?>
						<p class="comment-notice"><?php _e('My comment is awaiting moderation.') ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php
}

/**
 * Render the list of trackbacks.
 *
 * @param string $comment
 * @param string $args
 * @param string $depth
 */
function padd_theme_single_trackbacks($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="pings-<?php comment_ID() ?>">
		<?php comment_author_link(); ?>
	<?php
}

/**
 * Renders the related posts
 *
 * @param int|string $post_ID
 */
function padd_theme_single_related_posts($post_ID) {
	$enabled = get_option(PADD_NAME_SPACE . '_rp_enable');
	if ($enabled) {

		$tag_ids = array();
		$cat_ids = array();

		$tags = wp_get_post_tags($post_ID);
		foreach($tags as $tag) {
			$tag_ids[] = $tag->term_id;
		}

		$cats = get_the_category($post_ID);
		if ($cats) {
			foreach($cats as $cat) {
				$cat_ids[] = $cat->term_id;
			}
		}

		$args = array(
					'post__not_in' => array($post_ID),
					'showposts' => intval(get_option(PADD_NAME_SPACE . '_rp_max',5)),
					'caller_get_posts' => 1
				);
		if (!empty($tag_ids) && get_option(PADD_NAME_SPACE . '_consider_tags','1') === '1') {
			$args['tag__in'] = $tag_ids;
		}
		if (!empty($cat_ids) && get_option(PADD_NAME_SPACE . '_consider_categories','1') === '1') {
			$args['category__in'] = $cat_ids;
		}

		$rp_query = new wp_query($args);

		if ($rp_query->have_posts()) {
			echo '<ul>';
			while ($rp_query->have_posts()) {
				$rp_query->the_post();
			?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php
			}
			echo '</ul>';
		} else {
			echo '<p>There are no related posts on this entry.</p>';
		}
	} else {
		echo '<p>Related posts has been disabled.</p>';
	}
	// That should fix the bug in the single.php.
	wp_reset_query();
}

/**
 * Renders the excerpt of the page.
 */
function padd_theme_page_box($pid,$class) {
?>
<div class="box box-<?php echo $class; ?>">	
	<?php
		wp_reset_query();
		query_posts('page_id=' . $pid);
		the_post();
	?>
	<p><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>.</strong> <?php echo wp_trim_excerpt(''); ?></p>		
	<?php wp_reset_query(); ?>
</div>
<?php
}

/**
 * Returns the thumbnailed image.
 */
function padd_theme_post_thumbnail() {
	$padd_image_def = get_template_directory_uri() . '/images/thumbnail.jpg';
	if (has_post_thumbnail()) {
		the_post_thumbnail();
	} else {
		echo '<img class="thumbnail" alt="Default thumbnail." src="' . $padd_image_def . '" />';
	}
}

/**
 * Renders the featured posts in home page.
 */
function padd_theme_post_featured_posts($exclude=array()) {
	wp_reset_query();	
	$featured = get_option(PADD_NAME_SPACE . '_featured_cat_id','1');
	$count = get_option(PADD_NAME_SPACE . '_featured_cat_limit');
	query_posts('showposts=' . $count . '&cat=' . $featured);
	$padd_image_def = get_template_directory_uri() . '/images/thumbnail-gallery.jpg';
	remove_filter('excerpt_more','padd_theme_hook_excerpt_index_more');
	add_filter('excerpt_more','padd_theme_hook_excerpt_featured_more');
	add_filter('excerpt_length', 'padd_theme_hook_excerpt_featured_length');
?>
<div id="slideshow">
	<div class="list">
	<?php while (have_posts()) : the_post(); ?>
		<div class="item append-clear">
			<a class="image append-mask" href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>">
			<?php 
				$exclude[] = get_the_ID();
				if (has_post_thumbnail()) {
					the_post_thumbnail(PADD_THEME_SLUG . '-gallery');
				} else {
					echo '<img class="thumbnail" src="' . $padd_image_def . '" />';
				}
			?>
			</a>
			<div class="meta">
				<h3><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
			</div>
		</div>
	<?php endwhile; ?>
	</div>
</div>
<?php
	wp_reset_query();
	remove_filter('excerpt_more','padd_theme_hook_excerpt_featured_more');
	add_filter('excerpt_more','padd_theme_hook_excerpt_index_more');
	remove_filter('excerpt_length','padd_theme_hook_excerpt_featured_length');
	return $exclude;
}

function padd_theme_category($separator,$exclude) {
	if (empty($exclude)) {
		the_category($separator);
	} else {
		$remain = array();
		foreach((get_the_category()) as $cat) {
			if (!($cat->term_id == $exclude)) {
				$remain[] = '<a title="' . esc_attr(sprintf(__("View all posts in %s"),$cat->name)) . '" href="' .  get_category_link( $cat->term_id ) . '">' . $cat->name . '</a>';
			}
		}
		echo implode($separator,$remain);
	}
}

function padd_theme_share_button($class='share') {
?>
<div class="share">
	<ul>
		<li class="twitter"><a href="http://twitter.com/share?url=<?php urlencode(get_permalink());?>&amp;count=vertical" class="twitter-share-button">Tweet</a></li>
		<li class="facebook"><a name="fb_share" type="box_count" share_url="<?php the_permalink(); ?>">Share</a></li>
	</ul>
</div>
<?php
}

/** 
 * Renders the theme credits.
 */
function padd_theme_credits() {
	do_action(__FUNCTION__);
}