// JavaScript Document
class Site {
  constructor() {
    let thx = this;
    getCookie("siteData", function (rear) {
      if (rear.length > 10) {
        //cookie string is not empty
        let uri = rear.split(",");
        thx.domain = uri[0];
        thx.backend = uri[0] + uri[1];
        thx.absolute_filepath = uri[2];
        thx.process = `${thx.backend}process/`;
      } else {
        alert("Please initialize php Site class to continue");
      }
    });
    setCookies({ timezone: Intl.DateTimeFormat().resolvedOptions().timeZone });
  }
}

let site = new Site();

$.fn.extend({
  socialShare: function (obj) {
    let read = false;
    let $this = $(this);
    if (typeof obj !== "object") {
      obj = {};
      read = true;
    }
    if ($(this).data("name")) {
      $(this).attr({ href: "javascript:;" });
      $(this).click(function () {
        var socialMedia = $this.data("name");
        var title = $this.data("title") || "Title Here";
        let link = "";
        let client = "";
        let resolution = "width=626,height=436";
        let dd = {};
        if (read === false) {
          //Share from card in list view
          $.post(`${site.process}social`, obj, function (data) {
            let dd = isJson(data);
            if (!dd) {
              console.log(data);
              swal("Oops!", data, "error");
            }
          });
        } else {
          dd.url = window.location;
          dd.text = "";
        }
        if (dd != undefined || read) {
          switch (socialMedia) {
            case "fb":
              link = "https://www.facebook.com/sharer/sharer.php?u=" + dd.url;
              client = "facebook-share-dialog";
              break;
            case "tw":
              link = "https://twitter.com/intent/tweet?text=" + title + "&url=" + dd.url;
              client = "twitter-share-button";
              break;
            case "li":
              link = "https://www.linkedin.com/sharing/share-offsite/?url=" + dd.url;
              break;
            case "wh":
              link = "whatsapp://send?text=" + dd.url;
              break;
            default:
              link = "undefined";
              client = "facebook-share-dialog";
              break;
          }
          window.open(link, client, resolution);
          return false;
        }
      });
    } else {
      alert("This social-share element needs a 'data-name' attribute");
    }
  },
});

$.fn.extend({
  logout: function () {
    $(this).click(function (e) {
      e.preventDefault;
      document.cookie = "u_vname=; Thu, 01 Jan 1970 00:00:01 UTC; path=/";
      document.cookie = "status=; Thu, 01 Jan 1970 00:00:01 UTC; path=/";
      document.cookie = "u_vimage=; Thu, 01 Jan 1970 00:00:01 UTC; path=/";
      document.cookie = "u_vemail=; Thu, 01 Jan 1970 00:00:01 UTC; path=/";
      document.cookie = "u_vid=; Thu, 01 Jan 1970 00:00:01 UTC; path=/";
      location.reload();
    });
  },
});

$.fn.extend({
  //pass the parameter name for login as 'formName'
  /*
		This formName is the name of paramter to pick table, primary_key column, email column, password column, username column, name column. you can use the admin_signin paramter for it or define yours to look like admin signin.
	*/
  // pass forgoTPassword:true to use the forgot password feature
  loginForm: function (object, callback) {
    "use strict";
    let $this = $(this);
    let loginForm = $this;
    let child = loginForm.prop("tagName").toLowerCase();
    if (child !== "form") {
      alert("This element must be a form element !!!");
    }
    if (!object.formName) {
      alert(
        "loginForm plugin requires 'formName' property to initialize. This form formName is the name of the param to get table information from. See 'admin_signin' param or documention for more details"
      );
      return;
    } else {
      object.process_url = `${site.process}login`;
      object.submitType = null;
      loginForm.submitForm(object, null, function (res) {
        if (typeof callback === "function") {
          callback(res);
        } else {
          if (res.status) {
            //Default Login action;
            console.log("A session has been set for logging in");
            setTimeout(() => {
              let url = new String(window.location);
              if (url.indexOf("?redir=") != -1) {
                url = url.split("=")[1];
              } else {
                url = site.domain;
              }
              window.location = url;
            }, 1500);
          }
        }
      });
      if (object.forgoTPassword) {
        delete object.forgoTPassword;
        // Duplicate Object
        let forgotData = $.extend({}, object);
        $this.parent().forgoTPassword(forgotData);
      }
    }
  },
});

