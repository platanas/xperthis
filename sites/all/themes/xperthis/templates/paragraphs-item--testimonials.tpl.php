
<?php

/**
 * @file
 * Default theme implementation for a single paragraph item.
 *
 * Available variables:
 * - $content: An array of content items. Use render($content) to print them
 *   all, or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity
 *   - entity-paragraphs-item
 *   - paragraphs-item-{bundle}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened into
 *   a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="content container"<?php print $content_attributes; ?>>
      <div class="row">
          <div class="col-md-2 col-md-offset-1">
            <?php print render($content['field_image']); ?>
          </div>
          <div class="col-md-8">
        <?php print render($content['field_title']); ?>
              
        <p><span class="medium"><?php print strip_tags(render($content['field_testimonial_name'])); ?></span>,
        <?php print strip_tags(render($content['field_testimonial_function'])); ?>
        - <?php print strip_tags(render($content['field_testimonial_society'])); ?>
        </p>
        <p class="quote">
        <?php print strip_tags(render($content['field_paragraph'])); ?></p>
          <p class="text-right">
            <a href="<?php print render($content['field_link']['#items'][0]['url']); ?>">
                <?php print render($content['field_link']['#items'][0]['title']); ?>
            </a>
          </p>
          </div>
    </div>
  </div>
</div>

