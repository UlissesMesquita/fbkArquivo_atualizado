//Funções após a leitura do documento
$(document).ready(function() {
  //Select para mostrar e esconder divs

var dep = document.getElementById('Dep');


  $('#Dep').on('change',function(){
      var SelectValue='.'+$(this).val();
      //$(".DivPai div").children('select').prop("disabled", true);
      $('.DivPai div').hide();
      $(SelectValue).toggle();
      //$(".DivPai select").prop("disabled", false);
  });
});

