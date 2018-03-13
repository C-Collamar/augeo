$(window).ready(function() {
    $('form').submit(function(event) {
        event.preventDefault(); //prevent form's default action
        var formData = new FormData(this);

        var imgFiles = document.getElementById('item-img').files;
        for(var i = 0; i < imgFiles.length; ++i) {
            formData.append('imgFiles[' + i + ']', imgFiles[i]);
        }

        $.ajax({
            url: 'php/add_item.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data, textStatus, xhr) {
                if(data.error) {
                    alert('An error occured. See console for details.');
                    console.log(data.error);
                    return;
                }
                window.location = 'http://localhost/augeo/item/view/?id=' + data;
            },
            error: function(data, textStatus, xhr) {
                alert('An internal error occured. See console for details.');
                console.log(data.responseText, xhr);
            }
        });
    });
});