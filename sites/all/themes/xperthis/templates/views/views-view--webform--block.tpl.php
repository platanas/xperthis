<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
global $language ;
$lang_name = $language->language ;
?>
<div class=" container <?php print $classes; ?>">
 
  <?php if ($rows): ?>
    <div class=" col-md-8 col-md-offset-2 view-content text-center">
      <?php print $rows; ?>
        <br />
        
        <p class="white"><?php print t('or_webform_bloc') ?> <a class="white" href="<?php if ($language->language == 'nl') { print '/nl/node/29'; } else if ($language->language == 'fr') { print '/fr/node/29';} ?>"><?php print t('discover our approach'); ?></a></p>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>


</div><?php /* class view */ ?>