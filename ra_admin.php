<?php
// configuration panel
add_action('admin_menu', 'or_ra_options_page');
add_action('admin_init', 'or_ra_register_settings');

function or_ra_register_settings() {
  for ($i=1; $i<=OR_RA_REDIRECT_NUMBER; $i+=1) {
    register_setting('or_rewrite_assets', "ra_url${i}");
    register_setting('or_rewrite_assets', "ra_redirect${i}");
  }
}

function or_ra_show_row($indice) {
  ?>
  <tr>
    <td nowrap="nowrap">
      <input type="text" size="50" name="ra_url<?php echo $indice;?>" value="<?php echo get_option("ra_url${indice}"); ?>"/>
    </td>
    <td width="100%">
      <input type="text" size="50" name="ra_redirect<?php echo $indice;?>" value="<?php echo get_option("ra_redirect${indice}"); ?>"/>
    </td>
  </tr>
  <?php
}

function or_ra_show_submit() {
?>
  <p class="submit">
    <input type="submit" value="<?php _e("Update Preferences &raquo;");?>" name="Submit" class="button-primary" />
  </p>
<?php
}

function or_ra_options_page() {
	if (function_exists('add_options_page')) {
		add_options_page( __('Rewrite Assets','or_rewrite_assets'), __('Rewrite Assets','or_rewrite_assets'), 8, 'or_rewrite_assets', 'or_ra_options_subpanel');
	}
}

function or_ra_options_subpanel() {
?>
  <div class="wrap">
    <h2><?php _e("Rewrite Assets",'or_ra_options_subpanel');?></h2>
    <form method="post" action="options.php">
      <?php settings_fields('or_rewrite_assets'); ?>

      <table class="form-table">
        <tr>
          <th><?php _e("Original url") ?></th>
          <th><?php _e("Replaced by url") ?></th>
        </tr>
        <?php
        for ($i=1; $i<=OR_RA_REDIRECT_NUMBER; $i+=1) or_ra_show_row($i);
        ?>
      </table>
    <?php or_ra_show_submit() ?>
    </form>
  </div>
<?php
}
?>
