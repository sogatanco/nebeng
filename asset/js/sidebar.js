$(function() {

    $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});

$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
}); 

// logout
$("#logout").click(function(){
  Cookies.remove('token');
  Cookies.remove('login');
  window.location.href = "dashboard";
});

// decode token
function parseJwt (token) {
  var base64Url = token.split('.')[1];
  var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
  var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
      return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
  }).join(''));

  return JSON.parse(jsonPayload);
};

// show user login
$('#user').html(parseJwt(Cookies.get('token')).username);
 
// show ip addres
$('#ip').html("IP : "+parseJwt(Cookies.get('token')).ipaddress);
});