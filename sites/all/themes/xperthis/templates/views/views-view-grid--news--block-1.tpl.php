<?php

/**
 * @file
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $class; ?>"<?php print $attributes; ?>>
  
    <?php foreach ($rows as $row_number => $columns): ?>
      <div <?php if ($row_classes[$row_number]) { print 'class="row ' . $row_classes[$row_number] .'"';  } ?>>
        <?php foreach ($columns as $column_number => $item): ?>
          <div class="col-md-4"> 
                <div class="home-headline-card">
                    <?php print $item; ?>
                </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
</div>
<div class="clearfix"></div>