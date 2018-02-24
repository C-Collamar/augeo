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
                    <div class="form-group container-fluid no-lr-padding">
                        <label class="control-label col-sm-1" for="title">Title:</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="title">
                        </div>
                    </div>
                    <!-- DESCRIPTION -->
                    <div class="form-group container-fluid">
                        <label class="control-label" for="description">Description:</label>
                        <textarea class="form-control" id="description"></textarea>
                    </div>
                    <!-- IMAGES -->
					<div class="hr-sect">UPLOAD IMAGES</div>
                    <div id="img-section">
                        <button type="button" class="btn btn-default">Upload image</button>
                        <div id="img-container" style="padding-top: 5px">
                            <div class="img-object">
                                <div class="options-bar-wrapper">
                                    <button type="button" class="option-bar">Unload</button>
                                </div>
                                <img src="http://localhost/augeo/data/user/profile_img/1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- TAGS -->
					<div class="hr-sect">TAGGING</div>
                    <div class="form-group container-fluid no-lr-padding">
                        <label class="control-label col-sm-1" for="tag-list">Tags:</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="tag-list" placeholder="Enter one or more tag names">
                            <p class="note" style="padding-top: 5px"></p>
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
                        <label class="control-label" for="description">Starting price:</label>
                        <div class="input-group">
                            <span class="input-group-addon">&#8369;</span>
                            <input type="number" class="form-control" name="initial-price">
                        </div>
                    </div>
                    <!-- BID INTERVAL -->
                    <div class="form-group container-fluid">
                        <label class="control-label" for="description">Bid interval:</label>
                        <div class="input-group">
                            <span class="input-group-addon">&#8369;</span>
                            <input type="number" class="form-control" name="bid-interval">
                        </div>
                    </div>
                </div>
            </div>
            <!-- BLOCKED USERS -->
            <div class="panel panel-default" id="additional-rules" onclick="invert_chevron()">
                <div class="panel-heading" data-toggle="collapse" href="#block-list">
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
                                <input type="checkbox" name="apply-blocking-bidders" checked>Block users in this list
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
</body>
</html>