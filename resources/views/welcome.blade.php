<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        <h1>GeoStatuses App</h1>
        <div id="map" style="height:60vh"></div>

        <script
                src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>
        <script>

            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: {lat: 50, lng: 14}
                });
            }

            function loadData(){

                $.ajax({
                    url: '{{ action('StatusController@index') }}',
                    method: 'get'
                });
            }

            loadData();

        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd1MDV7YL_ruIZgSTk_buouK8KiPXVuVA&callback=initMap"></script>





    </body>
</html>
