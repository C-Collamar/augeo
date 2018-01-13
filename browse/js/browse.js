$("#browse_nav").addClass("active");

var $grid = $(".grid").masonry({
	itemSelector: ".grid-item",
	columnWidth: ".grid-sizer",
	// gutter: 10,
	percentPosition: true,
	horizontalOrder: true
});

function toggleOptionPanel() {
	$("#browse-content").toggleClass("expand");
	$("#side-panel").toggleClass("contract");
}

// $(window).resize(function(event) {
// 	grid.masonry("reload");
// })

console.log(document.getElementsByClassName("grid-sizer")[0].offsetWidth);