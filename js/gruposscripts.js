
var $grupos_creados = $('#grupos_creados'),
	$buttoncrea = $('#ver_gru_creado'),
	$grupos_invitacion = $('#invitaciones'),
	$buttoninv = $('#ver_invitacion'),
	$grupos = $('#grupos'),
	$buttongru = $('#ver_grupos');


function mostrarCreados()
{
	$grupos_creados.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarInvitaciones()
{
	$grupos_invitacion.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarGrupos()
{
	$grupos.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}



//Eventos
$buttoncrea.click( mostrarCreados);
$buttoninv.click( mostrarInvitaciones)
$buttongru.click( mostrarGrupos);




