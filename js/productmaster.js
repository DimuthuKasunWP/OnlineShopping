 // ajax function to check Product ID already exist .
 // ajax function Sub category .

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

 // Product ID function 
 var XMLHttpPrdID=false;
 function PrdIDCheckAvail(pid)
 {
    XMLHttpPrdID=GetXmlHttpObject();   
    if (XMLHttpPrdID==null){
      alert ("Your browser does not support AJAX!");
      return;
    }
    XMLHttpPrdID.open("GET","checkPrdID.php?pid="+pid,true);
    XMLHttpPrdID.onreadystatechange = function(){
       if (XMLHttpPrdID.readyState==4 && XMLHttpPrdID.status == 200){
          document.getElementById('pidChange').innerHTML=XMLHttpPrdID.responseText; 
        }  
    }
    XMLHttpPrdID.send(null); 
 }

 // sub categoty function 
 var XMLHttpPrdsubcat=false;
 function displaysubcat(cat)
 {
   XMLHttpPrdsubcat=GetXmlHttpObject();   
  if (XMLHttpPrdsubcat==null){
      alert ("Your browser does not support AJAX!");
      return;
    }
    XMLHttpPrdsubcat.open("GET","subcat.php?catval="+cat,true);
    XMLHttpPrdsubcat.onreadystatechange = function(){
       if (XMLHttpPrdsubcat.readyState==4 && XMLHttpPrdsubcat.status == 200){
           document.getElementById('subcat1div').innerHTML=XMLHttpPrdsubcat.responseText; 
        }  
    }
    XMLHttpPrdsubcat.send(null); 
 }