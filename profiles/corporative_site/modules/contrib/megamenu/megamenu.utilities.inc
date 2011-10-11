<?php

/**
 * @file
 *
 * Helper/utility functions
 */

/**
 * function menu_list()
 *
 * helper function lists menu machine names except 'navigation'
 * I think this will have to be changed to some stored value, but maybe not? could still be 1 function?
 */
function _megamenu_menulist() {
  $menu_list = menu_get_menus();
  unset($menu_list['navigation']);
  return array_keys($menu_list);
}

function _megamenu_enabled_menus() {
  $result = db_query("SELECT menu_name FROM {megamenu} WHERE enabled = :enabled", array(':enabled' => 1));
  /*
  $menus = array();
  $result = db_query("SELECT menu_name FROM {megamenu} WHERE enabled = 1");
  
  while ($menu = db_fetch_object($result)) {
    $menus[] = $menu->menu_name;
  }
  */
  $menus = array();
  foreach($result as $menu){
    $menus[] = $menu->menu_name;
  }

  if (is_array($menus)){
    return array_values($menus);
  }
}

/**
 * Retrieve a menu and pre-style before theming
 *
 * This function currently removes all "hidden" items, which could be
 * handled in the single iteration of the theme function.  But, I forsee
 * a need for other prep work that might be simmplfied with this second function
 *
 * Will be used in the future to add/alter attributes prior to theming
 *
 * @param $menuname
 *    The name of the menu to extract
 *
 * @return
 *    The pre-styled menu tree
 */
function _megamenu_get_menu_tree($menuname) {
  $menutree = menu_tree_all_data($menuname);
  $menutree_page = menu_tree_page_data($menuname); // Contains active trail
  foreach($menutree as $tier_1_key => $tier_1_item) {
		if ($menutree[$tier_1_key]['link']['in_active_trail']) {
			$menutree[$tier_1_key]['link']['in_active_trail'] = TRUE;
		}
    
		if ($tier_1_item['link']['hidden'] == 1 || empty($tier_1_item['link']['link_title'])) {
      unset($menutree[$tier_1_key]);
    }
    else {
			if ($tier_1_item['below']) {
				foreach($tier_1_item['below'] as $tier_2_key => $tier_2_item) {
					if ($menutree[$tier_1_key]['below'][$tier_2_key]['link']['in_active_trail']) {
						$menutree[$tier_1_key]['below'][$tier_2_key]['link']['in_active_trail'] = TRUE;
					}
					if ($tier_2_item['link']['hidden'] == 1 || empty($tier_2_item['link']['link_title'])) {
	        	unset($menutree[$tier_1_key]['below'][$tier_2_key]);
	        }
					else {
						if ($tier_2_item['below']) {
							foreach($tier_2_item['below'] as $tier_3_key => $tier_3_item) {
								if ($menutree[$tier_1_key]['below'][$tier_2_key]['below'][$tier_3_key]['link']['in_active_trail']) {
									$menutree[$tier_1_key]['below'][$tier_2_key]['below'][$tier_3_key]['link']['in_active_trail'] = TRUE;
								}
								
								if ($tier_3_item['link']['hidden'] ==1 || empty($tier_3_item['link']['link_title'])) {
		                unset($menutree[$tier_1_key]['below'][$tier_2_key]['below'][$tier_3_key]);
		            }
		            else if ($tier_3_item['below']){
                	unset($menutree[$tier_1_key]['below'][$tier_2_key]['below'][$tier_3_key]['below']);
            		}	
							} // end level 3 loop
						}
					}
				} // end level 2 loop
			}
		}
  } // end level 1 loop
  return $menutree;
}

/**
 * Determine if a particular mega menu item is active.
 *
 * TODO: make it better
 *
 * @param <string> $branch (of mega menu)
 */
function _megamenu_active_classes($branch) {
	if (!is_array($branch)) return '';
	
	$active = '';
	
	if ($branch['link']['in_active_trail']) {
		if  ($branch['link']['below'] == FALSE) {
			$active = ' active active-trail';
		}
		else {
			$active = ' active-trail';
		}
	}
	
	return $active;
}

/**
 * Remove the list wrapping div - we don't need it
 *
 * @param <strong> $list_markup
 */
function _megamenu_strip_list_wrapper($output = null) {

	// remove opening wrapper div class
	$output = str_replace('<div class="item-list">','',$output);
	
	// remove wrapper end divv closer
	$output = substr($output, 0, strlen($output)-strlen('</div>'));
	
	return $output;
}

