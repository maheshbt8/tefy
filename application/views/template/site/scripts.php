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


<script src="<?php echo base_url();?>assets/scripts/validations/jquery.validate.js"></script>
<script src="<?php echo base_url();?>assets/scripts/validations/examples.validation.js"></script>

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






    <script type="text/javascript">
    function add_bookmark(listing_id){ 
  $.ajax({
            url: '<?php echo base_url();?>home/add_bookmark/' + listing_id ,
            success: function(response)
            {
              //alert(response);
                /*jQuery('#plans_list').html(response);*/
            }
    });
    }
  </script>
 <!--  <script type="text/javascript">
     $(document).ready(function(){
        return get_reviews();
     });
  </script> -->
  <script type="text/javascript">
 var rowno=0;
 get_reviews(rowno);

  $('#pagination_data').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       get_reviews(pageno);
     });

   function get_reviews(rowno){
    var school_id=$('#single_school_id').val();
       $.ajax({
            url: '<?php echo base_url();?>home/get_reviews/' + rowno ,
            data: {listing_id : school_id},
            type: 'get',
         dataType: 'json',
            success: function(response)
            {
              $('#pagination_data').html(response.pagination);
              $('#review_list').html(response.result);
            //createTable(response.result,response.row);
                /*jQuery('#plans_list').html(response);*/
            }
    });
     }
      // Create table list
     function createTable(result,sno){
       sno = Number(sno);
       $('#review_list').empty();
       for(index in result){
          var id = result[index].id;
          var review = result[index].review;
          var rating = result[index].rating;
          sno+=1;

          /*var tr = "<tr>";
          tr += "<td>"+ sno +"</td>";
          tr += "<td>"+ title +"</a></td>";
          tr += "<td>"+ content +"</td>";
          tr += "</tr>";*/
          var tr='<li><div class="avatar"><img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /><div class="comment-by">John Doe<span class="date">May 2019</span></div></div><div class="comment-content"><div class="arrow-comment"></div><p class="more1">'+review+'.</p><div class="star-rating" data-rating="5"></div></div></li>';
          $('#review_list').append(tr);
 
        }
      }
  
</script>