$(document).ready(function(){



// user
$.ajax({
    type:"get",
    url:"../api/general/user?token=1234567",
    success: function(response){
        $("#juser").html(response.data.length);
    }
});

// unapprove
$.ajax({
    type:"get",
    url:"../api/admin/viewbengkel?token="+Cookies.get("token"),
    success: function(response){
        $(".junapprove").html(response.data.length);
    }
});
initMap();
function initMap() {
    var myLatLng= {lat: 5.174506, lng: 97.12814};
    var map = new google.maps.Map(
        document.getElementById('map'), {
        center: {lat: 5.174506, lng: 97.12814},
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true,
          styles: [
            {
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#f5f5f5"
                }
              ]
            },
            {
              "elementType": "labels.icon",
              "stylers": [
                {
                  "visibility": "off"
                }
              ]
            },
            {
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#616161"
                }
              ]
            },
            {
              "elementType": "labels.text.stroke",
              "stylers": [
                {
                  "color": "#f5f5f5"
                }
              ]
            },
            {
              "featureType": "administrative.land_parcel",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#bdbdbd"
                }
              ]
            },
            {
              "featureType": "poi",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#eeeeee"
                }
              ]
            },
            {
              "featureType": "poi",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#757575"
                }
              ]
            },
            {
              "featureType": "poi.park",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#e5e5e5"
                }
              ]
            },
            {
              "featureType": "poi.park",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#9e9e9e"
                }
              ]
            },
            {
              "featureType": "road",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#ffffff"
                }
              ]
            },
            {
              "featureType": "road.arterial",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#757575"
                }
              ]
            },
            {
              "featureType": "road.highway",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#dadada"
                }
              ]
            },
            {
              "featureType": "road.highway",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#616161"
                }
              ]
            },
            {
              "featureType": "road.local",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#9e9e9e"
                }
              ]
            },
            {
              "featureType": "transit.line",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#e5e5e5"
                }
              ]
            },
            {
              "featureType": "transit.station",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#eeeeee"
                }
              ]
            },
            {
              "featureType": "water",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#c9c9c9"
                }
              ]
            },
            {
              "featureType": "water",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#9e9e9e"
                }
              ]
            }
          ]
        });


        $.ajax({
            type:"get",
            url:"../api/general/bengkel?token=1234567&kategori=2",
            success: function(response){
                $("#jmobil").html(response.data.length);
                for(i=0;i<response.data.length;i++){
                    var marker = new google.maps.Marker({
                        position:new google.maps.LatLng(response.data[i].bk_lat,response.data[i].bk_long),
                        map: map,
                        title:'gs',
                        icon:'../asset/images/markermobil.png'
                    });
                }
            }
        });

        $.ajax({
            type:"get",
            url:"../api/general/bengkel?token=1234567&kategori=1",
            success: function(response){
                $("#jmotor").html(response.data.length);
                for(i=0;i<response.data.length;i++){
                    var marker = new google.maps.Marker({
                        position:new google.maps.LatLng(response.data[i].bk_lat,response.data[i].bk_long),
                        map: map,
                        title:'gs',
                        icon:'../asset/images/markermotor.png'
                    });
                }
            }
        });
  }


// showing the popular post
$.ajax({
  type:"get",
  url:"../api/general/bengkel?token=1234567",
  success:function(response){
    // console.log(response.data)
    popular=response.data.sort(function(a,b){
        return   (b.total_rating/b.j_ulasan) - (a.total_rating/b.j_ulasan);
    });
    // console.log(popular)
    for(i=0;i<4;i++){
      // count rating
      rating=popular[i].total_rating/popular[i].j_ulasan
      $("#popular").append(`
        <div class="row popularpost">
          <div class="col-sm-6 nbengkel">
            <strong>`+popular[i].bk_namabengkel+`</strong>
          </div>
          <div class="col-sm-6 text-center">
            <div class="rating`+i+`"></div>
            <small class="text-muted">`+rating+` / `+popular[i].j_ulasan+` ulasan</small>
          </div>
        </div> 
      `);
      // show rating
      for(j=0;j<rating.toFixed(0);j++){
        
        $(".rating"+i).append(`
        <span class="fas fa-star text-warning">
        `)
      }
      // show over 5 rating
      for(k=0;k<5-rating.toFixed(0);k++){
        $(".rating"+i).append(`
        <span class="fas fa-star text-muted">
        `)
      }
    }
  }
});


});

// 