<?php

error_reporting(0);
$page_content = file_get_contents($_GET['url']);
$dom_obj = new DOMDocument();
$dom_obj->loadHTML($page_content);
$asset_url = null;
foreach($dom_obj->getElementsByTagName('meta') as $meta) {
  if($meta->getAttribute('property')=='og:image'){
    $asset_url = $meta->getAttribute('content');
  }
}

if (isset($_GET['echo'])) {
  echo $asset_url;
} else {
  header("Location: " . $asset_url);
}

// Todo:
// Logic if no image is found - serve error image
// htaccess redirect for cleaner url parameters
// flag to serve image directly (allows caching?)

?>
