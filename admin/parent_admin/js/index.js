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

});



$(function () {
    $('.min-chart#chart-sales').easyPieChart({
        barColor: "#4caf50",
        onStep: function (from, to, percent) {
            $(this.el).find('.percent').text(Math.round(percent));
        }
    });
});


var tax_data = [
    {"period": "2013-04", "visits": 2407, "signups": 660},
    {"period": "2013-03", "visits": 3351, "signups": 729},
    {"period": "2013-02", "visits": 2469, "signups": 1318},
    {"period": "2013-01", "visits": 2246, "signups": 461},
    {"period": "2012-12", "visits": 3171, "signups": 1676},
    {"period": "2012-11", "visits": 2155, "signups": 681},
    {"period": "2012-10", "visits": 1226, "signups": 620},
    {"period": "2012-09", "visits": 2245, "signups": 500}
];
Morris.Line({
    element: 'hero-graph',
    data: tax_data,
    xkey: 'period',
    xLabels: "month",
    ykeys: ['visits', 'signups'],
    labels: ['Visits', 'User signups']
});