
var tpj = jQuery;

var revapi2;

if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider21"] = {
	once: RS_MODULES.modules["revslider21"] !== undefined ? RS_MODULES.modules["revslider21"].once : undefined, init: function () {
		window.revapi2 = window.revapi2 === undefined || window.revapi2 === null || window.revapi2.length === 0 ? document.getElementById("rev_slider_2_1") : window.revapi2;
		if (window.revapi2 === null || window.revapi2 === undefined || window.revapi2.length == 0) { window.revapi2initTry = window.revapi2initTry === undefined ? 0 : window.revapi2initTry + 1; if (window.revapi2initTry < 20) requestAnimationFrame(function () { RS_MODULES.modules["revslider21"].init() }); return; }
		window.revapi2 = jQuery(window.revapi2);
		if (window.revapi2.revolution == undefined) { revslider_showDoubleJqueryError("rev_slider_2_1"); return; }
		revapi2.revolutionInit({
			revapi: "revapi2",
			DPR: "dpr",
			sliderLayout: "fullscreen",
			visibilityLevels: "1240,1240,1240,480",
			gridwidth: "1350,1350,1350,480",
			gridheight: "750,750,750,320",
			autoHeight: true,
			lazyType: "smart",
			spinner: "spinner0",
			perspective: 600,
			perspectiveType: "local",
			editorheight: "750,600,500,320",
			responsiveLevels: "1240,1240,1240,480",
			progressBar: { disableProgressBar: true },
			navigation: {
				mouseScrollNavigation: false,
				wheelCallDelay: 1000,
				onHoverStop: false,
				arrows: {
					enable: true,
					style: "uranus",
					left: {
						h_offset: 50
					},
					right: {
						h_offset: 50
					}
				}
			},
			parallax: {
				levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
				type: "mouse"
			},
			viewPort: {
				global: true,
				globalDist: "-200px",
				enable: false,
				visible_area: "20%"
			},
			fallbacks: {
				allowHTML5AutoPlayOnAndroid: true
			},
		});

	}
} // End of RevInitScript

if (window.RS_MODULES.checkMinimal !== undefined) { window.RS_MODULES.checkMinimal(); };


if (!navigator.cookieEnabled) {
	window.addEventListener('DOMContentLoaded', function () {
		var cookieEl = document.getElementById('cookie-alert');
		cookieEl.style.display = 'block';
	})
}

(function () { function d() { var b = a.getElementById("cf-footer-item-ip"), c = a.getElementById("cf-footer-ip-reveal"); b && "classList" in b && (b.classList.remove("hidden"), c.addEventListener("click", function () { c.classList.add("hidden"); a.getElementById("cf-footer-ip").classList.remove("hidden") })) } var a = document; document.addEventListener && a.addEventListener("DOMContentLoaded", d) })();

window._cf_translation = {};




window._wpemojiSettings = { "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/", "ext": ".png", "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/", "svgExt": ".svg", "source": { "concatemoji": "https:\/\/mme-see.org\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.1.1" } };
/*! This file is auto-generated */
!function (e, a, t) { var n, r, o, i = a.createElement("canvas"), p = i.getContext && i.getContext("2d"); function s(e, t) { var a = String.fromCharCode, e = (p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, e), 0, 0), i.toDataURL()); return p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, t), 0, 0), e === i.toDataURL() } function c(e) { var t = a.createElement("script"); t.src = e, t.defer = t.type = "text/javascript", a.getElementsByTagName("head")[0].appendChild(t) } for (o = Array("flag", "emoji"), t.supports = { everything: !0, everythingExceptFlag: !0 }, r = 0; r < o.length; r++)t.supports[o[r]] = function (e) { if (p && p.fillText) switch (p.textBaseline = "top", p.font = "600 32px Arial", e) { case "flag": return s([127987, 65039, 8205, 9895, 65039], [127987, 65039, 8203, 9895, 65039]) ? !1 : !s([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819]) && !s([55356, 57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203, 56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447]); case "emoji": return !s([129777, 127995, 8205, 129778, 127999], [129777, 127995, 8203, 129778, 127999]) }return !1 }(o[r]), t.supports.everything = t.supports.everything && t.supports[o[r]], "flag" !== o[r] && (t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && t.supports[o[r]]); t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && !t.supports.flag, t.DOMReady = !1, t.readyCallback = function () { t.DOMReady = !0 }, t.supports.everything || (n = function () { t.readyCallback() }, a.addEventListener ? (a.addEventListener("DOMContentLoaded", n, !1), e.addEventListener("load", n, !1)) : (e.attachEvent("onload", n), a.attachEvent("onreadystatechange", function () { "complete" === a.readyState && t.readyCallback() })), (e = t.source || {}).concatemoji ? c(e.concatemoji) : e.wpemoji && e.twemoji && (c(e.twemoji), c(e.wpemoji))) }(window, document, window._wpemojiSettings);



