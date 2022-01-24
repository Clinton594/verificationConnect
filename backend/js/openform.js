// JavaScript Document
let Materialize;
$(document).ready(function () {
  M.AutoInit();
  Materialize = M;
  $('.myMenu').click(function () {
    $(this).closest('ul').find('.myMenu').removeClass('active');
    $(this).addClass('active');
  });
});

function newForm(a) {
  //alert(a);
  var page = $('#' + a);
  var pageid = page.data('pageid');
  $("#open_form" + pageid).swapDiv(page);
}

function openForm(button) {
  var page = $(button).closest(".house-group");
  let pageid = page.attr("data-pageid");
  page.swapDiv($("#open_form" + pageid));
}

function extForm(a) {
  $("#open_form" + a).swapDiv($("#new_form" + a));
}

// REMEMBER TO RESTRUCTURE THIS IN SUCH A WAY THAT IT
// WOULD LOOP THROUGH ALL THE FORMS CREATED WITHIN A PAGETYPE AND INITIALIZE EACH ONE, NOT JUST THE MAIN FORMDATA
function formInitialize(p, t, key = 1) {
  var a = p == undefined ? '' : p;
  // Identify house groups
  $('#' + a).children().addClass("house-group");
  // Attach a page_type to each element that has an id
  $('#' + a).find('[id]').each(function () {
    var tmp = $(this).attr('id');
    $(this).attr({ 'id': tmp + a, "data-previd": tmp, 'data-pageid': a });
  });

  // Attach the id name to each label
  $('#' + a).find('[for]').each(function () {
    var tmp = $(this).attr('for') + a;
    $(this).attr({ 'for': tmp });
  });

  // Prepare Extension reports separately
  $('#' + a).children('.extension-list').each(function () {
    let container = $(this);
    let b = container.data("extensionid");
    container.find('[id]').each(function () {
      var tmp = $(this).data('previd');
      $(this).attr({ 'id': tmp + b, 'data-pageid': b });
    });
    $('#_searchBox' + b).keyup(function () {
      loadExtension(this)
    });
    $('#_rangeBox' + b).change(function () {
      $('#active_page' + b).attr({
        'data-active': 1
      }).val(1);
      loadExtension(this);
    });
    $('#_searchBox' + b + ', #_rangeBox' + b).each(function () {
      $(this).attr({ "data-extensionid": container.attr("id") });
    })
    $('#_filterList' + b + ' .dateFilter').each(function (i, thx) {
      $(this).attr({ "data-extensionid": container.attr("id") });
      $(this).initDateRange("This Month", function (result) {
        loadExtension(thx);
      });
    })
  });

  if ($("#report_modal" + a).eq(0).length) {
    reportInitialize(a)
  }
  $("#_tabed_details" + a).tabs();
  $("#_tabed_details" + a + " .noref").click(function () {
    loadDetailTab(this, a);
  });
  // Initialize Fixed action buttons found in each page for none-mobile devices
  $(`#${a}`).find(".fixed-action-btn").each(function () {
    if (!$(this).attr("data-mobile")) {
      $(this).floatingActionButton();
    }
  });

  // Initialize new forms for each page
  $('#new' + a).click(function () {
    resetForm('formData' + a);
    if ($('#new_form' + a).hasClass("modal")) {
      $('#new_form' + a).openModal();
    } else {
      newForm('new_form' + a);
    }

    // Call form onload function for new forms only
    if ($('#formData' + a).attr("onload")) {
      let thisFunction = $('#formData' + a).attr("onload");
      window[thisFunction]($('#formData' + a));
    }
  });

  if ($('#' + a).attr("default-view") == "form") {
    let thisFunction = $('#formData' + a).attr("onload");
    if (thisFunction) window[thisFunction]($('#formData' + a));
  }

  $('#close' + a + ', #close_ext' + a + ', #close_detail' + a).click(function () {
    let button = this;
    $('html, body').animate({ scrollTop: '0px' }, 300, function () {
      openForm(button);
      resetForm('formData' + a);
    });
  });


  $('#loadclose' + a).click(function () {
    loadClose(a)
  });

  // Navigate from one form data to another form data
  $('#form-nav-next' + a + ',#form-nav-prev' + a).click(function () {
    navigateForm(a, this);
  });

  // ----------------------Generic Result
  $('#resultLoad' + a).click(function () {
    loadResults(a, this);
  });

  $('#getAnnual' + a).click(function () {
    get_annual(a, this);
  });

  $('#resultDelete' + a).click(function () {
    deleteResult(a, this);
  });

  // --------------------------

  $('#loadSave' + a).click(function () {
    submitAction(this, a);
  });

  $('#formReset' + a).click(function () {
    resetForm('formData' + a);
  });

  $('#reloadPage' + a).click(function () {
    reloadPageList(a);
  });

  $('#holder' + a + ' .noref').click(function () {
    noref(this);
  });

  $('#printForm' + a).click(function () {
    printForm(a, this)
  });

  $('#_multiDelete' + a).click(function () {
    deleteMultiple(a)
  });

  $('#_singleDelete' + a).click(function () {
    deleteSingle(a)
  });

  $('#reportSetup' + a).click(function () {
    $('#_report_setup' + a).openModal()
  });

  $('#edit_detail' + a).click(function () {
    openForm(this)
    loadSelection(this, a, "new_form");
  })
  //Save button for a multi-form pages
  $('#secondarySave' + a).click(function () {
    saveForm(a, this);
  });

  $('#' + a).find('select').formSelect();
  // Biuld search filters if it exists on the search textbox
  $("#_searchBox" + a).search_filters(a);
  // INITIALIZE ALL FORMS WITHIN THIS PAGE
  $("#" + a).find("form").each(function () {
    let form = $(this);

    form.find('.formSave').each(function () {
      $(this).click(function () {
        saveForm(a, this);
      });
    });

    form.find(".generic-file-selector").click(function () {
      $(this).uploadDialog({
        callback: function (a, data) {
          $(a).next().find('.file-path').val(data.src);
        }
      });
    });

    form.find("textarea").each(function () {
      $(this).autoHeight();
    });
    form.find('.uploadPic').click(function () {
      $(this).uploadDialog({
        'onDrag': function (data) {
          console.log(data);
          dragResponse();
        }
      })
    });
    if (form.find('.description-container')[0] !== undefined) {
      form.find('.description-container').each(function () {
        $(this).init_specifications({
          directory: `${site.absolute_filepath}assets/`,
          processor: `${site.process}dialog`
        });
      })
    }
    if (form.find('.slider-container')[0] !== undefined) {
      form.find('.slider-container').each(function () {
        $(this).initSlider({
          editable: true,
          anchors: true,
          directory: `${site.absolute_filepath}assets/`,
          processor: `${site.process}dialog`
        })
      })
    }
    if (form.find('.items-container')[0] !== undefined) {
      form.find('.items-container').each(function () {
        let grid = parseInt($(this).data("num")) === 0 ? 4 : parseInt($(this).data("num"));
        $(this).init_cardImages({
          directory: `${site.absolute_filepath}assets/`,
          processor: `${site.process}dialog`,
          editable: false,
          grid: grid
        });
      })
    }
    if (form.find('.slave-container')[0] !== undefined) {
      form.find('.slave-container').each(function () {
        $(this).initSlave([]);
      })
    }
    if (form.find('.form-builder')[0] !== undefined) {
      form.find('.form-builder').each(function () {
        $(this).initFormBuilder([]);
      })
    }
    if (form.find('.json-container')[0] !== undefined) {
      form.find('.json-container').each(function () {
        $(this).init_objectWidget();
      })
    }
    if (form.find('.seats-container')[0] !== undefined) {
      form.find('.seats-container').each(function () {
        $(this).init_drawseats([], 0);
      })
    }
    // Dynamic Lists Manage Initialize
    if (form.find('.list-container')[0] !== undefined) {
      form.find('.list-container').each(function () {
        let options = {};
        if ($(this).find(".dynamic-lists-body").data("multiple")) {
          options.deeper = $(this).find(".dynamic-lists-body").data("multiple");
        }
        $(this).init_listManager(options);
      })
    }
    form.find('.richtext-body').richtextBody();
    form.find('.richtext-title').richtextTitle();
    setTimeout(function () {
      form.find('select[multiple]').each(function () {
        let instances = M.FormSelect.init(this);
        $(this)[0].instance = instances;
      });
    }, 1000);
    // Forms that have multiple pages
    form.prepareMultiPagerForm(a);
  })
  //
  $('#' + a).find('.unique').each(function (i, v) {
    $(v).uniqueInit()
  });
  $('#' + a).find('.modal').modal();
  $('#' + a).find('.modal [data-dismiss="modal"]').click(function () {
    $(this).closest('.modal').closeModal()
  });
  $('#' + a).find('.action-btn').click(function () {
    submitAction(this, a)
  });
  $('#' + a).find('.role-check').click(function () {
    if ($(this).prop('checked')) $(this).parent().parent().find('input:checkbox').prop({
      'checked': true
    });
    else $(this).parent().parent().find('input:checkbox').prop({
      'checked': false
    })
  });
  $('#' + a + ' .formfilterList').each(function () {
    if ($(this).attr('name') != undefined) $(this).change(function () {
      loadReport(a, this)
    });
  })

  $('#_searchBox' + a).keyup(function () {
    loadOpen(a)
  });
  $('#_rangeBox' + a).change(function () {
    $('#active_page' + a).attr({
      'data-active': 1
    }).val(1);
    loadOpen(a)
  });

  $('#' + a + ' .rlAll').click(function () {
    var cd = $(this).val();
    if ($(this).prop('checked'))
      $('#' + a + ' .cbr' + cd).prop({ "checked": true });
    else
      $('#' + a + ' .cbr' + cd).prop({ "checked": false });
    console.log($('#' + a).find($('.cbr' + cd)).length);
  })

  $('#' + a + ' .combo').each(function (i, v) {
    $(v).autocomplete(
      {
        source: $(v).data('source'),
        validate: true,
        display_fields: $(v).attr("display_fields"),
        value: $(v).attr("insert_field"),
        callback: function (response) {
          if ($(v).attr('callback') != undefined) {
            let thisFunction = $(v).attr('callback');
            window[thisFunction]($(v), response);
          }
        }
      }
    )
  });
  $('#' + a + ' .house-group:not(.extension-list) .filter').each(function (i, v) {
    $(v).filterInit(a, function () {
      loadOpen(a);
    })
  });
  $('#' + a + ' .tooltipped').tooltip({
    delay: 50
  });

  $('#' + a + ' .uploadDoc').click(function () {
    uploadModal(this, function (a, b) {
      editPicture(a, b);
    })
  });
  $('#' + a + ' .house-group:not(.extension-list) .dateFilter').each(function (i, thx) {
    $(this).initDateRange("This Month", function (result) {
      loadOpen(a);
    });
  })
  if (t != undefined && t == 2) loadSelection(key, a, 'new_form' + a);
  else if (t != 1) loadOpen(a);

}

