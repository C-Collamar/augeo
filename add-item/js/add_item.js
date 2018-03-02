$(window).ready(function() {
    $('#title').val('Sample Title');
    $('#description').val('Sample description');
    $('#tag-list').val('tag1,tag2,tag3');
    $('#initial-price').val(9);
    $('#bid-interval').val(3);

    $('form').submit(function(event) {
        event.preventDefault(); //prevent form's default action
        var formData = new FormData(this);
        var imgFiles = document.getElementById('item-img').files;
        for(var i = 0; i < imgFiles.length; ++i) {
            formData.append('imgFiles[' + i + ']', imgFiles[i]);
        }

        $.ajax({
            url: 'php/add_item.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            // dataType: 'json',
            success: function(data, textStatus, xhr) {
                if(data.error) {
                    alert('An error occured. See console for details.');
                    console.log(data.error);
                    return;
                }
                window.location = 'http://localhost/augeo/browse/?item=' + data;
            },
            error: function(data, textStatus, xhr) {
                alert('An internal error occured. See console for details.');
                console.log(data.responseText, xhr);
            }
        });
    });
});