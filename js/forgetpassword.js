
 
 function GetXmlHttpObject()
        {
            if (window.XMLHttpRequest)
              {
	  return new XMLHttpRequest();
              }
            else if (window.ActiveXObject)
              {
	// code for IE6, IE5
	  return new ActiveXObject("Microsoft.XMLHTTP");
              }
            return null;
        }


 var XMLHttpUsername=false;
 function UserAvail(user)
 {
    XMLHttpUsername=GetXmlHttpObject();   
    if (XMLHttpUsername==null){
      alert ("Your browser does not support AJAX!");
      return;
    }
    XMLHttpUsername.open("GET","checkUser.php?user="+user,true);
    XMLHttpUsername.onreadystatechange = function(){
       if (XMLHttpUsername.readyState==4 && XMLHttpUsername.status == 200){
          document.getElementById('userChange').innerHTML=XMLHttpUsername.responseText; 
        }  
    }
    XMLHttpUsername.send(null); 
}