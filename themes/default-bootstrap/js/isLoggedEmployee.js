
// Due to inability to check logged in admins/employees from the frontend templates, this script is used to display the content meant only for them.

$(document).ready(function(){
    
        $.get( "http://myeuromarket.com/admin2014/isLogged.php", function( data ) {
            if(data==1)
                $('.administration').css('display','block');
            alert( "Load was performed." + data );
      });   
});
