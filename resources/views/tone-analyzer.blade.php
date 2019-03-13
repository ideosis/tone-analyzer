<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Tone Analyzer - Demo</title>
</head>
<style>
    html,
    body {
    height: 100%;
    }

    body {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
    }

    .form-tone-analyzer {
    width: 100%;
    /* max-width: 330px; */
    padding: 15px;
    margin: auto;
    }
    .form-tone-analyzer .form-control {
    position: relative;
    box-sizing: border-box;
    height: auto;
    padding: 10px;
    font-size: 16px;
    }
    .form-tone-analyzer .form-control:focus {
    z-index: 2;
    }
    .form-tone-analyzer input[type="message"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
</style>
<body class="text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-tone-analyzer" action="{{ url('tone-analyzer') }}" method="post">
                    @csrf
                    <h1 class="h3 mb-3 font-weight-normal">Tone Analyzer Demo</h1>
                    <div class="form-group">
                        <label for="text">Enter some text to analyze it's tone:</label>
                        <textarea class="form-control" id="text" name="text" rows="5" placeholder="I’m designing a document and don’t want to get bogged down in what the text actually says.">{{ old('text') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Analyze Tone</button>
                </form>
                <hr>

                @isset ($decodedJson->document_tone)
                    @foreach($decodedJson->document_tone->tones as $tone)
                        Tone: {!! $tone->tone_name !!} - Score: {!! $tone->score !!} <br>
                    @endforeach
                @else
                    No text to analyze
                @endisset
                <hr>
                @isset($decodedJson->sentences_tone)
                    @foreach($decodedJson->sentences_tone as $key)
                        {!! $key->text !!}
                        @foreach ($key->tones as $tones)
                            Tone: {!! $tones->tone_name !!} Scores: {!! $tones->score !!}
                        @endforeach
                        @if ($key->text)
                            <hr>
                        @endif
                    @endforeach
                @endisset
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
