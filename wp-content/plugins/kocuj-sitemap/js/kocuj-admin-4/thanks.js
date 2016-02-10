// Copyright (c) 2013 Dominik Kocuj <dominik@kocuj.pl>
// License: http://www.gnu.org/licenses/gpl-2.0.html

// thanks prototype constructor
function kocujAdmin4ClassThanks() {
	// get settings
	if (typeof kocujAdmin4ThanksSettings != 'undefined') {
		if (typeof kocujAdmin4ThanksSettings.apiUrl != 'undefined') {
			this._settingsApiUrl = kocujAdmin4ThanksSettings.apiUrl;
		}
		if (typeof kocujAdmin4ThanksSettings.apiLogin != 'undefined') {
			this._settingsApiLogin = kocujAdmin4ThanksSettings.apiLogin;
		}
		if (typeof kocujAdmin4ThanksSettings.apiPassword != 'undefined') {
			this._settingsApiPassword = kocujAdmin4ThanksSettings.apiPassword;
		}
		if (typeof kocujAdmin4ThanksSettings.websiteURL != 'undefined') {
			this._settingsWebsiteURL = kocujAdmin4ThanksSettings.websiteURL;
		}
		if (typeof kocujAdmin4ThanksSettings.websiteTitle != 'undefined') {
			this._settingsWebsiteTitle = kocujAdmin4ThanksSettings.websiteTitle;
		}
		if (typeof kocujAdmin4ThanksSettings.websiteDescription != 'undefined') {
			this._settingsWebsiteDescription = kocujAdmin4ThanksSettings.websiteDescription;
		}
		if (typeof kocujAdmin4ThanksSettings.adminUrl != 'undefined') {
			this._settingsAdminUrl = kocujAdmin4ThanksSettings.adminUrl;
		}
		if (typeof kocujAdmin4ThanksSettings.loadingImageURL != 'undefined') {
			this._settingsLoadingImageURL = kocujAdmin4ThanksSettings.loadingImageURL;
		}
		if (typeof kocujAdmin4ThanksSettings.textSending != 'undefined') {
			this._settingsTextSending = kocujAdmin4ThanksSettings.textSending;
		}
		if (typeof kocujAdmin4ThanksSettings.textInformationAlreadySent != 'undefined') {
			this._settingsTextInformationAlreadySent = kocujAdmin4ThanksSettings.textInformationAlreadySent;
		}
		if (typeof kocujAdmin4ThanksSettings.textCorrect != 'undefined') {
			this._settingsTextCorrect = kocujAdmin4ThanksSettings.textCorrect;
		}
		if (typeof kocujAdmin4ThanksSettings.textErrorTryAgain != 'undefined') {
			this._settingsTextErrorTryAgain = kocujAdmin4ThanksSettings.textErrorTryAgain;
		}
		if (typeof kocujAdmin4ThanksSettings.textError != 'undefined') {
			this._settingsTextError = kocujAdmin4ThanksSettings.textError;
		}
		if (typeof kocujAdmin4ThanksSettings.textMoreTitle != 'undefined') {
			this._settingsTextMoreTitle = kocujAdmin4ThanksSettings.textMoreTitle;
		}
		if (typeof kocujAdmin4ThanksSettings.textLoading != 'undefined') {
			this._settingsTextLoading = kocujAdmin4ThanksSettings.textLoading;
		}
		if (typeof kocujAdmin4ThanksSettings.textLoadingError != 'undefined') {
			this._settingsTextLoadingError = kocujAdmin4ThanksSettings.textLoadingError;
		}
	}
}

