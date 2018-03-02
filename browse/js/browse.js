window.onload = function() {
    $('#browse_nav').addClass('active');

    grid = new Masonry(document.querySelector('.grid'), {
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true,
		horizontalOrder: true,
		gutter: 10
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
	console.log(data);
	var container = document.getElementById('browse-items');
	var fragment = document.createDocumentFragment();
	var items = [];
	for(var i = 0; i < data.length; ++i) {
		var card = document.createElement('div');
		card.className = 'grid-item';
		card.innerHTML =
			'<div class="card" onclick="alert(\'item_id: \' + ' + data[i].item_id + ')">' +
				'<img src="' + data[i].img_path + '" alt="">' +
				'<div class="item-details">' +
					'<h4><b>' + data[i].name + '</b></h4>' +
					'<p class="item-description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus, sapiente...</p>' +
					'<div class="highest-bid">Php ' + data[i].amount + '</div>' +
					'<div class="tag-list"></div>' +
				'</div>' +
			'</div>';
		
		//fill .tag-list with tags
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