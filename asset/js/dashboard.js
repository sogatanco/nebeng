$(document).ready(function(){

    if(Cookies.get('login')!='true'&&Cookies.get('token')==undefined){
        window.location.href = "login";
    }

});