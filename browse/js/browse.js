window.onload = function() {
    $('#browse_nav').addClass('active');

    grid = new Masonry(document.querySelector('.grid'), {
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true,
        horizontalOrder: true,
        gutter: 0
    });

    fetchItems();
};

function fetchItems() {
    $.ajax({
        url: 'php/get_auction_items.php',
        type: 'get',
        dataType: 'json',
        success: displayItems,
        error: handleError
    });
}

function displayItems(data, textStatus, xhr) {
    var container = document.getElementById('browse-items');
    var fragment = document.createDocumentFragment();
    var items = [];
    for(var i = 0; i < data.length; ++i) {
        var card = document.createElement('div');
        var descClass = (data[i].description.length > 100)? 'overflow' : '';
        var amount, amountClass;
        if(data[i].initial_price == null) {
            amount = parseFloat(data[i].highest_bid).toFixed(2);
            amountClass = 'highest-bid';
        }
        else {
            amount = parseFloat(data[i].initial_price).toFixed(2);
            amountClass = 'initial-price';
        }
        card.className = 'grid-item';
        card.innerHTML =
            '<div style="padding: 5px;">' +
                '<div class="card" onclick="viewItem(' + data[i].item_id + ')">' +
                    '<img src="' + data[i].img_path + '">' +
                    '<div class="item-details">' +
                        '<h4><b>' + data[i].name + '</b></h4>' +
                        '<p class="item-description ' + descClass + '">' + data[i].description.replace('\n', '<br>') + '</p>' +
                        '<div class="' + amountClass + '">Php ' + amount + '</div>' +
                        '<div class="tag-list"></div>' +
                    '</div>' +
                '</div>' +
            '</div>';

        //display item tags
        var tag_list = card.getElementsByClassName('tag-list')[0];
        for(var j = 0; j < data[i].tags.length; ++j) {
            var tag = document.createElement('a');
            tag.href = '#';
            tag.innerHTML = data[i].tags[j];
            tag_list.appendChild(tag);
        }
        
        fragment.appendChild(card);
        items.push(card);
    }

    container.appendChild(fragment); //append elements to container
    grid.appended(items);
}

function handleError(xhr, textStatus, errThrown) {
    alert("An error occured. See console for details.");
    console.log(xhr.responseText);
}

function viewItem(id) {
    window.location = 'http://localhost/augeo/item/view/?id=' + id;
}