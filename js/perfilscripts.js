
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
	$form_profesional = $('.profesional'),
	$form_a_profesional = $('#agregar_profesionales'),
	$buttonAprofesional = $('#ver_agregar_profesional'),
	$buttonCprofesional = $('.cancelar_estudio'),
	$form_profesionales = $('#profesionales'),
	$button_profesionales = $('#ver_profesionales'),

	$form_actividad = $('.barra_actividad'),
	$form_ag_actividad = $('#agregar_actividad'),
	$button_ag_actividad = $('#ver_agregar_actividad'),
	$button_ca_actividad = $('#cancelar_agregar'), 
	$form_co_actividad = $('#consultar_actividad'),
	$button_co_actividad = $('#ver_consultar_actividad'),
	$button_cac_actividad = $('#cancelar_consultar'),

	$form_eliminar_perfil = $('.elimina_perfil'),
	$button_eliminar_perfil = $('.eliminar_p'),

	$form_cambia_contrasena = $('.cambia_contrasena'),
	$button_cambia_contrasena = $('.cambia_cont');



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
	 /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
	return false;
}

function ocultarEditarPersonal()
{	
	$form_personal.slideToggle();
	$form_e_personal.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarAgregarProfesional()
{	
	$form_profesional.slideToggle();
	$form_a_profesional.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function ocultarAgregarProfesional()
{	
	$form_profesional.slideToggle();
	$form_a_profesional.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarProfesionales()
{	
	$form_profesionales.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarActividad()
{	
	$form_actividad.slideToggle();
	$form_ag_actividad.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function ocultarActividad()
{	
	$form_actividad.slideToggle();
	$form_ag_actividad.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarConsultarAc()
{	
	$form_actividad.slideToggle();
	$form_co_actividad.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function ocultarConsultarAc()
{	
	$form_actividad.slideToggle();
	$form_co_actividad.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function MostrarEliminarPerfil()
{	
	$form_eliminar_perfil.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function MostrarCambiarcontrasena()
{	
	$form_cambia_contrasena.slideToggle();
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}



//Eventos
$button.click( mostrarFormulario );
$button1.click( mostrarConsulta );
$button2.click( mostrarEliminar );
$buttonpers.click( mostrarEditarPersonal);
$buttonCpers.click( ocultarEditarPersonal);
$buttonAprofesional.click( mostrarAgregarProfesional);
$buttonCprofesional.click(ocultarAgregarProfesional);
$button_profesionales.click( mostrarProfesionales );
$button_ag_actividad.click( mostrarActividad);
$button_ca_actividad.click( ocultarActividad);
$button_co_actividad.click( mostrarConsultarAc);
$button_cac_actividad.click( ocultarConsultarAc); 
$button_eliminar_perfil.click(MostrarEliminarPerfil);
$button_cambia_contrasena.click(MostrarCambiarcontrasena);