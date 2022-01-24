// JavaScript Document
window.onbeforeunload = function () { return true; };
var show = new Array();
var showObject = new Array();

$(document).ready(function () {
	$(".noref").click(function (e) {
		e.preventDefault();
		noref(this);
	});
	setTimeout(function () {
		$('.menu .noref').first().click();
	})
}, 500);

function noref(anchor) {
	var thisObj = $(anchor);
	var pageTitle = '';

	if ($(anchor).attr('data-title') && !$(anchor).hasClass('active')) {
		pageTitle = $(anchor).attr('data-title');
	}
	if ($(anchor).attr('data-active') == undefined) {
		//the url value

		var url = $(anchor).attr('href');
		var generated_id = new Date().getTime();
		generated_id = new String(generated_id);
		var new_container = $("<div></div>").hide().attr({ 'id': generated_id });
		$("#default_div").append(new_container);
		$(anchor).attr({ 'data-active': generated_id });
		$('loader').removeClass('hide').show();
		$(new_container).load(url, function (response, status, xhr) {
			$('loader').addClass('hide');
			if (status == "success") {
				$(anchor).attr({ 'href': 'javascript:;' })
				// alert(pageTitle);
				var obs = $.initialize('#' + generated_id + ' #' + pageTitle, function () {
					//After new element has been confirmed loaded
					// alert($("#default_div .active-container").attr("id"))
					$("#default_div .active-container").swapDiv(
						$(new_container),
						function () {
							$("#default_div .active-container").removeClass("active-container");
							$(new_container).addClass("active-container");
							reload_selects(pageTitle);
						}
					);
				}, { target: document.getElementById("default_div") });
				obs.disconnect();
				if ($("#default_div").children().length == 1) { $("#default_div").children().addClass("active-container").show() }
			} else if (status == "error") {
				console.log(response);
				M.toast({ html: "Page not found !!!", displayLength: 4000, classes: "" });
			}
		});
	} else {
		var new_container = $(anchor).attr('data-active');
		$("#default_div .active-container").swapDiv($('#' + new_container), function () {
			$("#default_div .active-container").removeClass("active-container");
			$('#' + new_container).addClass("active-container");
			if (pageTitle) {
				reload_selects(pageTitle);
			}
		});
	}
	$(".noref").removeClass('toggled');
	$("#leftsidebar li, #leftsidebar li > a").removeClass('active');
	$(anchor).addClass('active toggled').parent().addClass("active");
	setTimeout(() => {
		$("body").click();
		$('#pageLabel').html(thisObj.text());
		$('#navTitle').text(thisObj.closest('li.main-menu-li').find(".navTitle").text());
		$('#pageIcon').removeAttr("class").addClass(thisObj.closest('li.main-menu-li').find("i").attr("class"));
		thisObj.closest('li.main-menu-li').children("a").addClass("active")
	}, 500)
}