window.RS_MODULES = window.RS_MODULES || {};
window.RS_MODULES.modules = window.RS_MODULES.modules || {};
window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
window.RS_MODULES.defered = true;
window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
window.RS_MODULES.type = 'compiled';


var elementorFrontendConfig = { "environmentMode": { "edit": false, "wpPreview": false, "isScriptDebug": false }, "i18n": { "shareOnFacebook": "Share on Facebook", "shareOnTwitter": "Share on Twitter", "pinIt": "Pin it", "download": "Download", "downloadImage": "Download image", "fullscreen": "Fullscreen", "zoom": "Zoom", "share": "Share", "playVideo": "Play Video", "previous": "Previous", "next": "Next", "close": "Close" }, "is_rtl": false, "breakpoints": { "xs": 0, "sm": 480, "md": 768, "lg": 1025, "xl": 1440, "xxl": 1600 }, "responsive": { "breakpoints": { "mobile": { "label": "Mobile", "value": 767, "default_value": 767, "direction": "max", "is_enabled": true }, "mobile_extra": { "label": "Mobile Extra", "value": 880, "default_value": 880, "direction": "max", "is_enabled": false }, "tablet": { "label": "Tablet", "value": 1024, "default_value": 1024, "direction": "max", "is_enabled": true }, "tablet_extra": { "label": "Tablet Extra", "value": 1200, "default_value": 1200, "direction": "max", "is_enabled": false }, "laptop": { "label": "Laptop", "value": 1366, "default_value": 1366, "direction": "max", "is_enabled": false }, "widescreen": { "label": "Widescreen", "value": 2400, "default_value": 2400, "direction": "min", "is_enabled": false } } }, "version": "3.11.2", "is_static": false, "experimentalFeatures": { "e_dom_optimization": true, "e_optimized_assets_loading": true, "e_optimized_css_loading": true, "a11y_improvements": true, "additional_custom_breakpoints": true, "landing-pages": true, "kit-elements-defaults": true }, "urls": { "assets": "https:\/\/mme-see.org\/wp-content\/plugins\/elementor\/assets\/" }, "swiperClass": "swiper-container", "settings": { "editorPreferences": [] }, "kit": { "stretched_section_container": "body", "body_background_background": "classic", "active_breakpoints": ["viewport_mobile", "viewport_tablet"], "global_image_lightbox": "yes", "lightbox_enable_counter": "yes", "lightbox_enable_fullscreen": "yes", "lightbox_enable_zoom": "yes", "lightbox_enable_share": "yes", "lightbox_title_src": "title", "lightbox_description_src": "description" }, "post": { "id": 0, "title": "2023 &#8211; MME SEE", "excerpt": "" } };
var wpforms_choicesjs_config = {"removeItemButton":"1","shouldSort":"","fuseOptions":{"threshold":0.1,"distance":1000},"loadingText":"Loading...","noResultsText":"No results found","noChoicesText":"No choices to choose from","itemSelectText":"Press to select","uniqueItemText":"Only unique values can be added","customAddItemText":"Only values matching specific conditions can be added"};

var wpformsElementorVars = {"captcha_provider":"recaptcha","recaptcha_type":"v2"};

