$(window).ready(function() {
    var chevron = document.getElementById('chevron-icon');
    document.getElementById('rules-heading').onclick = function() {
        chevron.classList.toggle("glyphicon-chevron-down");
        chevron.classList.toggle("glyphicon-chevron-up");
    };

    if(window.File && window.FileList && window.FileReader) {
        var item_images = document.getElementById('item-img');
        item_images.addEventListener('change', function(event) {
            var files = event.target.files; //FileList object
            var output = document.getElementById('img-container');
            for(var i = 0; i < files.length; i++) {
                var file = files[i];
                //only process jpeg files
                if(!file.type.match('image/jpeg'))
                    continue;

                var picReader = new FileReader();
                picReader.addEventListener('load', function(event) {
                    var picFile = event.target;
                    var div = document.createElement('div');
                    div.className = 'img-object';
                    div.innerHTML =
                        '<div class="options-bar-wrapper">' +
                           '<button type="button" class="option-bar" onclick="removeImg(this)">Unload</button>' +
                        '</div>' +
                        '<img src="' + picFile.result + '" title="Image ' + (output.children.length + 1) + '">';
                    output.insertBefore(div, output.firstChild);
                });
                //Read the image
                picReader.readAsDataURL(file);
            }
        });
    }
    else {
        alert('Your browser does not support FILE API');
    }
});

function removeImg(btn) {
    var toRemove = btn.parentElement.parentElement;
    toRemove.parentElement.removeChild(toRemove);
}