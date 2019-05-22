 /* custom JS here */
 function responheight() {
     var hfoot = $(window).height();
     $('.mainpage').css({ minHeight: hfoot });
 }

 $(document).ready(function() {
    

 });
 $(window).load(function() {
     responheight();
 });

 $(window).resize(function() {
     responheight();
 });