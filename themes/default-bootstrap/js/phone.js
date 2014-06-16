

$(document).ready(function(){

$( "#phoneA, #phoneB" ).change(function() {
    PhoneUpdate();
});


$( "#phone_mobileA, #phone_mobileB" ).change(function() {
    MobilePhoneUpdate();
});

function PhoneUpdate(){
    $( "#phone" ).val($( "#phoneA" ).val() + $( "#phoneB" ).val());
}

function MobilePhoneUpdate(){
    $( "#phone_mobile" ).val($( "#phone_mobileA" ).val() + $( "#phone_mobileB" ).val());
}

});

