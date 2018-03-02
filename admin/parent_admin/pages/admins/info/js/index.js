$(document).ready(function(){


  $(".submenu > a").click(function(e) {
    e.preventDefault();
    var $li = $(this).parent("li");
    var $ul = $(this).next("ul");

    if($li.hasClass("open")) {
      $ul.slideUp(350);
      $li.removeClass("open");
    } else {
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




$('document').ready(function() {
    $("#pagination a").trigger('click'); // When page is loaded we trigger a click
    });

$('#pagination').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div
    var idd = $("#id").val();
    var page = this.id; // Page number is the id of the 'a' element
    var pagination = ''; // Init pagination
    $('#articleArea').html('<img src="design/loader-small.gif" alt="" />'); // Display a processing icon
    var data = {page: page, per_page: 10, idd: idd}; // Create JSON which will be sent via Ajax
        // We set up the per_page var at 4. You may change to any number you need.

     $.ajax({ // jQuery Ajax
        type: 'POST',
        url: 'php/index.php', // URL to the PHP file which will insert new value in the database
        data: data, // We send the data string
        dataType: 'json', // Json format
        timeout: 3000,
        success: function(data) {

            $('#articleArea').html(data.articleList); // We update the articleArea DIV with the article list

                // Pagination system
            if (page == 1) pagination += '<div class="cell_disabled"><span>First</span></div><div class="cell_disabled"><span>Previous</span></div>';
            else pagination += '<div class="cell"><a href="#" id="1">First</a></div><div class="cell"><a href="#" id="' + (page - 1) + '">Previous</span></a></div>';

            for (var i=parseInt(page)-3; i<=parseInt(page)+3; i++) {
                if (i >= 1 && i <= data.numPage) {
                    pagination += '<div';
                    if (i == page) pagination += ' class="cell_active"><span>' + i + '</span>';
                    else pagination += ' class="cell"><a href="#" id="' + i + '">' + i + '</a>';
                    pagination += '</div>';
                    }
                }

            if (page == data.numPage)
                pagination += '<div class="cell_disabled"><span>Next</span></div><div class="cell_disabled"><span>Last</span></div>';

            else
                pagination += '<div class="cell"><a href="#" id="' + (parseInt(page) + 1) + '">Next</a></div><div class="cell"><a href="#" id="' + data.numPage + '">Last</span></a></div>';
                $('#pagination').html(pagination); // We update the pagination DIV
                },
            error: function(data) {
              alert("error");
            }
        });
        return false;
    });



