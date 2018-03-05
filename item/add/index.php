<!DOCTYPE html>
<html>
<head>
<title>Add Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
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
                    </div>
                    <!-- IMAGES -->
					<div class="hr-sect">IMAGES</div>
                    <div id="img-section">
                        <button type="button" id="addImgBtn" class="btn btn-default" onclick="document.getElementById('item-img').click()">Upload image</button>
                        <input type="file" accept="image/jpeg" name="imgFiles[]" id="item-img" multiple required>
                        <div id="img-container" style="padding-top: 5px"></div>
                    </div>
                    <!-- TAGS -->
					<div class="hr-sect">TAGGING</div>
                    <div class="form-group container-fluid">
                        <label class="control-label col-sm-1" for="tag-list">Tags:</label>
                        <div class="col-sm-11" style="padding-right: 0px">
                            <input type="text" name="tags" class="form-control" id="tag-list" placeholder="Enter one or more tag names" required>
                            <p class="note">
                                Spaces will automatically be converted into hyphens.<br>Programmer's note: I'm planning on using
                                selectize.js for tagging. As of now, input tags wil be submitted in plain text separated by commas.
                            </p>
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
                <div class="panel-collapse collapse" id="block-list">
                    <div class="panel-body">
                        <div class="form-group container-fluid">
                            <label class="control-label" for="description">Users to block for this item:</label>
                            <div class="input-group">
                                <input class="form-control" placeholder="Search user">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>Mary</td>
                                        <td>Moe</td>
                                        <td>mary@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>July</td>
                                        <td>Dooley</td>
                                        <td>july@example.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="block-bidders" checked>Block users in this list
                            </label>
                        </div>
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
    <script src="js/input_handler.js"></script>
    <script src="js/add_item.js"></script>
</body>
</html>