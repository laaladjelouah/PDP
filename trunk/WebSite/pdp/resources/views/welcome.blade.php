@extends('layouts.app')

@section('title')
Bienvenue
@endsection

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <div class="col-md-10">

            <div class="panel-body">
                <div class="col-lg-15 col-md-20">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-map-marker red "></i><strong>Vélos 
                                Disponibles</strong>

                            <div class="panel-actions">

                            </div>

                        </div>
                        <div class="panel-body-map">
                            <div id="map" style="height:380px;"></div>

                            <!--      carte   !-->
                            <script>

                                function initMap() {
                                    var myLatLng = {lat: 44.808903, lng:
                                                -0.591446};
                                    // var myLatLng =

//navigator.geolocation.getCurrentPosition();

                                    var map = new
                                            google.maps.Map(document.getElementById('map'), {
                                                zoom: 17,
                                                center: myLatLng
                                            });

                                    setMarkers(map);

                                }

                                var markers = [
                                    ['bike-1', 44.809342, -0.592120, 4],
                                    ['bike-2', 44.809403, -0.592123, 5],
                                    ['bike-3', 44.808837, -0.592350, 3],
                                    ['bike-4', 44.808823, -0.592373, 2],
                                    ['bike-5', 44.808808, -0.592388, 1]
                                ];





                                function setMarkers(map) {
                                    for (var i = 0; i < markers.length; i++) {
                                        var marker = markers[i];
                                        var marker = new google.maps.Marker({
                                            position: {lat: marker[1], lng:
                                                        marker[2]},
                                            map: map
                                        });
                                    }
                                }


                            </script>
                            <script async defer

                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC60BlnlCiuOYoq-TdDVubm4XP
                            WGRKWCZs&signed_in=true&callback=initMap"></script>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <h2>Empruntez un vélo</h2>
        <p>Pour profiter pleinement de notre service de partage de vélos </p>
        <p>Veuillez vous inscrire</p>

        <a class="btn btn-success" href="{{ url('/register') }}">Inscription</a>
    </div>
</div>


<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <h2>1</h2>
            <p>
                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, 
                tellus ac cursus commodo, tortor mauris condimentum nibh, ut 
                fermentum massa justo sit amet risus. Etiam porta sem 
                malesuada magna mollis euismod. Donec sed odio dui. 
            </p>

        </div>
        <div class="col-xs-6 col-md-3">
            <h2>2</h2>
            <p>
                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, 
                tellus ac cursus commodo, tortor mauris condimentum nibh, ut 
                fermentum massa justo sit amet risus. Etiam porta sem 
                malesuada magna mollis euismod. Donec sed odio dui. 
            </p>

        </div>
        <div class="col-xs-6 col-md-3">
            <h2>3</h2>
            <p>
                Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, 
                egestas eget quam. Vestibulum id ligula porta felis euismod 
                semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris 
                condimentum nibh, ut fermentum massa justo sit amet risus.
            </p>

        </div>

        <div class="col-xs-6 col-md-3">
            <h2>4</h2>
            <p>
                Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, 
                egestas eget quam. Vestibulum id ligula porta felis euismod 
                semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris 
                condimentum nibh, ut fermentum massa justo sit amet risus.
            </p>

        </div>

    </div>

    <hr>
</div> <!-- /container -->


@endsection
