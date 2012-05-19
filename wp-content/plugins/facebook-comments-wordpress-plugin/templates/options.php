<h2><?php echo strtoupper(self::PLUGIN_NAME)?> <?php _e("OPTIONS PAGE",self::CLASS_NAME)?>:</h2>

<form action="" method="post">

<p><br />

<label for="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_lang"> <?php _e("Language",self::CLASS_NAME)?></label>

<select name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_lang" id="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_lang">

<option value="en_US" <?php echo self::isSelected("en_US", $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_lang"]);?>>English</option>

<option value="pt_BR" <?php echo self::isSelected("pt_BR", $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_lang"]);?>>Portugu&ecirc;s</option>

<option value="es_ES" <?php echo self::isSelected("es_ES", $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_lang"]);?>>Espa&ntilde;ol</option>

<option value="it_IT" <?php echo self::isSelected("it_IT", $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_lang"]);?>>Italiano</option>

<option value="fr_FR" <?php echo self::isSelected("fr_FR", $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_lang"]);?>>Fran&ccedil;ais</option>

</select><br /><br />

<label for="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_title"> <?php _e("Title",self::CLASS_NAME)?></label>

<input type="text" name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_title" value="<?php echo $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_title"]; ?>" id="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_title"><br /><br />

<label for='<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_width'><?php _e("Width",self::CLASS_NAME)?></label>

<input style="width:30px" type="text" name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_width" value="<?php echo $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_width"]; ?>" id="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_width"><br /><br />

<label for="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_color"><?php _e("Colorscheme",self::CLASS_NAME)?></label>

<select name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_color" id="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_color">

<option value="light" <?php echo self::isSelected("light", $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_color"]);?>>Light</option>

<option value="dark" <?php echo self::isSelected("dark", $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_color"]);?>>Dark</option>

</select><br /><br />

<label for="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_number"><?php _e("Number of Comments",self::CLASS_NAME)?></label>

<input style="width:30px" type="text" name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_number" value="<?php echo $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_number"]; ?>" id="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_number"><br /><br />

<input type="hidden" name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_submit" value="1" />

</p>

<p>

<h3><?php _e("Advanced Options", self::CLASS_NAME)?>:</h3>

<p>
  <label for="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_auto"> <?php _e("Show Facebook box Automatically",self::CLASS_NAME)?>
  </label>
  
  <select name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_auto" id="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_auto">
    
    <option value="yes" <?php echo self::isSelected("yes", $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_auto"]);?>>
      <?php _e("Yes",self::CLASS_NAME)?>
      </option>
    
    <option value="no" <?php echo self::isSelected("no", $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_auto"]);?>>
      <?php _e("No",self::CLASS_NAME)?>
      </option>
    
  </select> 
  <?php _e("on",self::CLASS_NAME)?>: 
  <input type="checkbox" name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_places[]" value="post" <?php echo $anderson_makiyama[self::PLUGIN_ID]->is_checked("post")?>  /> Posts <input type="checkbox" name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_places[]" value="page" <?php echo $anderson_makiyama[self::PLUGIN_ID]->is_checked("page")?>  /> 
  <?php _e("Pages",self::CLASS_NAME)?> <input type="checkbox" name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_places[]"  value="home" <?php echo $anderson_makiyama[self::PLUGIN_ID]->is_checked("home")?>/> Home
  <br />
  <?php _e('Show Only on theses Posts/Pages:',self::CLASS_NAME)?> <input type="text" name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_posts" value="<?php echo $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_posts"]; ?>" id="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_posts"> 
  - <?php _e('Separate IDs with Comma (Leave Empty to All Posts/Pages)',self::CLASS_NAME)?><br />
  <?php _e("Don't Show on theses Posts/Pages",self::CLASS_NAME);?>
  : <input type="text" name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_exclude_posts" value="<?php echo $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_exclude_posts"]; ?>" id="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_exclude_posts"> 
  - <?php _e('Separate IDs with Comma',self::CLASS_NAME)?><br />
  <br />
  
 <h3><?php _e("Moderation Options", self::CLASS_NAME)?>:</h3>
  
  <label for="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_id"> <?php _e("Your Facebook ID",self::CLASS_NAME)?>
  </label>
  
  <input type="text" name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_id" value="<?php echo $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_id"]; ?>" id="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_id"> 
  <a href="<?php _e('http://blogwordpress.ws/how-to-find-my-facebook-id',self::CLASS_NAME)?>" target="_blank">
    <?php _e('See how to discover your Facebook ID',self::CLASS_NAME)?>
    </a><br /><br />
  
  <!--<label for="<?php //echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_app"> <?php //_e("Application ID",self::CLASS_NAME)?></label>-->
  
  <!--<input type="text" name="<?php //echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_app" value="<?php //echo $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_app"]; ?>" id="<?php //echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_app"><br /><br />-->
  
  <label for="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_admin">
    <?php _e("List yourself as Admin",self::CLASS_NAME)?>
  </label>
  
  <select name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_admin" id="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_admin">
    
    <option value="no" <?php echo self::isSelected("no", $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_admin"]);?>>
      <?php _e("No",self::CLASS_NAME)?>
      </option>
    
    <option value="yes" <?php echo self::isSelected("yes", $options[$anderson_makiyama[self::PLUGIN_ID]->plugin_slug."_admin"]);?>>
      <?php _e("Yes",self::CLASS_NAME)?>
      </option>
    
  </select>
  
  </p>
</p>
<p>

	<input type="submit" name="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_slug?>_submit" value="<?php _e("Save Changes",self::CLASS_NAME)?>" class="button-primary" />

</p>

</form>

<hr />

<p>

<ul>

<li><?php _e("Visit Plugin's Page",self::CLASS_NAME)?>: <a href="<?php _e("http://blogwordpress.ws/plugin-facebook-comments",self::CLASS_NAME)?>" target="_blank"><?php _e("http://blogwordpress.ws/plugin-facebook-comments",self::CLASS_NAME)?></a>

</li>

<li>

<?php _e("Visit Author's Blog",self::CLASS_NAME)?>: <a href="<?php _e("http://blogwordpress.ws",self::CLASS_NAME)?>" target="_blank">Anderson Makiyama</a>

</li>

</ul>

</p>