function resetForm(a) {
  var form = $('#' + a);
  var p = form.attr('data-pageid');
  form.removeAttr('data-name data-value');
  form.find('input:not(.keep), textarea').each(function () {
    $(this).val('').removeAttr("value");
    if ($(this).attr('type') != 'date') {
      $(this).next().removeClass('active');
    }
  });
  form.find(".keep:not([type=hidden])").each(function () {
    let keepval = $(this).attr("data-keep");
    $(this).val(keepval).attr({ value: keepval });
  })
  form.find('#form_title' + p).empty();
  form.find('.extra').val('');
  form.find('.displaypicture > img').attr({
    src: ''
  });
  form.find('input:radio, input:checkbox').prop({
    'checked': false
  }).removeAttr('selected');
  form.find('.contentEdittable').each(function () {
    var df = $(this).attr('data-default');
    $(this).html(df);
  })
  form.find('select.browser-default').each(function () {
    $(this).val("").find('option').attr({ 'selected': false }).first().attr({ 'selected': true });
    if (!$(this).find('option').length) {
      $(this).next().removeClass('active');
    }
  });
  form.find('select[multiple]').each(function () {
    $(this).val([]).change();
  });
  form.find('.cashAccount').each(function () {
    var sl = $(this).attr('default-value');
    if (sl != undefined) {
      $(this).val(sl);
    }
  });
  //Resets Generic Slider
  if (form.find('.generic-slider')[0] != undefined) {
    insertSlide(form.find('.generic-slider ul.slides'), false);
  }
  //Resets Specification widget
  if (form.find('.card_specifications')[0] != undefined) {
    form.find('.card_specifications').each(function () {
      $(this).resetSpecifications();
    });
  }
  //Resets Image item widget
  if (form.find('.card_images')[0] != undefined) {
    form.find('.card_images').each(function () {
      $(this).resetCardImages();
    });
  }
  //Resets Form Builder
  if (form.find('.form-builder')[0] != undefined) {
    form.find('.form-builder').each(function () {
      $(this).resetFormBuilder();
    });
  }
  //Resets Slave Manager widget
  if (form.find('.slave-container')[0] !== undefined) {
    form.find('.slaveManager').each(function () {
      $(this).resetSlaves();
    })
  }
  //Resets JSON Object widget
  if (form.find('.widget-container')[0] !== undefined) {
    form.find('.widget-container').each(function () {
      $(this).objectWidgetReset();
    })
  }
  //Resets Transportation Seats
  if (form.find('.seats-container')[0] !== undefined) {
    form.find('.seats-container').each(function () {
      $(this).find(".draw-seats").drawseats([], 0);
    })
  }
  //Resets Dynamic lists widget
  if (form.find('.list-container')[0] !== undefined) {
    form.find('.list-container').each(function () {
      $(this).find(".dynamic-lists-body").reload_listManager(true);
    })
  }
  $('#_itemlist' + p).find('.newRow').remove();
  $('#_count' + p).val("1");

  $('.form_pic').attr({ 'src': '' });
  $('.form_image').attr({ 'src': '' });
  // Download Buttons in FormData
  form.find('.download').each(function () {
    $(this).attr({ href: '' }).hide();
  });
  form.formdata(false);//Clears formdata in the form DOM
}

