<?php 


$options['sites'] = array (
);
$options['profiles'] = array (
  0 => 'testing',
  1 => 'corporative_site',
  2 => 'standard',
  3 => 'minimal',
);
$options['packages'] = array (
  'base' => 
  array (
    'modules' => 
    array (
      'tracker' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/tracker/tracker.module',
        'basename' => 'tracker.module',
        'name' => 'tracker',
        'info' => 
        array (
          'name' => 'Tracker',
          'description' => 'Enables tracking of recent content for users.',
          'dependencies' => 
          array (
            0 => 'comment',
          ),
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'tracker.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => '7000',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'image_module_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/image/tests/image_module_test.module',
        'basename' => 'image_module_test.module',
        'name' => 'image_module_test',
        'info' => 
        array (
          'name' => 'Image test',
          'description' => 'Provides hook implementations for testing Image module functionality.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'image_module_test.module',
          ),
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'image' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/image/image.module',
        'basename' => 'image.module',
        'name' => 'image',
        'info' => 
        array (
          'name' => 'Image',
          'description' => 'Provides image manipulation tools.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'file',
          ),
          'files' => 
          array (
            0 => 'image.test',
          ),
          'configure' => 'admin/config/media/image-styles',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => '7002',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'color' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/color/color.module',
        'basename' => 'color.module',
        'name' => 'color',
        'info' => 
        array (
          'name' => 'Color',
          'description' => 'Allows administrators to change the color scheme of compatible themes.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'color.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7001',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'overlay' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/overlay/overlay.module',
        'basename' => 'overlay.module',
        'name' => 'overlay',
        'info' => 
        array (
          'name' => 'Overlay',
          'description' => 'Displays the Drupal administration interface in an overlay.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'update_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/update/tests/update_test.module',
        'basename' => 'update_test.module',
        'name' => 'update_test',
        'info' => 
        array (
          'name' => 'Update test',
          'description' => 'Support module for update module testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'aaa_update_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/update/tests/aaa_update_test.module',
        'basename' => 'aaa_update_test.module',
        'name' => 'aaa_update_test',
        'info' => 
        array (
          'name' => 'AAA Update test',
          'description' => 'Support module for update module testing.',
          'package' => 'Testing',
          'core' => '7.x',
          'hidden' => true,
          'version' => '7.9',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'bbb_update_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/update/tests/bbb_update_test.module',
        'basename' => 'bbb_update_test.module',
        'name' => 'bbb_update_test',
        'info' => 
        array (
          'name' => 'BBB Update test',
          'description' => 'Support module for update module testing.',
          'package' => 'Testing',
          'core' => '7.x',
          'hidden' => true,
          'version' => '7.9',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'ccc_update_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/update/tests/ccc_update_test.module',
        'basename' => 'ccc_update_test.module',
        'name' => 'ccc_update_test',
        'info' => 
        array (
          'name' => 'CCC Update test',
          'description' => 'Support module for update module testing.',
          'package' => 'Testing',
          'core' => '7.x',
          'hidden' => true,
          'version' => '7.9',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'update' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/update/update.module',
        'basename' => 'update.module',
        'name' => 'update',
        'info' => 
        array (
          'name' => 'Update manager',
          'description' => 'Checks for available updates, and can securely install or update modules and themes via a web interface.',
          'version' => '7.9',
          'package' => 'Core',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'update.test',
          ),
          'configure' => 'admin/reports/updates/settings',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7001',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'blog' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/blog/blog.module',
        'basename' => 'blog.module',
        'name' => 'blog',
        'info' => 
        array (
          'name' => 'Blog',
          'description' => 'Enables multi-user blogs.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'blog.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'dashboard' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/dashboard/dashboard.module',
        'basename' => 'dashboard.module',
        'name' => 'dashboard',
        'info' => 
        array (
          'name' => 'Dashboard',
          'description' => 'Provides a dashboard page in the administrative interface for organizing administrative tasks and tracking information within your site.',
          'core' => '7.x',
          'package' => 'Core',
          'version' => '7.9',
          'files' => 
          array (
            0 => 'dashboard.test',
          ),
          'dependencies' => 
          array (
            0 => 'block',
          ),
          'configure' => 'admin/dashboard/customize',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'comment' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/comment/comment.module',
        'basename' => 'comment.module',
        'name' => 'comment',
        'info' => 
        array (
          'name' => 'Comment',
          'description' => 'Allows users to comment on and discuss published content.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'text',
          ),
          'files' => 
          array (
            0 => 'comment.module',
            1 => 'comment.test',
          ),
          'configure' => 'admin/content/comment',
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'comment.css',
            ),
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => '7009',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'system' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/system/system.module',
        'basename' => 'system.module',
        'name' => 'system',
        'info' => 
        array (
          'name' => 'System',
          'description' => 'Handles general site configuration for administrators.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'system.archiver.inc',
            1 => 'system.mail.inc',
            2 => 'system.queue.inc',
            3 => 'system.tar.inc',
            4 => 'system.updater.inc',
            5 => 'system.test',
          ),
          'required' => true,
          'configure' => 'admin/config/system',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7071',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'field_ui' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/field_ui/field_ui.module',
        'basename' => 'field_ui.module',
        'name' => 'field_ui',
        'info' => 
        array (
          'name' => 'Field UI',
          'description' => 'User interface for the Field API.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'field',
          ),
          'files' => 
          array (
            0 => 'field_ui.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'search_embedded_form' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/search/tests/search_embedded_form.module',
        'basename' => 'search_embedded_form.module',
        'name' => 'search_embedded_form',
        'info' => 
        array (
          'name' => 'Search embedded form',
          'description' => 'Support module for search module testing of embedded forms.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'search_extra_type' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/search/tests/search_extra_type.module',
        'basename' => 'search_extra_type.module',
        'name' => 'search_extra_type',
        'info' => 
        array (
          'name' => 'Test search type',
          'description' => 'Support module for search module testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'search' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/search/search.module',
        'basename' => 'search.module',
        'name' => 'search',
        'info' => 
        array (
          'name' => 'Search',
          'description' => 'Enables site-wide keyword searching.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'search.extender.inc',
            1 => 'search.test',
          ),
          'configure' => 'admin/config/search/settings',
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'search.css',
            ),
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7000',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'block_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/block/tests/block_test.module',
        'basename' => 'block_test.module',
        'name' => 'block_test',
        'info' => 
        array (
          'name' => 'Block test',
          'description' => 'Provides test blocks.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'block' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/block/block.module',
        'basename' => 'block.module',
        'name' => 'block',
        'info' => 
        array (
          'name' => 'Block',
          'description' => 'Controls the visual building blocks a page is constructed with. Blocks are boxes of content rendered into an area, or region, of a web page.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'block.test',
          ),
          'configure' => 'admin/structure/block',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7008',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'locale_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/locale/tests/locale_test.module',
        'basename' => 'locale_test.module',
        'name' => 'locale_test',
        'info' => 
        array (
          'name' => 'Locale Test',
          'description' => 'Support module for the locale layer tests.',
          'core' => '7.x',
          'package' => 'Testing',
          'version' => '7.9',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'locale' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/locale/locale.module',
        'basename' => 'locale.module',
        'name' => 'locale',
        'info' => 
        array (
          'name' => 'Locale',
          'description' => 'Adds language handling functionality and enables the translation of the user interface to languages other than English.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'locale.test',
          ),
          'configure' => 'admin/config/regional/language',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7003',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'toolbar' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/toolbar/toolbar.module',
        'basename' => 'toolbar.module',
        'name' => 'toolbar',
        'info' => 
        array (
          'name' => 'Toolbar',
          'description' => 'Provides a toolbar that shows the top-level administration menu items and links from other modules.',
          'core' => '7.x',
          'package' => 'Core',
          'version' => '7.9',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'book' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/book/book.module',
        'basename' => 'book.module',
        'name' => 'book',
        'info' => 
        array (
          'name' => 'Book',
          'description' => 'Allows users to create and organize related content in an outline.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'book.test',
          ),
          'configure' => 'admin/content/book/settings',
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'book.css',
            ),
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'translation_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/translation/tests/translation_test.module',
        'basename' => 'translation_test.module',
        'name' => 'translation_test',
        'info' => 
        array (
          'name' => 'Content Translation Test',
          'description' => 'Support module for the content translation tests.',
          'core' => '7.x',
          'package' => 'Testing',
          'version' => '7.9',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'translation' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/translation/translation.module',
        'basename' => 'translation.module',
        'name' => 'translation',
        'info' => 
        array (
          'name' => 'Content translation',
          'description' => 'Allows content to be translated into different languages.',
          'dependencies' => 
          array (
            0 => 'locale',
          ),
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'translation.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'options' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/field/modules/options/options.module',
        'basename' => 'options.module',
        'name' => 'options',
        'info' => 
        array (
          'name' => 'Options',
          'description' => 'Defines selection, check box and radio button widgets for text and numeric fields.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'field',
          ),
          'files' => 
          array (
            0 => 'options.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'field_sql_storage' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/field/modules/field_sql_storage/field_sql_storage.module',
        'basename' => 'field_sql_storage.module',
        'name' => 'field_sql_storage',
        'info' => 
        array (
          'name' => 'Field SQL storage',
          'description' => 'Stores field data in an SQL database.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'field',
          ),
          'files' => 
          array (
            0 => 'field_sql_storage.test',
          ),
          'required' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => '7002',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'text' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/field/modules/text/text.module',
        'basename' => 'text.module',
        'name' => 'text',
        'info' => 
        array (
          'name' => 'Text',
          'description' => 'Defines simple text field types.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'field',
          ),
          'files' => 
          array (
            0 => 'text.test',
          ),
          'required' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => '7000',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'number' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/field/modules/number/number.module',
        'basename' => 'number.module',
        'name' => 'number',
        'info' => 
        array (
          'name' => 'Number',
          'description' => 'Defines numeric field types.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'field',
          ),
          'files' => 
          array (
            0 => 'number.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'list_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/field/modules/list/tests/list_test.module',
        'basename' => 'list_test.module',
        'name' => 'list_test',
        'info' => 
        array (
          'name' => 'List test',
          'description' => 'Support module for the List module tests.',
          'core' => '7.x',
          'package' => 'Testing',
          'version' => '7.9',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'list' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/field/modules/list/list.module',
        'basename' => 'list.module',
        'name' => 'list',
        'info' => 
        array (
          'name' => 'List',
          'description' => 'Defines list field types. Use with Options to create selection lists.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'field',
            1 => 'options',
          ),
          'files' => 
          array (
            0 => 'tests/list.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => '7002',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'field_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/field/tests/field_test.module',
        'basename' => 'field_test.module',
        'name' => 'field_test',
        'info' => 
        array (
          'name' => 'Field API Test',
          'description' => 'Support module for the Field API tests.',
          'core' => '7.x',
          'package' => 'Testing',
          'files' => 
          array (
            0 => 'field_test.entity.inc',
          ),
          'version' => '7.9',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'field' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/field/field.module',
        'basename' => 'field.module',
        'name' => 'field',
        'info' => 
        array (
          'name' => 'Field',
          'description' => 'Field API to add fields to entities like nodes and users.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'field.module',
            1 => 'field.attach.inc',
            2 => 'tests/field.test',
          ),
          'dependencies' => 
          array (
            0 => 'field_sql_storage',
          ),
          'required' => true,
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'theme/field.css',
            ),
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => '7001',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'file_module_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/file/tests/file_module_test.module',
        'basename' => 'file_module_test.module',
        'name' => 'file_module_test',
        'info' => 
        array (
          'name' => 'File test',
          'description' => 'Provides hooks for testing File module functionality.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'file' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/file/file.module',
        'basename' => 'file.module',
        'name' => 'file',
        'info' => 
        array (
          'name' => 'File',
          'description' => 'Defines a file field type.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'field',
          ),
          'files' => 
          array (
            0 => 'tests/file.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'menu' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/menu/menu.module',
        'basename' => 'menu.module',
        'name' => 'menu',
        'info' => 
        array (
          'name' => 'Menu',
          'description' => 'Allows administrators to customize the site navigation menu.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'menu.test',
          ),
          'configure' => 'admin/structure/menu',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7002',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'drupal_system_listing_compatible_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/drupal_system_listing_compatible_test/drupal_system_listing_compatible_test.module',
        'basename' => 'drupal_system_listing_compatible_test.module',
        'name' => 'drupal_system_listing_compatible_test',
        'info' => 
        array (
          'name' => 'Drupal system listing compatible test',
          'description' => 'Support module for testing the drupal_system_listing function.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'drupal_system_listing_incompatible_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/drupal_system_listing_incompatible_test/drupal_system_listing_incompatible_test.module',
        'basename' => 'drupal_system_listing_incompatible_test.module',
        'name' => 'drupal_system_listing_incompatible_test',
        'info' => 
        array (
          'name' => 'Drupal system listing incompatible test',
          'description' => 'Support module for testing the drupal_system_listing function.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'ajax_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/ajax_test.module',
        'basename' => 'ajax_test.module',
        'name' => 'ajax_test',
        'info' => 
        array (
          'name' => 'AJAX Test',
          'description' => 'Support module for AJAX framework tests.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'actions_loop_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/actions_loop_test.module',
        'basename' => 'actions_loop_test.module',
        'name' => 'actions_loop_test',
        'info' => 
        array (
          'name' => 'Actions loop test',
          'description' => 'Support module for action loop testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'xmlrpc_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/xmlrpc_test.module',
        'basename' => 'xmlrpc_test.module',
        'name' => 'xmlrpc_test',
        'info' => 
        array (
          'name' => 'XML-RPC Test',
          'description' => 'Support module for XML-RPC tests according to the validator1 specification.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'database_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/database_test.module',
        'basename' => 'database_test.module',
        'name' => 'database_test',
        'info' => 
        array (
          'name' => 'Database Test',
          'description' => 'Support module for Database layer tests.',
          'core' => '7.x',
          'package' => 'Testing',
          'version' => '7.9',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'module_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/module_test.module',
        'basename' => 'module_test.module',
        'name' => 'module_test',
        'info' => 
        array (
          'name' => 'Module test',
          'description' => 'Support module for module system testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'file_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/file_test.module',
        'basename' => 'file_test.module',
        'name' => 'file_test',
        'info' => 
        array (
          'name' => 'File test',
          'description' => 'Support module for file handling tests.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'file_test.module',
          ),
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'system_dependencies_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/system_dependencies_test.module',
        'basename' => 'system_dependencies_test.module',
        'name' => 'system_dependencies_test',
        'info' => 
        array (
          'name' => 'System dependency test',
          'description' => 'Support module for testing system dependencies.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'dependencies' => 
          array (
            0 => '_missing_dependency',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'requirements1_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/requirements1_test.module',
        'basename' => 'requirements1_test.module',
        'name' => 'requirements1_test',
        'info' => 
        array (
          'name' => 'Requirements 1 Test',
          'description' => 'Tests that a module is not installed when it fails hook_requirements(\'install\').',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'session_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/session_test.module',
        'basename' => 'session_test.module',
        'name' => 'session_test',
        'info' => 
        array (
          'name' => 'Session test',
          'description' => 'Support module for session data testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'update_test_1' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/update_test_1.module',
        'basename' => 'update_test_1.module',
        'name' => 'update_test_1',
        'info' => 
        array (
          'name' => 'Update test',
          'description' => 'Support module for update testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7002',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'url_alter_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/url_alter_test.module',
        'basename' => 'url_alter_test.module',
        'name' => 'url_alter_test',
        'info' => 
        array (
          'name' => 'Url_alter tests',
          'description' => 'A support modules for url_alter hook testing.',
          'core' => '7.x',
          'package' => 'Testing',
          'version' => '7.9',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'menu_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/menu_test.module',
        'basename' => 'menu_test.module',
        'name' => 'menu_test',
        'info' => 
        array (
          'name' => 'Hook menu tests',
          'description' => 'Support module for menu hook testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'taxonomy_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/taxonomy_test.module',
        'basename' => 'taxonomy_test.module',
        'name' => 'taxonomy_test',
        'info' => 
        array (
          'name' => 'Taxonomy test module',
          'description' => '"Tests functions and hooks not used in core".',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'dependencies' => 
          array (
            0 => 'taxonomy',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'batch_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/batch_test.module',
        'basename' => 'batch_test.module',
        'name' => 'batch_test',
        'info' => 
        array (
          'name' => 'Batch API test',
          'description' => 'Support module for Batch API tests.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'filter_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/filter_test.module',
        'basename' => 'filter_test.module',
        'name' => 'filter_test',
        'info' => 
        array (
          'name' => 'Filter test module',
          'description' => 'Tests filter hooks and functions.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'requirements2_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/requirements2_test.module',
        'basename' => 'requirements2_test.module',
        'name' => 'requirements2_test',
        'info' => 
        array (
          'name' => 'Requirements 2 Test',
          'description' => 'Tests that a module is not installed when the one it depends on fails hook_requirements(\'install).',
          'dependencies' => 
          array (
            0 => 'requirements1_test',
            1 => 'comment',
          ),
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'entity_cache_test_dependency' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/entity_cache_test_dependency.module',
        'basename' => 'entity_cache_test_dependency.module',
        'name' => 'entity_cache_test_dependency',
        'info' => 
        array (
          'name' => 'Entity cache test dependency',
          'description' => 'Support dependency module for testing entity cache.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'error_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/error_test.module',
        'basename' => 'error_test.module',
        'name' => 'error_test',
        'info' => 
        array (
          'name' => 'Error test',
          'description' => 'Support module for error and exception testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'theme_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/theme_test.module',
        'basename' => 'theme_test.module',
        'name' => 'theme_test',
        'info' => 
        array (
          'name' => 'Theme test',
          'description' => 'Support module for theme system testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'system_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/system_test.module',
        'basename' => 'system_test.module',
        'name' => 'system_test',
        'info' => 
        array (
          'name' => 'System test',
          'description' => 'Support module for system testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'system_test.module',
          ),
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'ajax_forms_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/ajax_forms_test.module',
        'basename' => 'ajax_forms_test.module',
        'name' => 'ajax_forms_test',
        'info' => 
        array (
          'name' => 'AJAX form test mock module',
          'description' => 'Test for AJAX form calls.',
          'core' => '7.x',
          'package' => 'Testing',
          'version' => '7.9',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'entity_crud_hook_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/entity_crud_hook_test.module',
        'basename' => 'entity_crud_hook_test.module',
        'name' => 'entity_crud_hook_test',
        'info' => 
        array (
          'name' => 'Entity CRUD Hooks Test',
          'description' => 'Support module for CRUD hook tests.',
          'core' => '7.x',
          'package' => 'Testing',
          'version' => '7.9',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'form_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/form_test.module',
        'basename' => 'form_test.module',
        'name' => 'form_test',
        'info' => 
        array (
          'name' => 'FormAPI Test',
          'description' => 'Support module for Form API tests.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'entity_cache_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/entity_cache_test.module',
        'basename' => 'entity_cache_test.module',
        'name' => 'entity_cache_test',
        'info' => 
        array (
          'name' => 'Entity cache test',
          'description' => 'Support module for testing entity cache.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'entity_cache_test_dependency',
          ),
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'update_test_3' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/update_test_3.module',
        'basename' => 'update_test_3.module',
        'name' => 'update_test_3',
        'info' => 
        array (
          'name' => 'Update test',
          'description' => 'Support module for update testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7000',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'common_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/common_test.module',
        'basename' => 'common_test.module',
        'name' => 'common_test',
        'info' => 
        array (
          'name' => 'Common Test',
          'description' => 'Support module for Common tests.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'common_test.css',
            ),
            'print' => 
            array (
              0 => 'common_test.print.css',
            ),
          ),
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'update_test_2' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/update_test_2.module',
        'basename' => 'update_test_2.module',
        'name' => 'update_test_2',
        'info' => 
        array (
          'name' => 'Update test',
          'description' => 'Support module for update testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7002',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'image_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/image_test.module',
        'basename' => 'image_test.module',
        'name' => 'image_test',
        'info' => 
        array (
          'name' => 'Image test',
          'description' => 'Support module for image toolkit tests.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'common_test_cron_helper' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/tests/common_test_cron_helper.module',
        'basename' => 'common_test_cron_helper.module',
        'name' => 'common_test_cron_helper',
        'info' => 
        array (
          'name' => 'Common Test Cron Helper',
          'description' => 'Helper module for CronRunTestCase::testCronExceptions().',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'simpletest' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/simpletest/simpletest.module',
        'basename' => 'simpletest.module',
        'name' => 'simpletest',
        'info' => 
        array (
          'name' => 'Testing',
          'description' => 'Provides a framework for unit and functional testing.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'simpletest.test',
            1 => 'drupal_web_test_case.php',
            2 => 'tests/actions.test',
            3 => 'tests/ajax.test',
            4 => 'tests/batch.test',
            5 => 'tests/bootstrap.test',
            6 => 'tests/cache.test',
            7 => 'tests/common.test',
            8 => 'tests/database_test.test',
            9 => 'tests/entity_crud_hook_test.test',
            10 => 'tests/entity_query.test',
            11 => 'tests/error.test',
            12 => 'tests/file.test',
            13 => 'tests/filetransfer.test',
            14 => 'tests/form.test',
            15 => 'tests/graph.test',
            16 => 'tests/image.test',
            17 => 'tests/lock.test',
            18 => 'tests/mail.test',
            19 => 'tests/menu.test',
            20 => 'tests/module.test',
            21 => 'tests/password.test',
            22 => 'tests/path.test',
            23 => 'tests/registry.test',
            24 => 'tests/schema.test',
            25 => 'tests/session.test',
            26 => 'tests/tablesort.test',
            27 => 'tests/theme.test',
            28 => 'tests/unicode.test',
            29 => 'tests/update.test',
            30 => 'tests/xmlrpc.test',
            31 => 'tests/upgrade/upgrade.test',
            32 => 'tests/upgrade/upgrade.comment.test',
            33 => 'tests/upgrade/upgrade.filter.test',
            34 => 'tests/upgrade/upgrade.forum.test',
            35 => 'tests/upgrade/upgrade.locale.test',
            36 => 'tests/upgrade/upgrade.menu.test',
            37 => 'tests/upgrade/upgrade.node.test',
            38 => 'tests/upgrade/upgrade.taxonomy.test',
            39 => 'tests/upgrade/upgrade.translatable.test',
            40 => 'tests/upgrade/upgrade.upload.test',
            41 => 'tests/upgrade/upgrade.user.test',
          ),
          'configure' => 'admin/config/development/testing/settings',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'node_test_exception' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/node/tests/node_test_exception.module',
        'basename' => 'node_test_exception.module',
        'name' => 'node_test_exception',
        'info' => 
        array (
          'name' => 'Node module exception tests',
          'description' => 'Support module for node related exception testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'node_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/node/tests/node_test.module',
        'basename' => 'node_test.module',
        'name' => 'node_test',
        'info' => 
        array (
          'name' => 'Node module tests',
          'description' => 'Support module for node related testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'node_access_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/node/tests/node_access_test.module',
        'basename' => 'node_access_test.module',
        'name' => 'node_access_test',
        'info' => 
        array (
          'name' => 'Node module access tests',
          'description' => 'Support module for node permission testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'node' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/node/node.module',
        'basename' => 'node.module',
        'name' => 'node',
        'info' => 
        array (
          'name' => 'Node',
          'description' => 'Allows content to be submitted to the site and displayed on pages.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'node.module',
            1 => 'node.test',
          ),
          'required' => true,
          'configure' => 'admin/structure/types',
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'node.css',
            ),
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7012',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'forum' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/forum/forum.module',
        'basename' => 'forum.module',
        'name' => 'forum',
        'info' => 
        array (
          'name' => 'Forum',
          'description' => 'Provides discussion forums.',
          'dependencies' => 
          array (
            0 => 'taxonomy',
            1 => 'comment',
          ),
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'forum.test',
          ),
          'configure' => 'admin/structure/forum',
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'forum.css',
            ),
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => '7003',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'user_form_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/user/tests/user_form_test.module',
        'basename' => 'user_form_test.module',
        'name' => 'user_form_test',
        'info' => 
        array (
          'name' => 'User module form tests',
          'description' => 'Support module for user form testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'user' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/user/user.module',
        'basename' => 'user.module',
        'name' => 'user',
        'info' => 
        array (
          'name' => 'User',
          'description' => 'Manages the user registration and login system.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'user.module',
            1 => 'user.test',
          ),
          'required' => true,
          'configure' => 'admin/config/people',
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'user.css',
            ),
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7017',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'profile' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/profile/profile.module',
        'basename' => 'profile.module',
        'name' => 'profile',
        'info' => 
        array (
          'name' => 'Profile',
          'description' => 'Supports configurable user profiles.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'profile.test',
          ),
          'configure' => 'admin/config/people/profile',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7002',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'poll' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/poll/poll.module',
        'basename' => 'poll.module',
        'name' => 'poll',
        'info' => 
        array (
          'name' => 'Poll',
          'description' => 'Allows your site to capture votes on different topics in the form of multiple choice questions.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'poll.test',
          ),
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'poll.css',
            ),
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7004',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'dblog' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/dblog/dblog.module',
        'basename' => 'dblog.module',
        'name' => 'dblog',
        'info' => 
        array (
          'name' => 'Database logging',
          'description' => 'Logs and records system events to the database.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'dblog.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7001',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'trigger_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/trigger/tests/trigger_test.module',
        'basename' => 'trigger_test.module',
        'name' => 'trigger_test',
        'info' => 
        array (
          'name' => 'Trigger Test',
          'description' => 'Support module for Trigger tests.',
          'package' => 'Testing',
          'core' => '7.x',
          'hidden' => true,
          'version' => '7.9',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'trigger' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/trigger/trigger.module',
        'basename' => 'trigger.module',
        'name' => 'trigger',
        'info' => 
        array (
          'name' => 'Trigger',
          'description' => 'Enables actions to be fired on certain system events, such as when new content is created.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'trigger.test',
          ),
          'configure' => 'admin/structure/trigger',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7000',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'rdf_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/rdf/tests/rdf_test.module',
        'basename' => 'rdf_test.module',
        'name' => 'rdf_test',
        'info' => 
        array (
          'name' => 'RDF module tests',
          'description' => 'Support module for RDF module testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'rdf' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/rdf/rdf.module',
        'basename' => 'rdf.module',
        'name' => 'rdf',
        'info' => 
        array (
          'name' => 'RDF',
          'description' => 'Enriches your content with metadata to let other applications (e.g. search engines, aggregators) better understand its relationships and attributes.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'rdf.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'shortcut' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/shortcut/shortcut.module',
        'basename' => 'shortcut.module',
        'name' => 'shortcut',
        'info' => 
        array (
          'name' => 'Shortcut',
          'description' => 'Allows users to manage customizable lists of shortcut links.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'shortcut.test',
          ),
          'configure' => 'admin/config/user-interface/shortcut',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'help' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/help/help.module',
        'basename' => 'help.module',
        'name' => 'help',
        'info' => 
        array (
          'name' => 'Help',
          'description' => 'Manages the display of online help.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'help.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'taxonomy' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/taxonomy/taxonomy.module',
        'basename' => 'taxonomy.module',
        'name' => 'taxonomy',
        'info' => 
        array (
          'name' => 'Taxonomy',
          'description' => 'Enables the categorization of content.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'options',
          ),
          'files' => 
          array (
            0 => 'taxonomy.module',
            1 => 'taxonomy.test',
          ),
          'configure' => 'admin/structure/taxonomy',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => '7010',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'syslog' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/syslog/syslog.module',
        'basename' => 'syslog.module',
        'name' => 'syslog',
        'info' => 
        array (
          'name' => 'Syslog',
          'description' => 'Logs and records system events to syslog.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'syslog.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'php' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/php/php.module',
        'basename' => 'php.module',
        'name' => 'php',
        'info' => 
        array (
          'name' => 'PHP filter',
          'description' => 'Allows embedded PHP code/snippets to be evaluated.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'php.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'contextual' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/contextual/contextual.module',
        'basename' => 'contextual.module',
        'name' => 'contextual',
        'info' => 
        array (
          'name' => 'Contextual links',
          'description' => 'Provides contextual links to perform actions related to elements on a page.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'openid_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/openid/tests/openid_test.module',
        'basename' => 'openid_test.module',
        'name' => 'openid_test',
        'info' => 
        array (
          'name' => 'OpenID dummy provider',
          'description' => 'OpenID provider used for testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'openid',
          ),
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'openid' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/openid/openid.module',
        'basename' => 'openid.module',
        'name' => 'openid',
        'info' => 
        array (
          'name' => 'OpenID',
          'description' => 'Allows users to log into your site using OpenID.',
          'version' => '7.9',
          'package' => 'Core',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'openid.test',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '6000',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'filter' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/filter/filter.module',
        'basename' => 'filter.module',
        'name' => 'filter',
        'info' => 
        array (
          'name' => 'Filter',
          'description' => 'Filters content in preparation for display.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'filter.test',
          ),
          'required' => true,
          'configure' => 'admin/config/content/formats',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7010',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'aggregator_test' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/aggregator/tests/aggregator_test.module',
        'basename' => 'aggregator_test.module',
        'name' => 'aggregator_test',
        'info' => 
        array (
          'name' => 'Aggregator module tests',
          'description' => 'Support module for aggregator related testing.',
          'package' => 'Testing',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'aggregator' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/aggregator/aggregator.module',
        'basename' => 'aggregator.module',
        'name' => 'aggregator',
        'info' => 
        array (
          'name' => 'Aggregator',
          'description' => 'Aggregates syndicated content (RSS, RDF, and Atom feeds).',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'aggregator.test',
          ),
          'configure' => 'admin/config/services/aggregator/settings',
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'aggregator.css',
            ),
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7002',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'contact' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/contact/contact.module',
        'basename' => 'contact.module',
        'name' => 'contact',
        'info' => 
        array (
          'name' => 'Contact',
          'description' => 'Enables the use of both personal and site-wide contact forms.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'contact.test',
          ),
          'configure' => 'admin/structure/contact',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7003',
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'path' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/path/path.module',
        'basename' => 'path.module',
        'name' => 'path',
        'info' => 
        array (
          'name' => 'Path',
          'description' => 'Allows users to rename URLs.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'path.test',
          ),
          'configure' => 'admin/config/search/path',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => 0,
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'statistics' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/modules/statistics/statistics.module',
        'basename' => 'statistics.module',
        'name' => 'statistics',
        'info' => 
        array (
          'name' => 'Statistics',
          'description' => 'Logs access statistics for your site.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'files' => 
          array (
            0 => 'statistics.test',
          ),
          'configure' => 'admin/config/system/statistics',
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
        ),
        'schema_version' => '7000',
        'project' => 'drupal',
        'version' => '7.9',
      ),
    ),
    'themes' => 
    array (
      'stark' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/themes/stark/stark.info',
        'basename' => 'stark.info',
        'name' => 'Stark',
        'info' => 
        array (
          'name' => 'Stark',
          'description' => 'This theme demonstrates Drupal\'s default HTML markup and CSS styles. To learn how to build your own theme and override Drupal\'s default code, see the <a href="http://drupal.org/theme-guide">Theming Guide</a>.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'layout.css',
            ),
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
        ),
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'bartik' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/themes/bartik/bartik.info',
        'basename' => 'bartik.info',
        'name' => 'Bartik',
        'info' => 
        array (
          'name' => 'Bartik',
          'description' => 'A flexible, recolorable theme with many regions.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'css/layout.css',
              1 => 'css/style.css',
              2 => 'css/colors.css',
            ),
            'print' => 
            array (
              0 => 'css/print.css',
            ),
          ),
          'regions' => 
          array (
            'header' => 'Header',
            'help' => 'Help',
            'page_top' => 'Page top',
            'page_bottom' => 'Page bottom',
            'highlighted' => 'Highlighted',
            'featured' => 'Featured',
            'content' => 'Content',
            'sidebar_first' => 'Sidebar first',
            'sidebar_second' => 'Sidebar second',
            'triptych_first' => 'Triptych first',
            'triptych_middle' => 'Triptych middle',
            'triptych_last' => 'Triptych last',
            'footer_firstcolumn' => 'Footer first column',
            'footer_secondcolumn' => 'Footer second column',
            'footer_thirdcolumn' => 'Footer third column',
            'footer_fourthcolumn' => 'Footer fourth column',
            'footer' => 'Footer',
          ),
          'settings' => 
          array (
            'shortcut_module_link' => '0',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
        ),
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'seven' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/themes/seven/seven.info',
        'basename' => 'seven.info',
        'name' => 'Seven',
        'info' => 
        array (
          'name' => 'Seven',
          'description' => 'A simple one-column, tableless, fluid width administration theme.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'stylesheets' => 
          array (
            'screen' => 
            array (
              0 => 'reset.css',
              1 => 'style.css',
            ),
          ),
          'settings' => 
          array (
            'shortcut_module_link' => '1',
          ),
          'regions' => 
          array (
            'content' => 'Content',
            'help' => 'Help',
            'page_top' => 'Page top',
            'page_bottom' => 'Page bottom',
            'sidebar_first' => 'First sidebar',
          ),
          'regions_hidden' => 
          array (
            0 => 'sidebar_first',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
        ),
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'garland' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/themes/garland/garland.info',
        'basename' => 'garland.info',
        'name' => 'Garland',
        'info' => 
        array (
          'name' => 'Garland',
          'description' => 'A multi-column theme which can be configured to modify colors and switch between fixed and fluid width layouts.',
          'package' => 'Core',
          'version' => '7.9',
          'core' => '7.x',
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'style.css',
            ),
            'print' => 
            array (
              0 => 'print.css',
            ),
          ),
          'settings' => 
          array (
            'garland_width' => 'fluid',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
        ),
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'test_theme' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/themes/tests/test_theme/test_theme.info',
        'basename' => 'test_theme.info',
        'name' => 'Test theme',
        'info' => 
        array (
          'name' => 'Test theme',
          'description' => 'Theme for testing the theme system',
          'core' => '7.x',
          'hidden' => true,
          'stylesheets' => 
          array (
            'all' => 
            array (
              0 => 'system.base.css',
            ),
          ),
          'version' => '7.9',
          'project' => 'drupal',
          'datestamp' => '1319660730',
        ),
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'update_test_basetheme' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/themes/tests/update_test_basetheme/update_test_basetheme.info',
        'basename' => 'update_test_basetheme.info',
        'name' => 'Update test base theme',
        'info' => 
        array (
          'name' => 'Update test base theme',
          'description' => 'Test theme which acts as a base theme for other test subthemes.',
          'core' => '7.x',
          'hidden' => true,
          'version' => '7.9',
          'project' => 'drupal',
          'datestamp' => '1319660730',
        ),
        'project' => 'drupal',
        'version' => '7.9',
      ),
      'update_test_subtheme' => 
      array (
        'filename' => '/var/aegir/platforms/corporative_site/themes/tests/update_test_subtheme/update_test_subtheme.info',
        'basename' => 'update_test_subtheme.info',
        'name' => 'Update test subtheme',
        'info' => 
        array (
          'name' => 'Update test subtheme',
          'description' => 'Test theme which uses update_test_basetheme as the base theme.',
          'core' => '7.x',
          'base theme' => 'update_test_basetheme',
          'hidden' => true,
          'version' => '7.9',
          'project' => 'drupal',
          'datestamp' => '1319660730',
        ),
        'project' => 'drupal',
        'version' => '7.9',
      ),
    ),
    'platforms' => 
    array (
      'drupal' => 
      array (
        'short_name' => 'drupal',
        'version' => '7.9',
        'description' => 'This platform is running Drupal 7.9',
      ),
    ),
    'profiles' => 
    array (
      'testing' => 
      array (
        'name' => 'testing',
        'filename' => '/var/aegir/platforms/corporative_site/profiles/testing/testing.profile',
        'project' => 'drupal',
        'info' => 
        array (
          'name' => 'Testing',
          'description' => 'Minimal profile for running tests. Includes absolutely required modules only.',
          'version' => '7.9',
          'core' => '7.x',
          'hidden' => true,
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'dependencies' => 
          array (
          ),
          'php' => '5.2.4',
          'languages' => 
          array (
            0 => 'en',
          ),
        ),
        'version' => '7.9',
      ),
      'corporative_site' => 
      array (
        'name' => 'corporative_site',
        'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/corporative_site.profile',
        'project' => '',
        'info' => 
        array (
          'name' => 'Corporative Site',
          'description' => 'Installs tipical modules and configuration used in a corporative site',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'block',
            1 => 'color',
            2 => 'comment',
            3 => 'contextual',
            4 => 'dashboard',
            5 => 'help',
            6 => 'image',
            7 => 'list',
            8 => 'menu',
            9 => 'number',
            10 => 'options',
            11 => 'path',
            12 => 'taxonomy',
            13 => 'dblog',
            14 => 'search',
            15 => 'shortcut',
            16 => 'toolbar',
            17 => 'overlay',
            18 => 'field_ui',
            19 => 'file',
            20 => 'rdf',
            21 => 'advanced_help',
            22 => 'better_exposed_filters',
            23 => 'block_class',
            24 => 'ctools',
            25 => 'calendar',
            26 => 'ckeditor',
            27 => 'context',
            28 => 'context_ui',
            29 => 'context_layouts',
            30 => 'date',
            31 => 'diff',
            32 => 'email',
            33 => 'empty_page',
            34 => 'humanstxt',
            35 => 'features',
            36 => 'imce',
            37 => 'libraries',
            38 => 'link',
            39 => 'megamenu',
            40 => 'nodequeue',
            41 => 'pathauto',
            42 => 'transliteration',
            43 => 'print',
            44 => 'search404',
            45 => 'sharethis',
            46 => 'site_map',
            47 => 'special_menu_items',
            48 => 'strongarm',
            49 => 'token',
            50 => 'views',
            51 => 'views_ui',
            52 => 'views_slideshow_cycle',
            53 => 'views_slideshow',
            54 => 'fb_social',
            55 => 'twitter',
            56 => 'feature_ckeditor',
            57 => 'feature_homepage',
            58 => 'feature_general',
          ),
          'files' => 
          array (
            0 => 'corporative_site.profile',
          ),
          'php' => '5.2.4',
          'languages' => 
          array (
            0 => 'en',
          ),
        ),
        'version' => '7.9',
      ),
      'standard' => 
      array (
        'name' => 'standard',
        'filename' => '/var/aegir/platforms/corporative_site/profiles/standard/standard.profile',
        'project' => 'drupal',
        'info' => 
        array (
          'name' => 'Standard',
          'description' => 'Install with commonly used features pre-configured.',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'block',
            1 => 'color',
            2 => 'comment',
            3 => 'contextual',
            4 => 'dashboard',
            5 => 'help',
            6 => 'image',
            7 => 'list',
            8 => 'menu',
            9 => 'number',
            10 => 'options',
            11 => 'path',
            12 => 'taxonomy',
            13 => 'dblog',
            14 => 'search',
            15 => 'shortcut',
            16 => 'toolbar',
            17 => 'overlay',
            18 => 'field_ui',
            19 => 'file',
            20 => 'rdf',
          ),
          'files' => 
          array (
            0 => 'standard.profile',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
          'languages' => 
          array (
            0 => 'en',
          ),
          'old_short_name' => 'default',
        ),
        'version' => '7.9',
      ),
      'minimal' => 
      array (
        'name' => 'minimal',
        'filename' => '/var/aegir/platforms/corporative_site/profiles/minimal/minimal.profile',
        'project' => 'drupal',
        'info' => 
        array (
          'name' => 'Minimal',
          'description' => 'Start with only a few modules enabled.',
          'version' => '7.9',
          'core' => '7.x',
          'dependencies' => 
          array (
            0 => 'block',
            1 => 'dblog',
          ),
          'files' => 
          array (
            0 => 'minimal.profile',
          ),
          'project' => 'drupal',
          'datestamp' => '1319660730',
          'php' => '5.2.4',
          'languages' => 
          array (
            0 => 'en',
          ),
        ),
        'version' => '7.9',
      ),
    ),
  ),
  'profiles' => 
  array (
    'testing' => 
    array (
      'modules' => 
      array (
        'drupal_system_listing_compatible_test' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/testing/modules/drupal_system_listing_compatible_test/drupal_system_listing_compatible_test.module',
          'basename' => 'drupal_system_listing_compatible_test.module',
          'name' => 'drupal_system_listing_compatible_test',
          'info' => 
          array (
            'name' => 'Drupal system listing compatible test',
            'description' => 'Support module for testing the drupal_system_listing function.',
            'package' => 'Testing',
            'version' => '7.9',
            'core' => '7.x',
            'hidden' => true,
            'project' => 'drupal',
            'datestamp' => '1319660730',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'drupal',
          'version' => '7.9',
        ),
        'drupal_system_listing_incompatible_test' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/testing/modules/drupal_system_listing_incompatible_test/drupal_system_listing_incompatible_test.module',
          'basename' => 'drupal_system_listing_incompatible_test.module',
          'name' => 'drupal_system_listing_incompatible_test',
          'info' => 
          array (
            'name' => 'Drupal system listing incompatible test',
            'description' => 'Support module for testing the drupal_system_listing function.',
            'package' => 'Testing',
            'version' => '7.9',
            'core' => '6.x',
            'hidden' => true,
            'project' => 'drupal',
            'datestamp' => '1319660730',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'drupal',
          'version' => '7.9',
        ),
      ),
      'themes' => 
      array (
      ),
    ),
    'corporative_site' => 
    array (
      'modules' => 
      array (
        'welcomeblock' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/custom/welcomeblock/welcomeblock.module',
          'basename' => 'welcomeblock.module',
          'name' => 'welcomeblock',
          'info' => 
          array (
            'name' => 'Welcome Block',
            'description' => 'Defines a block with basic information of where resides each resource.',
            'core' => '7.x',
            'package' => 'Corporative Site',
            'dependencies' => 
            array (
            ),
            'version' => NULL,
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => '',
          'version' => NULL,
        ),
        'feature_homepage_slideshow' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/features/feature_homepage_slideshow/feature_homepage_slideshow.module',
          'basename' => 'feature_homepage_slideshow.module',
          'name' => 'feature_homepage_slideshow',
          'info' => 
          array (
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'features',
              1 => 'image',
              2 => 'strongarm',
              3 => 'views',
              4 => 'views_slideshow',
              5 => 'views_slideshow_cycle',
            ),
            'description' => 'Cycles images in a slider',
            'features' => 
            array (
              'ctools' => 
              array (
                0 => 'strongarm:strongarm:1',
                1 => 'views:views_default:3.0',
              ),
              'field' => 
              array (
                0 => 'node-slide-body',
                1 => 'node-slide-field_slide_image',
              ),
              'node' => 
              array (
                0 => 'slide',
              ),
              'variable' => 
              array (
                0 => 'comment_anonymous_slide',
                1 => 'comment_default_mode_slide',
                2 => 'comment_default_per_page_slide',
                3 => 'comment_form_location_slide',
                4 => 'comment_preview_slide',
                5 => 'comment_slide',
                6 => 'comment_subject_field_slide',
                7 => 'language_content_type_slide',
                8 => 'node_options_slide',
              ),
              'views_view' => 
              array (
                0 => 'homepage_slider',
              ),
            ),
            'name' => 'Homepage Slideshow',
            'package' => 'Features',
            'project' => 'feature_homepage_slideshow',
            'version' => '7.x-1.0',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'feature_homepage_slideshow',
          'version' => '7.x-1.0',
        ),
        'events_calendar_feature' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/features/events_calendar_feature/events_calendar_feature.module',
          'basename' => 'events_calendar_feature.module',
          'name' => 'events_calendar_feature',
          'info' => 
          array (
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'calendar',
              1 => 'context',
              2 => 'context_ui',
              3 => 'ctools',
              4 => 'date',
              5 => 'date_views',
              6 => 'features',
              7 => 'views',
              8 => 'views_ui',
            ),
            'description' => 'Settings for event listings',
            'features' => 
            array (
              'context' => 
              array (
                0 => 'Events',
              ),
              'ctools' => 
              array (
                0 => 'context:context:3',
                1 => 'views:views_default:3.0',
              ),
              'field' => 
              array (
                0 => 'node-event-body',
                1 => 'node-event-field_event_date',
              ),
              'node' => 
              array (
                0 => 'event',
              ),
              'views_view' => 
              array (
                0 => 'events',
                1 => 'events_calendar',
              ),
            ),
            'name' => 'Events calendar feature',
            'package' => 'Features',
            'project' => 'events_calendar_feature',
            'version' => '7.x-1.0',
            'datestamp' => '1314697016',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'events_calendar_feature',
          'version' => '7.x-1.0',
        ),
        'featured_news' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/features/featured_news_feature/featured_news.module',
          'basename' => 'featured_news.module',
          'name' => 'featured_news',
          'info' => 
          array (
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'features',
              1 => 'image',
              2 => 'views',
            ),
            'description' => 'A sample of how to list featured content over a list of full content',
            'features' => 
            array (
              'ctools' => 
              array (
                0 => 'views:views_default:3.0',
              ),
              'field' => 
              array (
                0 => 'node-new-body',
                1 => 'node-new-field_new_image',
                2 => 'node-new-field_new_subtitle',
              ),
              'node' => 
              array (
                0 => 'new',
              ),
              'views_view' => 
              array (
                0 => 'news',
              ),
            ),
            'name' => 'Featured News',
            'package' => 'Features',
            'php' => '5.2.4',
            'project' => 'featured_news_feature',
            'version' => '7.x-1.0',
            'datestamp' => '1316507216',
          ),
          'schema_version' => 0,
          'project' => 'featured_news_feature',
          'version' => '7.x-1.0',
        ),
        'feature_content_administration' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/features/feature_content_administration/feature_content_administration.module',
          'basename' => 'feature_content_administration.module',
          'name' => 'feature_content_administration',
          'info' => 
          array (
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'features',
              1 => 'overlay',
              2 => 'toolbar',
              3 => 'workbench',
            ),
            'description' => 'Settings for client\'s content administration',
            'features' => 
            array (
              'user_permission' => 
              array (
                0 => 'access overlay',
                1 => 'access toolbar',
                2 => 'access workbench',
                3 => 'administer nodes',
                4 => 'create page content',
                5 => 'delete any page content',
                6 => 'delete own page content',
                7 => 'edit any page content',
                8 => 'edit own page content',
                9 => 'view the administration theme',
              ),
              'user_role' => 
              array (
                0 => 'content manager',
              ),
            ),
            'name' => 'Content Administration',
            'package' => 'Features',
            'project' => 'feature_content_administration',
            'version' => '7.x-1.0',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'feature_content_administration',
          'version' => '7.x-1.0',
        ),
        'feature_general' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/features/feature_general/feature_general.module',
          'basename' => 'feature_general.module',
          'name' => 'feature_general',
          'info' => 
          array (
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'context',
              1 => 'fb_social',
            ),
            'description' => 'Site wide settings',
            'features' => 
            array (
              'context' => 
              array (
                0 => 'general',
              ),
              'ctools' => 
              array (
                0 => 'context:context:3',
                1 => 'fb_social:fb_social:1',
              ),
              'fb_social_preset' => 
              array (
                0 => 'Site fan box',
              ),
            ),
            'name' => 'General',
            'package' => 'Features',
            'project' => 'feature_general',
            'version' => '7.x-1.0',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'feature_general',
          'version' => '7.x-1.0',
        ),
        'feature_ckeditor' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/features/feature_ckeditor/feature_ckeditor.module',
          'basename' => 'feature_ckeditor.module',
          'name' => 'feature_ckeditor',
          'info' => 
          array (
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'ckeditor',
              1 => 'features',
              2 => 'imce',
              3 => 'strongarm',
            ),
            'description' => 'CKEditor settings',
            'features' => 
            array (
              'ctools' => 
              array (
                0 => 'strongarm:strongarm:1',
              ),
              'filter' => 
              array (
                0 => 'filtered_html',
                1 => 'full_html',
              ),
              'user_permission' => 
              array (
                0 => 'use text format filtered_html',
                1 => 'use text format full_html',
              ),
              'variable' => 
              array (
                0 => 'imce_profiles',
              ),
            ),
            'name' => 'CKEditor',
            'package' => 'Features',
            'php' => '5.2.4',
            'project' => 'feature_ckeditor',
            'version' => '7.x-1.0',
          ),
          'schema_version' => 0,
          'project' => 'feature_ckeditor',
          'version' => '7.x-1.0',
        ),
        'feature_homepage' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/features/feature_homepage/feature_homepage.module',
          'basename' => 'feature_homepage.module',
          'name' => 'feature_homepage',
          'info' => 
          array (
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'context',
              1 => 'welcomeblock',
            ),
            'description' => 'Homepage settings',
            'features' => 
            array (
              'context' => 
              array (
                0 => 'homepage',
              ),
            ),
            'name' => 'Homepage',
            'package' => 'Features',
            'php' => '5.2.4',
            'project' => 'feature_homepage',
            'version' => '7.x-1.0',
          ),
          'schema_version' => 0,
          'project' => 'feature_homepage',
          'version' => '7.x-1.0',
        ),
        'print_mail' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/print/print_mail/print_mail.module',
          'basename' => 'print_mail.module',
          'name' => 'print_mail',
          'info' => 
          array (
            'name' => 'Send by e-mail',
            'description' => 'Provides the capability to send the web page by e-mail',
            'core' => '7.x',
            'package' => 'Printer, e-mail and PDF versions',
            'dependencies' => 
            array (
              0 => 'print',
            ),
            'files' => 
            array (
              0 => 'print_mail.module',
              1 => 'print_mail.inc',
              2 => 'print_mail.admin.inc',
              3 => 'print_mail.install',
            ),
            'configure' => 'admin/config/user-interface/print/email',
            'version' => '7.x-1.0-alpha1',
            'project' => 'print',
            'datestamp' => '1311207167',
            'php' => '5.2.4',
          ),
          'schema_version' => '7000',
          'project' => 'print',
          'version' => '7.x-1.0-alpha1',
        ),
        'print_pdf' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/print/print_pdf/print_pdf.module',
          'basename' => 'print_pdf.module',
          'name' => 'print_pdf',
          'info' => 
          array (
            'name' => 'PDF version',
            'description' => 'Adds the capability to export pages as PDF.',
            'core' => '7.x',
            'package' => 'Printer, e-mail and PDF versions',
            'dependencies' => 
            array (
              0 => 'print',
            ),
            'files' => 
            array (
              0 => 'print_pdf.module',
              1 => 'print_pdf.admin.inc',
              2 => 'print_pdf.pages.inc',
              3 => 'print_pdf.install',
            ),
            'configure' => 'admin/config/user-interface/print/pdf',
            'version' => '7.x-1.0-alpha1',
            'project' => 'print',
            'datestamp' => '1311207167',
            'php' => '5.2.4',
          ),
          'schema_version' => '7000',
          'project' => 'print',
          'version' => '7.x-1.0-alpha1',
        ),
        'print' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/print/print.module',
          'basename' => 'print.module',
          'name' => 'print',
          'info' => 
          array (
            'name' => 'Printer-friendly pages',
            'description' => 'Adds a printer-friendly version link to content and administrative pages.',
            'core' => '7.x',
            'package' => 'Printer, e-mail and PDF versions',
            'files' => 
            array (
              0 => 'print.module',
              1 => 'print.admin.inc',
              2 => 'print.pages.inc',
              3 => 'print.install',
            ),
            'configure' => 'admin/config/user-interface/print',
            'version' => '7.x-1.0-alpha1',
            'project' => 'print',
            'datestamp' => '1311207167',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => '7000',
          'project' => 'print',
          'version' => '7.x-1.0-alpha1',
        ),
        'views_slideshow_cycle' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/views_slideshow/contrib/views_slideshow_cycle/views_slideshow_cycle.module',
          'basename' => 'views_slideshow_cycle.module',
          'name' => 'views_slideshow_cycle',
          'info' => 
          array (
            'name' => 'Views Slideshow: Cycle',
            'description' => 'Adds a Rotating slideshow mode to Views Slideshow.',
            'dependencies' => 
            array (
              0 => 'views_slideshow',
              1 => 'libraries',
            ),
            'package' => 'Views',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'views_slideshow_cycle.module',
              1 => 'views_slideshow_cycle.views_slideshow.inc',
              2 => 'theme/views_slideshow_cycle.theme.inc',
            ),
            'version' => NULL,
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => '',
          'version' => NULL,
        ),
        'views_slideshow' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/views_slideshow/views_slideshow.module',
          'basename' => 'views_slideshow.module',
          'name' => 'views_slideshow',
          'info' => 
          array (
            'name' => 'Views Slideshow',
            'description' => 'Provides a View style that displays rows as a jQuery slideshow.  This is an API and requires Views Slideshow Cycle or another module that supports the API.',
            'dependencies' => 
            array (
              0 => 'views',
            ),
            'package' => 'Views',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'views_slideshow.module',
              1 => 'theme/views_slideshow.theme.inc',
              2 => 'views_slideshow.views.inc',
              3 => 'views_slideshow_plugin_style_slideshow.inc',
            ),
            'version' => NULL,
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => '',
          'version' => NULL,
        ),
        'empty_page' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/empty_page/empty_page.module',
          'basename' => 'empty_page.module',
          'name' => 'empty_page',
          'info' => 
          array (
            'name' => 'Empty Page',
            'description' => 'A simple empty page solution. Assists in creating empty menu callbacks, mostly used for pages that only consist of blocks.',
            'core' => '7.x',
            'package' => 'Other',
            'files' => 
            array (
              0 => 'empty_page.admin.inc',
              1 => 'empty_page.install',
              2 => 'empty_page.module',
            ),
            'version' => '7.x-1.0',
            'project' => 'empty_page',
            'datestamp' => '1294276868',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'empty_page',
          'version' => '7.x-1.0',
        ),
        'pathauto' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/pathauto/pathauto.module',
          'basename' => 'pathauto.module',
          'name' => 'pathauto',
          'info' => 
          array (
            'name' => 'Pathauto',
            'description' => 'Provides a mechanism for modules to automatically generate aliases for the content they manage.',
            'dependencies' => 
            array (
              0 => 'path',
              1 => 'token',
            ),
            'core' => '7.x',
            'files' => 
            array (
              0 => 'pathauto.test',
            ),
            'configure' => 'admin/config/search/path/patterns',
            'recommends' => 
            array (
              0 => 'redirect',
            ),
            'version' => '7.x-1.0-rc2',
            'project' => 'pathauto',
            'datestamp' => '1308241021',
            'php' => '5.2.4',
          ),
          'schema_version' => '7005',
          'project' => 'pathauto',
          'version' => '7.x-1.0-rc2',
        ),
        'ckeditor' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/ckeditor/ckeditor.module',
          'basename' => 'ckeditor.module',
          'name' => 'ckeditor',
          'info' => 
          array (
            'name' => 'CKEditor',
            'description' => 'Enables the usage of CKEditor (WYSIWYG) instead of plain text fields.',
            'core' => '7.x',
            'package' => 'User interface',
            'configure' => 'admin/config/content/ckeditor',
            'files' => 
            array (
              0 => 'includes/ckeditor.user.inc',
            ),
            'version' => '7.x-1.2',
            'project' => 'ckeditor',
            'datestamp' => '1306745815',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => '7002',
          'project' => 'ckeditor',
          'version' => '7.x-1.2',
        ),
        'diff' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/diff/diff.module',
          'basename' => 'diff.module',
          'name' => 'diff',
          'info' => 
          array (
            'name' => 'Diff',
            'description' => 'Show difference between node revisions.',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'DiffEngine.php',
            ),
            'version' => '7.x-2.0',
            'project' => 'diff',
            'datestamp' => '1311239815',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'diff',
          'version' => '7.x-2.0',
        ),
        'job_scheduler' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/job_scheduler/job_scheduler.module',
          'basename' => 'job_scheduler.module',
          'name' => 'job_scheduler',
          'info' => 
          array (
            'name' => 'Job Scheduler',
            'description' => 'Scheduler API',
            'files' => 
            array (
              0 => 'job_scheduler.module',
              1 => 'job_scheduler.install',
              2 => 'JobScheduler.inc',
              3 => 'JobSchedulerCronTab.inc',
            ),
            'core' => '7.x',
            'php' => '5.2',
            'version' => '7.x-2.x-dev',
            'project' => 'job_scheduler',
            'datestamp' => '1314015186',
            'dependencies' => 
            array (
            ),
          ),
          'schema_version' => '7101',
          'project' => 'job_scheduler',
          'version' => '7.x-2.x-dev',
        ),
        'webform' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/webform/webform.module',
          'basename' => 'webform.module',
          'name' => 'webform',
          'info' => 
          array (
            'name' => 'Webform',
            'description' => 'Enables the creation of forms and questionnaires.',
            'core' => '7.x',
            'package' => 'Webform',
            'configure' => 'admin/config/content/webform',
            'files' => 
            array (
              0 => 'includes/webform.export.inc',
              1 => 'views/webform_handler_field_form_body.inc',
              2 => 'views/webform_handler_field_is_draft.inc',
              3 => 'views/webform_handler_field_node_link_edit.inc',
              4 => 'views/webform_handler_field_node_link_results.inc',
              5 => 'views/webform_handler_field_submission_count.inc',
              6 => 'views/webform_handler_field_submission_link.inc',
              7 => 'views/webform_handler_filter_is_draft.inc',
              8 => 'views/webform.views.inc',
              9 => 'tests/components.test',
              10 => 'tests/permissions.test',
              11 => 'tests/submission.test',
              12 => 'tests/webform.test',
            ),
            'version' => '7.x-3.11',
            'project' => 'webform',
            'datestamp' => '1305758218',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => '7311',
          'project' => 'webform',
          'version' => '7.x-3.11',
        ),
        'date_popup' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/date/date_popup/date_popup.module',
          'basename' => 'date_popup.module',
          'name' => 'date_popup',
          'info' => 
          array (
            'name' => 'Date Popup',
            'description' => 'Enables jquery popup calendars and time entry widgets for selecting dates and times.',
            'dependencies' => 
            array (
              0 => 'date_api',
            ),
            'package' => 'Date/Time',
            'core' => '7.x',
            'configure' => 'admin/config/content/date_popup',
            'stylesheets' => 
            array (
              'all' => 
              array (
                0 => 'themes/datepicker.1.7.css',
              ),
            ),
            'files' => 
            array (
              0 => 'date_popup.module',
              1 => 'date_popup.install',
              2 => 'date_popup.js',
              3 => 'themes/calendar.css',
              4 => 'themes/datepicker.css',
              5 => 'themes/timeentry.css',
            ),
            'version' => '7.x-2.x-dev',
            'project' => 'date',
            'datestamp' => '1321921002',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'date',
          'version' => '7.x-2.x-dev',
        ),
        'date_repeat' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/date/date_repeat/date_repeat.module',
          'basename' => 'date_repeat.module',
          'name' => 'date_repeat',
          'info' => 
          array (
            'name' => 'Date Repeat API',
            'description' => 'A Date Repeat API to calculate repeating dates and times from iCal rules.',
            'dependencies' => 
            array (
              0 => 'date_api',
            ),
            'package' => 'Date/Time',
            'core' => '7.x',
            'php' => '5.2',
            'files' => 
            array (
              0 => 'date_repeat_calc.inc',
              1 => 'date_repeat_form.inc',
              2 => 'date_repeat.install',
              3 => 'date_repeat.module',
              4 => 'tests/date_repeat.test',
            ),
            'version' => '7.x-2.x-dev',
            'project' => 'date',
            'datestamp' => '1321921002',
          ),
          'schema_version' => 0,
          'project' => 'date',
          'version' => '7.x-2.x-dev',
        ),
        'date_migrate_example' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/date/date_migrate/date_migrate_example/date_migrate_example.module',
          'basename' => 'date_migrate_example.module',
          'name' => 'date_migrate_example',
          'info' => 
          array (
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'date',
              1 => 'date_repeat',
              2 => 'date_migrate',
              3 => 'features',
              4 => 'migrate',
            ),
            'description' => 'Examples of migrating with the Date module',
            'features' => 
            array (
              'field' => 
              array (
                0 => 'node-date_migrate_example-body',
                1 => 'node-date_migrate_example-field_date',
                2 => 'node-date_migrate_example-field_date_range',
                3 => 'node-date_migrate_example-field_date_repeat',
                4 => 'node-date_migrate_example-field_datestamp',
                5 => 'node-date_migrate_example-field_datestamp_range',
                6 => 'node-date_migrate_example-field_datetime',
                7 => 'node-date_migrate_example-field_datetime_range',
              ),
              'node' => 
              array (
                0 => 'date_migrate_example',
              ),
            ),
            'files' => 
            array (
              0 => 'date_migrate_example.migrate.inc',
            ),
            'name' => 'Date Migration Example',
            'package' => 'Features',
            'project' => 'date',
            'version' => '7.x-2.x-dev',
            'datestamp' => '1321921002',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'date',
          'version' => '7.x-2.x-dev',
        ),
        'date_migrate' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/date/date_migrate/date_migrate.module',
          'basename' => 'date_migrate.module',
          'name' => 'date_migrate',
          'info' => 
          array (
            'name' => 'Date Migration',
            'description' => 'Provides support for importing into date fields with the Migrate module.',
            'core' => '7.x',
            'package' => 'Date/Time',
            'dependencies' => 
            array (
              0 => 'migrate',
              1 => 'date',
            ),
            'files' => 
            array (
              0 => 'date.migrate.inc',
              1 => 'date_migrate.test',
            ),
            'version' => '7.x-2.x-dev',
            'project' => 'date',
            'datestamp' => '1321921002',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'date',
          'version' => '7.x-2.x-dev',
        ),
        'date_api' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/date/date_api/date_api.module',
          'basename' => 'date_api.module',
          'name' => 'date_api',
          'info' => 
          array (
            'name' => 'Date API',
            'description' => 'A Date API that can be used by other modules.',
            'package' => 'Date/Time',
            'core' => '7.x',
            'php' => '5.2',
            'stylesheets' => 
            array (
              'all' => 
              array (
                0 => 'date.css',
              ),
            ),
            'files' => 
            array (
              0 => 'date_api.module',
              1 => 'date_api_elements.inc',
              2 => 'date_api_ical.inc',
              3 => 'date_api_sql.inc',
              4 => 'date_api.admin.inc',
              5 => 'date_api.install',
              6 => 'theme/theme.inc',
            ),
            'version' => '7.x-2.x-dev',
            'project' => 'date',
            'datestamp' => '1321921002',
            'dependencies' => 
            array (
            ),
          ),
          'schema_version' => '7000',
          'project' => 'date',
          'version' => '7.x-2.x-dev',
        ),
        'date_views' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/date/date_views/date_views.module',
          'basename' => 'date_views.module',
          'name' => 'date_views',
          'info' => 
          array (
            'name' => 'Date Views',
            'description' => 'Views integration for date fields and date functionality.',
            'package' => 'Date/Time',
            'dependencies' => 
            array (
              0 => 'date_api',
              1 => 'views',
            ),
            'core' => '7.x',
            'php' => '5.2',
            'files' => 
            array (
              0 => 'date_views.module',
              1 => 'includes/date_handler_field_multiple.inc',
              2 => 'includes/date_views_argument_handler.inc',
              3 => 'includes/date_views_argument_handler_simple.inc',
              4 => 'includes/date_views_fields.inc',
              5 => 'includes/date_views_filter_handler.inc',
              6 => 'includes/date_views_filter_handler_simple.inc',
              7 => 'includes/date_views.views_default.inc',
              8 => 'includes/date_views.views.inc',
              9 => 'includes/date_views_plugin_pager.inc',
              10 => 'includes/date_navigation_plugin_style.inc',
              11 => 'includes/date_plugin_display_attachment.inc',
              12 => 'theme/theme.inc',
              13 => 'theme/date-navigation.tpl.php',
              14 => 'theme/date-views-pager.tpl.php',
              15 => 'theme/date-valarm.tpl.php',
              16 => 'theme/date-vcalendar.tpl.php',
              17 => 'theme/date-vevent.tpl.php',
              18 => 'theme/date-views-filter-form.tpl.php',
            ),
            'version' => '7.x-2.x-dev',
            'project' => 'date',
            'datestamp' => '1321921002',
          ),
          'schema_version' => 0,
          'project' => 'date',
          'version' => '7.x-2.x-dev',
        ),
        'date_tools' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/date/date_tools/date_tools.module',
          'basename' => 'date_tools.module',
          'name' => 'date_tools',
          'info' => 
          array (
            'name' => 'Date Tools',
            'description' => 'Tools to import and auto-create dates and calendars.',
            'dependencies' => 
            array (
              0 => 'date',
            ),
            'package' => 'Date/Time',
            'core' => '7.x',
            'configure' => 'admin/structure/date',
            'files' => 
            array (
              0 => 'date_tools.module',
              1 => 'tests/date_tools.test',
            ),
            'version' => '7.x-2.x-dev',
            'project' => 'date',
            'datestamp' => '1321921002',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'date',
          'version' => '7.x-2.x-dev',
        ),
        'date_context' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/date/date_context/date_context.module',
          'basename' => 'date_context.module',
          'name' => 'date_context',
          'info' => 
          array (
            'name' => 'Date Context',
            'description' => 'Adds an option to the Context module to set a context condition based on the value of a date field.',
            'package' => 'Date/Time',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'date',
              1 => 'context',
            ),
            'files' => 
            array (
              0 => 'date_context.module',
            ),
            'version' => '7.x-2.x-dev',
            'project' => 'date',
            'datestamp' => '1321921002',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'date',
          'version' => '7.x-2.x-dev',
        ),
        'date' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/date/date.module',
          'basename' => 'date.module',
          'name' => 'date',
          'info' => 
          array (
            'name' => 'Date',
            'description' => 'Makes date/time fields available.',
            'dependencies' => 
            array (
              0 => 'date_api',
            ),
            'package' => 'Date/Time',
            'core' => '7.x',
            'php' => '5.2',
            'files' => 
            array (
              0 => 'date_admin.inc',
              1 => 'date_content_generate.inc',
              2 => 'date_elements.inc',
              3 => 'date_repeat.inc',
              4 => 'date.install',
              5 => 'date.module',
              6 => 'date.theme',
              7 => 'date.tokens.inc',
              8 => 'date.views.inc',
              9 => 'tests/date_api.test',
              10 => 'tests/date.test',
              11 => 'tests/date_field.test',
              12 => 'tests/date_validation.test',
              13 => 'tests/date_timezone.test',
            ),
            'version' => '7.x-2.x-dev',
            'project' => 'date',
            'datestamp' => '1321921002',
          ),
          'schema_version' => '7001',
          'project' => 'date',
          'version' => '7.x-2.x-dev',
        ),
        'email' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/email/email.module',
          'basename' => 'email.module',
          'name' => 'email',
          'info' => 
          array (
            'name' => 'Email',
            'description' => 'Defines an email field type.',
            'core' => '7.x',
            'package' => 'Fields',
            'files' => 
            array (
              0 => 'email.module',
              1 => 'email.install',
            ),
            'version' => '7.x-1.0',
            'project' => 'email',
            'datestamp' => '1313666247',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'email',
          'version' => '7.x-1.0',
        ),
        'nodequeue_service' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/nodequeue/addons/nodequeue_service/nodequeue_service.module',
          'basename' => 'nodequeue_service.module',
          'name' => 'nodequeue_service',
          'info' => 
          array (
            'name' => 'Nodequeue Service',
            'description' => 'Provides a nodequeue service.',
            'package' => 'Nodequeue',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'services',
              1 => 'nodequeue',
            ),
            'files' => 
            array (
              0 => 'nodequeue_service.inc',
            ),
            'version' => '7.x-2.0-beta1',
            'project' => 'nodequeue',
            'datestamp' => '1316558104',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'nodequeue',
          'version' => '7.x-2.0-beta1',
        ),
        'nodequeue' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/nodequeue/nodequeue.module',
          'basename' => 'nodequeue.module',
          'name' => 'nodequeue',
          'info' => 
          array (
            'name' => 'Nodequeue',
            'description' => 'Create queues which can contain nodes in arbitrary order',
            'package' => 'Nodequeue',
            'core' => '7.x',
            'configure' => 'admin/structure/nodequeue/settings',
            'files' => 
            array (
              0 => 'includes/views/nodequeue.views.inc',
              1 => 'includes/nodequeue.actions.inc',
              2 => 'includes/views/nodequeue_handler_argument_subqueue_qid.inc',
              3 => 'includes/views/nodequeue_handler_field_all_queues.inc',
              4 => 'includes/views/nodequeue_handler_field_all_subqueues.inc',
              5 => 'includes/views/nodequeue_handler_field_links.inc',
              6 => 'includes/views/nodequeue_handler_field_queue_tab.inc',
              7 => 'includes/views/nodequeue_handler_filter_in_queue.inc',
              8 => 'includes/views/nodequeue_handler_relationship_nodequeue.inc',
            ),
            'version' => '7.x-2.0-beta1',
            'project' => 'nodequeue',
            'datestamp' => '1316558104',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => '7201',
          'project' => 'nodequeue',
          'version' => '7.x-2.0-beta1',
        ),
        'nodequeue_generate' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/nodequeue/nodequeue_generate.module',
          'basename' => 'nodequeue_generate.module',
          'name' => 'nodequeue_generate',
          'info' => 
          array (
            'name' => 'Nodequeue generate',
            'description' => 'Bulk assign nodes into queues for quickly populating a site.',
            'package' => 'Development',
            'dependencies' => 
            array (
              0 => 'nodequeue',
            ),
            'core' => '7.x',
            'files' => 
            array (
              0 => 'nodequeue_generate.module',
            ),
            'version' => '7.x-2.0-beta1',
            'project' => 'nodequeue',
            'datestamp' => '1316558104',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'nodequeue',
          'version' => '7.x-2.0-beta1',
        ),
        'smartqueue' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/nodequeue/smartqueue.module',
          'basename' => 'smartqueue.module',
          'name' => 'smartqueue',
          'info' => 
          array (
            'name' => 'Smartqueue taxonomy',
            'description' => 'Creates a node queue for each taxonomy vocabulary',
            'package' => 'Nodequeue',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'nodequeue',
              1 => 'taxonomy',
            ),
            'version' => '7.x-2.0-beta1',
            'project' => 'nodequeue',
            'datestamp' => '1316558104',
            'php' => '5.2.4',
          ),
          'schema_version' => '7001',
          'project' => 'nodequeue',
          'version' => '7.x-2.0-beta1',
        ),
        'humanstxt' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/humanstxt/humanstxt.module',
          'basename' => 'humanstxt.module',
          'name' => 'humanstxt',
          'info' => 
          array (
            'name' => 'humans.txt',
            'description' => 'Generates a humans.txt file dynamically and allows you to edit it.',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'humanstxt.module',
              1 => 'humanstxt.admin.inc',
              2 => 'humanstxt.install',
            ),
            'configure' => 'admin/config/search/humanstxt',
            'version' => '7.x-1.0',
            'project' => 'humanstxt',
            'datestamp' => '1298216822',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'humanstxt',
          'version' => '7.x-1.0',
        ),
        'strongarm' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/strongarm/strongarm.module',
          'basename' => 'strongarm.module',
          'name' => 'strongarm',
          'info' => 
          array (
            'name' => 'Strongarm',
            'description' => 'Enforces variable values defined by modules that need settings set to operate properly.',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'ctools',
            ),
            'files' => 
            array (
              0 => 'strongarm.admin.inc',
              1 => 'strongarm.install',
              2 => 'strongarm.module',
            ),
            'version' => '7.x-2.0-beta2',
            'project' => 'strongarm',
            'datestamp' => '1285599361',
            'php' => '5.2.4',
          ),
          'schema_version' => '6201',
          'project' => 'strongarm',
          'version' => '7.x-2.0-beta2',
        ),
        'imce' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/imce/imce.module',
          'basename' => 'imce.module',
          'name' => 'imce',
          'info' => 
          array (
            'name' => 'IMCE',
            'description' => 'An image/file uploader and browser supporting personal directories and user quota.',
            'core' => '7.x',
            'package' => 'Media',
            'configure' => 'admin/config/media/imce',
            'version' => '7.x-1.4',
            'project' => 'imce',
            'datestamp' => '1307386616',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => '7001',
          'project' => 'imce',
          'version' => '7.x-1.4',
        ),
        'link' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/link/link.module',
          'basename' => 'link.module',
          'name' => 'link',
          'info' => 
          array (
            'name' => 'Link',
            'description' => 'Defines simple link field types.',
            'core' => '7.x',
            'package' => 'Fields',
            'files' => 
            array (
              0 => 'link.module',
              1 => 'link.install',
              2 => 'tests/link.test',
              3 => 'tests/link.attribute.test',
              4 => 'tests/link.crud.test',
              5 => 'tests/link.crud_browser.test',
              6 => 'tests/link.token.test',
              7 => 'tests/link.validate.test',
              8 => 'views/link_views_handler_argument_target.inc',
              9 => 'views/link_views_handler_filter_protocol.inc',
            ),
            'version' => '7.x-1.0-beta1',
            'project' => 'link',
            'datestamp' => '1317011508',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => '7001',
          'project' => 'link',
          'version' => '7.x-1.0-beta1',
        ),
        'workbench' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/workbench/workbench.module',
          'basename' => 'workbench.module',
          'name' => 'workbench',
          'info' => 
          array (
            'name' => 'Workbench',
            'description' => 'Workbench editorial suite.',
            'package' => 'Workbench',
            'core' => '7.x',
            'configure' => 'admin/config/workbench/settings',
            'dependencies' => 
            array (
              0 => 'views',
            ),
            'version' => '7.x-1.1',
            'project' => 'workbench',
            'datestamp' => '1320263738',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'workbench',
          'version' => '7.x-1.1',
        ),
        'ctools_ajax_sample' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/ctools/ctools_ajax_sample/ctools_ajax_sample.module',
          'basename' => 'ctools_ajax_sample.module',
          'name' => 'ctools_ajax_sample',
          'info' => 
          array (
            'name' => 'Chaos Tools (CTools) AJAX Example',
            'description' => 'Shows how to use the power of Chaos AJAX.',
            'package' => 'Chaos tool suite',
            'dependencies' => 
            array (
              0 => 'ctools',
            ),
            'core' => '7.x',
            'version' => '7.x-1.0-beta1',
            'project' => 'ctools',
            'datestamp' => '1306885315',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'ctools',
          'version' => '7.x-1.0-beta1',
        ),
        'bulk_export' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/ctools/bulk_export/bulk_export.module',
          'basename' => 'bulk_export.module',
          'name' => 'bulk_export',
          'info' => 
          array (
            'name' => 'Bulk Export',
            'description' => 'Performs bulk exporting of data objects known about by Chaos tools.',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'ctools',
            ),
            'package' => 'Chaos tool suite',
            'version' => '7.x-1.0-beta1',
            'project' => 'ctools',
            'datestamp' => '1306885315',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'ctools',
          'version' => '7.x-1.0-beta1',
        ),
        'page_manager' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/ctools/page_manager/page_manager.module',
          'basename' => 'page_manager.module',
          'name' => 'page_manager',
          'info' => 
          array (
            'name' => 'Page manager',
            'description' => 'Provides a UI and API to manage pages within the site.',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'ctools',
            ),
            'package' => 'Chaos tool suite',
            'version' => '7.x-1.0-beta1',
            'project' => 'ctools',
            'datestamp' => '1306885315',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'ctools',
          'version' => '7.x-1.0-beta1',
        ),
        'ctools_custom_content' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/ctools/ctools_custom_content/ctools_custom_content.module',
          'basename' => 'ctools_custom_content.module',
          'name' => 'ctools_custom_content',
          'info' => 
          array (
            'name' => 'Custom content panes',
            'description' => 'Create custom, exportable, reusable content panes for applications like Panels.',
            'core' => '7.x',
            'package' => 'Chaos tool suite',
            'dependencies' => 
            array (
              0 => 'ctools',
            ),
            'version' => '7.x-1.0-beta1',
            'project' => 'ctools',
            'datestamp' => '1306885315',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'ctools',
          'version' => '7.x-1.0-beta1',
        ),
        'views_content' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/ctools/views_content/views_content.module',
          'basename' => 'views_content.module',
          'name' => 'views_content',
          'info' => 
          array (
            'name' => 'Views content panes',
            'description' => 'Allows Views content to be used in Panels, Dashboard and other modules which use the CTools Content API.',
            'package' => 'Chaos tool suite',
            'dependencies' => 
            array (
              0 => 'ctools',
              1 => 'views',
            ),
            'core' => '7.x',
            'files' => 
            array (
              0 => 'plugins/views/views_content_plugin_display_ctools_context.inc',
              1 => 'plugins/views/views_content_plugin_display_panel_pane.inc',
              2 => 'plugins/views/views_content_plugin_style_ctools_context.inc',
            ),
            'version' => '7.x-1.0-beta1',
            'project' => 'ctools',
            'datestamp' => '1306885315',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'ctools',
          'version' => '7.x-1.0-beta1',
        ),
        'ctools_plugin_example' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/ctools/ctools_plugin_example/ctools_plugin_example.module',
          'basename' => 'ctools_plugin_example.module',
          'name' => 'ctools_plugin_example',
          'info' => 
          array (
            'name' => 'Chaos Tools (CTools) Plugin Example',
            'description' => 'Shows how an external module can provide ctools plugins (for Panels, etc.).',
            'package' => 'Chaos tool suite',
            'dependencies' => 
            array (
              0 => 'ctools',
              1 => 'panels',
              2 => 'page_manager',
              3 => 'advanced_help',
            ),
            'core' => '7.x',
            'version' => '7.x-1.0-beta1',
            'project' => 'ctools',
            'datestamp' => '1306885315',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'ctools',
          'version' => '7.x-1.0-beta1',
        ),
        'stylizer' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/ctools/stylizer/stylizer.module',
          'basename' => 'stylizer.module',
          'name' => 'stylizer',
          'info' => 
          array (
            'name' => 'Stylizer',
            'description' => 'Create custom styles for applications such as Panels.',
            'core' => '7.x',
            'package' => 'Chaos tool suite',
            'dependencies' => 
            array (
              0 => 'ctools',
              1 => 'color',
            ),
            'version' => '7.x-1.0-beta1',
            'project' => 'ctools',
            'datestamp' => '1306885315',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'ctools',
          'version' => '7.x-1.0-beta1',
        ),
        'ctools_access_ruleset' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/ctools/ctools_access_ruleset/ctools_access_ruleset.module',
          'basename' => 'ctools_access_ruleset.module',
          'name' => 'ctools_access_ruleset',
          'info' => 
          array (
            'name' => 'Custom rulesets',
            'description' => 'Create custom, exportable, reusable access rulesets for applications like Panels.',
            'core' => '7.x',
            'package' => 'Chaos tool suite',
            'dependencies' => 
            array (
              0 => 'ctools',
            ),
            'version' => '7.x-1.0-beta1',
            'project' => 'ctools',
            'datestamp' => '1306885315',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'ctools',
          'version' => '7.x-1.0-beta1',
        ),
        'ctools_plugin_test' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/ctools/tests/ctools_plugin_test.module',
          'basename' => 'ctools_plugin_test.module',
          'name' => 'ctools_plugin_test',
          'info' => 
          array (
            'name' => 'Chaos tools plugins test',
            'description' => 'Provides hooks for testing ctools plugins.',
            'package' => 'Chaos tool suite',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'ctools',
            ),
            'files' => 
            array (
              0 => 'ctools.plugins.test',
              1 => 'object_cache.test',
            ),
            'hidden' => true,
            'version' => '7.x-1.0-beta1',
            'project' => 'ctools',
            'datestamp' => '1306885315',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'ctools',
          'version' => '7.x-1.0-beta1',
        ),
        'ctools' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/ctools/ctools.module',
          'basename' => 'ctools.module',
          'name' => 'ctools',
          'info' => 
          array (
            'name' => 'Chaos tools',
            'description' => 'A library of helpful tools by Merlin of Chaos.',
            'core' => '7.x',
            'package' => 'Chaos tool suite',
            'files' => 
            array (
              0 => 'includes/context.inc',
              1 => 'includes/math-expr.inc',
              2 => 'includes/stylizer.inc',
            ),
            'version' => '7.x-1.0-beta1',
            'project' => 'ctools',
            'datestamp' => '1306885315',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => '6007',
          'project' => 'ctools',
          'version' => '7.x-1.0-beta1',
        ),
        'block_class' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/block_class/block_class.module',
          'basename' => 'block_class.module',
          'name' => 'block_class',
          'info' => 
          array (
            'name' => 'Block Class',
            'description' => 'Allows assigning CSS classes to blocks.',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'block_class.install',
              1 => 'block_class.module',
            ),
            'version' => '7.x-1.x-dev',
            'project' => 'block_class',
            'datestamp' => '1318637052',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => '7100',
          'project' => 'block_class',
          'version' => '7.x-1.x-dev',
        ),
        'features_test' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/features/tests/features_test.module',
          'basename' => 'features_test.module',
          'name' => 'features_test',
          'info' => 
          array (
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'features',
              1 => 'image',
              2 => 'strongarm',
              3 => 'views',
            ),
            'description' => 'Test module for Features testing.',
            'features' => 
            array (
              'ctools' => 
              array (
                0 => 'strongarm:strongarm:1',
                1 => 'views:views_default:3.0',
              ),
              'field' => 
              array (
                0 => 'node-features_test-field_features_test',
              ),
              'filter' => 
              array (
                0 => 'features_test',
              ),
              'image' => 
              array (
                0 => 'features_test',
              ),
              'node' => 
              array (
                0 => 'features_test',
              ),
              'user_permission' => 
              array (
                0 => 'create features_test content',
              ),
              'views_view' => 
              array (
                0 => 'features_test',
              ),
            ),
            'hidden' => true,
            'name' => 'Features Tests',
            'package' => 'Testing',
            'php' => '5.2.0',
            'version' => '7.x-1.0-beta3',
            'project' => 'features',
            'datestamp' => '1308598915',
          ),
          'schema_version' => 0,
          'project' => 'features',
          'version' => '7.x-1.0-beta3',
        ),
        'features' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/features/features.module',
          'basename' => 'features.module',
          'name' => 'features',
          'info' => 
          array (
            'name' => 'Features',
            'description' => 'Provides feature management for Drupal.',
            'core' => '7.x',
            'package' => 'Features',
            'files' => 
            array (
              0 => 'tests/features.test',
            ),
            'version' => '7.x-1.0-beta3',
            'project' => 'features',
            'datestamp' => '1308598915',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => '6101',
          'project' => 'features',
          'version' => '7.x-1.0-beta3',
        ),
        'views_test' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/views/tests/views_test.module',
          'basename' => 'views_test.module',
          'name' => 'views_test',
          'info' => 
          array (
            'name' => 'Views Test',
            'description' => 'Test module for Views.',
            'package' => 'Views',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'views',
            ),
            'hidden' => true,
            'version' => '7.x-3.0-rc1',
            'project' => 'views',
            'datestamp' => '1308341220',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'views',
          'version' => '7.x-3.0-rc1',
        ),
        'views_export' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/views/views_export/views_export.module',
          'basename' => 'views_export.module',
          'name' => 'views_export',
          'info' => 
          array (
            'dependencies' => 
            array (
            ),
            'description' => '',
            'version' => NULL,
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => '',
          'version' => NULL,
        ),
        'views' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/views/views.module',
          'basename' => 'views.module',
          'name' => 'views',
          'info' => 
          array (
            'name' => 'Views',
            'description' => 'Create customized lists and queries from your database.',
            'package' => 'Views',
            'core' => '7.x',
            'php' => '5.2',
            'stylesheets' => 
            array (
              'all' => 
              array (
                0 => 'css/views.css',
              ),
            ),
            'dependencies' => 
            array (
              0 => 'ctools',
            ),
            'files' => 
            array (
              0 => 'handlers/views_handler_area.inc',
              1 => 'handlers/views_handler_area_text.inc',
              2 => 'handlers/views_handler_area_view.inc',
              3 => 'handlers/views_handler_argument.inc',
              4 => 'handlers/views_handler_argument_date.inc',
              5 => 'handlers/views_handler_argument_formula.inc',
              6 => 'handlers/views_handler_argument_many_to_one.inc',
              7 => 'handlers/views_handler_argument_null.inc',
              8 => 'handlers/views_handler_argument_numeric.inc',
              9 => 'handlers/views_handler_argument_string.inc',
              10 => 'handlers/views_handler_field.inc',
              11 => 'handlers/views_handler_field_counter.inc',
              12 => 'handlers/views_handler_field_boolean.inc',
              13 => 'handlers/views_handler_field_custom.inc',
              14 => 'handlers/views_handler_field_date.inc',
              15 => 'handlers/views_handler_field_markup.inc',
              16 => 'handlers/views_handler_field_math.inc',
              17 => 'handlers/views_handler_field_numeric.inc',
              18 => 'handlers/views_handler_field_prerender_list.inc',
              19 => 'handlers/views_handler_field_time_interval.inc',
              20 => 'handlers/views_handler_field_serialized.inc',
              21 => 'handlers/views_handler_field_url.inc',
              22 => 'handlers/views_handler_filter.inc',
              23 => 'handlers/views_handler_filter_boolean_operator.inc',
              24 => 'handlers/views_handler_filter_boolean_operator_string.inc',
              25 => 'handlers/views_handler_filter_date.inc',
              26 => 'handlers/views_handler_filter_equality.inc',
              27 => 'handlers/views_handler_filter_in_operator.inc',
              28 => 'handlers/views_handler_filter_many_to_one.inc',
              29 => 'handlers/views_handler_filter_numeric.inc',
              30 => 'handlers/views_handler_filter_string.inc',
              31 => 'handlers/views_handler_relationship.inc',
              32 => 'handlers/views_handler_relationship_groupwise_max.inc',
              33 => 'handlers/views_handler_sort.inc',
              34 => 'handlers/views_handler_sort_date.inc',
              35 => 'handlers/views_handler_sort_formula.inc',
              36 => 'handlers/views_handler_sort_menu_hierarchy.inc',
              37 => 'handlers/views_handler_sort_random.inc',
              38 => 'includes/base.inc',
              39 => 'includes/handlers.inc',
              40 => 'includes/plugins.inc',
              41 => 'includes/view.inc',
              42 => 'modules/aggregator/views_handler_argument_aggregator_fid.inc',
              43 => 'modules/aggregator/views_handler_argument_aggregator_iid.inc',
              44 => 'modules/aggregator/views_handler_argument_aggregator_category_cid.inc',
              45 => 'modules/aggregator/views_handler_field_aggregator_title_link.inc',
              46 => 'modules/aggregator/views_handler_field_aggregator_category.inc',
              47 => 'modules/aggregator/views_handler_field_aggregator_item_description.inc',
              48 => 'modules/aggregator/views_handler_field_aggregator_xss.inc',
              49 => 'modules/aggregator/views_handler_filter_aggregator_category_cid.inc',
              50 => 'modules/aggregator/views_plugin_row_aggregator_rss.inc',
              51 => 'modules/comment/views_handler_argument_comment_user_uid.inc',
              52 => 'modules/comment/views_handler_field_comment.inc',
              53 => 'modules/comment/views_handler_field_comment_depth.inc',
              54 => 'modules/comment/views_handler_field_comment_link.inc',
              55 => 'modules/comment/views_handler_field_comment_link_delete.inc',
              56 => 'modules/comment/views_handler_field_comment_link_edit.inc',
              57 => 'modules/comment/views_handler_field_comment_link_reply.inc',
              58 => 'modules/comment/views_handler_field_comment_node_link.inc',
              59 => 'modules/comment/views_handler_field_comment_username.inc',
              60 => 'modules/comment/views_handler_field_ncs_last_comment_name.inc',
              61 => 'modules/comment/views_handler_field_ncs_last_updated.inc',
              62 => 'modules/comment/views_handler_field_node_comment.inc',
              63 => 'modules/comment/views_handler_field_node_new_comments.inc',
              64 => 'modules/comment/views_handler_field_last_comment_timestamp.inc',
              65 => 'modules/comment/views_handler_filter_comment_user_uid.inc',
              66 => 'modules/comment/views_handler_filter_ncs_last_updated.inc',
              67 => 'modules/comment/views_handler_filter_node_comment.inc',
              68 => 'modules/comment/views_handler_sort_comment_thread.inc',
              69 => 'modules/comment/views_handler_sort_ncs_last_comment_name.inc',
              70 => 'modules/comment/views_handler_sort_ncs_last_updated.inc',
              71 => 'modules/comment/views_plugin_row_comment_rss.inc',
              72 => 'modules/comment/views_plugin_row_comment_view.inc',
              73 => 'modules/contact/views_handler_field_contact_link.inc',
              74 => 'modules/field/views_handler_field_field.inc',
              75 => 'modules/field/views_handler_relationship_entity_reverse.inc',
              76 => 'modules/field/views_handler_filter_field_list.inc',
              77 => 'modules/filter/views_handler_field_filter_format_name.inc',
              78 => 'modules/locale/views_handler_argument_locale_group.inc',
              79 => 'modules/locale/views_handler_argument_locale_language.inc',
              80 => 'modules/locale/views_handler_field_locale_group.inc',
              81 => 'modules/locale/views_handler_field_locale_language.inc',
              82 => 'modules/locale/views_handler_field_locale_link_edit.inc',
              83 => 'modules/locale/views_handler_filter_locale_group.inc',
              84 => 'modules/locale/views_handler_filter_locale_language.inc',
              85 => 'modules/locale/views_handler_filter_locale_version.inc',
              86 => 'modules/node/views_handler_argument_dates_various.inc',
              87 => 'modules/node/views_handler_argument_node_language.inc',
              88 => 'modules/node/views_handler_argument_node_nid.inc',
              89 => 'modules/node/views_handler_argument_node_type.inc',
              90 => 'modules/node/views_handler_argument_node_vid.inc',
              91 => 'modules/node/views_handler_argument_node_uid_revision.inc',
              92 => 'modules/node/views_handler_field_history_user_timestamp.inc',
              93 => 'modules/node/views_handler_field_node.inc',
              94 => 'modules/node/views_handler_field_node_link.inc',
              95 => 'modules/node/views_handler_field_node_link_delete.inc',
              96 => 'modules/node/views_handler_field_node_link_edit.inc',
              97 => 'modules/node/views_handler_field_node_revision.inc',
              98 => 'modules/node/views_handler_field_node_revision_link_delete.inc',
              99 => 'modules/node/views_handler_field_node_revision_link_revert.inc',
              100 => 'modules/node/views_handler_field_node_path.inc',
              101 => 'modules/node/views_handler_field_node_type.inc',
              102 => 'modules/node/views_handler_filter_history_user_timestamp.inc',
              103 => 'modules/node/views_handler_filter_node_access.inc',
              104 => 'modules/node/views_handler_filter_node_status.inc',
              105 => 'modules/node/views_handler_filter_node_type.inc',
              106 => 'modules/node/views_handler_filter_node_uid_revision.inc',
              107 => 'modules/node/views_plugin_argument_default_node.inc',
              108 => 'modules/node/views_plugin_argument_validate_node.inc',
              109 => 'modules/node/views_plugin_row_node_rss.inc',
              110 => 'modules/node/views_plugin_row_node_view.inc',
              111 => 'modules/profile/views_handler_field_profile_date.inc',
              112 => 'modules/profile/views_handler_field_profile_list.inc',
              113 => 'modules/profile/views_handler_filter_profile_selection.inc',
              114 => 'modules/search/views_handler_argument_search.inc',
              115 => 'modules/search/views_handler_field_search_score.inc',
              116 => 'modules/search/views_handler_filter_search.inc',
              117 => 'modules/search/views_handler_sort_search_score.inc',
              118 => 'modules/search/views_plugin_row_search_view.inc',
              119 => 'modules/statistics/views_handler_field_accesslog_path.inc',
              120 => 'modules/system/views_handler_argument_file_fid.inc',
              121 => 'modules/system/views_handler_field_file.inc',
              122 => 'modules/system/views_handler_field_file_extension.inc',
              123 => 'modules/system/views_handler_field_file_filemime.inc',
              124 => 'modules/system/views_handler_field_file_uri.inc',
              125 => 'modules/system/views_handler_field_file_status.inc',
              126 => 'modules/system/views_handler_filter_file_status.inc',
              127 => 'modules/taxonomy/views_handler_argument_taxonomy.inc',
              128 => 'modules/taxonomy/views_handler_argument_term_node_tid.inc',
              129 => 'modules/taxonomy/views_handler_argument_term_node_tid_depth.inc',
              130 => 'modules/taxonomy/views_handler_argument_term_node_tid_depth_modifier.inc',
              131 => 'modules/taxonomy/views_handler_argument_vocabulary_vid.inc',
              132 => 'modules/taxonomy/views_handler_argument_vocabulary_machine_name.inc',
              133 => 'modules/taxonomy/views_handler_field_taxonomy.inc',
              134 => 'modules/taxonomy/views_handler_field_term_node_tid.inc',
              135 => 'modules/taxonomy/views_handler_field_term_link_edit.inc',
              136 => 'modules/taxonomy/views_handler_filter_term_node_tid.inc',
              137 => 'modules/taxonomy/views_handler_filter_term_node_tid_depth.inc',
              138 => 'modules/taxonomy/views_handler_filter_vocabulary_vid.inc',
              139 => 'modules/taxonomy/views_handler_filter_vocabulary_machine_name.inc',
              140 => 'modules/taxonomy/views_handler_relationship_node_term_data.inc',
              141 => 'modules/taxonomy/views_plugin_argument_validate_taxonomy_term.inc',
              142 => 'modules/taxonomy/views_plugin_argument_default_taxonomy_tid.inc',
              143 => 'modules/system/views_handler_filter_system_type.inc',
              144 => 'modules/translation/views_handler_argument_node_tnid.inc',
              145 => 'modules/translation/views_handler_field_node_language.inc',
              146 => 'modules/translation/views_handler_field_node_link_translate.inc',
              147 => 'modules/translation/views_handler_field_node_translation_link.inc',
              148 => 'modules/translation/views_handler_filter_node_language.inc',
              149 => 'modules/translation/views_handler_filter_node_tnid.inc',
              150 => 'modules/translation/views_handler_filter_node_tnid_child.inc',
              151 => 'modules/translation/views_handler_relationship_translation.inc',
              152 => 'modules/upload/views_handler_field_upload_description.inc',
              153 => 'modules/upload/views_handler_field_upload_fid.inc',
              154 => 'modules/upload/views_handler_filter_upload_fid.inc',
              155 => 'modules/user/views_handler_argument_user_uid.inc',
              156 => 'modules/user/views_handler_argument_users_roles_rid.inc',
              157 => 'modules/user/views_handler_field_user.inc',
              158 => 'modules/user/views_handler_field_user_language.inc',
              159 => 'modules/user/views_handler_field_user_link.inc',
              160 => 'modules/user/views_handler_field_user_link_cancel.inc',
              161 => 'modules/user/views_handler_field_user_link_edit.inc',
              162 => 'modules/user/views_handler_field_user_mail.inc',
              163 => 'modules/user/views_handler_field_user_name.inc',
              164 => 'modules/user/views_handler_field_user_picture.inc',
              165 => 'modules/user/views_handler_field_user_roles.inc',
              166 => 'modules/user/views_handler_filter_user_current.inc',
              167 => 'modules/user/views_handler_filter_user_name.inc',
              168 => 'modules/user/views_handler_filter_user_roles.inc',
              169 => 'modules/user/views_plugin_argument_default_current_user.inc',
              170 => 'modules/user/views_plugin_argument_default_user.inc',
              171 => 'modules/user/views_plugin_argument_validate_user.inc',
              172 => 'plugins/views_plugin_access.inc',
              173 => 'plugins/views_plugin_access_none.inc',
              174 => 'plugins/views_plugin_access_perm.inc',
              175 => 'plugins/views_plugin_access_role.inc',
              176 => 'plugins/views_plugin_argument_default.inc',
              177 => 'plugins/views_plugin_argument_default_php.inc',
              178 => 'plugins/views_plugin_argument_default_fixed.inc',
              179 => 'plugins/views_plugin_argument_default_raw.inc',
              180 => 'plugins/views_plugin_argument_validate.inc',
              181 => 'plugins/views_plugin_argument_validate_numeric.inc',
              182 => 'plugins/views_plugin_argument_validate_php.inc',
              183 => 'plugins/views_plugin_cache.inc',
              184 => 'plugins/views_plugin_cache_none.inc',
              185 => 'plugins/views_plugin_cache_time.inc',
              186 => 'plugins/views_plugin_display.inc',
              187 => 'plugins/views_plugin_display_attachment.inc',
              188 => 'plugins/views_plugin_display_block.inc',
              189 => 'plugins/views_plugin_display_default.inc',
              190 => 'plugins/views_plugin_display_extender.inc',
              191 => 'plugins/views_plugin_display_feed.inc',
              192 => 'plugins/views_plugin_exposed_form_basic.inc',
              193 => 'plugins/views_plugin_exposed_form.inc',
              194 => 'plugins/views_plugin_exposed_form_input_required.inc',
              195 => 'plugins/views_plugin_display_page.inc',
              196 => 'plugins/views_plugin_localization_core.inc',
              197 => 'plugins/views_plugin_localization.inc',
              198 => 'plugins/views_plugin_localization_none.inc',
              199 => 'plugins/views_plugin_pager.inc',
              200 => 'plugins/views_plugin_pager_full.inc',
              201 => 'plugins/views_plugin_pager_mini.inc',
              202 => 'plugins/views_plugin_pager_none.inc',
              203 => 'plugins/views_plugin_pager_some.inc',
              204 => 'plugins/views_plugin_query.inc',
              205 => 'plugins/views_plugin_query_default.inc',
              206 => 'plugins/views_plugin_row.inc',
              207 => 'plugins/views_plugin_row_fields.inc',
              208 => 'plugins/views_plugin_style.inc',
              209 => 'plugins/views_plugin_style_default.inc',
              210 => 'plugins/views_plugin_style_grid.inc',
              211 => 'plugins/views_plugin_style_list.inc',
              212 => 'plugins/views_plugin_style_jump_menu.inc',
              213 => 'plugins/views_plugin_style_rss.inc',
              214 => 'plugins/views_plugin_style_summary.inc',
              215 => 'plugins/views_plugin_style_summary_jump_menu.inc',
              216 => 'plugins/views_plugin_style_summary_unformatted.inc',
              217 => 'plugins/views_plugin_style_table.inc',
              218 => 'tests/handlers/views_handler_area_text.test',
              219 => 'tests/handlers/views_handler_argument_null.test',
              220 => 'tests/handlers/views_handler_field_boolean.test',
              221 => 'tests/handlers/views_handler_field_custom.test',
              222 => 'tests/handlers/views_handler_field_counter.test',
              223 => 'tests/handlers/views_handler_field_date.test',
              224 => 'tests/handlers/views_handler_field_file_size.test',
              225 => 'tests/handlers/views_handler_field_math.test',
              226 => 'tests/handlers/views_handler_field_url.test',
              227 => 'tests/handlers/views_handler_field_xss.test',
              228 => 'tests/handlers/views_handler_filter_date.test',
              229 => 'tests/handlers/views_handler_filter_equality.test',
              230 => 'tests/handlers/views_handler_filter_in_operator.test',
              231 => 'tests/handlers/views_handler_filter_numeric.test',
              232 => 'tests/handlers/views_handler_filter_string.test',
              233 => 'tests/handlers/views_handler_sort_random.test',
              234 => 'tests/handlers/views_handler_sort_date.test',
              235 => 'tests/handlers/views_handler_sort.test',
              236 => 'tests/test_plugins/views_test_plugin_access_test_dynamic.inc',
              237 => 'tests/test_plugins/views_test_plugin_access_test_static.inc',
              238 => 'tests/views_access.test',
              239 => 'tests/views_analyze.test',
              240 => 'tests/views_basic.test',
              241 => 'tests/views_argument_default.test',
              242 => 'tests/views_argument_validator.test',
              243 => 'tests/views_exposed_form.test',
              244 => 'tests/views_glossary.test',
              245 => 'tests/views_groupby.test',
              246 => 'tests/views_handlers.test',
              247 => 'tests/views_module.test',
              248 => 'tests/views_pager.test',
              249 => 'tests/views_plugin_localization_test.inc',
              250 => 'tests/views_translatable.test',
              251 => 'tests/views_query.test',
              252 => 'tests/views_upgrade.test',
              253 => 'tests/views_test.views_default.inc',
              254 => 'tests/user/views_user_argument_default.test',
              255 => 'tests/user/views_user_argument_validate.test',
              256 => 'tests/user/views_user.test',
              257 => 'tests/views_cache.test',
              258 => 'tests/views_view.test',
              259 => 'tests/views_ui.test',
            ),
            'version' => '7.x-3.0-rc1',
            'project' => 'views',
            'datestamp' => '1308341220',
          ),
          'schema_version' => '7001',
          'project' => 'views',
          'version' => '7.x-3.0-rc1',
        ),
        'views_ui' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/views/views_ui.module',
          'basename' => 'views_ui.module',
          'name' => 'views_ui',
          'info' => 
          array (
            'name' => 'Views UI',
            'description' => 'Administrative interface to views. Without this module, you cannot create or edit your views.',
            'package' => 'Views',
            'core' => '7.x',
            'configure' => 'admin/structure/views',
            'dependencies' => 
            array (
              0 => 'views',
            ),
            'files' => 
            array (
              0 => 'views_ui.module',
              1 => 'plugins/views_wizard/views_ui_base_views_wizard.class.php',
            ),
            'version' => '7.x-3.0-rc1',
            'project' => 'views',
            'datestamp' => '1308341220',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'views',
          'version' => '7.x-3.0-rc1',
        ),
        'special_menu_items' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/special_menu_items/special_menu_items.module',
          'basename' => 'special_menu_items.module',
          'name' => 'special_menu_items',
          'info' => 
          array (
            'name' => 'Special menu items',
            'description' => 'Allow users to add placeholder and/or separator menu items.',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'menu',
            ),
            'configure' => 'admin/config/system/special_menu_items',
            'version' => '7.x-1.0',
            'project' => 'special_menu_items',
            'datestamp' => '1315487824',
            'php' => '5.2.4',
          ),
          'schema_version' => '7000',
          'project' => 'special_menu_items',
          'version' => '7.x-1.0',
        ),
        'site_map' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/site_map/site_map.module',
          'basename' => 'site_map.module',
          'name' => 'site_map',
          'info' => 
          array (
            'name' => 'Site map',
            'description' => 'Display a site map.',
            'core' => '7.x',
            'configure' => 'admin/config/search/sitemap',
            'files' => 
            array (
              0 => 'site_map.admin.inc',
              1 => 'site_map.install',
              2 => 'site_map.module',
              3 => 'site_map.theme.inc',
            ),
            'version' => '7.x-1.0-beta1',
            'project' => 'site_map',
            'datestamp' => '1294253198',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => '7000',
          'project' => 'site_map',
          'version' => '7.x-1.0-beta1',
        ),
        'sharethis' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/sharethis/sharethis.module',
          'basename' => 'sharethis.module',
          'name' => 'sharethis',
          'info' => 
          array (
            'name' => 'ShareThis (Official)',
            'description' => 'This module adds the <a href="http://sharethis.com/">ShareThis</a> widget to your site.',
            'core' => '7.x',
            'package' => 'Sharing',
            'configure' => 'admin/config/sharethis',
            'version' => '7.x-1.1',
            'project' => 'sharethis',
            'datestamp' => '1308855119',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'sharethis',
          'version' => '7.x-1.1',
        ),
        'libraries' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/libraries/libraries.module',
          'basename' => 'libraries.module',
          'name' => 'libraries',
          'info' => 
          array (
            'name' => 'Libraries',
            'description' => 'Allows version dependent and shared usage of external libraries.',
            'core' => '7.x',
            'version' => '7.x-1.0',
            'project' => 'libraries',
            'datestamp' => '1296096156',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'libraries',
          'version' => '7.x-1.0',
        ),
        'context_ui' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/context/context_ui/context_ui.module',
          'basename' => 'context_ui.module',
          'name' => 'context_ui',
          'info' => 
          array (
            'name' => 'Context UI',
            'description' => 'Provides a simple UI for settings up a site structure using Context.',
            'dependencies' => 
            array (
              0 => 'context',
            ),
            'package' => 'Context',
            'core' => '7.x',
            'configure' => 'admin/structure/context',
            'files' => 
            array (
              0 => 'context.module',
              1 => 'tests/context_ui.test',
            ),
            'version' => '7.x-3.0-beta2',
            'project' => 'context',
            'datestamp' => '1315543301',
            'php' => '5.2.4',
          ),
          'schema_version' => '6004',
          'project' => 'context',
          'version' => '7.x-3.0-beta2',
        ),
        'context_layouts' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/context/context_layouts/context_layouts.module',
          'basename' => 'context_layouts.module',
          'name' => 'context_layouts',
          'info' => 
          array (
            'name' => 'Context layouts',
            'description' => 'Allow theme layer to provide multiple region layouts and integrate with context.',
            'dependencies' => 
            array (
              0 => 'context',
            ),
            'package' => 'Context',
            'core' => '7.x',
            'version' => '7.x-3.0-beta2',
            'project' => 'context',
            'datestamp' => '1315543301',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'context',
          'version' => '7.x-3.0-beta2',
        ),
        'context' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/context/context.module',
          'basename' => 'context.module',
          'name' => 'context',
          'info' => 
          array (
            'name' => 'Context',
            'dependencies' => 
            array (
              0 => 'ctools',
            ),
            'description' => 'Provide modules with a cache that lasts for a single page request.',
            'package' => 'Context',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'context.module',
              1 => 'tests/context.test',
              2 => 'tests/context.conditions.test',
              3 => 'tests/context.reactions.test',
            ),
            'version' => '7.x-3.0-beta2',
            'project' => 'context',
            'datestamp' => '1315543301',
            'php' => '5.2.4',
          ),
          'schema_version' => '7000',
          'project' => 'context',
          'version' => '7.x-3.0-beta2',
        ),
        'megamenu' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/megamenu/megamenu.module',
          'basename' => 'megamenu.module',
          'name' => 'megamenu',
          'info' => 
          array (
            'name' => 'Mega Menu',
            'description' => 'Transform any menu into a Megamenu (aka megamenu-dropdown), a jQuery-based menu with third level links grouped under the second level.',
            'package' => 'Menus',
            'dependencies' => 
            array (
              0 => 'menu',
              1 => 'block',
            ),
            'core' => '7.x',
            'configure' => 'admin/config/user-interface/megamenu',
            'version' => '7.x-1.x-dev',
            'project' => 'megamenu',
            'datestamp' => '1303604366',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'megamenu',
          'version' => '7.x-1.x-dev',
        ),
        'search404' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/search404/search404.module',
          'basename' => 'search404.module',
          'name' => 'search404',
          'info' => 
          array (
            'name' => 'Search 404',
            'description' => 'Automatically search for the keywords in URLs that result in 404 errors and show results instead of Page-Not-Found. ',
            'dependencies' => 
            array (
              0 => 'search',
            ),
            'core' => '7.x',
            'files' => 
            array (
              0 => 'search404.module',
              1 => 'search404.install',
            ),
            'configure' => 'admin/config/search/search404',
            'version' => '7.x-1.1',
            'project' => 'search404',
            'datestamp' => '1315489921',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'search404',
          'version' => '7.x-1.1',
        ),
        'help_example' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/advanced_help/help_example/help_example.module',
          'basename' => 'help_example.module',
          'name' => 'help_example',
          'info' => 
          array (
            'name' => 'Advanced help example',
            'description' => 'A example help module to demonstrate the advanced help module.',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'advanced_help',
            ),
            'files' => 
            array (
              0 => 'help_example.module',
            ),
            'version' => '7.x-1.0-beta1',
            'project' => 'advanced_help',
            'datestamp' => '1295293901',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'advanced_help',
          'version' => '7.x-1.0-beta1',
        ),
        'advanced_help' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/advanced_help/advanced_help.module',
          'basename' => 'advanced_help.module',
          'name' => 'advanced_help',
          'info' => 
          array (
            'name' => 'Advanced help',
            'description' => 'Allow advanced help and documentation.',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'advanced_help.module',
              1 => 'advanced_help.install',
            ),
            'version' => '7.x-1.0-beta1',
            'project' => 'advanced_help',
            'datestamp' => '1295293901',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'advanced_help',
          'version' => '7.x-1.0-beta1',
        ),
        'better_exposed_filters' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/better_exposed_filters/better_exposed_filters.module',
          'basename' => 'better_exposed_filters.module',
          'name' => 'better_exposed_filters',
          'info' => 
          array (
            'name' => 'Better Exposed Filters',
            'description' => 'Allow the use of checkboxes or radio buttons for exposed Views filters',
            'core' => '7.x',
            'package' => 'Views',
            'dependencies' => 
            array (
              0 => 'views',
            ),
            'files' => 
            array (
              0 => 'better_exposed_filters.module',
              1 => 'better_exposed_filters.views.inc',
              2 => 'better_exposed_filters_exposed_form_plugin.inc',
              3 => 'better_exposed_filters.theme',
            ),
            'version' => '7.x-3.0-beta1',
            'project' => 'better_exposed_filters',
            'datestamp' => '1312327014',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'better_exposed_filters',
          'version' => '7.x-3.0-beta1',
        ),
        'twitter_signin' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/twitter/twitter_signin/twitter_signin.module',
          'basename' => 'twitter_signin.module',
          'name' => 'twitter_signin',
          'info' => 
          array (
            'name' => 'Twitter Signin',
            'description' => 'Adds support for "Sign in with Twitter"',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'twitter',
              1 => 'oauth_common',
            ),
            'configure' => 'admin/config/services/twitter/signin',
            'version' => NULL,
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => '',
          'version' => NULL,
        ),
        'twitter_post' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/twitter/twitter_post/twitter_post.module',
          'basename' => 'twitter_post.module',
          'name' => 'twitter_post',
          'info' => 
          array (
            'name' => 'Twitter Post',
            'description' => 'Enables posting to twitter',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'twitter',
              1 => 'oauth_common',
            ),
            'version' => NULL,
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => '',
          'version' => NULL,
        ),
        'twitter_actions' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/twitter/twitter_actions/twitter_actions.module',
          'basename' => 'twitter_actions.module',
          'name' => 'twitter_actions',
          'info' => 
          array (
            'name' => 'Twitter actions',
            'description' => 'Exposes Drupal actions to send Twitter messages.',
            'core' => '7.x',
            'dependencies' => 
            array (
              0 => 'twitter',
              1 => 'oauth_common',
            ),
            'version' => NULL,
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => '',
          'version' => NULL,
        ),
        'twitter' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/twitter/twitter.module',
          'basename' => 'twitter.module',
          'name' => 'twitter',
          'info' => 
          array (
            'name' => 'Twitter',
            'description' => 'Adds integration with the Twitter microblogging service.',
            'php' => '5.1',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'twitter.lib.php',
              1 => 'twitter_views_field_handlers.inc',
              2 => 'tests/core.test',
              3 => 'tests/input_filters.test',
            ),
            'configure' => 'admin/config/services/twitter',
            'dependencies' => 
            array (
            ),
            'version' => NULL,
          ),
          'schema_version' => 0,
          'project' => '',
          'version' => NULL,
        ),
        'token_test' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/token/tests/token_test.module',
          'basename' => 'token_test.module',
          'name' => 'token_test',
          'info' => 
          array (
            'name' => 'Token Test',
            'description' => 'Testing module for token functionality.',
            'package' => 'Testing',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'token_test.module',
            ),
            'hidden' => true,
            'version' => '7.x-1.0-beta5',
            'project' => 'token',
            'datestamp' => '1314804722',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'token',
          'version' => '7.x-1.0-beta5',
        ),
        'token' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/token/token.module',
          'basename' => 'token.module',
          'name' => 'token',
          'info' => 
          array (
            'name' => 'Token',
            'description' => 'Provides a user interface for the Token API and some missing core tokens.',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'token.module',
              1 => 'token.install',
              2 => 'token.tokens.inc',
              3 => 'token.pages.inc',
              4 => 'token.test',
            ),
            'version' => '7.x-1.0-beta5',
            'project' => 'token',
            'datestamp' => '1314804722',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => '7001',
          'project' => 'token',
          'version' => '7.x-1.0-beta5',
        ),
        'fb_social' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/fb_social/fb_social.module',
          'basename' => 'fb_social.module',
          'name' => 'fb_social',
          'info' => 
          array (
            'name' => 'fb social',
            'description' => 'Provides integration with Facebook social plugins',
            'dependencies' => 
            array (
              0 => 'ctools',
            ),
            'package' => 'Facebook Social Plugins',
            'core' => '7.x',
            'configure' => 'admin/config/user-interface/fb_social',
            'files' => 
            array (
              0 => 'plugins/export_ui/fb_social_ctools_export_ui.inc',
            ),
            'version' => NULL,
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => '',
          'version' => NULL,
        ),
        'transliteration' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/transliteration/transliteration.module',
          'basename' => 'transliteration.module',
          'name' => 'transliteration',
          'info' => 
          array (
            'name' => 'Transliteration',
            'description' => 'Converts non-latin text to US-ASCII and sanitizes file names.',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'transliteration.module',
              1 => 'transliteration.inc',
              2 => 'transliteration.admin.inc',
              3 => 'transliteration.install',
            ),
            'version' => '7.x-3.0-alpha1',
            'project' => 'transliteration',
            'datestamp' => '1279288507',
            'dependencies' => 
            array (
            ),
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'transliteration',
          'version' => '7.x-3.0-alpha1',
        ),
        'calendar_ical' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/calendar/calendar_ical/calendar_ical.module',
          'basename' => 'calendar_ical.module',
          'name' => 'calendar_ical',
          'info' => 
          array (
            'name' => 'Calendar iCal',
            'description' => 'Adds ical feeds to views.',
            'dependencies' => 
            array (
              0 => 'views',
              1 => 'date_api',
              2 => 'date_views',
              3 => 'calendar',
            ),
            'package' => 'Date/Time',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'calendar_ical.install',
              1 => 'calendar_ical.module',
              2 => 'calendar_plugin_style_ical.inc',
              3 => 'calendar_plugin_row_ical_node.inc',
              4 => 'calendar-style-ical.tpl.php',
              5 => 'calendar-row-ical-node.tpl.php',
              6 => 'theme.inc',
            ),
            'version' => '7.x-3.x-dev',
            'project' => 'calendar',
            'datestamp' => '1321704196',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'calendar',
          'version' => '7.x-3.x-dev',
        ),
        'calendar' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/calendar/calendar.module',
          'basename' => 'calendar.module',
          'name' => 'calendar',
          'info' => 
          array (
            'name' => 'Calendar',
            'description' => 'Views plugin to display views containing dates as Calendars.',
            'dependencies' => 
            array (
              0 => 'views',
              1 => 'date_api',
              2 => 'date_views',
            ),
            'package' => 'Date/Time',
            'core' => '7.x',
            'stylesheets' => 
            array (
              'all' => 
              array (
                0 => 'css/calendar_multiday.css',
              ),
            ),
            'files' => 
            array (
              0 => 'calendar.install',
              1 => 'calendar.module',
              2 => 'includes/calendar.views.inc',
              3 => 'includes/calendar_plugin_style.inc',
              4 => 'includes/calendar_plugin_row_node.inc',
              5 => 'theme/theme.inc',
              6 => 'theme/calendar-style.tpl.php',
              7 => 'theme/calendar-row-node.tpl.php',
            ),
            'version' => '7.x-3.x-dev',
            'project' => 'calendar',
            'datestamp' => '1321704196',
            'php' => '5.2.4',
          ),
          'schema_version' => '7000',
          'project' => 'calendar',
          'version' => '7.x-3.x-dev',
        ),
        'simplenews_test' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/simplenews/simplenews_test/simplenews_test.module',
          'basename' => 'simplenews_test.module',
          'name' => 'simplenews_test',
          'info' => 
          array (
            'name' => 'Simplenews test',
            'description' => 'Simplenews helper module for automated simplenews tests.',
            'dependencies' => 
            array (
              0 => 'simplenews',
            ),
            'package' => 'Testing',
            'hidden' => true,
            'core' => '7.x',
            'files' => 
            array (
              0 => 'simplenews_test.install',
              1 => 'simplenews_test.module',
            ),
            'version' => '7.x-1.x-dev',
            'project' => 'simplenews',
            'datestamp' => '1318853872',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'simplenews',
          'version' => '7.x-1.x-dev',
        ),
        'simplenews_action' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/simplenews/simplenews_action/simplenews_action.module',
          'basename' => 'simplenews_action.module',
          'name' => 'simplenews_action',
          'info' => 
          array (
            'name' => 'Simplenews action',
            'description' => 'Provide actions for Simplenews.',
            'dependencies' => 
            array (
              0 => 'simplenews',
              1 => 'trigger',
            ),
            'package' => 'Mail',
            'core' => '7.x',
            'files' => 
            array (
              0 => 'simplenews_action.module',
            ),
            'version' => '7.x-1.x-dev',
            'project' => 'simplenews',
            'datestamp' => '1318853872',
            'php' => '5.2.4',
          ),
          'schema_version' => 0,
          'project' => 'simplenews',
          'version' => '7.x-1.x-dev',
        ),
        'simplenews' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/modules/contrib/simplenews/simplenews.module',
          'basename' => 'simplenews.module',
          'name' => 'simplenews',
          'info' => 
          array (
            'name' => 'Simplenews',
            'description' => 'Send newsletters to subscribed email addresses.',
            'package' => 'Mail',
            'core' => '7.x',
            'configure' => 'admin/config/simplenews',
            'dependencies' => 
            array (
              0 => 'taxonomy',
            ),
            'files' => 
            array (
              0 => 'includes/views/handlers/simplenews_handler_field_newsletter_status.inc',
              1 => 'includes/views/handlers/simplenews_handler_field_newsletter_priority.inc',
              2 => 'includes/views/handlers/simplenews_handler_field_category_hyperlinks.inc',
              3 => 'includes/views/handlers/simplenews_handler_field_category_new_account.inc',
              4 => 'includes/views/handlers/simplenews_handler_field_category_opt_inout.inc',
              5 => 'includes/views/handlers/simplenews_handler_filter_newsletter_status.inc',
              6 => 'includes/views/handlers/simplenews_handler_filter_newsletter_priority.inc',
              7 => 'includes/views/handlers/simplenews_handler_filter_category_hyperlinks.inc',
              8 => 'includes/views/handlers/simplenews_handler_filter_category_new_account.inc',
              9 => 'includes/views/handlers/simplenews_handler_filter_category_opt_inout.inc',
            ),
            'version' => '7.x-1.x-dev',
            'project' => 'simplenews',
            'datestamp' => '1318853872',
            'php' => '5.2.4',
          ),
          'schema_version' => '7001',
          'project' => 'simplenews',
          'version' => '7.x-1.x-dev',
        ),
      ),
      'themes' => 
      array (
        'starterd7' => 
        array (
          'filename' => '/var/aegir/platforms/corporative_site/profiles/corporative_site/themes/starterd7/starterd7.info',
          'basename' => 'starterd7.info',
          'name' => 'Nombre proyecto',
          'info' => 
          array (
            'name' => 'Nombre proyecto',
            'description' => 'Tema personalizado para ..., creado por ideup!',
            'version' => '1.0',
            'core' => '7.x',
            'screenshot' => 'img/screenshot.png',
            'features' => 
            array (
              0 => 'name',
              1 => 'favicon',
              2 => 'main_menu',
              3 => 'secondary_menu',
            ),
            'stylesheets' => 
            array (
              'all' => 
              array (
                0 => 'css/reset.css',
                1 => 'css/styles.css',
              ),
            ),
            'scripts' => 
            array (
              0 => 'js/scripts.js',
            ),
            'regions' => 
            array (
              'page_top' => 'Page top',
              'header' => 'Header',
              'help' => 'Help',
              'highlighted' => 'Highlighted content',
              'content' => 'Main content',
              'sidebar_first' => 'Sidebar',
              'footer' => 'Footer',
              'page_bottom' => 'Page bottom',
            ),
            'layouts' => 
            array (
              'default' => 
              array (
                'name' => 'Left sidebar (default)',
                'description' => 'Content with left sidebar',
                'template' => 'page',
                'regions' => 
                array (
                  0 => 'page_top',
                  1 => 'header',
                  2 => 'help',
                  3 => 'highlighted',
                  4 => 'sidebar_first',
                  5 => 'content',
                  6 => 'footer',
                  7 => 'page_bottom',
                ),
              ),
            ),
          ),
          'project' => '',
          'version' => '1.0',
        ),
      ),
    ),
    'standard' => 
    array (
      'modules' => 
      array (
      ),
      'themes' => 
      array (
      ),
    ),
    'minimal' => 
    array (
      'modules' => 
      array (
      ),
      'themes' => 
      array (
      ),
    ),
  ),
);