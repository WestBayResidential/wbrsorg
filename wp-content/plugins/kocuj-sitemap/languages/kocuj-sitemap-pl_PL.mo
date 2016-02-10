��    P      �  k         �  3  �  �  �
     �     �  L   �     �     �  .     �   5     �     �     �     �     
       
     W   "  	  z  Q   �  0   �  0     ?   8    x  �   �  �   #  8   �  &   �  T        t     �  
   �  ]   �     �             8   7  H   p      �     �     �     �               &     :     G     [     p     }     �     �     �  �   �  &  �  o   �     A     J     R     a  �  u  p  J,    �0  ]   �3  �  4  �   7  e  �7  �   49     �9  	   �9     �9     �9     :  �   :     �:  �   �:      };  �   �;  f   ^<     �<  �  �<  �  i>  �  C  
   �D     �D  L   E     SE     `E  A   hE  �   �E  )   _F     �F     �F     �F     �F     �F     �F  _   �F  ,  <G  n   iH  C   �H  D   I  O   aI  %  �I  �   �J  �   �K  4   KL  )   �L  k   �L     M     3M  
   8M  v   CM     �M     �M  (   �M  ;   N  G   GN  %   �N     �N     �N     �N     �N     �N     O     O     #O     7O  	   VO     `O     O     �O     �O  �   �O  �  �P  �   QR  
   �R     �R     �R  O   �R  t  NS  �  �g  %  �l  _   �o  5  p  �   <s  �  	t  �   �u     'v     4v     Av     Uv     tv  �   �v     -w     Lw     Mx  �   gx  c   Gy     �y     H         &   O         ,   E            >   %               I      G              
   A          <   =   (              J   5               N       !       2       7      C   '   :   @   0          +   L          "       4   *   9   1   $            #      ;          )       	   K                     P           6   B   F          D   -              ?   .         M          /      3   8       ##PLUGINNAME## plugin adds shortcode ##SHORTCODE## that puts the sitemap in the place where it is located. This allows you to display links to all of your posts, pages and menu items anywhere on your website - even within the article. There is also a PHP function that allows you to place the sitemap anywhere on the website.<br /><br />This plugin supports multilingual websites. If you have installed the plugin compatible with ##PLUGINNAME## plugin (currently it is <em>qTranslate</em>), the plugin will generate a sitemap on your website in accordance with the currently selected language. If you do not have the plugin that supports multilingualism, ##PLUGINNAME## plugin will display a sitemap for the default language defined for your WordPress installation.<br /><br />The sitemap is automatically generated and stored in the cache after each change of any element in the administration panel, which is used in it (for example, when you change a post) to avoid using the database when loading a web page. This process speeds up the loading of sitemap on your website. <ul><li>Support for more multilingual plugins,</li><li>Widget with sitemap,</li><li>More parameters for shortcode and PHP function,</li><li>Easy control of shortcode parameters in HTML and visual editor,</li><li>Generating XML sitemap for search engines,</li><li>More filters for changing behavior of the plugin.</li></ul>You can also suggest a feature by sending a message to ##AUTHORMAIL## . About Add sitemap shortcode Choose which elements and in which order you want to display in the sitemap. Configuration Contact Display `powered by` information below sitemap Display `powered by` information below sitemap with link to author website; if you find this plugin useful, you are welcome to check this option Display link to main site Display menus Display pages Display posts Filters Help How to use Icons (arrows and close button) has been used under %s license and they are provided by If it is checked, the sitemap will display itself in HTML 5 navigation tag (`nav`); for Internet Explorer browser version which not supports HTML 5 (all versions below 9), tag will be changed to `div`; this tag will always have CSS class `tagnav` attached to itself If it is checked, the sitemap will display link to the main site as a first entry If it is checked, the sitemap will display menus If it is checked, the sitemap will display pages If it is checked, the sitemap will display posts and categories If you have any suggestion, feel free to email me at ##AUTHORMAIL## .<br /><br />If you want to have a regular information about this plugin, please become a fan of plugin on Facebook:<br />##FACEBOOKLINK##<br /><br />See also official plugin site:<br />##WEBSITELINK## If you want permanently delete all plugin settings, click on the button below. Remember that you cannot restore this settings after reinstalling the plugin. If you want to uninstall this plugin you can disable it in Plugins/Installed menu. After that you can again install this plugin without any setting losses. Information about future version of Kocuj Sitemap plugin Kocuj Sitemap WordPress plugin buttons Loading error! Please, check your internet connection and refresh page to try again. Loading, please wait Menus Menus list Menus which should be included in sitemap; it works only if option `display menus` is checked Menus, pages, posts Menus, posts, pages Multi-language plugins New version will require PHP in - minimum - version 5.3. No menus. Options here will be activated as soon as you create any menu. Order of elements in the sitemap Other Pages, menus, posts Pages, posts Pages, posts, menus Planned features Posts, menus, pages Posts, pages Posts, pages, menus Powered by %s plugin Requirements Reset settings to defaults Restore default settings Save current settings Save settings Select all menus here which should be displayed in the sitemap. You can add new values, delete which you want to remove and change order. All changes will be saved only if you click on the "save settings" button. Select some plugins which you want to use for multi-language website. You must also installed and activated them to working it correctly. If you do not want to have a multi-language website, you can leave these section as it is or uncheck any of these settings if you have any problems with it. Set order of elements in the sitemap; element which are not available (menus, pages or posts) are not displayed Settings Sitemap Sitemap format TRANSLATION_AUTHORS The ##PLUGINNAME## plugin contains a set of filters that allow you to change some behavior of the plugin. This allows you to adapt the plugin to the requirements of the developer of another plugin or theme without making changes to the code in ##PLUGINNAME## plugin.<br /><br />If you think that ##PLUGINNAME## plugin should add another filter, please inform the author at ##AUTHORMAIL## .<br /><br />##PLUGINNAME## plugin contains the following filters:<br /><br /><strong><em>kocujsitemap_additionalmultilangphpclasses</em></strong><br /><br /><em>Parameters:</em><ol><li>array - a list of other PHP classes that support multi-language plugins and they are not built-in into the ##PLUGINNAME## plugin</li></ol><em>Returned value:</em><ol><li>array - a list of PHP classes that support multi-language plugins and they are not built-in into the ##PLUGINNAME## plugin</li></ol><em>Description:</em><br /><br />This filter adds a PHP class for supporting multi-language websites. To add a new PHP class, you need to add a new element to array which contains the following fields:<ul><li><em>dir</em> - full path to the file with a new PHP class,</li><li><em>class</em> - PHP class name.</li></ul>More information about this functionality can be found by looking into file <em>classes/multilang/qtranslate.class.php</em> which can be a good example for developer of another PHP class.<br /><br />This filter is available from version 1.2.0 of the ##PLUGINNAME## plugin.<br /><br /><strong><em>kocujsitemap_defaultclass</em></strong><br /><br /><em>Parameters:</em><ol><li>string - text with all default CSS classes for a sitemap container (block element <em>div</em> or <em>nav</em>)</li></ol><em>Returned value:</em><ol><li>string - text with all default CSS classes for a sitemap container (block element <em>div</em> or <em>nav</em>)</li></ol><em>Description:</em><br /><br />This filter sets the default CSS class that is used in the block element of the sitemap. It is used if there is not specified <em>class</em> parameter in the ##SHORTCODE## shortcode, or if there is not specified <em>$class</em> parameter in the <em>kocujsitemap_show_sitemap</em> PHP function.<br /><br /><strong><em>kocujsitemap_defaultmenus</em></strong><br /><br /><em>Parameters:</em><ol><li>array - a list of menus ID</li></ol><em>Returned value:</em><ol><li>array - a list of menus ID</li></ol><em>Description:</em><br /><br />This filter sets the default list of menus that appear in the sitemap if the list in the "menus list" in administration panel is empty. This filter exists only in WordPress version 3.0 and newer.<br /><br /><strong><em>kocujsitemap_defaulttitle</em></strong><br /><br /><em>Parameters:</em><ol><li>string - text with default title for link to the main page</li><li>string - current locale (this parameter is available from version 1.2.0 of the ##PLUGINNAME## plugin)</li></ol><em>Returned value:</em><ol><li>string - text with default title for link to the main page</li></ol><em>Description:</em><br /><br />This filter sets the default title that is used in the link to the main page in the sitemap. It is used if there is not specified <em>title</em> parameter in the ##SHORTCODE## shortcode, or if there is not specified <em>$title</em> parameter in the <em>kocujsitemap_show_sitemap</em> PHP function.<br /><br /><strong><em>kocujsitemap_firstclass</em></strong><br /><br /><em>Parameters:</em><ol><li>string - text with CSS class for first element in the sitemap</li></ol><em>Returned value:</em><ol><li>string - text with CSS class for first element in the sitemap</li></ol><em>Description:</em><br /><br />This filter sets the CSS class that is used in the first element of the sitemap.<br /><br /><strong><em>kocujsitemap_linktitle</em></strong><br /><br /><em>Parameters:</em><ol><li>string - text with link title</li><li>int - object ID or 0 for link to the main page (this parameter is available from version 1.2.0 of the ##PLUGINNAME## plugin)</li><li>string - object type; available values: "post" for post, "page" for page, "menu" for menu item (only in WordPress version 3.0 and newer), "category" for category and "home" for link to the main page (this parameter is available from version 1.2.0 of the ##PLUGINNAME## plugin)</li><li>string - current locale (this parameter is available from version 1.2.0 of the ##PLUGINNAME## plugin)</li></ol><em>Returned value:</em><ol><li>string - text with link title</li></ol><em>Description:</em><br /><br />This filter sets the link title.<br /><br /><strong><em>kocujsitemap_menuelement</em></strong><br /><br /><em>Parameters:</em><ol><li>string - menu option with all HTML tags and attributes</li><li>int - object ID for menu item</li><li>string - current locale (this parameter is available from version 1.2.0 of the ##PLUGINNAME## plugin)</li></ol><em>Returned value:</em><ol><li>string - menu option with all HTML tags and attributes</li></ol><em>Description:</em><br /><br />This filter sets a menu option - with all HTML tags and attributes. This filter exists only in WordPress version 3.0 and newer. The shortcode ##SHORTCODE## has optional parameters:<ul><li><em>title</em> - text that will be used as the title of the link to the main page,</li><li><em>class</em> - name of the style sheet class that will be added to the block element (<em>div</em> or <em>nav</em>) containing the entire sitemap.</li></ul>For example, if you add:<br />##SHORTCODEEXAMPLE##<br />the sitemap will be displayed in the block element (<em>div</em> or <em>nav</em>) with the CSS class <em>new_class</em> and link to the home page with title <em>NEW TITLE</em>.<br /><br />If you do not want to put the sitemap in the article, you can edit the PHP file responsible for the theme. ##PLUGINNAME## plugin defines global PHP function which declaration is as follows:<br />##PHPFUNCTION##<br />The parameters <em>$title</em> and <em>$class</em> perform the same function as the corresponding parameters in the shortcode ##SHORTCODE##. For example, if you add:<br />##PHPEXAMPLE##<br />the sitemap will be displayed in the block element (<em>div</em> or <em>nav</em>) with the CSS class <em>new_class</em> and link to the home page with title <em>NEW TITLE</em>. There are available the following languages for ##PLUGINNAME## plugin:<ul><li><em>English</em> (default),</li><li><em>French</em> (file <em>languages/kocuj-sitemap-fr_FR.mo</em>; translated by: <a href="http://profiles.wordpress.org/mister-klucha" rel="external">Richard Macareno ("mister klucha")</a>),</li><li><em>Polish</em> (file <em>languages/kocuj-sitemap-pl_PL.mo</em>).</li></ul>Plugin ##PLUGINNAME## gives you the ability to translate your texts into other languages. To do this, you should prepare 3 PO files created from the following templates: ##TRANSLATIONFILES## More information about translating are available in ##TRANSLATIONLINK##.<br /><br />If you translate this plugin, please send it to author at ##AUTHORMAIL## to add your contribution to project. There are some additional settings here which changes an appearance of the displayed sitemap. There is option <em>Sitemap</em> in the administration panel, which is used to configure the behavior of the ##PLUGINNAME## plugin. If you select <em>Settings</em> from the plugin menu, you will find yourself in a place where you can set options for the plugin.<br /><br />The settings are divided into tabs. There can be active only one tab at once. Tab is selected by clicking on its name.<br /><br />Each tab contains a set of options. Each option has a description that is displayed when you set mouse cursor over it.<br /><br />Changes in the configuration can be saved by clicking on the <em>Save settings</em> button. Clicking on the <em>Restore default settings</em> button restore the settings that were set after installing a plugin. There will completely transformed plugin Kocuj Sitemap on 27th February 2016. Because there will be many changes, the new version will have also higher requirements than older versions of this plugin. There will completely transformed plugin Kocuj Sitemap on 27th February 2016. Because there will be many changes, the new version will have higher requirements than older versions of this plugin. Click %shere%s to find out if your server or hosting account meets these requirements. If you click on this link, this information will not be displayed anymore. This plugin requires PHP 5 (up to PHP 5.4.x version) and WordPress 2.8 or greater. It is recommended to use WordPress in, at least, 3.5 version. Translations Uninstall Uninstall plugin Uninstall plugin settings Use %s plugin Use %s plugin (if installed and activated) for multi-language websites; uncheck it only if you have any problems because of this setting Use HTML 5 `nav` tag Warning! Your cache directory for sitemap in Kocuj Sitemap plugin (placed in "%s") is not writable. Please, change permissions to this directory to allow the plugin to use cache for better performance. You are using PHP in %s version. Your server or hosting account is not prepared for Kocuj Sitemap plugin in version 2.0.0. Contact with your server or hosting account provider for information about PHP upgrade possibilities. Your server or hosting account is prepared for Kocuj Sitemap plugin in version 2.0.0. Congratulations! sitemap Project-Id-Version: kocuj-sitemap
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2016-01-27 12:24+0100
PO-Revision-Date: 2016-01-27 12:30+0100
Last-Translator: Dominik Kocuj <dominik@kocuj.pl>
Language-Team: 
Language: pl_PL
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
X-Poedit-KeywordsList: _e;__
X-Poedit-Basepath: .
X-Generator: Poedit 1.5.4
X-Poedit-SearchPath-0: .
 Wtyczka ##PLUGINNAME## dodaje krótki kod ##SHORTCODE##, który umieszcza mapę strony w miejscu, w którym został on umieszczony. Pozwala to na wyświetlenie wszystkich odnośników do Twoich wpisów, stron i pozycji menu w dowolnym miejscu na Twojej stronie internetowej - nawet wewnątrz artykułu. Istnieje również funkcja PHP, która pozwala na wyświetlenie mapy strony w dowolnym miejscu na stronie internetowej.<br /><br />Niniejsza wtyczka obsługuje wielojęzyczne strony internetowe. Jeżeli masz zainstalowaną wtyczkę zgodną z ##PLUGINNAME## (obecnie jest to <em>qTranslate</em>), zostanie wygenerowana mapa strony zgodnie z aktualnie wybranym językiem. Jeżeli nie posiadasz wtyczki, która wspiera wielojęzyczność, ##PLUGINNAME## wyświetli mapę strony dla języka domyślnie zdefiniowanego dla Twojej instalacji WordPress.<br /><br />Mapa strony jest automatycznie generowana i przechowywana w pamięci podręcznej po każdej zmianie jakiegokolwiek elementu w panelu administracyjnym, który jest w niej używany (na przykład, gdy zmienisz wpis), aby zapobiec używaniu bazy danych przy wczytywaniu strony. Ten proces przyspiesza wczytywanie Twojej strony internetowej. <ul><li>Wsparcie dla większej ilości wielojęzycznych wtyczek,</li><li>Widżet z mapą strony,</li><li>Więcej parametrów dla krótkiego kodu i funkcji PHP,</li><li>Łatwa kontrola parametrów krótkiego kodu w edytorze HTML i wizualnym,</li><li>Generowanie mapy strony XML dla wyszukiwarek,</li><li>Więcej filtrów zmieniających zachowanie wtyczki.</li></ul>Możesz także zasugerować nowość przez wysłanie wiadomości na adres ##AUTHORMAIL## . Informacje Dodaj krótki kod mapy strony Wybierz elementy i ich kolejność jaką chcesz wyświetlać w mapie strony. Konfiguracja Kontakt Wyświetlaj informację `obsługiwane przez` poniżej mapy strony Wyświetla informacje `obsługiwane przez` poniżej mapy strony z odnośnikiem do strony autora; jeżeli uważasz tą wtyczkę za użyteczną, zachęcam abyś zaznaczył tę opcję Wyświetlaj odnośnik do głównej strony Wyświetlaj menu Wyświetlaj strony Wyświetlaj wpisy Filtry Pomoc Sposób użycia Ikony (strzałki i przycisk zamknięcia) są użyte na licencji %s i zostały dostarczone przez Jeżeli to jest zaznaczone, mapa strony wyświetlać się będzie w znaczniku nawigacyjnym HTML 5 (`nav`); w wersjach przeglądarki Internet Explorer, które nie obsługują HTML 5 (wszystkie wersje poniżej 9), znacznik zostanie zmieniony na `div`; znacznik ten zawsze ma przypisaną klasę `tagnav` Jeżeli to jest zaznaczone, mapa strony będzie wyświetlała odnośnik do głównej strony jako pierwszy wpis Jeżeli to jest zaznaczone, mapa strony będzie wyświetlała menu. Jeżeli to jest zaznaczone, mapa strony będzie wyświetlała strony Jeżeli to jest zaznaczone, mapa strony będzie wyświetlała wpisy i kategorie Jeżeli masz jakiekolwiek sugestie, napisz e-mail na adres ##AUTHORMAIL## .<br /><br />Jeżeli chcesz otrzymywać regularne informacje o niniejszej wtyczce, zostań fanem na Facebooku:<br />##FACEBOOKLINK##<br /><br />Zobacz także oficjalną stronę internetową wtyczki:<br />##WEBSITELINK## Jeżeli chcesz całkowicie usunąć wszystkie ustawienia wtyczki, kliknij na przycisku poniżej. Pamiętaj, że nie możesz odzyskać tych ustawień po reinstalacji wtyczki. Jeżeli chcesz zdeinstalować niniejszą wtyczkę, możesz ją deaktywować w menu Wtyczki/Zainstalowane wtyczki. Potem możesz ponownie instalować tą wtyczkę bez utraty jakichkolwiek ustawień. Informacje o przyszłej wersji wtyczki Kocuj Sitemap Przyciski wtyczki WordPress Kocuj Sitemap Błąd wczytywania! Sprawdź swoje połączenie internetowej i odśwież stronę, aby spróbować ponownie. Wczytywanie, proszę czekać Menu Lista menu Menu, które powinny zostać uwzględnione w mapie strony; działa tylko, gdy opcja `wyświetlaj menu` jest zaznaczona Menu, strony, wpisy Menu, wpisy, strony Wtyczki obsługujące wielojęzyczność Nowa wersja będzie wymagała PHP w - minimum - wersji 5.3. Brak menu. Opcje będą tu aktywne, gdy tylko dodasz jakiekolwiek menu. Kolejność elementów w mapie strony Inne Strony, menu, wpisy Strony, wpisy Strony, wpisy, menu Planowane zmiany Wpisy, menu, strony Wpisy, strony Wpisy, strony, menu Obsługiwane przez wtyczkę %s Wymagania Przywraca domyślne ustawienia Przywróć domyślne ustawienia Zapisuje aktualne ustawienia Zapisz ustawienia Wybeirz wszystkie menu, które chcesz wyświetlać w mapie strony. Możesz dodawać nowe wartości, usuwać te, które chcesz i zmieniać ich kolejność. Wszelkie zmiany zostaną zapisane tylko wtedy, gdy klikniesz na przycisku "zapisz ustawienia". Wybierz wtyczki, których chcesz używać na wielojęzycznej stronie internetowej. Musisz je również zainstalować i aktywować, aby ustawienia te działały prawidłowo. Jeżeli nie chcesz ustawiać wielojęzycznej strony internetowej, możesz zostawić tą sekcję taką jaka jest albo odznaczyć wszystkie znajdujące się tu ustawienia, gdyby występowały jakiekolwiek z nimi problemy. Ustawia kolejność elementów w mapie strony; element, który jest niedostępny (menu, strony lub wpisy) nie będzie wyświetlany Ustawienia Mapa strony Format mapy strony <a href="http://profiles.wordpress.org/domko/" rel="external">Dominik Kocuj</a> Wtyczka ##PLUGINNAME## zawiera zestaw filtrów, które umożliwiają na dokonywanie zmian niektórych zachowań wtyczki. Pozwala to na dostosowanie jej do wymagań programisty innej wtyczki lub motywu bez dokonywania zmian w kodzie ##PLUGINNAME##.<br /><br />Jeżeli uważasz, że wtyczka ##PLUGINNAME## powinna posiadać jeszcze inny filtr, proszę abyś napisał na adres ##AUTHORMAIL## .<br /><br />Wtyczka ##PLUGINNAME## zawiera następujące filtry:<br /><br /><strong><em>kocujsitemap_additionalmultilangphpclasses</em></strong><br /><br /><em>Parametry:</em><ol><li>array - lista innych klas PHP, które obsługują wielojęzyczne wtyczki i nie są one wbudowane we wtyczkę ##PLUGINNAME##</li></ol><em>Zwracana wartość:</em><ol><li>array - lista klas PHP, które obsługują wielojęzyczne wtyczki i nie są one wbudowane we wtyczkę ##PLUGINNAME##</li></ol><em>Opis:</em><br /><br />Filtr dodaje klasę PHP dla obsługi wielojęzycznych stron internetowych. Aby dodać nową klasę PHP, należy dodać nowy element do tablicy, który zawiera następujące pola:<ul><li><em>dir</em> - pełna ścieżka dostępu do pliku z nową klasą PHP,</li><li><em>class</em> - nazwa klasy PHP.</li></ul>Więcej informacji na temat tej funkcjonalności można znaleźć przez przeglądnięcie pliku <em>classes/multilang/qtranslate.class.php</em>, który stanowi dobry przykład dla twórcy innej klasy PHP.<br /><br />Filtr jest dostępny od wersji 1.2.0 wtyczki ##PLUGINNAME##.<br /><br /><strong><em>kocujsitemap_defaultclass</em></strong><br /><br /><em>Parametry:</em><ol><li>string - tekst ze wszystkimi domyślnymi klasami CSS dla kontenera mapy strony (blokowego elementu <em>div</em> lub <em>nav</em>)</li></ol><em>Zwracana wartość:</em><ol><li>string - tekst ze wszystkimi domyślnymi klasami CSS dla kontenera mapy strony (blokowego elementu <em>div</em> lub <em>nav</em>)</li></ol><em>Opis:</em><br /><br />Filtr ustawia domyślną klasę CSS, która będzie używana w blokowym elemencie zawierającym mapę strony. Używama jest ona wtedy, gdy nie zostanie ustawiony parametr <em>class</em> w krótkim kodzie ##SHORTCODE## lub gdy nie zostanie ustawiony parametr <em>$class</em> w funkcji PHP <em>kocujsitemap_show_sitemap</em>.<br /><br /><strong><em>kocujsitemap_defaultmenus</em></strong><br /><br /><em>Parametry:</em><ol><li>array - lista identyfikatorów menu</li></ol><em>Zwracana wartość:</em><ol><li>array - lista identyfikatorów menu</li></ol><em>Opis:</em><br /><br />Filtr ustawia domyślną listę menu, które zostaną wyświetlone w mapie strony, gdy lista menu w sekcji "lista menu" w panelu administracyjnym jest pusta. Ten filtr istnieje tylko w WordPress w wersji 3.0 i nowszych.<br /><br /><strong><em>kocujsitemap_defaulttitle</em></strong><br /><br /><em>Parametry:</em><ol><li>string - tekst z domyślnym tytułem odnośnika do strony głównej</li><li>string - aktualny język (parametr jest dostępny do wersji 1.2.0 wtyczki ##PLUGINNAME##)</li></ol><em>Zwracana wartość:</em><ol><li>string - tekst z domyślnym tytułem odnośnika do strony głównej</li></ol><em>Opis:</em><br /><br />Filtr ustawia domyślny tytuł, który będzie używany w odnośniku do strony głównej w mapie strony. Używamy jest ona wtedy, gdy nie zostanie ustawiony parametr <em>title</em> w krótkim kodzie ##SHORTCODE## lub gdy nie zostanie ustawiony parametr <em>$title</em> w funkcji PHP <em>kocujsitemap_show_sitemap</em>.<br /><br /><strong><em>kocujsitemap_firstclass</em></strong><br /><br /><em>Parametry:</em><ol><li>string - tekst z klasą CSS dla pierwszego elementu w mapie strony</li></ol><em>Zwracana wartość:</em><ol><li>string - tekst z klasą CSS dla pierwszego elementu w mapie strony</li></ol><em>Opis:</em><br /><br />Filtr ustawia klasę CSS, która jest używana w pierwszym elemencie w mapie strony.<br /><br /><strong><em>kocujsitemap_linktitle</em></strong><br /><br /><em>Parametry:</em><ol><li>string - tekst z tytułem odnośnika</li><li>int - identyfikator obiektu lub 0 dla odnośnika do strony głównej (parametr jest dostępny do wersji 1.2.0 wtyczki ##PLUGINNAME##)</li><li>string - typ obiektu; dostępne wartości: "post" dla wpisu, "page" dla strony, "menu" dla pozycji w menu (tylko w WordPress w wersji 3.0 i nowszych), "category" dla kategorii i "home" dla odnośnika do strony głównej (parametr jest dostępny do wersji 1.2.0 wtyczki ##PLUGINNAME##)</li><li>string - aktualny język (parametr jest dostępny do wersji 1.2.0 wtyczki ##PLUGINNAME##)</li></ol><em>Zwracana wartość:</em><ol><li>string - tekst z tytułem odnośnika</li></ol><em>Opis:</em><br /><br />Filtr ustawia tytuł odnośnika.<br /><br /><strong><em>kocujsitemap_menuelement</em></strong><br /><br /><em>Parametry:</em><ol><li>string - opcja menu ze znacznikami HTML i atrybutami</li><li>int - identyfikator obiektu dla pozycji menu</li><li>string - aktualny język (parametr jest dostępny do wersji 1.2.0 wtyczki ##PLUGINNAME##)</li></ol><em>Zwracana wartość:</em><ol><li>string - opcja menu ze znacznikami HTML i atrybutami</li></ol><em>Opis:</em><br /><br />Filtr ustawia opcję menu - ze wszystkimi znacznikami HTML i atrybutami. Ten filtr istnieje tylko w WordPress w wersji 3.0 i nowszych. Krótki kod ##SHORTCODE## posiada opcjonalne parametry:<ul><li><em>title</em> - tekst, który będzie wyświetlany jako odnośnik do strony głównej,</li><li><em>class</em> - nazwa klasy arkusza stylów, która będzie dodana do blokowego elementu (<em>div</em> lub <em>nav</em>) zawierającego całą mapę strony.</li></ul>Na przykład, jeżeli dodasz:<br />##SHORTCODEEXAMPLE##<br />to mapa strony będzie wyświetlana w blokowym elemencie (<em>div</em> lub <em>nav</em>) z klasą CSS <em>new_class</em> i odnośnikiem do strony głównej zatytułowanym <em>NEW TITLE</em>.<br /><br />Jeżeli nie chcesz umieszczać mapy strony w artykule, możesz edytować plik PHP odpowiedzialny za motyw. Wtyczka ##PLUGINNAME## definiuje globalną funkcję PHP, której deklaracja przedstawia się następująco:<br />##PHPFUNCTION##<br />Parametry <em>$title</em> i <em>$class</em> spełniają te same funkcje jak odpowiadające im parametry w krótkim kodzie ##SHORTCODE##. Na przykład, jeżeli dodasz:<br />##PHPEXAMPLE##<br />to mapa strony będzie wyświetlana w blokowym elemencie (<em>div</em> lub <em>nav</em>) z klasą CSS <em>new_class</em> i odnośnikiem do strony głównej zatytułowanym <em>NEW TITLE</em>. Wtyczka ##PLUGINNAME## zawiera następujące języki:<ul><li><em>angielski</em> (domyślny),</li><li><em>francuski</em> (plik <em>languages/kocuj-sitemap-fr_FR.mo</em>; tłumaczenie: <a href="http://profiles.wordpress.org/mister-klucha" rel="external">Richard Macareno ("mister klucha")</a>),</li><li><em>polski</em> (plik <em>languages/kocuj-sitemap-pl_PL.mo</em>).</li></ul>Wtyczka ##PLUGINNAME## umożliwia tłumaczenie jej tekstów na inne języki. Aby to zrobić, należy przygotować 3 pliki PO utworzone z następujących szablonów: ##TRANSLATIONFILES## Więcej informacji o tłumaczeniu znajduje się tutaj: ##TRANSLATIONLINK##.<br /><br />Jeżeli przetłumaczysz niniejszą wtyczkę, proszę abyś wysłał swoją pracę do autora na adres ##AUTHORMAIL##, aby włożyć swój wkład do projektu. Tutaj znajdują się dodatkowe ustawienia, które zmieniają wygląd wyświetlanej mapy strony. W panelu administracyjnym znajduje się opcja <em>Mapa strony</em>, która służy do konfigurowania zachowania wtyczki ##PLUGINNAME##. Jeżeli wybierzesz <em>Ustawienia</em> z menu wtyczki, znajdziesz się w miejscu, w którym możesz ustawiać jej opcje.<br /><br />Ustawienia podzielone są na zakładki. W danym momencie może być aktywna tylko jedna z nich. Zakładkę wybiera się poprzez kliknięcie na jej nazwie.<br /><br />Każda z zakładek zawiera zestaw opcji. Każda z tych opcji posiada opis, który jest wyświetlany w momencie najechania na nią kursorem myszy.<br /><br />Zmiany w konfiguracji mogą zostać zapisane przez kliknięcie na przycisku <em>Zapisz ustawienia</em>. Przycisk <em>Przywróć domyślne ustawienia</em> przywraca te ustawienia, które były dostępne zaraz po instalacji wtyczki. Wtyczka Kocuj Sitemap będzie całkowicie zmieniona w dniu 27 lutego 2016. Ponieważ będzie zawierała ona wiele zmian, nowa wersja będzie również miała wyższe wymagania niż starsze wersje wtyczki. Wtyczka Kocuj Sitemap będzie całkowicie zmieniona w dniu 27 lutego 2016. Ponieważ będzie zawierała ona wiele zmian, nowa wersja będzie również miała wyższe wymagania niż starsze wersje wtyczki. Kliknij %stutaj%s, aby sprawdzić czy Twój serwer lub konto hostingowe spełnia te wymagania. Jeżeli klikniesz na tym odnośniku, informacja ta nie będzie już więcej wyświetlana. Niniejsza wtyczka wymaga PHP 5 (do wersji PHP 5.4.x) i WordPress w wersji 2.8 lub nowszej. Zalecane jest używanie WordPress przynajmniej w wersji 3.5. Tłumaczenia Deinstalacja Deinstaluj wtyczkę Deinstaluje ustawienia wtyczki Używaj wtyczki %s Użyj wtyczki %s (jeżeli jest zainstalowana i aktywowana) dla stron wielojęzycznych; odznacz to tylko, gdy masz jakiekolwiek problemy wynikające z tego ustawienia Używaj znacznika HTML 5 `nav` Uwaga! Katalog pamięci podręcznej dla mapy strony we wtyczce Kocuj Sitemap (umieszczony w "%s") jest zablokowany przed zapisem. Proszę zmienić uprawnienia do tego katalogu, aby pozwolić wtycze używać pamięci podręcznej dla poprawienia wydajności. Używasz PHP w wersji %s. Twój serwer lub konto hostingowe nie jest gotowe na wtyczkę Kocuj Sitemap w wersji 2.0.0. Skontaktuj się z dostawcą Twojego serwera lub konta hostingowego w celu uzyskania informacji o możliwościach uaktualnienia PHP. Twój serwer lub konto hostingowe jest gotowe na wtyczkę Kocuj Sitemap w wersji 2.0.0. Gratulacje! mapa strony 