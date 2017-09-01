
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
<?php
//Check offset
$offset = '';
if (empty($content['field_title_card_3'])):
$offset = 'col-md-offset-2';
endif;
if (empty($content['field_title_card_2'])):
$offset = 'col-md-offset-4';
endif;
if (!empty($content['field_title_card_4'])):
$col = 'col-md-3';
else:
$col = 'col-md-4';
endif;
?>
<div class="container <?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="content container"<?php print $content_attributes; ?>>
        <div class="row">
            <?php  if (!empty($content['field_title'])): ?>
            <div class="<?php  print $col; ?> <?php  print $offset; ?> text-center">
                <div class="card card-round">
                <?php if (!empty($content['field_link']['#items'][0]['url'])): ?>
                <a href="<?php print render($content['field_link']['#items'][0]['url']); ?>">
                <?php endif; ?>
                    <?php print render($content['field_image']); ?>
                <?php if (!empty($content['field_link']['#items'][0]['url'])): ?>
                </a>
                <?php endif; ?>

                <h3 class="regular"><?php print render($content['field_title']); ?></h3>
                <p><?php print strip_tags(render($content['field_paragraph'])); ?></p>
                <?php if (!empty($content['field_link']['#items'][0]['url'])): ?>
                <span class="field-content btn btn-primary">
                    <a href="<?php print render($content['field_link']['#items'][0]['url']); ?>">
                        <?php print render($content['field_link']['#items'][0]['title']); ?>
                    </a>
                </span>
                <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php  if (!empty($content['field_title_card_2'])): ?>
            <div class="<?php  print $col; ?> text-center">
                <div class="card card-round">
                <?php if (!empty($content['field_link_card_2']['#items'][0]['url'])): ?>
                <a href="<?php print render($content['field_link_card_2']['#items'][0]['url']); ?>">
                <?php endif; ?>
                    <?php print render($content['field_image_card_2']); ?>
                <?php if (!empty($content['field_link_card_2']['#items'][0]['url'])): ?>
                </a>
                <?php endif; ?>

                <h3 class="regular"><?php print render($content['field_title_card_2']); ?></h3>
                <p><?php print strip_tags(render($content['field_paragraph_card_2'])); ?></p>
                <?php if (!empty($content['field_link_card_2']['#items'][0]['url'])): ?>
                <span class="field-content btn btn-primary">
                    <a href="<?php print render($content['field_link_card_2']['#items'][0]['url']); ?>">
                        <?php print render($content['field_link_card_2']['#items'][0]['title']); ?>
                    </a>
                </span>
                <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php  if (!empty($content['field_title_card_3'])): ?>
            <div class="<?php  print $col; ?> text-center">
                <div class="card card-round">
                <?php if (!empty($content['field_link_card_3']['#items'][0]['url'])): ?>
                <a href="<?php print render($content['field_link_card_3']['#items'][0]['url']); ?>">
                <?php endif; ?>
                    <?php print render($content['field_image_card_3']); ?>
                <?php if (!empty($content['field_link_card_3']['#items'][0]['url'])): ?>
                </a>
                <?php endif; ?>

                <h3 class="regular"><?php print render($content['field_title_card_3']); ?></h3>
                <p><?php print strip_tags(render($content['field_paragraph_card_3'])); ?></p>
                <?php if (!empty($content['field_link_card_3']['#items'][0]['url'])): ?>
                <span class="field-content btn btn-primary">
                    <a href="<?php print render($content['field_link_card_3']['#items'][0]['url']); ?>">
                        <?php print render($content['field_link_card_3']['#items'][0]['title']); ?>
                    </a>
                </span>
                <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php  if (!empty($content['field_title_card_4'])): ?>
            <div class="<?php  print $col; ?> text-center">
                <div class="card card-round">
                <?php if (!empty($content['field_link_card_4']['#items'][0]['url'])): ?>
                <a href="<?php print render($content['field_link_card_4']['#items'][0]['url']); ?>">
                <?php endif; ?>
                    <?php print render($content['field_image_card_4']); ?>
                <?php if (!empty($content['field_link_card_4']['#items'][0]['url'])): ?>
                </a>
                <?php endif; ?>

                <h3 class="regular"><?php print render($content['field_title_card_4']); ?></h3>
                <p><?php print strip_tags(render($content['field_paragraph_card_4'])); ?></p>
                <?php if (!empty($content['field_link_card_4']['#items'][0]['url'])): ?>
                <span class="field-content btn btn-primary">
                    <a href="<?php print render($content['field_link_card_4']['#items'][0]['url']); ?>">
                        <?php print render($content['field_link_card_4']['#items'][0]['title']); ?>
                    </a>
                </span>
                <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
