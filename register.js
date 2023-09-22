function validateForm(){
  var validStatus = false;
  var fError = document.getElementById("fError");
  var lError = document.getElementById("lError");
  var nError = document.getElementById("nError");
  var eError = document.getElementById("eError");
  var pError = document.getElementById("pError");
  var cfError = document.getElementById("cfError");
  var rError = document.getElementById("rError");

  //First Name
  var fname = document.getElementById("fname").value;
  let fname_pattern = /^[a-zA-Z]([a-zA-Z]){2,16}$/;
  if (!fname.match(fname_pattern)) {
    
    fError.innerHTML = "Please enter a valid name";
    fError.style.color = "red";
    var valid_first_name = false;
  } else {
    var valid_first_name = true;
    fError.innerHTML = "";
  }

  //LAST NAME
  var lname = document.getElementById("lname").value;
  let lname_pattern = /^[a-zA-Z]([a-zA-Z]){2,16}$/;
  if (!lname.match(lname_pattern)) {
    
    lError.innerHTML = "Please enter a valid name";
    lError.style.color = "red";
    var valid_last_name = false;
  } else {
    var valid_last_name = true;
    lError.innerHTML = "";
  }

  //    Email
    var email = document.getElementById("email").value;
    let email_pattern =  /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,20}$/;
    if (!email.match(email_pattern)) {
      
      eError.innerHTML = "Please enter a valid email";
      eError.style.color = "red";
      var valid_email = false;
    } else {
      var valid_email = true;
      eError.innerHTML = "";
    }
  
  //    NUMBER
  var number = document.getElementById("number").value;
  let number_pattern = /^([0-9]){10}$/;
  if (!number.match(number_pattern)) {
    
    nError.innerHTML = "Please enter a valid number";
    nError.style.color = "red";
    var valid_phone = false;
  } else {
    var valid_phone = true;
    nError.innerHTML = "";
  }

  //password
  let password = document.getElementById("password").value;
  let cpassword = document.getElementById("cpassword").value;

  if (password.length >= 6 && password.length <= 30) {
    if (password != cpassword) {
      var valid_password = false;
      pError.innerHTML = "Password is not same";
      pError.style.color = "red";

    } else {
      var valid_password = true;
      pError.innerHTML = " ";
    }
  } else{
    var valid_password = false;
    pError.innerHTML = "Password is not valid";
    pError.style.color = "red";
  }
  //validate gender
  let option = document.getElementsByClassName('rad-input');
  if (!(option[0].checked || option[1].checked || option[2].checked)) {
    var valid_gender = false;
    rError.innerHTML = "Please check one";
    rError.style.color = "red";
  } else {
    var valid_gender = true;
    rError.innerHTML = "";
  }

  
  if (
    [
      valid_first_name,
      valid_last_name,
      valid_email,
      valid_phone,
      valid_password,
      valid_gender,
    ].every((value) => {
      return value === true;
    })
  ) {
    validStatus = true;
  }
  return validStatus;
}