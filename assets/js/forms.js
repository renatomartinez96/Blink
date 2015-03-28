
function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
 
    // Finally submit the form. 
    form.submit();
}
 
function regformhash(form, name, last, uid, email, password, conf, date) {
     // Check each field has a value
    if (name.value == '' || last.value == '' || uid.value == '' || email.value == '' || password.value == '' || conf.value == '' || date.value == '') 
    {
        bootbox.dialog({
            title: "<center><h2 class='junction-bold'>Blink</h2></center>",
            message: "<center><h5 class='junction-regular'>You must provide all information requested Please try again</h5></center>",
        });
//        alert("You must provide all information requested Please try again");
        return false;
    }
 
    // Check the username
 
    re = /^\w+$/; 
    if(!re.test(form.username.value)) { 
        bootbox.dialog({
            title: "<center><h2 class='junction-bold'>Blink</h2></center>",
            message: "<center><h5 class='junction-regular'>Username must contain only letters, numbers and underscores. Please try again</h5></center>",
        });
        form.username.focus();
        return false; 
    }
 
    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 6) {
        bootbox.dialog({
            title: "<center><h2 class='junction-bold'>Blink</h2></center>",
            message: "<center><h5 class='junction-regular'>Passwords must be at least 6 characters long. Please try again</h5></center>",
        });
        form.password.focus();
        return false;
    }
 
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        bootbox.dialog({
            title: "<center><h2 class='junction-bold'>Blink</h2></center>",
            message: "<center><h5 class='junction-regular'>Passwords must contain at least one number , one lowercase and uppercase. Please try again</h5></center>",
        });
        return false;
    }
 
    // Check password and confirmation are the same
    if (password.value != conf.value) {
        bootbox.dialog({
            title: "<center><h2 class='junction-bold'>Blink</h2></center>",
            message: "<center><h5 class='junction-regular'>Your password and confirmation do not match. Please try again</h5></center>",
        });
        form.password.focus();
        return false;
    }
    if (date.value.length < 10) {
        bootbox.dialog({
            title: "<center><h2 class='junction-bold'>Blink</h2></center>",
            message: "<center><h5 class='junction-regular'>The date is not valid</h5></center>",
        });
        form.datenac.focus();
        return false;
    }
 
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
    conf.value = "";
 
    // Finally submit the form. 
    form.submit();
    return true;
}