$.fn.extend({
  //pass the parameter name for login as 'formName'
  /*
		This formName is the name of paramter to pick table, primary_key column, email column, password column, username column, name column. you can use the admin_signin paramter for it or define yours to look like admin signin.
	*/
  forgoTPassword: function (a) {
    "use strict";
    let $this = $(this);
    let loginForm = $this.children("form");
    let child = loginForm.prop("tagName").toLowerCase();
    if (child !== "form") {
      alert("This element must be a form element !!!");
    } else if (!a.formName) {
      alert(
        "forgoTPassword plugin requires 'formName' property to initialize. It is the name of the param from which to extract the member's table and columns."
      );
    } else {
      $this[0].param = a;
      $this.addClass("login-panel");
      if (loginForm.find(".forgot-password").length) {
        let input = loginForm.find(".forgot-element").first();
        if (!input.length) {
          alert(
            "User's input not found !!!. \n Add classname 'forgot-element' to the element that is used to identify the user"
          );
        } else if (input.prop("tagName").toLowerCase() !== "input") {
          alert("User's identifier element must be an input field.");
        } else {
          let forgotbutton = loginForm.find(".forgot-password");
          var user_col = input.attr("name");
          if (forgotbutton.length !== 0) {
            forgotbutton.attr({ href: "javascript:;" }).click(function () {
              var user_identifier = input.val();
              if (user_identifier) {
                var fpass = $("#forgot-panel");
                let Forgot = a;
                Forgot[user_col] = user_identifier;
                forgotbutton.startLoader(true);
                $.post(`${site.process}forgot-password`, Forgot, function (res) {
                  //after sending email
                  forgotbutton.stopLoader(true);
                  var data = isJson(res);
                  if (data.status) {
                    fpass.find(".reset-notice").html(data.notice);
                    fpass.find(".user_id").attr({ name: data.primary_key }).val(data[data.primary_key]);
                    if (data.unique_key) {
                      fpass.children("form").formdata(data.unique_key, data[data.unique_key]);
                    }
                    if (data.logging) {
                      fpass.children("form").formdata(data.logging, data[data.logging]);
                    }
                    setTimeout(function () {
                      //Disable the generated code after 10mins
                      $.post(`${site.process}delete-pin`, {});
                    }, 60 * 10 * 1000);
                    $this.swapDiv(fpass);
                  } else {
                    console.log(res);
                    if (data.message) {
                      if (typeof toast === "function") {
                        toast(data.message, "red");
                      } else {
                        alert(data.message);
                      }
                    }
                  }
                });
              } else {
                input.focus();
                let text = input.attr("type");
                let mapp = {
                  email: "Email",
                  text: "Email or Username",
                  "": "Information in the input field",
                  tel: "11 digit Phone Number",
                  number: "Information in the input field",
                };
                mapp[text] == mapp[text] || input.attr("name");
                toast("Please enter your " + mapp[text], "indigo");
              }
            });
            $this.parent().append(
              $("<div>")
                .attr({ id: "forgot-panel", "data-toggle": "login-panel" })
                .css({
                  display: "none",
                  opacity: "0",
                  "max-width": "400px",
                  border: "solid 1px #ccc",
                  "border-radius": "5px",
                  padding: "15px",
                  margin: "auto !important",
                })
                .append(
                  $("<form>")
                    .attr({ action: "javascript:;", onsubmit: "return(false)" })
                    .append(
                      $("<h3>").css({ padding: "15px" }).addClass("mt-1 name text-center").text("Forgot Password")
                    )
                    .append(
                      $("<p>")
                        .css({ "line-height": "20px", "text-align": "center", padding: "15px", width: "100%" })
                        .css({ "line-height": "15px" })
                        .append($("<span>").addClass("reset-notice"))
                        .append($("<span>").text(". Get the token and change your password, check spamBox too."))
                    )
                    .append(
                      $("<div>")
                        .css({ width: "100%", padding: "15px" })
                        .append(
                          $("<div>")
                            .addClass("ml-0 mr-0 search-container log-input")
                            .append(
                              $("<input>")
                                .addClass("form-control ml-0")
                                .attr({
                                  placeholder: "Enter the TOKEN code",
                                  type: "number",
                                  id: "token",
                                  name: "token",
                                  required: "required",
                                })
                                .css({ "border-radius": "3px" })
                            )
                        )
                    )
                    .append(
                      $("<div>")
                        .css({ width: "100%", padding: "15px" })
                        .append(
                          $("<div>")
                            .addClass("ml-0 mr-0 search-container log-input")
                            .append(
                              $("<input>")
                                .addClass("form-control ml-0")
                                .attr({
                                  placeholder: "Enter your new password",
                                  type: "password",
                                  id: "password",
                                  name: "password",
                                  required: "required",
                                })
                                .css({ "border-radius": "3px" })
                            )
                        )
                    )
                    .append(
                      $("<div>")
                        .css({ width: "100%", padding: "15px" })
                        .append(
                          $("<div>")
                            .addClass("ml-0 mr-0 search-container log-input")
                            .append(
                              $("<input>")
                                .addClass("form-control ml-0")
                                .attr({
                                  placeholder: "Confirm your new password",
                                  type: "password",
                                  id: "password2",
                                  name: "password2",
                                  required: "required",
                                })
                                .css({ "border-radius": "3px" })
                            )
                            .append(
                              $("<input>")
                                .addClass("form-control ml-0 user_id")
                                .attr({ type: "hidden", name: "id" })
                                .css({ "border-radius": "3px" })
                            )
                        )
                    )
                    .append(
                      $("<div>")
                        .css({ width: "100%", padding: "15px" })
                        .append(
                          $("<a>")
                            .addClass("btn-error btn")
                            .attr({ href: "javascript:;" })
                            .click(function () {
                              $("#forgot-panel").swapDiv($this);
                            })
                            .text("Cancel")
                        )
                        .append(
                          $("<button>")
                            .addClass("button submit success place-right btn-primary btn float-right")
                            .text("Reset")
                        )
                    )
                )
            );
            let reset_data = $.extend({}, a);
            reset_data.process_url = `${site.process}reset-password`;
            $("#forgot-panel")
              .find("form")
              .submitForm(reset_data, null, function ($data) {
                if ($data.status == 1) {
                  console.log($data);
                  let fpass = $("#forgot-panel");
                  fpass.find("form")[0].reset();
                  fpass.swapDiv(fpass.siblings(".login-panel"));
                  toast("Password Successfully changed", "green");
                } else {
                }
              });
          } else {
            alert("Forgot Password Button not found, use classname 'forgot-password'");
          }
        }
      } else {
        alert(
          "forgot password button not found, \n add (forgot-password) as a class to the button within this login form"
        );
      }
    }
  },
});