// thanks prototype
kocujAdmin4ClassThanks.prototype = {
	// old Internet Explorer
	_ieOld : 0,
	// internal name
	_internalName : new Array(),
	// timer
	_timer : null,
	// retries
	_retries : 0,
	// settings
	_settingsApiUrl : '',
	_settingsApiLogin : '',
	_settingsApiPassword : '',
	_settingsWebsiteURL : '',
	_settingsWebsiteTitle : '',
	_settingsWebsiteDescription : '',
	_settingsAdminUrl : '',
	_settingsLoadingImageURL : '',
	_settingsTextSending : '',
	_settingsTextInformationAlreadySent : '',
	_settingsTextCorrect : '',
	_settingsTextErrorTryAgain : '',
	_settingsTextError : '',
	_settingsTextMoreTitle : '',
	_settingsTextLoading : '',
	_settingsTextLoadingError : '',

	// set old IE
	setIEOld : function() {
		// set old IE
		this._ieOld = 1;
	},

	// set internal name
	setInternalName : function(internalName, id) {
		// set internal name
		this._internalName['pos' + parseInt(id)] = internalName;
	},

	// set sending thanks information form elements
	setForm : function(id) {
		(function($) {
			// check data
			id = parseInt(id);
			// add events
			if ($('#kocujadmin4thanksmini #kocujadmin4thanksminimore').length > 0) {
				$('#kocujadmin4thanksmini #kocujadmin4thanksminimore').attr('href', 'javascript:void(0);');
				$('#kocujadmin4thanksmini #kocujadmin4thanksminimore').bind('click.kocujThanksMini1', function() {
					kocujAdmin4Thanks._miniMoreEvent(id);
				});
			}
			if ($('#kocujadmin4thanksmini #kocujadmin4thanksminiclose').length > 0) {
				$('#kocujadmin4thanksmini #kocujadmin4thanksminiclose').attr('href', 'javascript:void(0);');
				$('#kocujadmin4thanksmini #kocujadmin4thanksminiclose').bind('click.kocujThanksMini1', function() {
					kocujAdmin4Thanks._miniCloseEvent(id);
				});
			}
			if ($('#kocujadmin4thanks #kocujadmin4thanksconfirm').length > 0) {
				$('#kocujadmin4thanks #kocujadmin4thanksconfirm').attr('href', 'javascript:void(0);');
				$('#kocujadmin4thanks #kocujadmin4thanksconfirm').bind('click.kocujThanks1', function() {
					kocujAdmin4Thanks._confirmEvent(id);
				});
				$('#kocujadmin4thanks #kocujadmin4thankscancel').attr('href', 'javascript:void(0);');
				$('#kocujadmin4thanks #kocujadmin4thankscancel').bind('click.kocujThanks1', function() {
					kocujAdmin4Thanks._cancelEvent(id);
				});
			}
			if ($('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthanksconfirm').length > 0) {
				$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthanksconfirm').attr('href', 'javascript:void(0);');
				$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthanksconfirm').bind('click.kocujThanks1', function() {
					kocujAdmin4Thanks._confirmEvent(id);
				});
			}
			if ($('#kocujadmin4thanks  #kocujadmin4thanksmore').length > 0) {
				$('#kocujadmin4thanks  #kocujadmin4thanksmore').attr('href', 'javascript:void(0);');
				$('#kocujadmin4thanks  #kocujadmin4thanksmore').bind('click.kocujThanks1', function() {
					kocujAdmin4Thanks._moreEvent(id);
				});
			}
			if ($('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthanksmore').length > 0) {
				$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthanksmore').attr('href', 'javascript:void(0);');
				$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthanksmore').bind('click.kocujThanks1', function() {
					kocujAdmin4Thanks._moreEvent(id);
				});
			}
		}(jQuery));
	},

	// AJAX loading success
	_ajaxSuccess : function(id, type, callback, data, status, obj) {
		(function($) {
			// parse data
			id = parseInt(id);
			// deactivate AJAX timeout
			kocujAdmin4Thanks._deactivateAJAXTimeout();
			// parse response
			if (callback != '') {
				eval(callback + '(id, type, data);');
			}
		}(jQuery));
	},

	// AJAX loading error
	_ajaxError : function(id, type, callback, obj, status, err) {
		(function($) {
			// parse data
			id = parseInt(id);
			// parse error
			if (callback != '') {
				eval(callback + '(id, type);');
			}
		}(jQuery));
	},

	// activate AJAX timeout
	_activateAJAXTimeout : function(id, type, callback) {
		// set timer
		kocujAdmin4Thanks._timer = window.setTimeout('kocujAdmin4Thanks._ajaxError("' + id + '", "' + type.toString().replace('"', '\\"') + '", "' + callback.toString().replace('"', '\\"') + '");', 30000);
	},

	// deactivate AJAX timeout
	_deactivateAJAXTimeout : function() {
		// clear timer
		window.clearTimeout(kocujAdmin4Thanks._timer);
	},

	// more in mini information event
	_miniMoreEvent : function(id) {
		(function($) {
			// show information
			if ($('#kocujadmin4thanksmini').length > 0) {
				$('#kocujadmin4thanksmini').hide();
			}
			if ($('#kocujadmin4thanks').length > 0) {
				$('#kocujadmin4thanks').show();
			}
		}(jQuery));
	},

	// close mini information event
	_miniCloseEvent : function(id) {
		(function($) {
			// hide information
			if ($('#kocujadmin4thanksmini').length > 0) {
				$('#kocujadmin4thanksmini').hide();
			}
			// cancel
			kocujAdmin4Thanks._cancelEvent(id);
		}(jQuery));
	},

	// confirm event
	_confirmEvent : function(id) {
		(function($) {
			// check data
			id = parseInt(id);
			// show loading circle
			if ($('#kocujadmin4thanks').length > 0) {
				$('#kocujadmin4thanks #kocujadmin4thankstextdiv').hide();
				$('#kocujadmin4thanks #kocujadmin4thanksemptydiv').hide();
				$('#kocujadmin4thanks #kocujadmin4thanksmorediv').hide();
				$('#kocujadmin4thanks #kocujadmin4thanksoptionsdiv').html('<p><img src="' + kocujAdmin4Thanks._settingsLoadingImageURL + '" alt="" style="position: absolute;" /><span style="margin-left: 25px;"><strong>' + kocujAdmin4Thanks._settingsTextSending + '</strong></span></p>');
			}
			if ($('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').length > 0) {
				if ($('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthanksconfirm').length > 0) {
					$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthanksconfirm').remove();
				}
				$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthanksinfodiv').hide();
				$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').html('<img src="' + kocujAdmin4Thanks._settingsLoadingImageURL + '" alt="" style="position: absolute;" /><span style="margin-left: 25px;"><strong>' + kocujAdmin4Thanks._settingsTextSending + '</strong></span>');
				$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').show();
			}
			// call AJAX
			kocujAdmin4Thanks._activateAJAXTimeout(id, 'confirm', 'kocujAdmin4Thanks._confirmationErrorCallback');
			if ($().jquery < '1.6') {
				var data = {
					'requestType': 'parameters',
					'responseType': 'JSON',
					'requestMethod': 'GET',
					'data[PARAMETER_version]': 1,
					'data[header][login]': kocujAdmin4Thanks._settingsApiLogin,
					'data[header][password]': kocujAdmin4Thanks._settingsApiPassword,
					'data[request][PARAMETER_command]': 'ADD_THANKS',
					'data[request][url]': kocujAdmin4Thanks._settingsWebsiteURL,
					'data[request][title]': kocujAdmin4Thanks._settingsWebsiteTitle,
					'data[request][description]': kocujAdmin4Thanks._settingsWebsiteDescription
				};
			} else {
				var data = {
					'requestType': 'parameters',
					'responseType': 'JSON',
					'requestMethod': 'GET',
					'data' : {
						'PARAMETER_version': 1,
						'header' : {
							'login': kocujAdmin4Thanks._settingsApiLogin,
							'password': kocujAdmin4Thanks._settingsApiPassword
						},
						'request': {
							'PARAMETER_command': 'ADD_THANKS',
							'url': kocujAdmin4Thanks._settingsWebsiteURL,
							'title': kocujAdmin4Thanks._settingsWebsiteTitle,
							'description': kocujAdmin4Thanks._settingsWebsiteDescription
						}
					}
				};
			}
			$.ajax({
				url: kocujAdmin4Thanks._settingsApiUrl + '',
				async: true,
				cache: false,
				data: data,
				dataType: 'jsonp',
				success: function(data, status, obj) { kocujAdmin4Thanks._ajaxSuccess(id, 'confirm', 'kocujAdmin4Thanks._confirmationCallback', data, status, obj); },
				jsonpCallback: 'kocujadmin4confirmcallback',
				type: 'GET'
			});
		}(jQuery));
	},

	// cancel event
	_cancelEvent : function(id) {
		(function($) {
			// hide elements to send thanks
			if ($('#kocujadmin4thanks').length > 0) {
				$('#kocujadmin4thanks').hide();
			}
			// send cancel
			$.ajax({
				url: kocujAdmin4Thanks._settingsAdminUrl,
				async: true,
				cache: false,
				data: 'kocujadmin4thankscancel=' + kocujAdmin4Thanks._internalName['pos' + id],
				dataType: 'html',
				error: function(obj, status, err) { kocujAdmin4Thanks._ajaxError(id, 'cancelsave', '', obj, status, err); },
				success: function(data, status, obj) { kocujAdmin4Thanks._ajaxSuccess(id, 'cancelsave', '', data, status, obj); },
				type: 'GET'
			});
		}(jQuery));
	},

	// show more information event
	_moreEvent : function(id) {
		(function($) {
			// check data
			id = parseInt(id);
			// prepare modal window
			var totalHeight = parseInt($(window).height())-200;
			if (totalHeight < 140) {
				totalHeight = 140;
			}
			kocujAdmin4Modal.prepareModal('<div id="kocujadmin4_thanksheader_' + id + '">' + kocujAdmin4Thanks._settingsTextMoreTitle + '</div><div id="kocujadmin4_thanks_' + id + '"><em>' + kocujAdmin4Thanks._settingsTextLoading + '</em></div>', 600, totalHeight, id);
			// set style
			$('#kocujadmin4_thanksheader_' + id).css({
				'font-size': '13px',
				'text-align': 'center',
				'font-weight': 'normal',
				'line-height': '28px',
				'width': '600px',
				'height': '28px',
				'color': '#cccccc',
				'background-color': '#464646'
			});
			$('#kocujadmin4_thanks_' + id).css({
				'font-size': '12px',
				'text-align': 'left',
				'font-weight': 'normal',
				'width': '580px',
				'height': parseInt(totalHeight-28-20) + 'px',
				'padding': '10px 10px 10px 10px',
				'color': '#464646',
				'background-color': '#ffffff',
				'border-bottom-color': '#000000',
				'border-bottom-style': 'solid',
				'border-bottom-width': '0px',
				'overflow': 'auto'
			});
			// call AJAX
			$.ajax({
				url: kocujAdmin4Thanks._settingsAdminUrl,
				async: true,
				cache: false,
				data: 'kocujadmin4thanks=' + kocujAdmin4Thanks._internalName['pos' + id],
				dataType: 'html',
				error: function(obj, status, err) { kocujAdmin4Thanks._ajaxError(id, 'more', 'kocujAdmin4Thanks._moreErrorCallback', obj, status, err); },
				success: function(data, status, obj) { kocujAdmin4Thanks._ajaxSuccess(id, 'more', 'kocujAdmin4Thanks._moreCallback', data, status, obj); },
				type: 'GET'
			});
			// show window
			kocujAdmin4Modal.showPreparedModal(id, 1.0);
		}(jQuery));
	},

	// save confirmation
	_confirmationCallback : function(id, type, data) {
		(function($) {
			// check response status
			if (data.status.id != 'OK') {
				if (data.status.id == 'CT_ADD_THANKS_URLALREADYEXISTS') {
					if ($('#kocujadmin4thanks').length > 0) {
						$('#kocujadmin4thanks #kocujadmin4thankstextdiv').hide();
						$('#kocujadmin4thanks #kocujadmin4thanksmorediv').hide();
						$('#kocujadmin4thanks #kocujadmin4thanksoptionsdiv').show();
						$('#kocujadmin4thanks #kocujadmin4thanksemptydiv').hide();
						if (kocujAdmin4Thanks._ieOld == 1) {
							$('#kocujadmin4thanks #kocujadmin4thanksoptionsdiv').html('<p><strong>' + kocujAdmin4Thanks._settingsTextCorrect + '</strong></p>');
						} else {
							$('#kocujadmin4thanks #kocujadmin4thanksoptionsdiv').html('<p><strong>' + kocujAdmin4Thanks._settingsTextInformationAlreadySent + '</strong></p>');
						}
					}
					if ($('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').length > 0) {
						if (kocujAdmin4Thanks._ieOld == 1) {
							$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').html('<strong>' + kocujAdmin4Thanks._settingsTextCorrect + '</strong>');
						} else {
							$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').html('<strong>' + kocujAdmin4Thanks._settingsTextInformationAlreadySent + '</strong>');
						}
						$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').show();
					}
				} else {
					kocujAdmin4Thanks._confirmationErrorCallback(id, type);
					return;
				}
			} else {
				if ($('#kocujadmin4thanks').length > 0) {
					$('#kocujadmin4thanks #kocujadmin4thankstextdiv').show();
					$('#kocujadmin4thanks #kocujadmin4thanksmorediv').hide();
					$('#kocujadmin4thanks #kocujadmin4thanksoptionsdiv').hide();
					$('#kocujadmin4thanks #kocujadmin4thanksemptydiv').hide();
					$('#kocujadmin4thanks #kocujadmin4thankstextdiv').html('<p><strong>' + kocujAdmin4Thanks._settingsTextCorrect + '</strong></p>');
				}
				if ($('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').length > 0) {
					$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').html('<strong>' + kocujAdmin4Thanks._settingsTextCorrect + '</strong>');
					$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').show();
				}
			}
			// save confirmation
			$.ajax({
				url: kocujAdmin4Thanks._settingsAdminUrl,
				async: true,
				cache: false,
				data: 'kocujadmin4thanksconfirm=' + kocujAdmin4Thanks._internalName['pos' + id],
				dataType: 'html',
				error: function(obj, status, err) { kocujAdmin4Thanks._ajaxError(id, 'confirmsave', '', obj, status, err); },
				success: function(data, status, obj) { kocujAdmin4Thanks._ajaxSuccess(id, 'confirmsave', '', data, status, obj); },
				type: 'GET'
			});
		}(jQuery));
	},

	// save confirmation - error
	_confirmationErrorCallback : function(id, type) {
		(function($) {
			// set retries
			kocujAdmin4Thanks._retries++;
			// show error
			if (kocujAdmin4Thanks._retries < 3) {
				if ($('#kocujadmin4thanks').length > 0) {
					$('#kocujadmin4thanks #kocujadmin4thanksoptionsdiv').html('<p><strong>' + kocujAdmin4Thanks._settingsTextErrorTryAgain + '</strong></p>');
				}
				if ($('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').length > 0) {
					$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').html('<strong>' + kocujAdmin4Thanks._settingsTextErrorTryAgain + '</strong>');
					$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').show();
				}
			} else {
				if ($('#kocujadmin4thanks').length > 0) {
					$('#kocujadmin4thanks #kocujadmin4thanksoptionsdiv').html('<p><strong>' + kocujAdmin4Thanks._settingsTextError + '</strong></p>');
				}
				if ($('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').length > 0) {
					$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').html('<strong>' + kocujAdmin4Thanks._settingsTextError + '</strong>');
					$('#kocujadmin4aboutthanksdiv #kocujadmin4aboutthankstextdiv').show();
				}
			}
			// check retries
			if (kocujAdmin4Thanks._retries < 3) {
				window.setTimeout('kocujAdmin4Thanks._confirmEvent("' + id + '");', 5000);
			}
		}(jQuery));
	},

	// more information
	_moreCallback : function(id, type, data) {
		(function($) {
			// parse data
			id = parseInt(id);
			// set HTML data
			$('#kocujadmin4_thanks_' + id).html(data);
			// set styles
			$('#kocujadmin4_thanks_' + id + ' ul').css({
				'margin-top': '12px',
				'margin-bottom': '12px'
			});
			$('#kocujadmin4_thanks_' + id + ' ul li').css({
				'margin-bottom': '0px'
			});
		}(jQuery));
	},

	// more information - error
	_moreErrorCallback : function(id, type) {
		(function($) {
			// parse data
			id = parseInt(id);
			// set HTML data
			$('#kocujadmin4_thanks_' + id).html('<strong>' + kocujAdmin4Thanks._settingsTextLoadingError + '</strong>');
		}(jQuery));
	}
};

// initialize
var kocujAdmin4Thanks = new kocujAdmin4ClassThanks();
