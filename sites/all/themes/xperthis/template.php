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
    
    $form['search_block_form']['submit']['#attributes'] = array('class' => array('btn-white'));
    //$form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search-button.png');

    // Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = '".t('Search')."';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == '".t('Search')."') {this.value = '';}";
    // Prevent user from searching the default text
    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='".t('Search')."'){ alert('Please enter a search'); return false; }";

    // Alternative (HTML5) placeholder attribute instead of using the javascript
    $form['search_block_form']['#attributes']['placeholder'] = t('Search');
    $form['search_block_form']['#attributes'] ['autofocus']= 'autofocus';
    
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
    if ($form_id == 'webform_client_form_16' || $form_id == 'webform_client_form_38' ){
        $form['actions']['submit']['#attributes'] = array('onclick' => array("ga('send','event','Contact','Contact','Send', 'Send', 1);"));
    }
    
    switch ($form_id) {
        case 'simplenews_block_form_1'://add your form_id
            $form['submit']['#ajax'] = array(
            'callback' => 'xperthis_simplenews_block_form_ajax_submit',
            'wrapper' => 'block-simplenews-1',
            'method' => 'replace',
            'effect' => 'fade',
            'progress' => array('type' => 'none'),
          );
          $form['submit']['#executes_submit_callback'] = TRUE;
          unset($form['#submit']);
          unset($form['#validate']);
        break;
    } 
}

/**
 * Ajax callback to reload the image field
 */
