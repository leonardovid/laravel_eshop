//esconde las pistas
$("span").hide();
var jPassword =$("#password");
var jField= $(".field");
var jConfirmation=$("#password_confirmation");
var jEmail =$("#email");
var jButton = $("#button")


function passwordIsValid(){
	return $(jPassword).val().length > 7
}

function passwordEvent() {
	//oculta la pista si el tamaño es correcto y si no es asi la muestra
	if( passwordIsValid()){
		$(jPassword).next().hide();
	}
	else $(jPassword).next().show();
}

function fieldsAreValid(){
	var valid=true;
	jField.each(function() {
		if ($(this).next().css('display')=="block") {
			valid=false;
		};
	});
	return valid;
}

function fieldEvent(){
	if( $(this).val().length > 1){
		$(this).next().hide();
	}
	else $(this).next().show();
}

function passwordMatch(){
	var password= $("#password").val();
	var confirmation = $("#password_confirmation").val();
	return password == confirmation;
}

function confirmationEvent(){
	if(passwordMatch()) {
		$(jConfirmation).next().hide();
	}
	else $(jConfirmation).next().show();
}

function emailIsValid(){
	var email = jEmail.val();
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email)
}
function emailEvent(){
	if (emailIsValid()) {
		$(jEmail).next().hide();
	}
	else $(jEmail).next().show();
}

function checkErrors(){

return fieldsAreValid() && emailIsValid() && passwordIsValid() && passwordMatch();
}


function enableButton(){
	
	jButton.prop('disabled', !checkErrors());
}

//verificar password cuando el evento focus y keyup ocurren
jPassword.focus(passwordEvent)
		.keyup(passwordEvent)
		.focus(confirmationEvent)
		.keyup(confirmationEvent)
		.keyup(enableButton);

jField.focus(fieldEvent)
		.keyup(fieldEvent)
		.keyup(enableButton);

jConfirmation.focus(confirmationEvent)
			.keyup(confirmationEvent)
			.keyup(enableButton);

jEmail.focus(emailEvent)
		.keyup(emailEvent)
		.keyup(enableButton);

enableButton();