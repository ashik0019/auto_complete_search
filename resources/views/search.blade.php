<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auto Complete</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-lg-3">
                <h2>Search</h2>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="country_name">
                    <div id="countryList"></div>
                </div>
                {{csrf_field()}}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#country_name').keyup(function () {
                var query = $(this).val();
                if (query != '')
                {
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{route('autocomplete.fetch')}}",
                        method: "POST",
                        data: {query:query, _token: _token},
                        success: function (data) {
                            $('#countryList').fadeIn();
                            $('#countryList').html(data);
                        }
                    });
                }
            });
            $(document).on('click', 'li', function(){
                $('#country_name').val($(this).text());
                $('#countryList').fadeOut();
            });
        });
    </script>
</body>
</html>
