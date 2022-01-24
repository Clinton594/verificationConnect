// UploadDialog_v2_0 JavaScript Document
/*
  version 2.0
  This is an advanced but very simple to use multitasking file upload and manager
  it requires these dependencies:
  Jquery.js
  Jquery-ui.js
  Materialize.css
  Materialize.js
  Extensions_v2.js
  UploadDialog_v2.css


  *TO INITIALIZE
  - 	call $(Element).uploadDialog({
      callback: function,
      onDrag: function
    });
    -	Element is the Html that contains these properties (DOM)
      - data-href : the ajax processing page (STRING)
        - default href is 'upload.php'
      - data-path : default path to get and store files (STRING)
        - default path is 'assets/picture/'
      - data-type : picture, pdf, audio, video or all (STRING)
        - Only one is required, the selected one becomes the active tab
        - Not a must
        - NB: These stuffs are call resources
      - data-edit : 0, 1, 2 (INTEGER)
        - O : No file edit
        - 1 : File edit with css styling
        - 2 : File edit with title, description, (optional : anchor name, anchor href)
      - data-anchor : true(boolean or string) (for data-edit:2 only) and (for pictures only)
        - Once defined, the resource editor for data-edit 2 would create input anchor links for the picture
        - Not a must
      - data-display : picture, pdf, audio, video or all (STRING)
        - selecting the tabs to display, use all to display all or use comma to select multiple tabs
        - default is picture assuming this property is ommitted
    - 	callback is a function to run after a particular process is completed (FUNCTION)
      - It is required
      - It returns 2 variables always (Element, data)
    - 	onDrag is a callback function to run after a file has been dragged/moved to a folder
      - It's optional

  * TO MODIFY
  - call $(Element).modify_resource({
      callback: function,
      onDrag: function,
      data : {}
    })
    - Element is still same properties with above
      - data-edit property is required here (0, 1, 2)
    - Data is an object of current values to be edited
      - It's different for each data-edit
      - for data-edit:1 -> data = {
        src:'file source',
        alt:'Alternative for unloaded images (optional) (string)',
        type:'file type (picture, audio, pdf, document, video, archive)'
      }
      - for data-edit:2 -> data = {
        src:'file source',
        title:'File Title (optional) (string)',
        desc:'File Description (optional) (string)',
        type:'file type (picture, audio, pdf, document, video, archive)'
      }
    - 	onDrag is a callback function to run after a file has been dragged/moved to a folder
      - It's optional


*/
var div_hold = {};
var div_hold2 = {};
var defaultPage = `${site.process}dialog`; //php process page, default location in rear dir
var defaultPath = "assets/"; //with respect to the current php page
var processing = $("#upload_modal .progress");
$.fn.extend({
  modify_resource: function (init) {
    var $this = $(this);
    if (typeof init.callback != "function") {
      M.toast({
        html: "This operation requires a callback function",
        displayLength: 2000,
        classes: "red",
      });
      return;
    }
    if (!$this.attr("data-edit")) {
      $this.attr({ "data-edit": 0 });
    }
    var crop = $this.attr("data-edit");
    if (!$this.attr("data-path")) {
      $this.attr({ "data-path": defaultPath });
    }
    if (!$this.attr("data-href")) {
      $this.attr({ "data-href": defaultPage });
    }
    if (crop != 1 && crop != 2) {
      $(this).uploadDialog(init);
    } else {
      $this.attr({ "data-hide": true });
      if (!$this.attr("data-display")) {
        $this.attr({ "data-display": "picture" });
      }
      $(this).uploadDialog(init);
      if (crop == 1) {
        call_resourceModal_1(this, init.data, true);
      } else if (crop == 2) {
        call_resourceModal_2(this, init.data, true);
      }
    }
  },
});

$.fn.extend({
  uploadDialog: function (init) {
    var a = this;
    var type = !$(a).attr("data-type") ? "picture" : $(a).attr("data-type");
    if (typeof init.callback != "function") {
      init.callback = function (element, data) {
        if ($(element).find("img.form_pic").length === 0) {
          $(element).removeClass("btn").html("");
          $("<img>")
            .appendTo(element)
            .css({ width: "100%" })
            .attr({ src: data.src })
            .addClass("form_pic");
          $("<div>")
            .append(
              $("<img>")
                .attr({ src: "icons/photo_camera.svg" })
                .addClass("material-icons black-text medium valign")
            )
            .appendTo(element)
            .css({
              position: "absolute",
              right: "0px",
              top: "0px",
              opacity: "0.8",
              "margin-top": "20px",
            })
            .append(
              $("<span>").html(" Click to change picture ").addClass("valign")
            )
            .addClass("white black-text center-align valign-wrapper");
        } else {
          $(element).find("img.form_pic").attr({ src: data.src });
        }
        $(element).next("input").val(data.src);
      };
    }
    if (typeof init.onDrag != "function") {
      init.onDrag = dragResponse;
    }
    if (!$("#upload_modal")[0]) {
      var mod = $("<div>")
        .addClass("modal fade")
        .attr({ id: "upload_modal", role: "dialog" })
        .appendTo("body");
      var dialog = $("<div>").addClass("modal-dialog modal-xl").attr({ role: "document" }).appendTo(mod);
      var modal_content = $("<div>").addClass("modal-content").appendTo(dialog);
      var mod_content = $("<div>")
        .addClass("modal-body row")
        .css({ padding: 0 })
        .appendTo(modal_content);
      mod_content.append(
        $("<div>")
          .addClass("progress")
          .append($("<div>").addClass("indeterminate"))
      );
      var left_nav = $("<div>").addClass("file_extn pt-3");
      var btns = {
        picture: ["insert_photo", "purple", "Upload Image"],
        video: ["videocam", "orange", "Upload Video"],
        document: ["library_books", "green lighten-1", "Upload Document"],
        archive: ["archive", "cyan lighten-1", "Upload Archive"],
        audio: ["library_music", "yellow darken-1", "Upload Audio"],
        pdf: ["picture_as_pdf", "red", "Upload  PDF"],
      };

      var right_side = $("<div>").addClass("col s11 offset-s1 right_side");
      mod_content.append(left_nav).append(right_side);
      $.each(btns, function (j, iv) {
        $("<a>")
          .addClass("waves-effect waves-blue tooltipped " + iv[1] + " nav" + j)
          .attr({
            href: "javascript:;",
            "data-tooltip": iv[2],
            "data-position": "right",
            "data-delay": "50",
          })
          .append(
            $("<img>")
              .addClass("material-icons white-text")
              .attr({ src: "icons/" + iv[0] + ".svg" })
          )
          .appendTo(left_nav)
          .click(function () {
            type = j;
            changeType(j);
          });
        createDivs(right_side, j);
      });
      var mod_ft = $("<div>").addClass("modal-footer").appendTo(mod_content);
      $("<a>")
        .addClass("waves-effect waves-blue btn-flat")
        .click(function () {
          $("#upload_modal").removeAttr("data-anchor");
          $("#upload_modal").closeModal();
        })
        .html("CLOSE")
        .appendTo(mod_ft);
      $("ul.tabs").tabs();
      $(".tooltipped").tooltip({ delay: 50 });
    }
    if (!$(a).attr("data-hide")) {
      $("#upload_modal").openModal();
    }
    if ($(a).attr("data-path") === undefined) {
      $(a).attr({ "data-path": defaultPath });
    }
    if ($(a).attr("data-href") === undefined) {
      $(a).attr({ "data-href": defaultPage });
    }
    $(mod).attr({ "data-path": $(a).attr("data-path") });
    $(mod).attr({ "data-href": $(a).attr("data-href") });
    //var callback=$(a).attr('data-callback');
    var crop = $(a).attr("data-edit") ? $(a).attr("data-edit") : 0;
    var processSwitch = $(a).attr("data-switch")
      ? $(a).attr("data-switch")
      : null;
    $("#upload_modal").attr({
      "data-href": $(a).attr("data-href"),
      crop: crop,
      "data-switch": processSwitch,
    });
    var swidth =
      $(a).attr("data-width") == undefined ? "" : $(a).attr("data-width");
    var sheight =
      $(a).attr("data-height") == undefined ? "" : $(a).attr("data-height");
    $("#upload_modal").attr({ "data-width": swidth, "data-height": sheight });

    $("#upload_modal")[0].callback = init.callback;
    $("#upload_modal")[0].onDrag = init.onDrag;
    $("#upload_modal")[0].obj = a;
    changeType(type);
    if ($("#upload_modal").attr("data-path") != $(a).attr("data-path")) {
      $("#upload_modal").attr({ "data-path": $(a).attr("data-path") });
    }
    if (crop == 2 && $(a).attr("data-anchor") == "true") {
      $("#upload_modal").attr({ "data-anchor": true });
    }
    var disp = $(a).attr("data-display")
      ? $(a).attr("data-display").split(",")
      : ["picture"];
    $("#upload_modal").find(".file_extn > a").removeClass("hide");
    if (disp[0] != "all") {
      $("#upload_modal").find(".file_extn > a").addClass("hide");
      for (var o in disp) {
        $("#upload_modal")
          .find(".file_extn > a.nav" + disp[o])
          .removeClass("hide");
      }
    }
  },
});

