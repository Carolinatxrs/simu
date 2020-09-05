/*deixar input oculto*/
$(document).ready(function() {
	$('#inputOculto').hide();
	$('#mySelect').change(function() {
		if ($('#mySelect').val() == 'Enade') {
			$('#inputOculto').show();
		} else {
			$('#inputOculto').hide();
		}
	});
});