$.fn.extend({
  init_captcha: function (init) {
    /*$(el).init_captcha({//on any div element inside the registration form
			process_url : //link to process.php
			rear : //link to backend
		})
		*/
    "use strict";
    var $this = $(this);
    $.post(init.process_url, { type: 1.02 }, function (res) {
      var data = isJson(res);
      if (data) {
        var key = Math.floor(Math.random() * 20);
        var captch = $("<div>").addClass("captcha").css({
          "font-size": "12px",
          width: "80%",
          margin: "0 auto",
          "font-weight": "bold",
          "font-style": "italic",
          position: "relative",
        });
        captch[0].param = data;
        captch
          .append(
            $("<img>")
              .addClass("captcha_refresh")
              .css({ position: "absolute", right: "-27px", top: "7px", height: "20px", cursor: "pointer" })
              .attr({ src: init.rear + "icons/refresh.svg", title: "Refresh Captcha" })
              .click(function () {
                var captcha = $(this).parent().prop("param"),
                  $this = $(this);
                var key_ = Math.floor(Math.random() * 20);
                $this.addClass("rotating");
                setTimeout(function () {
                  $this.removeClass("rotating");
                  $this
                    .parent()
                    .find(".captch_question")
                    .text("Captcha Question : " + captcha[key_].question);
                  $this.parent().find("#captcha_key").val(key_);
                }, 1000);
              })
          )
          .append(
            $("<div>")
              .addClass("captch_question")
              .text("Captcha Question : " + data[key].question)
          )
          .append(
            $("<div>")
              .addClass("ml-0 mr-0 search-container log-input")
              .append(
                $("<input>")
                  .addClass("form-control ml-0")
                  .attr({ placeholder: "Answer", type: "text", id: "captcha", name: "captcha", required: "required" })
                  .css({ "border-radius": "3px", "font-size": "12px" })
              )
              .append(
                $("<input>")
                  .attr({ type: "hidden", id: "captcha_key", name: "captcha_key", required: "required" })
                  .val(key)
              )
          );
        $this.empty().append(captch);
      } else {
        console.log(res);
        console.log("Captcha process type is 1.02");
      }
    });
  },
});