function createDivs(a, type) {
  $("#upload_modal .progress").removeClass("hide");
  var uc_div2 = $("<div>")
    .addClass("objContainer")
    .appendTo(a)
    .attr({ id: "cnt" + type })
    .hide();
  var tabs = $("<ul>").addClass("tabs row").appendTo(uc_div2);
  var tab1 = $("<li>").addClass("col s6 tab active").appendTo(tabs);
  $("<a>")
    .addClass("active")
    .attr({ href: "#upDiv" + type })
    .html("Upload")
    .appendTo(tab1);
  var tab2 = $("<li>").addClass("col s6 tab").appendTo(tabs);
  $("<a>")
    .attr({ href: "#urlDiv" + type })
    .html("Web Url")
    .appendTo(tab2);
  var forms = $("<div>")
    .addClass("row")
    .appendTo(uc_div2)
    .hide()
    .attr({ id: "urlDiv" + type });
  var intRow = $("<div>").addClass("col s12 input-field").appendTo(forms);
  //get url video
  $("<input>")
    .attr({ id: "browse_pic", type: "text", placeholder: "http://" })
    .appendTo(intRow)
    .keyup(function (e) {
      if (e.which == 13) {
        fetch_from_url(this, type);
      }
    });
  $("<label>")
    .attr({ for: "browse_pic", id: "browse_label" })
    .appendTo(intRow)
    .html("Enter " + type + " url")
    .addClass("active");
  var contr = $("<div>")
    .addClass("row")
    .appendTo(forms)
    .append(
      $("<div>")
        .attr({ id: "co2" + type, "data-type": type })
        .addClass("col s12")
    );

  var forms1 = $("<div>")
    .appendTo(uc_div2)
    .attr({ id: "upDiv" + type });
  var fRow = $("<div>").appendTo(forms1).addClass("row");
  var uc_path1 = $("<div>").addClass("col-sm-12 col-md-7 mtop1").appendTo(fRow);
  //dir path
  $("<img>")
    .addClass("material-icons tiny backdir hoverable")
    .attr({ src: "icons/chevron_left.svg" })
    .click(function () {
      var cur = $(this)
        .closest("#upDiv" + type)
        .find("#co" + type)
        .attr("data-current_path");
      var cua = cur.split("/");
      var cub = [];
      for (var i in cua) {
        if (cua[i] == "..") {
          cub.push(cua[i]);
        }
      }
      cub = cub.join("/");
      fetch_files("../" + cub);
    })
    .appendTo(uc_path1);
  $("<div>").addClass("fold_path").appendTo(uc_path1);
  var fcol1 = $("<div>")
    .appendTo(fRow)
    .addClass("ccol-sm-12 col-md-2 mtop1file-field input-field mtop1");
  var filebtn = $("<div>")
    .addClass("btn uc_btn1")
    .css({ overflow: "hidden" })
    .appendTo(fcol1);
  //Upload File
  $("<input>")
    .attr({
      id: "file_upload",
      class: "file_inp",
      type: "file",
      name: "fileUpload",
      multiple: true,
    })
    .appendTo(filebtn)
    .change(function () {
      upload_file(this, type);
    });
  $("<div>")
    .css({ display: "none" })
    .addClass("file-path-wrapper")
    .appendTo(fcol1)
    .append($("<input>").attr({ type: "text" }).addClass("file-path validate"));
  var uc_srch = $("<div>")
    .addClass("col-sm-4 col-md-1 pos_relative mtop1")
    .css({ "z-index": "20" })
    .appendTo(fRow);
  var uc_srcha = $("<a>")
    .addClass("waves-effect waves-blue tooltipped right")
    .attr({
      href: "javascript:;",
      "data-tooltip": "Search",
      "data-position": "top",
      "data-delay": "50",
    })
    .append(
      $("<img>")
        .addClass("material-icons lime-text text-darken-4 upDivIcon")
        .attr({ src: "icons/search.svg" })
    )
    .appendTo(uc_srch);
  //Search
  var s = "Search " + type + " name";
  $(uc_srcha).dropDownInput(0, s, function () {
    var src = $(this).val().toLowerCase();
    $("#co" + type)
      .children()
      .each(function () {
        var tx = $(this).find(".card-action").text();
        if (src && tx.toLowerCase().search(src) == -1) {
          $(this).hide();
        } else {
          $(this).show();
        }
      });
  });
  var uc_cfold = $("<div>")
    .addClass("col-sm-4 col-md-1 pos_relative mtop1")
    .css({ "z-index": "20" })
    .appendTo(fRow);
  $("<a>")
    .addClass("waves-effect waves-blue tooltipped right")
    .attr({
      href: "javascript:;",
      "data-tooltip": "Create New Folder",
      "data-position": "top",
      "data-delay": "50",
    })
    .append(
      $("<img>")
        .addClass("material-icons red-text upDivIcon")
        .attr({ src: "icons/create_new_folder.svg" })
    )
    .appendTo(uc_cfold)
    .click(function () {
      $(this).parent().children(".uc_dropf").slideDown(300);
    });
  var refresh_fm2 = $("<div>")
    .addClass("uc_dropf uc_dropf2")
    .appendTo(uc_cfold);
  var refresh_inp2 = $("<div>").addClass("input-field").appendTo(refresh_fm2);
  //Create new Folder
  var re_input2 = $("<input>")
    .addClass("input3")
    .attr({ type: "text", id: "new_folder" })
    .focus()
    .keyup(function (e) {
      if (e.keyCode == 13) {
        create_new_folder(this, type);
      }
    })
    .appendTo(refresh_inp2);
  $("<label>")
    .css({ "font-size": "0.7rem" })
    .addClass("active")
    .attr({ for: "new_folder", id: "new_folder_label" })
    .html("Type the name and press ENTER")
    .appendTo(refresh_inp2);
  //refresh Folder
  var j = $("<div>")
    .addClass("col-sm-4 col-md-1 mtop1")
    .css({ "z-index": "20" })
    .appendTo(fRow);
  $("<a>")
    .addClass("waves-effect waves-blue tooltipped right ")
    .attr({
      href: "javascript:;",
      "data-tooltip": "Refresh",
      "data-position": "top",
      "data-delay": "50",
    })
    .append(
      $("<img>")
        .addClass("material-icons indigo-text upDivIcon")
        .attr({ src: "icons/refresh.svg" })
    )
    .appendTo(j)
    .click(function () {
      fetch_files(
        $("#upDiv" + type + " .fold_path a:last-child").attr("data-src") + "/"
      );
    });

  $("<div>")
    .addClass("row")
    .appendTo(forms1)
    .attr({ id: "co" + type, "data-type": type })
    .addClass("col s12");
}

