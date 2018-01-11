var treeStruct = [
	{
		text: "Account",
		selectable: false,
		state: { expanded: true, },
		tags: ['available'],
		nodes: [{
			text: "Items you sell for auction",
			state: { selected: true }
		}, {
			text: "Items you participate in bidding"
		}]
	}, {
		text: "Sucessful auctions",
		selectable: false,
		nodes: [{
			text: "You as the bidder"
		}, {
			text: "You as the seller"
		}]
	}, {
		text: "Unsucessful auctions",
		selectable: false,
		nodes: [{
			text: "You as the bidder"
		}, {
			text: "You as the seller"
		}]
	}, {
		text: "Statistics"
	}
];

var tree = $('#tree');
tree.treeview({
	data: treeStruct,
	selectedBackColor: "#a0495e",
	onNodeSelected: update_view
});

function update_view(event, node) {
	$.ajax({
		url: "php/request_handler.php",
		type: "GET",
		data: { id: node.nodeId },
		success: display_content,
		error: handle_error
	});
}

function handle_error(result, status, xhr) {
	console.error(status, xhr);
}