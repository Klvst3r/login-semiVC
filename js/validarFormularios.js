
function validarEmail(email){
    
    var formato = /^[a-zA-Z]+([\.]?[a-zA-Z0-9_-]+)*@[a-z0-9]+([\.-]+[a-z0-9]+)*\.[a-z]{2,4}$/;
    email = email.replace(/\+/g, '\+');
    
    mostrarValidacion('#email',formato.test(email));
}

function validarNombreUsuario(nombreUsuario){

    var formato = /^[a-zA-Z0-9_-]{4,15}$/;
    nombreUsuario = nombreUsuario.replace(/\+/g, '\+');
    
    mostrarValidacion('#usuario',formato.test(nombreUsuario));
}

function validarNombre(nombre){

    var formato = /^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{3,15}$/;
    nombre = nombre.replace(/\+/g, '\+');
    
    mostrarValidacion('#nombre',formato.test(nombre)|| nombre=='');
}

function validarApellidos(apellidos){

    var formato = /^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/;
    apellidos = apellidos.replace(/\+/g, '\+');
    
    mostrarValidacion('#apellidos',formato.test(apellidos) || apellidos=='');
}

function validarEdad(edad){

    var formato = /^[0-9]{1,3}$/;
    edad = edad.replace(/\+/g, '\+');
    
    mostrarValidacion('#edad',formato.test(edad)&& edad<=150 && edad>=5);
}

function validarTelefono(telefono){

    var formato = /^[0-9]{9}$/;
    telefono = telefono.replace(/\+/g, '\+');
    
    mostrarValidacion('#telefono',formato.test(telefono));
}

function validarPassword(pass){
    pass = pass.replace(/\+/g, '\+');
    
    mostrarValidacion('#password',pass.length>=4);
}

function validarPasswordIguales(password,passwordRepetida){
    password = password.replace(/\+/g, '\+');
    passwordRepetida = passwordRepetida.replace(/\+/g, '\+');
    
    mostrarValidacion('#password2',password.length>=4 && password==passwordRepetida);
}

/**
 * Cambia el estilo del input para indicar si es valido o no
 * 
 * @param nombreCampo Nombre del campo
 * @param valido boolean
 */
function mostrarValidacion(nombreCampo,valido){
    if (valido){
        $(document).ready(function(){
            $(nombreCampo).css('border','1px solid #7ca22c');
            $(nombreCampo).css('box-shadow','0 0 2px 1px #7ca22c');
        });
    }
    else{
        $(document).ready(function(){
            $(nombreCampo).css('border','1px solid red');
            $(nombreCampo).css('box-shadow','0 0 2px 1px red');
        }); 
    }
}