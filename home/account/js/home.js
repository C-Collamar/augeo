var treeStruct = [
	{
		text: "Account Settings",
		selectable: false,
		state: { expanded: true, },
		tags: ['available'],
		nodes: [{
			text: "Profile",
          //  state: { selected: true }
		}, {
			text: "Account"
		},{
			text: "Privacy"
		}
		]
	}
];

var tree = $('#tree');
tree.treeview({
	data: treeStruct,
	selectedBackColor: "#a0495e",
	onNodeSelected: update_view
});

function update_view(event, node) {
    //alert(node.nodeId);
           $("#accounta").hide();
           $("#profile").hide();
    if(node.nodeId == "1"){
             $("#profile").show();
             $("#accounta").hide();

    }
     else if(node.nodeId == "2"){
        $("#profile").hide();
        $("#accounta").show();


    }
    else{
        alert(node.nodeId);
    }


}

function handle_error(result, status, xhr) {
	console.error(status, xhr);
}




         $(document).ready(function(){

            $("#but_upload").click(function(){

                var fd = new FormData();

                var files = $('#file')[0].files[0];

                fd.append('file',files);

                $.ajax({
                    url:'php/upload.php',
                    type:'post',
                    data:fd,
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

$(function () {
            $('#datetimepicker10').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
        });



$(document).ready(function() {
 $.ajax({
                    type: "POST",
                    url: "php/request_handler.php",
                    data: {
                        uname: "sadads"
                    },
                    success: function(result) {
                       alert(result);
                       var content_info = JSON.parse(result);
                       document.getElementById("uname").value = content_info.f_name;
                       document.getElementById("mname").value = content_info.m_name;
                       document.getElementById("lname").value = content_info.l_name;
                       document.getElementById("img").src = content_info.profile_img;
                    }
               });
      });