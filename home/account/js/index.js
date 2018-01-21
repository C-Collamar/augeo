// tree heirarchy
var treeStruct = [
	{
		text: "Account Settings",
		selectable: false,
		state: { expanded: true, },
		tags: ['available'],
		nodes: [{
			text: "Profile",
			state: { selected: true }
		}, {
			text: "Account"
		}, {
			text: "Privacy"
		}]
	}
];

var tree = $('#tree');
tree.treeview({
	data: treeStruct,
	selectedBackColor: "#a0495e",
	onNodeSelected: update_view
});

// show data when sidebar(node) is clicked ex. Profile
function update_view(event, node) {
	//alert(node.nodeId);
	$("#accounta").hide();

	if (node.nodeId == "1") {
		$("#profile").show();
		$("#accounta").hide();

	}
	else if (node.nodeId == "2") {
		$("#profile").hide();
		$("#accounta").show();
	}
	else if (node.nodeId == "3") {
		alert(node.nodeId);
	}
}

function handle_error(result, status, xhr) {
	console.error(status, xhr);
}



// uploading image and checking if file is valid
$(document).ready(function () {
	if ($('#new_user').val() == 1) {
		$("#myModal").modal('show');
	}

	$("#but_upload").click(function () {
		var username = document.getElementById("username").value;
		var fd = new FormData();

		var files = $('#file')[0].files[0];
		var pic_name = $('#file').val();
		var extension = pic_name.split('.').pop().toUpperCase();
		if (extension == "JPG" || extension == "JPEG") {
			fd.append('file', files);

			$.ajax({
				url: 'php/upload.php',
				type: 'post',
				data: fd,
				contentType: false,
				processData: false,
				success: function (response) {
					if (response == "success") {
						$("#error_pic").css({ color: 'green' });
						document.getElementById("error_pic").innerHTML = "Your Profile Pic has been updated";
					}
					else {
						$("#error_pic").css({ color: 'red' });
						document.getElementById("error_pic").innerHTML = "There was a problem updating your profile pic, Please try again later";
					}


				},
				error: function (response) {
					alert('error : ' + JSON.stringify(response));
				}
			});
		}
		else {
			$("#error_pic").css({ color: 'red' });
			document.getElementById("error_pic").innerHTML = "Please Enter a valid picture (note: only JPG or JPEG format only!";
		}
	});
});

// displaying image when uploaded
function display_img(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#img').attr('src', e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	}
}
// date picker

