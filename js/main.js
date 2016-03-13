$(document).ready(function() {
	menuHeight();

	$('#category').click(function(event) {
		combo();
	});


	
});
$(window).resize(function() {

});

function radioCheck () {
	$('input[type="radio"]').click(function(){
		if($(this).attr("value")=="sector"){
			$("#sectortype").show();
		}
		if($(this).attr("value")=="general"){
			$("#sectortype").hide();
		}
		if($(this).attr("value")=="individual"){
			$("#empname").show();
		}
		if($(this).attr("value")=="company"){
			$("#empname").hide();
		}
	});
}

function getForm(type, sub){
	file = "";
	switch (type) {
		case 'attendance':
			file = "Human_Resources/Attendance/";
			break;
		case 'interview':
			file = "Human_Resources/Interviews/";
			break;
		case 'appraisal':
			file = "Human_Resources/Appraisal/";
			break;
		case 'suggest':
			file = "Human_Resources/Suggestions/";
			break;
		case 'clist':
			file = "CRM/Clist/";
			break;
		case 'flist':
			file = "CRM/Flist/";
			break;
		case 'onproject':
			file = "Project_Management/On_Project/";
			break;
		case 'meetings':
			file = "Project_Management/Meetings/";
			break;
		case 'timetracker':
			file = "Project_Management/Time_Tracker/";
			break;
		case 'reimbursements':
			file = "Project_Management/Reimbursements/";
			break;
		default:
			// statements_def
			break;
	}
	$('#form').load(file, {"type":sub}, function(){
		$( "#from" ).datepicker();
		$( "#to" ).datepicker();
		$( "#start" ).datepicker();
		$( "#end" ).datepicker();
		$( "#pstart" ).datepicker();
		$( "#pend" ).datepicker();
		$( "#calendardate" ).datepicker();
		$( "#periodfrom" ).datepicker();
		$( "#periodto" ).datepicker();
		$( "#date" ).datepicker();
	});
}
function getType(type, sub){
	file = "";
	switch (type) {
		case 'hr':
			file = 'Human_Resources/';
			break;
		case 'crm':
			file = 'CRM/';
			break;
		case 'project':
			file = 'Project_Management/';
			break;
		case 'empreg':
			file = 'Employee_Registration/';
			break;
		default:
			// statements_def
			break;
	}
	$('#body').load(file, {"type":sub}, function(){
		$( "#from" ).datepicker();
		$( "#to" ).datepicker();
		$( "#start" ).datepicker();
		$( "#end" ).datepicker();
		$( "#pstart" ).datepicker();
		$( "#pend" ).datepicker();
		$( "#calendardate" ).datepicker();
		$( "#periodfrom" ).datepicker();
		$( "#periodto" ).datepicker();
		$( "#date" ).datepicker();
	});
}

function menuHeight () {
	if ($('.mainwrapper').height() > $(window).height()) {
		$('.menu').css('min-height', $('.mainwrapper').height() + "px");
	}
	else{
		$('.menu').css('min-height', $(window).height() + "px");
	}
}
function combo () {
	 var ctype = $('#category').val();
	 		switch (ctype) {
	 			case 'owner':
	 				$('#posttype')
	 					.find('option')
	 					.remove();
	 				$('#posttype').append($('<option>', {
	 					value: 'prop',
	 					text: 'PROPREITER'
	 				}));
	 				break;
	 			case 'hr':
	 				$('#posttype')
	 					.find('option')
	 					.remove();
	 				$('#posttype').append($('<option>', {
	 					value: 'hrman',
	 					text: 'HR MANAGER'
	 				}));
	 				$('#posttype').append($('<option>', {
	 					value: 'hrexec',
	 					text: 'HR EXECUTIVE'
	 				}));
	 				break;
	 			case 'acc':
	 				$('#posttype')
	 					.find('option')
	 					.remove();
	 				$('#posttype').append($('<option>', {
	 					value: 'accman',
	 					text: 'ACCOUNTS MANAGER'
	 				}));
	 				$('#posttype').append($('<option>', {
	 					value: 'accexec',
	 					text: 'ACCOUNTS EXECUTIVE'
	 				}));
	 				break;
	 			case 'emp':
	 				$('#posttype')
	 					.find('option')
	 					.remove();
	 				$('#posttype').append($('<option>', {
	 					value: 'manager',
	 					text: 'MANAGER'
	 				}));
	 				$('#posttype').append($('<option>', {
	 					value: 'executive',
	 					text: 'EXECUTIVE'
	 				}));
	 				break;
	 			default:
	 				// statements_def
	 				break;
	 		} 
}