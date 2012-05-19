<?php

/*

Plugin Name: Facebook Comments

Plugin URI: http://blogwordpress.ws/plugin-facebook-comments

Description: Plugin to allow users leave comments on your blog using their facebook accounts

Author: Anderson Makiyama

Version: 1.1

Author URI: http://blogwordpress.ws

*/





class Anderson_Makiyama_Facebook_Comments{

	const CLASS_NAME = 'Anderson_Makiyama_Facebook_Comments';

	public static $CLASS_NAME = self::CLASS_NAME;

	const PLUGIN_ID = 4;

	public static $PLUGIN_ID = self::PLUGIN_ID;

	const PLUGIN_NAME = 'Facebook Comments';

	public static $PLUGIN_NAME = self::PLUGIN_NAME;

	const PLUGIN_PAGE = 'http://blogwordpress.ws/plugin-facebook-comments';

	public static $PLUGIN_PAGE = self::PLUGIN_PAGE;

	const PLUGIN_VERSION = '1.1';

	public static $PLUGIN_VERSION = self::PLUGIN_VERSION;

	public $plugin_slug = "anderson_makiyama_";

	public $plugin_base_name;

	public $counter = 0;
	

    public function getStaticVar($var) {

        return self::$$var;

    }	

	

	public function __construct(){

		$this->plugin_base_name = plugin_basename(__FILE__);

		$this->plugin_slug.= str_replace(" ","_",self::PLUGIN_NAME);
		
		load_plugin_textdomain( self::CLASS_NAME, '', strtolower(str_replace(" ","-",self::PLUGIN_NAME)) . '/lang' );	



	}

	public function settings_link($links) { 
		global $anderson_makiyama;
	  
	  $settings_link = '<a href="options-general.php?page='. $anderson_makiyama[self::PLUGIN_ID]->plugin_base_name .'">'. __('Settings', self::CLASS_NAME). '</a>'; 
	  array_unshift($links, $settings_link); 
	  return $links; 
	}	

	public function show_comments($content){

		global $post, $anderson_makiyama;

		$options = get_option($anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_options");
		$places = $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_places'];
		$include =  $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_posts'];
		$exclude =  $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_exclude_posts'];
		
		if(!is_array($places)) return $content;

		if( ( is_single() && in_array("post", $places) ) || ( is_page() && in_array("page", $places) ) || ( is_home() && in_array("home", $places) ) ){

			
			if('no' == $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_auto']) return $content;
			
			 if(!empty($include)){
				 $include = explode(",",$include);
				 if(!in_array($post->ID, $include)) return $content;
			 }elseif(!empty($exclude)){
				 $exclude = explode(",",$exclude);
				 if(in_array($post->ID, $exclude)) return $content;
			 }

			return $content . '<h2>'.$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_title'].'</h2><div class="fb-comments" data-href="'. get_permalink($post->ID) .'" data-num-posts="'.$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_number'].'" data-width="'.$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_width'].'" data-colorscheme="'.$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_color'].'"></div>';

		}else{

			return $content;	

		}

	}

	

	public static function show_fb_comments($post_id){
		global $anderson_makiyama;
		
		$options = get_option($anderson_makiyama[4]->plugin_slug . "_options");

		return '<h2>'.$options[$anderson_makiyama[4]->plugin_slug.'_title'].'</h2><div class="fb-comments" data-href="'. get_permalink($post_id) .'" data-num-posts="'.$options[$anderson_makiyama[4]->plugin_slug .'_number'].'" data-width="'.$options[$anderson_makiyama[4]->plugin_slug .'_width'].'"></div>';

	}

	

	public function add_admin(){

		global $anderson_makiyama;

		$options = get_option($anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_options");

		

		if('yes' == $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_admin']){

			echo '<meta property="fb:admins" content="'.$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_id'].'"/>';
			//echo '<meta property="fb:app_id" content="'.$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_app'].'"/>';

		}

	}

	

	public function add_code(){

		global $wpdb, $anderson_makiyama;

		if($anderson_makiyama[self::PLUGIN_ID]->counter > 0) return;
		$anderson_makiyama[self::PLUGIN_ID]->counter++;
		
		$options = get_option($anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_options");

		if(empty($options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_lang'])) $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_lang'] = 'en_US'; 

		echo '<div id="fb-root"></div>

			<script>(function(d, s, id) {

			  var js, fjs = d.getElementsByTagName(s)[0];

			  if (d.getElementById(id)) return;

			  js = d.createElement(s); js.id = id;

			  js.src = "//connect.facebook.net/'.$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_lang'].'/all.js#xfbml=1";

			  fjs.parentNode.insertBefore(js, fjs);

			}(document, \'script\', \'facebook-jssdk\'));</script>';		

	}

	

	public function options(){

		global $anderson_makiyama;

		global $user_level;

		get_currentuserinfo();

		if ($user_level < 10) {

			return;

		}

		



		  if (function_exists('add_options_page')) {

			add_options_page(__(self::PLUGIN_NAME), __(self::PLUGIN_NAME), 1, __FILE__, array(self::CLASS_NAME,'options_page'));

		  }

		

	}	

	

	public function options_page(){

		global $anderson_makiyama;

		global $user_level;

		get_currentuserinfo();

		if ($user_level < 10) {

			return;

		}

		

		$options = get_option($anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_options");

		

		if ($_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_submit']) {

			$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_lang'] = htmlspecialchars($_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_lang']);

			$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_title'] = htmlspecialchars($_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_title']);

			$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_width'] = (int)$_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_width'];

			$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_color'] = htmlspecialchars($_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_color']);

			$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_number'] = (int)$_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_number'];

			if($options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_number']<1) $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_number'] = 1;

			$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_id'] = htmlspecialchars($_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_id']);
			
