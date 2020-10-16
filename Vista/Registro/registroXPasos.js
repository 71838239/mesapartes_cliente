$(function(){
	// detectar que botón se esta accionando
	$('body').on('click','#cont_formularios a',function(elemento){
		elemento.preventDefault();

		mostrar = $(this).attr('id');
		
		// Seleccionar la sección a mostrar
		if(mostrar == 'back_paso_a'){
			$('#form_paso_b').hide();
			$('#form_paso_a').show();
		}
		else if (mostrar == 'go_paso_b') {
			$('#form_paso_a').hide();
			$('#form_paso_b').show();
		}
	});

	// Formulario datos personales
	$('#form_a').validate({
		submitHandler: function(){

		$('#form_paso_a').hide();
		$('#form_paso_b').show();

		return false;
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent().append());
		}
	});
});
//Desactivar entrada de valores numericos usando ASCII
function valideKey(evt) {
	var code = evt.which ? evt.which : evt.keyCode;
	if (code == 8) {
		//backspace
		return true;
	} else if (code >= 48 && code <= 57) {
		//is a number
		return true;
	} else {
		return false;
	}
}/*
function validar() {
	//obteniendo el valor que se puso en el campo text del formulario
	var txtDni = document.getElementById("#dni").value;
	var txtTelefono = document.getElementById("#telefono").value;
	var txtEmail = document.getElementById("#email").value;
	//la condición
	if ((txtDni.length > 8 || txtDni.length == 0 || /^\s+$/.test(txtDni))) {
		alert('Deberias escribir un número de DNI valido!!');
		return false;
	}elif(txtTelefono.length > 9 || txtTelefono.length == 0 || /^\s+$/.test(txtTelefono)){
		alert('Deberias escribir un número de celular correcto!!');
		return false;
	}
   
	return true;
}*/