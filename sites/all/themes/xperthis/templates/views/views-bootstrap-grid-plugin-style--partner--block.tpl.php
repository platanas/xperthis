<?php
/**
 * @file views-bootstrap-grid-plugin-style.tpl.php
 * Default simple view template to display Bootstrap Grids.
 *
 *
 * - $columns contains rows grouped by columns.
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 * - $column_type contains a number (default Bootstrap grid system column type).
 *
 * @ingroup views_templates
 */
?>

<div id=" views-bootstrap-grid-<?php print $id ?>" class="container <?php print $classes ?>">
    <div class="row-partner">
        <h2 class="text-center"><?php print t('they trust us'); ?></h2>
  <?php if ($options['alignment'] == 'horizontal'): ?>

    <?php foreach ($items as $row): ?>
      <div class="row">
        <?php 
        $counter=1;
        foreach ($row['content'] as $column): ?>
          <div class="col col-lg-<?php print $column_type ?>">
          <div class="col-<?php print $counter; ?>">
            <?php print $column['content'] ?>
          </div>
          </div>
        <?php 
        $counter++;
        endforeach ?>
      </div>
        
<div class="clearfix"></div>
    <?php endforeach ?>

  <?php else: ?>

    <div class="row">
      <?php foreach ($items as $column): ?>
        <div class="col col-lg-<?php print $column_type ?>">
          <?php foreach ($column['content'] as $row): ?>
            <?php print $row['content'] ?>
          <?php endforeach ?>
        </div>
      <?php endforeach ?>
    </div>
<div class="clearfix"></div>

  <?php endif ?>
</div>
</div>