function fetch_from_url(x, type) {
  var urlsend = $("#upload_modal").attr("data-href");
  if (!urlsend) {
    M.toast({
      html: "No defined page for upload processing",
      displayLength: 2000,
      classes: "red",
    });
    return 0;
  }
  var dir = $("#upload_modal").attr("data-path");
  if (type == "picture") {
    $.post(
      urlsend,
      { url_file: x.value, folder: dir + type + "/", getype: type },
      function (response) {
        //console.log(response);
        $("#upload_modal .progress").addClass("hide");
        if (response == "0") {
          M.toast({
            html: "Error fetching file",
            displayLength: 2000,
            classes: "",
          });
        }
        if (response == "-1") {
          M.toast({
            html: "Error: File format is not supported",
            displayLength: 2000,
            classes: "",
          });
        } else {
          rsp = JSON.parse(response);
          var dv = $("#co2");
          newCard(dv, rsp);
          //dv.find("[data-name='..']").prependTo(dv)
        }
      }
    );
  } else if (type == "video") {
    var dv = $("#co2");
    newVideoCard(dv, x.value);
  }
}

function upload_file($this, type) {
  var urlsend = $("#upload_modal").attr("data-href");
  if (!urlsend) {
    M.toast({
      html: "No defined page for upload processing",
      displayLength: 2000,
      classes: "red",
    });
    return 0;
  }
  var dir = $("#co" + type).attr("data-current_path");
  if (!dir) {
    dir = $("#upload_modal").attr("data-path")
      ? $("#upload_modal").attr("data-path")
      : defaultPath;
  }

  var fm = new FormData();

  for (let $key in $this.files) {
    if ($this.files.hasOwnProperty($key)) {
      let $tempName = "temp" + Math.floor(Math.random() * 100 + 1);
      $fileType = $this.files[$key]["type"].split("/")[0];
      if ($fileType == "image") {
        $reader = new FileReader();
        $reader.onload = function (e) {
          $("#co" + type).prepend(
            $("<a>")
              .addClass(
                "col s6 m3 l2 " +
                $tempName +
                " temp uploadFolders ui-draggable ui-draggable-handle"
              )
              .append(
                $("<div>")
                  .addClass("card-panel hoverable")
                  .append($("<div>").addClass("card-image").css({ height: "90px", overflow: "hidden" }).
                    append($("<img>")
                      .attr("src", e.target.result)
                      .css({ width: "100%" }))
                  )
                  .startLoader()
              )
          );
        };
        $reader.readAsDataURL($this.files[$key]);
      }
      fm.append($tempName, $this.files[$key]);
    }
  }

  fm.append("folder", dir);
  fm.append("type", type);
  fm.append("case", "fileUpload");
  fm.append("getype", type);
  fm.append("width", $("#upload_modal").attr("data-width"));
  fm.append("height", $("#upload_modal").attr("data-height"));
  $("#upload_modal .progress").removeClass("hide");
  var req = $.ajax({
    url: urlsend,
    type: "post",
    data: fm,
    msg: "hello",
    processData: false,
    contentType: false,
  });
  req
    .done(function (response) {
      $("#upload_modal .progress").addClass("hide");
      var res = isJson(response);
      var dv = $("#co" + type);
      if (res.error) {
        M.toast({ html: res.error, displayLength: 2000, classes: "red" });
        dv.find(`.temp`).remove();
      } else if (res === false) {
        console.log(response);
        dv.find(`.temp`).remove();
      } else {
        dv.find(".empty").remove();
        for (const $key1 in res) {
          if (res.hasOwnProperty($key1)) {
            dv.find(`.${$key1}`).remove();
            if (!res[$key1].error) {
              newCard(dv, res[$key1]);
              dv.find("[data-name='..']").prependTo(dv);
            } else {
              M.toast({
                html: res[$key1].error,
                displayLength: 1000,
                classes: "red",
              });
            }
          }
        }
      }
    })
    .fail(function (response) {
      $("#upload_modal .progress").addClass("hide");
      console.log(response);
      alert("failed");
    });
}

function create_new_folder($this, type) {
  $("#upload_modal .progress").removeClass("hide");
  var folder_name = $($this).val();
  var urlsend = $("#upload_modal").attr("data-href");
  if (!urlsend) {
    urlsend = defaultPage;
  }
  $.post(
    urlsend,
    {
      case: "newFolder",
      folderName: folder_name,
      ucPath: $("#co" + type).attr("data-current_path"),
    },
    function (response) {
      $("#upload_modal .progress").addClass("hide");
      $($this).val("");
      var dv = $("#co" + type);
      dv.Click();
      var rsp = isJson(response);
      if (rsp === false) {
        M.toast({
          html: "An Error occured",
          displayLength: 2000,
          classes: "red",
        });
        console.log(response);
      } else {
        newCard(dv, rsp);
        dv.find("[data-name='..']").prependTo(dv);
      }
    }
  );
}

