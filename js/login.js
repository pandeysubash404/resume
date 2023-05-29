function validateloginForm() {
  var email = document.forms["loginForm"]["loginEmail"].value;
  var password = document.forms["loginForm"]["loginPassword"].value;

  if (email == "") {
    document.getElementById("loginEmailError").innerHTML = "Please enter your email";
    return false;
  }else{
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
      document.getElementById("loginEmailError").innerHTML = "Please enter a valid email address.";
      return false;
    } 
  }

  if (password == "") {
    document.getElementById("loginPasswordError").innerHTML = "Please enter your password";
    return false;
  }
}


function validateregisterForm() {
  var name = document.forms["registerForm"]["registerName"].value;
  var email = document.forms["registerForm"]["registerEmail"].value;
  var password = document.forms["registerForm"]["registerPassword"].value;

  if (name == "") {
    document.getElementById("RegisterNameError").innerHTML = "Please enter your name";
    return false;
  }else if(!/^[ A-Za-z]*$/i.test(name)) {
    document.getElementById("RegisterNameError").innerHTML = "Please string only";
    return false;
     
  }
  if (email == "") {
    document.getElementById("RegisterEmailError").innerHTML = "Please enter your email";
    return false;
  }else{
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
      document.getElementById("RegisterEmailError").innerHTML = "Please enter a valid email address.";
      return false;
    } 
  }

  if (password == "") {
    document.getElementById("RegisterPasswordError").innerHTML = "Please enter your password";
    return false;
  }
  
  
}