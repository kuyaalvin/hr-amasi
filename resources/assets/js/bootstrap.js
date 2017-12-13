
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js').default;
require('bootstrap');
window.JSZip = require('jszip');
require('datatables.net-bs4');
require('datatables.net-buttons-bs4');
require('datatables.net-buttons/js/buttons.colVis.js');
require('datatables.net-buttons/js/buttons.html5.js');
require('datatables.net-scroller');
require('jquery-timepicker/jquery.timepicker.js');
require("jquery-ui/ui/widgets/autocomplete");
} catch (e) {}
