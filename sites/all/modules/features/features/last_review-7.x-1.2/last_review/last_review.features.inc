<?php
/**
 * @file
 * last_review.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function last_review_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function last_review_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function last_review_node_info() {
  $items = array(
    'event' => array(
      'name' => t('Evenement'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'white_paper' => array(
      'name' => t('Whitepaper'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}

/**
 * Implements hook_paragraphs_info().
 */
function last_review_paragraphs_info() {
  $items = array(
    'image_background_block' => array(
      'name' => 'Image background block',
      'bundle' => 'image_background_block',
      'locked' => '1',
    ),
  );
  return $items;
}
