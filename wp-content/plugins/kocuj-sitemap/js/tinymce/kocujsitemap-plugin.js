// Copyright (c) 2013 Dominik Kocuj <dominik@kocuj.pl>
// License: http://www.gnu.org/licenses/gpl-2.0.html

(function() {
	tinymce.create('tinymce.plugins.KocujSitemap', {
		init : function(ed, url) {
			ed.addButton('kocujsitemap', {
				title : ed.getLang('kocujsitemap.buttontitle'),
				cmd : 'kocujsitemap',
				image : url + '/addsitemap.png'
            });
			ed.addCommand('kocujsitemap', function() {
				var shortcode = '[KocujSitemap]';
				ed.execCommand('mceInsertContent', 0, shortcode);
			});
		},

		createControl : function(n, cm) {
			return null;
		},

		getInfo : function() {
			return {
				longname : ed.getLang('kocujsitemap.longname'),
				author : 'Dominik Kocuj',
				authorurl : 'http://kocuj.pl',
				infourl : 'http://kocujsitemap.wpplugin.kocuj.pl',
				version : '1.0.0'
			};
		}
	});

	tinymce.PluginManager.add('kocujsitemap', tinymce.plugins.KocujSitemap);
})();
