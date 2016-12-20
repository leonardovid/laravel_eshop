

//crea una request de ajax con un callback
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function (){
      //cuando el estado cambia a 4, agrega los elementos al div
    if(xhr.readyState === 4){
         
        $('#ajax').append(xhr.responseText);                          
    }
};
//envia la request
function sendAJAX(){
  xhr.send();
}



var jOverlay = $('<div id="overlay"></div>')
var jDiv =$('<div id="ajax" class="row contenedor-galeria "></div>');

//añade elementos al overlay
jOverlay.append(jDiv);



function closePopup() {
	jOverlay.hide();	
	$('#ajax').empty();

	
}


//añade un el overlay
$("body").append(jOverlay);

//previene el cambio de pagina al hacerle click a una imagen de la galeria y muestra la imagen del link seleccionado
$(".galeriaLink").click(function (event){

	event.preventDefault();

	var productoid = $(this).attr('id');
	xhr.open('GET' , '/AjaxProducto/'+productoid);

	sendAJAX();

	jOverlay.show();
	});


//activa animaciones del plugin animsition   
$(".animsition").animsition({
inClass: 'fade-in-up',
outClass: 'fade-out'
});

//oculta mensaje de confirmacion de la compra
$("#crealizada").delay(5000).slideUp(700);





