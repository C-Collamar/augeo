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
          item_count: ""
        },
        success: function(result) {
          var content_info = JSON.parse(result);

          Morris.Area({
          element: 'hero-area-item',
          data: [
              {period: '2018', Items: 0},
              {period: '2019', Items: content_info.total}
          ],
          xkey: 'period',
          ykeys: ['Items'],
          labels: ['Items'],
          lineWidth: 2,
          hideHover: 'auto',
          lineColors: ["red"]
        });

        }
    });

});