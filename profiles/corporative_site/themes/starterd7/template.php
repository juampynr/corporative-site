<?php

function nombreDelTheme_preprocess_node(&$vars) {
	// We create a new theme suggestion for node teasers
	$vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '__' . $vars['view_mode'];
}