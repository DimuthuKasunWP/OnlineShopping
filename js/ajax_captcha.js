
function GetXmlHttpObject()
{ 

 if (window.XMLHttpRequest)
 { 

  return new XMLHttpRequest();
 }
 if (window.ActiveXObject)
 { 

  return new ActiveXObject("Microsoft.XMLHTTP");
 }
 return null;
}

var receiveReq;
function getParam(theForm)
{
 receiveReq=GetXmlHttpObject();
 if(receiveReq==null)
 {
  alert("Your Browser Doest Not Support XMLHTTP!");
  return;
 }
 var url="captcha.php";
 var postStr = theForm.txtcaptcha.name + "=" + encodeURIComponent(theForm.txtcaptcha.value);
 try
 {
  receiveReq.onreadystatechange=updatePage;
  receiveReq.open("POST",url,true);
  receiveReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  receiveReq.setRequestHeader("Content-length", postStr.length);
  receiveReq.setRequestHeader("Connection", "close");
  //Make the request
  receiveReq.send(postStr);
  }
  catch(err){ alert(err.description);}
}

function updatePage()
{
 if(receiveReq.readyState==4)
 {

  if(receiveReq.responseText=="ok")
  {
   document.getElementById('divVeriCode').innerHTML="ok";
   return true;
  }
  if(receiveReq.responseText=="Enter the code as shown in the image")
  {
   alert("Enter the code as shown in the image");
   document.getElementById('divVeriCode').innerHTML="Enter the code as shown in the image";
   document.getElementById('txtcaptcha').focus();
   return false;
  }
  //alert("end");
  //alert("res= "+receiveReq.responseText);
  //Get a reference to CAPTCHA image
  //img = document.getElementById('imgCaptcha'); 
  //Change the image
  //img.src = 'create_image.php?' + Math.random();
 }
 //return false;
}

function getphoto(theForm)
{
   var img = document.getElementById('imgCaptcha');   
   img.src = 'create_image.php?' + Math.random();
}