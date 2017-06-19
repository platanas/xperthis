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
<div class="container <?php print $class; ?>"<?php print $attributes; ?>>
  

    <?php foreach ($rows as $row_number => $columns): ?>
    <div <?php if ($row_classes[$row_number]) { print 'class="row ' . $row_classes[$row_number] .'"';  } ?>>
        
        <?php foreach ($columns as $column_number => $item): ?>
        
        <div class="col-md-<?php if ($column_number==1){ print '4';  } elseif  ($column_number==2){ print '3';  } else {print '3 col-md-offset-1';}  ?> col-sm-4 text-center"> <div class="homepage-icons inline-block"><div class="homepage-icons-bg"><?php print $item; ?></div></div></div>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
</div>
