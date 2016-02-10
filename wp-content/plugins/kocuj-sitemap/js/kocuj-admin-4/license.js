// Copyright (c) 2013 Dominik Kocuj <dominik@kocuj.pl>
// License: http://www.gnu.org/licenses/gpl-2.0.html

// license prototype constructor
function kocujAdmin4ClassLicense() {
	// get settings
	if (typeof kocujAdmin4LicenseSettings != 'undefined') {
		if (typeof kocujAdmin4LicenseSettings.adminUrl != 'undefined') {
			this._settingsAdminUrl = kocujAdmin4LicenseSettings.adminUrl;
		}
		if (typeof kocujAdmin4LicenseSettings.textLoading != 'undefined') {
			this._settingsTextLoading = kocujAdmin4LicenseSettings.textLoading;
		}
		if (typeof kocujAdmin4LicenseSettings.textLoadingError != 'undefined') {
			this._settingsTextLoadingError = kocujAdmin4LicenseSettings.textLoadingError;
		}
		if (typeof kocujAdmin4LicenseSettings.textLicense != 'undefined') {
			this._settingsTextLicense = kocujAdmin4LicenseSettings.textLicense;
		}
		if (typeof kocujAdmin4LicenseSettings.textAccept != 'undefined') {
			this._settingsTextAccept = kocujAdmin4LicenseSettings.textAccept;
		}
		if (typeof kocujAdmin4LicenseSettings.textCancel != 'undefined') {
			this._settingsTextCancel = kocujAdmin4LicenseSettings.textCancel;
		}
	}
}

