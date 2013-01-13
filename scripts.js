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
	$('.playlink').click(function() {
		$(this).animate({opacity:0},250,"linear",function(){
			$(this).animate({opacity:1},1000);
		});
	});
});
