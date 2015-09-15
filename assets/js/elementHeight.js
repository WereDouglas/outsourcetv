$(document).ready(function() {


	var windowHeight = $(window).height();
	var headerHeight = $('.header-wrapper').height();
	var footerHeight = $('.footer-wrapper').height();
	var contentHeight = windowHeight - (headerHeight + footerHeight);
	var scrollboxHeight = contentHeight * 0.75;
	var contactblockHeight = contentHeight * 0.7;




	// $('.content-wrapper, .side-content').css('height', contentHeight);
	// $('.home .content-wrapper').css('height', 'auto');

	// $('.scroll-box').css('max-height', scrollboxHeight);
	// $('.contact-block').css('max-height', contactblockHeight);
	// $('.contact-block-map iframe').css('height', contactblockHeight);








});