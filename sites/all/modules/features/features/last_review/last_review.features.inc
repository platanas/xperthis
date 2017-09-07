<?php
/**
 * @file
 * last_review.features.inc
 */

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
