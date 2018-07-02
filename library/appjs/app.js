$('.toggler').click(function(){
  
    var fullWidth = window.innerWidth;
    var conWidth = $('.container').outerWidth();
    if(fullWidth == conWidth){
        $('.container').css("width", "85%");
    }else{
        $('.container').css("width", "100%");
    }
    $('.w3-sidebar').toggle();
});

$('#login').validate({
    rules: { 
        username: { required: true, min: 7, },
        pwd: { required: true }
    },
    errorPlacement: function(error, element) { }
});

$("#btnLogin").click(function(){
if($("#login").valid()) {
    var dataString = $("#login").serialize();
        $.ajax({
                type: "POST",
                url: "login.php",
                data: dataString,
                dataType: 'html',
                success: function(msg){
                    if(msg == false){
                        $(".response").html("<i class='fa fa-2x fa-info'></i> Login failed, retry!");
                    }else{
                        window.location.href= msg;
                    }
                   },
                error: function(msg){
                    $(".response").html(msg);
                }
          });	
}
});