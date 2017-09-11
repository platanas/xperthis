<?php
/**
 * @file
 * last_review.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function last_review_field_group_info() {
  $field_groups = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_collapse|paragraphs_item|image_background_block|form';
  $field_group->group_name = 'group_collapse';
  $field_group->entity_type = 'paragraphs_item';
  $field_group->bundle = 'image_background_block';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Open / Collapse',
    'weight' => '0',
    'children' => array(
      0 => 'field_image',
      1 => 'field_title',
      2 => 'field_paragraph',
      3 => 'field_link',
      4 => 'field_label',
      5 => 'field_category',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Open / Collapse',
      'instance_settings' => array(
        'required_fields' => 1,
        'id' => '',
        'classes' => 'group-collapse field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_collapse|paragraphs_item|image_background_block|form'] = $field_group;

  // Translatables
  // Included for use with string extractors like potx.
  t('Open / Collapse');

  return $field_groups;
}
