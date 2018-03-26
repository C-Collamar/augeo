function display_active_seller_items(item_list, container) {
    if(item_list.length == 0 || !item_list[0].item_id) {
        container.innerHTML =
        '<div id="empty-result">' +
            '<img src="http://localhost/augeo/global/img/google-plus-jingle.gif">' +
            '<h3>Looks like there\'s nothing to see yet</h3>' +
            '<h5>Items you posted that are still active are listed here</h5>' +
        '</div>';
        return;
    }

    for(var i = 0; i < item_list.length; ++i) {
        var id = item_list[i].item_id;
        var name = item_list[i].name;
        var img_path = item_list[i].img_path;
        var date = item_list[i].date;
        var amount = item_list[i].amount;
        var bid_count = item_list[i].bid_count;
        var views = item_list[i].view_count;

        var item = document.createElement('div');
        item.style.marginBottom = '10px';
        item.innerHTML =
        '<div class="row card-item vcenter-children">' +
            '<div class="col-sm-7 border-right">' +
                '<div class="media">' +
                    '<div class="media-left media-middle">' +
                        '<img src="' + img_path + '" class="media-object item-img">' +
                    '</div>' +
                    '<div class="media-body">' +
                        '<h4 class="media-heading">' + name + '</h4>' +
                        '<span class="bidders-participated">' + bid_count + '</span>' +
                        '<div class="w-100"></div>' +
                        '<span class="view-count">' + views + '</span>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-5 text-center vcenter-children">' +
                '<div class="col-xs-6">' +
                (
                    (!bid_count)?
                        '<div>' +
                            '<div class="no-bids-icon"></div>' +
                            '<span class="no-bids-msg">No bids yet</span>' +
                        '</div>'
                    :
                        '<span class="text-caption">Highest bid</span>' +
                        '<h4>&#8369; ' + amount + '</h4>' +
                        '<small>' + date + '</small>'
                ) +
                '</div>' +
                '<div class="col-xs-6 options">' +
                    '<a class="btn btn-green" href="http://localhost/augeo/item/view/?id=' + id + '">View item</a>' +
                '</div>' +
            '</div>' +
        '</div>';

        container.appendChild(item);
    }
}

function display_active_bidded_items(item_list, container) {
    if(item_list.length == 0 || !item_list[0].item_id) {
        container.innerHTML =
        '<div id="empty-result">' +
            '<img src="http://localhost/augeo/global/img/google-plus-jingle.gif">' +
            '<h3>Looks like there\'s nothing to see yet</h3>' +
            '<h5>Items that you\'ve bid and is still open for auctioning are listed here</h5>' +
        '</div>';
        return;
    }

    for(var i = 0; i < item_list.length; ++i) {
        var highest_bid = item_list[i].highest_bid;
        var img_path = item_list[i].img_path;
        var id = item_list[i].item_id;
        var lbd = item_list[i].latest_bid_date;
        var name = item_list[i].name;
        var seller = item_list[i].seller;
        var user_bid = item_list[i].user_bid;
        var ubd = item_list[i].user_bid_date;

        var item = document.createElement('div');
        item.innerHTML =
        '<div class="row card-item vcenter-children">' +
            '<div class="col-sm-6 border-right">' +
                '<div class="media">' +
                    '<div class="media-left">' +
                        '<img src="' + img_path + '" class="media-object item-img">' +
                    '</div>' +
                    '<div class="media-body">' +
                        '<h4 class="media-heading">Some random Item Name</h4>' +
                        '<span class="item-seller">' +
                            '<a href="http://localhost/augeo/user/account?id=' + id + '">' + seller + '</a>' +
                        '</span>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-4 text-center align-middle">' +
                '<div class="row no-padding vcenter-children">' +
                    '<div class="col-xs-6">' +
                        '<div class="row no-padding"><span class="text-caption">Your bid</span></div>' +
                        '<div class="row no-padding"><h4>&#8369; ' + user_bid + '</h4></div>' +
                        '<div class="row no-padding"><small>' + ubd + '</small></div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    (
                        (user_bid == highest_bid)?
                            '<div>' +
                                '<div class="no-higher-bidder-icon"></div>' +
                                '<span class="no-higher-bidder-msg">You\'re the highest bidder</span>' +
                            '</div>'
                        :
                            '<div class="row no-padding"><span class="text-caption">Highest bid</span></div>' +
                            '<div class="row no-padding"><h4>&#8369; ' + highest_bid + '</h4></div>' +
                            '<div class="row no-padding"><small>' + lbd + '</small></div>'
                    ) +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-2 options">' +
                '<a class="btn btn-green" href="http://localhost/augeo/item/view/?id=' + id + '">View</a>' +
            '</div>' +
        '</div>';

        container.appendChild(item);
    }
}

function display_items_won(item_list, container) {
    if(item_list.length == 0 || !item_list[0].user_id) {
        container.innerHTML =
        '<div id="empty-result">' +
            '<img src="http://localhost/augeo/global/img/google-plus-jingle.gif">' +
            '<h3>Looks like there\'s nothing to see yet</h3>' +
            '<h5>Items that you\'ve won though bidding are listed here</h5>' +
        '</div>';
        return;
    }

    for(var i = 0; i < item_list.length; ++i) {
        var item = document.createElement('div');
        item.innerHTML =
        '<div class="row card-item vcenter-children">' +
            '<div class="col-sm-7 border-right">' +
                '<div class="media">' +
                    '<div class="media-left media-middle">' +
                        '<img src="' + item_list[i].img_path + '" class="media-object item-img">' +
                    '</div>' +
                    '<div class="media-body">' +
                        '<h4 class="media-heading">' + item_list[i].name + '</h4>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-3 text-center">' +
                '<div><small>Acquired for</small></div>' +
                '<div><h4>&#8369; ' + item_list[i].amount + '</h4></div>' +
                '<div><small>by <a href="http://localhost/augeo/user/?id=' + item_list[i].user_id + '">' + 
                    item_list[i].seller +
                '</a></small></div>' +
                '<div><small>' + item_list[i].date + '</small></div>' +
            '</div>' +
            '<div class="col-sm-2 text-center">' +
                '<a href="http://localhost/augeo/user/auctions/info/?id=' + item_list[i].item_id + '" class="btn btn-green fill">Confirm</a>' +
            '</div>' +
        '</div>';
        container.appendChild(item);
    }
}

function display_items_sold(item_list, container) {
    if(item_list.length == 0 || item_list[0].name == '') {
        container.innerHTML =
        '<div id="empty-result">' +
            '<img src="http://localhost/augeo/global/img/google-plus-jingle.gif">' +
            '<h3>Looks like there\'s nothing to see yet</h3>' +
            '<h5>Items you\'ve successfully sold are listed here</h5>' +
        '</div>';
        return;
    }else 

    for(var i = 0; i < item_list.length; ++i) {
        var item = document.createElement('div');

        item.innerHTML =
        '<div class="row card-item vcenter-children">' +
            '<div class="col-sm-8 border-right">' +
                '<div class="media">' +
                    '<div class="media-left media-middle">' +
                        '<img src="' + item_list[i].img_path + '" class="media-object item-img">' +
                    '</div>' +
                    '<div class="media-body">' +
                        '<h4 class="media-heading">' + item_list[i].name + '</h4>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-4 text-center">' +
                '<div><small>Sold for</small></div>' +
                '<div><h4>&#8369; ' + item_list[i].amount + '</h4></div>' +
                '<div><small>' + item_list[i].date + '</small></div>' +
            '</div>' +
        '</div>';
        
        container.appendChild(item);
    }
}