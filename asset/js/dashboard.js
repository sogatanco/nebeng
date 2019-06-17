$(document).ready(function(){

  // showing chart
var ctx = document.getElementById('canvas');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [],
        datasets: [
        {
            label: 'Bengkel Motor',
            borderColor: 'red',
            borderCapStyle: 'square',
            data: [],
            borderWidth: 2
        },
        {
            label: 'Bengkel Mobil',
            borderCapStyle: 'square',
            borderColor:'#ee00e2',
            data: [],
            borderWidth: 2
        }
      ],
        

    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 2,
                    maxTicksLimit:5
                }
            }]
        }
    }
});
// get month name
var month = new Array();
  month[0] = "January";
  month[1] = "February";
  month[2] = "March";
  month[3] = "April";
  month[4] = "May";
  month[5] = "June";
  month[6] = "July";
  month[7] = "August";
  month[8] = "September";
  month[9] = "October";
  month[10] = "November";
  month[11] = "December";



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
        center: {lat: 5.14506, lng: 97.15014},
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
                  // get markers for kategori 2
                    var marker = new google.maps.Marker({
                        position:new google.maps.LatLng(response.data[i].bk_lat,response.data[i].bk_long),
                        map: map,
                        title:'map',
                        icon:'../asset/images/markermobil.png'
                    });

                    // add info window on marker
                    var infowindow = new google.maps.InfoWindow({
                      maxWidth: 160
                    });
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                      return function() {
                        var contentString = response.data[i].bk_namabengkel;
                        infowindow.setContent(contentString);
                        infowindow.open(map, marker);
                      }
                    })(marker, i));
                }
                // get data for chart js
                d=new Date()
                for(i=d.getMonth()+1;i<12;i++){
                  myChart.data.datasets[1].data.push(response.data.filter(function(j,n){
                    return(j.bk_startdate.substr(0,7)==d.getFullYear()-1+'-'+("0" + (i+1)).slice(-2))
                  }).length) 
                }
                for(i=0;i<=d.getMonth();i++){
                  myChart.data.datasets[1].data.push(response.data.filter(function(j,n){
                    return(j.bk_startdate.substr(0,7)==d.getFullYear()+'-'+("0" + (i+1)).slice(-2))
                  }).length) 
                }
                myChart.update()  
                }

            
        });

        $.ajax({
            type:"get",
            url:"../api/general/bengkel?token=1234567&kategori=1",
            success: function(response){
                $("#jmotor").html(response.data.length);
                for(i=0;i<response.data.length;i++){
                  // get latitute and longitude for marker for kategori 1
                    var marker = new google.maps.Marker({
                        position:new google.maps.LatLng(response.data[i].bk_lat,response.data[i].bk_long),
                        map: map,
                        title:'gs',
                        icon:'../asset/images/markermotor.png'
                    }); 
                    // add info window on marker
                    var infowindow = new google.maps.InfoWindow({
                      maxWidth: 160
                    });
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                      return function() {
                        var contentString = response.data[i].bk_namabengkel;
                        infowindow.setContent(contentString);
                        infowindow.open(map, marker);
                      }
                    })(marker, i));

                }
              
                // get data for chart js
                d=new Date()
                for(i=d.getMonth()+1;i<12;i++){
                  myChart.data.labels.push(month[i]+' '+(d.getFullYear()-1))
                  myChart.data.datasets[0].data.push(response.data.filter(function(j,n){
                    return(j.bk_startdate.substr(0,7)==d.getFullYear()-1+'-'+("0" + (i+1)).slice(-2))
                  }).length) 
                }
                for(i=0;i<=d.getMonth();i++){
                  myChart.data.labels.push(month[i]+' '+d.getFullYear())
                  myChart.data.datasets[0].data.push(response.data.filter(function(j,n){
                    return(j.bk_startdate.substr(0,7)==d.getFullYear()+'-'+("0" + (i+1)).slice(-2))
                  }).length) 
                }
                myChart.update()
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
        return b.j_ulasan - a.j_ulasan;
    });
    // console.log(popular)
    for(i=0;i<4;i++){
      // count rating
      rating=popular[i].total_rating/popular[i].j_ulasan
      rating = rating || 0
      $("#popular").append(`
        <div class="row popularpost">
          <div class="col-6 nbengkel">
            <strong>`+popular[i].bk_namabengkel+`</strong>
          </div>
          <div class="col-6 text-center">
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