function fetch_files(dir) {
  //return;
  var urlsend = $("#upload_modal").attr("data-href");
  var type = $("#upload_modal").attr("current_div");
  if (!dir) {
    dir = $("#upload_modal").attr("data-path");
  }
  type = !type ? "picture" : type;
  var pths = dir.split("/");
  var mdir = pths.join("/"),
    obj = { folder: mdir, type: type, getype: type, case: "loadFiles" };

  if ($("#upload_modal").attr("data-switch") == 1 && type == "picture") {
    obj.switch = 1;
  }
  $("#upload_modal .progress").show().removeClass("hide");
  //console.log(obj);
  $.post(urlsend, obj, function (response) {
    $("#upload_modal .progress").addClass("hide");
    var rsp = isJson(response);
    if (rsp === false) {
      console.log(response);
    } else {
      $("#upDiv" + type)
        .find(".fold_path")
        .empty();
      var npath = [];
      var site_pages = ["www", "public_html", "htdocs", "httpd.www"];
      var site_key = 0;
      for (let s in site_pages) {
        site_key = pths.indexOf(site_pages[s]);
        if (site_key > -1) break;
      }
      $.each(pths, function (i, v) {
        //folder navigation
        npath[i] = v;
        if (npath[i] && npath[i] != ".." && i > site_key) {
          var nxt_icon = $("<img>")
            .addClass("material-icons")
            .attr({ src: "icons/play_arrow.svg" });
          var anc = $("<a>")
            .attr({ href: "javascript:;", "data-src": npath.join("/") })
            .html(v)
            .click(function () {
              fetch_files($(this).attr("data-src") + "/");
            });
          $("#upDiv" + type)
            .find(".fold_path")
            .append(nxt_icon)
            .append(anc);
        }
      });
      $("#co" + type).attr({ "data-current_path": mdir });
      var dv = $("#co" + type).empty();
      var length = rsp.length,
        display = length;
      var k = 0;
      if (!length) {
        dv.emptyState("No " + type + " file found in this directory");
      } else if (length < 1500) {
        for (k in rsp) {
          newCard(dv, rsp[k]);
        }
      } else {
        $(".file_extn").append(
          $("<span>").addClass("white-text").text(display)
        );
        var interval = setInterval(function () {
          if (k < length) {
            newCard(dv, rsp[k]);
          }
          if (k == length) {
            $("#upload_modal .progress").addClass("hide");
            $(".file_extn span").remove();
            clearInterval(interval);
            return;
          } else if (k > 5000) {
            M.toast({
              html: "resting for 3secs after 5000 iterations",
              displayLength: 2000,
              classes: "green",
            });
            $(".file_extn span").text("resting");
            clearInterval(interval);
            setTimeout(function () {
              var newinterval = setInterval(function () {
                if (k < length) {
                  newCard(dv, rsp[k]);
                }
                if (k == length) {
                  $("#upload_modal .progress").addClass("hide");
                  $(".file_extn span").remove();
                  clearInterval(newinterval);
                  return;
                }
                k++;
                display--;
                $(".file_extn span").text(display);
              }, 0.00000001);
            }, 3000);
          }
          k++;
          display--;
          $(".file_extn span").text(display);
        }, 0.00000001);
      }
    }
  });
}

function call_resourceModal_1($this, data, keep_values) {
  resourceModal_1(data.type);
  var xx = data.src.split("/"),
    file_name = xx[xx.length - parseInt(1)],
    cont,
    imgg,
    cd;
  if (data.type == "picture") {
    $("#appendModal #pdf_pdf").hide();
    $("#appendModal #audio_audio").hide();
    $("#appendModal #video_video").hide();
    imgg = $("#appendModal #img_img");
    var imgg2 = $("#appendModal #img_img2");
    imgg2
      .attr({ src: data.src, "data-type": data.type, "data-id": file_name })
      .show();
    $("<img>")
      .attr({ src: imgg2.attr("src") })
      .load(function () {
        var wt = this.width;
        var ht = this.height;
        $("#width").val(wt);
        $("#height").val(ht);
      });
    cont = $("#appendModal #img_img");
  } else if (data.type == "audio") {
    $("#appendModal #audio_audio").remove();
    imgg = $("#appendModal #img_img");
    imgg.hide();
    $("#appendModal #video_video").hide();
    $("#appendModal #pdf_pdf").hide();
    cd = $("<div>")
      .attr({ id: "audio_audio" })
      .addClass("card")
      .prependTo($(imgg).parent());
    var name = $("<div>").appendTo(cd).addClass("card-action truncate");
    var img = $("<audio>")
      .appendTo(name)
      .attr({
        controls: "controls",
        width: "100%",
        height: "100%",
        id: "audio_control",
      })
      .css({ width: "100%" });
    $("<source>").appendTo(img).attr({ src: data.src, id: "audio_source" });
    $("#width").val("200px");
    $("#height").val("");
    cont = $("#appendModal #audio_audio");
  } else if (data.type == "video") {
    $("#appendModal #video_video").remove();
    imgg = $("#appendModal #img_img");
    $("#appendModal #audio_audio").hide();
    $("#appendModal #pdf_pdf").hide();
    imgg.hide();
    cd = $("<div>")
      .attr({ id: "video_video" })
      .addClass("card")
      .prependTo($(imgg).parent());
    var name = $("<div>").appendTo(cd).addClass("card-action truncate");
    var img = $("<video>")
      .appendTo(name)
      .attr({
        controls: "controls",
        width: "100%",
        height: "100%",
        id: "video_control",
      })
      .css({ width: "100%" });
    var src = $("<source>")
      .appendTo(img)
      .attr({ src: data.src, id: "video_source" });

    $("#width").val("200px");
    $("#height").val("");
    cont = $("#appendModal #video_video");
  } else {
    var icon = "picture_as_pdf";
    if (data.type == "archive") {
      icon = "archive";
    } else if (data.type == "document") {
      icon = "library_books";
    }
    imgg = $("#appendModal #img_img");
    imgg.hide();
    $("#appendModal #video_video").hide();
    $("#appendModal #audio_audio").hide();
    $("#appendModal #pdf_pdf").show();
    if ($("#appendModal #pdf_pdf").get(0) == undefined) {
      cd = $("<div>")
        .attr({ id: "pdf_pdf" })
        .addClass("center hoverable")
        .prependTo($(imgg).parent());
      var cd_img = $("<div>")
        .addClass("card-image")
        .css({ height: "100px", overflow: "hidden" })
        .appendTo(cd);
      $("<img>")
        .addClass("material-icons large")
        .attr({ src: "icons/" + icon + ".svg" })
        .appendTo(cd_img);
      $("<div>")
        .attr({ id: "pdf_name", "data-src": data.src })
        .addClass("card-action truncate")
        .html(file_name)
        .appendTo(cd);
    } else {
      $("#appendModal #pdf_name")
        .attr({ "data-src": data.src })
        .html(file_name);
    }
  }
  if (data.type == "picture" || data.type == "audio" || data.type == "video") {
    if (!cont.find(".filename").length) {
      $("<span>").addClass("filename").text(file_name).prependTo(cont);
    } else {
      cont.find(".filename").text(file_name);
    }
  }
  if (keep_values && keep_values === true) {
    $("#appendModal").attr({ "data-keep_values": true });
  }
  if ($("#appendModal").attr("data-keep_values") == undefined) {
    $("#appendModal").find("input, textarea").val("");
  }
}

