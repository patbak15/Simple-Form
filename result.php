<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="validator.js"></script>

<head>
	<title>SFSU CS Department - CSC 642 Fall 2016 Project: Form UI
	Patrick Aung, patbak15@mail.sfsu.edu </title>
	<link rel="stylesheet" type="text/css" href="stylesheets/main.css">
	<script src="http://code.jquery.com/jquery-1.5.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<style>
		h1{
			text-align: center
		}
		h3{
			font-size: small;
			text-align: left; 
			padding-left: 5em; 
		}
		
	</style>
</head>
<h1> SFSU CS Department - CSC 642 Fall 2016 Project: Form UI <br> 
	Patrick Aung, patbak15@mail.sfsu.edu </h1>
<br> <br> 
<div align="center">
	<h2> VERIFICATION PAGE</h2>
	<br>
	<h2> Please record the problem by filling the form below </h2>
</div>
<br> 

<div class="container">
	<fieldset>
		<legend>Personal Infomation</legend>
		<div class="row">
			<label for="fName" class="col-sm-3 control-label">First Name*</label>
			<div class="col-sm-9">
				<?php echo $_POST["fName"]; ?> 
			</div>
		</div>
		<div class="row">
			<label for="lName" class="col-sm-3 control-label">Last Name*</label>
			<div class="col-sm-9">
				<?php echo $_POST["lName"]; ?>
			</div>
		</div>
		<!-- END NAME --> 
		<div class="row">
			<label for="gender" class="col-sm-3 control-label">Gender</label> 
			<div class ="col-sm-9">
				<?php echo $_POST["gender"]; ?>
			</div>
		</div> 

		<div class="row">
			<label for="eduction" class="col-sm-3 control-label">Education*</label>
			<div class ="col-sm-9">
				<?php echo $_POST["eduction"]; ?>
			</div>
		</div>

		<div class="row">
			<label for="phone" class="col-sm-3 control-label">Phone*</label>
			<div class ="col-sm-9">
				<?php echo $_POST["phone"]; ?>
			</div>
		</div>

		<div class="row">
			<label for="email" class="col-sm-3 control-label">Email*</label>
			<div class ="col-sm-9">
				<?php echo $_POST["email"]; ?>
			</div>
		</div>

	</fieldset>
</div>

<div class="container">
	<fieldset>
		<legend>Incident Report</legend>
		<div class="row">
			<label for="date" class="col-sm-3 control-label">Date*</label>
			<div class="col-sm-9">
				<?php echo $_POST["date"]; ?> 
			</div>
		</div>
		<h4>Location of Incident</h4>
		<div class="row">
            <h5 style="text-align: right;" class="col-sm-3 control-h5 style="text-align: right;"">Google Maps</h5 style="text-align: right;">
            <h5 style="text-align: left;" class="col-sm-3 control-h5 style="text-align: right;"">

            <div id="map" style="width:400px;height:400px;background:white"></div>
           	</h5 style="text-align: right;">
        </div>

		<div class="row">
			<label for="address" class="col-sm-3 control-label">Address*</label>
			<div class="col-sm-9">
				<?php echo $_POST["address"]; ?> 
			</div>
		</div>
		<div class="row">
			<label for="city" class="col-sm-3 control-label">City/Town*</label>
			<div class="col-sm-9">
				<?php echo $_POST["city"]; ?> 
			</div>
		</div>

		<div class="row">
			<label for="state" class="col-sm-3 control-label">State*</label>
			<div class="col-sm-9">
				<?php echo $_POST["state"]; ?> 
			</div>
		</div>

		<div class="row">
			<label for="zip" class="col-sm-3 control-label">Zip*</label>
			<div class="col-sm-9">
				<?php echo $_POST["zip"]; ?> 
			</div>
		</div>

		<div class="row">
			<label for="address" class="col-sm-3 control-label">Catagory*</label>
			<div class="col-sm-9">
				<?php echo $_POST["catagory"]; ?> 
			</div>
		</div>

		<div class="row">
			<label for="description" class="col-sm-3 control-label">Description*</label>
			<div class="col-sm-9">
				<?php echo $_POST["description"]; ?> 
			</div>
		</div>

		<div class="row">
			<label for="image" class="col-sm-3 control-label">Image*</label>
			<div class="col-sm-9">
				<?php 
					//header('Content-Type: image/jpeg');
					$image = $_POST["address"];
					echo $image; 
				 ?> 
			</div>
		</div>

	</fieldset>
</div>
	<br><br>
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();
        var add = "<?php echo $_POST["address"]?>"; 
        var city = "<?php echo $_POST["city"]?>" ; 
        var state = "<?php echo $_POST["state"]?>"; 
        var zip = "<?php echo $_POST["zip"]?>"; 
        var address = add + city + state + zip;
        geocodeAddress(geocoder, map, address)
      }

      function geocodeAddress(geocoder, resultsMap, address) {
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode failed: ' + status);
          }
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrg0KTWfsRW2DeofZi59g1Hh47Z3YqidE&callback=initMap" async defer>
    </script>
</html> 