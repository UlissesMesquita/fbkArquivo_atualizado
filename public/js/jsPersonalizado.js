

  //Mascara para Data
  function mascaraData( campo, e )
  {
    var kC = (document.all) ? event.keyCode : e.keyCode;
    var data = campo.value;
    
    if( kC!=8 && kC!=46 )
    {
      if( data.length==2 ){
        campo.value = data += '/';
      }
      else if( data.length==3 ){
        campo.value = data += '/';
      }
      else
        campo.value = data;
    }
  }
  

  //Mascara Valor
  function mascaraMoeda(numero){
    var formatado = "R$ " + numero.toFixed(2).replace(".",",");
    return formatado;
}

  

