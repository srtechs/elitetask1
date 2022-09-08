<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
                       
          
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          console.log(place.address_components)
          if (place.address_components) {
              var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();
        console.log(latitude);
        console.log(longitude);
        document.getElementById("lat").value = latitude;
        document.getElementById("lng").value = longitude;
        
        //infodetail
    //    $("#lat").val(latitude);
      //   $("#lng").val(longitude);
        
              
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }
            document.getElementById("infodetail").value = place.name;
          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      }
    </script>

   </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUvbG4h2n3nebCLvblRo8FxZeptoWC18M&libraries=places&callback=initMap"
        async defer></script>

<div id="map"></div>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <div class="img-profile ml-4">
          <img src="<?= base_url() ?>assets/uploads/newlogo1.png" class="img-circle img-fluid" style="height: 100px;width: 100px;">
        </div>
        <h1 class="m-0 text-dark"><?php echo (isset($hoteldetails)) ? 'Edit hotel' : 'Add Hotel' ?>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Hotels</a></li>
          <li class="breadcrumb-item active"><?php echo (isset($hoteldetails)) ? 'Edit Hotel' : 'Add Hotel' ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <form method="post" id="hotel_add" class="card" action="<?php echo base_url() . "hotel/updatehoteldata/" . $id; ?>">
      <div class="card-body">

        <div class="row">
          <?php
          //  echo "<pre>";
          //  print_r($hoteldetails);
          // echo "</pre>";
          ?>

          <div class="col-sm-6 col-md-3">
            <div class="form-group">
              <label class="form-label">Name<span class="form-required">*</span></label>
              <input type="text" required="true" value="<?php echo (isset($hoteldetails)) ? $hoteldetails['name'] : '' ?>" class="form-control" name="name" placeholder="hotel Name">
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="form-group">
              <label class="form-label">Phone<span class="form-required">*</span></label>
              <input type="text" required="true" class="form-control" value="<?php echo (isset($hoteldetails)) ? $hoteldetails['phone'] : '' ?>" id="c_mobile" name="phone" placeholder="hotel Mobile">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="form-group">
              <label class="form-label">Email</label>
              <input type="text"  required="true" class="form-control" value="<?php echo (isset($hoteldetails)) ? $hoteldetails['email'] : '' ?>" id="c_email" name="email" placeholder="hotel Email">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="form-group">
              <label class="form-label">Address</label>
              <input type="text"  required="true" class="form-control" value="<?php echo (isset($hoteldetails)) ? $hoteldetails['address'] : '' ?>" id="pac-input" name="address">
            </div>
          </div>
          <input type="text" class="form-control" id="lat"  name="lat" data-validate="required" data-message-required="<?php echo ('value_required');?>" value="<?php echo (isset($hoteldetails)) ? $hoteldetails['lat'] : '' ?>" hidden readonly>
          <input type="text" class="form-control" id="lng"  name="lng" data-validate="required" data-message-required="<?php echo ('value_required');?>" value="<?php echo (isset($hoteldetails)) ? $hoteldetails['lng'] : '' ?>" hidden readonly>
          <div class="col-sm-6 col-md-4">
            <div class="form-group">
              <label class="form-label">Country</label>
              <input type="text"  required="true" class="form-control" value="<?php echo (isset($hoteldetails)) ? $hoteldetails['country'] : '' ?>" id="c_email" name="country">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="form-group">
              <label class="form-label">Price</label>
              <input type="text"  required="true" class="form-control" value="<?php echo (isset($hoteldetails)) ? $hoteldetails['price'] : '' ?>" id="c_email" name="price">
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
              <label class="form-label">Detail<span class="form-required">*</span></label>
              <textarea class="form-control" required="true" id="c_address" autocomplete="off" name="detail"><?php echo (isset($hoteldetails['detail'])) ? $hoteldetails['detail'] : '' ?></textarea>
            </div>
          </div>




        </div>

        <div class="modal-footer">

          <button type="submit" class="btn btn-primary"> <?php echo (isset($hoteldetails)) ? 'Update hotel' : 'Add hotel' ?></button>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->