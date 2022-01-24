var defaultTitle = 'Write the title here';
var defaultBody = 'Write the main content here';
var defaultClass = 'grey-text text-lighten-1';
$.fn.extend({
    richtextTitle: function () {
      $(this).focus();
    }
})
$.fn.extend({
    richtextBody: function (object = {}, callback) {
        //rchtxtbody = $(this).richtextBody;console.log(rchttxtbody);
        let attachment = true;
        if(object.attachment === false)attachment = false;
        var menus = new Array(["visibility", "Show Toolbar"], ["save", "Save to draft"], ["publish", "Publish"]);
        var color = new Array('yellow darken-1', 'green', 'blue', 'purple', 'lime', 'orange', 'indigo', 'teal', 'amber');
        //var control_name = {'code':''}
        var edit_control = {
            'undo': 'undo', 'redo': 'redo', 'code': 'code', 'fontcolor': 'fontcolor.jpg', 'bold': 'format-bold', 'italic': 'format-italic', 'justifyleft': 'format-align-left', 'justifycenter': 'format-align-center', 'justifyright': 'format-align-right', 'indent': 'format-indent-increase', 'outdent': 'format-indent-decrease', 'selectall': 'selectall.jpg', 'delete': 'delete', 'inserthorzontalrule': 'inserthorizontalrule.jpg', 'insertimage': 'insertimage.jpg', 'insertorderedlist': 'format-list-numbered', 'insertunorderedlist': 'format-list-bulleted', 'removeformat': 'format_clear', 'strikethrough': 'strikethrough.jpg', 'subscript': 'subscript.jpg', 'superscript': 'superscript.jpg', 'createlinkurl': 'insert-link', 'unlink': 'unlink.jpg', 'attachment': 'attachment',
            'underline': 'format-underlined', 'copy': 'copy', 'cut': 'cut', 'paste': 'paste', 'colorPicker': 'text_color', 'video': 'video', 'save': 'save', 'publish': 'publish', 'font-sizechange': 'font-size', 'change-heading': 'heading', 'font-families': 'font_family'
        };

        var mini = new Array("change-heading", "bold", "italic", "underline", "justifyleft", "justifycenter", "justifyright", "indent", "outdent", /*"insertunorderedlist",*/ "insertorderedlist", "createlinkurl", "font-sizechange", "font-families", "colorPicker", "copy", "cut");
        var side_mini = new Array("attachment"/*, "undo", "redo", "createlink","save","publish","video"*/);
        var rchBody = $(this).addClass("richtext-body").clone();
        $(this).before($("<div>").addClass("richtext-container").append(rchBody));
        $(this).remove();
        // rchBody.closest('.card').addClass('container z-depth-1');
        var parent = rchBody.parent();
        parent.closest(".hoverable").removeClass("hoverable");
        //jQuery('.scrollbar-macosx').scrollbar();
        rchBody.blur(function () {
          $(".edit-tools-h").fadeOut("slow");
        })
        rchBody.css({'padding': '0 45px'}).attr({'contentEditable': 'true', 'data-default': defaultBody}).each(function (i, a) {
          if (typeof (callback) === 'function') {
              callback(this);
          }
          $(this).find('img').dblclick(function () {
              openImage(this)
          })
          if ($(this).html().trim() == "") {
              $(this).html(defaultBody);
              $(this).addClass(defaultClass)
          }

            //Side Toolbar
          if(attachment){
            if (parent.find('.edit-tools-h').length < 1) {
                var eh = $('<div>').addClass('').attr({'contentEditable': 'false'}).addClass("edit-tools-h").css({'radius': '5px', 'width': '40px', 'height': 'auto','z-index': '1', 'right': 'unset', 'transition': 'all 1s linear', '-webkit-transition': 'all 1s linear'}).hide().appendTo($(this).parent());
                for (i in side_mini) {
                  var v = side_mini[i];
                  var anc = $('<a>').addClass('grey-text text-darken-2').attr({'href': 'javascript:;', 'data-id': v, title: edit_control[v]}).appendTo($(eh)).append($('<img>').addClass('material-icons').attr({src: `${site.backend}icons/` + edit_control[v] + '.svg'})).click(function () {
                    rchBody.find('#_tmp').remove();
                    document.execCommand('insertHTML', false, '<img id="_tmp"/>');
                    var fn = $(this).attr('data-id');
                    if (fn == 'attachment') {
                      $(this).attr({'data-href': defaultPage, 'data-display': 'all', 'data-path': '../asset/', 'data-edit': '1'});
                      $(this).uploadDialog({
                        callback: function (a, data) {replace_el(rchBody, a, data);},
                        onDrag: ''
                      });
                    } else {
                      if (navigator.appName == 'Microsoft Internet Explorer') {
                        if (fn == 'code') {
                          document.execCommand('backColor', "", "#e0f7fa");
                          document.execCommand('fontName', "", "monospace");
                          document.execCommand('indent', "", null);
                        } else {
                          document.execCommand(fn, "", null);
                        }
                      } else {
                        if (fn == 'code') {
                          document.execCommand('backColor', "", "#e0f7fa");
                          document.execCommand('fontName', "", "monospace");
                          document.execCommand('indent', "", null);
                        } else {
                            document.execCommand(fn, "", null);
                        }
                    }
                  }
                });
              }
            }
          }

          //
          function saveSelection() {
            if (window.getSelection) {
                var sel = window.getSelection();
                if (sel.getRangeAt && sel.rangeCount) {
                    return sel.getRangeAt(0);
                }
            } else if (document.selection && document.selection.createRange) {
                return document.selection.createRange();
            }
            return null;
          }

          //Re-Highlight selected text on richtext-area
          function restoreSelection(range) {
            if (range) {
              if (window.getSelection) {
                  var sel = window.getSelection();
                  sel.removeAllRanges();
                  sel.addRange(range);
              } else if (document.selection && range.select) {
                  range.select();
              }
            }
          }

          if (parent.find(".edit-tools-i").length < 1) {
              parent.find(".edit-tools-i").remove();
              var edit_tools = $('<div>').addClass('z-depth-1 edit-tools-i').attr({'contentEdittable': 'false'}).hide().appendTo(parent);
              for (i in mini) {
                  var v = mini[i]
                  var anc = $('<a>').attr({'href': 'javascript:;', 'data-id': v}).appendTo($(edit_tools)).append($('<img>').addClass('material-icons').attr({src: `${site.backend}icons/` + edit_control[v] + '.svg', title: edit_control[v]}));
                  anc[0].clicks = 0;
                  if (anc.attr("data-id") == "colorPicker")
                      anc.after("<input type='color' id='favcolor' value='' style='display:none'>");
                  if (anc.attr("data-id") == "font-families")
                      anc.before(" <div class='tdropdown'><div class='tdropdown-content rchFontFamily'><div class='input-field'><!--<input type='number' id='rchFont' min='8' max='99' style='color:black;'/>--><div class='collection'><a href='javascript:;' class='collection-item' id='font-one'>Arial</a><a href='javascript:;' class='collection-item' id='font-two'>Times</a><a href='javascript:;' class='collection-item' id='font-three'>Georgia</a><a href='javascript:;' class='collection-item' id='font-four'>Impact</a><a href='javascript:;' class='collection-item' id='font-five'>Tahoma</a><a href='javascript:;' class='collection-item' id='font-six'>Comic Sans</a></div></div></div></div>");
                  if (anc.attr("data-id") == "change-heading")
                      anc.before(" <div class='tdropdown'><div class='tdropdown-content rchFontSize'><div class='input-field'><!--<input type='number' id='rchFont' min='8' max='99' style='color:black;'/>--><div class='collection'><a href='javascript:;' class='collection-item' id='heading-one'>H1</a><a href='javascript:;' class='collection-item'id='heading-two'>H2</a><a href='javascript:;' class='collection-item' id='heading-three'>H3</a><a href='javascript:;' class='collection-item' id='heading-four'>H4</a><a href='javascript:;' class='collection-item' id='heading-five'>H5</a><a href='javascript:;' class='collection-item' id='heading-paragraph'>Paragraph</a></div></div></div></div>");
                  if (anc.attr("data-id") == "createlinkurl")
                      anc.before('<div class="tdropdown"><div class="tdropdown-content createlinkurl"><form action="javascript:;" onsubmit="return(false)" class="m-0"><div class="linkurl-c"><div class="input-field"><input required placeholder="TEXT" class="displayText default" type="text" name="displayText"></div></div><div class="row"><div class="input-field"><input required placeholder="URL" class="linkUrl default" type="url" name="linkUrl"></div></div><div class="center-align"><button class="btn waves-effect waves-light blue center_effect" type="submit" class="btnLink" name="btnLink">Add</button></div></div></form></div>');
                  if (anc.attr("data-id") == "font-sizechange")
                      anc.before(" <div class='tdropdown'><div class='tdropdown-content rchFontSize2'><div class='input-field'><!--<input type='number' id='rchFont' min='8' max='99' style='color:black;'/>--><div class='collection'><a href='javascript:;' class='collection-item' id='size-8'>8</a><a href='javascript:;' class='collection-item' id='size-9'>9</a><a href='javascript:;' class='collection-item' id='size-10'>10</a><a href='javascript:;' class='collection-item' id='size-11'>11</a><a href='javascript:;' class='collection-item' id='size-12'>12</a>        <a href='javascript:;' class='collection-item' id='size-14'>14</a><a href='javascript:;' class='collection-item' id='size-16'>16</a><a href='javascript:;' class='collection-item' id='size-18'>18</a><a href='javascript:;' class='collection-item' id='size-24'>24</a><a href='javascript:;' class='collection-item' id='size-30'>30</a><a href='javascript:;' class='collection-item' id='size-36'>36</a><a href='javascript:;' class='collection-item' id='size-48'>48</a><a href='javascript:;' class='collection-item' id='size-60'>60</a><a href='javascript:;' class='collection-item' id='size-72'>72</a><a href='javascript:;' class='collection-item' id='size-96'>96</a></div></div></div></div>");

                  anc.click(function () {
                      var fn = $(this).attr('data-id');
                      this.clicks++;
                      if (fn == 'createlinkurl') {
                        var linkContainer = $(this).parent().find('.createlinkurl');
                        parent.find(".edit-tools-i .tdropdown-content").slideUp();
                        linkContainer.slideToggle();
                        var textRange = saveSelection();
                        let textRange_ = textRange.toString();
                        let linkurl = linkContainer.find('.linkUrl');
                        let displayText = linkContainer.find('.displayText');
                        linkurl.off("focus").on('focus', function () {
                            $(this).val('http:\/\/' + textRange_.replace(/\ /g, "-") + '.com');
                        });
                        restoreSelection(textRange);
                        displayText.val(textRange_);
                        linkContainer.find('form').off("submit").on("submit", function() {
                          var form = linkContainer.find('form');
                          if(form[0].checkValidity()){
                            var data = form.serializeArray();
                            var urlval = $.grep(data, (obj)=>{return obj.name=="linkUrl"})[0].value;
                            restoreSelection(textRange);
                            url = document.execCommand('createLink', false, urlval);
                            form[0].reset();
                            linkContainer.slideUp();
                            parent.find(".edit-tools-i").fadeOut("fast");
                          }
                        })
                      }
                      if(fn == 'font-sizechange'){
                          parent.find(".edit-tools-i .tdropdown-content").slideUp();
                          var contanerFt = $(this).parent().find('.rchFontSize2');
                          contanerFt.slideToggle();
                          contanerFt.find(".collection-item").each(function(){
                            $(this).click(function () {
                              var num = $(this).attr("id").split("-")[1];
                              var selectionRange = saveSelection();
                              restoreSelection(selectionRange);
                              document.execCommand('insertHTML', false, '<span style="font-size:'+num+'px">' + selectionRange + '</span>');
                            })
                          });

                      }

                      if (fn == 'font-families') {
                        parent.find(".edit-tools-i .tdropdown-content").slideUp();
                        $(this).parent().find('.rchFontFamily').slideToggle();
                          $(document).on('click', '#font-one', function () {
                              var selectionRange = saveSelection();
                              //restoreSelection(selectionRange);
                              document.execCommand("fontName", false, 'arial');
                              hideTools();
                          })
                          $(document).on('click', '#font-two', function () {
                              document.execCommand("fontName", false, 'times');
                              hideTools();
                          })
                          $(document).on('click', '#font-three', function () {
                              document.execCommand("fontName", false, 'georgia');
                              hideTools();
                          })
                          $(document).on('click', '#font-four', function () {
                              document.execCommand("fontName", false, 'impact');
                              hideTools();
                          })
                          $(document).on('click', '#font-five', function () {
                              document.execCommand("fontName", false, 'tahoma');
                              hideTools();
                          })
                          $(document).on('click', '#font-six', function () {
                              document.execCommand("fontName", false, 'comic sans ms');
                              hideTools();
                          })
                      }

                      if (fn == 'change-heading') {
                        parent.find(".edit-tools-i .tdropdown-content").slideUp();
                        $(this).parent().find('.rchFontSize').slideToggle();
                          $(document).on('click', '#heading-one', function () {
                              var selectionRange = saveSelection();
                              restoreSelection(selectionRange);
                              document.execCommand('insertHTML', false, '<h1>' + selectionRange + '</h1>');
                              hideTools();
                          })
                          $(document).on('click', '#heading-two', function () {
                              var selectionRange = saveSelection();
                              restoreSelection(selectionRange);
                              document.execCommand('insertHTML', false, '<h2>' + selectionRange + '</h2>');
                              hideTools();
                          })
                          $(document).on('click', '#heading-three', function () {
                              var selectionRange = saveSelection();
                              restoreSelection(selectionRange);
                              document.execCommand('insertHTML', false, '<h3>' + selectionRange + '</h3>');
                              hideTools();
                          })
                          $(document).on('click', '#heading-four', function () {
                              var selectionRange = saveSelection();
                              restoreSelection(selectionRange);
                              document.execCommand('insertHTML', false, '<h4>' + selectionRange + '</h4>');
                              hideTools();
                          })
                          $(document).on('click', '#heading-five', function () {
                              var selectionRange = saveSelection();
                              restoreSelection(selectionRange);
                              document.execCommand('insertHTML', false, '<h5>' + selectionRange + '</h5>');
                              hideTools();
                          })
                          $(document).on('click', '#heading-paragraph', function () {
                              var selectionRange = saveSelection();
                              restoreSelection(selectionRange);
                              document.execCommand('insertHTML', false, '<h6>' + selectionRange + '</h6>');
                              hideTools();
                          })

                      } else {
                          if (navigator.appName == 'Microsoft Internet Explorer') {
                              if (fn == 'code') {
                                  document.execCommand();
                                  document.execCommand('fontName', "", "monospace");
                                  document.execCommand('indent', "", null);
                              } else {
                                  document.execCommand(fn, "", null);
                              }
                          } else {
                              if (fn == 'code') {
                                  document.execCommand('backColor', "", "#e0f7fa");
                                  document.execCommand('fontName', "", "monospace");
                                  document.execCommand('indent', "", null);
                              } else {
                                  document.execCommand(fn, "", null);
                              }
                          }
                          if (fn == 'paste') {
                              //document.execCommand('backColor', '', '#001a31');
                          } else {
                              //                            document.execCommand(fn, "", null);
                          }
                          if (fn == 'bold') {
                              document.execCommand('bold');
                          }
                          if (fn == 'underline') {
                              document.execCommand('underline');
                          }
                          if (fn == 'italic') {
                              document.execCommand('italic');
                          }
//                            if (fn == 'insertunorderedlist') {
//                                var selectionRange = saveSelection();
//                                restoreSelection(selectionRange);
//                                document.execCommand('insertHTML', false, '<span class="redblued">' + selectionRange + '<span>');
//                            }
                          if (fn == 'insertorderedlist') {
                              document.execCommand('insertOrderedList', '  ', 'upper-roman');
                          }
                          if (fn == 'redo') {
                              document.execCommand('redo');
                          }
                          if (fn == 'colorPicker') {
                              var colorBd = $("#favcolor").click();
                          } else
                              document.execCommand(fn, '', null);
                      }
                  });



                  //for color
                  $("#favcolor").on("change", function () {
                      var colorBd = $(this), selColor = colorBd.val();
                      document.execCommand('foreColor', '', selColor);
                  });
              }
          }
          //jQuery('.tdropdown-content').scrollbar();
          $('.tooltipped').tooltip({delay: 50});



        }).focus(function () {
            enableTools();
        })
                .keyup(function (e) {
                    if ($(this).html().trim() == "" || $(this).html().trim() == "<br>") {

                        $(this).html(defaultBody);
                        $(this).addClass(defaultClass)
                    }

                    showTools(e);


                })
                .keydown(function (e) {
                    if ($(this).html().trim() == defaultBody) {
                        $(this).html('');
                        $(this).removeClass(defaultClass)
                    }
                    ;

                })
                .mouseup(function (e) {
                    showTools(e);
                    let position  = getPosition(e)
                    parent.find(".edit-tools-h").css({top: position.top}).fadeIn();
                })
                .blur(function (e) {
                  showTools(e);
                })
        //end attach reactid;

        DisableTools();
        function getPosition(e) {
          let offsetTop = rchBody.parent().offset().top;
          let top = e.pageY - Math.round(offsetTop);
          top = (top < 20) ? 20 : top;
          var relativePosition = {
            top : top ,
            left: e.pageX - $(document).scrollLeft() - rchBody.parent().offset().left
          };
          return relativePosition;
        }
        function showTools(e) {
            if (window.getSelection() != '') {
              let position = getPosition(e);
              let smart = {};
              let width = rchBody.parent().width();
              position.top = position.top - 120;
              position.top = (position.top < 20) ? 20 : position.top;
              smart.top = position.top;
              if((position.left +500) > width){
                smart.right = 100;
                smart.left = "unset";
              }else{
                smart.right = "unset";
                smart.left = position.left + 50;
              }
              parent.find(".edit-tools-i").css(smart).fadeIn();
            } else{
              parent.find(".edit-tools-i .tdropdown-content").slideUp();
              parent.find(".edit-tools-i, .edit-tools-h").fadeOut();

            }
        }
        function DisableTools() {
            $('#wallpaper').addClass('disabled').prop({'data-disabled': 1});
            $('#visibility').addClass('disabled').prop({'data-disabled': 1});
        }
        function enableTools() {
            $('#wallpaper').prop({'data-disabled': 2}).removeClass('disabled');
            $('#visibility').prop({'data-disabled': 2}).removeClass('disabled');
        }
        function disableSave() {
            $('#publish').addClass('disabled').prop({'data-disabled': 1});
            $('#save').addClass('disabled').prop({'data-disabled': 1});
        }
        function enableSave() {
            $('#publish').removeClass('disabled').prop({'data-disabled': 0});
            $('#save').removeClass('disabled').prop({'data-disabled': 0});
        }
    }
})


