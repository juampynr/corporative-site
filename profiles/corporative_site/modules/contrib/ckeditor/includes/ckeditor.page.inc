<?php

/**
 * CKEditor - The text editor for the Internet - http://ckeditor.com
 * Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * @file
 * CKEditor Module for Drupal 7.x
 *
 * This module allows Drupal to replace textarea fields with CKEditor.
 *
 * This HTML text editor brings to the web many of the powerful functionalities
 * of known desktop editors like Word. It's really  lightweight and doesn't
 * require any kind of installation on the client computer.
 */
function ckeditor_help_delegate($path, $arg) {
    global $base_url;
    switch ($path) {
        case 'admin/config/content/help#description':
            $output = t('Enables the usage of CKEditor (WYSIWYG editor) instead of plain text fields.');
            break;

        case 'admin/config/content/ckeditor/edit/%':
        case 'admin/config/content/ckeditor/add':
            $output = '<p>' . t('CKEditor is highly configurable. The most commonly used features are listed below. You can also customize CKEditor to your needs by changing the configuration file: %ckeditor_module_config.',
                            array(
                                '%ckeditor_module_config' => ckeditor_path(true) . '/ckeditor.config.js',
                    )) . '</p>';
            $output .= '<p>' . t('It is advised to not edit the configuration file that is distributed with CKEditor: %ckeditor_config_file (%ckeditor_config_path) because you may overwrite it accidentally when you update the editor.',
                            array(
                                '%ckeditor_config_path' => ckeditor_path(true) . '/ckeditor/config.js',
                                '%ckeditor_config_file' => 'config.js',
                    )) . '</p>';
            break;

        case 'admin/config/content/ckeditor/editg':
        case 'admin/config/content/ckeditor/add':
            $output = '<p>' . t('The Global Profile allows you to define settings that are common for all profiles. Values defined in other profiles will be appended to the global configuration. This way you can avoid repeating some of the settings that are usually the same in each profile.') . '</p>';
            break;

        case 'admin/config/content/ckeditor':
            $output =
                    '<div style="padding:10px;border:1px solid #BEBFB9;margin-bottom:10px;"><p>' . t('The CKEditor module allows Drupal to replace textarea fields with CKEditor. CKEditor is a text editor to be used inside web pages. It\'s a !wysiwyg editor, which means that the text being edited on it looks as similar as possible to the results users have when publishing it. It brings to the web common editing features found on desktop editing applications like Microsoft Word and OpenOffice.',
                            array(
                                '!wysiwyg' => '<acronym title="' . t('What You See Is What You Get') . '">' . t('WYSIWYG') . '</acronym>',
                    )) . '</p>' .
                    '<p>' . t('Useful links: !ckeditorlink | !devguidelink | !userguidelink.',
                            array(
                                '!ckeditorlink' => l(t('CKEditor web site'), 'http://ckeditor.com'),
                                '!devguidelink' => l(t('Developer\'s Guide'), 'http://docs.cksource.com/CKEditor_3.x/Developers_Guide'),
                                '!userguidelink' => l(t('User\'s Guide'), 'http://docs.cksource.com/CKEditor_3.x/Users_Guide')
                    )) . '</p></div>' .
                    '<p>' . t('Profiles are linked with input format types. A CKEditor profile defines what buttons are available in the editor, how the editor is displayed, and a few other editor functions. The Global Profile holds some general information about CKEditor.') . '</p>';
            break;

        case 'admin/help#ckeditor':
            $output = '<h3>' . t('Introduction') . '</h3>';
            $output .= '<p>' . t('The CKEditor module allows Drupal to replace textarea fields with CKEditor. CKEditor is a text editor to be used inside web pages. It\'s a !wysiwyg editor, which means that the text being edited on it looks as similar as possible to the results users have when publishing it. It brings to the web common editing features found on desktop editing applications like Microsoft Word and OpenOffice.',
                            array(
                                '!wysiwyg' => '<acronym title="' . t('What You See Is What You Get') . '">' . t('WYSIWYG') . '</acronym>',
                    )) . '</p>';
            $output .= '<p>' . t('Useful links: !ckeditorlink | !devguidelink | !userguidelink.',
                            array(
                                '!ckeditorlink' => l(t('CKEditor web site'), 'http://ckeditor.com'),
                                '!devguidelink' => l(t('Developer\'s Guide'), 'http://docs.cksource.com/CKEditor_3.x/Developers_Guide'),
                                '!userguidelink' => l(t('User\'s Guide'), 'http://docs.cksource.com/CKEditor_3.x/Users_Guide')
                                )) . '</p>';
            $output .= '<h4>' . t('Configuration') . '</h4>';
            $output .= '<ol>';
            $output .= '<li>' . t('Go to the !ckeditorlink and download the latest version of CKEditor. Then uncompress the contents of the ckeditor directory of the downloaded file to %ckeditordir (or into sites/all/libriaries/ckeditor).',
                            array(
                                '!ckeditorlink' => l(t('CKEditor homepage'), 'http://ckeditor.com/download'),
                                '%ckeditordir' => base_path() . drupal_get_path('module', 'ckeditor') . '/ckeditor/',
                    )) . '</li>';
            $output .= '<li>' . t('Enable the module as usual from Drupal\'s admin pages.') . '</li>';
            $output .= '<li>' . t('Under !adminpath, adjust the ckeditor profiles. Profiles determine what options are available to users based on input format system.',
                            array(
                                '!adminpath' => l(t('Administration panel') . ' > ' . t('Configuration') . ' > ' . t('Content Authoring') . ' > ' . t('CKEditor'), 'admin/config/content/ckeditor'),
                    )) . '</li>';
            $output .= '<li>' . t('For the Rich Text Editing to work you also need to configure your !filterlink for the users that may access Rich Text Editing. Either grant those users Full HTML access or use the following list of tags in the HTML filter:',
                            array(
                                '!filterlink' => l(t('filters'), 'admin/config/content/formats'),
                    )) .
                    '<br /><code>' . htmlspecialchars('<a> <p> <span> <div> <h1> <h2> <h3> <h4> <h5> <h6> <img> <map> <area> <hr> <br> <br /> <ul> <ol> <li> <dl> <dt> <dd> <table> <tr> <td> <em> <b> <u> <i> <strong> <font> <del> <ins> <sub> <sup> <quote> <blockquote> <pre> <address> <code> <cite> <embed> <object> <param> <strike> <caption>') . '</code><br />';
            $output .= t('If you\'re going to use CKEditor with Filtered HTML input format, please read also "Setting up filters" section in !readme',
                            array(
                                '!readme' => l(t('README.txt'), $base_url . '/' . drupal_get_path('module', 'ckeditor') . '/README.txt', array('absolute' => TRUE))
                    )) . '</li>';
            $output .= '<li>' . t('To have a better control over line breaks, you should disable %settingname in the chosen Text format (recommended).',
                            array(
                                '%settingname' => t('Line break converter'),
                    )) . '</li>';
            $output .= '<li>' . t('Modify the %ckconfig file to your custom needs (optional). Available configuration settings are available in the !apidocs.',
                            array(
                                '%ckconfig' => base_path() . drupal_get_path('module', 'ckeditor') . '/ckeditor/ckeditor.config.js',
                                '!apidocs' => l(t('API documentation'), 'http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html')
                    )) . '</li>';
            $output .= '</ol>';

            $output .= '<h3>' . t('Troubleshooting') . '</h3>';
            $output .= '<p>';
            $output .= t('Take a look at !listlink when installing CKEditor.',
                            array(
                                '!listlink' => l(t('the list of common problems'), 'http://drupal.ckeditor.com/troubleshooting')
                    ));
            $output .= ' ' . t('If you are looking for more information, have any trouble in configuration or if you found an issue, please visit the !officiallink.', array('!officiallink' => l(t('official project page'), 'http://drupal.org/project/ckeditor')));
            $output .= ' ' . t('More information about how to tune up CKEditor for your theme can be found !herelink.', array('!herelink' => l(t('here'), 'http://drupal.ckeditor.com/tricks')));
            $output .= '</p>';

            $output .= '<h3>' . t('Uploading images and files') . '</h3>';
            $output .= '<p>' . t('There are three ways for uploading files:') . '</p>';
            $output .= '<ol>';
            $output .= '<li>' . t('By using !ckfinder (commercial).',
                            array(
                                '!ckfinder' => l(t('CKFinder'), 'http://ckfinder.com'),
                    )) . '</li>';
            $output .= '<li>' . t('By using a module like !imcelink.',
                            array(
                                '!imcelink' => l(t('IMCE'), 'http://drupal.org/project/imce')
                    )) . '</li>';
            $output .= '<li>' . t('By using the core upload module.') . '</li>';
            $output .= '</ol>';

            break;
    }
    return!empty($output) ? $output : '';
}

/**
 * AJAX callback - XSS filter
 */
function ckeditor_filter_xss() {
    $GLOBALS['devel_shutdown'] = FALSE;
    
    if (!isset($_POST['text']) || !is_string($_POST['text']) || !is_array($_POST['filters']) || !isset($_POST['input_format']) || !is_string($_POST['input_format'])) {
        exit;
    }

    $text = $_POST['text'];
    $text = strtr($text, array('<!--' => '__COMMENT__START__', '-->' => '__COMMENT__END__'));
    $filters = filter_get_filters();
    $__filters = filter_list_format($_POST['input_format']);
    
    foreach ($_POST['filters'] as $name) {
        if ($name == "default") {
            preg_match_all("|</?([a-z][a-z0-9]*)(?:\b[^>]*)>|i", $text, $matches);
            if ($matches[1]) {
                $tags = array_unique($matches[1]);
                $text = filter_xss($text, $tags);
            }
            continue;
        }

        if (!isset($filters[$name]) || !isset($filters[$name]['process callback'])) {
            continue;
        }
        
        $text = $filters[$name]['process callback']($text, $__filters[$name]);
    }

    $text = strtr($text, array('__COMMENT__START__' => '<!--', '__COMMENT__END__' => '-->'));

    echo $text;
}
