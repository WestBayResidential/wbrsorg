<?php

/**
 * admin.class.php
 *
 * @author Dominik Kocuj <dominik@kocuj.pl>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @copyright Copyright (c) 2013 Dominik Kocuj
 * @package kocuj_sitemap
 */

// security
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {
	die ('Please do not load this page directly. Thanks!');
}

// check if load class
if (is_admin()) {
	/**
	 * Plugin admin class
	 *
	 * @access public
	 */
	class KocujSitemapPluginAdmin extends KocujAdminAdmin4 {
		/**
		 * Main language domain
		 *
		 * @access private
		 * @var string
		 */
		private $mainLanguageDomain = '';

		/**
		 * Main language directory
		 *
		 * @access private
		 * @var string
		 */
		private $mainLanguageDir = '';

		/**
		 * Constructor
		 *
		 * @access public
		 * @param object $configClass KocujAdminConfig4 class object
		 * @param string $languageDir Directory with language data
		 * @param string $mainFile Main file full path
		 * @param string $mainLanguageDomain Main language domain
		 * @param string $mainLanguageDir Main language directory
		 * @param string $pluginVersion Plugin version - default: empty
		 * @return void
		 */
		public function __construct($configClass, $languageDir, $mainFile, $mainLanguageDomain, $mainLanguageDir, $pluginVersion = '') {
			// execute parent constructor
			parent::__construct($configClass, $languageDir, $mainFile, $pluginVersion);
			// save language domain
			$this->mainLanguageDomain = $mainLanguageDomain;
			$this->mainLanguageDir = $mainLanguageDir;
			// application type
			$this->appType = KocujAdminEnumAppType4::PLUGIN;
			// set plugin activation hook
			$this->pluginActivationHook = 'KocujSitemapPlugin::getInstance()->activate';
			// set plugin deactivation hook
			$this->pluginDeactivationHook = 'KocujSitemapPlugin::getInstance()->deactivate';
			// set plugin update callback
			$this->pluginUpdateCallback = 'KocujSitemapPlugin::getInstance()->updatePlugin';
			// set internal name
			$this->internalName = 'kocujsitemap';
			// set minimal full supported version
			$this->minimalFullSupportedVersion = '3.0.0';
			// set full title
			$this->fullTitle = 'Kocuj Sitemap';
			// set text domain for translations
			$this->formName = 'kocujsitemapform';
			// set nonce action
			$this->nonceAction = 'kocujsitemap';
			// set license option name
			$this->licenseOption = 'kocujsitemap_license_first';
			// force license confirmation
			$this->licenseForce = KocujAdminEnumLicensePlace4::NONE;
			// set custom admin icon
			$this->adminIcon = 'adminicon.png';
			// set custom about image
			$this->aboutImage = 'about.png';
			// set arrows
			$this->arrowUpImage = 'arrow-up.png';
			$this->arrowDownImage = 'arrow-down.png';
			$this->closeImage = 'close.png';
			// set thanks option name
			$this->thanksOption = 'kocujsitemap_thanks';
			// thanks script API data
			$this->thanksAPILogin = 'kocujsitemapplugin';
			$this->thanksAPIPassword = 'K0cmDi_98XifA';
			// set thanks delay in days
			$this->thanksDaysDelay = 1;
			// thanks websites
			$this->thanksWebsites[] = 'kocujsitemap.wpplugin.kocuj.pl';
			// set thanks information places
			$this->thanksPlace = KocujAdminEnumThanksPlaces4::PROJECT;
		}

		/**
		 * Load language
		 *
		 * @access public
		 * @return void
		 */
		public function loadLanguage() {
			// execute parent method
			parent::loadLanguage();
			// load language
			if (!empty($this->mainLanguageDomain)) {
				load_plugin_textdomain($this->mainLanguageDomain, false, $this->mainLanguageDir);
			}
		}

		/**
		 * Initialize
		 *
		 * @access public
		 * @return void
		 */
		public function init() {
			// execute parent method
			parent::init();
			// set title
			$this->title = __('Sitemap', 'kocuj-sitemap');
			// add menu
			$this->addSettingsMenu(__('Sitemap', 'kocuj-sitemap'), 'manage_options', 'kocujsitemap', 'pluginSettings', '', KocujSitemapPlugin::getInstance()->getPluginUrl().'/images/icon.png');
			$this->addSettingsMenu(__('Settings', 'kocuj-sitemap'), 'manage_options', 'kocujsitemap', 'pluginSettings', 'kocujsitemap');
			$this->addSettingsMenu(__('Uninstall', 'kocuj-sitemap'), 'manage_options', 'kocujsitemapuninstall', 'pluginUninstall', 'kocujsitemap');
			$this->addSettingsMenu(__('Help', 'kocuj-sitemap'), 'manage_options', 'kocujsitemaphelp', 'pluginHelp', 'kocujsitemap');
			$this->addSettingsMenu(__('About', 'kocuj-sitemap'), 'manage_options', 'kocujsitemapabout', 'pluginAbout', 'kocujsitemap');
			// add quick tags
			$this->addQuickTag('kocujsitemap', __('sitemap', 'kocuj-sitemap'), '[KocujSitemap]', '', '', __('Add sitemap shortcode', 'kocuj-sitemap'));
			// add TinyMCE buttons
			$this->addMCEPluginJS('kocujsitemap-plugin.js', 'kocujsitemap-plugin-langs.php');
			$this->addMCEButton('kocujsitemap');
			// check if cache directory is writable
			if (!KocujSitemapPluginCache::getInstance()->checkWritable()) {
				add_action('admin_notices', array($this, 'actionCacheDirNotWritableError'));
			}
			// optionally display window to get ready for version 2.0.0
			$about200 = get_option('kocujsitemap_2_0_0_get_ready');
			if ($about200 === false) {
				add_action('admin_notices', array($this, 'actionGetReady200'));
				add_action('admin_enqueue_scripts', array($this, 'actionGetReady200EnqueueScripts'));
			}
			// optionally show information about version changes
			if ((isset($_GET['kocujsitemapplugingetready200'])) && ($_GET['kocujsitemapplugingetready200'] === '1')) {
				echo __('There will completely transformed plugin Kocuj Sitemap on 27th February 2016. Because there will be many changes, the new version will have also higher requirements than older versions of this plugin.', 'kocuj-sitemap');
				echo '<br /><br />';
				echo __('New version will require PHP in - minimum - version 5.3.', 'kocuj-sitemap');
				echo '<br /><br />';
				if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
					echo '<span style="color:green;">'.sprintf(__('You are using PHP in %s version.', 'kocuj-sitemap'), PHP_VERSION).' '.__('Your server or hosting account is prepared for Kocuj Sitemap plugin in version 2.0.0. Congratulations!', 'kocuj-sitemap').'</span>';
				} else {
					echo '<span style="color:green;">'.sprintf(__('You are using PHP in %s version.', 'kocuj-sitemap'), PHP_VERSION).' '.__('Your server or hosting account is not prepared for Kocuj Sitemap plugin in version 2.0.0. Contact with your server or hosting account provider for information about PHP upgrade possibilities.', 'kocuj-sitemap').'</span>';
				}
				add_option('kocujsitemap_2_0_0_get_ready', '1', '', 'no');
				exit();
			}
		}

		/**
		 * Action - information about error with permissions to cache directory
		 *
		 * @access public
		 * @return void
		 */
		public function actionCacheDirNotWritableError() {
			// show error information
			if (current_user_can('manage_options')) {
				echo '<div class="error"><p><strong>'.sprintf(__('Warning! Your cache directory for sitemap in Kocuj Sitemap plugin (placed in "%s") is not writable. Please, change permissions to this directory to allow the plugin to use cache for better performance.', 'kocuj-sitemap'), KocujSitemapPlugin::getInstance()->getPluginDir().'/cache').'</strong></p></div>';
			}
		}

		/**
		 * Action - information about future 2.0.0 version of this plugin
		 *
		 * @access public
		 * @return void
		 */
		public function actionGetReady200() {
			// show information
			if ((current_user_can('manage_network_plugins')) || (current_user_can('activate_plugins')) || (current_user_can('update_plugins')) || (current_user_can('install_plugins')) || (current_user_can('delete_plugins')) || (current_user_can('edit_plugins'))) {
				echo '<div class="update-nag"><p><strong>'.sprintf(__('There will completely transformed plugin Kocuj Sitemap on 27th February 2016. Because there will be many changes, the new version will have higher requirements than older versions of this plugin. Click %shere%s to find out if your server or hosting account meets these requirements. If you click on this link, this information will not be displayed anymore.', 'kocuj-sitemap'), '<a href="#" id="kocujsitemapplugin_getready200">', '</a>').'</strong></p></div>';
				echo '<script type="text/javascript">'."\n";
				echo '/* <![CDATA[ */'."\n";
				echo '(function($) {'."\n";
				echo '$(document).ready(function() {'."\n";
				echo '$("#kocujsitemapplugin_getready200").attr("href", "javascript:void(0);");'."\n";
				echo '$("#kocujsitemapplugin_getready200").click(function() {'."\n";
				echo 'kocujSitemapPluginGetReady200.showInformation();'."\n";
				echo '});'."\n";
				echo '});'."\n";
				echo '}(jQuery));'."\n";
				echo '/* ]]> */'."\n";
				echo '</script>'."\n";
			}
		}

		/**
		 * Action for adding JavaScript scripts for information about future 2.0.0 version of this plugin
		 *
		 * @access public
		 * @return void
		 */
		public function actionGetReady200EnqueueScripts() {
			// add scripts
			wp_enqueue_script('kocujadmin4-modal', $this->javascriptURL.'/kocuj-admin-4/modal.js', array(
				'jquery',
			), '4');
			wp_enqueue_script('kocujsitemapplugin-getready200', $this->javascriptURL.'/getready200.js', array(
				'kocujadmin4-modal',
			), '1');
			wp_localize_script('kocujsitemapplugin-getready200', 'kocujSitemapPluginGetReady200Settings', array(
				'adminUrl'         => (function_exists('network_admin_url')) ?
					network_admin_url('index.php') :
					admin_url('index.php'),
				'textLoading'      => __('Loading, please wait', 'kocuj-sitemap'),
				'textLoadingError' => __('Loading error! Please, check your internet connection and refresh page to try again.', 'kocuj-sitemap'),
				'textTitle'        => __('Information about future version of Kocuj Sitemap plugin', 'kocuj-sitemap'),
			));
		}

		/**
		 * Save controller
		 *
		 * @access public
		 * @return string Output statuc
		 */
		public function controllerSave() {
			// execute parent method
			$errors = parent::controllerSave();
			// renew cache
			KocujSitemapPluginCache::getInstance()->createCache();
			// exit
			return $errors;
		}

		/**
		 * Reset controller
		 *
		 * @access public
		 * @return string Output statuc
		 */
		public function controllerReset() {
			// execute parent method
			$errors = parent::controllerReset();
			// renew cache
			KocujSitemapPluginCache::getInstance()->createCache();
			// exit
			return '';
		}

		/**
		 * Plugin settings page
		 *
		 * @access public
		 * @return void
		 */
		public function pluginSettings() {
			// declare global
			global $wp_version;
			// initialize
			$multiLangString = '';
			// get multi-language plugins settings
			$multiLangData = KocujSitemapPluginMultiLang::getInstance()->getData();
			if (!empty($multiLangData)) {
				foreach ($multiLangData as $key => $val) {
					$multiLangString .= $this->getBlockHelper($val['admin_id'], 'checkbox', $val['admin_description']);
				}
			}
			// register tabs
			$ret = $this->registerTabsContainer('kocujsitemap', $containerId);
			$ret = $this->registerTab($containerId, __('Sitemap format', 'kocuj-sitemap'), $tabSitemapFormatId);
			if (version_compare($wp_version, '3.0.0', '>=')) {
				$ret = $this->registerTab($containerId, __('Menus', 'kocuj-sitemap'), $tabMenusId);
			}
			if (!empty($multiLangString)) {
				$ret = $this->registerTab($containerId, __('Multi-language plugins', 'kocuj-sitemap'), $tabMultiLangId);
			}
			$ret = $this->registerTab($containerId, __('Other', 'kocuj-sitemap'), $tabOtherId);
			// show form
			?>
				<?php $this->showFormStart(); ?>
					<?php $this->showTabsContainerStart($containerId); ?>
						<?php $this->showTabStart($tabSitemapFormatId); ?>
							<?php $this->showTableStart('sitemap_format'); ?>
								<?php
									$this->blockHelper('', 'statictext', '<em>'.__('Choose which elements and in which order you want to display in the sitemap.', 'kocuj-sitemap').'</em>');
									$this->blockHelper('LinkToMainSite', 'checkbox', __('If it is checked, the sitemap will display link to the main site as a first entry', 'kocuj-sitemap'));
									if (version_compare($wp_version, '3.0.0', '>=')) {
										$this->blockHelper('DisplayMenus', 'checkbox', __('If it is checked, the sitemap will display menus', 'kocuj-sitemap'));
									}
									$this->blockHelper('DisplayPages', 'checkbox', __('If it is checked, the sitemap will display pages', 'kocuj-sitemap'));
									$this->blockHelper('DisplayPosts', 'checkbox', __('If it is checked, the sitemap will display posts and categories', 'kocuj-sitemap'));
									$options = array();
									if (version_compare($wp_version, '3.0.0', '>=')) {
										$options['MGP'] = __('Menus, pages, posts', 'kocuj-sitemap');
										$options['MPG'] = __('Menus, posts, pages', 'kocuj-sitemap');
										$options['GMP'] = __('Pages, menus, posts', 'kocuj-sitemap');
										$options['PMG'] = __('Posts, menus, pages', 'kocuj-sitemap');
										$options['GPM'] = __('Pages, posts, menus', 'kocuj-sitemap');
										$options['PGM'] = __('Posts, pages, menus', 'kocuj-sitemap');
									} else {
										$options['GP'] = __('Pages, posts', 'kocuj-sitemap');
										$options['PG'] = __('Posts, pages', 'kocuj-sitemap');
									}
									$this->blockHelper('Order', 'select', __('Set order of elements in the sitemap; element which are not available (menus, pages or posts) are not displayed', 'kocuj-sitemap'), $options, '', '', true);
								?>
							<?php $this->showTableEnd(); ?>
						<?php $this->showTabEnd(); ?>
						<?php if (version_compare($wp_version, '3.0.0', '>=')) : ?>
							<?php $this->showTabStart($tabMenusId); ?>
								<?php $this->showTableStart('menus'); ?>
									<?php
										$this->blockHelper('', 'statictext', '<em>'.__('Select all menus here which should be displayed in the sitemap. You can add new values, delete which you want to remove and change order. All changes will be saved only if you click on the "save settings" button.', 'kocuj-sitemap').'</em>');
										if (get_terms('nav_menu')) {
											$this->blockHelper('Menus', 'selectmenu', __('Menus which should be included in sitemap; it works only if option `display menus` is checked', 'kocuj-sitemap'));
										} else {
											$this->blockHelper('', 'statictext', __('No menus. Options here will be activated as soon as you create any menu.', 'kocuj-sitemap').$this->getInputHelper('set_Menus[]', 'hidden', '', $this->getConfigClass()->getOptionDefaultValue('Menus')));
										}
									?>
								<?php $this->showTableEnd(); ?>
							<?php $this->showTabEnd(); ?>
						<?php endif; ?>
						<?php if (!empty($multiLangString)) : ?>
							<?php $this->showTabStart($tabMultiLangId); ?>
								<?php $this->showTableStart('multilang'); ?>
									<?php
										$this->blockHelper('', 'statictext', '<em>'.__('Select some plugins which you want to use for multi-language website. You must also installed and activated them to working it correctly. If you do not want to have a multi-language website, you can leave these section as it is or uncheck any of these settings if you have any problems with it.', 'kocuj-sitemap').'</em>');
										echo $multiLangString;
									?>
								<?php $this->showTableEnd(); ?>
							<?php $this->showTabEnd(); ?>
						<?php endif; ?>
						<?php $this->showTabStart($tabOtherId); ?>
							<?php $this->showTableStart('other'); ?>
								<?php
									$this->blockHelper('', 'statictext', '<em>'.__('There are some additional settings here which changes an appearance of the displayed sitemap.', 'kocuj-sitemap').'</em>');
									$this->blockHelper('UseHTML5', 'checkbox', __('If it is checked, the sitemap will display itself in HTML 5 navigation tag (`nav`); for Internet Explorer browser version which not supports HTML 5 (all versions below 9), tag will be changed to `div`; this tag will always have CSS class `tagnav` attached to itself', 'kocuj-sitemap'));
									$this->blockHelper('PoweredBy', 'checkbox', __('Display `powered by` information below sitemap with link to author website; if you find this plugin useful, you are welcome to check this option', 'kocuj-sitemap'));
								?>
							<?php $this->showTableEnd(); ?>
						<?php $this->showTabEnd(); ?>
					<?php $this->showTabsContainerEnd(); ?>
					<?php $this->showTableStart('submit', false); ?>
						<tr>
							<td colspan="2" class="submit">
								<?php $this->inputHelper('save', 'submit', '', __('Save settings', 'kocuj-sitemap'), '', false, __('Save current settings', 'kocuj-sitemap')); ?>
								<?php $this->inputHelper('reset', 'reset', '', __('Restore default settings', 'kocuj-sitemap'), '', false, __('Reset settings to defaults', 'kocuj-sitemap')); ?>
							</td>
						</tr>
					<?php $this->showTableEnd(); ?>
					<br />
					<input type="hidden" name="action" id="action" value="save" />
				<?php $this->showFormEnd(); ?>
			<?php
		}

		/**
		 * Plugin uninstall page
		 *
		 * @access public
		 * @return void
		 */
		public function pluginUninstall() {
			// show form
			?>
				<?php $this->showFormStart(); ?>
				<div class="bordertitle">
					<h3><?php _e('Uninstall', 'kocuj-sitemap') ?></h3>
					<?php $this->showTableStart('uninstall', false); ?>
						<?php
							$this->blockHelper('', 'statictext', '
								'.__('If you want to uninstall this plugin you can disable it in Plugins/Installed menu. After that you can again install this plugin without any setting losses.', 'kocuj-sitemap').'
								<br /><br />
								'.__('If you want permanently delete all plugin settings, click on the button below. Remember that you cannot restore this settings after reinstalling the plugin.', 'kocuj-sitemap').'
							');
							$this->blockHelper('', 'submittext', '
								'.$this->getInputHelper('uninstall', 'uninstall', '', __('Uninstall plugin', 'kocuj-sitemap'), '', false, __('Uninstall plugin settings', 'kocuj-sitemap')).'
							');
						?>
					<?php $this->showTableEnd(); ?>
					<input type="hidden" name="action" id="action" value="uninstall" />
				</div>
				<?php $this->showFormEnd(); ?>
			<?php
		}

		/**
		 * Parse help text
		 *
		 * @access private
		 * @param string $text Text
		 * @return string Parsed text
		 */
		private function parseHelpText($text) {
			// parse text
			$text = str_replace('##PLUGINNAME##', '<em>Kocuj Sitemap</em>', $text);
			$text = str_replace('##SHORTCODE##', '<em>[KocujSitemap]</em>', $text);
			$text = str_replace('##SHORTCODEEXAMPLE##', '<code>[KocujSitemap title="NEW TITLE" class="new_class"]</code>', $text);
			$text = str_replace('##PHPFUNCTION##', '<code>&lt;'.'?'.'php function kocujsitemap_show_sitemap($title = \'\', $class = \'\') ?'.'&gt;</code>', $text);
			$text = str_replace('##PHPEXAMPLE##', '<code>&lt;'.'?'.'php kocujsitemap_show_sitemap(\'NEW TITLE\', \'new_class\'); ?'.'&gt;</code>', $text);
			$text = str_replace('##TRANSLATIONFILES##', '<ul><li><em>languages/kocuj-sitemap.pot</em>,</li><li><em>languages/kocuj-sitemap-meta.pot</em>,</li><li><em>languages/'.$this->getDirectory().'/'.$this->getDirectory().'.pot</em>.</li></ul>', $text);
			$text = str_replace('##TRANSLATIONLINK##', '<a href="http://codex.wordpress.org/I18n_for_WordPress_Developers" rel="external">WordPress Codex</a>', $text);
			$text = str_replace('##AUTHORMAIL##', '<a href="mailto:dominik@kocuj.pl">dominik@kocuj.pl</a>', $text);
			$text = str_replace('##FACEBOOKLINK##', '<a href="http://www.facebook.com/kocujsitemap" rel="external">http://www.facebook.com/kocujsitemap</a>', $text);
			$text = str_replace('##WEBSITELINK##', '<a href="http://kocujsitemap.wpplugin.kocuj.pl/" rel="external">http://kocujsitemap.wpplugin.kocuj.pl</a>', $text);
			// exit
			return $text;
		}

		/**
		 * Plugin help page
		 *
		 * @access public
		 * @return void
		 */
		public function pluginHelp() {
			// show form
			?>
				<div class="bordertitle">
					<h3><?php _e('Help', 'kocuj-sitemap') ?></h3>
					<?php $this->showTableStart('help', false); ?>
						<?php
							$this->blockHelper('', 'statictext',
								$this->parseHelpText(__('##PLUGINNAME## plugin adds shortcode ##SHORTCODE## that puts the sitemap in the place where it is located. This allows you to display links to all of your posts, pages and menu items anywhere on your website - even within the article. There is also a PHP function that allows you to place the sitemap anywhere on the website.<br /><br />This plugin supports multilingual websites. If you have installed the plugin compatible with ##PLUGINNAME## plugin (currently it is <em>qTranslate</em>), the plugin will generate a sitemap on your website in accordance with the currently selected language. If you do not have the plugin that supports multilingualism, ##PLUGINNAME## plugin will display a sitemap for the default language defined for your WordPress installation.<br /><br />The sitemap is automatically generated and stored in the cache after each change of any element in the administration panel, which is used in it (for example, when you change a post) to avoid using the database when loading a web page. This process speeds up the loading of sitemap on your website.', 'kocuj-sitemap')).
								'<br /><br />'.
								'<hr /><h4>'.__('Requirements', 'kocuj-sitemap').'</h4>'.
								$this->parseHelpText(__('This plugin requires PHP 5 (up to PHP 5.4.x version) and WordPress 2.8 or greater. It is recommended to use WordPress in, at least, 3.5 version.', 'kocuj-sitemap')).
								'<br /><br />'.
								'<hr /><h4>'.__('How to use', 'kocuj-sitemap').'</h4>'.
								$this->parseHelpText(__('The shortcode ##SHORTCODE## has optional parameters:<ul><li><em>title</em> - text that will be used as the title of the link to the main page,</li><li><em>class</em> - name of the style sheet class that will be added to the block element (<em>div</em> or <em>nav</em>) containing the entire sitemap.</li></ul>For example, if you add:<br />##SHORTCODEEXAMPLE##<br />the sitemap will be displayed in the block element (<em>div</em> or <em>nav</em>) with the CSS class <em>new_class</em> and link to the home page with title <em>NEW TITLE</em>.<br /><br />If you do not want to put the sitemap in the article, you can edit the PHP file responsible for the theme. ##PLUGINNAME## plugin defines global PHP function which declaration is as follows:<br />##PHPFUNCTION##<br />The parameters <em>$title</em> and <em>$class</em> perform the same function as the corresponding parameters in the shortcode ##SHORTCODE##. For example, if you add:<br />##PHPEXAMPLE##<br />the sitemap will be displayed in the block element (<em>div</em> or <em>nav</em>) with the CSS class <em>new_class</em> and link to the home page with title <em>NEW TITLE</em>.', 'kocuj-sitemap')).
								'<br /><br />'.
								'<hr /><h4>'.__('Configuration', 'kocuj-sitemap').'</h4>'.
								$this->parseHelpText(__('There is option <em>Sitemap</em> in the administration panel, which is used to configure the behavior of the ##PLUGINNAME## plugin. If you select <em>Settings</em> from the plugin menu, you will find yourself in a place where you can set options for the plugin.<br /><br />The settings are divided into tabs. There can be active only one tab at once. Tab is selected by clicking on its name.<br /><br />Each tab contains a set of options. Each option has a description that is displayed when you set mouse cursor over it.<br /><br />Changes in the configuration can be saved by clicking on the <em>Save settings</em> button. Clicking on the <em>Restore default settings</em> button restore the settings that were set after installing a plugin.', 'kocuj-sitemap')).
								'<br /><br />'.
								'<hr /><h4>'.__('Translations', 'kocuj-sitemap').'</h4>'.
								$this->parseHelpText(__('There are available the following languages for ##PLUGINNAME## plugin:<ul><li><em>English</em> (default),</li><li><em>French</em> (file <em>languages/kocuj-sitemap-fr_FR.mo</em>; translated by: <a href="http://profiles.wordpress.org/mister-klucha" rel="external">Richard Macareno ("mister klucha")</a>),</li><li><em>Polish</em> (file <em>languages/kocuj-sitemap-pl_PL.mo</em>).</li></ul>Plugin ##PLUGINNAME## gives you the ability to translate your texts into other languages. To do this, you should prepare 3 PO files created from the following templates: ##TRANSLATIONFILES## More information about translating are available in ##TRANSLATIONLINK##.<br /><br />If you translate this plugin, please send it to author at ##AUTHORMAIL## to add your contribution to project.', 'kocuj-sitemap')).
								'<br /><br />'.
								'<hr /><h4>'.__('Filters', 'kocuj-sitemap').'</h4>'.
								$this->parseHelpText(__('The ##PLUGINNAME## plugin contains a set of filters that allow you to change some behavior of the plugin. This allows you to adapt the plugin to the requirements of the developer of another plugin or theme without making changes to the code in ##PLUGINNAME## plugin.<br /><br />If you think that ##PLUGINNAME## plugin should add another filter, please inform the author at ##AUTHORMAIL## .<br /><br />##PLUGINNAME## plugin contains the following filters:<br /><br /><strong><em>kocujsitemap_additionalmultilangphpclasses</em></strong><br /><br /><em>Parameters:</em><ol><li>array - a list of other PHP classes that support multi-language plugins and they are not built-in into the ##PLUGINNAME## plugin</li></ol><em>Returned value:</em><ol><li>array - a list of PHP classes that support multi-language plugins and they are not built-in into the ##PLUGINNAME## plugin</li></ol><em>Description:</em><br /><br />This filter adds a PHP class for supporting multi-language websites. To add a new PHP class, you need to add a new element to array which contains the following fields:<ul><li><em>dir</em> - full path to the file with a new PHP class,</li><li><em>class</em> - PHP class name.</li></ul>More information about this functionality can be found by looking into file <em>classes/multilang/qtranslate.class.php</em> which can be a good example for developer of another PHP class.<br /><br />This filter is available from version 1.2.0 of the ##PLUGINNAME## plugin.<br /><br /><strong><em>kocujsitemap_defaultclass</em></strong><br /><br /><em>Parameters:</em><ol><li>string - text with all default CSS classes for a sitemap container (block element <em>div</em> or <em>nav</em>)</li></ol><em>Returned value:</em><ol><li>string - text with all default CSS classes for a sitemap container (block element <em>div</em> or <em>nav</em>)</li></ol><em>Description:</em><br /><br />This filter sets the default CSS class that is used in the block element of the sitemap. It is used if there is not specified <em>class</em> parameter in the ##SHORTCODE## shortcode, or if there is not specified <em>$class</em> parameter in the <em>kocujsitemap_show_sitemap</em> PHP function.<br /><br /><strong><em>kocujsitemap_defaultmenus</em></strong><br /><br /><em>Parameters:</em><ol><li>array - a list of menus ID</li></ol><em>Returned value:</em><ol><li>array - a list of menus ID</li></ol><em>Description:</em><br /><br />This filter sets the default list of menus that appear in the sitemap if the list in the "menus list" in administration panel is empty. This filter exists only in WordPress version 3.0 and newer.<br /><br /><strong><em>kocujsitemap_defaulttitle</em></strong><br /><br /><em>Parameters:</em><ol><li>string - text with default title for link to the main page</li><li>string - current locale (this parameter is available from version 1.2.0 of the ##PLUGINNAME## plugin)</li></ol><em>Returned value:</em><ol><li>string - text with default title for link to the main page</li></ol><em>Description:</em><br /><br />This filter sets the default title that is used in the link to the main page in the sitemap. It is used if there is not specified <em>title</em> parameter in the ##SHORTCODE## shortcode, or if there is not specified <em>$title</em> parameter in the <em>kocujsitemap_show_sitemap</em> PHP function.<br /><br /><strong><em>kocujsitemap_firstclass</em></strong><br /><br /><em>Parameters:</em><ol><li>string - text with CSS class for first element in the sitemap</li></ol><em>Returned value:</em><ol><li>string - text with CSS class for first element in the sitemap</li></ol><em>Description:</em><br /><br />This filter sets the CSS class that is used in the first element of the sitemap.<br /><br /><strong><em>kocujsitemap_linktitle</em></strong><br /><br /><em>Parameters:</em><ol><li>string - text with link title</li><li>int - object ID or 0 for link to the main page (this parameter is available from version 1.2.0 of the ##PLUGINNAME## plugin)</li><li>string - object type; available values: "post" for post, "page" for page, "menu" for menu item (only in WordPress version 3.0 and newer), "category" for category and "home" for link to the main page (this parameter is available from version 1.2.0 of the ##PLUGINNAME## plugin)</li><li>string - current locale (this parameter is available from version 1.2.0 of the ##PLUGINNAME## plugin)</li></ol><em>Returned value:</em><ol><li>string - text with link title</li></ol><em>Description:</em><br /><br />This filter sets the link title.<br /><br /><strong><em>kocujsitemap_menuelement</em></strong><br /><br /><em>Parameters:</em><ol><li>string - menu option with all HTML tags and attributes</li><li>int - object ID for menu item</li><li>string - current locale (this parameter is available from version 1.2.0 of the ##PLUGINNAME## plugin)</li></ol><em>Returned value:</em><ol><li>string - menu option with all HTML tags and attributes</li></ol><em>Description:</em><br /><br />This filter sets a menu option - with all HTML tags and attributes. This filter exists only in WordPress version 3.0 and newer.', 'kocuj-sitemap')).
								'<br /><br />'.
								'<hr /><h4>'.__('Planned features', 'kocuj-sitemap').'</h4>'.
								$this->parseHelpText(__('<ul><li>Support for more multilingual plugins,</li><li>Widget with sitemap,</li><li>More parameters for shortcode and PHP function,</li><li>Easy control of shortcode parameters in HTML and visual editor,</li><li>Generating XML sitemap for search engines,</li><li>More filters for changing behavior of the plugin.</li></ul>You can also suggest a feature by sending a message to ##AUTHORMAIL## .', 'kocuj-sitemap')).
								'<br /><br />'.
								'<hr /><h4>'.__('Contact', 'kocuj-sitemap').'</h4>'.
								$this->parseHelpText(__('If you have any suggestion, feel free to email me at ##AUTHORMAIL## .<br /><br />If you want to have a regular information about this plugin, please become a fan of plugin on Facebook:<br />##FACEBOOKLINK##<br /><br />See also official plugin site:<br />##WEBSITELINK##', 'kocuj-sitemap')).
								'<br /><br /><hr />'
							);
						?>
					<?php $this->showTableEnd(); ?>
				</div>
			<?php
		}

		/**
		 * Plugin about page
		 *
		 * @access public
		 * @return void
		 */
		public function pluginAbout() {
			// show page
			$this->showAboutPage(__('About', 'kocuj-sitemap'), 'Kocuj Sitemap '.KocujSitemapPlugin::getInstance()->getVersion(), 'GPL', 'Dominik Kocuj', array(
					'email'              => 'dominik@kocuj.pl',
					'www'                => array(
						'http://kocujsitemap.wpplugin.kocuj.pl',
						'http://wordpress.org/plugins/kocuj-sitemap',
					),
					'facebook'           => 'http://www.facebook.com/kocujsitemap',
					'translationauthors' => __('TRANSLATION_AUTHORS', 'kocuj-sitemap'),
					'bugsmail'           => 'dominik@kocuj.pl',
					'additional'         => sprintf(__('Icons (arrows and close button) has been used under %s license and they are provided by', 'kocuj-sitemap'), 'Creative Commons\' Attribution-ShareAlike 3.0 United States (CC BY-SA 3.0)').': <a href="http://somerandomdude.com/work/iconic/" rel="external">http://somerandomdude.com/work/iconic</a>',
				));
		}
	}
} else {
	/**
	 * Plugin admin class
	 *
	 * @access public
	 */
	class KocujSitemapPluginAdmin extends KocujAdminAdmin4 {}
}

?>
