$(document).ready(function() {
	//get 'Items you sell for auction' info by default on page load
	get_active_seller_items(document.getElementById('items'));

	//initialize treeview
	$('#tree').treeview({
		data: [
			{
				text: "Pending items in auction",
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
				text: "Statistics"
			}
		],
		selectedBackColor: "#a0495e",
		onNodeSelected: update_view
	});
});

function update_view(event, node) {
	var container = document.getElementById('items');
	while(container.firstChild) {
		container.removeChild(container.firstChild);
	}

	switch(node.nodeId) {
		case 1:
			get_active_seller_items(container);
			break;
		case 2:
			get_active_bidded_items(container);
			break;
		case 3:
			get_user_bid_history(container);
			break;
		default:
			break;
	}
}

function get_active_seller_items(container) {
	$.ajax({
		url: "php/active_seller_items.php",
		type: "GET",
		dataType: 'json',
		success: function (item_list, status, xhr) {
			display_active_seller_items(item_list, container);
		},
		error: handle_error
	});
}

function get_active_bidded_items(container) {
	$.ajax({
		url: "php/active_bidded_items.php",
		type: "GET",
		dataType: 'json',
		success: function (item_list, status, xhr) {
			display_active_bidded_items(item_list, container);
		},
		error: handle_error
	});
}

function get_user_bid_history(container) {
	$.ajax({
		url: "php/user_bid_history.php",
		type: "GET",
		dataType: 'json',
		success: function (item_list, status, xhr) {
			display_user_bid_history(item_list, container);
		},
		error: handle_error
	});
}

function handle_error(result, status, xhr) {
	alert('An error has occured. See console for details.');
	console.error(result.responseText);
}

function validate(form) {
    if(confirm("Are you sure you want to end this Auction?")) {
		var a = 1;
	}
	else {
		return false;
	}
}