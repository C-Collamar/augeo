window.onload = function() {
    $('#browse_nav').addClass('active');

    //possible improvement: iniialize masonry layot later only after attaching element
    //to DOM
    $grid = $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: 300,
        fitWidth: true,
        horizontalOrder: true,
        gutter: 10
    });

    fetchItems();

    $('#browse-options').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'php/get_auction_items.php',
            type: 'get',
            data: $(this).serialize(),
            dataType: 'json',
            success: displayItems,
            error: handleError
        });

    });
};

function fetchItems() {
    $.ajax({
        url: 'php/get_auction_items.php',
        type: 'get',
        dataType: 'json',
        success: displayItems,
        error: handleError,
        beforeSend: function() {
            document.getElementById('loader').innerHTML =
            '<div class="loader-icon"></div><span class="loader-msg">Loading items</span>';
        },
        complete: function() {
            document.getElementById('loader').innerHTML = '';
        }
    });
}

function displayItems(data, textStatus, xhr) {
    if(data[0] == undefined) {
        document.getElementById('browse-items').innerHTML =
        '<div id="empty-result">' +
            '<img src="http://localhost/augeo/global/img/google-plus-jingle.gif">' +
            '<h3>Looks like there\'s nothing yet to see</h3>' +
            '<h5>Please come back again at a later time.</h5>' +
        '</div>';
        $grid.masonry('destroy');
        return;
    }
    var container = document.getElementById('browse-items');
    $grid.masonry('remove', $grid.find('.grid-item'));
    $grid.masonry('layout');
    var fragment = document.createDocumentFragment();
    var items = [];
    for(var i = 0; i < data.length; ++i) {
        var card = document.createElement('div');
        var descClass = (data[i].description.length > 100)? 'overflow' : '';
        var amount, amountClass;
        if(data[i].amount == null) {
            amount = parseFloat(data[i].initial_price).toFixed(2);
            amountClass = 'initial-price';
        }
        else {
            amount = parseFloat(data[i].amount).toFixed(2);
            amountClass = 'highest-bid';
        }
        card.className = 'grid-item';
        card.innerHTML =
            '<div class="card" onclick="viewItem(' + data[i].item_id + ')">' +
                '<img src="' + data[i].img_path + '">' +
                '<div class="item-details">' +
                    '<h4><b>' + data[i].name + '</b></h4>' +
                    '<p><b>Ending in ' + data[i].expiration_date + '</b></p>' +
                    '<div class="item-description ' + descClass + '">' + marked(data[i].description) + '</div>' +
                    '<div class="' + amountClass + '">Php ' + amount + '</div>' +
                    '<div class="tag-list"></div>' +
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
    $grid.append(items).masonry('appended', items);
}

function handleError(xhr, textStatus, errThrown) {
    alert("An error occured. See console for details.");
    console.log(xhr.responseText);
}

function viewItem(id) {
    window.location = 'http://localhost/augeo/item/view/?id=' + id;
}