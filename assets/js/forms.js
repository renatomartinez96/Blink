
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
    if (name.value == '' || last.value == '' || uid.value == '' || email.value == '' || password.value == '' || conf.value == '' || date.value == '') {
 
        alert('Usted debe proporcionar todos los datos solicitados . Por favor, inténtalo de nuevo');
        return false;
    }
 
    // Check the username
 
    re = /^\w+$/; 
    if(!re.test(form.username.value)) { 
        alert("Nombre de usuario debe contener sólo letras, números y guiones bajos. Por favor, inténtalo de nuevo"); 
        form.username.focus();
        return false; 
    }
 
    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 6) {
        alert('Las contraseñas deben tener al menos 6 caracteres de longitud . Por favor, inténtalo de nuevo');
        form.password.focus();
        return false;
    }
 
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        alert('Las contraseñas deben contener al menos un número , una minúscula y una letra mayúscula . Por favor, inténtalo de nuevo');
        return false;
    }
 
    // Check password and confirmation are the same
    if (password.value != conf.value) {
        alert('Su contraseña y la confirmación no coinciden. Por favor, inténtalo de nuevo');
        form.password.focus();
        return false;
    }
    if (date.value.length < 10) {
        alert('La fecha ingresada no es valida');
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