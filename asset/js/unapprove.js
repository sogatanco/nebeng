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
                    kategori="<span class='fas fa-motorcycle text-danger'></span> Motor";
                }
                else{
                    kategori="<span class='fas fa-car text-danger'></span> Mobil";
                }
                $("#content").append(`
                <div class="col-sm-4">
                    <div class="card-view" data-toggle="modal" data-target="#myModal" data-id="`+popular[i].bk_id+`" data-lat="`+popular[i].bk_lat+`" data-long="`+popular[i].bk_long+`" data-judul="`+judul+`" data-rating="`+rating+`" data-ulasan="`+popular[i].j_ulasan+`" data-kategori="`+kategori+`" data-desk="`+deskripsi+`" data-lay="`+popular[i].bk_layanan+`" data-pemilik="`+popular[i].bk_pemilik+`" data-tanggal="`+popular[i].bk_startdate+`" data-tlp="`+popular[i].bk_telpon+`" data-waktu="`+popular[i].bk_availabletime+`">
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
        $('#judul').html(ca($(this).data('judul')))
        $('#attribute').html(`<span class="badge badge-pill badge-warning notification" >`+$(this).data('rating')+`</span> `+$(this).data('ulasan')+` ulasan | `+$(this).data('kategori'))
        $("#deskripsi").html($(this).data('desk')+`.`)
        $("#layanan").html(`Bengkel ini ditambahkan oleh <b>`+$(this).data('pemilik')+ `</b> sejak `+$(this).data('tanggal')+ `. Adapun layanan yang bisa didapatkan di sini antara lain :` +$(this).data('lay')+` dengan waktu pengoprasian mulai dari ` +$(this).data('waktu')+` WIB. Untuk informasi lebih lanjut silakan menghubungi langsung `+$(this).data('tlp')+`.`)
        console.log($(this).data('id'))

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

    function ca(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    
  
});