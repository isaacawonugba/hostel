<?php
    require_once("Hostel.php");
    $host = new Hostel();
?>
<form class="w3-container">
    <p class="response"></p>
    <h2 class="w3-text-green">Booking</h2>
    <div class="w3-row-padding w3-padding-24">
        <div class="w3-third"><label class="w3-label">Hostel</label> <select id="hostel" class="w3-input w3-border" name="hostel"><?php echo $host->loadHostels(); ?></select></div>
        <div class="w3-quarter"><label class="w3-label">Block</label> <select id="block" class="w3-input w3-border" name="block"></select></div>
        <div class="w3-quarter"><label class="w3-label">Room</label> <select id="room" class="w3-input w3-border" name="room"></select></div>
    </div>
    <div class="w3-row-padding w3-padding-24">
        <div class="w3-third"><label class="w3-label">Programme</label> <select id="programme" class="w3-input w3-border" name="programme"></select></div>
        <div class="w3-third"><label class="w3-label">Level</label> <select id="level" class="w3-input w3-border" name="level"></select></div>
        <div class="w3-rest w3-padding-24"><button class="w3-button w3-hover-light-green w3-green">Apply</button></div>
    </div>
</form>
<script src="library/jQuery/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$("#hostel").change(function(){
    var hid = $(this).val();
    dataString = "hostel="+hid;
    $.ajax({
        type: "POST",
        url: "loadBlocks.php",
        data: dataString,
        dataType: 'html',
        success: function(msg){
            alert(msg);
            $("#block").html(msg);
        },
        error: function(){
        }
  });	
})
</script>