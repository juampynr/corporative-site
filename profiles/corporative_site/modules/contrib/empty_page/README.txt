A simple empty page solution. Assists in creating empty menu callbacks, mostly used for pages that only consist of blocks.

Authors:
  Nick Robillard <http://drupal.org/user/176017>

Sponsors:
  80 Elements <http://80elements.com>


Requirements
------------

1. Menu - Drupal core optional


Installation
------------

1. Place this module directory in your modules folder (usually sites/all/modules/).

2. Go to "Administer" > "Modules" and enable the module.

3. Manage callbacks at "Structure" > "Empty Page callbacks" <admin/structure/empty-page>


Example: Create an empty front page
-------------------------------

1. Create an Empty Page callback. <admin/structure/empty-page/add>

2. Enter "node" in the Internal Path field (if that is what you have under Default Front Page on the Site Information page). <admin/config/system/site-information>

3. Add a Page Title (optional) and Save.


The standard list of the latest 10 nodes promoted to the front page is now gone.