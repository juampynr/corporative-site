******************************************************************
	About D7 Version
******************************************************************
This is a direct port by Sylv3st3r. Based on dev version (Jan 24 2011)

******************************************************************
	Contents
******************************************************************
1. Assumptions
2. Mega Menus in a Nutshell
3. How to Use This Module
4. Styling
5. Advanced Usage

******************************************************************
	Assumptions
******************************************************************
1. You are a Drupal themer (or understand theming)
2. Your markup and CSS are clean
3. You want more CSS control over Drupal menus

******************************************************************
	Mega Menus in a Nutshell
******************************************************************
Read: http://www.useit.com/alertbox/mega-dropdown-menus.html

******************************************************************
	How to Use This Module 
******************************************************************
The basis of a mega menu is a Drupal menu that is three levels deep. The first level (or tier) are the 
parent items. The second tier are categories. Tier three menu items are the sub links grouped beneath 
the second tier categories.

Consider the following example menu:

+ Library                           > Tier 1
|   |
|    + Newsletters                  > Tier 2
|   |     |
|   |      + Newsletter 1           > Tier 3
|   |      + Newsletter 2
|   |      + Newsletter 3
|   |
|    + Publications
|         |
|          + Publication 1
|          + Publication 2
|          + Publication 3
|   
+ Info Center

To create a mega menu out of a menu structured in this way:
1. Enable this module just like any other Drupal module
2. Go to the mega menu configuration page: admin/build/megamenu
3. Check the enable box next to the menu you want to convert into a mega menu
4. Click save
5. Click "configure this mega"
	5.1 Select the menu orientation
	5.2 Select the slot orientation
	5.3 Select a default sample skin or type in your own skin name
		IF CREATING YOUR OWN SKIN: You have two options
		1. Follow the on-screen directions to upload your skin to the files directory
		2. Create your own CSS in your theme and include it in your theme.info file.

A block containing your mega menu, with the styles you have specified above, has now been 
enabled.
	
6. Edit your blocks (admin/build/blocks) and place your mega menu block in a region.


******************************************************************
	Styling
******************************************************************

Now that the mega menu block is setup, the actual work begins.

Continuing from the example menu above, the corresponding megamenu structure looks like this. 
Notice the root level, or tier one, items (Library and Info Center) are referred to as parents. 
When the mouse hovers over a parent, a bin drops down. In this example, the Library bin contains 
two slots, which correspond to the second level of the menu (Newsletters and Publications). Notice
that slots are the organizational element, which contain the final link destinations. In this example, 
the slots are oriented horizontally.  They can also stack on top of each other.

 ------------------------------------------------
|  Library  |  Info Center |                     |  > Parent
 ------------------------------------------------
      ||                       
   --------------------------------------------              __
  |  -----------------     -----------------   |                \
  | | [ Newsletters ] |   | [ Publications ] | | --Slot Title    \
  | |                 |   |                  | |                  \
  | |  Newsletter 1   |   |  Publication 1   | |                    Bin
  | |  Newsletter 2   |   |  Publication 2   | |                  /
  | |  Newsletter 3   |   |  Publication 3   | |                 /     
  |  -----------------     ------------------  |                /
   --------------------------------------------              __/
    
    |                 |
     \               /
       \           /
         \       /
            Slot

And the markup looks like this (items in {} are either user supplied values or are dynamically generated):

<ul id="megamenu-{menu name}" class="megamenu-menu {menu orientation} megamenu-skin-{skin name}">
  <li class="megamenu-parent {even/odd}">
    <h2 class="megamenu-parent-title">Library</h2>
    <ul class="megamenu-bin megamenu-slots-{slot orientation}">
      <li class="megamenu-slot {even/odd}">
        <h3 class="megamenu-slot-title">Newsletters</h3>
        <ul class="megamenu-items">
          <li class="megamenu-item {even/odd}">Newsletter 1</li>
          <li class="megamenu-item {even/odd}">Newsletter 2</li>
          <li class="megamenu-item {even/odd}">Newsletter 3</li>
        </ul>
      </li>

      <li class="megamenu-slot {even/odd}">
        <h3 class="megamenu-slot-title">Publications</h3>
        <ul class="megamenu-items">
          <li class="megamenu-item {even/odd}">Publication 1</li>
          <li class="megamenu-item {even/odd}">Publication 2</li>
          <li class="megamenu-item {even/odd}">Publication 3</li>
        </ul>
      </li>
    </ul>
  </li>
  
  <li class="megamenu-parent {even/odd}">
    <h2 class="megamenu-parent-title">Info Center</h2>
    ... bin
       ... slots
          ... items
  </li>
</ul>

To style your mega menu, simply precede all rules with your skin name:
.megamenu-skin-myskin .megamenu-slot-title {
	color: red;
	font-size: 1.2em;
}

******************************************************************
	Advanced Usage
******************************************************************
1. Create Mega Menus our of your taxonomies
   To automatically generate menu content from your sites Taxonomy structure, you can use the 
   Taxonomy Menu module (http://drupal.org/project/taxonomy_menu) which populates your Tier1 with 
   your Taxonomy ‘Vocabulary’ name and Tier2 and Tier3 with Terms hierarchically set to this Vocabulary name.

   NOTE: Your taxonomy structure must still supply 3 tiers of data, so this integration will most likely not 
   work well with free tagging. 
