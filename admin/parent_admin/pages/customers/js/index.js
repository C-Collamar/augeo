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


/*
 $.ajax({
              type: "POST",
              url: "php/index.php",
              success: function(result) {
                alert(result);
                var content_info = JSON.parse(result);
                alert(content_info[0]);

                           //     document.getElementById("data_customer").innerHTML=result;
                                  }
                             });
                             */

              var request = new XMLHttpRequest();
              request.open('GET', 'php/index.php', true);

              request.onload = function () {
  // begin accessing JSON data here
              var data = JSON.parse(this.response);



            for (var i = 0; i < data.length; i++) {
                var html = "<tr class='odd gradeX'> <td>" + data[i][0] + "</td> <tr>";
                $("#data_customer").append(html);
                    alert(data[i][0]);
                  }
                 }

              request.send();

});