var wpformsDispatchEvent = function (el, ev, custom) {
	var e = document.createEvent(custom ? "CustomEvent" : "HTMLEvents");
	custom ? e.initCustomEvent(ev, true, true, false) : e.initEvent(ev, true, true);
	el.dispatchEvent(e);
};
var wpformsRecaptchaCallback = function (el) {
	var hdn = el.parentNode.querySelector(".wpforms-recaptcha-hidden");
	var err = el.parentNode.querySelector("#g-recaptcha-hidden-error");
	hdn.value = "1";
	wpformsDispatchEvent(hdn, "change", false);
	hdn.classList.remove("wpforms-error");
	err && hdn.parentNode.removeChild(err);
};
var wpformsRecaptchaLoad = function () {
	Array.prototype.forEach.call(document.querySelectorAll(".g-recaptcha"), function (el) {
		try {
			var recaptchaID = grecaptcha.render(el, {
				callback: function () {
					wpformsRecaptchaCallback(el);
				}
			});
			el.setAttribute("data-recaptcha-id", recaptchaID);
		} catch (error) { }
	});
	wpformsDispatchEvent(document, "wpformsRecaptchaLoaded", true);
};


var wpforms_settings = {"val_required":"This field is required.","val_email":"Please enter a valid email address.","val_email_suggestion":"Did you mean {suggestion}?","val_email_suggestion_title":"Click to accept this suggestion.","val_email_restricted":"This email address is not allowed.","val_number":"Please enter a valid number.","val_number_positive":"Please enter a valid positive number.","val_confirm":"Field values do not match.","val_checklimit":"You have exceeded the number of allowed selections: {#}.","val_limit_characters":"{count} of {limit} max characters.","val_limit_words":"{count} of {limit} max words.","val_recaptcha_fail_msg":"Google reCAPTCHA verification failed, please try again later.","val_inputmask_incomplete":"Please fill out the field in required format.","uuid_cookie":"1","locale":"en","wpforms_plugin_url":"https:\/\/mme-see.org\/wp-content\/plugins\/wpforms\/","gdpr":"","ajaxurl":"https:\/\/mme-see.org\/wp-admin\/admin-ajax.php","mailcheck_enabled":"1","mailcheck_domains":[],"mailcheck_toplevel_domains":["dev"],"is_ssl":"1","page_title":"Register","page_id":"660","currency_code":"USD","currency_thousands":",","currency_decimals":"2","currency_decimal":".","currency_symbol":"$","currency_symbol_pos":"left","val_requiredpayment":"Payment is required.","val_creditcard":"Please enter a valid credit card number.","val_post_max_size":"The total size of the selected files {totalSize} MB exceeds the allowed limit {maxSize} MB.","val_time12h":"Please enter time in 12-hour AM\/PM format (eg 8:45 AM).","val_time24h":"Please enter time in 24-hour format (eg 22:45).","val_time_limit":"Please enter time between {minTime} and {maxTime}.","val_url":"Please enter a valid URL.","val_fileextension":"File type is not allowed.","val_filesize":"File exceeds max size allowed. File was not uploaded.","post_max_size":"1073741824","val_password_strength":"A stronger password is required. Consider using upper and lower case letters, numbers, and symbols.","val_phone":"Please enter a valid phone number.","richtext_add_media_button":"","entry_preview_iframe_styles":["https:\/\/mme-see.org\/wp-includes\/js\/tinymce\/skins\/lightgray\/content.min.css?ver=6.1.1","https:\/\/mme-see.org\/wp-includes\/css\/dashicons.min.css?ver=6.1.1","https:\/\/mme-see.org\/wp-includes\/js\/tinymce\/skins\/wordpress\/wp-content.css?ver=6.1.1"]}

var witalkJS = { "quote": "<i class=\"fa-quote-right\"><\/i>", "smoothCallback": "", "expand": "Expand child menu", "collapse": "Collapse child menu", "icon": "<i class=\"fa fa-angle-down\"><\/i>" };

