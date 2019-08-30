 
  jQuery(document).on('click','.card-side-left .fa-angle-double-down',  function() {
  
    $(this).closest( ".card-side-left" ).find(".open_div").css( "display", "block");
    $(this).closest( ".card-side-left" ).css( "height", "150px");
    $(this).closest( ".card-side-left .fa-angle-double-down" ).css("display", "none");
    $(this).closest( ".card-side-left" ).css( "height", "150px");
    });

   jQuery(document).on('click','.card-side-left .fa-angle-double-up',  function() {
    $(this).closest( ".card-side-left" ).find(".open_div").css( "display", "none");
    $(this).closest( ".card-side-left" ).css( "height", "auto");
    $(this).closest( ".card-side-left" ).find(".fa-angle-double-down").css( "display", "block");
  });

 

