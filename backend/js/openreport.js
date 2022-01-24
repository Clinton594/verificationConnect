Date.prototype.monthName = function () {
	let month = this.getMonth();
	monthname = new Array(12)
	monthname[0] = "January";
	monthname[1] = "February";
	monthname[2] = "March";
	monthname[3] = "April";
	monthname[4] = "May";
	monthname[5] = "June";
	monthname[6] = "July";
	monthname[7] = "August";
	monthname[8] = "September";
	monthname[9] = "October";
	monthname[10] = "November";
	monthname[11] = "December";
	return Number.isInteger(month) ? monthname[month] : monthname;
}


function close_report(a) {
	let height = $("#display_report" + a).height();
	$('html, body').animate({ scrollTop: '0px' }, "fast", function () {
		$("#display_report" + a).swapDiv($("#open_form" + a));
		$('html, body').css({ height: "500px" });
	});
}


function reportInitialize(a) {
	// Swap tabs
	$('#report_menu' + a).children().click(function () {
		let clicked = $(this);
		let currentview = $("#panel-div" + a).children(".active");
		let openview = clicked.data("href");
		$('#report_menu' + a).children().removeClass("active");
		currentview.swapDiv($("#" + openview + a), function (openend) {
			$("#panel-div" + a).children().removeClass("active");
			clicked.siblings().removeClass("active");
			openend.addClass("active");
			clicked.addClass("active");
		})
	});

	// Close report
	$('#close_report' + a).click(function () {
		close_report(a)
	});

	// column view draggable
	$('#subdiv_column' + a).find(".sortable").sortable({ revert: true, cursor: "move" });
	$('#subdiv_column' + a).find(".sortable").disableSelection();
	$('#subdiv_column' + a).find(".sortable").children().disableSelection().css({ cursor: "move" });
	// Checking and unchecking a column
	$('#subdiv_column' + a).find('.gcol').change(function () {
		if ($(this).attr('checked') == undefined || !$(this).attr('checked')) {
			$(this).closest(".row").find('input').prop({ 'disabled': false })
			$(this).closest(".row").find('input').prop({ 'checked': true }).attr({ 'checked': true });
		} else {
			$(this).closest(".row").find('input').removeAttr("checked");
			$(this).closest(".row").find('input:gt(0)').prop({ 'disabled': true })
		}
	});

	// ----------------------------------------------------------------------- Date View
	// quick dates
	$('#subdiv_date' + a + ' .quick-dates').find("input").change(function () {
		if ($(this).hasClass("none")) {
			$('#subdiv_date' + a + ' .custom-dates').find("input").attr({ disabled: false });
		} else {
			$('#subdiv_date' + a + ' .custom-dates').find("input").attr({ disabled: true });
		}
		$("#reportdaterange" + a).attr({ "data-value": $(this).attr("value"), "data-title": $(this).attr("value") }).text('apply').find("img").remove();
		$("#dateTitle_report" + a).val("");
		$("#selectDate_report" + a).val("");
		$("#reportdatedisplay" + a).text("");
	})

	// custom dates
	$('#subdiv_date' + a + ' .custom-dates').find("input").change(function () {
		let customd = [];
		if ($(this).attr("name") == "startdate") { $('#subdiv_date' + a + ' .custom-dates').find("input[name=enddate]").attr({ min: $(this).val() }).val(""); }
		$('#subdiv_date' + a + ' .custom-dates').find("input").each(function () {
			let name = $(this).attr("name");
			let val = $(this).val();
			if (val) customd.push(val);
		})
		if (customd.length === 2) {
			let formed = customd.map(function (date) {
				let newdate = new Date(date);
				return `${newdate.monthName()} ${newdate.getDate()}, ${newdate.getFullYear()}`;
			});
			$("#reportdaterange" + a).attr({ "data-value": customd.join(","), "data-title": formed.join(" - ") }).text('apply').find("img").remove();
		} else {
			$("#reportdaterange" + a).attr({ "data-value": null, "data-title": null }).text('apply').find("img").remove();
		}
		$("#dateTitle_report" + a).val("");
		$("#selectDate_report" + a).val("");
		$("#reportdatedisplay" + a).text("");
	});

	// Apply Date range
	$("#reportdaterange" + a).click(function () {
		let proceed = 1;
		let customd = [];
		if (!$(this).attr("data-value") || !$(this).attr("data-title")) {
			proceed = 0;
			$('#subdiv_date' + a + ' .custom-dates').find("input").each(function () {
				let name = $(this).attr("name");
				let val = $(this).val();
				if (val) customd.push(val);
			})
			if (customd.length === 2) {
				proceed = 1;
				let formed = customd.map(function (date) {
					let newdate = new Date(date);
					return `${newdate.monthName()} ${newdate.getDate()}, ${newdate.getFullYear()}`;
				});
				$(this).attr({ "data-value": customd.join(","), "data-title": formed.join(" - ") }).text('apply').find("img").remove();
			}
		}
		if (proceed) {
			$("#reportdatedisplay" + a).text($("#reportdaterange" + a).attr("data-title"));
			$("#dateTitle_report" + a).val($("#reportdaterange" + a).attr("data-title"));
			$("#selectDate_report" + a).val($("#reportdaterange" + a).attr("data-value"));
			$("#reportdaterange" + a).text("applied").append($("<img>").attr({ src: `${site.backend}icons/done.svg` }).css({ height: 15, marginLeft: 5 }));
		}
		else M.toast({ html: "Invalid date range", classes: "red", displayLength: 2000 });
	});

	// ------------------------------------------------------------------ Grouping Sections
	// primary grouping
	disable_seondary_columns(a, true);
	$("#subdiv_grouping" + a).find(".graph-data input").attr({ disabled: true });
	// Onclick of any of the primary grouping
	$("#subdiv_grouping" + a).find(".primary-grouping input").click(function () {
		let val = $(this).attr("value");
		// if it is not a null input
		if ($(this).val()) {
			// Disable all columns in the column section except the one with this value
			disable_general_columns(a, val);
			// enable all secondary items
			disable_seondary_columns(this, false);
			// Change select data type
			$("#subdiv_grouping" + a).find(".select-data input").attr({ disabled: false, type: "checkbox", group: "primary" }).trigger("change");
			$("#subdiv_grouping" + a).find(".graph-data input").attr({ disabled: false });
		} else { // for the null input
			enable_general_columns(a);
			// disable all secondary items
			disable_seondary_columns(this, true);
			// Change select data type
			$("#subdiv_grouping" + a).find(".select-data input").attr({ disabled: true, type: "checkbox", group: "primary" }).trigger("change");
			$("#subdiv_grouping" + a).find(".graph-data input").attr({ disabled: true }).trigger("change");
			$("#igroup_report" + a).val("");
		}
		$("#pri_report" + a).val(val);
	});
	// Assign click to select data inputs
	$("#subdiv_grouping" + a).find(".select-data input").change(function () {
		update_select_data(a, this);
	})
	$("#subdiv_grouping" + a).find(".primary-grouping input").first().click();

	// Secondary grouping\
	// Onclick of any of the primary grouping
	$("#subdiv_grouping" + a).find(".secondary-grouping input").click(function () {
		// not empty value
		if ($(this).val()) {
			$("#subdiv_grouping" + a).find(".select-data input").attr({ disabled: false, type: "radio", group: "secondary" });
			$("#subdiv_grouping" + a).find(".select-data input").trigger("change");
		} else {
			$("#subdiv_grouping" + a).find(".select-data input").attr({ disabled: false, type: "checkbox", group: "primary" }).trigger("change");
			$("#sgroup_report" + a).val("");
		}
		$("#sec_report" + a).val($(this).attr("value"));
		$("#subdiv_grouping" + a).find(".graph-data input").attr({ disabled: true });
	});

	$("#subdiv_grouping" + a).find(".graph-data input").change(function () {
		$("#graph" + a).val($(this).val());
	})

	// -----------------------------------------------------------------------Filters
	$("#subdiv_filters" + a).find(".report-filter-select").change(function () {
		let value = $(this).val();
		let option = $(this).find("option[value=" + value + "]").attr("data-action");
		let action = option.split("|");
		$(this).closest(".report-filter-list").find("input.combo").each(function (i) {
			i++;
			if (!action) $(this).val("").parent().hide();
			else if (!action[i]) $(this).val("").parent().hide();
			else $(this).parent().show().find("label").text(action[i]);
		});
	});


	//Run reports
	$("#_runReport" + a).click(function () {
		let ds = this;
		let data = $("#report_form" + a).serializeArray();
		let collector = [];
		// Get Selected Columns
		$('#subdiv_column' + a).find(".sortable li").each(function () {
			let collect = [];
			let column = $(this).find("input").first();
			let show_title = $(this).find("input").eq(1);
			let column_break = $(this).find("input").last();
			if (column.is(":checked") && !column.attr("disabled")) {
				collect.push(column.val());
				if (show_title.is(":checked") && !show_title.attr("disabled")) collect.push("s"); else collect.push("h");
				if (column_break.is(":checked") && !column_break.attr("disabled")) collect.push("k"); else collect.push("h");
			}
			if (collect.length) collector.push(collect.join(","));
		});
		data.push({ name: "cols", value: collector.join("|") });
		// Get filters
		let filtercollector = [];
		$("#subdiv_filters" + a).find(".report-filter-list").each(function () {
			let collect = [];
			let select = $(this).find("select");
			if (select.val() && select.val() != 0) {
				collect.push(select.attr("name"));
				collect.push(select.val());
				$(this).find("input.combo").each(function () {
					if ($(this).is(":visible") && $(this).val()) collect.push($(this).val());
					else collect.push("");
				})
				if (collect.length) filtercollector.push(collect.join(","));
			}
		});
		data.push({ name: "filter_param", value: filtercollector.join("|") });
		data.push({ name: "pageid", value: a });
		$(ds).startLoader(true);
		// Ajax request
		$.post($("#report_form" + a).attr("action"), data, function (response) {
			$(ds).stopLoader(true);
			$(ds).closest(".modal").closeModal();
			$(`#showreport${a}`).html(response);
			$(`#open_form${a}`).swapDiv($(`#display_report${a}`));

			// Check for graph data;
			let graph = data.find(({ name }) => name === 'graph');
			if (graph.name) {
				data.push({ name: "plotdata", value: true });
				$.post($("#report_form" + a).attr("action"), data, function (response) {
					let res = isJson(response);
					if (res) {
						$("#myChart" + a).plotGraph(graph.value, res);
					}
				});
			}
		})
	});

	// report initialize closes
}

