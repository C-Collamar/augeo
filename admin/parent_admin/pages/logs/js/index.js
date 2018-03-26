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
});


function test(search) {
    if (search.length == 0) {
         $('document').ready(function() {
        $("#pagination a").trigger('click'); // When page is loaded we trigger a click
    });
      var data_customer = "";


    $('#pagination').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div
            var page = this.id; // Page number is the id of the 'a' element
            var pagination = ''; // Init pagination

            $('#data_customer').html('<img src="design/loader-small.gif" alt="" />'); // Display a processing icon
            var data = {page: page, per_page: 10,search: data_customer}; // Create JSON which will be sent via Ajax
            // We set up the per_page var at 4. You may change to any number you need.

            $.ajax({ // jQuery Ajax
                type: 'POST',
                url: 'php/index.php', // URL to the PHP file which will insert new value in the database
                data: data, // We send the data string
                dataType: 'json', // Json format
                timeout: 3000,
                success: function(data) {
                    $('#data_customer').html(data.list); // We update the data_customer DIV with the article list

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

                    if (page == data.numPage) pagination += '<div class="cell_disabled"><span>Next</span></div><div class="cell_disabled"><span>Last</span></div>';
                    else pagination += '<div class="cell"><a href="#" id="' + (parseInt(page) + 1) + '">Next</a></div><div class="cell"><a href="#" id="' + data.numPage + '">Last</span></a></div>';

                    $('#pagination').html(pagination); // We update the pagination DIV
                },
                error: function() {
                }
            });
            return false;
        });
    }

    else {
        $('document').ready(function() {
            $("#pagination a").trigger('click'); // When page is loaded we trigger a click
          });

        var data_customer = "";


        $('#pagination').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div
                var page = this.id; // Page number is the id of the 'a' element
                var pagination = ''; // Init pagination

                $('#data_customer').html('<img src="design/loader-small.gif" alt="" />'); // Display a processing icon
                var data = {page: page, per_page: 10, search: search}; // Create JSON which will be sent via Ajax
                // We set up the per_page var at 4. You may change to any number you need.

                $.ajax({ // jQuery Ajax
                    type: 'POST',
                    url: 'php/index.php', // URL to the PHP file which will insert new value in the database
                    data: data, // We send the data string
                    dataType: 'json', // Json format
                    timeout: 3000,
                    success: function(data) {
                        $('#data_customer').html(data.list); // We update the data_customer DIV with the article list

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

                        if (page == data.numPage) pagination += '<div class="cell_disabled"><span>Next</span></div><div class="cell_disabled"><span>Last</span></div>';
                        else pagination += '<div class="cell"><a href="#" id="' + (parseInt(page) + 1) + '">Next</a></div><div class="cell"><a href="#" id="' + data.numPage + '">Last</span></a></div>';

                        $('#pagination').html(pagination); // We update the pagination DIV
                    },
                    error: function() {
                    }
                });
                return false;
            });
            }
}





$('document').ready(function() {
    $("#pagination a").trigger('click'); // When page is loaded we trigger a click
});

$('#pagination').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div
    var page = this.id; // Page number is the id of the 'a' element
    var pagination = ''; // Init pagination

    $('#data_customer').html('<img src="design/loader-small.gif" alt="" />'); // Display a processing icon
    var data = {page: page, per_page: 10,customer: ''}; // Create JSON which will be sent via Ajax
        // We set up the per_page var at 4. You may change to any number you need.

     $.ajax({ // jQuery Ajax
        type: 'POST',
        url: 'php/index.php', // URL to the PHP file which will insert new value in the database
        data: data, // We send the data string
        dataType: 'json', // Json format
        timeout: 3000,
        success: function(data) {
            $('#data_customer').html(data.list); // We update the data_customer DIV with the article list

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
            error: function() {
            }
        });
        return false;
    });

    if(document.body.contains(document.getElementById("notif-container"))) {
    window.setTimeout(function() {
        document.getElementById("notif-container").classList.remove("show-notif");
    }, 5000);
}











