$(document).ready(function(){
    getUser();

    function getUser(){
        $.ajax({
            type:'get',
            url:'../../api/general/user?token=1234567',
            success:function(response){
                console.log(response)
            }
        })
    }
});