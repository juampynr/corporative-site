<p><?php print l('Corporative Site', 'http://drupal.org/project/corporative_site'); ?> comes with
   many modules and features to speed up the creation of your site.</p>
<p>Below is a list with the location of some of the resources enabled by default:</p>

<ul>
  <li>
    This block's template is located at /profiles/corporative_site/modules/custom/welcome.tpl.php.
    It has been added to the frontpage by the
    <?php print l('Homepage Context', 'admin/structure/context/list/homepage/edit'); ?>.
  </li>
  <li>The frontpage has been defined to be 'home' at <?php print l('Site information',
    'admin/config/system/site-information'); ?>. It uses an empty page so you can easily add
    blocks to it. You can edit or add empty pages at
    <?php print l('Empty page callbacks', 'admin/structure/empty-page'); ?>.</li>
  <li>The sidebar blocks are loaded by a site wide context. You can edit it at the
    <?php print l('General Context settings', 'admin/structure/context/list/general/edit'); ?>.
    Click on 'Blocks' when being at that page so you can choose which blocks should be listed
    in all pages.</li>
  <li>The Facebook fan box can be configured at <?php print l('Fan box settings',
    'admin/structure/fb_social_presets/list/Fan box/edit'); ?>. You can specify there your
    Facebook page.</li>
</ul>
