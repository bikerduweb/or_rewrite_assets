<?php

function or_ra_redirections() {
  $redirections = array();
  for ($i=1; $i<=3; $i+=1) {
    $key = trim(get_option("ra_url${i}"));
    $key = preg_replace("|([/]+)$|", "", $key);
    if (!empty($key)) {
      $value = trim(get_option("ra_redirect${i}"));
      if (!empty($value)) {
        $redirections[$key] = $value;
        // we replace local url
        $key = preg_replace("|(https?://[^/]+)|i", "", $key);
        if (!empty($key)) {
          $redirections[$key] = $value;
          // and full url
          $key = get_bloginfo("url"). "/".preg_replace("|^[/]+|", "", $key);
          $redirections[$key] = $value;
        }
      }
    }
  }
  return $redirections;
}

function or_ra_convert_internal_link($matches) {
  global $or_ra_redirections;
  foreach ($or_ra_redirections as $key => $value) {
    if (stripos($matches[0], $key)>0) {
      return str_replace($key, $value, $matches[0]);
    }
  }
  return $matches[0];
}
	
function or_ra_content($text) {
  global $or_ra_redirections;
  $or_ra_redirections = or_ra_redirections();
  $pattern = '/(href|src)=[\"\']([^\"\']+)[\"\']/im';
  return preg_replace_callback($pattern, 'or_ra_convert_internal_link', $text);
}

add_filter('the_content', 'or_ra_content', 100);
add_filter('the_excerpt', 'or_ra_content', 100);
?>