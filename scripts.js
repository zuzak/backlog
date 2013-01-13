$(document).ready(function() {
	$("#played").click(function() {
		$('#gamesbox').isotope({filter: '.played' });
	});

	$('#unplayed').click(function() {
		$('#gamesbox').isotope({filter: '.unplayed' });
	});
	$('#all').click(function() {
		$('#gamesbox').isotope({filter: '*' });
	});
	$('.playlink').click(function() {
		$(this).animate({opacity:0},250,"linear",function(){
			$(this).animate({opacity:1},1000);
		});
	});
	$(function(){
		$('#gamesbox').isotope({
			itemSelector : '.game',
			animationEngine : 'jquery'
		});
	});
});