$.fn.extend({
  // Update cart in rear
  updateCart: function (data, callback) {
    $.post(`${site.process}update-cart`, { data: data }, (response) => {
      if (typeof callback == "function") {
        callback(response);
      } else if (callback !== "success") {
        console.log(response);
      }
    });
  },
});

//Generic Form submitter
//Add parameter.case to submit the form to your user defined server scripts
//Else it would push it to the form submission scrip that requires param to work;
//Either ways you're still covered, because the code would tell you what it requires at each point.
//Just initialize submitForm on any form element and continue with the requirements it requests
$.fn.extend({
  submitForm: function (parameters, callbefore, callback) {
    let form = $(this);
    let domName = form.prop("tagName") || null;
    if (!domName || domName.toLowerCase() !== "form") {
      alert("This is not a form element !!!");
      return;
    } else if (form.find("button.submit").length == 0) {
      alert("add classname 'submit' to the submit button");
      return;
    } else {
      let button = form.find("button.submit, button[type=submit], input[type=submit]");
      form.attr({ action: "javascript:;", method: "POST" });
      button.removeAttr("onclick").off("click").attr({ type: "submit" });
      form.submit(function () {
        let proceed = true;
        parameters.validation = parameters.validation || "strict";
        //button.Loader.start();
        let formData = form.serializeArray();
        if (form[0].checkValidity() === true) {
          button[0].go = true;
          //merge parameters with FormData
          for (let key in parameters) {
            formData.push({ name: key, value: parameters[key] });
          }
          // Find data in form dom and push to formData
          let _formdata = form.formdata();
          for (let i in _formdata) {
            formData.push(_formdata[i]);
          }
          //Run a function befor submission
          if (typeof callbefore === "function") {
            formData = callbefore(formData);
            if (formData.error) {
              toast(formData.error, "red", formData.duration);
              return false;
            }
          }
          if (parameters.validation === "strict") {
            for (let key in formData) {
              if (formData[key].value === "") {
                let desc = form.find("[name=" + formData[key].name + "]").attr("placeholder") || formData[key].name;
                toast(desc + " is invalid", "black");
                proceed = false;
              }
            }
          }
          if (proceed === true && button[0].go === true && formData) {
            button.startLoader(true); //set true to deactivate form inputs
            button[0].go = false;
            let process_url = formData.filter((obj) => {
              return obj.name == "process_url";
            });
            process_url = process_url[0] ? process_url[0].value : parameters.process_url;
            process_url = process_url || `${site.process}submit`;

            // Default case
            let kase = formData.filter((obj) => {
              return obj.name == "case";
            });

            $.post(process_url, formData, (response) => {
              button.stopLoader(true); //set true to reactivate form inputs
              button[0].go = true;
              let res = isJson(response);
              let color = ["red", "green"];
              let status = res.status ? res.status : 0;
              let message = res.status ? "Successful" : "An Error Occured, Check console !!!";
              message = res.message || message;
              toast(message, color[status]);
              //if there is callback function
              if (typeof callback == "function") {
                if (res.status) {
                  for (let i in formData) {
                    res[formData[i].name] = formData[i].value;
                  }
                  callback(res);
                } else {
                  console.log(response);
                }
              } else {
                if (res.status) {
                  form[0].reset();
                } else {
                  console.log(response);
                }
              }
            });
          }
        } else {
          console.log(form[0].checkValidity());
          console.log(formData);
        }
      });
      form.find("input[type=file].file_upload").each(function () {
        $(this).uploadFile();
      });
    }
  },
});