function resourceModal_1(type) {
  if ($("#appendModal")[0] == null) {
    var imgmod = $("<div>")
      .addClass("modal fade")
      .attr({ id: "appendModal", role: 'dialog' })
      .appendTo("body");

    var dialog = $("<div>").addClass("modal-dialog modal-md").attr({ role: 'document' }).appendTo(imgmod);
    var modal_content = $("<div>").addClass("modal-content").appendTo(dialog);
    var imgmod_cont = $("<div>").addClass("modal-body").appendTo(modal_content);
    var cont_h4 = $("<div>")
      .addClass("col s12 m6")
      .css("height", "300px")
      .appendTo(imgmod_cont);
    var cont_sty = $("<div>").addClass("col s12 m6").appendTo(imgmod_cont);
    var c_cl = $("<div>")
      .addClass("input-field col s12 m6 ")
      .appendTo(cont_sty);
    var wit = $("<input>").attr({ id: "width", type: "text" }).appendTo(c_cl);
    var wit_label = $("<label>")
      .attr({ for: "width" })
      .html("Width")
      .appendTo(c_cl)
      .addClass("active");
    var c_ht = $("<div>").addClass("input-field col s12 m6").appendTo(cont_sty);
    var ht = $("<input>").attr({ id: "height", type: "text" }).appendTo(c_ht);
    var ht_label = $("<label>")
      .attr({ for: "height" })
      .html("Height")
      .appendTo(c_ht)
      .addClass("active");
    var c_al = $("<div>").addClass("input-field col s12 m6").appendTo(cont_sty);
    var al = $("<select>")
      .addClass("browser-default")
      .attr({ id: "align", type: "text", value: "left" })
      .appendTo(c_al);
    var al_optn = $("<option>")
      .attr({ value: "", disabled: "disabled", selected: "selected" })
      .html("None");
    var al_optn1 = $("<option>").attr({ value: "left" }).html("Left");
    var al_optn2 = $("<option>").attr({ value: "right" }).html("Right");
    var al_optn3 = $("<option>").attr({ value: "top" }).html("Top");
    var al_optn4 = $("<option>").attr({ value: "middle" }).html("Middle");
    var al_optn5 = $("<option>").attr({ value: "bottom" }).html("Bottom");
    al.append(al_optn, al_optn1, al_optn2, al_optn3, al_optn4, al_optn5);
    var al_label = $("<label>")
      .attr({ for: "align" })
      .html("Align")
      .appendTo(c_al)
      .addClass("active");
    var c_mg = $("<div>").addClass("input-field col s12 m6").appendTo(cont_sty);
    var mg = $("<input>")
      .attr({ id: "margin", type: "text", value: "20px" })
      .appendTo(c_mg);
    var mg_label = $("<label>")
      .attr({ for: "margin" })
      .html("Margin")
      .appendTo(c_mg)
      .addClass("active");
    var c_alt = $("<div>").addClass("input-field col s12").appendTo(cont_sty);
    var alt = $("<input>").attr({ id: "alt", type: "text" }).appendTo(c_alt);
    var alt_label = $("<label>")
      .attr({ for: "alt" })
      .html("Alt for unloaded images")
      .appendTo(c_alt)
      .addClass("active");
    var c_sty = $("<div>").addClass("col s12").appendTo(cont_sty);
    var sty = $("<select>")
      .attr({ id: "sellc" })
      .addClass("browser-default")
      .appendTo(c_sty);
    var sty_optn = $("<option>")
      .attr({ value: "", disabled: "disabled", selected: "selected" })
      .html("Add style");
    var sty_optn1 = $("<option>").attr({ value: "framed" }).html("Framed");
    var sty_optn2 = $("<option>").attr({ value: "shadow" }).html("Shadow");
    var sty_optn3 = $("<option>").attr({ value: "rounded" }).html("Rounded");
    var sty_optn4 = $("<option>").attr({ value: "cirle" }).html("circle");
    sty.append(sty_optn, sty_optn1, sty_optn2, sty_optn3);
    var img_img = $("<div>")
      .attr({ id: "img_img" })
      .addClass("card-panel left")
      .css({
        width: "100%",
        "max-height": "300px",
        overflow: "hidden",
        "box-sizing": "border-box",
      })
      .appendTo(cont_h4);
    var img_img2 = $("<img>")
      .attr({ id: "img_img2" })
      .css("width", "100%")
      .addClass("left")
      .appendTo(img_img);
    var cd = $("<div>")
      .attr({ id: "audio_audio" })
      .addClass("card")
      .appendTo(cont_h4)
      .hide();
    var name = $("<div>").appendTo(cd).addClass("card-action truncate");
    var img = $("<audio>")
      .appendTo(name)
      .attr({
        controls: "controls",
        width: "100%",
        height: "100%",
        id: "audio_control",
      })
      .css({ width: "100%" });
    var src = $("<source>").appendTo(img).attr({ id: "audio_source" });
    var cd = $("<div>")
      .attr({ id: "video_video" })
      .addClass("card")
      .appendTo(cont_h4)
      .hide();
    var name = $("<div>").appendTo(cd).addClass("card-action truncate");
    var img = $("<video>")
      .appendTo(name)
      .attr({
        controls: "controls",
        width: "100%",
        height: "100%",
        id: "audio_control",
      })
      .css({ width: "100%" });
    var src = $("<source>").appendTo(img).attr({ id: "video_source" });
    var fta = $("<div>").addClass("modal-footer").appendTo(imgmod);
    var fta_a = $("<a>")
      .attr({ id: "nnh" })
      .addClass("modal-action modal-close waves-effect waves-green btn")
      .html("Insert")
      .appendTo(fta)
      .click(function () {
        var wts = $("#appendModal").find("#width").val();
        var ttl = $("#appendModal").find("#title").val();
        var hgt = $("#appendModal").find("#height").val();
        var ali = $("#appendModal").find("#align").val();
        var mg = $("#appendModal").find("#margin").val();
        var altt = $("#appendModal").find("#alt").val();
        var stt = $("#appendModal").find("#sellc").val();
        var wit = $(window).width();
        var img_img;
        if (wts > wit) wts = "100%";
        var callback = $("#upload_modal").prop("callback");
        var handle = $("#upload_modal").prop("obj");
        var type = $("#appendModal").prop("data-type");
        if (type == "picture") {
          img_img = $("#appendModal").find("#img_img");
        } else if (type == "audio") {
          img_img = $("#appendModal").find("#audio_source");
        } else if (type == "video") {
          img_img = $("#appendModal").find("#video_source");
        } else if (type == "pdf") {
          img_img = $("#appendModal").find("#pdf_name");
        }
        var obj = {
          src: img_img2.attr("src"),
          id: img_img2.data("id"),
          width: wts,
          height: hgt,
          align: ali,
          margin: mg,
          alt: altt,
          style: stt,
          title: ttl,
          type: type,
        };
        callback(handle, obj);
        setTimeout(function () {
          $("#appendModal").removeAttr("data-keep_values");
          $("#appendModal").find("input, textarea, select").val("");
        }, 10);
      });
    var img_btn = $("<a>")
      .addClass("btn-flat")
      .appendTo(fta)
      .html("Change Picture")
      .click(function () {
        $("#appendModal").closeModal();
        $("#upload_modal").openModal();
      });
  }
  $("#appendModal")
    .prop({ "data-type": type })
    .openModal({ dismissible: false });
}

