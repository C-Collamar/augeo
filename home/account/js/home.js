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
			$("#html-code-here").html(result);
		}

	});
}

function handle_error(result, status, xhr) {
	console.error(status, xhr);
}








        $(document).ready(function(){

            $("#but_upload").click(function(){

                var fd = new FormData();
                var sam = document.getElementById("test");
                var files = $('#file')[0].files[0];

                fd.append('file',files);

                $.ajax({
                    url:'upload.php',
                    type:'post',
                    data:fd,sam,
                    contentType: false,
                    processData: false,
                    success:function(response){

                            alert(response);

                    },
                    error:function(response){
                        alert('error : ' + JSON.stringify(response));
                    }
                });
            });
        });

     function display_img(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }



$(document).ready(function() {

// hiding and showing
//  $(".crt_form").hide();
//  $(".profile").hide();
    $(".show_hide").show();
    $(".profile").show();


  $('.show_hide').click(function(){
  $(".profile").slideToggle();
 // $(".login_form").slideToggle();

  });

   });




