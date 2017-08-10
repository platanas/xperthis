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
    <div class="col-lg-12 white text-center" style="background:url(<?php print file_create_url($content['field_image']['#items'][0]['uri']); ?>) center center no-repeat;padding: 86px 0 86px 0;">
        <?php print render($content['field_paragraph']); ?>
        <?php //var_dump($content['field_image']); ?>
        <?php if (!empty($content['field_link']['#items'][0]['url'])) { ?>
        <div class="content text-center"<?php print $content_attributes; ?>>
            <span class="field-content btn btn-primary btn-lg darker">
                <a class="" href="<?php print render($content['field_link']['#items'][0]['url']); ?>">
                    <?php print render($content['field_link']['#items'][0]['title']); ?>
                </a>
            </span>
        </div>
        <?php } ?>
    </div>
</div>