function call_resourceModal_2($this, data, keep_values) {
  var xx = data.src.split("/"),
    name = xx[xx.length - parseInt(1)];
  resourceModal_2(data.type, name);
  $("#resourceModal .btn-flat")
    .attr({ "data-type": data.type })
    .html("Change " + data.type);
  $("#resourceModal .afa_ya").html("Name: " + name);
  $("#resourceModal .cr_anchor").addClass("hide");
  /*if(e==0){
    $('#resourceModal').removeAttr('data-edit');
  }*/
  if (data.title) {
    $("#resourceModal #new_tit").focus().val(data.title);
  }
  if (data.desc) {
    $("#resourceModal #alt").focus().html(data.desc);
  }

  if (data.type == "picture") {
    $(
      "#resourceModal #video_video, #resourceModal #audio_audio, #resourceModal #pdf_pdf"
    ).hide();
    var imgg = $("#resourceModal #img_img");
    imgg.attr({ src: data.src, "data-type": data.src, "data-id": name }).show();
    $("<img>")
      .attr({ src: data.src })
      .load(function () {
        wt = this.width;
        ht = this.height;
        $("#width").val(wt);
        $("#height").val(ht);
      });
    $("#resourceModal .cr_anchor").removeClass("hide");
  } else if (data.type == "audio") {
    $("#resourceModal #audio_audio").remove();
    var imgg = $("#resourceModal #img_img");
    $("#resourceModal #video_video").hide();
    $("#resourceModal #pdf_pdf").hide();
    imgg.hide();
    var cd = $("<div>")
      .attr({ id: "audio_audio" })
      .addClass("card")
      .prependTo($(imgg).parent());
    var name = $("<div>").appendTo(cd).addClass("card-action truncate");
    var img = $("<audio>")
      .appendTo(name)
      .attr({
        controls: "controls",
        width: "100%",
        height: "100%",
        id: "audio_control",
      })
      .css({ width: "100%" });
    var src = $("<source>")
      .appendTo(img)
      .attr({ src: data.src, id: "audio_source" });
    $("#width").val("200px");
    $("#height").val("");
  } else if (data.type == "video") {
    $("#resourceModal #video_video").remove();
    var imgg = $("#resourceModal #img_img");
    $("#resourceModal #audio_audio").hide();
    $("#resourceModal #pdf_pdf").hide();
    imgg.hide();
    var cd = $("<div>")
      .attr({ id: "video_video" })
      .addClass("card")
      .prependTo($(imgg).parent());
    var name = $("<div>").appendTo(cd).addClass("card-action truncate");
    var img = $("<video>")
      .appendTo(name)
      .attr({
        controls: "controls",
        width: "100%",
        height: "100%",
        id: "video_control",
      })
      .css({ width: "100%" });
    var src = $("<source>")
      .appendTo(img)
      .attr({ src: data.src, id: "video_source" });
    $("#width").val("200px");
    $("#height").val("");
  } else {
    var icon = "picture_as_pdf";
    if (data.type == "archive") {
      icon = "archive";
    } else if (data.type == "document") {
      icon = "library_books";
    }
    var imgg = $("#resourceModal #img_img");
    imgg.hide();
    $("#resourceModal #video_video").hide();
    $("#resourceModal #audio_audio").hide();
    $("#resourceModal #pdf_pdf").show();
    if ($("#resourceModal #pdf_pdf").get(0) == undefined) {
      var cd = $("<div>")
        .attr({ id: "pdf_pdf" })
        .addClass("hoverable center")
        .prependTo($(imgg).parent());
      var cd_img = $("<div>")
        .addClass("card-image")
        .css({ height: "100px", overflow: "hidden" })
        .appendTo(cd);
      var cd_img1 = $("<img>")
        .addClass("material-icons large")
        .attr({ src: "icons/" + icon + ".svg" })
        .appendTo(cd_img);
      var cd_name = $("<div>")
        .attr({ id: "pdf_name", "data-src": data.src })
        .addClass("card-action truncate center")
        .html(data.name)
        .appendTo(cd);
    } else {
      $("#resourceModal #pdf_name")
        .attr({ "data-src": data.src })
        .html(data.name);
    }
  }
  var anchors = $("#resourceForm").find(".attributes > .anchors");
  // if (data.anchor || $("#upload_modal").attr("data-anchor") == "true") {
  if (data.anchor) {
    anchors.removeClass("hide").show();
    $("#resourceModal").attr({ "data-anchor": true });
    $("#resourceModal .cr_anchor").attr({ disabled: true });
    var a_name = data.anchor && data.anchor.name ? data.anchor.name : "";
    var a_href = data.anchor && data.anchor.href ? data.anchor.href : "";
    if (
      $("#resourceModal").attr("data-keep_values") != "true" ||
      a_name != ""
    ) {
      anchors.find("#a_name").val(a_name);
      anchors.find("#a_href").val(a_href);
    }
  } else {
    var no_anchor;
    anchors.addClass("hide");
  }
  if ($("#upload_modal").attr("data-anchor") == "true") {
    anchors.removeClass("hide").show();
  }
  if (keep_values && keep_values === true) {
    $("#resourceModal").attr({ "data-keep_values": true });
  }
  if ($("#resourceModal").attr("data-keep_values") == undefined) {
    $("#resourceForm").find("input, textarea").val("");
    if (no_anchor) {
      anchors.addClass("hide");
    }
  }
}