//Used to automate chats on comment section
// paramters.interval : time interval for reloading comment list in seconds
// paramters.userid : optional when you want to differentiate chat for the current user
// paramters.submitForm{
// formName: name of the param that runs the submitForm as in the submitForm widget (required)
// callbefore : a function that runs before a comment is posted (callback)
// callback   : a function that runs after  a comment is posted
// }
$.fn.extend({
  initComments: function (paramters) {
    let $comment_container = $(this);
    $comment_container.append(
      $("<section>")
        .attr({ id: "comments-section" })
        .append($("<div>").addClass("row").append($("<div>").addClass("comment-list row")))
        .append(
          $("<div>")
            .addClass("comment-form row")
            .append(
              $("<form>")
                .append(
                  $("<div>")
                    .addClass("form-control")
                    .append($("<input>").attr({ name: "user_name", type: "text", required: true }))
                )
                .append(
                  $("<div>")
                    .addClass("form-control")
                    .append($("<input>").attr({ name: "message", type: "text", required: true }))
                )
                .append(
                  $("<div>")
                    .addClass("form-control")
                    .append($("<button>").addClass("submit").attr({ type: "submit" }).text("Post"))
                )
            )
        )
    );
    $comment_container.find("#comments-section").loadComments(paramters);
  },
});

// Add data-id and data-type to the  element before initializing this function;
// data-id is the id of the post
// data-type is the type of post or the foldername to write the views in
$.fn.extend({
  updateViews: function (callback) {
    let $post_id = $(this).data("id");
    let $folder_name = $(this).data("type");
    if ($post_id) {
      $.post(
        `${site.process}files`,
        { case: "noOfViews", folder_name: $folder_name, id: $post_id },
        function (response) {
          let $data = isJson(response);
          if ($data && typeof callback == "function") {
            callback($data);
          } else {
            console.log(response);
          }
        }
      );
    } else {
      alert("Add 'data-id' attribute to this element with the content's id");
    }
  },
});

// automatically upload files from forms
$.fn.extend({
  uploadFile: function (obj, callback) {
    obj = obj || {};
    $(this).change(function () {
      let ths = this;
      var fm = new FormData();
      let folder = obj.folder || $(this).attr("data-path");
      folder = folder || `${site.domain}assets/`;
      let process_url = obj.process_url || `${site.process}upload`;
      let type = obj.type || $(this).attr("data-type");
      let element_name = obj.name || $(this).attr("name");
      let target_name = obj.target_name || $(this).attr("data-target_name");
      callback = callback || $(this).attr("data-callback");
      type = type || "picture";
      fm.append("file_upload", this.files[0]);
      fm.append("folder", folder);
      fm.append("case", "fileUpload");
      fm.append("getype", type);
      fm.append("resize", true);
      $(this).parent().startLoader(true);
      $.ajax({
        //just upload
        url: process_url,
        type: "POST",
        data: fm,
        processData: false,
        contentType: false,
      }).done(function (response) {
        $(ths).parent().stopLoader(true);
        let res = isJson(response);
        if (!res || res.error) {
          let message = res.error || "An error occured";
          toast(message, "red");
          console.log(response);
        } else {
          if (typeof callback == "function") callback(res);
          else if (typeof callback == "string") window[callback](ths, res);
          else {
            if (target_name) $("#" + target_name).val(res.src);
            else if ($(ths).attr("name")) $(ths).val(res.src);
            else $(ths).closest("form").formdata(element_name, res.src);
          }
        }
      });
    });
  },
});

//Assign or Extract Values to/from multiple elements
$.fn.extend({
  values: function (obj) {
    let response = new Object();
    $(this).each(function (i) {
      let element_name = $(this).attr("name");
      if (typeof obj == "object") {
        if (obj.length && obj[i]) $(this).val(obj[i]);
        else if (!obj.length && obj[element_name]) $(this).val(obj[element_name]);
      } else {
        if (element_name) response[element_name] = $(this).val();
        else response[i] = $(this).val();
      }
    });
    if (typeof obj == "undefined") return response;
  },
});

