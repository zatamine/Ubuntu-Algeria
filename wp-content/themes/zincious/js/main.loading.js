
function paddAppendClear() {
	jQuery('.append-clear').append('<div class="clear"></div>');
}

function paddAppendMask() {
	jQuery('.append-mask').append('<span class="mask"></span>');
}

function paddWrapInner1() {
	jQuery('.wrap-inner-1').wrapInner('<div class="inner"></div>');
}

function paddWrapInner3() {
	jQuery('.wrap-inner-3').wrapInner('<div class="m"></div>');
	jQuery('.wrap-inner-3').prepend('<div class="t"></div>');
	jQuery('.wrap-inner-3').append('<div class="b"></div>');
}

function paddToggle(classname,value) {
	jQuery(classname).focus(function() {
		if (value == jQuery(classname).val()) {
			jQuery(this).val('');
		}
	});
	jQuery(classname).blur(function() {
		if ('' == jQuery(classname).val()) {
			jQuery(this).val(value);
		}
	});
}

function paddCreateSlideShow() {
	jQuery('div#slideshow').append('<a class="button button-l" id="jqc-prev" href="#"></a>');
	jQuery('div#slideshow').append('<a class="button button-r" id="jqc-next" href="#"></a>');
	len = jQuery('div#slideshow div.list div.item').length;
	jQuery('div#slideshow .button-l').css('z-index',len+100);
	jQuery('div#slideshow .button-r').css('z-index',len+101);
	jQuery('div#slideshow div.list').cycle({ 
		fx: 'scrollHorz', 
		cleartypeNoBg: true,
		speed: 1500, 
		timeout: 5500,
		prev: '#jqc-prev',
		next: '#jqc-next',
 	});
}

jQuery(document).ready(function() {
	jQuery.noConflict();
	
	jQuery('div#menubar div > ul').supersubs({
		minWidth: 18, 
		maxWidth: 30, 
		extraWidth: 1 
	}).superfish({
		hoverClass: 'hover',
		speed: 500,
		animation: { opacity: 'show', height: 'show' }
	});
	
	paddAppendClear();
	paddAppendMask();
	paddWrapInner1();
	paddWrapInner3();
	paddCreateSlideShow();
	
	jQuery('input#s').val('Rechercher dans le site');
	paddToggle('input#s','Rechercher dans le site');

	jQuery('div.search form').click(function () {
		jQuery('input#s').focus();
	});

	paddToggle('input#comment-author','Name');
	paddToggle('input#comment-email','Email');
	paddToggle('input#comment-url','Website');
	paddToggle('textarea#comment-comment','Message');

});
