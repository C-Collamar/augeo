$("#browse_nav").addClass("active");

function toggleOptionPanel() {
    $("#browse-content").toggleClass("expand");
    $("#side-panel").toggleClass("contract");
}

var grid = $(".grid").masonry({
	itemSelector: ".grid-item",
	columnWidth: ".grid-sizer",
	gutter: 10,
	percentPosition: true,
	horizontalOrder: true
  });

$(".grid").onresize(function(event) {
	grid.masonry("reload");
})