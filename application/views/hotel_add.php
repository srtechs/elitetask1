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
        <h1 class="m-0 text-dark"><?php echo (isset($hoteldetails)) ? 'Edit Hotel' : 'Add Hotel' ?>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Hotel</a></li>
          <li class="breadcrumb-item active"><?php echo (isset($hoteldetails)) ? 'Edit Hotel' : 'Add Hotel' ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <form method="post" id="vehicle_add" class="card basicvalidation" action="<?php echo base_url('hotel/inserthotel'); ?>" enctype="multipart/form-data">
      <div class="card-body">


        <div class="row">
          <input type="hidden" name="id" id="u_id" value="<?php echo (isset($hoteldetails)) ? $hoteldetails[0]['u_id'] : '' ?>">
          <input type="hidden" name="rating" value="5">

          <div class="col-sm-6 col-md-4">
            <label class="form-label">Name</label>
            <div class="form-group">
              <input type="text" name="name" id="u_name" required="true" class="form-control" placeholder="Name" value="<?php echo (isset($hoteldetails)) ? $hoteldetails[0]['u_name'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Email</label>
            <div class="form-group">
              <input type="text" name="email" id="u_email" required="true" class="form-control" placeholder="Email" value="<?php echo (isset($hoteldetails)) ? $hoteldetails[0]['u_email'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Phone</label>
            <div class="form-group">
              <input type="text" name="phone" id="u_username" required="true" class="form-control" placeholder="Phone number" value="<?php echo (isset($hoteldetails)) ? $hoteldetails[0]['u_username'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Address</label>
            <div class="form-group">
              <input type="text" required="true" class="form-control shadow-none" placeholder="21 A pll, Model Town Link Rd, G.." id="pac-input" name="address">
            </div>
          </div>
                <input type="text" class="form-control" id="lat"  name="lat" data-validate="required" data-message-required="<?php echo ('value_required');?>" hidden readonly autofocus>
                <input type="text" class="form-control" id="lng"  name="lng" data-validate="required" data-message-required="<?php echo ('value_required');?>" hidden  readonly>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Country</label>
            <div class="form-group">
              <input type="text" name="country" id="u_username" required="true" class="form-control" placeholder="Country" value="<?php echo (isset($hoteldetails)) ? $hoteldetails[0]['u_username'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Price</label>
            <div class="form-group">
              <input type="text" name="price" id="u_username" required="true" class="form-control" placeholder="Price" value="<?php echo (isset($hoteldetails)) ? $hoteldetails[0]['u_username'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Detail</label>
            <div class="form-group">
              <textarea type="text" rows="3" name="detail" required="true" class="form-control" placeholder="Details"></textarea>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Upload Images</label>
            <div class="form-group">
              <input type="file" name="images[]" multiple="multiple" class="form-control">
            </div>
          </div>
          <?php if (isset($hoteldetails[0]['u_isactive'])) { ?>
            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <label for="u_isactive" class="form-label">User Status</label>
                <select id="u_isactive" name="basic[u_isactive]" class="form-control " required="">
                  <option value="">Select User Status</option>
                  <option <?php echo (isset($hoteldetails) && $hoteldetails[0]['u_isactive'] == 1) ? 'selected' : '' ?> value="1">Active</option>
                  <option <?php echo (isset($hoteldetails) && $hoteldetails[0]['u_isactive'] == 0) ? 'selected' : '' ?> value="0">Inactive</option>
                </select>
              </div>
            </div>

          <?php } ?>
        </div>
        <hr>

      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary"> <?php echo (isset($hoteldetails)) ? 'Update Hotel' : 'Add Hotel' ?></button>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->


<!-- This modal is common for all tabs -->
    <div class="container">
        <div class="col-12 col-lg-8 col-md-8">
            <!-- Modal -->
            <div class="modal fade" id="mapmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="mapp-section rounded-ls " id="general-map-modal" style="height: 360px;">

                            </div>

                            <div class="p-3 d-flex justify-content-center ">
                                <button class="btn shadow-none text-capitalize" id="cordinate-submit-btn" data-name="" style="background-color: #7ba1e2; color:#fff">save location</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





<!-- Google Map API -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUvbG4h2n3nebCLvblRo8FxZeptoWC18M&callback=initMap&v=weekly" async></script>
 -->


<!--     <script type="text/javascript">

        var lat_temp = 40.730610;
        var lng_temp = -73.935242;

        function initMap() {

            var map = new google.maps.Map(document.getElementById("general-map-modal"), {
                zoom: 8,
                center: {
                    lat: 40.730610,
                    lng: -73.935242
                },
            });

            const marker = new google.maps.Marker({
                position: {
                    lat: 40.730610,
                    lng: -73.935242
                },
                map: map,
                draggable: true,
            });

            marker.addListener("mouseup", function(a) {
                // alert("l");
                lat_temp = a.latLng.lat();
                lng_temp = a.latLng.lng();
            })

            // Modal Coordinate Save Button
            $("#cordinate-submit-btn").click(function(e) {

                e.preventDefault();
                var myid = $(this).data("name")

                if (myid == "general-aoi-latlng-btn") {
                    $("#general-aoi-lat").val(lat_temp);
                    $("#general-aoi-lng").val(lng_temp);
                }

            })

            $("#general-aoi-latlng-btn").click(function() {

                var myid = $(this).data("name");
                $("#cordinate-submit-btn").data("name", myid);
            })

        }
    </script> -->