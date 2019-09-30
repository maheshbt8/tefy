<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/jquery-migrate-3.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/chosen.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/counterup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/custom.js"></script>


<!-- Leaflet // Docs: https://leafletjs.com/ -->
<script src="<?php echo base_url('assets')?>/scripts/leaflet.min.js"></script>

<!-- Leaflet Maps Scripts -->
<script src="<?php echo base_url('assets')?>/scripts/leaflet-markercluster.min.js"></script>
<script src="<?php echo base_url('assets')?>/scripts/leaflet-gesture-handling.min.js"></script>
<script src="<?php echo base_url('assets')?>/scripts/leaflet-listeo.js"></script>

<!-- Leaflet Geocoder + Search Autocomplete // Docs: https://github.com/perliedman/leaflet-control-geocoder -->
<script src="<?php echo base_url('assets')?>/scripts/leaflet-autocomplete.js"></script>
<script src="<?php echo base_url('assets')?>/scripts/leaflet-control-geocoder.js"></script>


<!-- Typed Script -->
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/typed.js"></script>
<script>
var typed = new Typed('.typed-words', {
strings: ["Schools"," Schools"," Schools"],
	typeSpeed: 80,
	backSpeed: 80,
	backDelay: 4000,
	startDelay: 1000,
	loop: true,
	showCursor: true
});
</script>


<script>
      function initMap() {
       
       
        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

       
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          console.log(place.geometry.location.lat()+', '+place.geometry.location.lng());
          //alert(place.geometry);
          $("#lat").val(place.geometry.location.lat());
           $("#lng").val(place.geometry.location.lng());
            $("#address").val(place.name);
          console.log(place.name);  
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

        });

        
      }
      
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZ-5bkYW9Wb5k2JLBoaas0HSx7ZBkMwAM&libraries=places&callback=initMap"
        async defer></script>