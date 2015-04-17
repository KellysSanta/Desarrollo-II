var $form = $('.registro'),
	$form2 = $('.log'),
	$button = $('#mostrar-registro'),
	$fin = $('.finalizar');

function mostrarRegistro()
{
	$form2.slideToggle();
	$form.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function ocultarRegistro()
{
	$form.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	$form2.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}


//Eventos
$button.click( mostrarRegistro );
$fin.click( ocultarRegistro);