// getting user's data from database
$(document).ready(function () {
	var id = $("#account_id_session").val();
	$.ajax({
		type: "POST",
		url: "php/index.php",
		data: {
			id: id
		},
		success: function (result) {
			// alert(result);
			var content_info = JSON.parse(result);
			var uname = document.getElementById("uname").value = content_info.f_name;
			var mname = document.getElementById("mname").value = content_info.m_name;
			var lname = document.getElementById("lname").value = content_info.l_name;
			document.getElementById("username").innerHTML = content_info.username;
			document.getElementById("contact_no").value = content_info.contact_no;
			document.getElementById("address").value = content_info.full_address;
			document.getElementById("zipcode").value = content_info.zip_code;
			document.getElementById("datepicker").value = content_info.bdate;
			document.getElementById("email").value = content_info.email;
			//    var fullname = document.getElementById("fullname").innerHTML = uname + " " + mname + " "+ lname;
			document.getElementById("img").src = content_info.profile_img;
		}
	});

	// updating password
	$("#new_pass_btn").click(function () {
		var pass_id = $("#account_id_session").val();
		if (($("#current_pass").val() == "" && $("#new_pass1").val() == "" && $("#new_pass2") == "") || ($("#current_pass").val() == "" || $("#new_pass1").val() == "" || $("#new_pass2").val() == "")) {
			$("#error_new_pass").css({ color: 'red' });
			document.getElementById("error_new_pass").innerHTML = "Please Fill up the form";
		}
		else if ($("#new_pass1").val().length < 8) {
			$("#error_new_pass").css({ color: 'red' });
			document.getElementById("error_new_pass").innerHTML = "Password Must be atleast 8 characters";
		}
		else if ($("#new_pass1").val() != $("#new_pass2").val()) {
			$("#error_new_pass").css({ color: 'red' });
			document.getElementById("error_new_pass").innerHTML = "Password Must be the same";
		}
		else {
			$.ajax({
				type: "POST",
				url: "php/index.php",
				data: {
					old_pass: $("#current_pass").val(),
					new_pass: $("#new_pass1").val(),
					pass_id: pass_id
				},
				success: function (result) {
					if (result == "success") {
						$("#error_new_pass").css({ color: 'green' });
						document.getElementById("error_new_pass").innerHTML = "Your Password has been changed!";
					}
					else {
						$("#error_new_pass").css({ color: 'red' });
						document.getElementById("error_new_pass").innerHTML = "Your current password is incorrect";
					}
				}
			});
		}

	});

	//updating email
	$("#email_btn").click(function () {
		var id_email = $("#account_id_session").val();

		//  var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		// alert(filter.test($("#email")));
		if ($("#email").val() == "") {
			$("#error_email").css({ color: 'red' });
			document.getElementById("error_email").innerHTML = "Please Enter your Email";
		}
		else {
			$.ajax({
				type: "POST",
				url: "php/index.php",
				data: {
					update_email: $("#email").val(),
					id_email: id_email
				},
				success: function (result) {
					if (result == "success") {
						$("#error_email").css({ color: 'green' });
						document.getElementById("error_email").innerHTML = "Your Email has been updated";
					}
					else {
						$("#error_email").css({ color: 'red' });
						document.getElementById("error_email").innerHTML = "This Email is Already Taken.Please enter another one";
					}
				}
			});
		}
	});
	//updating Profile
	$("#save_changes_profile").click(function () {
		if (($("#uname").val() == "" && $("#lname").val() == "" && $("#mname").val() == "" && $("#bdate").val() == "" && $("#address").val() == "" && $("#zip_code").val() == "") || $("#uname").val() == "" || $("#mname").val() == "" || $("#lname").val() == "" || $("#bdate").val() == "" || $("#address").val() == "" || $("#zip_code").val() == "") {
			$("#save_changes_profile_error").css({ color: 'red' });
			document.getElementById("save_changes_profile_error").innerHTML = "Please Fill Up the required fields";
		}
		else {
			$.ajax({
				type: "POST",
				url: "php/index.php",
				data: {
					fname: $("#uname").val(),
					mname: $("#mname").val(),
					lname: $("#lname").val(),
					bdate: $("#datepicker").val(),
					contact_no: $("#contact_no").val(),
					full_address: $("#address").val(),
					zip_code: $("#zipcode").val(),
					profile_id: $("#account_id_session").val()

				},
				success: function (result) {
					$("#save_changes_profile_error").css({ color: 'green' });
					document.getElementById("save_changes_profile_error").innerHTML = "Your Profile has been Updated";
				}
			});
		}
	});

});

$(function () {
	$("#datepicker").datepicker({
		Format: "yy-mm-dd"
	});
});

function YNconfirm() {
	if (window.confirm('Are you sure you want to Deactivate your Account?')) {
		if (($("#deac_pass1").val() == "" && $("#deac_pass2").val() == "") || $("#deac_pass1").val() == "" || $("#deac_pass2").val() == "") {
			$("#deactivate_error").css({ color: 'red' });
			document.getElementById("deactivate_error").innerHTML = "Please Fill up the form";
		}
		else if ($("#deac_pass1").val().length < 8) {
			$("#deactivate_error").css({ color: 'red' });
			document.getElementById("deactivate_error").innerHTML = "Password Must be atleast 8 characters";
		}
		else if ($("#deac_pass1").val() != $("#deac_pass2").val()) {
			$("#deactivate_error").css({ color: 'red' });
			document.getElementById("deactivate_error").innerHTML = "Password Must be the same";
		}
		else {
			$.ajax({
				type: "POST",
				url: "php/index.php",
				data: {
					deac_pass1: $("#deac_pass1").val(),
					deac_pass2: $("#deac_pass2").val(),
					deac_id: $("#account_id_session").val()
				},
				success: function (result) {
					if (result == "success") {
						window.location.assign("../../login");
					} else {
						$("#deactivate_error").css({ color: 'red' });
						document.getElementById("deactivate_error").innerHTML = "The Password you entered is incorrect";
					}
				}
			});
		}
	}
	else {

	}
};