
-- Summary -- 

The "fb social" module integrate the facebook's social plugin in Drupal. 
Please read facebook documentation at see http://developers.facebook.com/docs/plugins/ 

* Allows users to display facebook social plugins widget in their drupal site
* Users can create different presets for each plugin. For example, for "like" plugin
  one preset can be configured to have "like" as the title of the plugin (e.g. for "article"
  node type) and one have "recommend" as the title (e.g. for "Person" node type)
* Integrate with boxes module: Users can create boxes for each plugin
  
-- Requirements --

ctools module and a Javascript capable browser


-- Installation 

* Install as usual, see http://drupal.org/node/70151 for further information.


-- Configuration

* Configure general settings at admin/config/user-interface/fb_social
* Create presets at Structure > Facebook social presets (admin/structure/fb_social_presets)