function loadExtension(element) {
  let element_data = $(element).data();
  let container = $("#" + element_data.extensionid);
  let data = container.data();
  var cnd = new Array;
  var filter_col = $('#filter_col' + element_data.pageid).attr('name');
  var filter_val = $('#filter_col' + element_data.pageid).val();
  var pageType = $('#pageType' + element_data.pageid).val();
  var limit = $('#_rangeBox' + element_data.pageid).val() || 50;
  var search = $('#_searchBox' + element_data.pageid).val() || "";
  cnd.push({ name: "filter_param", value: `${filter_col},equal,${filter_val},` });
  cnd.push({ name: "pageType", value: `${pageType}` });
  cnd.push({ name: "search", value: search });
  $('#' + element_data.extensionid + ' .dateFilter').each(function () {
    if ($(this).attr('name') != undefined) cnd.push({ name: "selectDate", value: $(this).attr('data-date') });
  })
  cnd.push({ name: "limit", value: limit });
  // var condition = cnd.join('|');
  $('loader').removeClass('hide').show();
  $.post(data.action, cnd, function (response) {
    $('loader').addClass('hide').hide();
    $('#dialog_display' + element_data.pageid).html(response);
  });
}

function loadOpen(a) {
  pagetype = $('#global_page_type' + a).val();
  pagetitle = $('#global_page_title' + a).val();
  tableContainer = $('#dialog_display' + a).addClass('text-darken-1 table-container table-responsive');
  search_cols = [];
  var cnd = new Array;
  $('#' + a + ' .house-group:not(.extension-list) .filterList').each(function () {
    if ($(this).attr('name') != undefined) cnd.push($(this).attr('name') + "," + $(this).val() + ',date');
  })
  $('#' + a + ' .house-group:not(.extension-list) .filterValue').each(function () {
    if ($(this).val() != '') cnd.push($(this).val());
  })
  $('#' + a + ' .house-group:not(.extension-list) .dateFilter').each(function () {
    if ($(this).attr('name') != undefined) cnd.push($(this).attr('name') + "," + $(this).attr('data-date') + ',date');
  })
  $('#' + a + ' .search_col').each(function () {
    if ($(this).is(":checked")) search_cols.push($(this).attr("name"));
  })
  var search = $('#_searchBox' + a).val();
  var limit = $('#_rangeBox' + a).val() || 500;
  var page = $('#active_page' + a).val() || 1;
  var condition = cnd.join('|');
  if (search_cols.length && search != "") search_cols = `&search_cols=${search_cols.join(",")}`; else search_cols = "";
  var param = `${site.process}list?pageType=${pagetype}&p=0&l=4&limit=${limit}&page=${page}&search=${search}&condition=${condition}${search_cols}`;
  // alert(param);
  $('loader').removeClass('hide').show();
  $('#_reloadPage' + a).startLoader();
  $.post(param, function (res) {
    $('#_reloadPage' + a).stopLoader();
    $('loader').addClass('hide');
    var result = isJson(res);
    if (!result) {
      console.log(res);
      M.toast({ html: "An error occured, check console", displayLength: 2000, classes: "red" });
      return;
    }
    pageAlgorithm(result.total, limit, a);
    $(tableContainer).html("");
    // If nothing was fetched
    if (result.row == undefined || result.row.length == 0) {
      var ehd = $('<div>').addClass('center').appendTo(tableContainer).css({
        'width': '100%',
        'margin-top': '5%'
      });
      let range = $(`#${a}`).find(".dateFilter").length ? "within the selected date range" : "";
      if ($('#_searchBox' + a).val() == '') eText = "No " + pagetitle + ` found to display ${range}, click the ( <i class="material-icons">more_vert</i> ) icon above to create new ${pagetitle}`;
      else eText = 'No result found';
      $('<i>').attr({
        src: 'icons/playlist_add.svg'
      }).addClass('material-icons large').appendTo(ehd);
      $('<div>').html(eText).appendTo(ehd).css({
        'margin': '5%',
        'font-size': '2rem'
      });
      $(ehd).appear();
      return 0;
    }

    var table = $("<table>").addClass("table highlight").appendTo(tableContainer);
    // Table Head
    let thead = $('<thead>').addClass("thead-dark").appendTo(table).append(
      $("<tr>").append(
        $('<th>').append(
          $("<label>").append(
            $('<input>').attr({ 'type': 'checkbox', 'id': '_selectAll' + a }).addClass('cbx_all filled-in').click(function (e) {
              e.stopPropagation();
              var ck = $(this).prop('checked');
              if (ck) {
                $('#' + a).find('.cbx').prop({
                  'checked': true
                });
              } else $('#' + a).find('.cbx').prop({
                'checked': false
              });
            })
          ).append(
            $('<span>').attr({
              'for': '_selectAll' + a
            }).click(function (e) {
              e.stopPropagation();
            })
          ).append($("<span>").text("S/N"))
        )
      )
    );
    thead.find("tr").createHeaderRow(result.desc, result.fmt, result.ext);

    var opener = tableContainer.data('open') || 'swipe';
    var $recordstart = (page - 1) * limit;
    var tbody = $("<tbody>").appendTo(table);
    $.each(result.row, function (i, field) {
      $recordstart++;
      var nD = $("<tr>").appendTo(tbody).attr({
        'data-title': field.c[0],
        "id": field.i + a,
        "data-id": field.i,
        'data-open': opener
      }).click(function () {
        $(this).parent().find('tr').each(function () {
          $(this).removeClass('active');
        });
        $(this).addClass('active');
        if ($('#_journal_no' + a).val() != undefined) {
          loadJournal(this, a);
        } else if ($('#_invoice' + a).val() != undefined) {
          loadInvoice(this, a);
        } else if ($('#_load_report' + a).html() != undefined) {
          loadReport(a, this);
        } else if ($('#_toplevel' + a).val() != undefined) {
          loadTopLevel(this, a);
        } else if ($('#_tabed_details' + a).val() != undefined) {
          loadDetail(this, a);
        } else loadSelection(this, a, 'new_form' + a);
      });
      if ($('#_toplevel' + a).val() != undefined) {
        nD.contextmenu(
          function (e) {
            nD.openForm(e, a);
          }
        )
      }
      var nCs = $('<td>').addClass("").appendTo(nD);
      $("<label>").click(function (e) {
        e.stopPropagation();
      }).addClass("form-check-label").append(
        $('<input>').addClass("form-check-input cbx filled-in").attr({
          'type': 'checkbox',
          'id': 'cbx_' + field.i + a,
          'value': field.i
        })
      ).append(
        $('<span>').addClass("form-check-sign").attr({
          'for': 'cbx_' + field.i + a
        }).append($recordstart + '. ').append($("<span>").addClass("check"))
      ).appendTo(nCs)
      // $('<span>').addClass("oRow-numbering").click(function (e) {
      //   e.stopPropagation();
      // })..appendTo(nCs);
      $(nD).createRow(field, result.fmt, result.ext, result.cls);
      $(nD).appear();
    });
    table.DataTable({
      responsive: true,
      lengthMenu: [50, 100, 200]
    });

  });

}

