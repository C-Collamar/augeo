

    <!DOCTYPE html>

    <html lang="en">

    <head>

    <meta charset="UTF-8">

    <title>Open Bootstrap Modal on Page Load</title>


<link rel="stylesheet" href="global/vendor/bootstrap/dist/css/bootstrap.min.css">
   <script src="global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>



    <script type="text/javascript">

        $(document).ready(function(){

            $("#myModal").modal('show');

        });

    </script>

    </head>

    <body>

    <div id="myModal" class="modal fade">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Subscribe our Newsletter</h4>

                </div>

                <div class="modal-body">

                    <p>Subscribe to our mailing list to get the latest updates straight in your inbox.</p>

                    <form>

                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="Name">

                        </div>

                        <div class="form-group">

                            <input type="email" class="form-control" placeholder="Email Address">

                        </div>

                        <button type="submit" class="btn btn-primary">Subscribe</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    </body>

    </html>

