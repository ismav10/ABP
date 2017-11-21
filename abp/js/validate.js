
function nif(dni) {
    var numero
    var letr
    var letra
    var expresion_regular_dni

    expresion_regular_dni = /^\d{8}[a-zA-Z]$/;

    if (expresion_regular_dni.test(dni) == true) {
        numero = dni.substr(0, dni.length - 1);
        letr = dni.substr(dni.length - 1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero + 1);
        if (letra != letr.toUpperCase()) {
            alert('DNI erróneo, la letra del NIF no se corresponde');
            return false;
        } else {

            return true;
        }
    } else {
        alert('DNI erroneo, formato no válido');
        return false;
    }
}
function validaCCC(val) {
    var banco = val.substring(0, 4);
    var sucursal = val.substring(4, 8);
    var dc = val.substring(8, 10);
    var cuenta = val.substring(10, 20);
    var CCC = banco + sucursal + dc + cuenta;
    if (!/^[0-9]{20}$/.test(banco + sucursal + dc + cuenta)) {
        return false;
    } else
    {
        valores = new Array(1, 2, 4, 8, 5, 10, 9, 7, 3, 6);
        control = 0;
        for (i = 0; i <= 9; i++)
            control += parseInt(cuenta.charAt(i)) * valores[i];
        control = 11 - (control % 11);
        if (control == 11)
            control = 0;
        else if (control == 10)
            control = 1;
        if (control != parseInt(dc.charAt(1))) {
            return false;
        }
        control = 0;
        var zbs = "00" + banco + sucursal;
        for (i = 0; i <= 9; i++)
            control += parseInt(zbs.charAt(i)) * valores[i];
        control = 11 - (control % 11);
        if (control == 11)
            control = 0;
        else if (control == 10)
            control = 1;
        if (control != parseInt(dc.charAt(0))) {
            return false;
        }
        return true;
    }
}
function validarEmail(email) {
    expr = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (!expr.test(email)) {
        return false;
    } else {
        return true;
    }
}

function validarFechaMenorActual(date) {
    var x = new Date();
    var fecha = date.split("-");

    x.setFullYear(fecha[0], fecha[1] - 1, fecha[2]);
    alert(X);
    var today = new Date();

    if (x >= today)
        return false;
    else
        return true;
}


//Nombramos la función
function valida_envia_USUARIO() {
    if (document.form.userName.value.length == 0) {
        alert("Introduzca un valor para el usuario");
        document.form.userName.focus();
        return false;
    }
    if (document.form.userName.value.length < 2) {
        alert("Nombre de usuario demasiado corto (mínimo 2 caracteres)");
        document.form.userName.focus();
        return false;
    }
    if (document.form.userName.value.length > 25) {
        alert("Nombre de usuario demasiado largo (máximo 25 caracteres)");
        document.form.userName.focus();
        return false;
    }

    if (document.form.password.value.length == 0) {
        alert("Introduzca un valor para la contraseña");
        document.form.password.focus();
        return false;
    }

    if (document.form.password.value.length < 2) {
        alert("Contraseña demasiado corta (mínimo 2 caracteres)");
        document.form.password.focus();
        return false;
    }

    if (document.form.password.value.length > 32) {
        alert("Contraseña demasiado larga (máximo 32 caracteres)");
        document.form.password.focus();
        return false;
    }

//Validamos un campo o área de texto, por ejemplo el campo nombre
    if (document.form.nombre.value.length == 0) {
        alert("Introduzca un valor para el nombre");
        document.form.nombre.focus();
        return false;
    }
    if (document.form.nombre.value.length < 2) {
        alert("Nombre demasiado corto (mínimo 2 caracteres)");
        document.form.nombre.focus();
        return false;
    }
    if (document.form.nombre.value.length > 25) {
        alert("Nombre demasiado largo (máximo 25 caracteres)");
        document.form.nombre.focus();
        return false;
    }


    if (document.form.apellidos.value.length == 0) {
        alert("Introduzca un valor para el apellido");
        document.form.apellidos.focus();
        return false;
    }
    if (document.form.apellidos.value.length < 2) {
        alert("Apellido demasiado corto (mínimo 2 caracteres)");
        document.form.apellidos.focus();
        return false;
    }
    if (document.form.apellidos.value.length > 50) {
        alert("Apellido demasiado largo (máximo 50 caracteres)");
        document.form.apellidos.focus();
        return false;
    }



    if (!nif(document.form.dni.value)) {
        document.form.dni.focus();
        return false;
    }

    if (document.form.fechNac.value == false) {
        alert("Introduzca un valor  para la fecha de nacimiento");
        document.form.fechaNac.focus();
        return false;
    }
    if (!validarFechaMenorActual(document.form.fechaNac.value)) {
        alert("¿Viene del futuro?");
        document.form.fechaNac.focus();
        return false;
    }
    if (((document.form.email.value.length == 0) || !validarEmail(document.form.email.value))) {
        alert("Introduzca una dirección de email válida");
        document.form.email.focus();
        return false;
    }
    valor = document.form.telefono.value;
    if (!(/^\d{9}$/.test(valor))) {
        alert("Tiene que escribir un teléfono de 9 dígitos");
        document.form.telefono.focus();
        return false;
    }

    if (document.form.cuentaBanc.value.length == 0 || !validaCCC(document.form.cuentaBanc.value)) {
        alert("Introduzca un valor correcto para el numero de CCC(sin espacios)");
        document.form.cuentaBanc.focus();
        return false;
    }


    if (document.form.direccion.value.length == 0) {
        alert("Introduzca dirección");
        document.form.direccion.focus();
        return false;
    }


    return true;

}
