
  function done(){

  if(document.getElementById("txtprc_actprc").value=="")
  {
   alert("Enter Actual Price !!");
   document.getElementById("txtprc_actprc").focus();
   return false;
  } else {
     if(isDecimal(document.getElementById("txtprc_actprc").value) == false)
     {
       alert("Actual Price Should be numbers !!");
       document.getElementById("txtprc_actprc").focus();
       return false;
     }
     if(document.getElementById("txtprc_actprc").value == 0)
     {
       alert("Actual Price Should not be Zero !!");
       document.getElementById("txtprc_actprc").focus();
       return false;
     } 
  }
  if(document.getElementById("rdono").checked == false && document.getElementById("rdoyes").checked == false )
  {
    alert('Please select Discount !!');
    return false;
  } else if(document.getElementById("rdoyes").checked == true){
  // validating Discount Price isDecimal(); & less than actual price!!
     if(document.getElementById("txtprc_disprc").value=="")
    {
     alert("Enter Discount Price !!");
     document.getElementById("txtprc_disprc").focus();
     return false;
    } else {
     if(isDecimal(document.getElementById("txtprc_disprc").value) == false)
     {
       alert("Discount Price Should be numbers !!");
       document.getElementById("txtprc_disprc").focus();
       return false;
     }
    }
     var actprice=parseInt(document.getElementById("txtprc_actprc").value);
     //  alert(actprice);
     var disprice=parseInt(document.getElementById("txtprc_disprc").value);
     //  alert(disprice);
     if(disprice > actprice)
     {
       alert("Discount Price Should be LESS than Actual Price !!");
       document.getElementById("txtprc_disprc").value = "";
       document.getElementById("txtprc_disprc").focus();
       return false;
     }
     if(document.getElementById("txtprc_disprc").value == 0)
     {
       alert("Discount Price Should not be Zero !!");
       document.getElementById("txtprc_disprc").focus();
       return false;
     }
     if(disprice==actprice)
     {
       alert("Discount Price Should be Equal to Actual Price !!");
       document.getElementById("txtprc_disprc").value = "";
       document.getElementById("txtprc_disprc").focus();
       return false;
     } 
  }

  if (document.getElementById("txtcaptcha").value == "" )
  {
   alert( "Please Enter Verification Code !!");
   document.getElementById("txtcaptcha").focus();
   return false;
  }
  getParam(document.frm_prd);
 if(document.getElementById('divVeriCode').innerHTML=="  ok  ")
 {
   return true;
 }
 if(document.getElementById('divVeriCode').innerHTML==" Enter the code as shown in the image ")	
 {
   setTimeout('alr()', 1000); 
   return false;
 }
}