$('document').ready(function() {
    $("#pagination1 a").trigger('click'); // When page is loaded we trigger a click
});

$('#pagination1').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div
    var page = this.id; // Page number is the id of the 'a' element
    var pagination = ''; // Init pagination

    $('#data_customer').html('<img src="design/loader-small.gif" alt="" />'); // Display a processing icon
    var data = {page: page, per_page: 10,admin: ''}; // Create JSON which will be sent via Ajax
        // We set up the per_page var at 4. You may change to any number you need.

     $.ajax({ // jQuery Ajax
        type: 'POST',
        url: 'php/index.php', // URL to the PHP file which will insert new value in the database
        data: data, // We send the data string
        dataType: 'json', // Json format
        timeout: 3000,
        success: function(data) {
            $('#data_admin').html(data.list); // We update the data_customer DIV with the article list

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
                $('#pagination1').html(pagination); // We update the pagination DIV
                },
            error: function() {
            }
        });
        return false;
    });

    if(document.body.contains(document.getElementById("notif-container"))) {
    window.setTimeout(function() {
        document.getElementById("notif-container").classList.remove("show-notif");
    }, 5000);
}






$('document').ready(function() {
    $("#pagination2 a").trigger('click'); // When page is loaded we trigger a click
});

$('#pagination2').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div
    var page = this.id; // Page number is the id of the 'a' element
    var pagination = ''; // Init pagination

    $('#data_byadmin').html('<img src="design/loader-small.gif" alt="" />'); // Display a processing icon
    var data = {page: page, per_page: 10,byadmin: ''}; // Create JSON which will be sent via Ajax
        // We set up the per_page var at 4. You may change to any number you need.

     $.ajax({ // jQuery Ajax
        type: 'POST',
        url: 'php/index.php', // URL to the PHP file which will insert new value in the database
        data: data, // We send the data string
        dataType: 'json', // Json format
        timeout: 3000,
        success: function(data) {
            $('#data_byadmin').html(data.list); // We update the data_customer DIV with the article list

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
                $('#pagination2').html(pagination); // We update the pagination DIV
                },
            error: function() {
            }
        });
        return false;
    });

    if(document.body.contains(document.getElementById("notif-container"))) {
    window.setTimeout(function() {
        document.getElementById("notif-container").classList.remove("show-notif");
    }, 5000);
}




$('document').ready(function() {
    $("#pagination12 a").trigger('click'); // When page is loaded we trigger a click
});

$('#pagination12').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div
    var page = this.id; // Page number is the id of the 'a' element
    var pagination = ''; // Init pagination

    $('#data_customer1').html('<img src="design/loader-small.gif" alt="" />'); // Display a processing icon
    var data = {page: page, per_page: 10,admin1: ''}; // Create JSON which will be sent via Ajax
        // We set up the per_page var at 4. You may change to any number you need.

     $.ajax({ // jQuery Ajax
        type: 'POST',
        url: 'php/index.php', // URL to the PHP file which will insert new value in the database
        data: data, // We send the data string
        dataType: 'json', // Json format
        timeout: 3000,
        success: function(data) {
            $('#data_customer1').html(data.list); // We update the data_customer DIV with the article list

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
                $('#pagination12').html(pagination); // We update the pagination DIV
                },
            error: function() {
            }
        });
        return false;
    });

    if(document.body.contains(document.getElementById("notif-container"))) {
    window.setTimeout(function() {
        document.getElementById("notif-container").classList.remove("show-notif");
    }, 5000);
}




$('document').ready(function() {
    $("#pagination123 a").trigger('click'); // When page is loaded we trigger a click
});

