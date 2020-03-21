
var cur_x;
var cur_y;
  function SignIner(){
    $("#extra").html("<input style='display:none' name='cur_x' value="+cur_x+" /><input style='display:none' name='cur_y' value="+cur_y+" />")
      $("#erroralert").html("Logging in");
      $.ajax({
          type: "POST",
          url: "signin.php",
          data: new FormData(document.getElementById('signin_form')),
          cache: false,
          processData: false,
          contentType: false,
          success: function(result){
                if(result=="1"){
                  $("#erroralert").html("Invalid user");
                }
                else if(result=="2"){
                  $("#erroralert").html("Wrong password");
                }
                else{
                //  alert(result);
                eval(result);
                }
            }
        });
  }
  function initMap(x,y) {
    console.log("Creating map at "+x+","+y);
    // Create a map object and specify the DOM element for display.
    $("#map").attr('src','https://www.google.com/maps/embed/v1/view?key=AIzaSyADD4jp4CCrvDqIrukevDY6nxb3AfeDxgY&center=-'+x+',-'+y+'&zoom=18&maptype=satellite');
  }
  $("document").ready(function(){


    jQuery.getScript('http://www.geoplugin.net/javascript.gp', function()
    {
        $("#position").html("Your location is: " + geoplugin_latitude() +" " + geoplugin_longitude());
          initMap(geoplugin_latitude(),geoplugin_longitude());
    });
});
