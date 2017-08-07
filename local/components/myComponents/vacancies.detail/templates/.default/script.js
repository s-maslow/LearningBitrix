
$(function() {

    function addUser() {
        if($("#textOfrespond").val().toString().length == 0) {
            $(".exceptions").empty();
            $(".exceptions").append("Введите сообщение");
        }
        else
        {
            $.ajax({
                    url: "/ajax/response.php",
                    type: "POST",
                    dataType: "html",
                    data: {
                        "PAGE": "FORM",
                        "vacancyID":  $(".main").attr("id"),
                        "textOfrespond": $("#textOfrespond").val(),
                        "paymentFrom": $("#payFrom").val(),
                        "paymentTo": $("#payTo").val()
                    },
                    success: function(data) {

                        if(data.length == 0) {
                            alert("Произошла ошибка при добавлении.");
                            location.reload();
                        }
                        else {
                            $("#responseVacancy").empty();
                            $("#responseVacancy").append("Вы уже откликнутлись");
                            $("#responseVacancy").attr('disabled', true);
                            $(".response").append("Вы успешно откликнутлись на вакансию!");
                            dialog.dialog("close");
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("fuck");
                        alert(status + '|\n' +error);
                    }
            });

        }
    }

  $( "#dialog" ).dialog({
      autoOpen: false,
      dialogClass: "resp",
      width: 400,
      modal: true,
      buttons: {
        "Send": function() {
            addUser();
        },
        Cancel: function() {
            $( this ).dialog( "close" );
        }
      }
    });
 
    $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });

    $("#textOfrespond").keyup(function() {
        if (this.value.length > 2000) {
            this.value = this.value.substr(0, 2000);
            $(".exceptions").empty();
            $(".exceptions").append("Текст сообщения не должен превышать длину в 2000 симбволов");
        }
    });
} );