function getDataDiv(ty, img) {
    if (ty == 'picture') {
        var ar = ['height', 'width'], immm = {};
        for (var i in img) {
            var ii = i;
            if ($.inArray(i, ar) != -1) {
                ii = 'data-' + i;
            }
            immm[ii] = img[i];
        }
        var imgi = $('<img>').dblclick(function () {
            var aa = $(this);
            aa.parent().attr({id: '_tmp'});
            var attr = attrToObj(this.attributes);
            $(this).modify_resource({
                callback: function (a, data) {
                    replace_el(aa.closest('.richtext-body'), a, data);
                },
                data: attr
            })
        }).attr(immm).css({'margin': img.margin, width: '100%', height: '100%'});
        var imgii = $('<div>').append(imgi);
        imgii.resizable();
    } else if (ty == 'pdf' || ty == 'document' || ty == 'archive') {
        var imgii = $('<div>').dblclick(function () {
            var attr = attrToObj(this.attributes);
            var aa = $(this);
            aa.attr({id: '_tmp'});
            $(this).attr({'data-display': ty});
            $(this).modify_resource({
                callback: function (a, data) {
                    replace_el(aa.closest('.richtext-body'), a, data);
                },
                data: attr
            })
        });
        var cd_img = $('<a>').css({'background-color': 'teal', padding: '5px 15px 6px', color: 'white', 'border-radius': '3px', 'margin': '3px', float: 'left'}).addClass('richtext-anchor').attr({href: img.src, title: img.title, download: true, contentEditable: false}).text('Download ' + img.name).appendTo(imgii);
    } else if (ty == 'audio' || ty == 'video') {
        var imgii = $('<div>').dblclick(function () {
            var attr = attrToObj(this.attributes);
            var aa = $(this);
            aa.attr({id: '_tmp'});
            $(this).attr({'data-display': ty});
            $(this).modify_resource({
                callback: function (a, data) {
                    replace_el(aa.closest('.richtext-body'), a, data);
                },
                data: attr
            })
        }).addClass('').css({'padding': '10px', 'width': img.width, 'margin': img.margin, 'align': img.align})

        var name = $('<div>').appendTo(imgii).addClass("card-action truncate");
        var ing = $('<' + ty + '>').appendTo(name).attr({'controls': 'controls', 'width': '100%', 'height': '100%', 'id': ty + '_control'}).css({'width': '100%'});
        var src = $('<source>').addClass('richtext-anchor').appendTo(ing).attr({'src': img.src});
    }
    return imgii;
}

function replace_el(rchBody, el, data) {
    data['data-edit'] = 1;
    var imgii = getDataDiv(data.type, data);
    var rb = rchBody.focus();
    if ($(rb).html().trim() == defaultBody) {
        $(rb).html('');
        $(rb).removeClass(defaultClass);
    }
    rchBody.find('#_tmp').replaceWith($(imgii));
}

function attrToObj(attr) {
    var obj = {};
    $.each(attr, function (i, v) {
        if (v.specified) {
            obj[v.name] = v.value;
        }
    });
    return obj;
}
