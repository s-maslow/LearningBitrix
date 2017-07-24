$( function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      dialogClass: "resp",
      modal: true,
      minWidth: 500,
      maxWidth: 500,
      buttons: {
        "Send": function() {
          $( this ).dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  
    $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
  } );