<?php
/**
 * @file
 * The primary PHP file for this theme.
 */
function xperthis_form_search_block_form_alter(&$form, &$form_state, $form_id) {
 // $form['#attributes']['class'][] = 'search-block-form';
 // $form['#attributes']['class'][] = 'modal';
 // $form['#attributes']['class'][] = 'fade';
 
}
/**
 * Implements template_preprocess_page()
 */
function xperthis_preprocess_page(&$vars) {
  // Remove 'Promoted to front page' nodes
  if ($vars['is_front']) {
    unset($vars['page']['content']['system_main']['nodes']);
  }
  if (isset($vars['node']->type)) {
    //print 'ok';
    $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
  }
}

/**
 * Implements template_preprocess_field
 *
 */
function xperthis_preprocess_field(&$vars) {
  $element = $vars["element"];
  $name    = $element["#field_name"];
  switch($name){
    case 'field_tags' : // this is a (multiple) taxonomy terms reference field that shows links to every term associated
      foreach ($vars['items'] as $delta => &$item) {
        // Add and attribute with the tid to each link to the taxonomy term
        $item['#options']['attributes']['data-tid'] = $item['#options']['entity']->tid;
        // Add a new class to every link in this field
        $item['#options']['attributes']['class'][] = 'btn btn-default' ;
      }
      // This is a class for the whole field wrapper
      //$vars['classes_array'][] = 'btn btn-default';
      $vars['label'] = "Sur le même sujet ";
    break;
  }
}


function xperthis_form_alter(&$form, &$form_state, $form_id) {
  if (!empty($form['actions']) && $form['actions']['submit']) {
    $form['actions']['submit']['#attributes'] = array('class' => array('btn-primary'));
  }
}

function xperthis_theme() {
  return array(
    'simplenews_block_form_1' => array(      
      'render element' => 'form',
      'template' => 'simplenews-block-form',
      'path' => drupal_get_path('theme', 'xperthis').'/templates/block',
    ),			
  );
}

function xperthis_field($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ' - &nbsp;</div>';
  }
}

function xperthis_preprocess_simplenews_block_form_1(&$variables) {
  	// Shorten the form variable name for easier access.
  	$form = $variables['form'];
  	unset($form['mail']['#title']);
  	$form['mail']['#id'] = 'exampleInputEmail1';
  	$form['mail']['#attributes'] = array('class' => array('form-control'));
  	$form['mail']['#attributes']['placeholder'] = t('Adresse Email');
  	$form['submit']['#value'] = t("M'inscrire");
	$form['submit']['#attributes'] = array('class' => array('btn-primary'));
  	$variables['heading'] = t('en vous inscrivant à notre newsletter ...'); 
 	// Create variables for individual elements.
	$variables['mail'] = render($form['mail']);
	$variables['submit'] = render($form['submit']);	
	// Be sure to print the remaining rendered form items.
	$variables['children'] = drupal_render_children($form);
}