function disable_general_columns(a, exclude) {
	$('#subdiv_column' + a).children().find('input').attr({ disabled: true, checked: false });
	$('#subdiv_column' + a).find(`.collection-item.${exclude} input`).attr({ disabled: false, checked: true });
}


function enable_general_columns(a) {
	$('#subdiv_column' + a + ' .collection').children(".checked1").find('input').attr({ disabled: false, checked: true });
	$('#subdiv_column' + a + ' .collection').children(".checked").each(function () {
		$(this).find("input").first().attr({ disabled: false, checked: false });
	});
}

function disable_seondary_columns(element, state) {
	let a, cls;
	if (typeof (element) == "string") a = element;
	else {
		a = $(element).data("pageid");
		cls = $(element).data("name");
	}
	$('#subdiv_grouping' + a).find('.secondary-grouping input').attr({ disabled: state }).prop("checked", false).first().prop("checked", true);
	if (cls) $('#subdiv_grouping' + a).find('.secondary-grouping input.' + cls).attr({ disabled: true });
}

function update_select_data(a, element) {
	let container = $("#subdiv_grouping" + a);
	let igroup_report = [];
	// Get primary and Secondary radio-group values
	let pri = container.find(".primary-grouping input:checked").attr("data-name") || null;
	let sec = container.find(".secondary-grouping input:checked").attr("data-name") || null;
	container.find(".select-data input:checked").each(function () {
		let val = $(this).val() || null;
		let key = $(this).attr("group");
		igroup_report.push(val);
	});
	$("#igroup_report" + a).val(igroup_report.join("|"));
	$("#pri_report" + a).val(pri);
	$("#sec_report" + a).val(sec);
}

