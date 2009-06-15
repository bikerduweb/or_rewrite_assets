<?php
// configuration panel
add_action('admin_menu', 'or_ra_options_page');
add_action('admin_init', 'or_ra_register_settings');

function or_ra_register_settings() {
  register_setting('or_rewrite_assets', 'ra_url1');
  register_setting('or_rewrite_assets', 'ra_redirect1');
  register_setting('or_rewrite_assets', 'ra_url2');
  register_setting('or_rewrite_assets', 'ra_redirect2');
  register_setting('or_rewrite_assets', 'ra_url3');
  register_setting('or_rewrite_assets', 'ra_redirect3');
}

function or_ra_show_row($indice) {
  ?>
  <tr>
    <td nowrap="nowrap">
      <input type="text" name="ra_url<?php echo $indice;?>" value="<?php echo get_option("ra_url${indice}"); ?>"/>
    </td>
    <td width="100%">
      <input type="text" name="ra_redirect<?php echo $indice;?>" value="<?php echo get_option("ra_redirect${indice}"); ?>"/>
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
        or_ra_show_row(1);
        or_ra_show_row(2);
        or_ra_show_row(3);
        ?>
      </table>
    <?php or_ra_show_submit() ?>
    </form>
  </div>
<?php
}
?>