function xperthis_simplenews_block_form_ajax_submit($form, $form_state) {
  $return = '<div id="block-simplenews-1" class="block container block-simplenews first odd">';
  
  if (!valid_email_address($form_state['values']['mail'])) {
      $return .= render($form);
    $return .= '<section class="errors-primal col-md-6 col-md-offset-3"><div class="alert alert-block alert-danger messages error">' . t('The e-mail address is not valid.') . '</div></section>';
    
    $return .= '</div>';
    return $return;
  }
  else {
    if (module_exists('simplenews')) {
    module_load_include('inc', 'simplenews', 'views/simplenews.subscription');
    $tid = $form['#tid'];
    $account = simplenews_load_user_by_mail($form_state['values']['mail']);
    $confirm = simplenews_require_double_opt_in($tid, $account);
    $subscription = simplenews_subscribe_user($form_state['values']['mail'], $tid, $confirm, 'website');
    $return .= '<section class="confirm-primal col-md-6 col-md-offset-3"><div class="alert alert-block alert-success messages success">'. t('You have been subscribed.') . '</div></section>';
    $return .= '</div>';
      return $return;
    }
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
	$form['submit']['#attributes']['onclick'] = "ga('send','event','Footer','Footer','Suscribe', 'Newsletter', 1)";
  	$variables['heading'] = t('Subscribe to our newsletter'); 
 	// Create variables for individual elements.
	$variables['mail'] = render($form['mail']);
	$variables['submit'] = render($form['submit']);	
	// Be sure to print the remaining rendered form items.
	$variables['children'] = drupal_render_children($form);
}

/**
* Implements HOOK_webform_component_render_alter().
 * Translate Placeholder : Automatically add to interface translation
*/
function xperthis_webform_component_render_alter(&$element, $component) {
 if (isset($element['#attributes']['placeholder'])) {
   $element['#attributes']['placeholder'] = t($element['#attributes']['placeholder']);
 }
 if (isset($element['#description'])) {
   $element['#description'] = t($element['#description']);
 }
}

function xperthis_breadcrumb($variables) {
  $breadcrumbs = $variables['breadcrumb'];
  if (!empty($breadcrumbs)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    //$output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    // Hide breadcrumb navigation if it contains only one element.
    $hide_single_breadcrumb = variable_get('path_breadcrumbs_hide_single_breadcrumb', 0);
    if ($hide_single_breadcrumb && count($breadcrumbs) == 1) {
      return FALSE;
    }

    // Bootstrap 3 compatibility. See: https://drupal.org/node/2178565
    if (is_array($breadcrumbs[count($breadcrumbs) - 1])) {
      array_pop($breadcrumbs);
    }

    // Add options for rich snippets.
    $elem_tag = 'span';
    $elem_property = '';
    $root_property = '';
    $options = array('html' => TRUE);
    $snippet = variable_get('path_breadcrumbs_rich_snippets', PATH_BREADCRUMBS_RICH_SNIPPETS_DISABLED);
    if ($snippet == PATH_BREADCRUMBS_RICH_SNIPPETS_RDFA) {

      // Add link options for RDFa support.
      $options['attributes'] = array('rel' => 'v:url', 'property' => 'v:title');
      $options['absolute'] = TRUE;

      // Set correct properties for RDFa support.
      $elem_property = ' typeof="v:Breadcrumb"';
      $root_property = ' xmlns:v="http://rdf.data-vocabulary.org/#"';
    }
    elseif ($snippet == PATH_BREADCRUMBS_RICH_SNIPPETS_MICRODATA) {

      // Add link options for microdata support.
      $options['attributes'] = array('itemprop' => 'url');
      $options['absolute'] = TRUE;

      // Set correct properties for microdata support.
      $elem_property = ' itemscope itemtype="http://data-vocabulary.org/Breadcrumb"';
      $elem_tag = 'li';

    }

    foreach ($breadcrumbs as $key => $breadcrumb) {

      // Build classes for the breadcrumbs.
      $classes = array('inline');
      $classes[] = $key % 2 ? 'even' : 'odd';
      if ($key == 0) {
        $classes[] = 'first';
      }
      if (count($breadcrumbs) == $key + 1) {
        $classes[] = 'last';
      }

      // For rich snippets support all links should be processed in the same way,
      // even if they are provided not by Path Breadcrumbs module. So I have to
      // parse html code and create links again with new properties.
      preg_match('/href="([^"]+?)"/', $breadcrumb, $matches);

      // Remove base path from href.
      $href = '';
      if (!empty($matches[1])) {
        global $base_path;
        global $language;

        $base_string = rtrim($base_path, "/");

        // Append additional params to base string if clean urls are disabled.
        if (!variable_get('clean_url', 0)) {
          $base_string .= '?q=';
        }

        // Append additional params to base string for multilingual sites.
        // @note: Only core URL detection method supported.
        $enabled_negotiation_types = variable_get("language_negotiation_language", array());
        if (!empty($enabled_negotiation_types['locale-url']) && !empty($language->prefix)) {
          $base_string .= '/' . $language->prefix;
        }

        // Means that this is href to the frontpage.
        if ($matches[1] == $base_string || $matches[1] == '' || $matches[1] == '/') {
          $href = '';
        }
        // All hrefs exept frontpage.
        elseif (stripos($matches[1], "$base_string/") === 0) {
          $href = drupal_substr($matches[1], drupal_strlen("$base_string/"));
        }
        // Other cases.
        else {
          // HREF param can't starts with '/'.
          $href = stripos($matches[1], '/') === 0 ? drupal_substr($matches[1], 1) : $matches[1];
        }

        // If HREF param is empty it should be linked to a front page.
        $href = empty($href) ? '<front>' : $href;
      }

      // Get breadcrumb title from a link like "<a href = "/path">title</a>".
      $title = trim(strip_tags($breadcrumb));

      // Wrap title in additional element for microdata support.
      if ($snippet == PATH_BREADCRUMBS_RICH_SNIPPETS_MICRODATA) {
        $title = '<span itemprop="title">' . $title . '</span>';
      }

      // Support title attribute.
      if (preg_match('/<a\s.*?title="([^"]+)"[^>]*>/i', $breadcrumb, $attr_matches)) {
        $options['attributes']['title'] = $attr_matches[1];
      }
      else {
        unset($options['attributes']['title']);
      }

      // Decode url to prevent double encoding in l().
      $href = rawurldecode($href);
      // Move query params from $href to $options.
      $href = _path_breadcrumbs_clean_url($href, $options, 'none');

      // Build new text or link breadcrumb.
      $new_breadcrumb = !empty($href) ? l($title, $href, $options) : $title;

      // Replace old breadcrumb link with a new one.
      $breadcrumbs[$key] = '<' . $elem_tag . ' class="' . implode(' ', $classes) . '"' . $elem_property . '>' . $new_breadcrumb . '</' . $elem_tag . '>';
    }

    $classes = array('breadcrumb');

    // Show contextual link if it is Path Breadcrumbs variant.
    $prefix = '';
    $path_breadcrumbs_data = path_breadcrumbs_load_variant(current_path());
    if (user_access('administer path breadcrumbs') && $path_breadcrumbs_data && isset($path_breadcrumbs_data->variant)) {
      $contextual_links = array(
        '#type' => 'contextual_links',
        '#contextual_links' => array('path_breadcrumbs' => array('admin/structure/path-breadcrumbs/edit', array($path_breadcrumbs_data->variant->machine_name))),
      );
      $prefix = drupal_render($contextual_links);
      $classes[] = 'contextual-links-region';
    }

    // Build final version of breadcrumb's HTML output.
    $output = '<div class="' . implode(' ', $classes) . '">' . $prefix . implode('<span class="delimiter">&gt;</span>', $breadcrumbs) . '</div>';

    return $output;

  }
  // Return false if no breadcrumbs.
  return FALSE;
}

/**
 * Implements hook_language_negotiation_info_alter().
 *
 * Remove the 'cache' setting from LOCALE_LANGUAGE_NEGOTIATION_BROWSER since
 * the code that utilizes this setting will in fact prevent browser negotiation.
 */
function xperthis_language_negotiation_info_alter(&$negotiation_info) {
    unset($negotiation_info[LOCALE_LANGUAGE_NEGOTIATION_BROWSER]['cache']);
}