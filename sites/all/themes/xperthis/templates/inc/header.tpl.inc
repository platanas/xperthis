<div class="<?php print $container_class; ?>">
    <div class="col-md-12 menu-secondary">
        <div class="">
          <?php if (!empty($page['navigation'])): ?>
              <?php print render($page['navigation']); ?>
          <?php endif; ?>
        </div>
    </div>
    
    <div class="col-md-12">
        
        <div class="col-md-2 col-md-offset-0 col-sm-4 col-xs-6 col-sm-offset-4 col-xs-offset-3 text-center logo-container">
            <?php if ($logo): ?>
              <a class="logo navbar-btn " onclick="ga('send','event','Header','Header','Click', BackHome);" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
              </a>
            <?php endif; ?>
        </div>
        <div class="col-sm-2 col-sm-offset-2 col-xs-1 col-xs-offset-1 navbar-burger">
            <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
              <a href="#" type="button" class="burger-button" >
                <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
            <?php endif; ?>
        </div>
        
    <div class="menu-primary col-md-6 col-md-offset-1 mt-4">
        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
          <div class="navbar-collapse collapse" id="navbar-collapse">
            <nav role="navigation">
              <?php if (!empty($primary_nav)): ?>
                <?php print render($primary_nav); ?>
              <?php endif; ?>
              <?php if (!empty($secondary_nav)): ?>
                <?php print render($secondary_nav); ?>
              <?php endif; ?>
            </nav>
          </div>
        <?php endif; ?>
    </div>
        
    <div class="col-md-3 menu-secondary">
      <div class="row row-no-padding">
        <?php if (!empty($page['navigationContact'])): ?>
            <?php print render($page['navigationContact']); ?>
        <?php endif; ?>
      </div>
    </div>
        
  </div>
    <img src="/<?php print $directory . '/img/xperthis-menuHeader-bg-shadow.png'; ?>" alt="" class="pull-left" />
</div>