function loadDetail(ths, a) {
  let process_url = `${site.process}loadform`;
  if (ths.active == 1) return 0;
  p = $(ths).data('id');
  filter_param = "&id=" + p;
  let cont = $("#tab-detailx" + a);
  $.getJSON(process_url + "?pageType=" + pagetype + filter_param, function (result) {
    $('loader').addClass('hide');
    if (typeof (ths) != 'number') {
      ths.active = 0;
    }
    $.each(result, function (i, field) {
      if (i == 0) ip = "";
      else ip = i;
      cont.siblings().find(".primary_key").each(function () {
        let name = $(this).data("key");
        $(this).val(field[name])
      });
      $.each(field, function (j, col) {
        var tag = '';
        var el = cont.find("." + j);

        $(el).attr({
          src: col
        })
        if ($(el).prop('tagName') != undefined) tag = $(el).prop('tagName').toLowerCase();

        if (tag == 'p') { $(el).html(col) }

        if (tag == 'select') {
          if ($(el).attr('data-value') != 'value' && $(el).attr('multiple')) {
            var cols = col ? col.split(',') : [];
            $(el).val(cols);
          } else {
            $(el).find("option[value='" + col + "']").prop('selected', true);
          }
          $(el).next().removeClass('active').addClass('active');
        }
      });
    });
  });

  $('#open_form' + a).swapDiv($('#_detail_row' + a));
  $('#edit_detail' + a).attr({ "data-id": p, "data-title": $(ths).attr('data-title') });
}

function loadDetailTab(ths, a) {
  let tab_data = $(ths).data();
  let href = $(ths).attr("href");
  let container = $(href).find(".display-detail");
  let condition = $(href).find(".primary_key");
  let process_url = `${site.process}list?pageType=${tab_data.source}&p=0&l=4&limit=100&condition=${condition.attr('name')},${condition.val()}`;
  container[0].process_url = process_url;
  if ($(container).attr("current") != condition.val()) {
    $(container).empty();
    container.startLoader(false, 25);
    $(container).parent().find("p.error").remove();
    jQuery.post(process_url, {}, function (response) {
      container.stopLoader();
      var result = isJson(response);
      if (!result) {
        console.log(response);
        M.toast({ html: "An error occured, check console", displayLength: 2000, classes: "red" });
      } else if (result.row == undefined || result.row.length == 0) {
        $(container).parent().append($("<p>").addClass("error").text("No Data Found"))
      } else {
        $(container).createHeaderRow(result.desc, result.fmt, result.cls);
        $.each(result.row, function (i, field) {
          $(container).createRow(field, result.fmt, result.ext, result.cls);
          $(container).appear();
          $(container).attr({ current: condition.val() });
        })
      }
    })
  }
  // alert(process_url);
}

function loadTopLevel(ths, a) {
  var parentTitle = $('#_toplevel' + a).val();
  var p = $(ths).data('id');
  var id = parseInt(p);
  if (ths.active == 1) return 0;
  var dt = $(ths).find('td').eq(1);
  var t = $(dt).text();
  $('loader').addClass('hide');
  ths.active = 0;
  $('#' + a).swapDiv('#' + parentTitle);
  $('#_linkInput' + parentTitle).val(p);
  var n = $('#_linkFilter' + parentTitle).attr('name');
  $('#_linkFilter' + parentTitle).val(n + ',' + p);
  $('#_linkTitle' + parentTitle).html(t);
  //alert(parentTitle);
  loadOpen(parentTitle);
  var hie_name = $('#hierachy' + a).val();
  $('#' + parentTitle).find('form').each(function () {
    if ($(this).find('input[name=' + hie_name + ']')[0] == null) {
      $(this).append($('<input>').attr({ type: 'hidden', name: hie_name, value: id }));
    } else {
      $(this).find('input[name=' + hie_name + ']').val(id);
    }
    if ($(this).find('input[name=hierachy_name]')[0] == null) {
      $(this).append($('<input>').attr({ type: 'hidden', 'name': 'hierachy_name', value: $(ths).attr('data-title') }));
    } else {
      $(this).find('input[name=hierachy_name]').val($(ths).attr('data-title'));
    }
  });
}

