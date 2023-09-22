function validateForm(){
    var validStatus = false;
    var tError = document.getElementById("tError");
    var dError = document.getElementById("dError");
    var cError = document.getElementById("cError");
    var lError = document.getElementById("lError");
    var nerror = document.getElementById("nError");
    var eerror = document.getElementById("eError");
    var aerror = document.getElementById("aError");
  
    //Job Title
    var title = document.getElementById("title").value;
    let title_pattern = /^[a-zA-Z]([a-zA-Z]){2,16}$/;
    if (!title.match(title_pattern)) {
      
      tError.innerHTML = "Please enter a job title";
      tError.style.color = "red";
      var valid_job_title = false;
    } else {
      var valid_job_title = true;
      fError.innerHTML = "";
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
  
    if (
      [
        valid_job_title,
        valid_email,
        valid_phone,
      ].every((value) => {
        return value === true;
      })
    ) {
      validStatus = true;
    }
    return validStatus;
  }