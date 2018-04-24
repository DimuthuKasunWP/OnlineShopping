
 function trim(str)
 {
   return str.replace(/^\s+|\s+$/g,'');
 }


 function textCounter(field,cntfield,maxlimit) 
 {
 if (field.value.length > maxlimit) // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
    // otherwise, update 'characters left' counter
  else
    cntfield.value = maxlimit - field.value.length;
  }

 // function to check special characters !
 function isSpecialCharOnly(str)
 {
   var iChars = "~`!@#$%^&*()_-+=|\\{}[]:;\"\',.<>?/";
    if(iChars.indexOf(str) != -1){
      return true;
    } else {
      return false;
    }          
 }  
  

 function isChar(str) 
 {
   len=str.length;
    for(i=0; i<len; i++)
    {
      if( ((str.charAt(i) >='a')&&(str.charAt(i) <='z')) ||  ((str.charAt(i) >='A')&& (str.charAt(i) <='Z')) )
      {} else {
        return false; break;
	}	
    }
    return true;
 }


 function isSpecialChar(str) 
 {
   len=str.length;
    for(i=0; i<len; i++)
    {
      if(((str.charAt(i) >='a')&&(str.charAt(i) <='z')) ||  ((str.charAt(i) >='A')&& (str.charAt(i) <='Z')) ||
	   isSpecialCharOnly(str.charAt(i)) || (str.charAt(i)== ' ') )
      {} else {
        return false; break;
	}	
    }
    return true;
 }


 function isSpecialCharNum(str) 
 {
   len=str.length;
    for(i=0; i<len; i++)
    {
      if(((str.charAt(i) >='a')&&(str.charAt(i) <='z')) ||  ((str.charAt(i) >='A')&& (str.charAt(i) <='Z')) ||
	  isSpecialCharOnly(str.charAt(i)) || (str.charAt(i)== ' ') || ((str.charAt(i) >= 0)&&(str.charAt(i) <= 9)))
      {} else {
        return false; break;
	}	
    }
    return true;
  }


 function isCharDot(str) 
 {
   len=str.length;
    for(i=0; i<len; i++)
    {
      if(((str.charAt(i) >='a')&&(str.charAt(i) <='z')) ||  ((str.charAt(i) >='A')&& (str.charAt(i) <='Z')) ||
	 (str.charAt(i) =='') || (str.charAt(i) ==''))
      {} else {
        return false; break;
	}	
    }
    return true;
 }
 

 function isCharNum(str) 
 {
   len=str.length;
    for(i=0; i<len; i++)
    {
      if(((str.charAt(i) >='a')&&(str.charAt(i) <='z')) ||  ((str.charAt(i) >='A')&& (str.charAt(i) <='Z')) || ((str.charAt(i) >= 0)&&(str.charAt(i) <= 9)) )
      {} else {
        return false; break;
	}	
    }
    return true;
 }
 

 function isCharNumS(str) 
 {
   len=str.length;
    for(i=0; i<len; i++)
    {
      if(((str.charAt(i) >='a')&&(str.charAt(i) <='z')) ||  ((str.charAt(i) >='A')&& (str.charAt(i) <='Z')) ||
	 (str.charAt(i) =='') || ((str.charAt(i) >= 0)&&(str.charAt(i) <= 9)) )
      {} else {
        return false; break;
	}	
    }
    return true;
 }
 

 function isSpace(str) 
 {
   len=str.length;
    for(i=0; i<len; i++)
    {
      if(str.charAt(i) == ' ')
      {
	return false; break;
      } 	
    }
    return true;
 }
 

 function isCharComa(str) 
 {
   len=str.length;
    for(i=0; i<len; i++)
    {
      if( ((str.charAt(i) >='a')&&(str.charAt(i) <='z')) ||  ((str.charAt(i) >='A')&& (str.charAt(i) <='Z')) || (str.charAt(i) ==',') )
      {} else {
        return false; break;
	}	
    }
    return true;
 }


 function isNum(num)
 {
    len=num.length;
    for(i=0; i<len; i++)
    {
      if((num.charAt(i) >= 0)&&(num.charAt(i) <= 9))
      {} else {
        return false; break;
	}	
    }
    return true;
 }
 

 function isDecimal(num)
 {
   len=num.length;
    for(i=0; i<len; i++)
    {
      if((num.charAt(i) >= 0)&&(num.charAt(i) <= 9) || num.charAt(i) == '.' )
      {} else {
        return false; break;
	}	
    }
    return true;
 }
 

 function isEmail(email)
 {
 var RegExp = /^((([A-Z]|[a-z]|[0-9]|!|#|$|%|&|'|\*|\+|\-|\/|=|\?|\^|_|`|\{|\||\}|~)+(\.([A-Z]|[a-z]|[0-9]|!|#|$|%|&|'|\*|\+|\-|\/|=|\?|\^|_|`|\{|\||\}|~)+)*)@((((([A-Z]|[a-z]|[0-9])([A-Z]|[a-z]|[0-9]|\-){0,61}([A-Z]|[a-z]|[0-9])\.))*([A-Z]|[a-z]|[0-9])([A-Z]|[a-z]|[0-9]|\-){0,61}([A-Z]|[a-z]|[0-9])\.)[\w]{2,4}|(((([0-9]){1,3}\.){3}([0-9]){1,3}))|(\[((([0-9]){1,3}\.){3}([0-9]){1,3})\])))$/
	if(RegExp.test(email)) {
	  return true;
	} else {
          return false;
	}
 }
 

  function getExtension(str)
  {
   i = strrpos(str,".");
   if (!i)
   {
     return "";
   }
   len = strlen(str) - i;
   ext = substr(str,i+1,len);
   return ext;
  }
 

 function isEqual(str1,str2) 
 {
   if(str1==str2)
   {		
    return true;
   } else {
    return false;
   }
}


 function isNumPhone(num)
 {
   len=num.length;
    for(i=0; i<len; i++)
    {
      if((num.charAt(i) >= 0)&&(num.charAt(i) <= 9) || (num.charAt(i) == '+'))
      {} else {
        return false; break;
	}	
    }
    return true;
 }


 function isUcase(str)
 { 
   len=str.length;
    for(i=0; i<len; i++)
    {
      if(((str.charAt(i) >='A')&& (str.charAt(i) <='Z')) )
      {
	return false; break;
      } else {}	
    }
    return true;
 }
 

 function isLen(str)
 {
   len=str.length;
   return len;
 }
 

 function isUrl(str)
 {
  var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
  return regexp.test(str);
 }