
  function done(){

   if(document.getElementById("txtsin_fname").value=="")
  {
   alert("Enter First name !!");
   document.getElementById("txtsin_fname").focus();
   return false;
  } else {
    if(isCharDot(document.getElementById("txtsin_fname").value) == false)
     {
       alert("First name Should be Characters Only !!");
       document.getElementById("txtsin_fname").focus();
       return false;
     }
  }

   if(document.getElementById("txtsin_lname").value=="")
  {
   alert("Enter Last name !!");
   document.getElementById("txtsin_lname").focus();
   return false;
  } else {
    if(isCharDot(document.getElementById("txtsin_lname").value) == false)
     {
       alert("Last name Should be Characters Only !!");
       document.getElementById("txtsin_lname").focus();
       return false;
     }
  }

  if(document.getElementById("txtsin_email").value=="")
  {
   alert("Enter E-mail ID !! ");
   document.getElementById("txtsin_email").focus();
   return false;
  } else {
     if(isEmail(document.getElementById("txtsin_email").value) == false)
     {
       alert("Enter valid E-mail ID !!");
       document.getElementById("txtsin_email").focus();
       return false;
     } 
  }

  if(document.getElementById("ta_badd").value=="")
  {
   alert("Enter Billing Address !!");
   document.getElementById("ta_badd").focus();
   return false;
  }
   if(document.getElementById("chksame").checked)
  { } else if(document.getElementById("ta_sadd").value==""){
   alert("Enter Shipping Address !!");
   document.getElementById("ta_sadd").focus();
   return false;
  }

  if(document.getElementById("selcountry").value == "selcountry")
  {
   alert("Select Country !!");
   document.getElementById("selcountry").focus();
   return false;
  }

  if(document.getElementById("txtsin_mobcode").value=="" || document.getElementById("txtsin_mob").value=="" )
  {
   //alert("Enter Country Code & Mobile No !!");
   //document.getElementById("txtsin_mobcode").value=""
   //document.getElementById("txtsin_mob").value=""
   //document.getElementById("txtsin_mobcode").focus();
   //return false;
  } else {
     if(isNumPhone(document.getElementById("txtsin_mobcode").value) == false || isNum(document.getElementById("txtsin_mob").value) == false)
     {
      alert("Country Code & Mobile No Should be numbers !!");
      document.getElementById("txtsin_mobcode").value=""
      document.getElementById("txtsin_mob").value=""
      document.getElementById("txtsin_mobcode").focus();
      return false;
    }    
  }

  if(document.getElementById("txtsin_phcode").value=="" || document.getElementById("txtsin_pharea").value=="" || document.getElementById("txtsin_phone").value=="" )
  {
   alert("Enter Country Code , Area Code & Phone No !!");
   document.getElementById("txtsin_phcode").value=""
   document.getElementById("txtsin_pharea").value=""
   document.getElementById("txtsin_phone").value=""
   document.getElementById("txtsin_phcode").focus();
   return false;
  } else {
     if(isNumPhone(document.getElementById("txtsin_phcode").value) == false || isNum(document.getElementById("txtsin_pharea").value) == false || isNum(document.getElementById("txtsin_phone").value) == false)
     {
     alert("Country Code , Area Code & Phone No must be Numbers only !!");
     document.getElementById("txtsin_phcode").value=""
     document.getElementById("txtsin_pharea").value=""
     document.getElementById("txtsin_phone").value=""
     document.getElementById("txtsin_phcode").focus();
     return false;
    }
  }
  // validating captca for non empty!!
  // if (document.getElementById("txtcaptcha").value == "" )
  // {
  //  alert ( "Please Enter Verification Code !!");
  //  document.getElementById("txtcaptcha").focus();
  //  return false;
  // }
  getParam(document.frm_cust);
 if(document.getElementById('divVeriCode').innerHTML=="ok")
 {
   return true;
 }
 if(document.getElementById('divVeriCode').innerHTML=="Enter the code as shown in the image")	
 {
   setTimeout('alr()', 1000); 
   return false;
 }
}