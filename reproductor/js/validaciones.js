/*Creación de variables globales con los posibles inputs que se repetirán a lo largo de la navegación 
del sitio*/
var correo= document.getElementById("correo");
var nombre= document.getElementById("nombre");
var apellido= document.getElementById("apellido");
var edad= document.getElementById("edad");
var pass= document.getElementById("password");
var textarea = document.getElementById("textarea");
var asunto = document.getElementById("asunto");

//valida el formulario de registro
function validacionRegistro() {
	validarNombre();
	validarCorreo();
  	validarApellido();
  	validarPassword();
  return true;
}
//valida el formulario de logeo en caso de que fallaran las exp reg del html
function validarLogeo(){
validarCorreo();
  
  validarPassword();
  return true;
}
//valida el formulario de contacto para ayuda/soporte técnico
 function validarContacto(){
 	validarNombre();
	validarCorreo();
  validarCampo();
  	validarTextArea();
  	return true;
 }


				//VALIDACION DE CAMPOS DE MANERA INDIVIDUAL
//valida los inputs que requieren formato de correo en cualquier parte que se invoque el metodo
function validarCorreo(){

if (/\S/.test(correo)) {
    // Si no se cumple la condicion...
    alert('[ERROR] El campo correo debe tener un valor dentro');
    return false;
  }

  else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(correo)){
   alert("La dirección de email " + correo + " es correcta.");
  } 
  else {
   alert("La dirección de email es incorrecta.");
  }
  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  return true;

}


//no permite campo vacio, requiere solo letras, 
//el campo valida nombre en cualquier parte que se invoque el metodo
function validarNombre(){
  if (/\S/.test(nombre)) {
    // Si no se cumple la condicion...
    alert('[ERROR] El campo nombre debe tener un valor dentro');
    return false;
  }

  else if (/^[a-zA-ZÑñóíúáéÁÉÍÓÚ]$/.test(nombre)){
   alert("El nombre " + nombre+ "  es correcto.");
  } 
  else {
   alert("el nombre es incorrecto.");
  }
// los siguientes If evaluan el campo apellido

  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  return true;
}

//no permite campo vacio, requiere solo letras, el campo 
//valida apellido en cualquier parte que se invoque el metodo
function validarApellido(){
	  if (/\S/.test(apellido)) {
    // Si no se cumple la condicion...
    alert('[ERROR] El campo apellido debe tener un valor dentro');
    return false;
  }

  else if (/^[a-zA-ZÑñóíúáéÁÉÍÓÚ]$/.test(apellido)){
   alert("El nombre " + apellido+ "  es correcto.");
  } 
  else {
   alert("el apellido es incorrecto.");
  }
  return true;
}


//no permite dejar campo vacio validando el password donde se invoque el metodo
function validarPassword(){

if (/\S/.test(pass)) {
    // Si no se cumple la condicion...
    alert("[ERROR] El campo password debe tener un valor dentro");
    return false;
  }
}
//valida el asunto del formulario

function validarCampo(){
  var cont =0;
  if (/\S/.test(asunto)) {
    // Si no se cumple la condicion...
    alert("[ERROR] El campo asunto debe tener un valor dentro");
    cont++;
    return false;


    
  }

}

function validarTextArea(){
  var cont =0;
	if (/\S/.test(pass)) {
    // Si no se cumple la condicion...
    alert("[ERROR] El campo descripcion debe tener un valor dentro");
    cont++;
    if(cont !=0){

      return false;
    }


    
  }

}