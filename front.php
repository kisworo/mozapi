<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Domain Filter Moz</title>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

        <style>
            a:hover, a:focus {
                text-decoration: none;
            }
            .navbar-inverse {
                background-color: #3A5795;
                border: 0px none;
            }
            .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:focus, .navbar-inverse .navbar-nav > .open > a:hover {
                color: #fff;
                background-color: #115185;
            }
            @media (max-width: 767px) {
                .navbar-inverse .navbar-nav .open .dropdown-menu > li > a, .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus, .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover {
                    color: #fff;
                }
                .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus, .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover {
                    background-color: #115185;
                }
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse" >
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2 text-center">
                    <h1>Domain Filter Moz</h1>                        
                        <div class="form-horizontal">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <textarea class="form-control input-sm" rows="25" id="backlink" name="backlink" placeholder="Insert Backlink and Enter"></textarea>
                                </div>
                                <div class="col-xs-6">
                                    <textarea class="form-control input-sm" rows="25" id="domain" name="domain" placeholder="Insert Domain and Enter"></textarea>
                                </div>
                            </div>

                        <div class="form-group">
                            <button class="btn btn-info" id="startjob" onclick="StartJob();" type="button">Run Filter</button>
                            <button class="btn btn-primary" type="submit" >Download</button>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <textarea id="filter-backlink" class="form-control" rows="4" placeholder="Backlink Result"></textarea>
                                </div>
                                <div class="col-xs-6">
                                    <textarea id="filter-domain" class="form-control" rows="4" placeholder="Domain Name"></textarea>
                                </div>
                            </div>
                            <div id="container"></div>
                        </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript">
        
        function StartJob(){
            var backlink = $.trim($("#backlink").val());
            var domain   = $.trim($("#domain").val());

            $.ajax({
                type: "POST",
                dataType:"json",
                data: {backlink:backlink, domain:domain},
                url: "parse.php",
                success: function(msg){
                    console.log(msg)
                    // alert(msg)

                    $.each (msg, function (bb) {
                            $('#filter-domain').append(msg[bb].domain + "\n \n");
                            $('#filter-backlink').append(msg[bb].backlink + "\n \n" );
                        // console.log (bb);
                        // console.log (msg[bb]);
                        // console.log (msg[bb].backlink);
                    });
                }
            });


        }        
        </script>

    
    </body>
</html>

