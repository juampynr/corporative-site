		<div id="wrapper" class="layout-default">
			
			<?php include ("templates/inc/header.inc"); ?>
	    
	    <div id="container">
				
			  <?php if ($page['highlighted']): ?>
					<?php print render($page['highlighted']); ?>
				<?php endif; ?>
			  
			  <?php if ($page['sidebar_first']): ?>
					<?php print render($page['sidebar_first']); ?>
				<?php endif; ?>
			  
			  <?php if ($page['content']): ?>
					<?php print render($page['content']); ?>
				<?php endif; ?>
		  
		  </div> <!-- //#container -->
		
			<?php if ($page['footer']): ?>
				<?php print render($page['footer']); ?>
			<?php endif; ?>
		
		</div> <!-- //#wrapper -->