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

    suggest_user$ = $('#username-selectize').selectize({
        maxItems: null,
        placeholder: 'Enter username',
        inputClass: 'form-control selectize-input',
        dropdownParent: 'body',
        valueField: 'username',
        labelField: 'name',
        searchField: 'username',
        onType: function(value) {
            if(value == '') {
                this.close();
            }
        },
        onDropdownOpen: function($dropdown) {
            if(!this.lastQuery.length) {
                this.close();
            }
        },
        load: function(query, callback) {
            var term = query.trim();
            if(term == '') {
                callback();
            }
            else {
                var suggestion = [];
                var icon = document.getElementById('search-user-icon');
                icon.className = 'loading-icon';
                $.ajax({
                    url: 'php/suggest_names.php',
                    type: 'get',
                    contentType: false,
                    dataType: 'json',
                    data: { search_term: term },
                    success: function(data, textStatus, xhr) {
                        for(var i = 0; i < data.length; ++i) {
                            suggestion.push(data[i]);
                        }
                    },
                    error: function(data, textStatus, xhr) {
                        alert('An error occured. See console for details.');
                        console.log(data.responseText);
                    },
                    complete: function() {
                        icon.className = 'glyphicon glyphicon-search';
                        callback(suggestion);
                    }
                });
            }
        },
        render: {
            item: function(item, escape) {
                var table = document.getElementById('blocked-bidders');
                var row = document.createElement('div');
                $(row).hide();
                row.className = 'user-row';
                row.innerHTML =
                    '<input type="hidden" name="blocked[]" value="' + escape(item.user_id) + '">' +
                    '<span class="name">' + escape(item.name) + '</span>' +
                    '<a class="username" href="http://localhost/augeo/user/account/' + escape(item.username) + '">' + escape(item.username) + '</a>' +
                    '<div class="remove-icon" onclick="removeRow(this, \'' + escape(item.username) + '\')" title="Exclude">' +
                        '<span class="glyphicon glyphicon-remove"></span>' +
                    '</div>';
                table.appendChild(row);
                $(row).slideDown('fast');
                return;
            },
            option: function(item, escape) {
                var label = item.username || item.name;
                var caption = item.username ? item.name : null;
                return '<div>' +
                    '<span class="label">' + escape(label) + '</span>' +
                    (caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
                '</div>';
            }
        }
    });

    suggest_tag$ = $('#tag-list').selectize({
        delimiter: ',',
        persist: false,
        placeholder: 'Enter one or more tags',
        inputClass: 'form-control selectize-input',
        dropdownParent: 'body',
        labelField: 'tag_name',
        valueField: 'tag_id',
        searchField: 'tag_name',
        onType: function(value) {
            if(value == '') {
                this.close();
            }
        },
        create: function(input) {
            input = input.replace(/\s+/g, '-').toLowerCase();
            return { 'tag_id': input, 'tag_name': input };
        },
        load: function(query, callback) {
            var term = query.trim();
            if(term == '') {
                callback();
            }
            else {
                var suggestion = [];
                $.ajax({
                    url: 'php/suggest_tags.php',
                    type: 'get',
                    contentType: false,
                    dataType: 'json',
                    data: { search_term: term },
                    success: function(data, textStatus, xhr) {
                        suggestion = data;
                    },
                    error: function(data, textStatus, xhr) {
                        alert('An error occured. See console for details.');
                        console.log(data.responseText);
                    },
                    complete: function() {
                        callback(suggestion);
                    }
                });
            }
        }
    });
});

function removeImg(btn) {
    var toRemove = btn.parentElement.parentElement;
    toRemove.parentElement.removeChild(toRemove);
}

function suggest_names(term) {
    var suggestion = [];
    $.ajax({
        url: 'php/suggest_names.php',
        type: 'get',
        contentType: false,
        dataType: 'json',
        data: { search_term: term },
        success: function(data, textStatus, xhr) {
            for(var i = 0; i < data.length; ++i) {
                suggestion.push(data[i]);
            }
        },
        error: function(data, textStatus, xhr) {
            alert('An error occured. See console for detauls.');
            console.log(data.responseText);
        },
        complete: function() {
            return suggestion;
        }
    });
}

function removeRow(elem, val) {
    var index = suggest_user$[0].selectize.items.indexOf(val);
    if(index > -1) {
        suggest_user$[0].selectize.items.splice(index, 1);
    }
    suggest_user$[0].selectize.removeItem(val, false);
    var row = elem.parentElement;
    $(row).slideUp('fast', function() { $(this).remove(); });
}

function useEditor(userWants) {
    if(userWants) {
        editor = new SimpleMDE({
            element: document.getElementById('description'),
            promptURLs: true
        });
    }
    else {
        editor.toTextArea();
        editor = null;
    }
}