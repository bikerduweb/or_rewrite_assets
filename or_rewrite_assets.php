<?
/*
  Plugin Name: Rewrite Assets
  Plugin Author: Olivier Ruffin
  Description: A Wordpress plugin to use a specific url for assets (images, scripts) other than the blog url
  Version: 1.0
  Author: Olivier Ruffin
  Author URI: http://www.veilleperso.com
*/

$ra_include_path = dirname(__FILE__);
set_include_path( $ra_include_path . PATH_SEPARATOR . get_include_path() );
require_once 'ra_admin.php';
require_once 'ra_helpers.php';
restore_include_path();