function loadSelection(ths, a, formpage, form_view) {
  if (typeof (ths) != 'number') {
    form_view = form_view || $(ths).data('open');
  } else {
    form_view = "swipe";
  }
  // How did this come about ?
  if (typeof (ths) == 'number') {
    p = ths;
  } else {
    if (ths.active == 1) return 0;
    p = $(ths).attr('data-id');
  }
  if (a) {
    formpage = formpage.replace(a, '') + a;
  }
  var form = $('#' + formpage).find('form').eq(0);

  var title = typeof (ths) != 'number' ? $(ths).attr('data-title') : '';
  pagetype = $('#global_page_type' + a).val();
  $('loader').removeClass('hide').show();
  if (typeof (ths) != 'number') {
    ths.active = 1;
  }
  let process_url;
  if (form_view != "extension") {
    resetForm(form.attr('id'));
    process_url = `${site.process}loadform`;
    filter_param = "&id=" + p;
  } else {
    let exdata = $('#' + formpage).data();
    process_url = exdata.action;
    pagetype = exdata.pagetype;
    filter_param = `&filter_param=${exdata.filter_col},equal,${p},&selectDate=This Year`;
    $('#' + formpage).children(".filter_col").val(p);
  }
  form.attr({ 'data-name': title, 'data-value': p });
  $.get(process_url + "?pageType=" + pagetype + filter_param, function (result) {
    $('loader').addClass('hide');
    if (typeof (ths) != 'number') {
      ths.active = 0;
    }
    $('#form_title' + a).text(title);
    if (form_view == "extension") {
      let ext = $("#" + formpage).data("extensionid");
      $("#dialog_display" + ext).html(result);
      $("#open_form" + a).swapDiv($("#" + formpage))
    } else {
      result = isJson(result);
      $.each(result, function (i, field) {
        if (i == 0) ip = "";
        else ip = i;
        $.each(field, function (j, col) {
          if (j == 'roledesc') {
            var pr = col.split(',');
            for (var ip in pr) {
              var pn = pr[ip].replace(':', '_');
              //alert("#"+pn+a)
              form.find("#" + pn + a).prop('checked', true);
            }
          }
          var tag = '';

          //alert("#"+j+a+" : "+col)
          var el = form.find("#" + j + a).val(col);

          form.find('.displaypicture > img#' + j + a).attr({
            src: col
          })
          if ($(el).prop('tagName') != undefined) tag = $(el).prop('tagName').toLowerCase();

          if ($(el).hasClass('contentEdittable')) {
            $(el).html(col);
          }
          if ($(el).is(':checkbox')) {
            if (parseInt(col) === 0) {
              $(el).prop('checked', false);
            } else {
              $(el).prop('checked', true);
            }
          }
          if (tag == 'div') { $(el).html(col) }
          if (tag == 'select') {
            if ($(el).attr('data-value') != 'value' && $(el).attr('multiple')) {
              var cols = col ? col.split(',') : [];
              $(el).val(cols);
            } else {
              $(el).find("option[value='" + col + "']").prop('selected', true);
            }
            $(el).next().removeClass('active').addClass('active');
          } else if (tag == 'input' || tag == 'textarea') {
            if (col) {
              if ($(el).attr('type') == 'date') {
                var date = moment(col).format("YYYY-MM-DD");
                $(el).val(date)
              }
              $(el).next().removeClass('active').addClass('active');
            } else {
              if ($(el).attr('type') != 'date') {
                $(el).next().removeClass('active');
              }
            }
          }
          if (defaultClass != undefined) $(el).removeClass(defaultClass);
        });
        if (form.find('.download')) {
          form.find('.download').each(function () {
            let name = $(this).attr('name');
            if (field[name]) {
              $(this).attr({
                href: field[name]
              });
            }
          });
        }
        //Insert page image Sliders
        if (form.find('.generic-slider')[0] !== undefined) {
          form.find('.generic-slider').each(function () {
            var name = $(this).parent().attr('name');
            if (field[name] !== undefined) {
              var spec = isJson(field[name]);
              if (spec !== false) {
                $(this).reloadSlider(spec);
              }
            }
          });
        }
        //Insert page product descriptions
        if (form.find('.card_specifications')[0] !== undefined) {
          form.find('.card_specifications').each(function () {
            var name = $(this).parent().attr('name');
            if (field[name] !== undefined) {
              var spec = isJson(field[name]);
              if (spec !== false) {
                $(this).reloadSpecifications(spec);
              }
            }
          });
        }
        //Insert page product descriptions
        if (form.find('.card_images')[0] !== undefined) {
          form.find('.card_images').each(function () {
            var name = $(this).parent().attr('name');
            if (field[name] !== undefined) {
              var spec = isJson(field[name]);
              if (spec !== false) {
                $(this).reload_cardImages(spec);
              }
            }
          });
        }
        //Insert form field json data
        if (form.find('.form-builder')[0] !== undefined) {
          form.find('.form-builder').each(function () {
            var name = $(this).attr('name');
            if (field[name] !== undefined) {
              var spec = isJson(field[name]);
              if (spec !== false) {
                $(this).reload_formBuilder(spec);
              }
            }
          });
        }
        //inserts Slave component
        if (form.find('.slave-container')[0] !== undefined) {
          form.find('.slaveManager').each(function () {
            var name = $(this).attr('name');
            var spec = [];
            if (field[name] !== undefined) {
              spec = isJson(field[name]);
              if (spec !== false) { }
            }
            $(this).resetSlaves(spec);
          });
        }
        //inserts JSON Widget
        if (form.find('.widget-container')[0] !== undefined) {
          form.find('.widget-container').each(function () {
            var name = $(this).parent().attr('name');
            var data = [];
            if (field[name] !== undefined) {
              data = isJson(field[name]);
            }
            $(this).loadObjectWidget(data);
          });
        }
        //Images
        if (form.find(".form_pic")[0] !== undefined) {
          form.find(".form_pic").each(function () {
            var name = $(this).attr('data-name');
            //alert(field[name])
            if (field[name] !== undefined) {
              $(this).attr({
                'src': field[name]
              });
            }
          });
        }
        //Loads Dynamic lists widget
        if (form.find('.list-container')[0] !== undefined) {
          form.find('.list-container').each(function () {
            setTimeout(() => {
              $(this).find(".dynamic-lists-body").reload_listManager();
            }, 50)
          })
        }

        // Transaction
        if ($('#trans_no' + a).val() != undefined) {
          loadTransaction(result, $('#trans_no' + a));
        }
        // Booked Seats
        if ($('#formData' + a).find('.seats-container')[0] !== undefined) {
          $('#formData' + a).find('.seats-container').each(function () {
            var name = $(this).find("input.selected").attr('name'); var selected = 0;
            if (field[name] !== undefined) {
              selected = field[name];
            }
            $(this).children(".draw-seats").drawseats([], selected);
          })
        }
      });
      form.find('.download').each(function () {
        let href = $(this).attr('href');
        if (!href) {
          $(this).hide();
        } else {
          $(this).show();
        }
      });
      // Select options
      form.find("select[onchange]").trigger("change");
      form.find("select[multiple]").each(function () {
        // let dx = this;
        // setTimeout(()=>{
        //   // Patching the multi-select to display selected values
        //     $(dx).siblings("input.select-dropdown").click();
        //     form.click();
        // },200);
      });
      if (typeof (ths) != 'number') {
        form_view = form_view || $(ths).data('open');
        if (form_view == "modal") {
          $('#' + formpage).openModal();
        } else if (form_view == 'results') {
          loadResults(a, ths);
        } else {
          //alert(formpage);
          newForm(formpage);
        }
      }
    }

    if (form.attr("onload")) {
      let thisFunction = form.attr("onload");
      window[thisFunction](form, function (response) {

      });
    }
  });
}

function saveForm(a, ths, p) {
  if (ths.active == 1) return 0;
  var error = 0;
  var form = $(ths).closest("form");
  form.find('input[data-label]').each(function () {
    if ($(this).is(':visible') && $(this).attr('data-label') != $(this).val()) {
      error++;
      if ($(this).val() != "") M.toast({ html: $(this).val() + ' is invalid', displayLength: 4000, classes: "" });
    }
  });
  form.find('.unique').each(function () {
    if ($(this).val() == "" || $(this).attr('validate') == 'false') {
      error++;
      if ($(this).val() != "") M.toast({ html: $(this).val() + ' already exists', displayLength: 4000, classes: "" });
    }
  });


  form.find('.role').each(function () {
    var dId = new Array;
    $(this).find('input:checkbox:checked').each(function () {
      dId.push($(this).val());
    })
    if (dId.length) {
      var strId = dId.join();
      $(this).find('input:hidden').val(strId);
    }
  });
  var modal = $(ths).data('modal');
  if (!error) {
    if (modal) {
      $('#' + modal + a).openModal();
      $('#' + modal + a).find('input')
    } else {
      //$('#status'+a)
      if (form[0].checkValidity()) {
        p = form.attr('callback') ? function (formdata, response) {
          let $callback_function = form.attr('callback');
          window[$callback_function](formdata, response);
        } : p;
        performSave(a, ths, p);
      } else {
        form.find('input[required], select[required], textarea[required]').each(function () {
          if ($(this).val() == "" && !$(this).is(':visible') && $(this).attr("id")) {
            let description = $(this).attr('placeholder') || $(this).next("label").text();
            description = description || $(this).attr("name");
            M.toast({ html: description + ' is empty', displayLength: 1000, classes: "red" });
            return false;
          }
        });
      }
    }
  }
}

function filterObj(param) {
  let returnArray = [];
  let collectionObj = {};
  for (const key in param) {
    const object = param[key];
    const name = object.name;
    const value = object.value;
    if (collectionObj[name] === undefined) {
      collectionObj[name] = [];
    }
    collectionObj[name].push(value);
  }
  for (const key in collectionObj) {
    const value = collectionObj[key].join(',');
    returnArray.push({
      name: key,
      value: value
    })
  }
  return returnArray;
}

