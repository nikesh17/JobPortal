function validation(){
    var username = document.getElementById('username').ariaValueMax;

    if(username ==""){
        document.getElementById('username').innerHTML="Please enter a username";
        return false;
    }
}