function resourceModal_2(type, name) {
  if ($("#resourceModal")[0] == null) {
    var imgmod = $("<div>")
      .addClass("modal fade")
      .attr({ id: "resourceModal", role: 'dialog' })
      .appendTo("body");

    var dialog = $("<div>").addClass("modal-dialog modal-lg").attr({ role: 'document' }).appendTo(imgmod);
    var modal_content = $("<div>").addClass("modal-content").appendTo(dialog);
    var imgmod_cont = $("<div>").addClass("modal-body").appendTo(modal_content);

    var form = $("<form>")
      .attr({ action: "javascript:;", id: "resourceForm" })
      .appendTo(imgmod_cont);
    var imgmod_cont = $("<div>").addClass("row").appendTo(form);
    var cont_h4 = $("<div>")
      .addClass("col-sm-12 col-md-5 elu_name")
      .css({ overflow: "hidden" })
      .appendTo(imgmod_cont);
    var cont_sty = $("<div>")
      .addClass("col-sm-12 col-md-7 attributes")
      .appendTo(imgmod_cont);
    var c_cl = $("<div>")
      .addClass("input-field col s12 m12 ")
      .appendTo(cont_sty);
    // var icn = $('<img>').addClass('material-icons prefix').attr({src:'icons/title.svg'}).appendTo(c_cl)
    var re_input2 = $("<input>").addClass("input3 w-100  browser-default")
      .attr({
        type: "text",
        id: "new_tit",
        required: "required",
        name: "title",
      })
      .appendTo(c_cl);
    var re_input_label = $("<label>")
      .attr({ for: "new_tit", id: "new_tit_label" })
      .html(`Enter Title`)
      .appendTo(c_cl);
    var c_alt = $("<div>").addClass("input-field col s12").appendTo(cont_sty);
    // var icn = $('<img>').addClass('material-icons prefix').attr({src:'icons/mode_edit.svg'}).appendTo(c_alt)
    var alt = $("<div>")
      .addClass("w-100")
      .attr({
        id: "alt",
        required: "required",
        name: "desc",
        contentEditable: true,
      })
      .appendTo(c_alt);
    var alt_label = $("<label>")
      .attr({ for: "alt" })
      .html(`Enter Description`)
      .appendTo(c_alt);
    var img_img = $("<img>")
      .attr({ id: "img_img" })
      .css("width", "100%")
      .appendTo(cont_h4);
    var elu1 = $("<div>").addClass("row elu1").appendTo(cont_h4);
    var h4 = $("<h6>")
      .addClass("afa_ya center")
      .html("Name: " + name);
    var elu2 = $("<div>").addClass("col s12 m12").append(h4).appendTo(elu1);
    //anchors
    var anchors = $("<div>").addClass("anchors").appendTo(cont_sty);
    var desc = $("<b>")
      .addClass("center-align teal-text left")
      .css({ width: "100%" })
      .text("Anchors");
    $("<img>")
      .addClass("material-icons small right clear_anchor")
      .click(function () {
        $(this).closest(".anchors").addClass("hide");
        $("#resourceModal .cr_anchor").removeClass("hide").attr({ disabled: false });
        $("#upload_modal").removeAttr("data-anchor");
      })
      .attr({ src: "icons/clear_black.svg" })
      .appendTo(desc);
    desc.appendTo(anchors);
    var c_cl = $("<div>")
      .addClass("input-field col s12 m12 ")
      .appendTo(anchors);
    // $('<img>').addClass('material-icons prefix small').attr({src:'icons/favorite.svg'}).appendTo(c_cl)
    $("<input>").addClass("input3 w-100 browser-default")
      .attr({ type: "text", id: "a_name", required: true, name: "anchor_name" })
      .appendTo(c_cl);
    $("<label>")
      .attr({ for: "a_name" })
      .html("Enter Anchor Name")
      .appendTo(c_cl);
    var c_cl2 = $("<div>")
      .addClass("input-field col s12 m12 ")
      .appendTo(anchors);
    // $('<img>').addClass('material-icons prefix small').attr({src:'icons/favorite_border.svg'}).appendTo(c_cl2)
    $("<input>").addClass("input3 w-100 browser-default")
      .attr({ type: "text", id: "a_href", required: true, name: "anchor_href" })
      .appendTo(c_cl2);
    $("<label>")
      .attr({ for: "a_href" })
      .html("Enter Anchor Href")
      .appendTo(c_cl2);
    //footers
    var fta = $("<div>")
      .addClass("modal-footer")
      .append(
        $("<button>")
          .addClass("left btn white grey-text")
          .click(function () {
            $("#resourceModal").removeAttr("data-keep_values");
            $("#upload_modal").removeAttr("data-anchor");
            $("#resourceModal").removeAttr("data-anchor").closeModal();
            $("#resourceForm").find("input, textarea").val("");
            $("#resourceForm").find("#alt").empty();
          })
          .text("Cancel")
      )
      .appendTo(form);
    $("<button>")
      .appendTo(fta)
      .addClass(
        "modal-action left cr_anchor mx-3 white grey-text hide waves-effect waves-green btn"
      )
      .text("Image Anchor")
      .click(function () {
        $("#resourceForm").find(".attributes > .anchors").removeClass("hide");
        $(this).attr({ disabled: true });
        $("#upload_modal").attr({ "data-anchor": true });
      });
    var fta_a = $("<button>")
      .attr({ id: "nnh" })
      .addClass("modal-action waves-effect waves-green btn")
      .html("Save")
      .appendTo(fta);
    var img_btn = $("<a>")
      .attr({ "data-type": type })
      .addClass("btn-flat")
      .appendTo(fta)
      .html("Change " + type)
      .click(function () {
        $("#resourceModal").closeModal();
        $("#upload_modal").openModal();
        var type = $(this).attr("data-type");
        changeType(type);
      });
  }
  $("#resourceModal #nnh")
    .off("click")
    .click(function () {
      var callback = $("#upload_modal").prop("callback");
      var handle = $("#upload_modal").prop("obj");
      var res_name = $("#resourceModal #new_tit").val();
      var res_desc = $("#resourceModal #alt").html();
      var id,
        res_link,
        go = true,
        obj = {};
      $("#resourceForm")
        .find("input:visible, textarea:visible, #alt")
        .each(function () {
          if (
            ($(this).attr("id") == "alt" && !$(this).text().length) ||
            ($(this).attr("id") !== "alt" && !$(this).val().length)
          ) {
            $(this).focus();
            go = false;
            return;
          } else {
            obj[$(this).attr("name")] = $(this).val()
              ? $(this).val()
              : $(this).html();
          }
        });
      if (go) {
        var type1 = $("#resourceModal .btn-flat").attr("data-type");
        if (type1 == "picture") {
          id = $("#resourceModal #img_img");
          res_link = id.attr("src");
        } else if (type1 == "audio") {
          id = $("#resourceModal #audio_source");
          res_link = id.attr("src");
        } else if (type1 == "video") {
          id = $("#resourceModal #video_source");
          res_link = id.attr("src");
        } else {
          id = $("#resourceModal #pdf_name");
          res_link = id.attr("data-src");
        }
        obj.src = res_link;
        obj.type = type1;
        obj.id = id.attr("id");
        callback(handle, obj);
        setTimeout(function () {
          $("#resourceModal").removeAttr("data-keep_values");
          $("#upload_modal").removeAttr("data-anchor");
          $("#resourceModal").removeAttr("data-anchor").closeModal();
          $("#resourceForm").find("input, textarea").val("");
          $("#resourceForm").find("#alt").empty();
        }, 10);
      }
    });
  $("#resourceModal").openModal({ dismissible: false });
}

function changeType(type) {
  if (
    $("#upload_modal").attr("current_div") == undefined ||
    $("#upload_modal").attr("current_div") == null
  ) {
    $("#cnt" + type).fadeIn();
  } else {
    var ctype = $("#upload_modal").attr("current_div");
    $("#cnt" + ctype).swapDiv($("#cnt" + type));
  }
  $("#upload_modal").find(".file_extn > a").removeClass("activeTab");
  $("#upload_modal")
    .find(".file_extn > a.nav" + type)
    .addClass("activeTab");
  $("#upload_modal").attr({ current_div: type });
  if ($("#co" + type).attr("data-current_path") == undefined)
    fetch_files($("#upload_modal").attr("data-path") + type + "/");
}

function newAudioCard(prt, file) {
  var an = $("<a>")
    .appendTo(prt)
    .addClass("col s12 m4 l3 uploadFolders")
    .attr({ href: "javascript:;" });
  an.uploadOptn();
  var cd = $("<div>").appendTo(an).addClass("card-panel hoverable");

  var img_div = $("<div>")
    .appendTo(cd)
    .addClass("card-image")
    .css({ height: "90px", overflow: "hidden" });

  var img = $("<audio>")
    .appendTo(img_div)
    .attr({ controls: "controls", width: "100%", height: "100%" });
  var src = $("<source>").appendTo(img).attr({ src: file[0] });
  $(an).attr({ "data-src": file, "data-type": "video" }).show();
}

function newVideoCard(prt, file) {
  var an = $("<a>")
    .appendTo(prt)
    .addClass("col s12 m4 l3 uploadFolders")
    .attr({ href: "javascript:;" });
  an.uploadOptn();
  var cd = $("<div>").appendTo(an).addClass("card-panel hoverable");

  var img_div = $("<div>")
    .appendTo(cd)
    .addClass("card-image")
    .css({ height: "90px", overflow: "hidden" });

  var img = $("<iframe>")
    .appendTo(img_div)
    .attr({ src: file, width: "100%", height: "100%" });
  $(an).attr({ "data-src": file, "data-type": "video" }).show();
}

