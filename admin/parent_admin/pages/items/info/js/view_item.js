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



window.onload = function() {
    var bid_sectToggler = document.getElementById('bid-sect-toggler');
    bid_sectToggler.addEventListener('click', function() {
        this.style.display = 'none';
    });

    document.getElementById('bid-cancel').addEventListener('click', function() {
        bid_sectToggler.style.display = 'initial';
        document.getElementById('bid-amount').value = '';
    });

    $('.pannable')
	// mouse actions on pannable image
	.on('mouseover', function() {
		$(this).css({
			'transform-origin': '0% 0% 0',
			'transform': 'scale(1.5)'
        });
        $('.carousel-control').fadeOut({duration: '100' });
	})
	.on('mouseout', function() {
		$(this).css({
			'transform': 'scale(1)'
		});
        $('.carousel-control').fadeIn({duration: '100' });
	})
	.on('mousemove', function(e) {
		$(this).css({
			'transform-origin': (((e.pageX - $(this).offset().left) / 1.5) / $(this).width()) * 100 + '% ' + (((e.pageY - $(this).offset().top) / 1.5 ) / $(this).height()) * 100 + '%'
		});
	})
};

$('#bid-form').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: 'php/bid.php',
        type: 'post',
        dataType: 'json',
        data: {
            user_id: document.getElementById('user_id').value,
            item_id: document.getElementById('item_id').value,
            amount: document.getElementById('bid-amount').value,
        },
        success: function(bid_info, textStatus, xhr) {
            updateBidHistory(bid_info);
            notifySuccess();
        },
        error: function(xhr, textStatus, errThrown) {
            alert("An error occured. See console for details.");
            console.log(xhr.responseText)
        }
    });
});

function updateBidHistory(bid) {
    var bid_row = document.createElement('div');
    bid_row.innerHTML =
        '<div><div class="bid-date">' + bid.date + '</div></div>' +
        '<div><div class="node"><div></div></div></div>' +
        '<div><div class="bid-amount">Php ' + bid.amount + '</div></div>' +
        '<div><div class="bidder">' +
            '<a href="http://localhost/augeo/users/' + bid.username + '">' + bid.username + '</a>' +
        '</div></div>';
    bid_row.className = 'new bid-history-row';

    var table = document.getElementById('history-table');
    table.insertBefore(bid_row, table.firstElementChild);
}

function notifySuccess() {
    var notif_container = document.createElement('div');
    notif_container.className = 'notif show-notif';
    var img_wrapper = document.createElement('div');
    img_wrapper.className = 'notif-img';

    var img = document.createElement('img');
    img.id = 'notif-img';
    img.src = 'http://localhost/augeo/global/img/check-icon.png';

    var notif_body = document.createElement('div');
    notif_body.className = 'notif-content';
    notif_body.innerHTML = 'Your bid has been recorded';

    img_wrapper.appendChild(img);
    notif_container.appendChild(img_wrapper);
    notif_container.appendChild(notif_body);
    document.body.appendChild(notif_container);

    window.setTimeout(function() {
        notif_container.classList.remove("show-notif");
        notif_container.parentElement.removeChild(notif_container);
    }, 5000);
}



var modalConfirm = function(callback){

  $("#ban-account").on("click", function(){
    $("#ban-modal").modal('show');
  });

  $("#ban-yes").on("click", function(){
    callback(true);
    $("#ban-modal").modal('hide');
  });

  $("#ban-no").on("click", function(){
    callback(false);
    $("#ban-modal").modal('hide');
  });
};

modalConfirm(function(confirm){
  if(confirm){

       $.ajax({
              type: "POST",
              url: "php/index.php",
              data: {
                    delete_item: $("#item_id").val(),
                    item_state: $("#item_state").val()
                    },
              success: function(result) {
                          window.location.href = "../index.php?msg=1";


                    }
               });


  }else{
    //Acciones si el usuario no confirma
    $("#result").html("NO CONFIRMADO");
  }
});