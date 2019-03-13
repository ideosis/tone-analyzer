<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.5 Ajax Request example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src = "js/jquery-3.1.1.min.js"></script>
    <script src = "js/app.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    <div class="container">
        <h1>Laravel 5.5 Ajax Request example</h1>
        <div id="form-messages"></div>
        <form id="ajax-contact" method="POST" action="ajaxRequest">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" name="message" id="message" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block btn-submit">Submit</button>
            </div>
        </form>
        <hr>
    </div>
</body>

</html>
