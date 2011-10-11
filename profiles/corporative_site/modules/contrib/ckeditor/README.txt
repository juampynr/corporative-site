
CONTENTS OF THIS FILE
---------------------

 * Overview
 * Required Components
 * More Information and License
 * Requirements
 * Installation / Configuration
 * Troubleshooting Installation
 * Plugins: Pagebreak
 * Plugins: MediaEmbed
 * Plugins: IMCE
 * Uploading Images and Files
 * Installing CKFinder
 * Setting up Filters
 * Help & Contribution
 * Credits

Overview
--------
This module allows Drupal to replace textarea fields with CKEditor.
This HTML rich text editor brings many of the powerful functions of well-known
desktop word processors like Microsoft Word or OpenOffice Writer to the Web.
CKEditor is a lightweight solution that does not require any kind of installation on the client computer.

Required Components
-------------------
To use CKEditor in Drupal, you will need to download CKEditor from the product website:
http://ckeditor.com/

More Information and Licence
----------------------------
CKEditor - The text editor for the Internet
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.

Licensed under the terms of the GNU Lesser General Public License:
    http://www.opensource.org/licenses/lgpl-license.php

For further information visit:
    http://ckeditor.com/
    http://drupal.ckeditor.com

Requirements
------------
  - Drupal 7.x
  - PHP 5.2 or higher
  - CKEditor 3.4 or higher (http://ckeditor.com/)

Installation / Configuration
----------------------------
Note: these instructions assume that you install CKEditor in the 
      "sites/all/modules" directory (recommended).

   1. Unzip the files to the "sites/all/modules" directory. It should now
      contain a "ckeditor" directory.
   2. Download CKEditor from http://ckeditor.com/download. Unzip the
      contents of the "ckeditor" directory from the installation package to the
      "sites/all/modules/ckeditor/ckeditor" or "sites/all/libraries/ckeditor" directory.
      Note: you can skip uploading "_samples" and "_source" folders.
   3. Enable the module in the "Administration panel > Modules > User Interface" section.
   4. Grant permissions for using CKEditor in the
      "Administration panel > People > Permissions" section.
      Note: to enable the file browser, read the
            "Installing CKFinder" section.
   5. Adjust CKEditor profiles in the
      "Administration panel > Configuration > Content Authoring > CKEditor" section.
      Profiles determine what options are available to users based on the input format system.
   6. For the Rich Text Editing to work you also need to configure your filters
      for the users that may access Rich Text Editing.
      Either grant those users Full HTML access or use the following tags:
      <a> <p> <span> <div> <h1> <h2> <h3> <h4> <h5> <h6> <img> <map> <area> <hr>
      <br> <br /> <ul> <ol> <li> <dl> <dt> <dd> <table> <tr> <td> <em> <b> <u> <i> <strong>
      <del> <ins> <sub> <sup> <quote> <blockquote> <pre> <address> <code>
      <cite> <embed> <object> <param> <strike> <caption> <tbody>
      To make copying the list easier, below all tags were placed in one line:
      <a> <p> <span> <div> <h1> <h2> <h3> <h4> <h5> <h6> <img> <map> <area> <hr> <br> <br /> <ul> <ol> <li> <dl> <dt> <dd> <table> <tr> <td> <em> <b> <u> <i> <strong> <del> <ins> <sub> <sup> <quote> <blockquote> <pre> <address> <code> <cite> <embed> <object> <param> <strike> <caption> <tbody>
      If you are going to use CKEditor with Filtered HTML input format,
      please read also the "Setting up filters" section.
   7. To have better control over line breaks, you may disable the Line break converter
      for a given Text format in the "Administration panel > Configuration > Content authoring > Text formats" section (recommended).
   8. Modify the ckeditor.config.js file to customize it to your needs (optional).
      Configuration options are available here: 
      http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html
      Developer's documentation for CKEditor:
      http://docs.cksource.com/CKEditor_3.x/Developers_Guide
      WARNING: Remember to clear the browser cache after you modify any of the JavaScript files.
      If you skip this step, you may notice that the browser is ignoring all your changes.


Troubleshooting Installation
----------------------------
If CKEditor does not appear on the page, check if all files were 
extracted correctly.

The "/modules/ckeditor/ckeditor/" or "/libraries/ckeditor" directory should contain the following files:
ckeditor.js, config.js, contents.css 
and directories: "skins", "themes", "lang", "images"

Alternatively the "sites/all/libraries/ckeditor" directory can be used. The module automatically recognizes a proper path to the editor files. The "libraries" directory is the default path when drush is used to download editor's JavaScript.  

The correct directory structure is as follows:
modules               <dir>
   ckeditor           <dir>
      ckeditor.module
      ckeditor.admin.inc
      ...
      ckeditor        <dir>
         _source      <dir>
         images       <dir>
         lang         <dir>
         plugins      <dir>
         skins        <dir>
         themes       <dir>
         COPY_HERE.txt
         ckeditor.js
         ...

If you are still experiencing problems, scroll down to the "Help & Contribution" section.

Plugins: Pagebreak
------------------
By default, the CKEditor module includes a plugin that can handle pagebreaks (<!--pagebreak-->).
The plugin is enabled automatically.

   1. To add 'DrupalPageBreak' buttons to the toolbar, adjust CKEditor profiles in the "Administration panel > Configuration > Content Authoring > CKEditor" section. 
      For each profile you can add the 'DrupalPageBreak' button in the "Editor apperance > Toolbar" section.
      For example if you have a toolbar with an array of buttons defined as follows:

      ['Link','Unlink','Anchor']

      simply add the 'DrupalPageBreak' button at the end of the array (or somewhere in the middle):

      ['Link','Unlink','DrupalPageBreak','Anchor']

      (remember about single quotes).

   2. Note that by default the <!--pagebreak--> tag is not supported in Drupal.
      You should install the Paging module: http://drupal.org/project/paging
      to enable the <!--pagebreak--> tag support. Please refer to the Paging
      module documentation for detailed installation instructions.

Plugins: MediaEmbed
-------------------
MediaEmbed is a simple plugin that can be helpful when embedding YouTube movies and similar elements.
To enable the MediaEmbed plugin, adjust CKEditor profiles in the "Administration panel > Configuration > Content Authoring > CKEditor" section.
For each profile you can enable the 'MediaEmbed' plugin in the "Editor apperance > Plugins" section.

Plugins: IMCE
-------------
CKEditor includes an IMCE plugin that adds a button opening IMCE in a new window.
This might be helpful if you want to avoid having to open the Image Dialog and then clicking the "Browse Server" button. 
Instead of that you can open IMCE with a single mouse click. 

To enable the IMCE plugin, do the following:

   1. To enable plugin and add 'IMCE' buttons to the toolbar, adjust CKEditor profiles in the "Administration panel > Configuration > Content Authoring > CKEditor" section.
      For each profile you can enable the 'IMCE' plugin in the "Editor apperance > Plugins" section.
      After this add the 'IMCE' button in the "Editor apperance > Toolbar" section.
      For example if you have a toolbar with an array of buttons defined as follows:

      ['Link','Image']

      simply add the 'IMCE' button at the end of the array (or somewhere in the middle):

      ['Link','Image','IMCE']

      (remember about single quotes).

Uploading Images and Files
--------------------------
There are two ways of uploading files: by using a commercial file browser like CKFinder (http://ckfinder.com) or by using modules like IMCE.

To select a preferred file browser, adjust
CKEditor profiles in the "Administration panel > Configuration > Content Authoring > CKEditor" section. 
In the "File browser settings" section you can choose which file browser will be used for each profile.
Note: to choose the upload module, you should install an appropriate Drupal module first.

Installing CKFinder
-------------------
CKFinder is an AJAX-based file manager created by CKEditor developers: http://ckfinder.com/.

   1. Download CKFinder for PHP: http://ckfinder.com/download
   2. Unpack CKFinder to the directory containing the CKEditor module into the 
      "sites/all/modules/ckeditor/ckfinder" folder.
      The correct directory structure is as follows:

      modules               <dir>
         ckeditor           <dir>
            ckeditor.module
            ckeditor.admin.inc
            ...
            ckfinder        <dir>
               core         <dir>
               ckfinder.php
               config.php
               ...
            ckeditor        <dir>
               _source      <dir>
               images       <dir>
               ckeditor.js
               ...

   3. Grant "allow CKFinder file uploads" permission in the "Administration panel > People > Permissions" section.
      Note: if you do not see such permission, it means that CKEditor did not find CKFinder
      and you have probably uploaded CKFinder into wrong directory.
   4. Open the CKFinder configuration file (sites/all/modules/ckeditor/ckfinder/config.php) and do the following:

      I) remove the CheckAuthentication() function:
        (do not worry, this function is defined in filemanager.config.php, see below)

        function CheckAuthentication()       <- remove it
        {                                    <- remove it
           //WARNING : DO NOT simply...      <- remove it
           ...                               <- remove it
           return false;                     <- remove it
        }                                    <- remove it

      II) add:

        require_once '../../../../includes/filemanager.config.php';

        straight below the following line:

        $baseDir = resolveUrl($baseUrl);

   5. Open the Drupal settings file (sites/default/settings.php) and do the following:

      I) uncomment the $base_url variable and the set base URL of your website (without trailing slash)

      II) uncomment the $cookie_domain variable and set the domain name of your website

   6. Select CKFinder as preferred file browser in the "Administration panel > Configuration > Content Authoring > CKEditor" section 
      (for a selected CKEditor profile scroll down to the "File browser settings" section).
      In the "File browser settings" section you may also change destination folders for files uploaded with CKFinder.

