<!DOCTYPE html>
<html>

<head>
    <title>Laravel 5.5 Ajax Request example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Laravel 5.7 Ajax Request Demo</h1>
                <div id="form-messages"></div>
                <form id="ajax-contact" method="post" action="ajaxRequest">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" id="email" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block btn-submit">Submit</button>
                    </div>
                    @csrf
                </form>
                <hr>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        // Get the form.
        var form = $('#ajax-contact');

        // Get the messages div.
	    var formMessages = $('#form-messages');

        $(".btn-submit").click(function(e) {
            e.preventDefault();

            // Serialize the form data.
		    var formData = $(form).serialize();

            $.ajax({
                url: $(form).attr('action'),
                type: $(form).attr('method'),
                data: formData,
                dataType: 'JSON',
                success: function(response) {
                    if($.isEmptyObject(response.error)) {
                        // Make sure that the formMessages div has the 'success' class.
                        $(formMessages).removeClass('alert alert-danger');
                        $(formMessages).addClass('alert alert-success');

                        // Set the message text.
                        $(formMessages).text(response.success);

                        // Clear the form.
                        $('#name').val('');
                        $('#email').val('');
                        $('#message').val('');

	                } else {
                        // Make sure that the formMessages div has the 'error' class.
                        $(formMessages).removeClass('alert alert-success');
                        $(formMessages).addClass('alert alert-danger');
                        // print each error messages
                        printErrorMsg(response.error);

                    } // end of if-else

                    function printErrorMsg (msg) {
                        $.each( msg, function( key, value ) {
                            // Set the message text.
                            $(formMessages).append('<li>'+value+'</li>');
                        });
                    }

                } //end of success
            });

        });



    });
</script>

</html>
