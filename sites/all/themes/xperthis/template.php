<?php

/**
 * Allows modules to alter mmenu class settings.
 */
function xperthis_mmenu_class_alter(&$classes) {
  $module_path = drupal_get_path('module', 'mmenu');
  $classes['mm-basic']['css'] = array(
    $module_path . '/themes/mm-basic/css/custom.css',
  );
}

function UI_lang() {
    global $language;
    return $language->language; 
}

/**
 * @file
 * The primary PHP file for this theme.
 */
function xperthis_form_search_block_form_alter(&$form, &$form_state, $form_id) {
 // $form['#attributes']['class'][] = 'search-block-form';
 // $form['#attributes']['class'][] = 'modal';
 // $form['#attributes']['class'][] = 'fade';
 $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#size'] = 40;  // define size of the textfield
    $form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
    $form['actions']['submit']['#value'] = t(''); // Change the text on the submit button
    //$form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search-button.png');

    // Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
    // Prevent user from searching the default text
    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";

    // Alternative (HTML5) placeholder attribute instead of using the javascript
    $form['search_block_form']['#attributes']['placeholder'] = t('Search');
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
   // remove some unwanted tabs
    if (user_is_anonymous()) {
      xperthis_remove_tabs('Register', $variables);
    }
}

function xperthis_remove_tabs($label, &$variables) {
  // Remove from primary tabs
  $i = 0;
  if (is_array($variables['tabs']['#primary'])) {
    foreach ($variables['tabs']['#primary'] as $primary_tab) {
      if ($primary_tab['#link']['title'] == $label) {
        unset($variables['tabs']['#primary'][$i]);
      }
      ++$i;
    }
  }

  // Remove from secondary tabs
  $i = 0;
  if (is_array($variables['tabs']['#secondary'])) {
    foreach ($variables['tabs']['#secondary'] as $secondary_tab) {
      if ($secondary_tab['#link']['title'] == $label) {
        unset($variables['tabs']['#secondary'][$i]);
      }
      ++$i;
    }
  }
}
/**
 * Implements template_preprocess_node()
 */
function xperthis_preprocess_node(&$vars) {
  if($vars['view_mode'] == 'teaser') {
      $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '__teaser';
      //var_dump($vars);
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
        //var_dump ($item);
      }
      // This is a class for the whole field wrapper
      //$vars['classes_array'][] = 'btn btn-default';
      $vars['label'] = t("On the same subject ");
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

//function xperthis_field($variables) {
  //$output = '';
//var_dump ($variables);
  // Render the label, if it's not hidden.
  /*if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ' - &nbsp;</div>';
  }*/
//}

function xperthis_preprocess_simplenews_block_form_1(&$variables) {
  	// Shorten the form variable name for easier access.
  	$form = $variables['form'];
  	unset($form['mail']['#title']);
  	$form['mail']['#id'] = 'exampleInputEmail1';
  	$form['mail']['#attributes'] = array('class' => array('form-control'));
  	$form['mail']['#attributes']['placeholder'] = t('Adresse Email');
  	$form['submit']['#value'] = t("Subscribe");
	$form['submit']['#attributes'] = array('class' => array('btn-primary'));
	$form['submit']['#attributes']['onclick'] = "ga('send’,’event’,’Footer’,’Footer’,’Suscribe’, Newsletter, 1)";
  	$variables['heading'] = t('Subscribe to our newsletter'); 
 	// Create variables for individual elements.
	$variables['mail'] = render($form['mail']);
	$variables['submit'] = render($form['submit']);	
	// Be sure to print the remaining rendered form items.
	$variables['children'] = drupal_render_children($form);
}