function performSave(a, ths, callback) {
  var go = true;
  var form = $(ths).closest("form");
  var param = form.serializeArray();

  // Find Check Boxes
  if ($('#dialog_display' + a).find('.cbx:checked').length) {
    let checked_rows_ids = [];
    $('#dialog_display' + a).find('.cbx:checked').each(function () {
      checked_rows_ids.push($(this).val());
    });
    param.push({
      'name': "filter_checkbox",
      'value': checked_rows_ids
    });
  }

  form.find('.contentEdittable').each(function () {
    var key = $(this).attr('name');
    var val = $(this).hasClass('richtext-title') ? $(this).text().trim() : $(this).html().trim();
    param.push({
      'name': key,
      'value': val
    });
  })

  //Collect checkboxes
  form.find('input:checkbox').each(function () {
    var key = $(this).attr('name');
    var val = !$(this).prop('checked') ? 0 : 1;
    for (let i in param) {
      if (param[i].name === key) {
        delete param[i];
      }
    }
    param.push({
      'name': key,
      'value': val
    });
  });

  //collect image slider
  if (form.find('.generic-slider').length) {
    var dom = form.find('.generic-slider');
    dom.each(function () {
      if ($(this).parent().attr('name') != undefined) {
        var stringed_images = $(this).readSlider();
        if ($(this).parent().hasClass('required') && !stringed_images.length) {
          M.toast({ html: "Add an image to the slider", displayLength: 2000, classes: "red" });
          go = false
          return;
        }
        param.push({
          'name': $(this).parent().attr('name'),
          'value': JSON.stringify(stringed_images)
        });
      }
    });
  }
  //Collect items data
  if (form.find('.card_images').length) {
    var dom = form.find('.card_images');
    dom.each(function () {
      if ($(this).parent().attr('name') != undefined) {
        var imgCard = $(this).read_imageCard();
        if ($(this).parent().hasClass('required') && !imgCard.length) {
          M.toast({ html: "Add an image to the slider", displayLength: 2000, classes: "red" });
          go = false
          return;
        }
        param.push({
          'name': $(this).parent().attr('name'),
          'value': JSON.stringify(imgCard)
        });
      }
    });
  }
  //Save FormBuilder Data
  if (form.find('.form-builder').length) {
    var dom = form.find('.form-builder');
    dom.each(function () {
      if ($(this).attr('name') != undefined) {
        var datax = $(this).read_formBuilder();
        if ($(this).hasClass('required') && !datax.length) {
          M.toast({ html: "Add form fields to the form builder", displayLength: 2000, classes: "red" });
          go = false
          return;
        }
        param.push({
          'name': $(this).attr('name'),
          'value': JSON.stringify(datax)
        });
      }
    });
  }
  //Collect Slave data
  if (form.find('.slave-container').length) {
    var dom = form.find('.slaveManager');
    dom.each(function () {
      if ($(this).attr('name') != undefined) {
        var slaves = $(this).getSlaves();
        if ($(this).parent().hasClass('required') && !slaves.length) {
          M.toast({ html: "Add a slave to the item", displayLength: 2000, classes: "red" });
          go = false
          return;
        }
        param.push({
          'name': $(this).attr('name'),
          'value': JSON.stringify(slaves)
        });
      }
    });
  }
  //collect product description
  if (form.find('.card_specifications').length) {
    var dom = form.find('.card_specifications');
    dom.each(function () {
      if ($(this).parent().attr('name') != undefined) {
        var spec = $(this).getSpecifications();
        if ($(this).parent().hasClass('required') && !spec.length) {
          M.toast({ html: `${$(this).parent().data('name')} is Empty`, displayLength: 2000, classes: "red" });
          go = false;
          return;
        }
        param.push({
          'name': $(this).parent().attr('name'),
          'value': JSON.stringify(spec)
        });
      }
    });
  }
  //collect JSON widget data
  if (form.find('.widget-container').length) {
    var dom = form.find('.widget-container');
    dom.each(function () {
      var name = $(this).parent().attr('name');
      if (name != undefined) {
        var data = $(this).saveObjectWidget();
        if ($(this).parent().hasClass('required') && !spec.length) {
          M.toast({ html: name + " is empty", displayLength: 2000, classes: "red" });
          go = false;
          return;
        }
        param.push({
          'name': name,
          'value': JSON.stringify(data)
        });
      }
    });
  }
  if (go === false) {
    return;
  }

  let process_url = `${site.process}saveform`;
  if ($('#trans_no' + a).val() != undefined) {
    // Send print to the process_transaction to initiate print reciept
    let p = (typeof (callback) == "number") ? "?print=1" : ""; process_url = `${site.process}transaction${p}`;
  }
  process_url = form.data("action") || process_url;
  let formdata = form.formdata();
  param = param.concat(formdata);
  form.disableForm();
  ths.active = 1;
  $('loader').removeClass('hide').show();
  $.post(process_url, filterObj(param)).done(function (response) {
    $('loader').addClass('hide');
    form.enableForm();
    ths.active = 0;
    let data;
    if (typeof (response) == "object") data = response;
    else data = isJson(response);
    if (data) {
      if (data.status == 1) {
        M.toast({ html: "Successfully submitted", displayLength: 4000, classes: "green" });
        if (form.closest('.modal').length) {
          form.closest('.modal').closeModal();
        } else if (form.find('.modal')) {
          form.find('.modal').each(function () {
            $(this).closeModal();
          })
        }
        if (typeof (callback) == 'function') {
          callback(data);
        }
        if ($('#noreset' + a).get(0) == null) {
          resetForm(form.attr("id"));
          loadOpen(a);
        }
        if (data.print && data.data) {
          let temp = $('<div>').hide().appendTo("body").html(data.data);
          setTimeout(function () {
            temp.divPrint();
            setTimeout(function () {
              temp.remove();
            }, 10000);
          }, 500);
        }
      } else {
        M.toast({ html: data.message, displayLength: 3000, classes: "red" });
      }
    } else {
      console.log(response);
      M.toast({ html: "An Error Ocurred", displayLength: 3000, classes: "red" });
      return;
    }
  });
}

function printForm(a, thx, id = null) {
  let print_url = $('#formData' + a).data("receipt");
  let uniqueEL = $('#formData' + a).find(".uniqueId");
  let uniqueId = id || uniqueEL.val();
  let pageType = $("#global_page_type" + a).attr("value");
  if (!print_url) M.toast({ html: "This form doesn't have print link", classes: "red" });
  else if (!uniqueId) M.toast({ html: "This form needs to be saved first", classes: "red" });
  else {
    let uniqueName = uniqueEL.attr("name");
    $(thx).startLoader();
    $.get(`${print_url}?${uniqueName}=${uniqueId}&pageType=${pageType}`, {}, function (response) {
      $(thx).stopLoader();
      let temp = $('<div>').hide().appendTo("body").html(response);
      setTimeout(function () {
        temp.divPrint();
        setTimeout(function () {
          temp.remove();
        }, 10000);
      }, 500);
    })
  }
}

function deleteMultiple(a) {
  pagetype = $('#global_page_type' + a).val();
  var dId = new Array;
  $('#' + a + ' .cbx:checked').each(function () {
    dId.push($(this).val())
  });
  if (dId.length) {
    var strId = dId.join();
    $(this).questionBox(' Are you sure you want to delete these row(s)', function () {
      $('loader').removeClass('hide').show();
      $.post(`${site.process}delete`, {
        'delIds': strId,
        'pageType': pagetype
      }, function (data) {
        $('loader').addClass('hide');
        let response = isJson(data);
        if (response) {
          if (response.status) {
            for (var k = 0; k < dId.length; k++) {
              $("#" + dId[k] + a).remove();
            }
          } else {
            console.log(data);
          }
          M.toast({ html: response.message, classes: response.color });
        } else {
          console.log(data);
          M.toast({ html: "An Error Occured", classes: "red" });
        }

      })
    }, true);
  } else M.toast({ html: "No row selected. Select row first", displayLength: 2000, classes: "red" });
}

