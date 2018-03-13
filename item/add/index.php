<?php require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Add Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/selectize.js/dist/css/selectize.default.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/simplemde-markdown-editor/dist/simplemde.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
    <link rel="stylesheet" href="css/add_item.css">
</head>
<body>
    <?php require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php"; ?>

    <form role="form" class="form-horizontal">
        <div id="left-side">
            <div class="panel panel-default">
                <div class="panel-heading">Item Information</div>
                <div class="panel-body">
                    <!-- TITLE -->
                    <div class="form-group container-fluid">
                        <label class="control-label col-sm-1" for="title">Title:</label>
                        <div class="col-sm-11" style="padding-right: 0px">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Give a concise heading for the item" required>
                        </div>
                    </div>
                    <!-- DESCRIPTION -->
                    <div class="form-group container-fluid">
                        <label class="control-label" for="description">Description:</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Describe the item in detail" required></textarea>
                        <div style="display: table; float: right; padding: 10px;">
                            <div style="display: table-row">
                                <label for="advanced-editor-mode" style="display: table-cell; vertical-align: middle">Show advanced editor</label>
                                <label class="switch" style="display: table-cell; vertical-align: middle">
                                    <input type="checkbox" id="advanced-editor-mode" onchange="useEditor(this.checked)">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- IMAGES -->
					<div class="hr-sect">IMAGES</div>
                    <div id="img-section">
                        <button type="button" id="addImgBtn" class="btn btn-default" onclick="document.getElementById('item-img').click()">Upload image</button>
                        <input tabindex="-1" type="file" accept="image/jpeg" name="imgFiles[]" id="item-img" multiple required>
                        <div id="img-container" style="padding-top: 5px"></div>
                    </div>
                    <!-- TAGS -->
					<div class="hr-sect">TAGGING</div>
                    <div class="form-group container-fluid">
                        <label class="control-label col-sm-1" for="tag-list">Tags:</label>
                        <div class="col-sm-11" style="padding-right: 0px">
                            <input type="text" name="tags" id="tag-list" required>
                            <p class="note">Enter tags related to the item. Note that spaces will automatically be converted into hyphens.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="right-side">
            <div class="panel panel-default">
                <div class="panel-heading">Auction Settings</div>
                <div class="panel-body">
                    <!-- INITIAL PRICE -->
                    <div class="form-group container-fluid">
                        <label class="control-label" for="description">Base price:</label>
                        <div class="input-group">
                            <span class="input-group-addon">&#8369;</span>
                            <input type="number" min="1" class="form-control" id="initial-price" name="initial-price" placeholder="Set the item's starting price" required>
                        </div>
                    </div>
                    <!-- BID INTERVAL -->
                    <div class="form-group container-fluid">
                        <label class="control-label" for="description">Bid interval:</label>
                        <div class="input-group">
                            <span class="input-group-addon">&#8369;</span>
                            <input type="number" min="1" class="form-control" id="bid-interval" name="bid-interval" placeholder="Set the minimum incremental step" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BLOCKED USERS -->
            <div class="panel panel-default" id="additional-rules">
                <div class="panel-heading" data-toggle="collapse" id="rules-heading" href="#block-list">
                    <span>Additional Rules</span>
                    <i id="chevron-icon" class="glyphicon glyphicon-chevron-down" style="float: right"></i>
                </div>
                <div class="panel-collapse in" id="block-list">
                    <div class="panel-body">
                        <div class="form-group container-fluid">
                            <label class="control-label" for="select">Blocked list:</label>
                            <div class="input-group">
                                <select name="select" id="username-selectize"></select>
                                <span class="input-group-addon"><div id="search-user-icon" class="glyphicon glyphicon-search"></div></span>
                            </div>
                        </div>
                        <div id="blocked-bidders"></div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="checkbox">
                        <label><input type="checkbox" name="apply-blocking" checked>Apply rules</label>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="text-align: center">
                <div class="row">
                    <div class="col-xs-6">
                        <a class="btn btn-default" href="http://localhost/augeo/browse">Cancel</a>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success">Add Item</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/selectize.js/dist/js/standalone/selectize.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/simplemde-markdown-editor/dist/simplemde.min.js"></script>
    <script src="js/input_handler.js"></script>
    <script src="js/add_item.js"></script>
</body>
</html>