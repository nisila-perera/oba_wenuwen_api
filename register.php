<!doctype html>
<html lang="en">
  <head>
  	<title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel=icon href="images/phone.jpg">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styler.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
              integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
              crossorigin=""/>

        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
                integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>

	</head>
	<body>
	<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
    <label class="logo1">ඔබ වෙනුවෙන් අපි </label>
    <ul>
      <li><a href="index.php" class="active"> HOME </a></li>
      <li><a href="register.php"> REGISTER </a></li>
      <li><a href="view.php"> VIEW </a></li>
    </ul>
  </nav>
	<section class="ftco-section">

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="col-md-6" id="map">
							</div>
			      		</div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Register</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
					  <form id="register-form" class="signin-form">
						<div class="form-group mb-3">
						<input type="hidden" class="form-control" id="lat" name="lat" required>
                        <input type="hidden" class="form-control" id="lng" name="lng" required>
							<label class="label" for="name">Name</label>
							<input type="text" name="full_name" class="form-control" placeholder="Name" required>
						</div>
				  <div class="form-group mb-3">
					  <label class="label" for="password">Address</label>
					<input type="text" name="address" class="form-control" placeholder="Address" required>
				  </div>
				  <div class="form-group mb-3">
					  <label class="label" for="password">Contact</label>
					<input type="text" name="contact_number" class="form-control" placeholder="Conatct" required>
				  </div>
				  <div class="form-group mb-3">
					  <label class="label" for="password">What did you need?</label>
					<input type="text" name="need" class="form-control" placeholder="Type need" required>
				  </div>
				  <div class="form-group mb-3">
					  <label for="needs" class="label">Is location needed to be highlighted?</label>
					  <br>
					  <label class="radio-inline">
						  <input type="radio" name="is_need_show" value="1" checked>Yes
					  </label>
					  <label class="radio-inline">
						  <input type="radio" name="is_need_show" value="0" >No
					  </label>
				  </div> 


				  <div class="form-group">
					  <button type="submit" class="form-control btn btn-primary submit px-3" value="Register now">Register</button>
				  </div>
				  <!--<div class="form-group d-md-flex">
					  <div class="w-50 text-left">
						  <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									  </label>
								  </div>
								  <div class="w-50 text-md-right">
									  <a href="#">Forgot Password</a>
								  </div>
				  </div>-->
				</form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
	<section id="footer">
          <hr>
        <div class="copyright-text">
          <p>&copy;Copyright 2021 Oba Wenuwen Api all rights reserved. | This website is made by <a href="http://nisilainsitha.online/" target="_blank">NISILA INSITHA</a></p>   
        </div>
      </section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

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
                url: "https://api.obawenuwenapi.ictforlife.org/api/person/save-geo-data",
                headers: {
                    'app-token': '$*P?vm!QT?_sX=hv+jAsFgxmc2EFB!',
                    'user-token': 'cf6ca479090a48dbd30bb1cf77328f86'
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