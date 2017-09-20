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
            <a href="/<?php print $language->language; ?>/news/<?php print t('categories'); ?>/all" ><?php print t('All'); ?></a>
        </div>
    </li>
    

    <?php foreach ($rows as $id => $row): ?>
        <li class="<?php print $classes_array[$id]; if (strcmp(trim(drupal_get_title()), trim(strip_tags($row)) ) == 0){ print 'active';} ?>">
            <div class="categories <?php if (strcmp(trim(drupal_get_title()), trim(strip_tags($row)) ) == 0){ print 'active';} ?>">
                <?php print $row; ?>
            </div>
        </li>
    <?php endforeach; ?>
  <?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>