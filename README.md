# Frameworks used:
 - jQuery
 - Bootstrap


# Website architecture:
All the pages use the same HTML layout defined in `templates/layout.php`. This script makes use of the functions provided by `includes/content-helper.php` to generate the content of each page.

For each page of the website there are two php scripts, one in `pages/` and one in `templates/` (e.g. `pages/smartphone.php`, `templates/smartphone.tpl.php`).

The scripts in `pages/` behave like a sort of plugin that modify the behavior of `content-helper.php` by defining some functions.
The scripts in `template/` work in a similar way, but are kept separate to make writing HTML code simpler. Their content is buffered by `content-helper.php` and made available through some specific functions.

See `includes/content-helper.php` for more info.

This architecture allows to write a single generic script (`layout.php`) that calls a defined set of functions (those of `content-helper.php`) to generate all the pages.


# Navigation:
The main layout is loaded once, while the content of the page is dynamically updated by means of AJAX requests.
The URL is constantly updated using the HTML5 History API.

The content of each page is provided in three different ways:
 - When the GET/POST variable `ajax_new_page` is set, the page-specific HTML code is returned as JSON object. These requests are used to go from page A to page B.
 - When the GET/POST variable `ajax` is set, a page-specific JSON object is returned. This is used to update the content of the pages (e.g. apply new filtering rules to a product list).
 - If neither of these two variables are defined, the entire HTML code of the page is returned, layout included. These requests are mostly used for the first page load or page refreshes.

Example:
 - `?page=devices-smartphones`
 - `?page=devices-smartphones&ajax=1`
 - `?page=devices-smartphones&ajax_new_page=1`


# Additional notes:
The layout of the page is adjusted depending on the size of the window, so the same code is used for the desktop and the mobile version.


# Mobile application:
The mobile application is basically a wrapper of the website. However, it accesses a slightly modified version of it available at `index_phonegap.php`. The main differences between `index.php` and `index_phonegap.php` are that the latter translates some relative URLs to absolute URLs with simple string replacements and adds two `<script>` tags, one for `cordova.js` and the other for `app-custom-code.js`.

