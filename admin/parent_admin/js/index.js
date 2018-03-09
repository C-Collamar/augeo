//////////////////////////////////////////////////////////FOR THE SIDEBAR//////////////////////////////////////////////////////
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

//////////////////////////////////////////////////////////DONUT IN CUSTOMERS (ACTIVE INACTIVE)//////////////////////////////////////////////////////
 $.ajax({
        type: "POST",
        url: "../includes/php/all-data.php",
        data: {
          customers_active: ""
        },
        success: function(result) {
          var content_info = JSON.parse(result);
          var total_num = content_info.active + content_info.inactive;
          var active = content_info.active / total_num *100;
          var inactive = content_info.inactive / total_num *100;


Morris.Donut({
    element: 'hero-donut2',
    data: [
        {label: 'Active', value: active },
        {label: 'Inactive', value: inactive }
    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});

        }
    });
//////////////////////////////////////////////////////////DONUT ADMIN//////////////////////////////////////////////////////
$.ajax({
        type: "POST",
        url: "../includes/php/all-data.php",
        data: {
          admins: ""
        },
        success: function(result) {
          var content_info = JSON.parse(result);
          var total_num = content_info.active + content_info.inactive;
          var active = content_info.active / total_num *100;
          var inactive = content_info.inactive / total_num *100;


Morris.Donut({
    element: 'hero-donut-admin',
    data: [
        {label: 'Active', value: active },
        {label: 'Inactive', value: inactive }
    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});

        }
    });


//////////////////////////////////////////////////////////CHART TRANSACTION//////////////////////////////////////////////////////
$.ajax({
        type: "POST",
        url: "../includes/php/all-data.php",
        data: {
          transactions: ""
        },
        success: function(result) {
          var content_info = JSON.parse(result);

var data = [
      { y: '2018', a: 0, b: 0},
      { y: '2019', a: content_info.successful, b: content_info.pending}
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Successful Transactions', 'Pending Transactions'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','red']
  };
config.element = 'area-chart';
Morris.Area(config);

        }
    });

//////////////////////////////////////////////////////////ADMIN COUNT//////////////////////////////////////////////////////
 $.ajax({
              type: "POST",
              url: "../includes/php/all-data.php",
              data: {
                count_admin: ""
              },
              success: function(result) {
                  var content_info = JSON.parse(result);

                  Morris.Bar({
                    element: 'hero-bar',
                    data: [
                        {admin: 'Super Admin', number: content_info.super},
                        {admin: 'Normal Admin', number: content_info.normal}
                    ],
                    xkey: 'admin',
                    ykeys: ['number'],
                    labels: ['number'],
                    barRatio: 0.4,
                    xLabelMargin: 10,
                    hideHover: 'auto',
                    barColors: ["#3d88ba"]
});


              }
    });

//////////////////////////////////////////////////////////COUNT CUSTOMERS//////////////////////////////////////////////////////
   $.ajax({
        type: "POST",
        url: "../includes/php/all-data.php",
        data: {
          customer_count: ""
        },
        success: function(result) {
          var content_info = JSON.parse(result);
          var total_num = content_info.active + content_info.inactive;
          var active = content_info.active / total_num *100;
          var inactive = content_info.inactive / total_num *100;

          Morris.Area({
          element: 'hero-area',
          data: [
              {period: '2018', Users: 0},
              {period: '2019', Users: content_info.total}
          ],
          xkey: 'period',
          ykeys: ['Users'],
          labels: ['Users'],
          lineWidth: 2,
          hideHover: 'auto',
          lineColors: ["#81d5d9"]
        });

        }
    });

//////////////////////////////////////////////////////////COUNT ITEM//////////////////////////////////////////////////////
     $.ajax({
        type: "POST",
        url: "../includes/php/all-data.php",
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


//////////////////////////////////////////////////////////User and visit signup//////////////////////////////////////////////////////

 $.ajax({
        type: "POST",
        url: "../includes/php/all-data.php",
        data: {
          visit_count: ""
        },
        success: function(result) {
          var content_info = JSON.parse(result);
          var tax_data = [
                        {"period": "2018-04", "visits": content_info.visit, "signups": content_info.signup},
                        {"period": "2018-03", "visits": 0, "signups": 0}
                          ];
          Morris.Line({
                        element: 'hero-graph',
                        data: tax_data,
                        xkey: 'period',
                        xLabels: "month",
                        ykeys: ['visits', 'signups'],
                        labels: ['Visits', 'User signups']
});


        }
    });


});





