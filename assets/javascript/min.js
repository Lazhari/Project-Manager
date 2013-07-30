jQuery(function($){

	$start = $('#start').datepicker({
		dateFormat: 'yy-mm-dd',
		minDate:0
	});
	$('#end').datepicker({
		dateFormat: 'yy-mm-dd',
		minDate :$start +1

	});
});