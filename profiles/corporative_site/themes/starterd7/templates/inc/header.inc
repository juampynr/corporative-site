			<div id="header">
				
				<?php if ($is_front): ?>
					<h1 id="logo"><?php print l($site_name, '', array('attributes' => array('title' => $site_name))); ?></h1>
				<?php else: ?>
					<div id="logo"><?php print l($site_name, '', array('attributes' => array('title' => $site_name))); ?></div>
				<?php endif; ?>
				
				<?php if ($page['header']): ?>
					<?php print render($page['header']); ?>
				<?php endif; ?>
				
				<?php
					// Outputting the main_menu directly in the theme instead of as a block
					/*print theme('links__system_main_menu', array(
			      'links' => $main_menu,
			      'attributes' => array(
			        'id' => 'main-menu-links',
			        'class' => array('links', 'clearfix'),
			      ),
			      'heading' => array(
			        'text' => t('Main menu'),
			        'level' => 'h2',
			        'class' => array('element-invisible'),
			      ),
			    ));*/
		    ?>
		    
		    <?php
	        // Outputting the main_menu directly in the theme instead of as a block, formatted as a tree for more than one level
	        /*$main_menu = variable_get('menu_main_links_source', 'main-menu');
	        $tree = menu_tree($main_menu);
	        print drupal_render($tree);*/
        ?>
						
			</div> <!-- //#header -->
			
			<?php if ($messages): ?>
		    <?php print $messages; ?>
		  <?php endif; ?>
		  
	    <?php if ($page['help']): ?>
				<?php print render($page['help']); ?>
			<?php endif; ?>
			
			<?php if ($breadcrumb): ?>
	      <div id="breadcrumb">
	      	<?php print $breadcrumb; ?>
	      </div> <!-- //#breadcrumb -->
	    <?php endif; ?>
	    
	    <?php if (is_array($tabs['#primary'])): ?>
        <div id="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>