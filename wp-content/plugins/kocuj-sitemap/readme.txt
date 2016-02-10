=== Kocuj Sitemap ===
Contributors: domko
Tags: sitemap, menus, pages, posts, html 5, shortcode, multilingual
Author URI: http://kocuj.pl
Plugin URI: http://kocujsitemap.wpplugin.kocuj.pl
Requires at least: 2.8
Tested up to: 4.4
Stable tag: 1.3.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The plugin for creating and placing a sitemap by shortcode or PHP function. It supports multilingualism (with qTranslate plugin).

== Description ==

*Kocuj Sitemap* plugin adds shortcode `[KocujSitemap]` that puts the sitemap in the place where it is located. This allows you to display links to all of your posts, pages and menu items anywhere on your website - even within the article. There is also a PHP function that allows you to place the sitemap anywhere on the website.

This plugin supports multilingual websites. If you have installed the plugin compatible with *Kocuj Sitemap* plugin (currently it is *qTranslate*), the plugin will generate a sitemap on your website in accordance with the currently selected language. If you do not have the plugin that supports multilingualism, *Kocuj Sitemap* plugin will display a sitemap for the default language defined for your WordPress installation.

The sitemap is automatically generated and stored in the cache after each change of any element in the administration panel, which is used in it (for example, when you change a post) to avoid using the database when loading a web page. This process speeds up the loading of sitemap on your website.

= Requirements =

This plugin requires PHP 5 and WordPress 2.8 or greater. It is recommended to use WordPress in, at least, 3.5 version.

= How to use =

The shortcode `[KocujSitemap]` has optional parameters:

* `title` - text that will be used as the title of the link to the main page,
* `class` - name of the style sheet class that will be added to the block element (`div` or `nav`) containing the entire sitemap.

For example, if you add:
`[KocujSitemap title="NEW TITLE" class="new_class"]`
the sitemap will be displayed in the block element (`div` or `nav`) with the CSS class `new_class` and link to the home page with title `NEW TITLE`.

If you do not want to put the sitemap in the article, you can edit the PHP file responsible for the theme. *Kocuj Sitemap* plugin defines global PHP function which declaration is as follows:
`<?php function kocujsitemap_show_sitemap($title = '', $class = '') ?>`
The parameters `$title` and `$class` perform the same function as the corresponding parameters in the shortcode `[KocujSitemap]`. For example, if you add:
`<?php kocujsitemap_show_sitemap('NEW TITLE', 'new_class'); ?>`
the sitemap will be displayed in the block element (`div` or `nav`) with the CSS class `new_class` and link to the home page with title `NEW TITLE`.

= Configuration =

There is option *Sitemap* in the administration panel, which is used to configure the behavior of the *Kocuj Sitemap* plugin. If you select *Settings* from the plugin menu, you will find yourself in a place where you can set options for the plugin.

The settings are divided into tabs. There can be active only one tab at once. Tab is selected by clicking on its name.

Each tab contains a set of options. Each option has a description that is displayed when you set mouse cursor over it.

Changes in the configuration can be saved by clicking on the *Save settings* button. Clicking on the *Restore default settings* button restore the settings that were set after installing a plugin.

= Translations =

There are available the following languages for *Kocuj Sitemap* plugin:

* *English* (default),
* *French* (file *languages/kocuj-sitemap-fr_FR.mo*; translated by: [Richard Macareno ("mister klucha")](http://profiles.wordpress.org/mister-klucha) ),
* *Polish* (file *languages/kocuj-sitemap-pl_PL.mo*).

Plugin *Kocuj Sitemap* gives you the ability to translate your texts into other languages. To do this, you should prepare 3 PO files created from the following templates:

* *languages/kocuj-sitemap.pot*,
* *languages/kocuj-sitemap-meta.pot*,
* *languages/kocuj-admin-3/kocuj-admin-3.pot*.

More information about translating are available in [WordPress Codex](http://codex.wordpress.org/I18n_for_WordPress_Developers).

If you translate this plugin, please send it to author at dominik@kocuj.pl to add your contribution to project.

= Filters =

The *Kocuj Sitemap* plugin contains a set of filters that allow you to change some behavior of the plugin. This allows you to adapt the plugin to the requirements of the developer of another plugin or theme without making changes to the code in *Kocuj Sitemap* plugin.

If you think that *Kocuj Sitemap* plugin should add another filter, please inform the author at dominik@kocuj.pl .

*Kocuj Sitemap* plugin contains the following filters:

***kocujsitemap_additionalmultilangphpclasses***

*Parameters:*

1. array - a list of other PHP classes that support multi-language plugins and they are not built-in into the *Kocuj Sitemap* plugin

*Returned value:*

1. array - a list of PHP classes that support multi-language plugins and they are not built-in into the *Kocuj Sitemap* plugin

*Description:*

This filter adds a PHP class for supporting multi-language websites. To add a new PHP class, you need to add a new element to array which contains the following fields:

* `dir` - full path to the file with a new PHP class,
* `class` - PHP class name.

More information about this functionality can be found by looking into file *classes/multilang/qtranslate.class.php* which can be a good example for developer of another PHP class.

This filter is available from version 1.2.0 of the *Kocuj Sitemap* plugin.

***kocujsitemap_defaultclass***

*Parameters:*

1. string - text with all default CSS classes for a sitemap container (block element `div` or `nav`)

*Returned value:*

1. string - text with all default CSS classes for a sitemap container (block element `div` or `nav`)

*Description:*

This filter sets the default CSS class that is used in the block element of the sitemap. It is used if there is not specified `class` parameter in the `[KocujSitemap]` shortcode, or if there is not specified `$class` parameter in the `kocujsitemap_show_sitemap` PHP function.

***kocujsitemap_defaultmenus***

*Parameters:*

1. array - a list of menus ID

*Returned value:*

1. array - a list of menus ID

*Description:*

This filter sets the default list of menus that appear in the sitemap if the list in the "menus list" in administration panel is empty. This filter exists only in WordPress version 3.0 and newer.

***kocujsitemap_defaulttitle***

*Parameters:*

1. string - text with default title for link to the main page
2. string - current locale (this parameter is available from version 1.2.0 of the *Kocuj Sitemap* plugin)

*Returned value:*

1. string - text with default title for link to the main page

*Description:*

This filter sets the default title that is used in the link to the main page in the sitemap. It is used if there is not specified `title` parameter in the `[KocujSitemap]` shortcode, or if there is not specified `$title` parameter in the `kocujsitemap_show_sitemap` PHP function.

***kocujsitemap_firstclass***

*Parameters:*

1. string - text with CSS class for first element in the sitemap

*Returned value:*

1. string - text with CSS class for first element in the sitemap

*Description:*

This filter sets the CSS class that is used in the first element of the sitemap.

***kocujsitemap_linktitle***

*Parameters:*

1. string - text with link title
2. int - object ID or 0 for link to the main page (this parameter is available from version 1.2.0 of the *Kocuj Sitemap* plugin)
3. string - object type; available values: "post" for post, "page" for page, "menu" for menu item (only in WordPress version 3.0 and newer), "category" for category and "home" for link to the main page (this parameter is available from version 1.2.0 of the *Kocuj Sitemap* plugin)
4. string - current locale (this parameter is available from version 1.2.0 of the *Kocuj Sitemap* plugin)

*Returned value:*

1. string - text with link title

*Description:*

This filter sets the link title.

***kocujsitemap_menuelement***

*Parameters:*

1. string - menu option with all HTML tags and attributes
2. int - object ID for menu item
3. string - current locale (this parameter is available from version 1.2.0 of the *Kocuj Sitemap* plugin)

*Returned value:*

1. string - menu option with all HTML tags and attributes

*Description:*

This filter sets a menu option - with all HTML tags and attributes. This filter exists only in WordPress version 3.0 and newer.

= Planned features =

* Support for multisite mode,
* Support for more multilingual plugins,
* Widget with sitemap,
* More parameters for shortcode and PHP function,
* Easy control of shortcode parameters in HTML and visual editor,
* Generating XML sitemap for search engines,
* More filters for changing behavior of the plugin.

You can also suggest a feature by sending a message to dominik@kocuj.pl .

= Contact =

If you have any suggestion, feel free to email me at dominik@kocuj.pl .

If you want to have a regular information about this plugin, please become a fan of plugin on Facebook:
http://www.facebook.com/kocujsitemap

See also official plugin site:
http://kocujsitemap.wpplugin.kocuj.pl

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload all files to the `/wp-content/plugins/kocuj-sitemap` directory,
2. Activate the plugin through the *Plugins* menu in WordPress,
3. Configure in *Sitemap* option in administration panel,
4. Add shortcode `[KocujSitemap]` in the selected page or post where you want to show your sitemap or use global PHP function `kocujsitemap_show_sitemap` in your theme.

== Screenshots ==

1. An example of the sitemap.
2. This plugin has options to choose what should be displayed in the sitemap.
3. User can easily select menus which should be displayed in the sitemap.
4. This plugin is compatible with qTranslate plugin.
5. There are some additional options to choose.

== Frequently Asked Questions ==

= Why there is lack of questions and answers in this section? =

Please send a question to author at dominik@kocuj.pl to help in building this section.

== Changelog ==

= 1.3.2 =
There are no new features or bug fixes - only information if your server or hosting account is prepared for version 2.0.0 of this plugin.

= 1.3.1 =
* Fixed compatibility with WordPress menu methods.
* Fixed few minor bugs.

= 1.3.0 =
* Added French language (thanks to Richard Macareno).

= 1.2.0 =
* Added support for qTranslate plugin to correctly display links and titles.
* Added button in visual and HTML editor for automatically adding a plugin shortcode.
* Added possibility to change menu list in the plugin settings without reloading the entire page.
* Added possibility to change order of menus list in administration settings for this plugin.
* Changed loading PHP classes for administration panel to do it only in backend to speed up scripts execution.
* Added additional author information to administration panel (like Facebook link).
* Added additional help information to each section in administration menu for this plugin.
* Added more text for users to help and readme.
* Changed possibility of sending thanks to author to be possible after 1 day of using this plugin (not just after installing it).
* Fixed security in forms in administration panel.
* Fixed plugin registering hook.

= 1.1.1 =
* Fixed comptability with PHP 5.4 series.

= 1.1.0 =
* Added plugin help to administration panel.
* Checked and correct any problems with readme.txt for correct displaying information on wordpress.org repository.

= 1.0.0 =
* First version of plugin.

== Upgrade Notice ==

= 1.3.2 =
No new features or bug fixes - only information if your server or hosting account is prepared for version 2.0.0 of this plugin. Version 2.0.0 released date is planned on 27th of February 2016.

= 1.3.1 =
Fixed few minor bugs.

= 1.3.0 =
Added French languages. Changed some texts about plugin.

= 1.2.0 =
Added support for multilingual websites using the qTranslate plugin. Changed option "menu list" in administration panel to allow changing values and their order without forcing to reloading page. Fixes some minor bugs.

= 1.1.1 =
Fixed problems with compatibility with PHP 5.4 series.

= 1.1.0 =
Added help to administration panel.