Setting up Filters
------------------
In the "Administration panel > Configuration > Content Authoring > Text fromats" section, Filtered HTML is the default filter.
Due to security reasons, enabling Full HTML is only an option for trusted users.
To take the full advantage of using CKEditor, you can extend the list of allowed tags in 
HTML filter that is enabled in Filtered HTML input format.
If you do not do this, you may notice that a page created in CKEditor looks different after saving.

Unfortunately, even if you extend the list of allowed tags, one problem still occurs: 
Filtered HTML not only strips disallowed tags, but also strips inline style definitions. 
Basically, it means that you are unable to apply different font color, size, family, align images etc. 
using CKEditor out of the box. You can solve this problem by creating another input format 
that will work in a similar way as Filtered HTML (will only allow specified tags), 
but in a much better way - i.e. it will not strip inline styles used by CKEditor when 
formatting text or images after the page is saved.
To create such an input format, you will need an HTML filter.
The most popular module that provide a HTML filter:

 - HTML Purifier - the most popular and powerful, although according to some claims it might be a bit slow
   http://drupal.org/project/htmlpurifier (no Drupal 7 support yet)

It is up to you to decide which one to use. Just make sure that you will only allow to use proper 
inline styles, tags, and attributes.
See also http://drupal.ckeditor.com/filters for the latest version of this instruction.