//------------------------------------------------------------------ Dependable Functions--------------------

$.fn.extend({
  disableForm: function () {
    $(this).find("input, select, textarea, button").not(":disabled").addClass("mydisabled").attr({ disabled: true });
  },
});
$.fn.extend({
  enableForm: function () {
    $(this).find(".mydisabled").removeClass("mydisabled").attr({ disabled: false });
  },
});

$.fn.extend({
  // Creates a formdata inside a form DOM and adds values to it;
  // retrieves all formdata inside a DOM by not passing any paramters
  // retrieves specific formdata inside a DOM by not passing only the key
  // Clears all values inside a formdata object by passing false as parameter
  formdata: function (key, value) {
    let form = $(this);
    let domName = form.prop("tagName") || null;
    // Must be initialized on a form element
    if (!domName || domName.toLowerCase() !== "form") {
      toast("This is not a form element !!!");
      return;
    }
    let formdata = [];
    // Creates a default empty formdata array if there isnt any one existing before or to to empty an exitsting formdata
    if (!form.prop("formdata") || key === false) {
      form[0].formdata = formdata;
    }
    if (key) {
      formdata = form.prop("formdata");
      // Remove every existing key from the formdata array
      if (value) {
        formdata.forEach((item, i) => {
          if (item.name == key) formdata.splice(i, 1);
        });
        let obj = { name: key, value: value };
        form[0].formdata.push(obj);
        return true;
      } else {
        // retun the existing data from the key
        formdata = form.prop("formdata") || [];
        formdata.forEach((item, i) => {
          if (item.name == key) value = item.value;
        });
        return value;
      }
    } else {
      formdata = form.prop("formdata") || [];
      return formdata;
    }
  },
});

$.fn.extend({
  startLoader: function (disable_form, size = 16) {
    let degrees = 0;
    let $this = $(this);
    if ($this) {
      $this.append(
        $("<img>")
          .addClass("_loader")
          .attr({ src: site.backend + "icons/rotate_right.svg", disabled: true })
          .css({ width: size })
      );
      let rocket = $(this).find("._loader")[0];
      let interval = setInterval(function () {
        degrees = degrees >= 359 ? 0 : degrees;
        degrees = parseInt(degrees) + parseInt(25);
        rocket.style.webkitTransform = "rotate(" + degrees + "deg)";
      }, 50);
      $this[0].interval = interval;
      if (disable_form === true) {
        $this.closest("form").disableForm();
      }
    }
    return $this;
  },
});

$.fn.extend({
  stopLoader: function (enable_form) {
    let degrees = 0;
    let $this = $(this);
    if ($this[0].interval) {
      let interval = $this[0].interval;
      clearInterval(interval);
      $this.attr({ disabled: false }).find("._loader").remove();
      if (enable_form === true) {
        $this.closest("form").enableForm();
      }
    }
  },
});

function getCookie(d, callback) {
  var d_ = decodeURIComponent(document.cookie);
  var _A = d_.split(";"),
    r = {},
    c = 0;
  var d = d.split(",");
  d = d.map(function (pa) {
    return pa.trim();
  });
  var arr = d[0] === "all" ? ["u_vname", "u_vimage", "u_vemail", "u_vstatus", "u_vid"] : d;
  for (var i in _A) {
    _A[i] = new String(_A[i]);
    if (_A[i]) {
      var a = _A[i].split("=");
      var k = a[0].trim();
      if ($.inArray(k, arr) !== -1) {
        r[k] = a[1];
        c++;
      }
    }
  }
  if (c) {
    var data = d.length === 1 ? r[d[0]] : r;
    callback(data);
  } else {
    callback({});
  }
}

