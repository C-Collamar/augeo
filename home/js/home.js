// Note: Only one tree node must be in selected state at a time
var treeStruct = [{
	text: "Pending items in auction",
	selectable: false,
	state: { expanded: true, },
	tags: ['available'],
	nodes: [{
		text: "Items you sell for auction",
		href: "#sdf",
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

var tree = $('#tree');
var prevSelectedNode = null;

tree.treeview({
	data: treeStruct,
	enableLinks: true,
	selectedBackColor: "#a0495e"
});