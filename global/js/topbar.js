 // check if user is logged in
 window.onload = logged;

function logged() {
	// check if user is logged in
	$.ajax({
		url: "http://localhost/augeo/global/php/check_user.php",
		success: function(result) {
			$("#user_logged").hide(0, "fast");
			$("#user_not_logged").hide(0, "fast");

			if (result == "true") {
				$("#user_logged").show(0, "fast");
				$("#user_not_logged").hide(0, "fast");
			} else {
				$("#user_not_logged").show(0, "fast");
				$("#user_logged").hide(0, "fast");
			}
		}
	});

	// display avatar on topbar
	$.ajax({
		url: "http://localhost/augeo/global/php/get_avatar.php",
		success: function(result) {
			document.getElementById("avatar").src = 'http://localhost/augeo/data/user/profile_img/' + result;
		}
	});
};