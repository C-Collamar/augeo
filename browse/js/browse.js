window.onload = function() {
	$('#browse_nav').addClass('active');

	var $grid = $('.grid').masonry({
		itemSelector: '.grid-item',
		columnWidth: '.grid-sizer',
		percentPosition: true,
		horizontalOrder: true
	});
};

function toggleOptionPanel() {
	$('#browse-content').toggleClass('expand');
	$('#side-panel').toggleClass('contract');
	$('.grid').masonry();
};