$(document).on('ready', funPrincipal);

function funPrincipal(){
	$('#ver_gru_creado').click(seeAllGrupsCreates);
	$('#editar_grupo').on('click',editGroup);
	$('#btnCreate').on('click', createGroup);

}

function seeAllGrupsCreates(){
	var user = $('#user').val();
	
	$.get("querygrupos.php?functions=seeAllGroups&user="+user, function(data) {
		
		
		$('#cadaGrupo').html(data);

	});	
}

function editGroup(){
	var user = $('#user').val();
	var nombreGrupo = $('#nombreGrupo').val();
	var nombreeditGrupo = $ ('#nombreeditGrupo'+nombreGrupo).val();
	var descripcion = $('#descripGrup'+nombreGrupo).val();
	



	$.get("querygrupos.php?functions=editGroup&user="+user+"&nombreGrupo="+nombreGrupo+"&descripcion="+descripcion+"&nombreeditGrupo="+nombreeditGrupo, function(data) {
		
		
		alert(data);

	});	
}

function createGroup(){
	var user = $('#user').val();
	var nombreGrupo = $('#nomGroupCreate').val(); 
	var descripcion = $('#descripGroupCreate').val();
	
	$.get("querygrupos.php?functions=createGroup&user="+user+"&nombreGrupo="+nombreGrupo+"&descripcion="+descripcion, function(data) {
		alert(data);			
	});
	nombreGrupo.val('');
	descripcion.val('');


}