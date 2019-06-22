$(document).ready(function(){
    getUser();

    function getUser(){
        $("#content").html("")
        $.ajax({
            type:'get',
            url:'../../api/general/user?token=1234567',
            success:function(response){
                console.log(response)
                $.each(response.data, function(i,user){
                    var profil=user.us_profil;
                    if(profil==null||profil==""){
                        profil="profil_null.png"
                    }
                    var nama=ifUnknown(user.us_nama);
                    var email=user.us_email;
                    var hp=ifUnknown(user.us_nomorhp);
                    var sex=ifUnknown(user.us_jk);
                    var join=user.us_gabung;

            
                    $("#content").append(`
                    <div class="col-sm-4">
                    <div class="card-view">
                        <div class="row">
                            <div class="col-3 ">
                                <img src="../../asset/images/`+profil+`" class="rounded-circle img-thumbnail float-right" id="profil">
                            </div>
                            <div class="col-7">
                               <strong>`+capitalFirst(nama)+`</strong><br>
                               <small class="text-muted"><i class="fas fa-envelope"></i> `+email.substring(0,22)+`<br><i class='fas fa-phone-square'></i> `+hp+`</small>
                            </div>
                            <div class="col-1" id="hapus" data-email="`+email+`"><i class="fas fa-trash-alt text-danger"></i></div>
                        </div>
                        <div class="row detail">
                            <div class="col-4 text-center text-muted pd">
                                <small >Bengkel</small><br>
                                <strong id="count`+i+`">000</strong>
                            </div>
                            <div class="col-4 text-center text-muted pd">
                                <small >Join</small><br>
                                <strong >`+prettyDate(join)+`</strong>
                            </div>
                            <div class="col-4 text-center text-muted">
                                <small >Gender</small><br>
                                <strong>`+sex.toUpperCase()+`</strong>
                            </div>
                        </div>
                    </div>
                </div>
                    `)  

                    $.ajax({
                        type:'get',
                        url:'http://localhost:8080/nebeng/api/general/bengkel?token=1234567&pemilik='+email,
                        success:function(response){
                            jbengkel=response.data.length
                            $("#count"+i).html(addZero(jbengkel,3))
                        },
                        error:function(err){
                            jbengkel=0
                            $("#count"+i).html(addZero(jbengkel,3))
                        }  
                    })
                });
                
            }
        })
    }

    $("#content").on("click","#hapus", function(){
        var conf=confirm("Are you sure to Delete it ?");
            if(conf==true){  
                console.log($(this).data("email"))
                $.ajax({
                    type:"DELETE",
                    url:"../../api/admin/deleteuser",
                    data:{
                        token:Cookies.get('token'),
                        username:$(this).data("email")
                    },
                    success:function(res){
                        alert("Deleted")
                        getUser()
                    },
                    error:function(err){
                        alert("failed to delete")
                    }
                })
            }
    })

// change null to unknown
    function ifUnknown(thedata){
        if(thedata==null||thedata==""){
            return "Unknown";
        }else{
            return thedata;
        }  
    }

 // uppercase first string
    function capitalFirst(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

// change time to beutifull string
function prettyDate(time){
    var date = new Date((time || "").replace(/-/g,"/").replace(/[TZ]/g," ")),
        diff = (((new Date()).getTime() - date.getTime()) / 1000),
        day_diff = Math.floor(diff / 86400);
            
    if ( isNaN(day_diff) || day_diff < 0 || day_diff >= 31 )
        return;       
    return day_diff == 0 && (
            diff < 60 && "NOW" ||
            diff < 3600 && Math.floor( diff / 60 ) + " MIN" ||
            diff < 7200 && "1 hour ago" ||
            diff < 86400 && Math.floor( diff / 3600 ) + " H") ||
        day_diff < 7 && day_diff + " D" ||
        day_diff < 31 && Math.ceil( day_diff / 7 ) + " W";
}

    // funtion add leading zero
    function addZero(num, size) {
        var s = num+"";
        while (s.length < size) s = "0" + s;
        return s;
    }


});