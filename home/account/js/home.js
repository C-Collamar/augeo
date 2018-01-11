var treeStruct = [
	{
		text: "Account Settings",
		selectable: false,
		state: { expanded: true, },
		tags: ['available'],
		nodes: [{
			text: "Profile"

		}, {
			text: "Account"
		},{
			text: "Privacy"
		}
		]
	}, {
		text: "Sucessful auctions",
		selectable: false,
		nodes: [{
			text: "You as the bidder"
		}, {
			text: "You as the seller"
		}]
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
		success: function(result) {
			$("#cc").html(result);
		}

	});
}

function handle_error(result, status, xhr) {
	console.error(status, xhr);
}