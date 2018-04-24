
  function done(){

  if(document.getElementById("txtprd_id").value == ""){
    alert("Enter product id !!");
    document.getElementById('txtprd_id').focus();
    return false;
  } else if (isSpace(document.getElementById("txtprd_id").value) == false ){
    alert("Space is not allowed in Product ID!!");
    document.getElementById("txtprd_id").value = "";
    document.getElementById("txtprd_id").focus();
    return false;
  } else {

    var noofrows = document.getElementById('noofrows').value;
    if(noofrows>0)
    {
     alert("Product ID Already Exists !!"); 
     document.getElementById("txtprd_id").focus();
     return false;
    }
  }

  if(document.getElementById("txtprd_sname").value=="")
  {
   alert("Enter Short name !!");
   document.getElementById("txtprd_sname").focus();
   return false;
  }

  if(document.getElementById("txtprd_lname").value == "")
  {
   alert("Enter Long name !!");
   document.getElementById("txtprd_lname").focus();
   return false;
  }

  if(!(document.getElementById("fileimage").value))
  {
   alert("Browse Product image !!");
   document.getElementById("fileimage").focus();
   return false;
  } 

  if(document.getElementById("txtsize").value=="")
  {
   //alert("Enter size/Dimension !!");
   //document.getElementById("txtsize").focus();
   //return false;
  } else {
     if(isNum(document.getElementById("txtsize").value) == false)
     {
       alert("Size/Dimension Should be numbers !!");
       document.getElementById("txtsize").focus();
       return false;
     } 
  }
  //// validating Product Unit of measure is selected or not!!
  //if(document.getElementById("seluom").value == "seluom")
  //{
  // alert("Select unit of measure !!");
  // document.getElementById("seluom").focus();
  // return false;
  //}

  if(document.getElementById("txtqty").value=="")
  {
   alert("Enter quantity !!");
   document.getElementById("txtqty").focus();
   return false;
  } else {
     if(isNum(document.getElementById("txtqty").value) == false)
     {
      alert("Quantity Should be numbers !!");
      document.getElementById("txtqty").focus();
      return false;
     }    
  }

  if(document.getElementById("txtqtyavbl").value=="")
  {
   alert("Enter quantity Avaiable !!");
   document.getElementById("txtqtyavbl").focus();
   return false;
  } else {
   if(isNum(document.getElementById("txtqtyavbl").value) == false)
   {
     alert("Quantity Available Should be numbers !!");
     document.getElementById("txtqtyavbl").focus();
     return false;
    }
  }

  if(document.getElementById("txtclr").value=="")
  {
   //alert("Enter color !!");
   //document.getElementById("txtclr").focus();
   //return false;
  } else {
   if(isCharComa(document.getElementById("txtclr").value) == false) 
   {
     alert("Color should be characters & Comma only !!");
     document.getElementById("txtclr").focus();
     return false;
   }   
  }

  if(document.getElementById("txtbrnd").value=="")
  {
   //alert("Enter brand !!");
   //document.getElementById("txtbrnd").focus();
   //return false;
  } else {
   if(isCharNumS(document.getElementById("txtbrnd").value) == false) 
   {
     alert("Brand Should be Characters & Numbers only !!");
     document.getElementById("txtbrnd").focus();
     return false;
   }
  }

  if(document.getElementById("tafeatures").value=="")
  {
   alert("Enter features !!");
   document.getElementById("tafeatures").focus();
   return false;
  }
  // validating Product Category is selected or not!!
  if(document.getElementById("selprdcat").value == "selprdcat")
  {
   alert("Select category !!");
   document.getElementById("selprdcat").focus();
   return false;
  }

  if(document.getElementById("selsubcat").value == "selsubcat")
  {
   alert("Select Sub category !!");
   document.getElementById("selsubcat").focus();
   return false;
  }
  //// validating Product Short Description for non empty !!
  //if(document.getElementById("tasrtdcpn").value=="")
  //{
  // alert("Enter short discription !!");
  // document.getElementById("tasrtdcpn").focus();
  // return false;
  //}

  if(document.getElementById("talngdcpn").value=="")
  {
   alert("Enter long discription !!");
   document.getElementById("talngdcpn").focus();
   return false;
  }

  if(document.getElementById("selmode").value == "selmode")
  {
   alert("Select mode of delivery !!");
   document.getElementById("selmode").focus();
   return false;
  }

  if(document.getElementById("txtleadtime").value=="")
  {
   alert("Enter delivery time !!");
   document.getElementById("txtleadtime").focus();
   return false;
  } else {
   if(isNum(document.getElementById("txtleadtime").value) == false)
   {
     alert("Delivery time Should be numbers !!");
     document.getElementById("txtleadtime").focus();
     return false;
    }
  }
  // validating Product specification for non empty!!
  //if(document.getElementById("tasep").value=="")
  //{
  // alert("Enter short discription !!");
  // document.getElementById("tasep").focus();
  // return false;
  //}
  // validating captca for non empty!!
  // if (document.getElementById("txtcaptcha").value == "" )
  // {
  //  alert ( "Please Enter Verification Code !!");
  //  document.getElementById("txtcaptcha").focus();
  //  return false;
  // }
  // getParam(document.frm_prd);
 // if(document.getElementById('divVeriCode').innerHTML=="  ok  ")
 // {
 //   return true;
 // }
 // if(document.getElementById('divVeriCode').innerHTML==" Enter the code as shown in the image ")
 // {
 //   setTimeout('alr()', 1000);
 //   return false;
 // }
}