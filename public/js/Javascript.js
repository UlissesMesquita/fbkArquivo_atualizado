//Funções após a leitura do documento
$(document).ready(function() {
  //Select para mostrar e esconder divs
  $('#Dep').on('change',function(){
      var SelectValue='.'+$(this).val();
      $('.DivPai div').hide();
      $(SelectValue).toggle();
  });
});