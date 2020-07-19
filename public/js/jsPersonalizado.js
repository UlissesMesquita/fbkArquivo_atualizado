

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
  

  function mascaraValor( campo, e )
  {
    var kC = (document.all) ? event.keyCode : e.keyCode;
    var valor = campo.value;
    
    if( kC!=8 && kC!=46 )
    {
      if( valor.length==3 ){
        campo.value = valor += '.';
      }
      else if( valor.length==3 ){
        campo.valor = valor += '.';
      }
      else
        campo.valor = valor += ',00';
    }
  }
  