			$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_app'] = htmlspecialchars($_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_app']);
			
			$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_posts'] = htmlspecialchars($_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_posts']);
			
			$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_exclude_posts'] = htmlspecialchars($_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_exclude_posts']);

			$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_admin'] = htmlspecialchars($_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_admin']);
			
			$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_auto'] = htmlspecialchars($_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_auto']);
			
			$options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_places'] = $_POST[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug.'_places'];

			update_option($anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_options", $options);

		}

				

		

		include("templates/options.php");

	}		

	

	public static function makeData($data, $anoConta,$mesConta,$diaConta){

	   $ano = substr($data,0,4);

	   $mes = substr($data,5,2);

	   $dia = substr($data,8,2);

	   return date('Y-m-d',mktime (0, 0, 0, $mes+($mesConta), $dia+($diaConta), $ano+($anoConta)));	

	}

	

	public static function get_data_array($data,$part=''){

	   $data_ = array();

	   $data_["ano"] = substr($data,0,4);

	   $data_["mes"] = substr($data,5,2);

	   $data_["dia"] = substr($data,8,2);

	   if(empty($part))return $data_;

	   return $data_[$part];

	}	

	public function is_checked($place){
		global $anderson_makiyama;

		$options = get_option($anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_options");
		$places_ = $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_places"];
		
		if(is_array($places_) && in_array($place,$places_)) return " checked='checked' ";
		
		return "";
		
	}	

	public static function isSelected($campo, $varCampo){

		if($campo==$varCampo) return " selected=selected ";

		return "";

	}	

}

if(!isset($anderson_makiyama)) $anderson_makiyama = array();

$anderson_makiyama_indice = Anderson_Makiyama_Facebook_Comments::PLUGIN_ID;



$anderson_makiyama[$anderson_makiyama_indice] = new Anderson_Makiyama_Facebook_Comments();


add_filter("plugin_action_links_". plugin_basename(__FILE__), array($anderson_makiyama[$anderson_makiyama_indice]->getStaticVar('CLASS_NAME'), 'settings_link') );

add_action("the_post", array($anderson_makiyama[$anderson_makiyama_indice]->getStaticVar('CLASS_NAME'), 'add_code'));

add_filter("the_content", array($anderson_makiyama[$anderson_makiyama_indice]->getStaticVar('CLASS_NAME'), 'show_comments'),30);

add_filter("admin_menu", array($anderson_makiyama[$anderson_makiyama_indice]->getStaticVar('CLASS_NAME'), 'options'),30);

add_action('wp_head',array($anderson_makiyama[$anderson_makiyama_indice]->getStaticVar('CLASS_NAME'), 'add_admin'));



?>