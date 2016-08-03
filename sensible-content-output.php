<?php
/*
Plugin Name: Sensible content output
Description: Make the_content() output a little more sane with these features. All features are optional and disabling them is easy.
Version: 0.1
Author: Christian Nikkanen
Licence: GPL2
*/

namespace k1sul1;

$defaults = array("unwrap_inline_images", "remove_inline_width");
$options = array();

$enabled_features = !empty($options) ? $options["enabled_features"] : $defaults;
apply_filters("sco_enabled_features", $enabled_features);

function unwrap_inline_images($content){
  return preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '\1', $content);
}

function remove_inline_width($content){
  // for example, figure element gets inline width for some reason by WP.
  // Help welcome!

  preg_match('/<[^>]*style=.(width:.\d{0,}.{0,}?[^"\']*)/', $content, $matches); // this could be probably done with preg_replace

  for($i = 1; $i < count($matches); $i++){
    $content = str_replace($matches[$i], "", $content);
  }

  return $content;

}

foreach($enabled_features as $feature){
  add_filter("the_content", "\k1sul1\\$feature", 999999);
}

// TODO: Maybe add admin page to select features?
