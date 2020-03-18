

$(function() {

    var start = moment().subtract(0, 'days');
    var end = moment().add(2, 'days');

    function cb(start, end) {
        $('#booking-date-search').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    cb(start, end);
    $('#booking-date-search').daterangepicker({
      "opens": "right",
      "autoUpdateInput": true,
      "alwaysShowCalendars": true,
        startDate: start,
        endDate: end
    }, cb);

    cb(start, end);

});

// Calendar animation and visual settings
$('#booking-date-search').on('show.daterangepicker', function(ev, picker) {
  $('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
  $('.daterangepicker').removeClass('calendar-hidden');
});
$('#booking-date-search').on('hide.daterangepicker', function(ev, picker) {
  $('.daterangepicker').removeClass('calendar-visible');
  $('.daterangepicker').addClass('calendar-hidden');
});

$(window).on('load', function() {
    $('#booking-date-search').val('');
});




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
          var tr='<li><div class="avatar"><img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /><div class="comment-by">John Doe<span class="date">May 2019</span></div></div><div class="comment-content"><div class="arrow-comment"></div><p class="more1">'+review+'.</p><div class="star-rating" data-rating="5"></div></div></li>';
          $('#review_list').append(tr);
 
        }
      }
  
 var rowno2=0;
 get_comments(rowno2);

  $('#pagination_data2').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       get_comments(pageno);
     });

   function get_comments(rowno){
    var blog=$('#single_blog_id').val();
       $.ajax({
            url: '<?php echo base_url();?>home/get_comments/' + rowno ,
            data: {blog_id : blog},
            type: 'get',
         dataType: 'json',
            success: function(response)
            {
              $('#pagination_data2').html(response.pagination);
              $('#comment_list').html(response.result);
            }
    });
     }
     function replay_comment(replay,sub_replay='') {
      /*var form='<form><input type="hidden" name="replay_id" value="'+replay+'" id="replay_id'+replay+'" /><input type="hidden" name="sub_replay_id" value="'+sub_replay+'" id="sub_replay_id'+sub_replay+'" /><textarea name="my_replay"></textarea><input type="button" class="btn btn-info" onclick="submit_replay('+replay+','+sub_replay+')" value="Submit" /></form>';*/
      var sub_at='';
      if(sub_replay == ''){
       sub_at=replay;
      }else if(sub_replay !=''){
        sub_at=replay+'_'+sub_replay;
      }
      var form='<form><textarea id="my_replay_'+sub_at+'"></textarea><input type="button" class="btn btn-info" onclick="submit_replay('+replay+','+sub_replay+')" value="Submit" /></form>';
      if(sub_replay == ''){
       $('#replaybox_'+replay).html(form);
      }else if(sub_replay !=''){
        $('#replaybox_'+replay+'_'+sub_replay).html(form);
      }
     }
     function submit_replay(replay,sub_replay='') {

       //$('#replaybox_')
       var replaybox='';
      /* var sub_at='';
      if(sub_replay == ''){
       sub_at=replay;
      }else if(sub_replay !=''){
        sub_at=replay+'_'+sub_replay;
      }*/
       if(sub_replay == ''){
       replaybox=$('#my_replay_'+replay).val();
      }else if(sub_replay !=''){
        replaybox=$('#my_replay_'+replay+'_'+sub_replay).val();
      }
       //var blog=$('#replaybox_'+replay).val();
       $.ajax({
            url: '<?php echo base_url();?>home/submit_replay_comments/',
            data: {replay : replay, review : replaybox, sub_replay : sub_replay},
            type: 'get',
            success: function(response)
            {
              alert(response);
              location.reload();
              /*$('#pagination_data2').html(response.pagination);
              $('#comment_list').html(response.result);*/
            }
    });
     }


 var rowno1=0;
 get_blogs(rowno1);

  $('#pagination_data1').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       get_blogs(pageno);
     });

   function get_blogs(rowno,search=''){
    //var school_id=$('#single_school_id').val();
       $.ajax({
            url: '<?php echo base_url();?>home/get_blogs/' + rowno ,
            type: 'get',
            data: {keyword : search},
         dataType: 'json',
            success: function(response)
            {
              $('#pagination_data1').html(response.pagination);
              $('#my_blogs').html(response.result);
            //createTable(response.result,response.row);
                /*jQuery('#plans_list').html(response);*/
            }
    });
     }
     function get_search_blog(search_b) {
       get_blogs(0,search_b);
     }

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}


  $('#password').keypress(function(e) {
    var key = e.which;
    if (key == 13)
    {
      return submit_login();
    }
  });
  $('#password2').keypress(function(e) {
    var key = e.which;
    if (key == 13)
    {
      return submit_registration();
    }
  });
  $('#forgot_email').keypress(function(e) {
    var key = e.which;
    if (key == 13)
    {
      return submit_forgot_pass();
    }
  });


  function get_my_locate() {
    if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                /*var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                document.getElementById("result").innerHTML = positionInfo;*/
                get_location(position.coords.latitude,position.coords.longitude);
            });
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
  }
  function get_location(lat,lng) {
    //alert(lat);alert(lng);
     $.ajax({
        'url' : '<?=base_url('common/get_location/');?>'+lat+'/'+lng,
        'type' : 'GET',
        'success' : function(data) { 
        //alert(data);             
          $('#pac-input').val(data);
            //alert('Data: '+data);
        }
      });
  }


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


      
function get_my_location() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showposition);
  } 
}