function setCookies(obj) {
  var d = new Date();
  d.setTime(d.getTime() + 168 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  setTimeout(function () {
    for (var key in obj) {
      document.cookie = key + "=" + obj[key] + ";" + expires + `;path=/; samesite=lax`;
    }
  }, 1000);
  return true;
}

function see(data, stop = true) {
  console.log(data);
  if (stop) throw "Returned";
}

function printData(data) {
  data = data.data || data;
  $("<div>").html(data).divPrint();
}

// text area auto resizer to fit content
jQuery.fn.extend({
  autoHeight: function () {
    function autoHeight_(element) {
      return jQuery(element).css({ height: "auto", "overflow-y": "hidden" }).height(element.scrollHeight);
    }
    return this.each(function () {
      autoHeight_(this).on("input", function () {
        autoHeight_(this);
      });
    });
  },
});

if (typeof toast !== "function") {
  function toast(msg, color = "green", time) {
    time = time || 2000;
    var ts = $("<div>")
      .appendTo("body")
      .css({
        overflow: "hidden",
        display: "block",
        position: "fixed",
        "z-index": "800001",
        top: "20%",
        left: "4%",
        "background-color": color,
        "border-radius": "2px",
        "text-align": "center",
      })
      .attr({ id: "toast-container_" })
      .append(
        $("<div>")
          .css({
            "background-color": color,
            opacity: "1",
            float: "left",
            padding: "5px 10px",
            "text-align": "center",
            "line-height": "30px",
            "margin-top": "0px",
            "font-size": "15px",
            color: "white",
            "font-family": "'Raleway', sans-serif",
          })
          .addClass("toast_")
          .text(msg)
      );
    $(ts).animate({ top: 0 }, 2000);
    setTimeout(function () {
      $(ts).remove();
    }, time);
  }
}
if (typeof isJson !== "function") {
  window.isJson = function (str) {
    "use strict";
    if (!str) {
      return false;
    } else if (typeof str == "object") {
      return str;
    } else {
      try {
        var data = JSON.parse(str);
        if (typeof data !== "object") {
          return false;
        }
        return data;
      } catch (e) {
        return false;
      }
    }
  };
}
if (!jQuery.fn.swapDiv) {
  $.fn.extend({
    swapDiv: function (toshow, callback) {
      if ($(this).length) {
        $(toshow).hide();
        $(this).animate({ marginLeft: "-5%", opacity: 0 }, "fast", function () {
          $(this).hide();
          $(toshow).show().css({ opacity: 0, "margin-left": "-5%" }).animate({ marginLeft: "0%", opacity: 1 }, "slow");
          if (typeof callback == "function") {
            callback(toshow);
          }
        });
      } else {
        $(toshow).show();
        if (typeof callback == "function") {
          callback(toshow);
        }
      }
    },
  });
}

function random(l = 8) {
  return Math.random().toString(36).substring(l);
}
function strtourl(str) {
  str = str.toLowerCase().replace(/\[^0-9a-z]/gi, "");
  return str.replace(/ /g, "-");
}

function mergeProperties(obj1, obj2) {
  obj1 = $.extend({}, obj1);
  for (var index in obj2) {
    if (obj2.hasOwnProperty(index) && index !== "__proto__") {
      obj1[index] = obj2[index];
    }
  }
  return obj1;
}

$.fn.extend({
  slideInFromEdge: function (callback) {
    let slide = $("<div>")
      .css({
        position: "fixed",
        left: 0,
        right: 0,
        bottom: 0,
        top: 0,
        backgroundColor: "rgb(21 19 19 / 74%)",
        zIndex: 1000,
      })
      .click(function () {
        $(this).closeSlider();
      });
    $(this).append(
      slide.append(
        $("<div>")
          .addClass("slideInFromEdge")
          .css({
            width: 0,
            maxWidth: 480,
            top: 0,
            right: 0,
            bottom: 0,
            position: "fixed",
            backgroundColor: "#292d35",
            boxShadow: "-10px 0px 10px 1px #1f1e1e3b",
          })
          .animate(
            {
              width: "100%",
            },
            "slow",
            function () {
              let css = $("body").css("overflow");
              $("body").attr({ "data-css": css }).css({ overflow: "hidden" });
            }
          )
          .click(function (e) {
            e.stopPropagation();
          })
          .append(
            $("<p>").append(
              $("<img>")
                .attr({ src: `${site.backend}icons/clear.svg` })
                .css({ padding: 15, cursor: "pointer" })
                .click(function () {
                  $(this).closest(".slideInFromEdge").parent().closeSlider();
                })
            )
          )
          .append($("<section>").addClass("slide-content").css({ width: "100%", padding: "0 20px" }))
      )
    );
    if (typeof callback == "function") {
      callback(slide.find("section"));
    }
  },
  closeSlider: function (callback) {
    let slide = $(this);
    slide
      .children()
      .animate(
        {
          width: 0,
        },
        1000
      )
      .children()
      .fadeOut();
    setTimeout(() => {
      slide.remove();
      if (typeof callback == "function") {
        callback();
      }
      let css = $("body").attr("data-css");
      $("body").css({ overflow: css }).removeAttr("data-css");
    }, 1000);
  },
});

$("input.send-code[data-code]")
  .parent()
  .css({ position: "relative" })
  .append(
    $("<button>")
      .attr({ type: "button" })
      .css({
        position: "absolute",
        right: "1px",
        bottom: "1px",
        height: "100%",
        border: 0,
        padding: "0 15px",
        fontWeight: "bold",
        borderTopRightRadius: "3px",
        borderBottomRightRadius: "3px",
        fontSize: "small",
        zIndex: 4,
      })
      .text("Send Code")
      .click(function () {
        let button = $(this);
        let input = $(this).siblings("input");
        let code = input.data("code");
        if (code) {
          if (!button.prop("status")) {
            button[0].status = 1;
            button.startLoader(true);
            $.post(`${site.process}custom`, { pinAction: code, case: "resendPin" }, function (response) {
              button.stopLoader(true);
              let res = isJson(response);
              let message = res.message || "An error Occured";
              let stat = res.status || 0;
              toast(message, ["red", "green"][stat]);
              let start = 120;
              let interval = setInterval(() => {
                button.text(`${start} s`);
                if (start == 0) {
                  clearInterval(interval);
                  button.text("Resend OTP");
                  button[0].status = 0;
                }
                start--;
              }, 1000);
            });
          }
        } else toast("No attribute for this code");
      })
  );

$.fn.extend({
  clipboard: function (text) {
    if (!text) {
      $(this).click(function (e) {
        if ($(this).attr("data-clipboard-text")) text = $(this).attr("data-clipboard-text");
        else if ($(this).attr("data-clipboard-from")) text = $(`#${$(this).attr("data-clipboard-from")}`).text();
        $(this)._copy(text);
      });
    } else {
      $(this)._copy(text);
    }
    return $(this);
  },
  _copy: function (text) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(text).select();
    document.execCommand("copy");
    $temp.remove();
    $(this).css({ backgroundColor: "green", text: "white" });
    toast("Copied !!!");
  },
});
$("[data-clipboard-text]").clipboard();

