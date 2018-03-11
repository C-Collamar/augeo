var treeStruct = [
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
		data: { node_id: node.nodeId,id: $("#id").val() },
		success: function (response){
			document.getElementById('items').innerHTML = response;
		}
		,
		error: handle_error
	});
//	alert(node.nodeId);
}

function handle_error(result, status, xhr) {
	console.error(status, xhr);
}



$(document).ready(function() {
	$.ajax({
		url: "php/request_handler.php",
		type: "GET",
		data: { node_id: 1,id: $("#id").val() },
		success: function (response){
			document.getElementById('items').innerHTML = response;
		}
		,
		error: handle_error
	});

	  });



function validate(form) {

    if(confirm("Are you sure you want to end this Auction?"))
    var a=1;
  else
    return false;
}