$(function() {

    function addUser() {
        if($("#textOfrespond").val().toString().length > 2000)
        {
            $(".exceptions").empty();
            $(".exceptions").append("Длина вашего сообщения привышает 2000 символов.");
        }
        else if($("textarea").val().toString().length == 0)
        {
            $(".exceptions").empty();
            $(".exceptions").append("Введите сообщение");
        }
        else
        {
            $.ajax(
                {
                    url: "/ajax.handler.php",
                    type: "POST",
                    dataType: "html",
                    data:
                        {
                            "PAGE": "FORM",
                            "vacancyID":  $(".main").attr("id"),
                            "textOfrespond": $("#textOfrespond").val(),
                            "paymentFrom": $("#payFrom").val(),
                            "paymentTo": $("#payTo").val()
                        },
                    success: function(data)
                    {

                        if(data.length == 0)
                        {
                            alert("Произошла ошибка при добавлении.");
                            location.reload();
                        }
                        else
                        {
                            $("#dialog").dialog("close");
                        }
                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseText + '|\n' + status + '|\n' +error);
                    }

                });

        }
    }

  $( "#dialog" ).dialog({
      autoOpen: false,
      dialogClass: "resp",
      buttons: {
        "Send": function() {
            addUser();
           // $( this ).dialog( "close" );
        },
        Cancel: function() {
            $( this ).dialog( "close" );
        }
      }
    });
 
    $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
    $( "#hide" ).on( "click", function() {

    });
} );