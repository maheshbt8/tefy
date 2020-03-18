<style>
    .d--inline{
        display: inline!important;
    }

</style>
<?php
//$geolocation = $latitude.','.$longitude;
$geolocation='17.5042406,78.395598';
$request = 'https://maps.googleapis.com/maps/api/geocode/json?key='.$this->db->get_where('settings', array('setting_type' => 'google_api_key'))->row()->description.'&latlng='.$geolocation.'&sensor=false';
//echo $request;die;
/*$res='{
   "plus_code" : {
      "compound_code" : "C9WJ+R8 Hyderabad, Telangana, India",
      "global_code" : "7J9WC9WJ+R8"
   },
   "results" : [
      {
         "address_components" : [
            {
               "long_name" : "59",
               "short_name" : "59",
               "types" : [ "street_number" ]
            },
            {
               "long_name" : "Street Number 3",
               "short_name" : "Street Number 3",
               "types" : [ "route" ]
            },
            {
               "long_name" : "Patrika Nagar",
               "short_name" : "Patrika Nagar",
               "types" : [ "political", "sublocality", "sublocality_level_2" ]
            },
            {
               "long_name" : "HITEC City",
               "short_name" : "HITEC City",
               "types" : [ "political", "sublocality", "sublocality_level_1" ]
            },
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            },
            {
               "long_name" : "500081",
               "short_name" : "500081",
               "types" : [ "postal_code" ]
            }
         ],
         "formatted_address" : "59, Street Number 3, Patrika Nagar, HITEC City, Hyderabad, Telangana 500081, India",
         "geometry" : {
            "location" : {
               "lat" : 17.4469167,
               "lng" : 78.38075850000001
            },
            "location_type" : "ROOFTOP",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.4482656802915,
                  "lng" : 78.38210748029152
               },
               "southwest" : {
                  "lat" : 17.4455677197085,
                  "lng" : 78.37940951970852
               }
            }
         },
         "place_id" : "ChIJxSFST96TyzsRthiyD6o_jhQ",
         "plus_code" : {
            "compound_code" : "C9WJ+Q8 Hyderabad, Telangana, India",
            "global_code" : "7J9WC9WJ+Q8"
         },
         "types" : [ "street_address" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "59",
               "short_name" : "59",
               "types" : [ "street_number" ]
            },
            {
               "long_name" : "Street Number 3",
               "short_name" : "Street Number 3",
               "types" : [ "route" ]
            },
            {
               "long_name" : "Patrika Nagar",
               "short_name" : "Patrika Nagar",
               "types" : [ "political", "sublocality", "sublocality_level_2" ]
            },
            {
               "long_name" : "HITEC City",
               "short_name" : "HITEC City",
               "types" : [ "political", "sublocality", "sublocality_level_1" ]
            },
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            },
            {
               "long_name" : "500081",
               "short_name" : "500081",
               "types" : [ "postal_code" ]
            }
         ],
         "formatted_address" : "59, Street Number 3, Patrika Nagar, HITEC City, Hyderabad, Telangana 500081, India",
         "geometry" : {
            "location" : {
               "lat" : 17.447118,
               "lng" : 78.38081579999999
            },
            "location_type" : "RANGE_INTERPOLATED",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.4484669802915,
                  "lng" : 78.3821647802915
               },
               "southwest" : {
                  "lat" : 17.4457690197085,
                  "lng" : 78.3794668197085
               }
            }
         },
         "place_id" : "ElI1OSwgU3RyZWV0IE51bWJlciAzLCBQYXRyaWthIE5hZ2FyLCBISVRFQyBDaXR5LCBIeWRlcmFiYWQsIFRlbGFuZ2FuYSA1MDAwODEsIEluZGlhIhoSGAoUChIJw50eRd6TyzsRNNhE0YYtgVAQOw",
         "types" : [ "street_address" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "59",
               "short_name" : "59",
               "types" : [ "street_number" ]
            },
            {
               "long_name" : "Street Number 3",
               "short_name" : "Street Number 3",
               "types" : [ "route" ]
            },
            {
               "long_name" : "Patrika Nagar",
               "short_name" : "Patrika Nagar",
               "types" : [ "political", "sublocality", "sublocality_level_2" ]
            },
            {
               "long_name" : "HITEC City",
               "short_name" : "HITEC City",
               "types" : [ "political", "sublocality", "sublocality_level_1" ]
            },
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            },
            {
               "long_name" : "500081",
               "short_name" : "500081",
               "types" : [ "postal_code" ]
            }
         ],
         "formatted_address" : "59, Street Number 3, Patrika Nagar, HITEC City, Hyderabad, Telangana 500081, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 17.4473266,
                  "lng" : 78.3811353
               },
               "southwest" : {
                  "lat" : 17.4470454,
                  "lng" : 78.37989829999999
               }
            },
            "location" : {
               "lat" : 17.447186,
               "lng" : 78.3805168
            },
            "location_type" : "GEOMETRIC_CENTER",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.44853498029151,
                  "lng" : 78.38186578029151
               },
               "southwest" : {
                  "lat" : 17.4458370197085,
                  "lng" : 78.3791678197085
               }
            }
         },
         "place_id" : "ChIJw50eRd6TyzsRNNhE0YYtgVA",
         "types" : [ "route" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "Patrika Nagar",
               "short_name" : "Patrika Nagar",
               "types" : [ "political", "sublocality", "sublocality_level_2" ]
            },
            {
               "long_name" : "HITEC City",
               "short_name" : "HITEC City",
               "types" : [ "political", "sublocality", "sublocality_level_1" ]
            },
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            },
            {
               "long_name" : "500081",
               "short_name" : "500081",
               "types" : [ "postal_code" ]
            }
         ],
         "formatted_address" : "Patrika Nagar, HITEC City, Hyderabad, Telangana 500081, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 17.4514871,
                  "lng" : 78.38378709999999
               },
               "southwest" : {
                  "lat" : 17.4464829,
                  "lng" : 78.37847099999999
               }
            },
            "location" : {
               "lat" : 17.4471055,
               "lng" : 78.37959769999999
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.4514871,
                  "lng" : 78.38378709999999
               },
               "southwest" : {
                  "lat" : 17.4464829,
                  "lng" : 78.37847099999999
               }
            }
         },
         "place_id" : "ChIJ8WQrAt-TyzsRLqop6p0QBDc",
         "types" : [ "political", "sublocality", "sublocality_level_2" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "HITEC City",
               "short_name" : "HITEC City",
               "types" : [ "political", "sublocality", "sublocality_level_1" ]
            },
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            },
            {
               "long_name" : "500081",
               "short_name" : "500081",
               "types" : [ "postal_code" ]
            }
         ],
         "formatted_address" : "HITEC City, Hyderabad, Telangana 500081, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 17.4575351,
                  "lng" : 78.38618699999999
               },
               "southwest" : {
                  "lat" : 17.4379716,
                  "lng" : 78.3668517
               }
            },
            "location" : {
               "lat" : 17.4434646,
               "lng" : 78.3771953
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.4575351,
                  "lng" : 78.38618699999999
               },
               "southwest" : {
                  "lat" : 17.4379716,
                  "lng" : 78.3668517
               }
            }
         },
         "place_id" : "ChIJ32ldjNyTyzsR7qB_VeuLaBk",
         "types" : [ "political", "sublocality", "sublocality_level_1" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "500081",
               "short_name" : "500081",
               "types" : [ "postal_code" ]
            },
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            }
         ],
         "formatted_address" : "Hyderabad, Telangana 500081, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 17.4669043,
                  "lng" : 78.3991011
               },
               "southwest" : {
                  "lat" : 17.4191474,
                  "lng" : 78.3626306
               }
            },
            "location" : {
               "lat" : 17.4433571,
               "lng" : 78.38221109999999
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.4669043,
                  "lng" : 78.3991011
               },
               "southwest" : {
                  "lat" : 17.4191474,
                  "lng" : 78.3626306
               }
            }
         },
         "place_id" : "ChIJs_uL8OCTyzsRGj99UiwzVCQ",
         "types" : [ "postal_code" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            }
         ],
         "formatted_address" : "Hyderabad, Telangana, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 17.6078088,
                  "lng" : 78.6561694
               },
               "southwest" : {
                  "lat" : 17.2168886,
                  "lng" : 78.1599217
               }
            },
            "location" : {
               "lat" : 17.385044,
               "lng" : 78.486671
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.6078088,
                  "lng" : 78.6561694
               },
               "southwest" : {
                  "lat" : 17.2168886,
                  "lng" : 78.1599217
               }
            }
         },
         "place_id" : "ChIJx9Lr6tqZyzsRwvu6koO3k64",
         "types" : [ "locality", "political" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            }
         ],
         "formatted_address" : "Ranga Reddy, Telangana, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 17.7082,
                  "lng" : 78.8461499
               },
               "southwest" : {
                  "lat" : 16.8456899,
                  "lng" : 77.36438989999999
               }
            },
            "location" : {
               "lat" : 17.3891379,
               "lng" : 77.8367282
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.7082,
                  "lng" : 78.8461499
               },
               "southwest" : {
                  "lat" : 16.8456899,
                  "lng" : 77.36438989999999
               }
            }
         },
         "place_id" : "ChIJx9Lr6tqZyzsRQZtu9ErRBAs",
         "types" : [ "administrative_area_level_2", "political" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            }
         ],
         "formatted_address" : "Telangana, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 19.916715,
                  "lng" : 81.31614890000002
               },
               "southwest" : {
                  "lat" : 15.8373113,
                  "lng" : 77.23791299999999
               }
            },
            "location" : {
               "lat" : 18.1124372,
               "lng" : 79.01929969999999
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 19.916715,
                  "lng" : 81.31614890000002
               },
               "southwest" : {
                  "lat" : 15.8373113,
                  "lng" : 77.23791299999999
               }
            }
         },
         "place_id" : "ChIJQ-0plNtQMzoRWUBZQad772M",
         "types" : [ "administrative_area_level_1", "political" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            }
         ],
         "formatted_address" : "India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 35.513327,
                  "lng" : 97.39535869999999
               },
               "southwest" : {
                  "lat" : 6.4626999,
                  "lng" : 68.1097
               }
            },
            "location" : {
               "lat" : 20.593684,
               "lng" : 78.96288
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 35.513327,
                  "lng" : 97.39535869999999
               },
               "southwest" : {
                  "lat" : 6.4626999,
                  "lng" : 68.1097
               }
            }
         },
         "place_id" : "ChIJkbeSa_BfYzARphNChaFPjNc",
         "types" : [ "country", "political" ]
      }
   ],
   "status" : "OK"
}';*/
/*print_r(json_decode($res)->results[1]->formatted_address);die;
echo "<pre>";
print_r($res);die; */
/*$request='{
   "plus_code" : {
      "compound_code" : "G93X+G4 Hyderabad, Telangana, India",
      "global_code" : "7J9WG93X+G4"
   },
   "results" : [
      {
         "address_components" : [
            {
               "long_name" : "561",
               "short_name" : "561",
               "types" : [ "premise" ]
            },
            {
               "long_name" : "HMT Hills",
               "short_name" : "HMT Hills",
               "types" : [ "political", "sublocality", "sublocality_level_2" ]
            },
            {
               "long_name" : "Kukatpally",
               "short_name" : "Kukatpally",
               "types" : [ "political", "sublocality", "sublocality_level_1" ]
            },
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            },
            {
               "long_name" : "500085",
               "short_name" : "500085",
               "types" : [ "postal_code" ]
            }
         ],
         "formatted_address" : "561, HMT Hills, Kukatpally, Hyderabad, Telangana 500085, India",
         "geometry" : {
            "location" : {
               "lat" : 17.503799,
               "lng" : 78.397746
            },
            "location_type" : "ROOFTOP",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.5051479802915,
                  "lng" : 78.39909498029151
               },
               "southwest" : {
                  "lat" : 17.5024500197085,
                  "lng" : 78.3963970197085
               }
            }
         },
         "place_id" : "ChIJX5x-he-RyzsRUfnsQ_AzPus",
         "plus_code" : {
            "compound_code" : "G93X+G3 Hyderabad, Telangana, India",
            "global_code" : "7J9WG93X+G3"
         },
         "types" : [ "street_address" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "Unnamed Road",
               "short_name" : "Unnamed Road",
               "types" : [ "route" ]
            },
            {
               "long_name" : "HMT Hills",
               "short_name" : "HMT Hills",
               "types" : [ "political", "sublocality", "sublocality_level_2" ]
            },
            {
               "long_name" : "Kukatpally",
               "short_name" : "Kukatpally",
               "types" : [ "political", "sublocality", "sublocality_level_1" ]
            },
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            },
            {
               "long_name" : "500090",
               "short_name" : "500090",
               "types" : [ "postal_code" ]
            }
         ],
         "formatted_address" : "Unnamed Road, HMT Hills, Kukatpally, Hyderabad, Telangana 500090, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 17.5040221,
                  "lng" : 78.3979305
               },
               "southwest" : {
                  "lat" : 17.5036233,
                  "lng" : 78.39782509999999
               }
            },
            "location" : {
               "lat" : 17.5038227,
               "lng" : 78.3978778
            },
            "location_type" : "GEOMETRIC_CENTER",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.5051716802915,
                  "lng" : 78.3992267802915
               },
               "southwest" : {
                  "lat" : 17.5024737197085,
                  "lng" : 78.39652881970849
               }
            }
         },
         "place_id" : "ChIJa1Gphe-RyzsRxmtKnDtnv5M",
         "types" : [ "route" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "HMT Hills",
               "short_name" : "HMT Hills",
               "types" : [ "political", "sublocality", "sublocality_level_2" ]
            },
            {
               "long_name" : "Kukatpally",
               "short_name" : "Kukatpally",
               "types" : [ "political", "sublocality", "sublocality_level_1" ]
            },
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            }
         ],
         "formatted_address" : "HMT Hills, Kukatpally, Hyderabad, Telangana, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 17.5054221,
                  "lng" : 78.39976999999999
               },
               "southwest" : {
                  "lat" : 17.5011401,
                  "lng" : 78.39456799999999
               }
            },
            "location" : {
               "lat" : 17.5035541,
               "lng" : 78.3963095
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.5054221,
                  "lng" : 78.39976999999999
               },
               "southwest" : {
                  "lat" : 17.5011401,
                  "lng" : 78.39456799999999
               }
            }
         },
         "place_id" : "ChIJqaZ4ne-RyzsRVEHTPAki7WM",
         "types" : [ "political", "sublocality", "sublocality_level_2" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "500085",
               "short_name" : "500085",
               "types" : [ "postal_code" ]
            },
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            }
         ],
         "formatted_address" : "Hyderabad, Telangana 500085, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 17.5058636,
                  "lng" : 78.40244799999999
               },
               "southwest" : {
                  "lat" : 17.4710565,
                  "lng" : 78.3657949
               }
            },
            "location" : {
               "lat" : 17.4879651,
               "lng" : 78.3822011
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.5058636,
                  "lng" : 78.40244799999999
               },
               "southwest" : {
                  "lat" : 17.4710565,
                  "lng" : 78.3657949
               }
            }
         },
         "place_id" : "ChIJ628nxiaSyzsRonDP2NGHyE0",
         "types" : [ "postal_code" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "Kukatpally",
               "short_name" : "Kukatpally",
               "types" : [ "political", "sublocality", "sublocality_level_1" ]
            },
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            }
         ],
         "formatted_address" : "Kukatpally, Hyderabad, Telangana, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 17.5151729,
                  "lng" : 78.4342887
               },
               "southwest" : {
                  "lat" : 17.46322,
                  "lng" : 78.37520309999999
               }
            },
            "location" : {
               "lat" : 17.4947934,
               "lng" : 78.3996441
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.5151729,
                  "lng" : 78.4342887
               },
               "southwest" : {
                  "lat" : 17.46322,
                  "lng" : 78.37520309999999
               }
            }
         },
         "place_id" : "ChIJPfRiAeyRyzsRSM9YQ_7GiDI",
         "types" : [ "political", "sublocality", "sublocality_level_1" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "Hyderabad",
               "short_name" : "Hyderabad",
               "types" : [ "locality", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            }
         ],
         "formatted_address" : "Hyderabad, Telangana, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 17.6078088,
                  "lng" : 78.6561694
               },
               "southwest" : {
                  "lat" : 17.2168886,
                  "lng" : 78.1599217
               }
            },
            "location" : {
               "lat" : 17.385044,
               "lng" : 78.486671
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.6078088,
                  "lng" : 78.6561694
               },
               "southwest" : {
                  "lat" : 17.2168886,
                  "lng" : 78.1599217
               }
            }
         },
         "place_id" : "ChIJx9Lr6tqZyzsRwvu6koO3k64",
         "types" : [ "locality", "political" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "Ranga Reddy",
               "short_name" : "R.R. District",
               "types" : [ "administrative_area_level_2", "political" ]
            },
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            }
         ],
         "formatted_address" : "Ranga Reddy, Telangana, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 17.7082,
                  "lng" : 78.8461499
               },
               "southwest" : {
                  "lat" : 16.8456899,
                  "lng" : 77.36438989999999
               }
            },
            "location" : {
               "lat" : 17.3891379,
               "lng" : 77.8367282
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 17.7082,
                  "lng" : 78.8461499
               },
               "southwest" : {
                  "lat" : 16.8456899,
                  "lng" : 77.36438989999999
               }
            }
         },
         "place_id" : "ChIJx9Lr6tqZyzsRQZtu9ErRBAs",
         "types" : [ "administrative_area_level_2", "political" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "Telangana",
               "short_name" : "Telangana",
               "types" : [ "administrative_area_level_1", "political" ]
            },
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            }
         ],
         "formatted_address" : "Telangana, India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 19.916715,
                  "lng" : 81.31614890000002
               },
               "southwest" : {
                  "lat" : 15.8373113,
                  "lng" : 77.23791299999999
               }
            },
            "location" : {
               "lat" : 18.1124372,
               "lng" : 79.01929969999999
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 19.916715,
                  "lng" : 81.31614890000002
               },
               "southwest" : {
                  "lat" : 15.8373113,
                  "lng" : 77.23791299999999
               }
            }
         },
         "place_id" : "ChIJQ-0plNtQMzoRWUBZQad772M",
         "types" : [ "administrative_area_level_1", "political" ]
      },
      {
         "address_components" : [
            {
               "long_name" : "India",
               "short_name" : "IN",
               "types" : [ "country", "political" ]
            }
         ],
         "formatted_address" : "India",
         "geometry" : {
            "bounds" : {
               "northeast" : {
                  "lat" : 35.513327,
                  "lng" : 97.39535869999999
               },
               "southwest" : {
                  "lat" : 6.4626999,
                  "lng" : 68.1097
               }
            },
            "location" : {
               "lat" : 20.593684,
               "lng" : 78.96288
            },
            "location_type" : "APPROXIMATE",
            "viewport" : {
               "northeast" : {
                  "lat" : 35.513327,
                  "lng" : 97.39535869999999
               },
               "southwest" : {
                  "lat" : 6.4626999,
                  "lng" : 68.1097
               }
            }
         },
         "place_id" : "ChIJkbeSa_BfYzARphNChaFPjNc",
         "types" : [ "country", "political" ]
      }
   ],
   "status" : "OK"
}';*/
//$file_contents = file_get_contents($request);
$json_decode = json_decode($request);
if(isset($json_decode->results[0])) {
    echo $json_decode->results[0]->formatted_address;
}
/*echo "<pre>";
print_r($request);*/
?>

