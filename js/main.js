$(document).ready(function() {
	$('.menu').css('min-height', $(window).height() + "px");
});
$(window).resize(function() {

});


$(function() {
	$( "#from" ).datepicker();
	$( "#to" ).datepicker();
});

function getForm(type){
	$('#form').load('attendance.php', {"type":type});
}
function getType(type, sub){
	file = "";
	switch (type) {
		case 'hr':
			file = 'Human_Resources/';
			break;
		case 'crm'
			file = 'CRM/';
			break;
		default:
			// statements_def
			break;
	}
	$('#body').load(file, {"type":sub});
}