Updating Instructions (CKEditor)
---------------------------------
This instruction assumes that you are upgrading the CKEditor module [M] and CKEditor (the editor) [E] at the same time. 
Instructions specific for module upgrades are tagged with [M]. Steps that must be taken when upgrading CKEditor (the editor) are marked with [E].

   1. [M] Download the latest version of the CKEditor module from http://drupal.org/project/ckeditor (it is advised to read the release notes before going further).
   2. [E] Download the latest version of CKEditor from http://ckeditor.com/download (it is advised to read the "what's new" page before going further: http://ckeditor.com/whatsnew).
   3. [M] Back up your database.
   4. [EM] Place the site in "Off-line" mode, to let the database updates run without interruption and to avoid displaying errors to end users of the site.
   5. [E] If you are using CKFinder, make sure you will not delete it, and move it to a safe place.
   6. [E] If you introduced any changes (e.g. own toolbar definitions etc.) in the sites/all/modules/ckeditor/ckeditor.config.js (or sites/all/modules/ckeditor/ckeditor/config.js) file, write down your changes and add them again after uploading new files. 
          In general, try to avoid making any changes to CKEditor's config.js file and add everything to the ckeditor.config.js file.
   7. Delete old files:
      [EM]* Simply remove the "modules/ckeditor" directory if upgrading both the editor and the module. 
      [M] If you are upgrading the module only, remember to leave the "modules/ckeditor/ckeditor" directory. 
      [E] When upgrading the editor, remove the contents of the "modules/ckeditor/ckeditor" directory only.
      WARNING: If you do not remove old files and just rename the "ckeditor" directory instead e.g. to "ckeditor_old", Drupal may use the module from the "ckeditor_old" directory.
   8. [M] Upload the CKEditor module (extracted files and folders) to the "sites/all/modules" directory.
   9. [E] Upload CKEditor (extracted files and folders from the "ckeditor" directory) to "sites/modules/ckeditor/ckeditor" (i.e. where COPY HERE.txt file exists).
   10. [E] Restore the CKFinder  files from where you copied them (see step 5).
   11. [E] Apply your modifications to default configuration in ckeditor.config.js file (see step 6).
   12. [M] Run update.php.
   13. [EM] Put the site back online.
   
Help & Contribution
-------------------
If you are looking for more information, have any troubles in configuration or if
you found an issue, please visit the official project page:
  http://drupal.org/project/ckeditor

Having problems? Take a look at the list of common problems when installing CKEditor:
  http://drupal.ckeditor.com/troubleshooting
You might also check the TROUBLESHOOTING.txt file attached to this module. Note, however, 
that the online version is always up to date.

Learn how to adjust CKEditor to your theme and configure the spellchecker:
  http://drupal.ckeditor.com/tricks

If you would like to help in the development of the module, we encourage you to join our team.
If you are willing to translate the CKEditor module, please use the ckeditor.pot file (located in the "translations" directory) as a template and send us the translated file so that we could attach it.
Any help will be greatly appreciated.

Credits
-------
 - CKEditor for Drupal is currently maintained by the CKEditor team and Jorrit Schippers.
     http://ckeditor.com/

 - CKEditor - The text editor for the Internet
     Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
     http://cksource.com/
