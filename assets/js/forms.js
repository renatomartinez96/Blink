
function formhash(form, password) {
    var p = document.createElement("input");
 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
    password.value = "";
    form.submit();
}
 
function regformhash(form, name, last, uid, email, password, conf, date, lang, tipo) {
    if (name.value == '' || last.value == '' || uid.value == '' || email.value == '' || password.value == '' || conf.value == '' || date.value == '', lang.value == '', tipo.value == '') 
    {
        bootbox.alert({
            title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
            message: "<center><h5 class='junction-regular'>You must provide all information requested Please try again <br> Usted debe proporcionar toda la información solicitada por favor intente de nuevo</h5></center>",
        });
        return false;
    }
 
 
    re = /^\w+$/; 
    if(!re.test(form.username.value)) { 
        bootbox.alert({
            title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
            message: "<center><h5 class='junction-regular'>Username must contain only letters, numbers and underscores. Please try again <br> Nombre de usuario debe contener sólo letras, números y guiones bajos. Por favor, inténtalo de nuevo</h5></center>",
        });
        form.username.focus();
        return false; 
    }
 
    if (password.value.length < 6) {
        bootbox.alert({
            title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
            message: "<center><h5 class='junction-regular'>Passwords must be at least 6 characters long. Please try again <br> Las contraseñas deben tener al menos 6 caracteres de longitud. Por favor, inténtalo de nuevo</h5></center>",
        });
        form.password.focus();
        return false;
    }
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        bootbox.dialog({
            title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
            message: "<center><h5 class='junction-regular'>Passwords must contain at least one number , one lowercase and uppercase. Please try again <br> Las contraseñas deben contener al menos un número, una minúscula y mayúscula. Por favor, inténtalo de nuevo</h5></center>",
        });
        return false;
    }
 
    if (password.value != conf.value) {
        bootbox.alert({
            title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
            message: "<center><h5 class='junction-regular'>Your password and confirmation do not match. Please try again <br> La contraseña y la confirmación no coinciden. Por favor, inténtalo de nuevo</h5></center>",
        });
        form.password.focus();
        return false;
    }
    if (date.value.length < 10) {
        bootbox.alert({
            title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
            message: "<center><h5 class='junction-regular'>The date is not valid <br> La fecha no es válida</h5></center>",
        });
        form.datenac.focus();
        return false;
    }
 
    var p = document.createElement("input");
 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    password.value = "";
    conf.value = "";
 

    form.submit();
    return true;
}
function chgpassform(form,user,password,rpassword){
    if (password.value == '' || rpassword.value == '' || user.value == '') 
    {
        bootbox.alert({
            title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
            message: "<center><h5 class='junction-regular'>You must provide all information requested Please try again <br> Usted debe proporcionar toda la información solicitada por favor intente de nuevo</h5></center>",
        });
        return false;
    }
    if (password.value.length < 6) {
        bootbox.alert({
            title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
            message: "<center><h5 class='junction-regular'>Passwords must be at least 6 characters long. Please try again <br> Las contraseñas deben tener al menos 6 caracteres de longitud. Por favor, inténtalo de nuevo</h5></center>",
        });
        form.password.focus();
        return false;
    }
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        bootbox.alert({
            title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
            message: "<center><h5 class='junction-regular'>Passwords must contain at least one number , one lowercase and uppercase. Please try again <br> Las contraseñas deben contener al menos un número, una minúscula y mayúscula. Por favor, inténtalo de nuevo</h5></center>",
        });
        return false;
    }
 
    if (password.value != rpassword.value) {
        bootbox.alert({
            title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
            message: "<center><h5 class='junction-regular'>Your password and confirmation do not match. Please try again <br> La contraseña y la confirmación no coinciden. Por favor, inténtalo de nuevo</h5></center>",
        });
        form.password.focus();
        return false;
    }
     var p = document.createElement("input");
 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
    
    password.value = "";
    rpassword.value = ""; 
    form.submit();
    return true;

}