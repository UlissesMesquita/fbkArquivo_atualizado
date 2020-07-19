require('./jQuery.Mask.js');

jQuery.noConflict();
jQuery(function($){
  //$("#Dt_Ref").mask("99/9999");
  $('#Valor_Doc').mask('#.##0,00', {reverse: true});
});