/**
 * Determine the zebra, half, and order attributes of an item.
 *
 * This is a helper function to generate count based classes
 * based on an items position in the sequence and the total count of
 * items. These classes consist of an item's zebra (even/odd), half (half1/half2),
 * and order (first/last).
 *
 * @param $count
 *    An item's numerical position within a sequence.
 * @param $leafcount
 *    The total count of items
 * @return
 *    zebra (event/odd), halves (half1/half2), and order (first/last). clases are
 *    returned as a space delimited list.
 */
function _megamenu_count_attributes($position,$total_count) {
  $zebra = ($position % 2) ? ' even' : ' odd';
  $halves = ($position < $total_count/2) ? ' half-1' : ' half-2';
  if ($position == 0) {
    $order = ' leaf-' . $position . ' first';
  }
  else if ($position == $total_count-1) {
    $order = ' leaf-' . $position . ' last';
  }
  else {
    $order = ' leaf-' . $position;
  }
  return $position.$zebra.$halves.$order;
}

function _megamenu_is_enabled($menu_name) {
  //$result = db_result(db_query("SELECT enabled FROM {megamenu} WHERE menu_name = '%s'", $menu_name));
  $result = db_query("SELECT enabled FROM {megamenu} WHERE menu_name = :menu_name", array(':menu_name' => $menu_name))->fetchField();
  return $result; 
}

function _megamenu_get_menu_orientation_by_name($menu_name) {
  //$result = db_result(db_query("SELECT menu_orientation FROM {megamenu} WHERE menu_name = '%s'", $menu_name));
  $result = db_query("SELECT menu_orientation FROM {megamenu} WHERE menu_name = :menu_name", array(':menu_name' => $menu_name))->fetchField();
  return $result;
}

function _megamenu_get_skin_by_name($menu_name) {
  //$result = db_result(db_query("SELECT skin FROM {megamenu} WHERE menu_name = '%s'", $menu_name));
  $result = db_query("SELECT skin FROM {megamenu} WHERE menu_name = :menu_name", array(':menu_name' => $menu_name))->fetchField();
  return $result;
}

function _megamenu_get_slot_orientation_by_name($menu_name) {
  //$result = db_result(db_query("SELECT slot_orientation FROM {megamenu} WHERE menu_name = '%s'", $menu_name));
  $result = db_query("SELECT slot_orientation FROM {megamenu} WHERE menu_name = :menu_name", array(':menu_name' => $menu_name))->fetchField();
  return $result;
}

function _megamenu_get_slot_attributes_by_name($menu_name) {
  // TODO: Query db
  return '';
}

/**
 * Verify Menu Entry
 * Check to see if an entry exists for the givn menu name. If not, then insert a default row.
 * 
 * @param <string> $menu_name
 */
function _megamenu_verify_menu_entry($menu_name) {
  //$result = db_result(db_query("SELECT menu_name FROM {megamenu} WHERE menu_name = '%s'", $menu_name));
  $result = db_query("SELECT menu_name FROM {megamenu} WHERE menu_name = :menu_name", array(':menu_name' => $menu_name))->fetchField();

  if (!$result) {
    //db_query("INSERT INTO {megamenu} (menu_name, enabled) VALUES ('%s', %d)", $menu_name, 0);
    db_insert('megamenu')
    ->fields(array(
      'menu_name' => $menu_name,
      'enabled' => 0,
    ))
    ->execute();
  }
}

/**
 * Determine if a particular mega menu is using a default supplied skin.
 *
 * TODO: Rewrite this function! This is just a quick and dirty solution.
 *
 * @param <string> $menu_name
 */
function _megamenu_is_skin_default($menu_name) {
  //$result = db_result(db_query("SELECT skin FROM {megamenu} WHERE menu_name = '%s'", $menu_name));
  $result = db_query("SELECT skin FROM {megamenu} WHERE menu_name = :menu_name", array(':menu_name' => $menu_name))->fetchField();

  if ($result == 'minimal' || $result == 'friendly') {
    return true;
  }

  return false;
}

/**
* Return a translated menu item if one exists
*/
function _megamenu_get_translated_menu_title($current_menu, $mlid) {
  $item = menu_link_load($mlid);
  
  if (module_exists('i18n')) {
    $item['title']  = _i18nmenu_get_item_title($item);
  }

  return $item['title'];
}
