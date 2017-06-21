<div class="<?php print $container_class; ?>">
    <div class="row col-md-12">
        <div class="col-sm-4 col-xs-3 navbar-burger">
            <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
              <a href="#" type="button" class="burger-button" >
                <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
            <?php endif; ?>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 text-center logo-container">
        <?php if ($logo): ?>
          <a class="logo navbar-btn " href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a>
        <?php endif; ?>
      </div>
    <div class="menu-news col-md-7 mt-4">
        <p><a href="/fr/taxonomy/term/all" ><?php print t('News').'</a> <span class="breadcrumb-rail">></span> '.truncate_utf8($title, 50, false, true, 1); ?></p>
    </div>
    <div class="col-md-3 menu-secondary">
      <div class="row row-no-padding">
        <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
    <img src="/<?php print $directory . '/img/xperthis-menuHeader-bg-shadow.png'; ?>" alt="" class="pull-left" />
</div>
