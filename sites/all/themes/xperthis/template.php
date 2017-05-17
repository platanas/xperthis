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
