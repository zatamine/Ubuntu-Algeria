<?php
/**
 * The Search Form
 *
 * Optional file that allows displaying a custom search form
 * when the get_search_form() template tag is used.
 *
 */
?>
<form method="get" id="searchform" action="<?php echo home_url(); ?>">
	<label for="s">Recherche </label>
	<span class="input"><input type="text" value="" name="s" id="s" /></span>
	<button type="submit"><span>Recherche</span></button>
</form>
