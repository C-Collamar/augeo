function display_content(result, status, xhr) {
    console.log(result);
    var info = JSON.parse(result);
    console.log(info);
    
/*    for(var i = 0; i < info.length; ++i) {
        var item = info[i];
        var img_path = item.img_path;
        var description = item.description;
        $("#content-wrapper").innerHTML =
        '<a class="row card-item">' +
            '<div class="col-sm-7 border-right">' +
                '<div class="media">' +
                    '<div class="media-left">' +
                        '<img src="'+ item[i].img_path +'" class="media-object item-img" title="'+ item[i].description + '">' +
                    '</div>' +
                    '<div class="media-body">' +
                        '<h4 class="media-heading">' + item[i].name + '</h4>' +
                        '<span class="item-seller">' + item[i].f_name + ' ' + item[i]. + '</span>' +
                        '<div class="w-100"></div>' +
                        '<span class="bidders-participated">5</span>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-5 text-center align-middle">' +
                '<div class="row no-padding">' +
                    '<div class="col-xs-6">' +
                        '<div class="row no-padding"><span class="text-caption">Your bid</span></div>' +
                        '<div class="row no-padding"><h4>&#8369; 5.00</h4></div>' +
                        '<div class="row no-padding"><small>1 week ago</small></div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="row no-padding"><span class="text-caption">Highest bid</span></div>' +
                    '<div class="row no-padding"><h4>&#8369; 6.00</h4></div>' +
                    '<div class="row no-padding"><small>3 days ago</small></div>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</a>';
*/
   }