<form method="post" action="<?=base_url('admin/add_listing');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!--Basic Info Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>School Name <i class="tip" data-tip-content="Name of your School"></i></h5>
								<input class="search-field" type="text" value="<?=set_value('school_name');?>" name="school_name" required="" autocomplete="off" />
								<?php echo form_error('school_name', '<div class="error">', '</div>'); ?>
							</div>
						</div>
<!-- School Code -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>School Registration Code <i class="tip" data-tip-content="Name of your School"></i></h5>
								<input class="search-field" type="text" value="<?=set_value('school_code');?>" name="school_code" required="" autocomplete="off" />
								<?php echo form_error('school_code', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<!-- Row -->
						<div class="row with-forms">

							<!-- Status -->
							<div class="col-md-6">
								<h5>Category</h5>
								<select class="form-control chosen-select-no-single" id="category"  name="category[]" required=""  multiple="">
									<option value="" disabled="">Select Category</option>	
                                  <?php $res=$this->common_model->select_results_info('category',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
								<?php }?>
								</select>
								<?php echo form_error('category[]', '<div class="error">', '</div>'); ?>
								<label class="error" for="category[]"></label>
							</div>


							<!-- Type -->
							<div class="col-md-6">
								<h5>Keywords <i class="tip" data-tip-content="Maximum of 15 keywords related with your business"></i></h5>
								<input type="text" placeholder="Keywords should be separated by commas"  name="keywords" required="" value="<?=set_value('keywords');?>">
								<?php echo form_error('keywords', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<!-- Row / End -->
                        
                        
						<div class="row with-forms">

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Curriculum</h5>
                            <?php $res=$this->common_model->select_results_info('curriculum',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
                            <div class="col-md-2">
								<label><input class="d--inline" type="radio" placeholder="SSC"  name="curriculum" value="<?=$row['id'];?>" required="" <?=(set_value('curriculum') == $row['id'])? 'checked' : '' ?>><?=$row['name'];?></label>
                            </div>
                        <?php }?>

                                               
							</div>
							<?php echo form_error('curriculum', '<div class="error">', '</div>'); ?> 
							<label class="error" for="curriculum"></label>  
						</div>
						<!-- Row / End -->
                        
                        <!-- Row -->
                        <div class="row with-forms">

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Co-Education Status</h5>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder="SSC"  name="school_type" value="Boys" required=""  <?=(set_value('school_type') == 'Boys')? 'checked' : '' ?>>Boys</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder="SSC"  name="school_type" value="Girls" required=""  <?=(set_value('school_type') == 'Girls')? 'checked' : '' ?>>Girls</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder="SSC"  name="school_type" value="Co-Education" required=""  <?=(set_value('school_type') == 'Co-Education')? 'checked' : '' ?>>Co-Education</label>
                                </div>

							</div>
							<?php echo form_error('school_type', '<div class="error">', '</div>'); ?>
                                <label class="error" for="school_type"></label>
						</div>
                        
                        <!-- Row -->
                            <div class="row with-forms">

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Format Status</h5>
                                <div class="col-md-3">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="school_format" value="Only Day Scholars" required="" <?=(set_value('school_format') == 'Only Day Scholars')? 'checked' : '' ?>>Only Day Scholars</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="school_format" value="Only Hostel" required="" <?=(set_value('school_format') == 'Only Hostel')? 'checked' : '' ?>>Only Hostel</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="school_format" value="Both" required="" <?=(set_value('school_format') == 'Both')? 'checked' : '' ?>>Both</label>
                                </div>
							</div>
							<?php echo form_error('school_format', '<div class="error">', '</div>'); ?>
                                <label class="error" for="school_format"></label>
						</div>
                        
                        <!-- Row -->
                        <div class="row with-forms">

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Hostel facility</h5>
                                <div class="col-md-3">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="hostels" value="No" required="" checked="" <?=(set_value('hostels') == 'No')? 'checked' : '' ?>>No</label>
                                </div>
                                <div class="col-md-3">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="hostels" value="Only for Boys" required="" <?=(set_value('hostels') == 'Only for Boys')? 'checked' : '' ?>>Only for Boys</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="hostels" value="Only for Girls" required="" <?=(set_value('hostels') == 'Only for Girls')? 'checked' : '' ?>>Only for Girls</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="hostels" value="For Boys & Girls" required="" <?=(set_value('hostels') == 'For Boys & Girls')? 'checked' : '' ?>>For Boys & Girls</label>
                                </div>
							</div>
							<?php echo form_error('hostels', '<div class="error">', '</div>'); ?>
                                <label class="error" for="hostels"></label>
						</div>
                        
                        <!-- Row -->
						<div class="row with-forms ">

							<!--  -->
							<div class="col-md-3">
                                <h5>Classes</h5>
                                <!-- <select class="chosen-select-no-single form-control  "  name="class[]" required="">
									<option label="blank" disabled="">Select Class</option>	
									 <?php $res=$this->common_model->select_results_info('classes',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
								<?php }?>
									
								</select> -->
								<input type="text" placeholder="Enter Classes to show"  name="class" required="" value="<?=set_value('class');?>">
                             	<?php echo form_error('class', '<div class="error">', '</div>'); ?>
                          	
							</div>
                            <div class="col-md-3">
                                <h5>Price From</h5>
								<input type="text" placeholder="Enter Price From"  name="price_from" required="" value="<?=set_value('price_from');?>">
                             	<?php echo form_error('price_from', '<div class="error">', '</div>'); ?>
                          	
							</div>
							<div class="col-md-3">
                                <h5>Transport Fee</h5>
								<input type="number" placeholder="Enter Transport Fee"  name="transport_fee" required="" value="<?=set_value('transport_fee');?>">
                             	<?php echo form_error('transport_fee', '<div class="error">', '</div>'); ?>
                          	
							</div>
							<!--  -->
							<div class="col-md-3">
                                <h5>Medium</h5>
                                <select class="chosen-select-no-single form-control  "  name="medium[]" required="" multiple="">
                                	<option label="blank" disabled="">Select Medium</option>
									<?php $res=$this->common_model->select_results_info('medium',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
								<?php }?>									
								</select>
                             	<?php echo form_error('medium[]', '<div class="error">', '</div>'); ?>
                          
							</div>
						</div>
						<!-- Row / End -->
                        
                        

					</div>
					<!-- Basic Info Section / End -->

                    <!-- Addtional Information Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Additional Informations</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-6">
								<h5>Founders Name </h5>
								<input class="search-field" type="text" value="<?=set_value('founders_name');?>" name="founders_name" placeholder="Founders Name(If any)" autocomplete="off" />
								<?php echo form_error('founders_name', '<div class="error">', '</div>'); ?>
							</div>
						
							<div class="col-md-6">
								<h5>Brand Name </h5>
								<input class="search-field" type="text" value="<?=set_value('brand_name');?>" name="brand_name" placeholder="Brand name" autocomplete="off" />
								<?php echo form_error('brand_name', '<div class="error">', '</div>'); ?>
							</div>
					
							<div class="col-md-6">
								<h5>Number of Branches </h5>
								<input class="search-field" type="text" value="<?=set_value('no_of_branches');?>" name="no_of_branches" placeholder="Brand name" autocomplete="off" />
								<?php echo form_error('no_of_branches', '<div class="error">', '</div>'); ?>
							</div>
						
							<div class="col-md-6">
								<h5>Year of Establishment of brand</h5>
								<input class="search-field" type="text" value="<?=set_value('est_year');?>" name="est_year" placeholder="" autocomplete="off" />
								<?php echo form_error('est_year', '<div class="error">', '</div>'); ?>
							</div>
						
							<div class="col-md-6">
								<h5>Year of Establishment of the specific branch</h5>
								<input class="search-field" type="text" value="<?=set_value('est_branch_year');?>" name="est_branch_year" placeholder="" autocomplete="off" />
								<?php echo form_error('est_branch_year', '<div class="error">', '</div>'); ?>
							</div>
						
                   
							<div class="col-md-6">
								<h5>Average Expirience of Faculty</h5>
								<input class="search-field" type="text" value="<?=set_value('faculty_exp');?>" name="faculty_exp" placeholder="" autocomplete="off" />
								<?php echo form_error('faculty_exp', '<div class="error">', '</div>'); ?>
							</div>
						
                        
							<div class="col-md-6">
								<h5>Any Notable Alumni</h5>
								<input class="search-field" type="text" value="<?=set_value('alumni');?>" name="alumni" placeholder="" autocomplete="off" />
								<?php echo form_error('alumni', '<div class="error">', '</div>'); ?>
							</div>
						</div>
                        

                        

					</div>
					<!--Addtional Information Section / End -->
                    
                       <!-- Addtional Information Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Contact Details of School(for our use)</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-4">
								<h5>Councellor/Principal number </h5>
								<input class="search-field" type="text" value="<?=set_value('principal_number');?>" name="principal_number" placeholder="" required="" autocomplete="off" />
								<?php echo form_error('principal_number', '<div class="error">', '</div>'); ?>
							</div>
                            <div class="col-md-4">
                                    <h5>Telephone Number </h5>
                                    <input class="search-field" type="text" value="<?=set_value('telephone_number');?>" name="telephone_number" placeholder="" required="" autocomplete="off" />
                                    <?php echo form_error('telephone_number', '<div class="error">', '</div>'); ?>
                                </div>

							<div class="col-md-4">
                                    <h5>Email </h5>
                                    <input class="search-field" type="text" value="<?=set_value('school_email');?>" name="school_email" placeholder="" required="" autocomplete="off" />
                                    <?php echo form_error('school_email', '<div class="error">', '</div>'); ?>
                                </div>

							
						</div>
                        

                        

					</div>
					<!--Addtional Information Section / End -->
                    
                    
                     <!-- Admission Procedure Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i>  Admission Procedure</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
							<textarea type="text" class="form-control" name="admission_procedure" value="<?=set_value('admission_procedure');?>" required=""></textarea>
							<?php echo form_error('admission_procedure', '<div class="error">', '</div>'); ?>
							</div>
						</div>
                        

                        

					</div>
					<!-- Admission Procedure Section / End -->
                    
                    
					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-location"></i> Location</h3>
						</div>

						<div class="submit-section">

							<!-- Row -->
							<div class="row with-forms">.
                                <div class="col-md-12">
									<h5>Area Landmark</h5>
									<input type="text"  id="pac-input" placeholder="e.g. My School Street" name="landmark" required="" autocomplete="off" value="<?=set_value('landmark');?>">
									<input type="hidden" id="lat" name="latitude" value="<?=set_value('lat');?>">
                                         <input type="hidden" id="lng" value="<?=set_value('lng');?>" name="longitude">
                                         <!-- <input type="hidden" id="address" value="<?=set_value('address');?>" name="address"> -->
                                         <?php echo form_error('landmark', '<div class="error">', '</div>'); ?>
								</div>
                                <!-- Address -->
								<div class="col-md-12">
									<h5>Address</h5>
									<textarea type="text" placeholder="e.g. 964 School Street" name="address" required="" id="address" ><?=set_value('address');?></textarea>
									<?php echo form_error('address', '<div class="error">', '</div>'); ?>
								</div>

								<div class="col-md-12">
                                <h5>Address URL</h5>
                                <input type="url" class="form-control-file" placeholder="Eg:https://www.google.com/maps/embed?" name="address_url" required="" value="<?=set_value('address_url');?>">
                                <?php echo form_error('address_url', '<div class="error">', '</div>'); ?>
                            	</div>
							</div>
							<!-- Row / End -->

						</div>
					</div>
					<!-- Section / End -->


					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-picture"></i> Gallery</h3>
						</div>
                        <div class="row with-forms">

							<div class="col-md-4 ">
                                <h5>Thumb Image </h5><p>(select image for list view)</p>
                                <input type="file" class="form-control-file" name="thumb" required="" >
                                
                            </div>
                            <div class="col-md-4">
                                <h5>Banner Image </h5><p>(select banner image for school page)</p>
                                <input type="file" class="form-control-file" name="banner[]" required="" multiple>
                            </div>
                            <div class="col-md-4">
                                <h5>Gallery Images </h5><p>(select multiple Images)</p>
                                <input type="file" class="form-control-file"  name="gallery[]" required="" multiple>
                            </div>    
                        </div>
                        
                        <div class="row with-forms">

							<div class="col-md-12">
                                <h5>Embed video Link(optional)</h5>
                                <input type="url" class="form-control-file" placeholder="Eg:https://www.tefy.com/embed/yfettefy" name="video" value="<?=set_value('video');?>">
                            </div>
                            
                        </div>
                            
						<!-- Dropzone -->
						<!--<div class="submit-section">
							<form action="" class="dropzone" enctype="multipart/form-data"></form>
							<form action="http://www.vasterad.com/file-upload" enctype="multipart/form-data" class="dropzone" >
								
							</form>
						</div> -->

					</div>
					<!-- Section / End -->


					<!-- Section -->
					<div class="add-listing-section margin-top-45">
                        
                        

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-docs"></i> Details</h3>
						</div>
                        
                        <!-- Row -->
						<div class="row with-forms">

							

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Vision</h5>
								<textarea class="WYSIWYG" name="vision" cols="20" rows="2"  spellcheck="true" required="" placeholder="Enter the school vision in short note in 100 words"><?=set_value('vision');?></textarea>
								<?php echo form_error('vision', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<!-- Row / End -->
                        

						<!-- Description -->
						<div class="form">
							<h5>Description</h5>
							<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true" required=""><?=set_value('description');?></textarea>
							<?php echo form_error('description', '<div class="error">', '</div>'); ?>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5>Phone <span>(optional)</span></h5>
								<input type="text" name="phone" value="<?=set_value('phone');?>">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5>Website <span>(optional)</span></h5>
								<input type="text" name="website"value="<?=set_value('website');?>">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5>E-mail <span>(optional)</span></h5>
								<input type="text" name="email" value="<?=set_value('email');?>">
							</div>

						</div>
						<!-- Row / End -->


						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
								<input type="text" placeholder="https://www.facebook.com/" name="facebook" value="<?=set_value('facebook');?>">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5 class="twitter-input"><i class="fa fa-twitter"></i> Twitter <span>(optional)</span></h5>
								<input type="text" placeholder="https://www.twitter.com/" name="twiter" value="<?=set_value('twiter');?>">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5 class="gplus-input"><i class="fa fa-youtube"></i> Youtube <span>(optional)</span></h5>
								<input type="text" placeholder="https://youtube.com/" name="youtube" value="<?=set_value('youtube');?>">
							</div>

						</div>
						<!-- Row / End -->


						<!-- Checkboxes -->
						<h5 class="margin-top-30 margin-bottom-10">Amenities <span>(optional)</span></h5>
						<div class="checkboxes in-row margin-bottom-20">
					<?php $res=$this->common_model->select_results_info('facilities',array('row_status'=>1),"'name','ASC'")->result_array();
                                  $a=0;foreach ($res as $row) {
                                  ?>
							<input id="check<?=$a;?>" type="checkbox" name="amenities[]" value="<?=$row['id'];?>">
							<label for="check<?=$a;?>"><?=$row['name'];?></label>
<?php $a++;}?>
							
					<?php echo form_error('amenities[]', '<div class="error">', '</div>'); ?>
						</div>
						<!-- Checkboxes / End -->
<div class="row with-forms">

							<div class="col-md-12">
                                <h5>Bus Routes(optional)</h5>
                                <input type="text" class="form-control-file" placeholder="Route1, Route2, Route3...." name="bus_routes" value="<?=set_value('bus_routes');?>">
                            </div>
                            <div class="col-md-12">
                                <h5>Sports & Extra-Curricuar Activities(optional)</h5>
                                <input type="text" class="form-control-file" placeholder="Cricket, Jam Section...." name="sports" value="<?=set_value('sports');?>">
                            </div>
                        </div>
					</div>
					<!-- Section / End -->


					<!-- Section -->
					
					<!-- Section / End -->


					<!-- Section -->
					<div class="add-listing-section margin-top-45 ">
						
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" name="openings" name="opening_hours" checked ><span class="slider round"></span></label>
						</div>
						
						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">
                    <!--  <div class="row opening-day">
                     <?php
$reslut=$this->common_model->get_days();

  $days=$reslut['days'];
  $loop=$reslut['timings'];
for ($i=0; $i < count($days); $i++) {
?>
   <div class="col-md-1"><h5><input type="checkbox" name="" value="<?=$days['']?>"><?=$days[$i];?></h5></div>
<?php }?>

<div class="col-md-6">
                           <select class="chosen-select" name="opening_time[]" data-placeholder="Opening Time" required="">
                              <option label="Opening Time"></option>
                              <option value="Closed">Closed</option>
                           <?php 
                           for ($j=0;$j<count($loop);$j++) {?>
                              <option><?=$loop[$j];?></option>
                           <?php }
                           ?>
                           </select>
                        </div>
                        <div class="col-md-6">
                           <select class="chosen-select" name="closing_time[]" data-placeholder="Closing Time" required="">
                              <option label="Closing Time"></option>
                              <option value="Closed">Closed</option>
      <?php 
                           for ($j=0;$j<count($loop);$j++) {?>
                              <option><?=$loop[$j];?></option>
                           <?php }
                           ?>
                           </select>
                        </div>
</div> -->

<?php
$reslut=$this->common_model->get_days();

  $days=$reslut['days'];
  $loop=$reslut['timings'];
for ($i=0; $i < count($days); $i++) {
?>
<div class="row opening-day">
								<div class="col-md-2"><h5><?=$days[$i];?></h5></div>
								<div class="col-md-5 ">
									<select class="chosen-select" name="opening_time[]" data-placeholder="Opening Time" required="">
										<option label="Opening Time"></option>
										<option value="Closed">Closed</option>
									<?php 
									for ($j=0;$j<count($loop);$j++) {?>
										<option><?=$loop[$j];?></option>
									<?php }
									?>
									</select>
								</div>
								<div class="col-md-5">
									<select class="chosen-select" name="closing_time[]" data-placeholder="Closing Time" required="">
										<option label="Closing Time"></option>
										<option value="Closed">Closed</option>
		<?php 
									for ($j=0;$j<count($loop);$j++) {?>
										<option><?=$loop[$j];?></option>
									<?php }
									?>
									</select>
								</div>
							</div>
<?php }?>

						</div>
						<!-- Switcher ON-OFF Content / End -->

					</div>
					<!-- Section / End -->
                    
                    
                    <!-- Section -->
					<div class="add-listing-section margin-top-45">
						
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-book-open"></i>School Achievements</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
						</div>

						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container">
										<tr class="pricing-list-item pattern">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
												<div class="fm-input ">
                                                    <input type="text" placeholder="Achievement Title" name="achievements[]" />
                                                </div>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
									</table>
									<a href="#" class="button add-pricing-list-item">Add Item</a>
									
								</div>
							</div>

						</div>
						<!-- Switcher ON-OFF Content / End -->

					</div>
					<!-- Section / End -->
<!-- Section -->
					<div class="add-listing-section margin-top-45">
						
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-book-open"></i> Pricing</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
						</div>

						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container1">
										<tr class="pricing-list-item pattern school_pr">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
												<div class="fm-input pricing-name"><!-- <input type="text" placeholder="Class Name" name="class_name[]" /> -->
													<select class="form-control"  name="class_name[]" required="">
									<option value="">Select Class</option>	
									 <?php $res=$this->common_model->select_results_info('classes',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
								<?php }?>
									
								</select>
                             	<?php echo form_error('class_name[]', '<div class="error">', '</div>'); ?>
												</div>
												<div class="fm-input pricing-ingredients"><input type="text" placeholder="Admission Fee" data-unit="INR" name="admission_fee[]" /></div>
												<div class="fm-input pricing-price"><input type="text" placeholder="Tution Fee" data-unit="INR" name="tution_fee[]" /></div>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
									</table>
									<a href="#" class="button add-pricing-list-item1">Add Item</a>
									
								</div>
                        <div class="col-md-12">
                                <h5>Admission Status</h5>
                            <div class="col-md-2">
                        <label><input class="d--inline" type="radio" name="admission_status" value="1" required="" <?=(set_value('admission_status') == 1)? 'checked' : '' ?>>Opened</label>
                            </div>
                            <div class="col-md-2">
                        <label><input class="d--inline" type="radio" name="admission_status" value="0" required="" <?=(set_value('admission_status') == 0)? 'checked' : '' ?>>Closed</label>
                            </div>             
                     </div>
                     <?php echo form_error('admission_status', '<div class="error">', '</div>'); ?> 
                     <label class="error" for="admission_status"></label> 
							</div>

						</div>
						<!-- Switcher ON-OFF Content / End -->

					</div>
					<!-- Section / End -->
                    
                    
					<!-- <a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a> -->
					<button type="submit" class="button preview">Submit</button>

				</div>
			</div>

		</div>

</form>




<!-- Scripts
================================================== -->

<!-- Opening hours added via JS (this is only for demo purpose) -->


<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/dropzone.js"></script>










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
          var lat_v=place.geometry.location.lat();
          var lng_v=place.geometry.location.lng();
          $("#lat").val(lat_v);
           $("#lng").val(lng_v);
            //$("#address").val(place.name);

            get_location(lat_v,lng_v);

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
    <script src="https://maps.googleapis.com/maps/api/js?key=<?=$this->db->get_where('settings', array('setting_type' => 'google_api_key'))->row()->description; ?>&libraries=places&callback=initMap"
        async defer></script>


<script type="text/javascript">
	function get_location(lat,lng) {
		//alert(lat);alert(lng);
		 $.ajax({
        'url' : '<?=base_url('common/get_location/');?>'+lat+'/'+lng,
        'type' : 'GET',
        'success' : function(data) { 
       // alert(data);             
        	$('#address').html(data);
            //alert('Data: '+data);
        }
    	});
	}
</script>








<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/ckeditor/ckeditor.js"></script> 


<script>
    CKEDITOR.replace( 'admission_procedure' );
</script>


<script>
    CKEDITOR.replace( 'description' );
</script>
