<?php

class Padd_Advertisement {

	private $img_url;
	private $alt_desc;
	private $web_url;
	private $target;
	private $css_class;

	function __construct($img_url, $alt_desc, $web_url, $target='_blank', $css_class='') {
		$this->img_url = $img_url;
		$this->alt_desc = $alt_desc;
		$this->web_url = $web_url;
		$this->target = $target;
		$this->css_class = $css_class;
	}

	public function get_img_url() {
		return $this->img_url;
	}

	public function set_img_url($img_url) {
		$this->img_url = $img_url;
	}

	public function get_alt_desc() {
		return $this->alt_desc;
	}

	public function set_alt_desc($alt_desc) {
		$this->alt_desc = $alt_desc;
	}

	public function get_web_url() {
		return $this->web_url;
	}

	public function set_web_url($web_url) {
		$this->web_url = $web_url;
	}

	public function get_target() {
		return $this->target;
	}

	public function set_target($target) {
		$this->target = $target;
	}

	public function get_css_class() {
		return $this->css_class;
	}

	public function set_css_class($css_class) {
		$this->css_class = $css_class;
	}
	
	public function is_empty() {
		return (empty($this->img_url) && empty($this->alt_desc) && empty($this->web_url));
	}

	public function __toString() {
		$strHTML  = '';
		$strHTML .= '<a ';
		$strHTML .= 'class="' . (empty($this->css_class) ? 'ads' : $this->css_class) . '" ';
		$strHTML .= 'href="' . (empty($this->web_url) ? '#' : $this->web_url). '"';
		$strHTML .= empty($this->target) ? '' : ' target="' . $this->target . '"';
		$strHTML .= '>';
		$strHTML .= '<img ';
		$strHTML .= empty($this->alt_desc) ? 'alt="Advertisement" ' : ' alt="' . $this->alt_desc . '" ';
		$strHTML .= 'src="' . $this->img_url . '"';
		$strHTML .= ' />';
		$strHTML .= '</a>';
		return $strHTML;
	}
	

}

?>
