$(function() {

	// getDatabase();

	$("input,select,textarea").autosave({
		url : "libs/autosave/autosave_work.php",
		method : "post",
		grouped : true,
		success : function(data) {
			$("#message p").html("ÁCambios guardados con Žxito!").show();
			setTimeout('fadeMessage()', 1500);
			// getDatabase();
		},
		send : function() {
			$("#message p").html("Enviando cambios...");
		},
		dataType : "html"
	});

	$('.edit').live('click', function() {
		// editItem = $(this);
		// console.log(editItem.parent());
		var id = $(this).attr('rel');
		$.post('?page=FillInTheBlank.php', {
			'id_edit' : id
		}, function(o) {
			console.log(o);
		});

		return false;
	});

});

/*
 * function getDatabase(){ $.get('autosave3.php', function(data) {
 * $('#database').html(data); }); }
 */

function fadeMessage() {
	$('#message p').fadeOut('slow');
}