function showposition(position) {
  var latitude=position.coords.latitude;
  var longitude=position.coords.longitude;
   $.ajax({
            url: '<?=base_url('common/get_location/');?>'+latitude+'/'+longitude,
            type: 'get',
            success: function(response)
            {
              $("#lat").val(latitude);
           $("#lng").val(longitude);
            $("#address").val(response);
            $("#pac-input").val(response);
            }
    });
}

   
    function get_my_childs(listing_id,class_id) {
         $.ajax({
            url: '<?=base_url('home/get_my_childs/');?>'+listing_id+'/'+class_id,
            type: 'get',
         dataType: 'json',
            success: function(response)
            {
             $('#my_childs').html(response.childs);
             $('#admission_fee').html(response.admission_fee+'<input type="hidden" value="'+response.admission_fee+'" name="actual_price"/>');
             grand_total();
            }
    });
    }
   
    function get_coupon_dis(){
        var my_coupon=$('#my_coupon').val();
        if(my_coupon==''){
            $('#coupon_message').html('<span class="text-danger">Please Apply Any Coupon<input type="hidden" name="coupon_discount" id="coupon_discount" value="0"/></span>');
            $('#discount').html('0');
            grand_total();
        }else{
            var cart_plans = $(".cart_plans").map(function() {
            return this.value;
            }).get();
            var cartplans=cart_plans.join(",");
            if(cartplans != ''){
            $.ajax({
            type:'POST',
            url: '<?php echo base_url();?>ajax/checkCoupon/',
            data: {cartplans: cartplans, my_coupon : my_coupon},
            success: function(response)
            {
                jQuery('#coupon_message').html(response);

                var discount=$('#coupon_discount').val();
                if(discount){
                var grand=$('#grand_total').text();
                var cou_dis=(discount/100)*grand;
                $('#discount').html(cou_dis.toFixed(2));
                grand_total();
                }
            }
            });
            }else{
                $('#coupon_message').html('<span class="text-danger">Please Add Any Package<input type="hidden" name="coupon_discount" id="coupon_discount" value="0"/></span>');
                $('#discount').html('0');
                grand_total();
            }
        }
    }
     function grand_total(){
        var admission_fee=$('#admission_fee').text();
        var discount=$('#discount').text();
        var g_total=admission_fee-discount;
        var total=g_total+'<input type="hidden" value="'+g_total+'" name="total"/>';
        $('#grand_total').html(total);   
    }
    function get_coupon_dis(){
        var my_coupon=$('#my_coupon').val();
        if(my_coupon==''){
            $('#coupon_message').html('<div class="col-md-12 promo-confirmation"><div class="booking-confirmation-page"><i class="fa fa-times wrong"></i><h2 class="margin-top-0">Please Apply Any Coupon</h2></div></div><input type="hidden" name="coupon_discount" id="coupon_discount" value="0"/>');
            $('#discount').html('0');
            grand_total();
        }else{
            var my_class=$('#list_class').val();
            var my_school='<?=$school['id'];?>';
            if(my_class == ''){
 $('#coupon_message').html('<div class="col-md-12 promo-confirmation"><div class="booking-confirmation-page"><i class="fa fa-times wrong"></i><h2 class="margin-top-0">Please Select Class</h2></div></div><input type="hidden" name="coupon_discount" id="coupon_discount" value="0"/>');
              $('#discount').html('0');
             grand_total();
            }else{
             //alert(my_school+','+my_class+','+my_coupon);
             $.ajax({
            type:'get',
            url: '<?php echo base_url();?>home/checkCoupon/',
            data: {my_school : my_school, my_class : my_class, my_coupon : my_coupon},
            dataType : 'json',
            success: function(response)
            {
              //alert(response.status);
              if(response.status==1){
                 $('#coupon_message').html('<div class="col-md-12 promo-confirmation"><div class="booking-confirmation-page"><i class="fa fa-check-circle"></i><h2 class="margin-top-0">Promocode Applied!</h2></div></div><input type="hidden" name="coupon_discount" id="coupon_discount" value="'+response.discount+'"/><input type="hidden" name="discount_id" id="discount_id" value="'+response.discount_id+'"/>');
                 $('#discount').html(response.discount);
                var discount=$('#coupon_discount').val();
                if(discount){
                  $('#grand_total').html(response.total+'<input type="hidden" value="'+response.total+'" name="total"/>');
                $('#discount').html(grand.toFixed(2));
                grand_total();
                }
              }else{
                $('#coupon_message').html('<div class="col-md-12 promo-confirmation"><div class="booking-confirmation-page"><i class="fa fa-times wrong"></i><h2 class="margin-top-0">Coupon Not Available</h2></div></div><input type="hidden" name="coupon_discount" id="coupon_discount" value="0"/>');
              $('#discount').html('0');
             grand_total();
              }
            }
            });
            }
        }
    }

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