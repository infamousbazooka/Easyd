$(document).ready(function() {
	menuHeight();

	$('#category').click(function(event) {
		combo();
	});
	$('#empname').keyup(function(event) {
		if ($('#empname').val() == "") {
			$('#viewindi').attr('disabled', 'disabled');
		}
		else{
			$('#viewindi').removeAttr('disabled');
		}
	});
});
$(window).resize(function() {

});

function checkviewindi () {
	if ($('#empname').val() == "") {
		$('#viewindi').attr('disabled', 'disabled');
	}
	else{
		$('#viewindi').removeAttr('disabled');
	}
}
function viewclient () {
	file = "CRM/Clist/view.php";
	sector = $('#sectortype').val();
	type = $('input[name=vclient]:checked').val();
	if (type != "sector") {
		$('#display').load(file);
	}
	else {
		$('#display').load(file, {"sector":sector});
	}
}
function viewpro () {
	file = "Human_Resources/Profile/get.php";
	name = $('#empname').val();
	if (name == "") {
		console.log('runn');
		$('#display').load(file);
	}
	else {
		$('#display').load(file, {"name":name});
	}
}
function viewind() {
	file = "http://localhost/easyd/dashboard/Human_Resources/Attendance/get.php";
	name = $('#empname').val();
	month = $('#month').val();
	year = $('#year').val();
	if (name == "") {
		console.log('runn');
		$('#display').load(file, {"month":month, "year":year});
	}
	else {
		$('#display').load(file, {"name":name, "month":month, "year":year});
	} 
}
function getstock() {
	file = "http://localhost/easyd/dashboard/Inventory/Stock/view.php";
	type = $('input[name=leadtype]:checked').val();
	category = $('#category').val();
	name = $('#name').val();
	if (type != 'item'){
		$('#display').load(file);
	}
	else {
		$('#display').load(file, {"name":name, "category":category, "type":type});
	} 
}
function gethistory() {
	file = "http://localhost/easyd/dashboard/Inventory/Stock/history.php";
	type = $('input[name=leadtype]:checked').val();
	category = $('#category').val();
	name = $('#name').val();
	if (type != 'item'){
		$('#display').load(file);
	}
	else {
		$('#display').load(file, {"name":name, "category":category, "type":type});
	} 
}
function checkPasswordMatch() {
    var password = $("#pass").val();
    var confirmPassword = $("#rpass").val();

    if (password != confirmPassword) {
        $("#ret").prop("disabled", true);
        return false;
    }
    else if (password=="" || confirmPassword=="") {
        $("#ret").prop("disabled", true);
        return false;
    } else {
		console.log("done");
        $("#ret").prop("disabled", false);
        $("#ret").removeAttr('disabled');
        return true;
    }
}
function radioCheck () {
	$('input[type="radio"]').click(function(){
		if($(this).attr("value")=="individual"){
			$("#empname").show();
		}
		if($(this).attr("value")=="company"){
			$("#empname").val("");
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
		case 'payroll':
			file = "Human_Resources/Payroll/";
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
		case 'perf':
			file = "Performance/Manage/";
			break;
		case 'postproject':
			file = "Project_Management/Postproject/";
			break;
		case 'preproject':
			file = "Project_Management/Preproject/";
			break;
		case 'reimbursements':
			file = "Project_Management/Reimbursements/";
			break;
		case 'stock':
			file = "Inventory/Stock/";
			break;
		case 'items':
			file = "Inventory/Items/";
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
		case 'document':
			file = 'Document_Manager/';
			break;
		case 'inventory':
			file = 'Inventory/';
			break;
		case 'perf':
			file = 'Performance/';
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

function combo() {
	 var ctype = $('#category').val();
	 	console.log(ctype);
	 		switch (ctype) {
	 			case 'owner':
	 				$('#posttype')
	 					.find('option')
	 					.remove();
	 				$('#posttype').append($('<option>', {
	 					value: 'Propreitor',
	 					text: 'PROPREITER'
	 				}));
	 				break;
	 			case 'hr':
	 				$('#posttype')
	 					.find('option')
	 					.remove();
	 				$('#posttype').append($('<option>', {
	 					value: 'HR Manager',
	 					text: 'MANAGER'
	 				}));
	 				$('#posttype').append($('<option>', {
	 					value: 'HR Executive',
	 					text: 'EXECUTIVE'
	 				}));
	 				break;
	 			case 'acc':
	 				$('#posttype')
	 					.find('option')
	 					.remove();
	 				$('#posttype').append($('<option>', {
	 					value: 'Accounts Manager',
	 					text: 'MANAGER'
	 				}));
	 				$('#posttype').append($('<option>', {
	 					value: 'Accounts Executive',
	 					text: 'EXECUTIVE'
	 				}));
	 				break;
	 			case 'emp':
	 				$('#posttype')
	 					.find('option')
	 					.remove();
	 				$('#posttype').append($('<option>', {
	 					value: 'Manager',
	 					text: 'MANAGER'
	 				}));
	 				$('#posttype').append($('<option>', {
	 					value: 'Executive',
	 					text: 'EXECUTIVE'
	 				}));
	 				break;
	 			case 'Client':
	 				$('#posttype')
	 					.find('option')
	 					.remove();
	 				$('#posttype').append($('<option>', {
	 					value: 'Transport',
	 					text: 'TRANSPORT'
	 				}));
	 				$('#posttype').append($('<option>', {
	 					value: 'Phone_Calls',
	 					text: 'PHONE CALLS'
	 				}));
	 				$('#posttype').append($('<option>', {
	 					value: 'Others',
	 					text: 'OTHERS'
	 				}));
	 				break;
	 			case 'Office':
	 				$('#posttype')
	 					.find('option')
	 					.remove();
	 				$('#posttype').append($('<option>', {
	 					value: 'Food',
	 					text: 'FOOD'
	 				}));
	 				$('#posttype').append($('<option>', {
	 					value: 'Transport',
	 					text: 'TRANSPORT'
	 				}));
	 				$('#posttype').append($('<option>', {
	 					value: 'Miscellaneous',
	 					text: 'MISCELLANEOUS'
	 				}));
	 				break;
	 			default:
	 				// statements_def
	 				break;
	 		} 
}

function giveattendance () {
	$('#form').load('Human_Resources/Attendance/giveattendance.php');
}
function add () {
	var quota = $('#eleaves').val();
	var newq = $('#nleaves').val();
	var total = Number(quota) + Number(newq);
	$('#tleaves').val(total);
}

function perfproj() {
	file = "http://localhost/easyd/dashboard/Performance/Manage/view.php";
	type = $('input[name=leavereg]:checked').val();
	empname = $('#empname').val();
	clientname = $('#clientname').val();
	projname = $('#projname').val();
	if (type == "indiv") {
		console.log('runn');
		$('#display').load(file, {"empname":empname, "clientname":clientname, "projname":projname});
	}
	else {
		$('#display').load(file);
	} 
}

function viewflist() {
	file = "http://localhost/easyd/dashboard/CRM/Flist/view.php";
	fname = $('#fname').val();
	prname = $('#prname').val();
	pname = $('#pname').val();
	$('#display').load(file, {"fname":fname, "prname":prname, "pname":pname});
}