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
                username:"admin",
                pass:"admin"
            },
            
            success: function(response){
                console.log(response)
            },
            error:function(err){
                console.log(err)
            }
          });
    });
});