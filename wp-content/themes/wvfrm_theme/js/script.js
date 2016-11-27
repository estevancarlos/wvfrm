"use strict";

jQuery(document).ready(function ($) {
    function toggleAccordion() {
        if ($(window).width() < 992) {
            $("#accordion").accordion();
        } else {
            $("#accordion").accordion("destroy");
        }
    }

    $("a[target='_blank']").each(function () {
        $(this).append("<i class='fa fa-external-link fa-fw' aria-hidden='true'></i>");
    });

    //http://stackoverflow.com/a/10770580/1088526
    $(window).resize(function () {
        toggleAccordion();
    });
});
'use strict';

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function () {
	var isWebkit = navigator.userAgent.toLowerCase().indexOf('webkit') > -1,
	    isOpera = navigator.userAgent.toLowerCase().indexOf('opera') > -1,
	    isIe = navigator.userAgent.toLowerCase().indexOf('msie') > -1;

	if ((isWebkit || isOpera || isIe) && document.getElementById && window.addEventListener) {
		window.addEventListener('hashchange', function () {
			var id = location.hash.substring(1),
			    element;

			if (!/^[A-z0-9_-]+$/.test(id)) {
				return;
			}

			element = document.getElementById(id);

			if (element) {
				if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false);
	}
})();