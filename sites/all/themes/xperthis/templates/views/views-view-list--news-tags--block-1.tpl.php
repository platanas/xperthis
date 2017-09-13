<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
global $language ;
$lang_name = $language->language ;
?>
<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <?php print $list_type_prefix; ?>
    <li class="all">
        <div class="categories">
            <a href="/<?php print $language->language; ?>/<?php print t('news'); ?>/all" ><?php print t('All'); ?></a>
        </div>
    </li>
    <?php foreach ($rows as $id => $row): ?>
        <li class="<?php print $classes_array[$id]; ?>">
            <div class="categories">
                <?php print $row; ?>
            </div>
        </li>
    <?php endforeach; ?>
  <?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>