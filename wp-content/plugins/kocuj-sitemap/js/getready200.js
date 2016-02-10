// Copyright (c) 2013-2016 Dominik Kocuj <dominik@kocuj.pl>
// License: http://www.gnu.org/licenses/gpl-2.0.html

/* jshint globalstrict: true */

/* global alert */
/* global clearTimeout */
/* global document */
/* global escape */
/* global setTimeout */
/* global unescape */
/* global window */

/* global jQuery */
/* global location */

/* global kocujAdmin4Modal */

/* global kocujSitemapPluginGetReady200Settings */

// information about future version 2.0.0 window prototype constructor
function kocujSitemapPluginClassGetReady200() {
	'use strict';
	/* jshint validthis: true */
	// get this object
	var self = this;
	// get settings
	if (typeof kocujSitemapPluginGetReady200Settings !== 'undefined') {
		if (kocujSitemapPluginGetReady200Settings.adminUrl !== undefined) {
			self._settingsAdminUrl = kocujSitemapPluginGetReady200Settings.adminUrl;
		}
		if (kocujSitemapPluginGetReady200Settings.textLoading !== undefined) {
			self._settingsTextLoading = kocujSitemapPluginGetReady200Settings.textLoading;
		}
		if (kocujSitemapPluginGetReady200Settings.textLoadingError !== undefined) {
			self._settingsTextLoadingError = kocujSitemapPluginGetReady200Settings.textLoadingError;
		}
		if (kocujSitemapPluginGetReady200Settings.textTitle !== undefined) {
			self._settingsTextTitle = kocujSitemapPluginGetReady200Settings.textTitle;
		}
	}
}

// information about future version 2.0.0 window prototype
kocujSitemapPluginClassGetReady200.prototype = {
	// settings
	_settingsAdminUrl : '',
	_settingsTextLoading : '',
	_settingsTextLoadingError : '',
	_settingsTextTitle : '',

	// show information about future version 2.0.0 window
	showInformation : function() {
		'use strict';
		// get this object
		var self = this;
		(function($) {
			// prepare modal window
			var totalHeight = parseInt($(window).height(), 10)-200;
			if (totalHeight < 140) {
				totalHeight = 140;
			}
			kocujAdmin4Modal.prepareModal(
				'<div id="kocujsitemapplugin_getready200header">' +
				self._settingsTextTitle +
				'</div>' +
				'<div id="kocujsitemapplugin_getready200">' +
				'<em>' +
				self._settingsTextLoading +
				'</em>' +
				'</div>' +
				'<div id="kocujsitemapplugin_getready200button">' +
				'</div>', 600, totalHeight);
			// set style
			$('#kocujsitemapplugin_getready200header').css({
				'font-size': '13px',
				'text-align': 'center',
				'font-weight': 'normal',
				'line-height': '28px',
				'width': '600px',
				'height': '28px',
				'color': '#cccccc',
				'background-color': '#464646'
			});
			$('#kocujsitemapplugin_getready200').css({
				'font-family': 'Tahoma, Arial, "DejaVu Sans Condensed", sans-serif',
				'font-size': '12px',
				'text-align': 'left',
				'font-weight': 'normal',
				'width': '580px',
				'height': parseInt(totalHeight-28-20, 10) + 'px',
				'padding': '10px 10px 10px 10px',
				'color': '#464646',
				'background-color': '#ffffff',
				'border-bottom-width': 0,
				'overflow': 'auto'
			});
			// show window
			kocujAdmin4Modal.showPreparedModal('', 1.0);
			// call AJAX
			$.ajax({
				url: self._settingsAdminUrl + '?' +
					'kocujsitemapplugingetready200=1',
				async: true,
				cache: false,
				data: '',
				dataType: 'html',
				error: function(obj, status, err) {
					self._ajaxError(obj, status, err);
				},
				success: function(data, status, obj) {
					self._ajaxSuccess(data, status, obj);
				},
				type: 'GET'
			});
		}(jQuery));
	},

	// AJAX loading success
	_ajaxSuccess : function(data, status, obj) {
		'use strict';
		(function($) {
			// set HTML data
			$('#kocujsitemapplugin_getready200').html(data);
			// set external links
			$('#kocujsitemapplugin_getready200 a[rel=external]').attr('target', '_blank');
		}(jQuery));
	},

	// AJAX loading error
	_ajaxError : function(obj, status, err) {
		'use strict';
		// get this object
		var self = this;
		(function($) {
			// set HTML data
			$('#kocujsitemapplugin_getready200').html(
				'<strong>' +
				self._settingsTextLoadingError +
				'</strong>'
			);
		}(jQuery));
	}
};

// initialize
var kocujSitemapPluginGetReady200 = new kocujSitemapPluginClassGetReady200();

