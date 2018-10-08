$(document).ready(function(){

$(".test-box-wrapper").css({
	position : 'relative',
	top: ($(window).height() - $('.test-box-wrapper').outerHeight())/2 - 30
});

$(".login-box__container").css({
	position : 'relative',
	top: ($(window).height() - $('.login-box__container').outerHeight())/2 - 30
});

var lang = $("#test-content").attr("data-testLang");
var pages;

function printTable(rangeMod) {
		
	$.ajax({
		url: 'get-test.php',
		type: 'POST',	
		data: {lang: lang, rangeMod: rangeMod}
	})
	.done(function(data) {
		var htmlData = $.trim(data);
		htmlData = $.parseHTML(htmlData);
		$("#test-content").html(htmlData[2]);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
	});

}

function printPagination() {
		
	$.ajax({
		url: 'get-test.php',
		type: 'POST',	
		data: {lang: lang}
	})
		.done(function(data) {
		var htmlData = $.trim(data);
		htmlData = $.parseHTML(htmlData);
		$("#pagination>.row>.mx-auto").append(htmlData[0]);
		$("li#page_1").addClass('active');
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
	});

}
printPagination();
printTable(0);



// Edit Button Actions
$("#test-content").on("click", ".edit-button", function(event) {
	event.preventDefault();

	var parentRow = $(this).parents("tr");
	var kaka = parentRow.children("td").not(":last-child");
	$.each(kaka, function(index, val) {
		 $(this).replaceWith("<td class='align-middle text-center'><input type='text' class='pl-2 border-0 text-dark w-100' value='"+$(this).text()+"'></input></td>")
	});

	$(this).toggle();
	$(this).siblings(".save-button, .delete-button, .cancel-button").toggle(0, function() {
		$(this).filter(".cancel-button").click(function(event) {
		var currPage = $(".pagination-nav__page-item.active").attr("id");
		
		currPage = currPage.slice(5);
		currPage = (currPage-1) * 10;
		printTable(currPage);
		});
	});
});

// Save Button Actions
$("#test-content").on("click", ".save-button", function(event) {
	var thisAnchor = $(this);
	event.preventDefault();
	var parentRow = $(this).parents("tr");
	var data = {
	'id': parentRow.attr("id"),
	'question_content': "",
	'question_answer_1': "",
	'question_answer_2': "",
	'question_answer_3': "",
	'question_answer_4': "",
	'question_correct': ""

	};

	$.each(parentRow.find("input[type='text']"), function(index, val) {

		var name;

		switch(index) {
			case 0:
				name = 'question_content';
				break;
			case 1:
				name = 'question_answer_1';
				break;
			case 2:
				name = 'question_answer_2';
				break;
			case 3:
				name = 'question_answer_3';
				break;
			case 4:
				name = 'question_answer_4';
				break;
			case 5:
				name = 'question_correct';
				break;																				
		}

			data[name] = $(this).val();
	});

		$.ajax({
		url: 'update-test.php',
		type: 'POST',
		data: data,
	})

	.done(function(data) {
		console.log("success");

		$("#sqlUpdateOk").modal('toggle');
		
		$.each(parentRow.find("td").not(":last-child"), function(index, val) {
			$(this).text($(this).children("input").val());	 
		});

		thisAnchor.toggle();
		thisAnchor.siblings(".edit-button, .delete-button, .cancel-button").toggle();

	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
});

// Delete Button Actions
$("#test-content").on("click", ".delete-button", function(event) {
	
	var id = $(this).parents("tr").attr("id");
	$("#deletionConfirm").attr("data-idToDelete", id);

});

// Deletion Confirm Button Actions
$("#deletionConfirm").click(function(event) {
	event.preventDefault();
	var id = $(this).attr("data-idToDelete");
	$.ajax({
		url: 'delete-question.php',
		type: 'GET',
		data: {lang: lang, id: id}
	})
	.done(function(data) {
		console.log("success");
		console.log(data);
		$("#deletionConfirmAlert").modal("hide");
		printTable();
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
});

$("#pagination").on("click", ".pagination-nav__a--prev", function(event) {

	event.preventDefault();
	$(".pagination-nav__a--next").parent("li").removeClass('disabled');	
	var currPage = $(".pagination-nav__page-item.active").index();
	currPage -= 1;

	$("#pagination li").removeClass('active');
	if (currPage === 0) { 
		$(this).parent("li").addClass('disabled')
		$("#page_1").addClass('active'); }

	$("#page_"+currPage).addClass('active')
	

	var modifier = (currPage - 1) * 10;
	printTable(modifier);

});

$("#pagination").on("click", ".pagination-nav__a--next", function(event) {

	event.preventDefault();
	$(".pagination-nav__a--prev").parent("li").removeClass('disabled');	


	var currPage = $(".pagination-nav__page-item.active").index();
	

	$("#pagination li").removeClass('active');
	if (currPage === $(".pageNo").length) {
		$(this).parent("li").addClass("disabled");
		$(".pageNo").last().addClass('active');
	}
	currPage += 1;
	$("#page_"+currPage).addClass('active')
	

	var modifier = (currPage - 1) * 10;
	printTable(modifier);

});

		
$("#pagination").on("click", ".pagination-nav__a", function(event) {

	event.preventDefault();

	$(".pagination-nav__a--prev, .pagination-nav__a--next").parent("li").removeClass('disabled');

	$("#pagination li").removeClass('active');
	$(this).parent("li").addClass('active');

	var modifier = $(this).attr("data-modifier");

	printTable(modifier);

});

});