$('#pagination123').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div
    var page = this.id; // Page number is the id of the 'a' element
    var pagination = ''; // Init pagination

    $('#data_transactions').html('<img src="design/loader-small.gif" alt="" />'); // Display a processing icon
    var data = {page: page, per_page: 10,transactions: ''}; // Create JSON which will be sent via Ajax
        // We set up the per_page var at 4. You may change to any number you need.

     $.ajax({ // jQuery Ajax
        type: 'POST',
        url: 'php/index.php', // URL to the PHP file which will insert new value in the database
        data: data, // We send the data string
        dataType: 'json', // Json format
        timeout: 3000,
        success: function(data) {
            $('#data_transactions').html(data.list); // We update the data_customer DIV with the article list

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
                $('#pagination123').html(pagination); // We update the pagination DIV
                },
            error: function() {
            }
        });
        return false;
    });

    if(document.body.contains(document.getElementById("notif-container"))) {
    window.setTimeout(function() {
        document.getElementById("notif-container").classList.remove("show-notif");
    }, 5000);
}




$('document').ready(function() {
    $("#pagination5 a").trigger('click'); // When page is loaded we trigger a click
});

$('#pagination5').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div
    var page = this.id; // Page number is the id of the 'a' element
    var pagination = ''; // Init pagination

    $('#data_activity').html('<img src="design/loader-small.gif" alt="" />'); // Display a processing icon
    var data = {page: page, per_page: 10,users_activity: ''}; // Create JSON which will be sent via Ajax
        // We set up the per_page var at 4. You may change to any number you need.

     $.ajax({ // jQuery Ajax
        type: 'POST',
        url: 'php/index.php', // URL to the PHP file which will insert new value in the database
        data: data, // We send the data string
        dataType: 'json', // Json format
        timeout: 3000,
        success: function(data) {
            $('#data_activity').html(data.list); // We update the data_customer DIV with the article list

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
                $('#pagination5').html(pagination); // We update the pagination DIV
                },
            error: function() {
            }
        });
        return false;
    });

    if(document.body.contains(document.getElementById("notif-container"))) {
    window.setTimeout(function() {
        document.getElementById("notif-container").classList.remove("show-notif");
    }, 5000);
}





$('document').ready(function() {
    $("#pagination6 a").trigger('click'); // When page is loaded we trigger a click
});

$('#pagination6').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div
    var page = this.id; // Page number is the id of the 'a' element
    var pagination = ''; // Init pagination

    $('#data_signups').html('<img src="design/loader-small.gif" alt="" />'); // Display a processing icon
    var data = {page: page, per_page: 10,users_signups: ''}; // Create JSON which will be sent via Ajax
        // We set up the per_page var at 4. You may change to any number you need.

     $.ajax({ // jQuery Ajax
        type: 'POST',
        url: 'php/index.php', // URL to the PHP file which will insert new value in the database
        data: data, // We send the data string
        dataType: 'json', // Json format
        timeout: 3000,
        success: function(data) {
            $('#data_signups').html(data.list); // We update the data_customer DIV with the article list

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
                $('#pagination6').html(pagination); // We update the pagination DIV
                },
            error: function() {
            }
        });
        return false;
    });

    if(document.body.contains(document.getElementById("notif-container"))) {
    window.setTimeout(function() {
        document.getElementById("notif-container").classList.remove("show-notif");
    }, 5000);
}





$('document').ready(function() {
    $("#pagination7 a").trigger('click'); // When page is loaded we trigger a click
});

$('#pagination7').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div
    var page = this.id; // Page number is the id of the 'a' element
    var pagination = ''; // Init pagination

    $('#data_paypal').html('<img src="design/loader-small.gif" alt="" />'); // Display a processing icon
    var data = {page: page, per_page: 10,paypal: ''}; // Create JSON which will be sent via Ajax
        // We set up the per_page var at 4. You may change to any number you need.

     $.ajax({ // jQuery Ajax
        type: 'POST',
        url: 'php/index.php', // URL to the PHP file which will insert new value in the database
        data: data, // We send the data string
        dataType: 'json', // Json format
        timeout: 3000,
        success: function(data) {
            $('#data_paypal').html(data.list); // We update the data_customer DIV with the article list

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
                $('#pagination7').html(pagination); // We update the pagination DIV
                },
            error: function() {
            }
        });
        return false;
    });

    if(document.body.contains(document.getElementById("notif-container"))) {
    window.setTimeout(function() {
        document.getElementById("notif-container").classList.remove("show-notif");
    }, 5000);
}