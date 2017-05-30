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

function xperthis_theme() {
  return array(
    'simplenews_block_form_1' => array(      
      'render element' => 'form',
      'template' => 'simplenews-block-form',
      'path' => drupal_get_path('theme', 'xperthis').'/templates/block',
    ),			
  );
} 

function xperthis_preprocess_simplenews_block_form_1(&$variables) {
  	// Shorten the form variable name for easier access.
  	$form = $variables['form'];
  	unset($form['mail']['#title']);
  	$form['mail']['#id'] = 'exampleInputEmail1';
  	$form['mail']['#attributes'] = array('class' => array('form-control'));
  	$form['mail']['#attributes']['placeholder'] = t('Enter Your Email');
  	$form['submit']['#value'] = t('Sign Up');
  	$variables['heading'] = t('en vous inscrivant à notre newsletter ...'); 
 	// Create variables for individual elements.
	$variables['mail'] = render($form['mail']);
	$variables['submit'] = render($form['submit']);	 
	// Be sure to print the remaining rendered form items.
	$variables['children'] = drupal_render_children($form);
}