<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
        <h1>GeoStatuses App</h1>
        <div id="map" style="height:60vh"></div>

        <button id="modal-button" class="btn btn-primary">Click me!</button>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>

            var map;

            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: {lat: 50, lng: 14}
                });
            }

            function loadData(){
                $.ajax({
                    url: '{{ action('StatusController@index') }}',
                    method: 'get'
                }).done(function(data){

                    $.each(data, function(index, status){

                        var marker = new google.maps.Marker({
                            position: {lat: parseFloat(status.lat), lng: parseFloat(status.lng)},
                            label: status.status,
                            map: map
                        });
                    });
                });
            }

            loadData();
            setInterval(loadData, 2000);

        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd1MDV7YL_ruIZgSTk_buouK8KiPXVuVA&callback=initMap"></script>

        <script>
            $('#modal-button').click(function(){

                $.ajax({
                    url: 'modal',
                    method: 'get'
                }).done(function(data){

                    var modal = $(data);

                    $('body').append(modal);

                    modal.modal('show');
                })

            })
        </script>




    </body>
</html>