$.fn.longClick = function (callback) {
  var timer;
  let timeout = 500;
  $(this)
    .mousedown(function (e) {
      timer = setTimeout(function () {
        e.stopPropagation();
        callback(e);
      }, timeout);
      return false;
    })
    .mouseup(function (e) {
      e.stopPropagation();
      clearTimeout(timer);
      return false;
    });
};

$.fn.extend({
  cron: function (url, time) {
    this.time = time;
    this.url = url;
    this.interval = null;
    return {
      start: (callback) => {
        let interval = setInterval(() => {
          $.get(this.url, {}, (response) => {
            let date = new Date();
            response = `...New Run: ${date} <br> ${response}`;
            if (typeof callback == "function") callback(response, false);
            else console.log(response);
          });
        }, this.time || 60 * 60 * 5); //5 Mins
        this.interval = interval;
        let date = new Date();
        if (typeof callback == "function") callback("Started at " + date, true);
        else console.log("Started at " + date);
      },
      stop: (callback) => {
        if (this.interval) {
          clearInterval(this.interval);
          let date = new Date();
          if (typeof callback == "function") callback("Stopped at " + date);
          else console.log("Stopped at " + date);
        } else alert("Cron has not been started");
      },
    };
  },
});

$.fn.extend({
  replaceTag: function (newTagObj) {
    var attrs = {};

    $.each($(this)[0].attributes, function (idx, attr) {
      attrs[attr.nodeName] = attr.nodeValue;
    });

    $(this).replaceWith(function () {
      return $(newTagObj, attrs).append($(this).contents());
    });
    return $(this);
  },
});