function newFolderCard(prt, file) {
  var an = $("<a>")
    .appendTo(prt)
    .addClass("col s12 m4 l3 uploadFolders")
    .attr({ href: "javascript:;" });
  an.uploadOptn();
  var cd = $("<div>").appendTo(an).addClass("card-panel hoverable");

  var img_div = $("<div>")
    .appendTo(cd)
    .addClass("card-image")
    .css({ height: "90px", overflow: "hidden" });

  var img = $("i")
    .appendTo(img_div)
    .css({ width: "100%", height: "100%" })
    .addClass("material_icons")
    .html("folder");

  var name = $("<div>")
    .appendTo(cd)
    .addClass("card-action truncate")
    .html(file[2]);
}

function loadContents() {
  fetch_files($(this).parent().attr("data-src") + "/");
}

function noteChange(ui, dis) {
  var urlsend = $("#upload_modal").attr("data-href");
  $(ui.draggable).fadeOut();
  var obj = {
    moveFolder: $(ui.draggable).attr("data-src"),
    dropFolder: $(dis).attr("data-src"),
  };
  $.post(urlsend, obj, function (response) {
    var data = isJson(response);
    if (data !== false) {
      $(ui.draggable).remove();
      var callback = $("#upload_modal").prop("onDrag");
      if (typeof callback == "function") {
        callback(data);
      } else {
        dragResponse();
      }
    } else {
      console.log(response);
      M.toast({ html: "Error", displayLength: 500, classes: "red" });
      $(ui.draggable).fadeIn();
    }
  });
}

function dragResponse() {
  M.toast({ html: "Moved", displayLength: 500, classes: "green" });
}
function configure() {
  var type = $("#upload_modal").attr("current_div");
  if ($(this).parent().attr("ondrag") == 1) {
    $(this).parent().attr("ondrag", 0);
    return 0;
  }
  $("#upload_modal").closeModal();
  if ($("#upload_modal").attr("crop") == 1 && type == "picture") {
    var data1 = {};
    data1.src = $(this).parent().attr("data-src");
    data1.type = type;
    call_resourceModal_1(this, data1, false);
  } else if ($("#upload_modal").attr("crop") == 2) {
    var data2 = {};
    data2.src = $(this).parent().attr("data-src");
    data2.type = type;
    call_resourceModal_2(this, data2, false);
  } else {
    var callback = $("#upload_modal").prop("callback");
    var obj = $("#upload_modal").prop("obj");
    callback(obj, {
      src: $(this).parent().attr("data-src"),
      type: $(this).parent().attr("data-type"),
      name: $(this).parent().attr("data-name"),
    });
  }
}

function newCard(prt, file) {
  var type = $("#upload_modal").attr("current_div");
  var an = $("<a>")
    .appendTo(prt)
    .addClass("col-sm-6 col-md-3 col-xl-2 uploadFolders")
    .attr({ href: "javascript:;", "data-src": file.src });
  var cd = $("<div>").appendTo(an).addClass("card-panel hoverable");
  var img_div = $("<div>")
    .appendTo(cd)
    .addClass("card-image")
    .css({ height: "90px", overflow: "hidden" });
  if (file.isFolder) {
    //folder
    $(an).prependTo(prt);
    //alert(file[0]);
    var icn = "folder";
    if (file.name == "..") {
      icn = "keyboard_return";
    }
    var img = $("<img>")
      .appendTo(img_div)
      .css({ width: "100%", height: "100%", "font-size": "96px" })
      .addClass("material-icons")
      .attr({ src: "icons/" + icn + ".svg" });
    $(cd).on("click", loadContents);
    // $(an).attr({ id: "ui_folda" });
    $(an).droppable({
      drop: function (event, ui) {
        noteChange(ui, $(this));
      },
      accept: ".ui-draggable",
    });
    var name = $("<div>")
      .appendTo(cd)
      .attr({ onmousedown: "return false" })
      .addClass("card-action truncate")
      .html(file.name);
  } else {
    var name_arr = file.name.split(".") || [file.name];
    var name = $("<div>")
      .appendTo(cd)
      .addClass("card-action truncate")
      .html(name_arr[0]);
    an.attr({ title: file.name }).uploadOptn();
    $(an).css({ "z-index": "10" });
    if (type == "picture") {
      var img = $("<img>")
        .appendTo(img_div)
        .attr({ src: file.icon })
        .css({ width: "100%" });
      an.attr({ "data-src": file.icon });
    } else if (type == "video") {
      var img = $("<img>")
        .appendTo(img_div)
        .addClass("material-icons large")
        .attr({ src: "icons/movie.svg" });
    } else if (type == "audio") {
      var img = $("<img>")
        .appendTo(img_div)
        .addClass("material-icons large")
        .attr({ src: "icons/music_note.svg" });
      $(img_div).css({ padding: "5px", "font-size": "8px" });
    } else {
      var icon = "picture_as_pdf";
      if (type == "archive") {
        icon = "archive";
      } else if (type == "document") {
        icon = "library_books";
      }
      var img = $("<img>")
        .appendTo(img_div)
        .addClass("material-icons large")
        .attr({ src: "icons/" + icon + ".svg" });
    }
    $(cd).on("click", configure);
    $(an).draggable({
      revert: "invalid",
      cursor: "move",
      start: function () {
        $(this).attr({ ondrag: 1 });
      },
    });
  }
  $(an).attr({ "data-name": file.name, "data-type": type }).show();
}

$(document).mouseup(function (e) {
  var container = $(".ed_del");
  var elem1 = $(container).closest("span");
  elem2 = $(container).closest(".uc_optns");
  var spn = $(".collapsible-header > .grey-text");
  var container2 = $(".uc_dropf");
  var spn2 = $(".uploadFolders");

  if (
    !container.is(e.target) && // if the target of the click isn't the container...
    container.has(e.target).length === 0
  ) {
    // ... nor a descendant of the container
    container.hide(500);
    elem1.css({ "z-index": "100" });
    elem2.css({ "z-index": "1" });
  }

  if (!container2.is(e.target) && container2.has(e.target).length === 0) {
    $(container2).hide(500);
  }

  if (!spn.is(e.target) && spn.has(e.target).length === 0) {
    $(spn)
      .removeClass("grey-text")
      .removeAttr("contenteditable")
      .removeAttr("onkeydown");
    $(spn).parent().removeClass("no_cursor");
  }

  if (!spn2.is(e.target) && spn2.has(e.target).length === 0) {
    $(spn2)
      .find(".card-action")
      .removeAttr("contenteditable")
      .removeClass("grey-text")
      .css({ cursor: "unset" });

    var area1 = $(spn2)
      .find(".card-panel")
      .closest(".ui-draggable")
      .find(".card-panel");
    var area2 = $(spn2)
      .find(".card-panel")
      .closest("#ui_folda")
      .find(".card-panel");

    area1.off("click", configure);
    area2.off("click", loadContents);
    area1.on("click", configure);
    area2.on("click", loadContents);
  }
});