function deleteSingle(a) {
  pagetype = $('#global_page_type' + a).val();
  var dId = new Array;
  $('#' + a + ' .uniqueId').each(function () {
    dId.push($(this).val())
  });
  var strId = dId.join('');
  if (strId != '') {
    $(this).questionBox(' Are you sure you want to delete', function () {
      $('loader').removeClass('hide').show();
      $.post(`${site.process}delete`, {
        'delIds': strId,
        'pageType': pagetype
      }, function (data) {
        console.log(data);
        $('loader').addClass('hide');
        if (data == '1') {

          for (var k = 0; k < dId.length; k++) {
            $("#" + dId[k] + a).remove();
          }
          M.toast({ html: "Record successfully deleted", displayLength: 2000, classes: "green" });
          resetForm('formData' + a);
        } else M.toast({ html: "Error deleting rows or you donot have access for deletion", displayLength: 4000, classes: "red" });

      })
    });
  } else M.toast({ html: "No record selected", displayLength: 2000, classes: "grey" });
}

function navigateForm(a, ths) {
  let current = $("#dialog_display" + a + " > a.active").eq(0);
  let move = $(ths).data('move') == "next" ? current.next() : current.prev();
  move.click();
}

function submitAction(element, pageType) {
  saveForm(pageType, element);
}

$.fn.extend({
  prepareMultiPagerForm: function (a) {
    var thsfom = $(this);
    thsfom.find('.page').eq(0).addClass('active'); //Activate the first page
    if (thsfom.find('.page').length > 1) { // If pages are more than one
      thsfom.find('.page').not('.active').hide();
      thsfom.find('.flt ul').prepend($('<li>').hide().append($('<a>').addClass('prevPage').append($('<img>').attr({ 'src': 'icons/chevron_left.svg' }).addClass('material-icons small'))));
      thsfom.find('.prevPage').click(function () {
        var form = $(this).closest('form');
        var active = form.find('.page.active').eq(0);
        var pages = form.find('.page');
        $(active).swapDiv(active.prev('.page'));
        pages.removeClass('active');
        active.prev('.page').addClass('active');
        thsfom.find('.nextPage').parent().show();
        $(`#formSave${a}`).parent().hide();
        // Last page for previous navigation
        if (!form.find('.page.active').prev('.page').length) {
          $(this).parent().hide();
        }
        //Hide previous of first page
        if (form.find('.page.active').next('.page').length) {
          thsfom.find('.flt button.nextPage').attr({
            disabled: false
          });
          // $( `#formSave${a}`).hide();
        }
      });
      thsfom.find('.flt button.formSave').removeAttr('id').addClass('nextPage teal').removeClass('red').off('click').click(function () {
        var form = $(this).closest('form');
        var active = form.find('.page.active').eq(0);
        var pages = form.find('.page');
        $(active).swapDiv(active.next('.page'));
        pages.removeClass('active');
        active.next('.page').addClass('active');
        // End of forward navigation
        if (!form.find('.page.active').next('.page').length) {
          $(this).attr({
            'disabled': true
          });
          thsfom.find('.nextPage').parent().hide();
          $(`#formSave${a}`).parent().show();
        }
        // End of backward navigation
        if (form.find('.page.active').prev('.page').length) {
          thsfom.find('.prevPage').parent().show();
        }
      }).find('img').attr({
        'src': 'icons/chevron_right.svg'
      });
      thsfom.find('.flt ul').append($('<li>').hide().append($('<button>').attr({ 'id': 'formSave' + a }).addClass('btn-floating orange').click(function () {
        saveForm(a, this);
      }).append($('<img>').attr({ 'src': 'icons/send.svg' }).addClass('material-icons')))
      );
    } else {
      thsfom.find('.prevPage').remove();
      thsfom.find('.flt ul #secondarySave' + a).remove();
    }
  }
});

function toTitleCase(str) {
  //console.log(str);
  if (!str) return '-';
  else if (typeof (str) != 'string') return str;
  else return str.replace(/\w\S*/g, function (txt) {
    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
  });
}

function loadClose(a) {
  var page = a.split('_');
  page = '_' + page[page.length - parseInt(1)];
  loadOpen(page);
  $('#' + a).swapDiv($('#open_form' + page));
}

function synchronize(ths) {

  $(ths).questionBox('Are you sure you want to run synchronization', function () {
    var obj = {
      switch: 1
    };
    $(ths).find('img').addClass('rotating');
    $('loader').removeClass('hide').show();
    $.post('backup_database.php', obj, function (response) {
      $(ths).find('img').removeClass('rotating');
      $('loader').addClass('hide');
      if (response == 'done') {
        M.toast({ html: "Successfully Synchronized", displayLength: 2000, classes: "green" });
      } else {
        console.log(response);
        M.toast({ html: "An error occured , check console", displayLength: 2000, classes: "red" });
      }
    })
  });
}

$.fn.extend({
  initDateRange: function (defaultRange, callback) {
    var thx = this;
    var obj = {
      "showDropdowns": true,
      firstDayOfWeek: 0,
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')],
        'All': [moment().subtract(20, 'year').startOf('year'), moment().add(1, 'year').startOf('year')],
      },
      startDate: moment().startOf('month'),
      endDate: moment(),
      "alwaysShowCalendars": true,
      "minDate": "01/01/2010",
      //"maxDate": moment(),
      "opens": "left",
      "drops": 'bottom'
    }
    if (obj.ranges[defaultRange]) {
      if (!obj.ranges[defaultRange].length) {
        $(thx).attr({
          'data-date': defaultRange
        });
      } else {
        $(thx).attr({
          'data-date': obj.ranges[defaultRange][0].format('L') + ' - ' + obj.ranges[defaultRange][1].format('L')
        });
      }
    } else {
      $(thx).attr({
        'data-date': moment().format('L') + ' - ' + moment().format('L')
      });
    }
    $(thx).daterangepicker(obj, function (startDate, endDate, label) {
      setTimeout(function () {
        let value = (label == "Reset") ? "" : startDate.format('L') + ' - ' + endDate.format('L');
        $(thx).attr({
          'data-date': value
        });
        $(thx).val(label);
        if (typeof (callback) == 'function') {
          callback({
            startDate: startDate,
            endDate: endDate,
            label: label
          });
        }
      }, 10);
    });
    var val = defaultRange || 'Today';
    $(thx).val(val);
  }
})

