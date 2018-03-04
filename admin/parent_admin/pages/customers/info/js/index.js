$(document).ready(function(){
    $(".submenu > a").click(function(e) {
        e.preventDefault();
        var $li = $(this).parent("li");
        var $ul = $(this).next("ul");

        if($li.hasClass("open")) {
            $ul.slideUp(350);
            $li.removeClass("open");
        }
        else {
            $(".nav > li > ul").slideUp(350);
            $(".nav > li").removeClass("open");
            $ul.slideDown(350);
            $li.addClass("open");
    }
  });




   $.ajax({
              type: "POST",
              url: "php/index.php",
              data: {
                id: $("#id").val()
              },
              success: function(result) {
                  var content_info = JSON.parse(result);

                  document.getElementById("account_id").innerHTML = content_info.account_id;
                  document.getElementById("username").innerHTML = content_info.username;
                  document.getElementById("full_name").innerHTML = content_info.f_name + " " + content_info.m_name + " " + content_info.l_name;
                  document.getElementById("bday").innerHTML = content_info.bdate;
                  document.getElementById("account_id").innerHTML = content_info.account_id;
                  document.getElementById("zipcode").innerHTML = content_info.zip_code;
                  document.getElementById("full_address").innerHTML = content_info.full_address;
                  document.getElementById("contact_no").innerHTML = content_info.contact_no;
                  document.getElementById("email").innerHTML = content_info.email;

                                  }
                             });

});