(function ($) {
	"use strict";

	jQuery(document).ready(function ($) {
		$('.item-schedules_items .button-schedules-popup').magnificPopup({
			type: 'inline',
			removalDelay: 500,
			midClick: true,
			closeBtnInside: true,
		});
	});

	// let $button = $scope.find('.item-schedules_items .button-schedules');
	// $button.click(function () {
	// 	$(this).parent().find('.description-schedules').slideToggle("500");
	// 	$(this).toggleClass("active");
	// });
	// $('.item-image').tooltipster({
	// 	theme: 'opal-schedules-tooltipster',
	// 	functionInit: function (instance, helper) {
	// 		var content = $(helper.origin).find(".tooltipster-speaker-content").detach();
	// 		instance.content(content);
	// 	},
	// 	delay: 0,
	// 	animation: 'grow',
	// 	// trigger: 'click'
	// });

})(jQuery);