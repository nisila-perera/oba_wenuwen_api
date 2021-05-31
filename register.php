<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="css/animation.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
              integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
              crossorigin=""/>

        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
                integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>

        <title>Oba wenuwen api</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Oba wenuwen api</a>
                </div>
                <ul class="nav navbar-nav">
                    <li ><a href="index.php">Home</a></li>
                    <li class="active"><a href="register.php">Registration</a></li>
                    <li><a href="view.php">View</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        Register to Obawenuwen Api
                    </h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <form id="register-form">
                    <div class="col-md-6">

                        <input type="hidden" class="form-control" id="lat" name="lat" required>
                        <input type="hidden" class="form-control" id="lng" name="lng" required>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"  required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" rows="5" id="address" name="address" required></textarea>

                        </div>
                        <div class="form-group">
                            <label for="address">Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact_number">

                        </div>
                        <div class="form-group">
                            <label for="needs">What did you need?</label>
                            <input type="text" class="form-control" id="needs" name="need">

                        </div>
                        <div class="form-group">
                            <label for="needs">Is location needed to be highlighted?</label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="is_need_show" value="1" >Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_need_show" value="0" checked>No
                            </label>
                        </div>    


                    </div>
                    <div class="col-md-6" style="min-height:70vh;background-color: #efefef;" id="map">



                    </div>
                    <div class="col-md-12" style="margin-bottom: 200px;">
                        <input type="submit" class="btn btn-primary btn-block" value="Register now">
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="footer">
            &copy; Supported by <a href="https://ictbus.online">ICTBUS</a> in collaboration with ICT FOR LIFE
        </div>
    </body>
</html>

<script type="text/javascript">

    var mymap = L.map('map').setView([7.508377, 80.749780], 9);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'sk.eyJ1IjoiZGluZXRoMTIzIiwiYSI6ImNqcXE1dW5ucjA4NzE0OHFnOXFzMW9rNDQifQ.RIVEdTnP7khmj82cjfQNoA'
    }).addTo(mymap);

    function getLiveLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(addMarker);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function addMarker(position) {

        var latlng = [position.coords.latitude, position.coords.longitude];

        $("#lat").val(position.coords.latitude);
        $("#lng").val(position.coords.longitude);

        mymap.panTo(new L.LatLng(latlng[0], latlng[1]));

        marker = new L.marker(latlng, {draggable: 'true'});
        marker.on('dragend', function (event) {
            var marker = event.target;
            var position = marker.getLatLng();
            marker.setLatLng(new L.LatLng(position.lat, position.lng), {draggable: 'true'});
            mymap.panTo(new L.LatLng(position.lat, position.lng));

//            alert(position);

            $("#lat").val(position.lat);
            $("#lng").val(position.lng);


        });
        mymap.addLayer(marker);

    }

    L.control.scale().addTo(mymap);

    getLiveLocation();

</script>

<script type="text/javascript">

      $(document).ready(function (e) {
        $("#register-form").on('submit', (function (e) {

            e.preventDefault();
            $.ajax({
                url: "http://api.obawenuwenapi.ictforlife.org/api/person/save-geo-data",
                headers: {
                    'app-token': '$*P?vm!QT?_sX=hv+jAsFgxmc2EFB!',
                    'user-token': '65f1e5e0c97ecb377b024bf81955c06a'
                },
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response)
                {
                    console.log(response);
                    alert(response.message);

                },
                error: function (data) {

                    alert(data.responseJSON.message);
                }
            });
        }));
    }
    );

</script>