// Copyright (c) 2013 Dominik Kocuj <dominik@kocuj.pl>
// License: http://www.gnu.org/licenses/gpl-2.0.html

// modal window prototype constructor
function kocujAdmin4ClassModal() {
}

// modal window prototype
kocujAdmin4ClassModal.prototype = {
	// append default window (1) or not (0)
	_appendDefault : 0,
	// appended windows id
	_append : new Array(),
	// visible default window (1) or not (0)
	_visibleDefault : 0,
	// visible windows id
	_visible : new Array(),
	// fading content of default window (1) or not (0)
	_fadingContentDefault : 0,
	// fading content windows id
	_fadingContent : new Array(),

	// add close event
	addCloseEvent : function(elementPath, id, callback) {
		(function($) {
			// get parameters
			if (typeof id != 'number') {
				id = '';
			} else {
				id = parseInt(id);
			}
			if (typeof callback == 'undefined') {
				callback = '';
			}
			// add close event
			var idString = '';
			if (id != '') {
				idString = '_' + parseInt(id);
			}
			$(elementPath).attr('href', 'javascript:void(0);');
			$(elementPath).bind('click', {callback: callback}, function(evt) {
				if (id == '') {
					if ((typeof kocujAdmin4Modal._fadingContentDefault == 'undefined') || (kocujAdmin4Modal._fadingContentDefault > 0)) {
						$('.kocujadmin4_modalscript_window' + idString).fadeOut('slow', function() {
							$('#kocujadmin4_modalscript_mask' + idString).fadeOut('fast', function() {
								$('#kocujadmin4_modalscript_boxes' + idString).hide();
								$('#kocujadmin4_modalscript_mask' + idString).hide();
								eval(evt.data.callback);
							});
						});
					} else {
						$('.kocujadmin4_modalscript_window' + idString).hide();
						$('#kocujadmin4_modalscript_mask' + idString).fadeOut('fast', function() {
							$('#kocujadmin4_modalscript_boxes' + idString).hide();
							$('#kocujadmin4_modalscript_mask' + idString).hide();
							eval(evt.data.callback);
						});
					}
				} else {
					if ((typeof kocujAdmin4Modal._fadingContent['pos' + id] == 'undefined') || (kocujAdmin4Modal._fadingContent['pos' + id] > 0)) {
						var callback = evt.data.callback;
						$('.kocujadmin4_modalscript_window' + idString).fadeOut('slow', function() {
							$('#kocujadmin4_modalscript_mask' + idString).fadeOut('fast', function() {
								$('#kocujadmin4_modalscript_boxes' + idString).hide();
								$('#kocujadmin4_modalscript_mask' + idString).hide();
								eval(evt.data.callback);
							});
						});
					} else {
						$('.kocujadmin4_modalscript_window' + idString).hide();
						$('#kocujadmin4_modalscript_mask' + idString).fadeOut('fast', function() {
							$('#kocujadmin4_modalscript_boxes' + idString).hide();
							$('#kocujadmin4_modalscript_mask' + idString).hide();
							eval(evt.data.callback);
						});
					}
				}
				if (id == '') {
					kocujAdmin4Modal._visibleDefault = 0;
				} else {
					id = parseInt(id);
					kocujAdmin4Modal._visible['pos' + id] = 0;
				}
			});
		}(jQuery));
	},

	// add close event to mask
	addCloseEventToMask : function(id, callback) {
		// get parameters
		if (typeof id != 'number') {
			id = '';
		} else {
			id = parseInt(id);
		}
		if (typeof callback == 'undefined') {
			callback = '';
		}
		// remove close event from mask
		var idString = '';
		if (id != '') {
			idString = '_' + parseInt(id);
		}
		this.addCloseEvent('#kocujadmin4_modalscript_mask' + idString, id, callback);
	},

	// remove close event
	removeCloseEvent : function(elementPath) {
		(function($) {
			// remove close event
			$(elementPath).unbind('click');
		}(jQuery));
	},

	// remove close event from mask
	removeCloseEventFromMask : function(id) {
		// get window id
		if (typeof id != 'number') {
			id = '';
		} else {
			id = parseInt(id);
		}
		// remove close event from mask
		var idString = '';
		if (id != '') {
			idString = '_' + parseInt(id);
		}
		this.removeCloseEvent('#kocujadmin4_modalscript_mask' + idString);
	},

	// prepare modal window
	prepareModal : function(content, width, height, id) {
		(function($) {
			// prepare parameters
			width = parseInt(width);
			height = parseInt(height);
			if (typeof id != 'number') {
				id = '';
			} else {
				id = parseInt(id);
			}
			var idString = '';
			if (id != '') {
				idString = '_' + id;
			}
			// append window
			var append = 0;
			if (id == '') {
				if (kocujAdmin4Modal._appendDefault == 0) {
					append = 1;
					kocujAdmin4Modal._appendDefault = 1;
				}
			} else {
				id = parseInt(id);
				if ((typeof kocujAdmin4Modal._append['pos' + id] == 'undefined') || (!kocujAdmin4Modal._append['pos' + id])) {
					append = 1;
					kocujAdmin4Modal._append['pos' + id] = 1;
				}
			}
			if (append == 1) {
				$('body').prepend('<div id="kocujadmin4_modalscript_boxes' + idString + '"><div id="kocujadmin4_modalscript_dialog' + idString + '" class="kocujadmin4_modalscript_window' + idString + '"><div id="kocujadmin4_modalscript_dialoginside' + idString + '" class="kocujadmin4_modalscript_windowinside' + idString + '"></div></div><div id="kocujadmin4_modalscript_mask' + idString + '"></div></div>');
				$('#kocujadmin4_modalscript_boxes' + idString).hide();
			}
			// set styles
			$('#kocujadmin4_modalscript_boxes' + idString + ' .kocujadmin4_modalscript_window' + idString).css({
				'position': 'absolute',
				'display': 'none',
				'z-index': 999999,
				'background-color': '#000000'
			});
			$('#kocujadmin4_modalscript_boxes' + idString + ' .kocujadmin4_modalscript_windowinside' + idString).css({
				'background-color': '#ffffff'
			});
			// prepare mask
			var maskHeight = $(document).height();
			var maskWidth = $(window).width();
			$('#kocujadmin4_modalscript_mask' + idString).css({
				'position': 'absolute',
				'z-index': 999998,
				'background-color': '#000000',
				'display': 'none',
				'left': 0,
				'top': 0,
				'width': maskWidth,
				'height': maskHeight
			});
			// get browser size
			var screenWidth = $(window).width();
			var screenHeight = $(window).height();
			// set new window size
			$('#kocujadmin4_modalscript_dialog' + idString).width(width+20);
			$('#kocujadmin4_modalscript_dialog' + idString).height(height+20);
			$('#kocujadmin4_modalscript_dialoginside' + idString).css('margin-left', '10px');
			$('#kocujadmin4_modalscript_dialoginside' + idString).css('margin-right', '10px');
			$('#kocujadmin4_modalscript_dialoginside' + idString).css('margin-top', '10px');
			$('#kocujadmin4_modalscript_dialoginside' + idString).css('margin-bottom', '10px');
			$('#kocujadmin4_modalscript_dialoginside' + idString).width(width);
			$('#kocujadmin4_modalscript_dialoginside' + idString).height(height);
			// set window position
			$('#kocujadmin4_modalscript_dialog' + idString).css('left', (screenWidth/2)-((width+20)/2));
			$('#kocujadmin4_modalscript_dialog' + idString).css('top', (screenHeight/2)-((height+20)/2));
			// change window content
			$('#kocujadmin4_modalscript_dialoginside' + idString).html(content);
			// add close event
			kocujAdmin4Modal.removeCloseEventFromMask(id);
			kocujAdmin4Modal.addCloseEvent('#kocujadmin4_modalscript_mask' + idString, id);
		}(jQuery));
	},

	// show prepared modal window
	showPreparedModal : function(id, fadingContent, x, y, width, height) {
		(function($) {
			// prepare parameters
			if (typeof id != 'number') {
				id = '';
			} else {
				id = parseInt(id);
			}
			var idString = '';
			if (id != '') {
				idString = '_' + id;
			}
			fadingContent = parseFloat(fadingContent);
			if (typeof x != 'number') {
				x = -1;
			} else {
				x = parseInt(x);
			}
			if (typeof y != 'number') {
				y = -1;
			} else {
				y = parseInt(y);
			}
			if (typeof width != 'number') {
				width = -1;
			} else {
				width = parseInt(width);
			}
			if (typeof height != 'number') {
				height = -1;
			} else {
				height = parseInt(height);
			}
			// show modal window box
			$('#kocujadmin4_modalscript_boxes' + idString).show();
			// show mask
			if ($().jquery < '1.6') {
				$('#kocujadmin4_modalscript_mask' + idString).css('opacity', 0.0);
				$('#kocujadmin4_modalscript_mask' + idString).show();
			}
			$('#kocujadmin4_modalscript_mask' + idString).fadeTo('fast', 0.8);
			// set window position
			if (x > -1) {
				$('#kocujadmin4_modalscript_dialog' + idString).css('left', x);
			}
			if (y > -1) {
				$('#kocujadmin4_modalscript_dialog' + idString).css('top', y);
			}
			if (width > -1) {
				$('#kocujadmin4_modalscript_dialog' + idString).width(width);
			}
			if (height > -1) {
				$('#kocujadmin4_modalscript_dialog' + idString).height(height);
			}
			// show window
			if (id == '') {
				kocujAdmin4Modal._fadingContentDefault = fadingContent;
			} else {
				kocujAdmin4Modal._fadingContent['pos' + id] = fadingContent;
			}
			if (fadingContent > 0) {
				if ($().jquery < '1.6') {
					$('#kocujadmin4_modalscript_dialog' + idString).css('opacity', 0.0);
					$('#kocujadmin4_modalscript_dialog' + idString).show();
				}
				$('#kocujadmin4_modalscript_dialog' + idString).fadeTo('slow', fadingContent);
			} else {
				$('#kocujadmin4_modalscript_dialog' + idString).show();
			}
			// set visible status
			if (id == '') {
				kocujAdmin4Modal._visibleDefault = 1;
			} else {
				id = parseInt(id);
				kocujAdmin4Modal._visible['pos' + id] = 1;
			}
		}(jQuery));
	},

	// show modal window
	showModal : function(content, width, height, id, fadingContent, x, y) {
		// prepare parameters
		width = parseInt(width);
		height = parseInt(height);
		if (typeof id != 'number') {
			id = '';
		} else {
			id = parseInt(id);
		}
		fadingContent = parseFloat(fadingContent);
		x = parseInt(x);
		y = parseInt(y);
		// show modal window
		this.prepareModal(content, width, height, id);
		this.showPreparedModal(id, fadingContent, x, y);
	},

	// check if modal window is visible
	checkVisible : function(id) {
		// prepare parameters
		if (typeof id != 'number') {
			id = '';
		} else {
			id = parseInt(id);
		}
		// check if modal window is visible
		if (id == '') {
			return kocujAdmin4Modal._visibleDefault;
		} else {
			if (typeof kocujAdmin4Modal._visible['pos' + id] == 'undefined') {
				return 0;
			} else {
				return kocujAdmin4Modal._visible['pos' + id];
			}
		}
	}
};

// initialize
var kocujAdmin4Modal = new kocujAdmin4ClassModal();
