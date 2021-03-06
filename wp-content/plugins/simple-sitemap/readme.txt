=== Simple Sitemap ===
Contributors: dgwyer
Tags: sitemap, html, global, sort, shortcode, pages, posts
Requires at least: 2.7
Tested up to: 4.4
Stable tag: 1.81

Powerful but simple to use HTML sitemap. Display site content in one or more lists separated by post type, customized via flexible filters.

== Description ==

This is probably the easiest way to add a powerful HTML sitemap to your site! Simply enter the <code>[simple-sitemap]</code> shortcode in a post, page, custom post type, or text widget and you're good to go. Simple as that!

The sitemap shortcode has several attributes you can use to control how the sitemap is rendered including:

'types': comma separated list of post types to display in the sitemap
'show_label': show the heading label for each post ['true'|'false']
'links': show sitemap list as links or plain text ['true'|'false']
'page_depth': hierarchy of child pages to show [0|1|2|3]
'order': sort order of list ['asc'|'desc']
'orderby': field to sort by [title|author|date|ID]
'exclude': comma separated list of post IDs to exclude

This gives your visitors an efficient way to view ALL site content in ONE place. It is also great for SEO purposes and makes it easier for spiders to index your site.

To display the sitemap simply add the [simple-sitemap] shortcode to any post or page (or text widget) and you'll have a full indexed sitemap enabled on your website!

Simple Sitemap Pro version coming soon!
- Render your sitemap in multiple columns, or even inside tabs!
- Customize each of the lists in your sitemap, rather than have settings apply to all post types?
- Advanced filtering of posts via taxonomies.
- Group posts inside each post type list by author, date, taxonomy etc.
- Three additional shortcodes to achieve exactly the sitemap layout you need.
- Add multiple specialized lists to different pages. e.g. different sitemaps for different custom post types, or different categories from the same post type.
- Finer granular control over how the sitemap is rendered.
- And more..!

Let us know what you'd like to see in the Pro version <a href="http://wpgoplugins.com/contact-us/" target="_blank">here</a>.

Please rate this Plugin if you find it useful. It only takes a couple of seconds and is very much appreciated! :)

See our <a href="http://www.wpgoplugins.com" target="_blank">WordPress plugin site</a> for more plugins.

== Installation ==

1. Via the WordPress admin go to Plugins => Add New.
2. Enter 'Simple Sitemap' (without quotes) in the textbox and click the 'Search Plugins' button.
3. In the list of relevant Plugins click the 'Install' link for Simple Sitemap on the right hand side of the page.
4. Click the 'Install Now' button on the popup page.
5. Click 'Activate Plugin' to finish installation.
6. Add [simple-sitemap] shortcode to a page to display the sitemap on your site.

== Screenshots ==

1. Once plugin has been activated simply add the [simple-sitemap] shortcode to any page, post, or text widget.
2. Simple Sitemap displays a list of all the specified post types.
3. Plugin admin page details all the shortcode attributes available.

== Changelog ==

*1.81 update*

* Screenshots updated.

*1.8 update*

* Plugin completely rewritten to include a range of shortcode attributes to make rendering the sitemap much more flexible!
* All previous plugin options removed from the plugin settings page. Use the new shortcode attributes instead. See the plugin settings page for full deatils.
* New, cleaner HTML and CSS. New CSS classes used.

*1.7 update*

* Translation support added!

*1.65 update*

* More settings page updates.

*1.64 update*

* Settings page updated.

*1.63*

* Fixed bug with CPT links.

*1.62*

* Sitemap shortcode now works in text widgets.

*1.61*

* Fixed bug limiting CPT posts to displaying a maximum of 5 each.

*1.6*

* Links on Plugins page updated.
* Removed front end drop downs. Sitemap rendering now solely controlled via plugin settings.
* Support for Custom Post Types added!

*1.54*

* Security issue addressed.

*1.53*

* All functions now properly name-spaced.
* Added $wpdb->prepare() to SQL query.

*1.52*

* Updated Plugin options page text.
* Now works nicely in sidebars (via a Text widget)!
* Fixed bug where existing Plugin users saw no posts/pages on the sitemap after upgrade to 1.51.
* Added a 'Settings' link to the main Plugins page, next to the 'Deactivate' link to allow easy navigation to the Simple Sitemap Plugin options page.

*1.51*

* Updated WordPress compatibility version.
* Update to Plugin option page text.

*1.5*

* Updated for WordPress 3.5.1.
* Minor CSS bug fixed.
* ALL Plugin styles affecting the sitemap have been removed to allow the current theme to control the styles. This enables the sitemap to blend in with the current theme, and allows for easy customisation of the CSS as there are plenty of sitemap classes to hook into.
* All sitemap content is now listed in a single column to allow for additional listings for CPT to be added later.
* New Plugin options to show/hide posts or pages.

*1.4.1*

* Minor updates to Plugin options page, and some internal functions.

*1.4*

* Plugin option added to exclude pages by ID!
* Bug fix: ALL posts are now listed and are not restricted by the Settings -> Reading value.

*1.3.1*

* Fixed HTML bug. Replaced deprecated function.

*1.3*

* Dropdown sort boxes on the front end now work much better in all browsers. Thanks to Matt Bailey for this fix.

*1.28*

* Changed the .sticky CSS class to be .ss_sticky to avoid conflict with the WordPress .sticky class.

*1.27*

* Fixed minor bug in 'Posts' view, when displaying the date. There was an erroneous double quotes in the dates link.

*1.26*

* Fixed CSS bug. Was affecting the size of some themes Nav Menu font sizes.

*1.25*

* Now supports WordPress 3.0.3
* Updated Plugin options page
* Fixed issue: http://wordpress.org/support/topic/plugin-simple-sitemap-duplicated-id-post_item
* Fixed issue: http://wordpress.org/support/topic/plugin-simple-sitemap-empty-span-when-post-is-not-sticky

*1.20*

* Added Plugin admin options page
* Fixed several small bugs
* Sitemap layout tweaked and generally improved
* Added new rendering of sitemap depending on drop-down options
* New options to sort by category, author, tags, and date improved significantly

*1.10 Fixed so that default permalink settings work fine on drop-down filter*

*1.01 Minor amendments*

*1.0 Initial release*