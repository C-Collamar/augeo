var tree = [{
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
	text: "Unsucessful auctions",
	selectable: false,
	nodes: [{
		text: "You as the bidder"
	}, {
		text: "You as the seller"
	}]
}, {
	text: "Statistics"
}];

$('#tree').treeview({data: tree});