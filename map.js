var map;
var geocoder;
var coordinates = [];

var theDivLat;
var contentLat;

      function initMap() {
        var poland = {lat: 52.0061733, lng: 20.8865846}
        map = new google.maps.Map(document.getElementById('map'), {
          center: poland,
          zoom: 7
        });

        var marker = new google.maps.Marker({
            position: poland,
            map: map
        });

        var cdata = JSON.parse(document.getElementById("data").innerHTML);

        console.log(cdata);

        geocoder = new google.maps.Geocoder();
        // codeAddress(cdata);
        geocode(cdata);
      }

      function geocode(cdata){

        cdata.forEach(function(data){
          
          axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
              params: {
                  address: data.street + ' ' + data.city,
                  key: 'AIzaSyDqTLYY1qqgMwxhKmwXmavj6aHNtgJBW-I'
              }
          })
          .then(function(response){
      
              //Log full response
              // console.log(response);

              points = {};
              
              points.name = data.name;
              points.address = data.street + ' ' + data.city;
              //Formatted address
              points.lat = response.data.results[0].geometry.location.lat;
              points.lng = response.data.results[0].geometry.location.lng;

              // console.log(points);

              var marker = new google.maps.Marker({
                position: {lat: points.lat, lng: points.lng},
                map: map,
                title: data.name + ' | ' + data.street + ' ' + data.city
              })

            

              
              
          })
          .catch(function(error){
              console.log(error);
          })
        })
      }


      // function codeAddress(cdata) {

      //   cdata.forEach(function(data){
      //       var address = data.street + ' ' + data.city;
      
      //       geocoder.geocode( { 'address': address}, function(results, status) {
      //         if (status == 'OK') {
      //           map.setCenter(results[0].geometry.location);

      //           points = [];
      //           points.id = data.id;
      //           points.lat = map.getCenter().lat();
      //           points.lng = map.getCenter().lng();


      //           coordinates.push(points);


      //           var theDiv = document.getElementById("coordinates-id");
      //           var content = document.createTextNode(points.id + " ");
      //           theDiv.appendChild(content);

      //           var theDivLat = document.getElementById("coordinates-lat");
      //           var contentLat = document.createTextNode(points.lat + " ");
      //           theDivLat.appendChild(contentLat);

      //           var theDivLng = document.getElementById("coordinates-lng");
      //           var contentLng = document.createTextNode(points.lng + " ");
      //           theDivLng.appendChild(contentLng);
      //         } else {
      //           alert('Geocode was not successful for the following reason: ' + status);
      //         }
      //       });
      //   })

      // }

      // function updateLatLng(coordinates){

      //   // var test = "test";

      //   var jsonString = JSON.stringify(coordinates);
      //   $.ajax ({
      //     url: "action.php",
      //     method: "POST",
      //     data: {data : jsonString}, 
      //     success: function(result){
      //       console.log(result);
      //     }
      //   })
      // }

