    
//     $(function(){
//       $('#respondForm').on('submit', function(e){
// //создаем экземпляр класс FormData, тут будем хранить всю информацию для отправки
//       var formData = new FormData();
  
//  //присоединяем остальные поля
//   formData.append('text', $('input#textOfrespond').val());

//   //отправляем через ajax
//   $.ajax({
//       url: "/ajax.handler.php",
//       type: "POST",
//       dataType : "json", 
//       cache: false,
//       contentType: false,
//       processData: false,     
//       data: formData, //указываем что отправляем
//       success: function(data){
//         if(data.ok == 'Y'){
//         //если ок, выводим сообщение
//         $('#message_form').html('<p style="color: green; text-align: center; margin: 20px 0;">Сообщение успешно отправлено!<br>В ближайшее время мы свяжемся с Вами!</p>');
//         setTimeout(function() { $('#message_form').html(' '); }, 8000);
//       }else{
//         $('#message_form').html('<p style="color: red; text-align: center; margin: 20px 0;">Сообщение не может быть отправлено!<br>Попробуйте позже!</p>');
//         setTimeout(function() { $('#message_form').html(' '); }, 8000);         
//       }
//     }
//   });
  
//   return false; 
//       });
//   });