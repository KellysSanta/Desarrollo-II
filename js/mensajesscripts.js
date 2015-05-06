
var $posp = $('#mensajes_pospuestos'),
	$buttonposp = $('#ver_pospuestos'),
	$ocul = $('#mensajes_ocultos'),
	$buttonocul = $('#ver_ocultos'),
	$cons = $('#mensajes_consultar'),
	$buttoncons = $('#ver_consultar'),
	$posp_eve = $('#eventos_pospuestos'),
	$buttonposp_eve = $('#ver_eve_pospuestos'),
	$ocul_eve = $('#eventos_ocultos'),
	$buttonocul_eve = $('#ver_eve_ocultos'),
	$cons_eve = $('#eventos_consultar'),
	$buttoncons_eve = $('#ver_eve_consultar'),
	$posp_gru = $('#grupos_pospuestos'),
	$buttonposp_gru = $('#ver_gru_pospuestos'),
	$ocul_gru = $('#grupos_ocultos'),
	$buttonocul_gru = $('#ver_gru_ocultos'),
	$cons_gru = $('#grupos_consultar'),
	$buttoncons_gru = $('#ver_gru_consultar');


function mostrarPospuestos()
{
	$posp.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarOcultos()
{
	$ocul.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarConsultar()
{
	$cons.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarPospuestos_eve()
{
	$posp_eve.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarOcultos_eve()
{
	$ocul_eve.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarConsultar_eve()
{
	$cons_eve.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarPospuestos_gru()
{
	$posp_gru.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarOcultos_gru()
{
	$ocul_gru.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}

function mostrarConsultar_gru()
{
	$cons_gru.slideToggle();/*Si esta oculto lo muestra, si esta visible lo oculta*/
	return false; /*Quita el efecto que tiene por defecto la etiqueta a, ya que esta va a una url*/
}


//Eventos
$buttonposp.click( mostrarPospuestos );
$buttonocul.click( mostrarOcultos );
$buttoncons.click( mostrarConsultar );
$buttonposp_eve.click( mostrarPospuestos_eve );
$buttonocul_eve.click( mostrarOcultos_eve );
$buttoncons_eve.click( mostrarConsultar_eve );
$buttonposp_gru.click( mostrarPospuestos_gru );
$buttonocul_gru.click( mostrarOcultos_gru );
$buttoncons_gru.click( mostrarConsultar_gru );


