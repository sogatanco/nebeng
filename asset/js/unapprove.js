$(document).ready(function(){
    $.ajax({
        type:"get",
        url:"../../api/admin/viewbengkel?token="+Cookies.get("token"),
        success: function(response){
            $(".junapprove").html(response.data.length);
            popular=response.data;
            console.log(popular)
            for(i=0;i<popular.length;i++){
                judul=popular[i].bk_namabengkel;
                deskripsi=popular[i].bk_deskripsi;
                rating=popular[i].total_rating/popular[i].j_ulasan;
                rating = rating || 0
                rating=rating.toFixed(1)
                if(deskripsi==""){
                    deskripsi="Description";
                }
                kategori=popular[i].bk_kategori;
                if(kategori=1){
                    kategori="Motor"
                }
                else{
                    kategori="Mobil"
                }
                $("#content").append(`
                <div class="col-sm-4">
                    <div class="card-view" data-toggle="modal" data-target="#myModal" data-id="`+popular[i].bk_id+`" data-lat="`+popular[i].bk_lat+`" data-long="`+popular[i].bk_long+`" data-judul="`+judul+`">
                        <div class="row">
                            <div class="col-6">
                                <img src="../../asset/images/`+popular[i].bk_foto+`" class="gambar">
                            </div>
                            <div class="col-6 content">
                            <strong class="title">`+judul.substring(0,14)+`</strong>
                                <small class="text-muted">
                                    <p><span class="badge badge-pill badge-warning notification" >`+rating+` </span>  `+popular[i].j_ulasan+` ulasan | `+kategori+`</p>
                                    <p>`+deskripsi.substring(0,35)+`...</p>
                                </small> 
                            </div>
                        </div>

                    </div>
                </div>
                `);
            }
        }
    });


// get data when opened modal
    $('#content').on( "click",".card-view", function() {
        initialize(new google.maps.LatLng($(this).data('lat'), $(this).data('long')));
        
    });

// initialize map
    function initialize(myCenter) {
        var marker = new google.maps.Marker({
            position: myCenter
        });
      var mapProp = {
            center: myCenter,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map"), mapProp);
        marker.setMap(map);
    };
  
});