<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php foreach ($rows as $id => $row): ?>

  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id];  } if (strcmp(trim(drupal_get_title()), trim(strip_tags($row)) ) == 0){ print ' active';}?>"  >
    <?php print $row; ?>
  </div>
<?php endforeach; ?>