// license prototype
kocujAdmin4ClassLicense.prototype = {
	// license URL
	_url : new Array(),
	// license name
	_name : new Array(),
	// internal name
	_internalName : new Array(),
	// settings
	_settingsAdminUrl : '',
	_settingsTextLoading : '',
	_settingsTextLoadingError : '',
	_settingsTextLicense : '',
	_settingsTextAccept : '',
	_settingsTextCancel : '',

	// set license URL
	setURL : function(url, id) {
		// set license URL
		this._url['pos' + parseInt(id)] = url;
	},

	// set license name
	setName : function(name, id) {
		// set license name
		this._name['pos' + parseInt(id)] = name;
	},

	// set internal name
	setInternalName : function(internalName, id) {
		// set internal name
		this._internalName['pos' + parseInt(id)] = internalName;
	},

	// AJAX loading success
	_ajaxSuccess : function(id, data, status, obj) {
		(function($) {
			// parse data
			id = parseInt(id);
			// set HTML data
			$('#kocujadmin4_license_' + id).html(data);
			// set external links
			$('#kocujadmin4_license_' + id + ' a[rel=external]').attr('target', '_blank');
			// show license confirmation
			if ($('#kocujadmin4_licenseconfirm_' + id).length > 0) {
				if ($().jquery < '1.6') {
					$('#kocujadmin4_licenseconfirm_' + id).css('opacity', 0.0);
					$('#kocujadmin4_licenseconfirm_' + id).show();
				}
				$('#kocujadmin4_licenseconfirm_' + id).fadeTo('slow', 1.0);
			}
			if ($('#kocujadmin4_licensecancel_' + id).length > 0) {
				if ($().jquery < '1.6') {
					$('#kocujadmin4_licensecancel_' + id).css('opacity', 0.0);
					$('#kocujadmin4_licensecancel_' + id).show();
				}
				$('#kocujadmin4_licensecancel_' + id).fadeTo('slow', 1.0);
			}
		}(jQuery));
	},

	// AJAX loading error
	_ajaxError : function(id, obj, status, err) {
		(function($) {
			// parse data
			id = parseInt(id);
			// set HTML data
			$('#kocujadmin4_license_' + id).html('<strong>' + kocujAdmin4License._settingsTextLoadingError + '</strong>');
		}(jQuery));
	},

	// show license window
	showLicense : function(acceptButton, id) {
		(function($) {
			// check data
			id = parseInt(id);
			if ((typeof kocujAdmin4License._url['pos' + id] == 'undefined') || (kocujAdmin4License._url['pos' + id] == '')) {
				return;
			}
			if (typeof kocujAdmin4License._name['pos' + id] == 'undefined') {
				return;
			}
			// prepare modal window
			var totalHeight = parseInt($(window).height())-200;
			if (totalHeight < 140) {
				totalHeight = 140;
			}
			var st = kocujAdmin4License._settingsTextLicense;
			if (kocujAdmin4License._name['pos' + id] != '') {
				st = kocujAdmin4License._name['pos' + id];
			}
			kocujAdmin4Modal.prepareModal('<div id="kocujadmin4_licenseheader_' + id + '">' + st + '</div><div id="kocujadmin4_license_' + id + '"><em>' + kocujAdmin4License._settingsTextLoading + '</em></div><div id="kocujadmin4_licensebutton_' + id + '"></div>', 600, totalHeight, id);
			// optionally remove mask event
			if (acceptButton == 1) {
				kocujAdmin4Modal.removeCloseEventFromMask(id);
			}
			// set style
			var divHeight = totalHeight-28-20;
			var borderWidth = 0;
			var divButtonHeight = 0;
			if (acceptButton == 1) {
				divButtonHeight = 40;
				divHeight = totalHeight-28-divButtonHeight-20;
				borderWidth = 1;
			}
			$('#kocujadmin4_licenseheader_' + id).css({
				'font-size': '13px',
				'text-align': 'center',
				'font-weight': 'normal',
				'line-height': '28px',
				'width': '600px',
				'height': '28px',
				'color': '#cccccc',
				'background-color': '#464646'
			});
			$('#kocujadmin4_license_' + id).css({
				'font-family': '"Courier New", Courier, monospace',
				'font-size': '12px',
				'text-align': 'center',
				'font-weight': 'normal',
				'width': '580px',
				'height': divHeight + 'px',
				'padding': '10px 10px 10px 10px',
				'color': '#464646',
				'background-color': '#ffffff',
				'border-bottom-color': '#000000',
				'border-bottom-style': 'solid',
				'border-bottom-width': borderWidth + 'px',
				'overflow': 'auto'
			});
			$('#kocujadmin4_licensebutton_' + id).css({
				'font-size': '12px',
				'text-align': 'center',
				'vertical-align': 'middle',
				'font-weight': 'normal',
				'width': '600px',
				'height': divButtonHeight + 'px',
				'color': '#21759b',
				'background-color': '#ececec'
			});
			// optionally show button
			if (acceptButton == 1) {
				$('#kocujadmin4_licensebutton_' + id).html('<strong><a href="#" id="kocujadmin4_licenseconfirm_' + id + '">' + kocujAdmin4License._settingsTextAccept + '</a></strong><br /><div id="kocujadmin4_licensecancel_' + id+ '">' + kocujAdmin4License._settingsTextCancel + '</div>');
				$('#kocujadmin4_licenseconfirm_' + id).hide();
				$('#kocujadmin4_licensecancel_' + id).hide();
				kocujAdmin4Modal.addCloseEvent('#kocujadmin4_licenseconfirm_' + id, id);
				$('#kocujadmin4_licenseconfirm_' + id).attr('href', 'javascript:void(0);');
				$('#kocujadmin4_licenseconfirm_' + id).bind('click.kocujLicense1', function() {
					$.ajax({
						url: kocujAdmin4License._settingsAdminUrl,
						async: true,
						cache: false,
						data: 'kocujadmin4licenseconfirm=' + kocujAdmin4License._internalName['pos' + id],
						dataType: 'html',
						type: 'GET'
					});
					kocujAdmin4Modal.removeCloseEvent('#kocujadmin4_licenseconfirm_' + id);
					$('#kocujadmin4_licenseconfirm_' + id).unbind('click.kocujLicense1');
				});
			}
			// call AJAX
			$.ajax({
				url: kocujAdmin4License._url['pos' + id],
				async: true,
				cache: false,
				data: '',
				dataType: 'html',
				error: function(obj, status, err) { kocujAdmin4License._ajaxError(id, obj, status, err); },
				success: function(data, status, obj) { kocujAdmin4License._ajaxSuccess(id, data, status, obj); },
				type: 'GET'
			});
			// show window
			kocujAdmin4Modal.showPreparedModal(id, 1.0);
		}(jQuery));
	}
};

// initialize
var kocujAdmin4License = new kocujAdmin4ClassLicense();
