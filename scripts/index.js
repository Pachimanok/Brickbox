$('#formulario').on('submit', function(e){
  //$('.spinner .preloader-wrapper').show();
  $('#enviar').addClass('disabled');
  alert("estas en index.js")
  e.preventDefault();
  var f = $(this);
  var formData = new FormData(document.getElementById("formulario"));
  formData.append("dato", "valor");
  $.ajax({
      url: "./gmail_send.php",
      type: "post",
      dataType: "html",
      data: formData,
      cache: false,
      contentType: false,
      processData: false
  }).done(function(res){
          switch(res){
            case '0':
	      alert("Error inesperado")              
              $('#enviar').removeClass('disabled');
	      break;
            case '1':
              alert("Mail enviado")      
              $('#enviar').removeClass('disabled');
              break;
            default:
              $('#enviar').removeClass('disabled');
              alert(res);
            }
      });
});
