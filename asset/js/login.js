$(document).ready(function(){
   
    $(".js-inputWrapper").length && $(".js-inputWrapper").each(function() {
                var $this = $(this),
                $input = $this.find(".formRow--input"),
                placeholderTxt = $input.attr("placeholder"),
                $placeholder;
            
                $input.after('<span class="placeholder">' + placeholderTxt + "</span>"),
                $input.attr("placeholder", ""),
                $placeholder = $this.find(".placeholder"),
            
                $input.val().length ? $this.addClass("active") : $this.removeClass("active"),
            
                $input.on("focusout", function() {
                    $input.val().length ? $this.addClass("active") : $this.removeClass("active");
                }).on("focus", function() {
                    $this.addClass("active");
                });
            });

    $('#tombol').click(function(){
        $.ajax({
            type: "post",
            url: "../api/login/admin",
            data:{
                token:"1234567",
                username:$('#username').val(),
                pass:$('#password').val()
            },  
            success: function(response){
                console.log(response.token)
                Cookies.set('login', true, { expires: 1 });
                Cookies.set('token', response.token, { expires: 1 });
                window.location.href = "dashboard";
            },
            error:function(err){
                alert("username and password not match")
            }
          });
    });

    
});