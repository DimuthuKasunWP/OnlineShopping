
  function done(){

  if(document.getElementById("txt_old").value=="")
  {
   alert("Enter old Password !!");
   document.getElementById("txt_old").value = "";
   document.getElementById("txt_old").focus();
   return false;
  }

  if(document.getElementById("txt_password").value=="" || document.getElementById("txt_rpassword").value=="" )
  {
   alert("Enter New Password !!");
   document.getElementById("txt_password").value = "";
   document.getElementById("txt_rpassword").value = "";
   document.getElementById("txt_password").focus();
   return false;
  } else if(isCharNum(document.getElementById("txt_password").value) == false || isCharNum(document.getElementById("txt_rpassword").value) == false) {
    alert("Password Should be Lower case Characters & Numbers only !!");
    document.getElementById("txt_password").value = "";
    document.getElementById("txt_rpassword").value = "";
    document.getElementById("txt_password").focus();
    return false;
  } else if (isUcase(document.getElementById("txt_password").value) == false || isUcase(document.getElementById("txt_rpassword").value) == false) {
    alert("Password Should be Lower Case & Number only !!");
    document.getElementById("txt_password").value = "";
    document.getElementById("txt_rpassword").value = "";
    document.getElementById("txt_password").focus();
    return false;
  } else if (isLen(document.getElementById("txt_password").value) <8 || isLen(document.getElementById("txt_rpassword").value) <8){
    alert("Minimum Length Should be of 8 characters !!");
    document.getElementById("txt_password").value = "";
    document.getElementById("txt_rpassword").value = "";
    document.getElementById("txt_password").focus();
    return false;
    } else if (isSpace(document.getElementById("txt_password").value) == false || isSpace(document.getElementById("txt_rpassword").value) == false){
    alert("Space is not allowed !!");
    document.getElementById("txt_password").value = "";
    document.getElementById("txt_rpassword").value = "";
    document.getElementById("txt_password").focus();
    return false;
    } else {
    if(isEqual(document.getElementById("txt_password").value,document.getElementById("txt_rpassword").value)== false){
     alert("Password not match Re-Enter once again !!");
     document.getElementById("txt_password").value = "";
     document.getElementById("txt_rpassword").value = "";
     document.getElementById("txt_password").focus();
     return false;
    }
  }
  }