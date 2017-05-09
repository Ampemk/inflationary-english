<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inflationary English</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            p::first-letter{
                text-transform: capitalize;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-inverse ">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Inflationary English</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">

                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8 center-block" style="float: none;">
                    <form id="sentence">

                        <div class="form-group">
                            <label for ="sentence"> Message</label>
                            <textarea  class="form-control" name="sentence" id="sentence" placeholder="Enter Your Sentence"></textarea>
                        </div>
                        <div>

                            <button type="button" onclick="inflate_sentence()" class="btn btn-default submit"> Inflate Now</button>
                        </div>


                    </form>
                </div>

                <div class="col-md-8 center-block" style="float:none;padding: 50px;">

                    <p id="results" class="results"> Input results will appear here.</p>
                </div>
            </div>



        </div><!-- /.row -->





        <script>
            // process the form
            function inflate_sentence() {
                var formData = $("#sentence").serialize();

                $.ajax({
                    type: 'POST', // use POST method
                    url: 'app/main.php', // post to main.php
                    data: formData, // input data
                    dataType: 'json', // returns json
                    encode: true
                })
                        .done(function (data) {

                            if (typeof data.error === 'undefined') {

                                $("#results").text(data.inflated).addClass('results')
                            } else {
                                
                                // display error through alert.
                                alert(data.error);
                            }

                        });


                event.preventDefault();

            }


        </script>
    </body>
</html>
