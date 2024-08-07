<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="css/animation.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/styler.css">
        <link rel=icon href="images/phone.jpg">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        <title>Oba wenuwen api</title>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
              integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
              crossorigin=""/>

        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
                integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>

        <script src="Js/leaafOSM/leaflet-providers.js" type="text/javascript"></script>
        <link href="css/MarkerCluster.Default.css" rel="stylesheet" type="text/css"/>
        <link href="css/MarkerCluster.css" rel="stylesheet" type="text/css"/>
        <script src="Js/leaafOSM/leaflet.markercluster-src.js" type="text/javascript"></script>
        <script src="Js/leaafOSM/leaflet.ajax.min.js" type="text/javascript"></script>

    </head>
    <body>
	<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
    <label class="logo1">ඔබ වෙනුවෙන් අපි  </label>
    <ul>
      <li><a href="index.php" class="active"> HOME </a></li>
      <li><a href="register.php"> REGISTER </a></li>
      <li><a href="view.php"> VIEW </a></li>
    </ul>
  </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Already Registered Users</h1>  
                </div>
                <div class="col-md-12" id="map" style="min-height: 70vh;">

                </div>
            </div>
        </div>
        <section id="footer">
          <hr>
        <div class="copyright-text">
          <p>&copy;Copyright 2021 Oba Wenuwen Api all rights reserved. | This website is made by <a href="http://nisilainsitha.online/" target="_blank">NISILA INSITHA</a></p>   
        </div>
      </section>
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

    L.control.scale().addTo(mymap);


    function getUserLocations() {
        $.ajax({
            url: "https://api.obawenuwenapi.ictforlife.org/api/person/get-geo-data",
            headers: {
                'app-token': '$*P?vm!QT?_sX=hv+jAsFgxmc2EFB!',
                'user-token': 'cf6ca479090a48dbd30bb1cf77328f86'
            },
            type: "GET",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response)
            {
                console.log(response);
//                alert(response.message);

                if (response.success) {


                    var markers = L.markerClusterGroup();

                    var markerList = [];
                    var markerListNeed = [];

                    for (var i = 0; i < response.data.length; i++) {

                        var lat = response.data[i].lat;
                        var lan = response.data[i].lng;


                        if (response.data[i].is_need_show == 1) {

                            var marker_need = L.marker([lat, lan]).bindPopup("Name : " + response.data[i].name + "<br> Address : " + response.data[i].address + "<br> <b>User Need : " + response.data[i].need + "</b>").openPopup();

                            markerListNeed.push(marker_need);

                        } else {

                            var marker = L.marker([lat, lan]).bindPopup("Name : " + response.data[i].name + "<br> Address : " + response.data[i].address);

                            markerList.push(marker);

                        }




                    }

                    markers.addLayers(markerList);
                    markers.addLayers(markerListNeed);
                    mymap.addLayer(markers);

                }

            },
            error: function (data) {

                alert(data.responseJSON.message);
            }
        });
    }

    getUserLocations();

</script>