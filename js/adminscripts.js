
var $form = $('.agregar'),
	$button = $('#mostrar-agr'),
	$form1 = $('.consultar'),
	$button1 = $('#mostrar-con'),
	$form2 = $('.eliminar'),
	$button2 = $('#mostrar-eli'),

	$form_personal = $('.personal'),
	$form_e_personal = $('#editar_personal'),
	$buttonpers = $('#ver_editar_personal'),
	$buttonCpers = $('.cancelar_personal'),
	
	$form_universidad = $('.universidad'),
	
	$form_universidades = $('#universidades'),
	$button_cancelarUniversidades = $('.cancelar_universidad'),
	$button_universidades = $('#ver_universidades'),
	$form_agregar_universidades = $('#agregar_universidades'),
	$button_agregar_universidades = $('#ver_agregar_universidades'),
	$form_gestionCarrera = $('.profesional'),
	$form_agregarCarrera = $('#agregar_profesionales'),
	$button_agregarCarrera = $('#ver_agregar_profesional'),
	$form_verCarreras = $ ('#profesionales'),
	$button_verCarreras = $('#ver_profesionales'),
	$button_cancelarAgregarCarreras = $('.cancelar_estudio')
	$button_event = $('#mostrar-event')
	$form_reporteevento =$('.reporteEventos')



function mostrarFormulario()
{
	$form.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarConsulta()
{
	$form1.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarEliminar()
{
	$form2.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarEditarPersonal()
{	
	$form_personal.slideToggle();
	$form_e_personal.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function ocultarEditarPersonal()
{	
	$form_personal.slideToggle();
	$form_e_personal.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}


function mostrarUniversidades()
{	
	$form_universidades.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function verAgregarUniversidades()
{	
	$form_agregar_universidades.slideToggle();
	$form_universidad.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function ocultarAgregarUniversidades()
{	
	$form_agregar_universidades.slideToggle();
	$form_universidad.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function agregar_Carrera()
{	
	$form_agregarCarrera.slideToggle();
	$form_gestionCarrera.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function ver_Carreras()
{	
	$form_verCarreras.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function cancelar_AgregarCarrera()
{	
	$form_agregarCarrera.slideToggle();
	$form_gestionCarrera.slideToggle();
	
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarEventos()
{
	$form_reporteevento.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

//Eventos
$button.click( mostrarFormulario );
$button1.click( mostrarConsulta );
$button2.click( mostrarEliminar );
$buttonpers.click( mostrarEditarPersonal);
$buttonCpers.click( ocultarEditarPersonal);
$button_universidades.click( mostrarUniversidades);
$button_agregar_universidades.click(verAgregarUniversidades);
$button_cancelarUniversidades.click(ocultarAgregarUniversidades);
$button_agregarCarrera.click(agregar_Carrera);
$button_verCarreras.click(ver_Carreras);
$button_cancelarAgregarCarreras.click(cancelar_AgregarCarrera);
$button_event.click(mostrarEventos);