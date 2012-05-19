<?php

class Padd_Input_Advertisement {

	protected $keyword;
	protected $value;
	protected $name;
	protected $description;

	function __construct($keyword,$name,$description='') {
		$this->keyword = $keyword;
		$this->value = unserialize(get_option($keyword));
		$this->name = $name;
		$this->description = $description;
	}

	public function get_keyword() {
		return $this->keyword;
	}

	public function set_keyword($keyword) {
		$this->keyword = $keyword;
	}

	public function get_value() {
		return $this->value;
	}

	public function set_value($value) {
		$this->value = $value;
	}

	public function get_name() {
		return $this->name;
	}

	public function set_name($name) {
		$this->name = $name;
	}

	public function get_description() {
		return $this->description;
	}

	public function set_description($description) {
		$this->description = $description;
	}

	public function  __toString() {
		$strHTML  = '';
		$strHTML .= '<tr valign="top">';
		$strHTML .= '	<th scope="row"><label for="' . $this->keyword . '">' . $this->name . '</label></th>';
		$strHTML .= '	<td>';
		$strHTML .= '		<label for="' . $this->keyword. '_alt_desc">Short Description</label><br />';
		$strHTML .= '		<input name="' . $this->keyword . '_alt_desc" type="text" id="' . $this->keyword . '_alt_desc" value="' . $this->value->get_alt_desc() . '" size="80" /><br />';
		$strHTML .= '		<label for="' . $this->keyword. '_img_url">Image URL</label><br />';
		$strHTML .= '		<input name="' . $this->keyword . '_img_url" type="text" id="' . $this->keyword . '_img_url" value="' . $this->value->get_img_url() . '" size="80" /><br />';
		$strHTML .= '		<label for="' . $this->keyword. '_web_url">Website</label><br />';
		$strHTML .= '		<input name="' . $this->keyword . '_web_url" type="text" id="' . $this->keyword . '_web_url" value="' . $this->value->get_web_url() . '" size="80" />';
		$strHTML .= '		<br /><small>' . $this->description . '</small>';
		$strHTML .= '	</td>';
		$strHTML .= '</tr>';
		return $strHTML;
	}

}

?>