function heirachy_select(x) {//no1
  var $this = $(x);
  var a = $this.data('pageid');
  var target = $this.data('target');
  var source = $this.data('target-source');
  var action = $this.data('target-action');
  var key = $this.data('value');
  var val = $this.val() || null;
  val = $this.find('option[value=' + val + ']').data('value');
  let send = {};
  var obj = {
    source: source,
    value: val,
    action: action,
  };
  if (obj.value !== undefined) {
    send[target + a] = obj;
    $('loader').removeClass('hide').show();
    $.post(`${site.process}dropdown`, send, function (response) {
      $('loader').addClass('hide');
      var data = isJson(response);
      if (data) {
        for (let id in data) {
          sel = $("#" + id);
          if (action == 'fillup') {
            fillup(x, data[id]);
            return;
          }
          val = sel.val();
          sel.empty();
          if (sel.attr('data-empty') == 1) {
            sel.append($('<option>').attr({
              value: ""
            }).text('Select'));
          }
          for (var i in data[id]) {
            let opkey = i;
            if (key == 'value') opkey = data[id][i].replace(' ', '-');
            sel.append($('<option>').attr({
              'data-value': i,
              value: opkey
            }).text(data[id][i]));
          }
          sel.val(val);
        }
      } else {
        console.log(response);
        errrrrrr();
      }
    });
  } else {
    errrrrrr();
  }

  function errrrrrr() {
    let targets = target.split(',');
    targets = targets.map(s => s.trim());
    for (let i in targets) {
      let target = targets[i];
      let el = $('#' + target + a);
      el.val('');
      el.next().removeClass('active');
    }
  }
}

function fillup(x, data) {
  var $this = $(x);
  var a = $this.data('pageid');
  var targets = $this.data('target').split(',');
  var source = $this.data('target-source');
  targets = targets.map(s => s.trim());
  var filters = source.split('~')[1].split('*');
  let card = $this.closest('.card');
  for (let i in targets) {
    let target = targets[i];
    let filter = filters[i];
    if (filter && data[filter]) {
      card.find('#' + target + a).val(data[filter]);
      card.find('#' + target + a).next().addClass('active');
    } else {
      card.find('#' + target + a).val('');
      card.find('#' + target + a).next().removeClass('active');
    }
  }
}

//This function automatically reloads all select elements options in a form once you open the form.
function reload_selects(a) {//no2
  var data = {}, found = 0;
  setTimeout(function () {
    var arr = [];
    //form an array of all lower hierachy elements.
    $('#formData' + a).find('select[data-target]').each(function () { arr.push($(this).data('target') + a); });
    $('#formData' + a).find('select:not(.keep)').each(function () {
      if ($(this).attr("multiple") == undefined) {
        var obj = {};
        var id = $(this).attr('id');//id of this element
        //Excluding lower hierachy elements from the loop because the information needed for its data to be gotten is dependent on its higher hierachy element. And it would be gotten from there instead.
        if ($.inArray(id, arr) == -1) {
          obj.source = $(this).data('source');
          obj.key = $(this).data('value');
          //forming data for lower hierachy elements
          if ($(this).data('target') != undefined) {
            var nObj = {};
            var nIid = $(this).data('target') + a;
            nObj.value = $(this).val();
            nObj.column = $(this).data('target-column');
            nObj.source = $(this).data('target-source');
            data[nIid] = nObj;
          }
          data[id] = obj;
          found++;
        } else {
          $(this).addClass('heirachy');
        }
      }
    });

    if (found > 0) {//console.log(data);//return;
      // return ;
      // console.log(data);
      $.post(`${site.process}dropdown`, data, function (response) {
        var data_ = isJson(response);
        if (!data_) {
          console.log(response);
        } else {
          //console.log(response);
          for (var id in data_) {
            var val = $('#' + id).val();
            $('#' + id).empty();
            //Deals with empty-default value of a select
            if ($('#' + id).attr('data-empty') == 1) { $('#' + id).append($('<option>').attr({ value: "" }).text('Select')); }
            for (var i in data_[id]) {
              let thisval = data_[id][i];
              let opkey = i;
              if (data[id].key == 'value') opkey = thisval.replace(' ', '-');
              $('#' + id).append($('<option>').attr({ 'data-value': i, value: opkey }).text(thisval));
            }
            $('#' + id).val(val);
          }
        }
      });
    }
    combo_reload(a);
  }, 250);
}

//This function Dynamically reloads any particular select box you choose(target).
function reload_select(thix, target) {
  let $this = $(thix);
  let pageid = $this.data("pageid");
  let num = "";
  let send = {};
  if ($this.closest(".desc.crv") != undefined) {
    num = $this.closest(".desc.crv").data("num");
  };
  let element = $("#" + target + num + pageid);
  send[element.attr("id")] = {
    source: element.data("source")
  };
  $.post(`${site.process}dropdown`, data, function (response) {
    var data_ = isJson(response);
    if (data_ == false) {
      console.log(response);
    } else {
      element.empty();
      for (var i in data_[id]) {
        let thisval = data_[id][i];
        let opkey = i;
        if (element.key == 'value') opkey = thisval.replace(' ', '-');
        element.append($('<option>').attr({ 'data-value': i, value: opkey }).text(thisval));
      }
    }
  });
}

function combo_reload(a) {
  let $send = {};
  let found = 0;
  $('#formData' + a).find("input.combo:not(.keep)").each(function () {
    let keyname = $(this).attr("id");
    let source = $(this).data("source");
    if (source) {
      $send[keyname] = {
        source: source,
      };
      found++;
    }
  });
  if (found) {
    $.post(`${site.process}dropdown`, $send, function (response) {
      let data = isJson(response);
      if (data) {
        for (let id in data) {
          $("#" + id).modifySource(data[id]);
        }
      }
    })
  }
}

function pageAlgorithm($total, $limit, a) {
  var dec = $total / $limit,
    floor = Math.ceil(dec);
  floor = floor > 29 ? 29 : floor;
  if ($('#cont' + a).children('.list')[0] == undefined) {
    $('#cont' + a).append($("<div>").addClass('list'));
  }
  var pages_cont = $('#cont' + a).children('.list');
  var active = $('#active_page' + a).attr('data-active') || 1;
  active = parseInt(active);
  pages_cont.empty();
  if (dec > 1) {
    for (i = 1; i <= floor; i++) {
      var o = i;
      $('<a>').addClass(function () {
        if (o == active) {
          return "active";
        }
      }).click(function () {
        loadpage(this);
      }).attr({
        'data-pagenum': o
      }).text(o).appendTo(pages_cont);
    }
  } else {
    pages_cont.remove();
  }
  return pages_cont;
}

function generic_file_selector(x, a) {
  $(x).uploadDialog({
    callback: function (a, data) {
      $(a).next().find('.file-path').val(data.src);
    }
  });
}

function loadpage(x) {
  var a = $(x).parent().parent().data('pageid');
  var page = $(x).data('pagenum');
  //alert(page);
  $('#active_page' + a).attr({
    'data-active': page
  }).val(page);
  loadOpen(a);
}

function reloadPageList(a) {
  $('#' + a + ' .filterList').each(function () {
    $(this).val('');
    $(this).attr({
      value: ''
    });
  });
  $('#' + a + ' .filterValue').not(".keep").each(function () {
    $(this).val('');
    $(this).attr({ value: '' });
  });
  $('#' + a + ' .dateFilter').each(function () {
    $(this).val('');
    $(this).attr({
      value: ''
    });
  });
  $('#_rangeBox' + a).val('');
  loadOpen(a);
}

function close_extension_view(x) {
  let data = $(x).data();
  let ext = $(x).closest(".extension-list");
  ext.swapDiv($("#open_form" + ext.data("pageid")));
  ext.find(".collection").empty();
}
