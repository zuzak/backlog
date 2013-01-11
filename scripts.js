$(document).ready(function() {
	$('#played').click(function() {
		$('.played').show();
		$('.unplayed').hide();
	});
	$('#unplayed').click(function() {
		$('.played').hide();
		$('.unplayed').show();
	});
	$('#all').click(function() {
		$('.played').show();
		$('.unplayed').show();
	});
});
