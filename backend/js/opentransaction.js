function transInitialize(a) {
	$('#loadPayment' + a).click(function () {
		$('#paymentModal' + a).openModal();
	});
	$('#formPrint' + a).click(function () {
		saveForm(a, this, 1);
	});
	$('#void' + a).click(function () {
		voidForm(a);
	});
}

// Auto fillup selected user details to other elements from combo
function fillupuser(element, response) {
	fillupcard(element, response)
}
// Auto fillup selected user details to other elements from combo
function fillupcard(element, response) {
	let a = $(element).data("pageid");
	let curr_id = $(element).attr("id");
	let container = $(element).closest(".card");
	$.each(response, function (id, value) {
		if (id + a != curr_id) {
			container.find("#" + id + a).val(value).focus().change();
		}
	})
}
// Auto fillup selected account details to other elements from combo
function fillupaccount(element, response) {
	let copied = $.extend({}, response);
	copied.account = copied.account_id;
	copied.account_id = copied.typeid;
	let a = $(element).data("pageid");
	let curr_id = $(element).attr("id");
	let container = $(element).closest(".card");
	$.each(copied, function (id, value) {
		if (id + a != curr_id) {
			container.find("#" + id + a).val(value).change();
		}
	})
}

function fillup_trans_row(element, object) {
	let copied = $.extend({}, object);
	copied.rate = copied.price1;
	copied.quantity = 1;
	copied.it_id = copied.tid;
	delete copied.tid;
	let a = $(element).data("pageid");
	let curr_id = $(element).attr("id");
	let container = $(element).closest(".row.desc");
	let num = container.data("num")
	$.each(copied, function (id, value) {
		if (id + a != curr_id) {
			container.find("#" + id + num + a).val(value).change();
		}
	});
	newsales(element);
}

function extractColumn(field, n) {
	var r = new Array;
	if (field == undefined || field == null) return r;
	field = field.toString();
	var b = field.split('|')
	for (i in b) {
		var c = b[i].split(',')
		if (c[n] != undefined) r.push(c[n]);
	}
	return r;
}

function loadTransaction(list, element) {
	if (list.length) {
		$.each(list, function (x, subzero) {
			for (let i in subzero.transactions) {
				let object = subzero.transactions[i];
				object.sub = parseInt(object.sub)
				if (object.sub > 0) {
					newsales(element, object);
				}
			}
		})
	}
}

function newsales(ths, object) {
	let a = $(ths).data("pageid");
	object = object || undefined;
	$("#_itemlist" + a).createTransRow(object);
	sum(ths);
}

$.fn.extend({
	createTransRow: function (object) {
		object = object == undefined ? new Object : object;
		var a = $(this).data("pageid");
		var field = $("#sparam" + a).val();
		var col_names = extractColumn(field, 0);
		var col_type = extractColumn(field, 3);
		let cont = $('#_itemlist' + a);
		let lastRow = cont.find('.crv').last(), trans_row, i = 0;
		var emptycols = findEmptycols(lastRow);
		if (emptycols < 3) {//If full, Create New One
			i = !$('#_count' + a).val() ? 1 : parseInt($('#_count' + a).val());
			i++;
			trans_row = cont.find('.crv').first().clone();
			trans_row.appendTo($(this)).attr({ "data-num": i });
			$('<a>').attr({ 'href': 'javascript:;' }).addClass('right').css({ 'position': 'absolute', 'bottom': '30px' }).html('<i class="material-icons">clear</i>').appendTo(trans_row).click(function () {
				$(this).parent().remove();
				sum(a);
			});
			trans_row.addClass("newRow").find("#tid1" + a).attr({ id: "tid" + i + a, name: "tid" + i }).val("");
			$.each(col_names, function (index, col_name) {
				let element = trans_row.find("#" + col_name + 1 + a);
				if (element != undefined) {
					if (col_type[index] == "combo") {
						element.autocomplete({
							source: element.data('source'),
							validate: true,
							display_fields: element.attr("display_fields"),
							value: element.attr("insert_field"),
							callback: function (response) {
								if (element.attr('callback') != undefined) {
									let thisFunction = element.attr('callback');
									window[thisFunction](element, response);
								}
							}
						});
					}
					element.attr({ id: col_name + i + a, name: col_name + i }).focus();
					// Empty this element if it doesnt have a constant value
					if (element.data("keep") == undefined) {
						element.val("");
					}
				}
			})
		} else {
			i = parseInt(lastRow.data("num"));
			trans_row = lastRow;
		}
		//Dynamically add values all elements in the row
		$.each(object, function (index, value) {
			var thisEl = $(trans_row).find("#" + index + i + a).attr({ value: value }).val(value);
			//Dynamically Triger change event when the value of the row changes
			if (index == "description") { thisEl.trigger('change'); }
			//Auto overide values for buttons with button descriptions
			if (col_type[index] == 'button') input.attr({ value: value[index] });
		});
		$('#_count' + a).val(i);
	}
}
);

function sum(element) {
	let sumtot = 0;
	let a = $(element).data("pageid");
	$("#_itemlist" + a).children(".desc.crv").each(function (i) {
		let sumrow = parseInt($(this).find(".quantity").val()) * parseInt($(this).find(".rate").val());
		sumrow = isNaN(sumrow) ? 0 : sumrow;
		let sr = sumrow < 1 ? "" : sumrow;
		$(this).find(".amount").val(sr);
		sumtot += parseInt(sumrow);
	})
	$("#_total" + a).val(sumtot);
}

function findEmptycols(el) {
	var count = 0;
	el.find('input[data-class]').each(function () {
		if (!$(this).val()) count++;
	})
	return count;
}

function voidForm(a) {
	pagetype = $('#page_type' + a).val();
	var dId = new Array;
	$('#' + a + ' .cbx:checked').each(function () { dId.push($(this).val()) });
	var strId = dId.join('');
	if (strId != '') {
		$(this).questionBox(' Are you sure you want to void these transaction(s)', function () {
			$('loader').removeClass('hide');
			$.post(`${site.process}void`, { 'voidIds': strId, 'pageType': pagetype }, function (data) {
				$('loader').addClass('hide');
				console.log(data);
				if (data == '1') {
					M.toast({ html: "Rows successfully voided", displayLength: 2000, classes: "green" });
					resetForm(a);
					loadOpen(a);
				} else M.toast({ html: "Error deleting rows or you donot have access for deletion", displayLength: 4000, classes: "red" });
			})
		});
	} else M.toast({ html: "No record selected", displayLength: 2000, classes: "" });
}
