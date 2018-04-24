    $(function(){
	$('#tafeatures').keyup(function(){
	limitChars('tafeatures', 200, 'charsLeft1');
	})
     });
    
     $(function(){
	$('#tasrtdcpn').keyup(function(){
	limitChars('tasrtdcpn', 300, 'charsLeft2');
	})
     });
    
    $(function(){
	$('#talngdcpn').keyup(function(){
	limitChars('talngdcpn', 500, 'charsLeft3');
	})
     });
 
     $(function(){
	$('#tasep').keyup(function(){
	limitChars('tasep', 100, 'charsLeft4');
	})
     });
     
    $(function(){
	$('#ta_add').keyup(function(){
	limitChars('ta_add', 100, 'charsLeft1');
	})
     });
 
    $(function(){
	$('#ta_badd').keyup(function(){
	limitChars('ta_badd', 100, 'charsLeft1');
	})
     });

    $(function(){
	$('#ta_sadd').keyup(function(){
	limitChars('ta_sadd', 100, 'charsLeft2');
	})
     });

    $(function(){
	$('#ta_about').keyup(function(){
	limitChars('ta_about', 400, 'charsLeft2');
	})
     });
    
    $(function(){
	$('#ta_catdcpn').keyup(function(){
	limitChars('ta_catdcpn', 100, 'charsLeft1');
	})
     });
    
    $(function(){
	$('#tamsg').keyup(function(){
	limitChars('tamsg', 500, 'charsLeft1');
	})
     });
    
    function limitChars(textid, limit, infodiv)

	  {

		var text = $('#'+textid).val(); 

		var textlength = text.length;

		if(textlength > limit)

	      {

		  $('#' + infodiv).html('You cannot write more then '+limit+' characters!');

		  $('#'+textid).val(text.substr(0,limit));

		  return false;

	      }

		else

	      {

		  $('#' + infodiv).html( (limit - textlength) );

		  return true;

	      }

	 }
