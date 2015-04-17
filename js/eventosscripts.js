
var $eventos_creados = $('#eventos_creados'),
	$buttoncrea = $('#ver_eve_creado'),
	$eventos_invita = $('#invitaciones'),
	$buttoninv = $('#ver_invitacion');


function mostrarCreados()
{
	$eventos_creados.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarInvitacion()
{
	$eventos_invita.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}



//Eventos
$buttoncrea.click( mostrarCreados);
$buttoninv.click( mostrarInvitacion);



