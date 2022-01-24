// Generic Pictures by clinton onuigbo 15/07/2018
/*
	version 1.3
	*This document requires Jquery, materialize, process_upload.php latest version and uploadDialog.js' latest version
	*This document contains Generic Sliders, Generic card images, Generic DP, and lot more generic pictures to come

	*NB:// process_upload.php should be in the same dir as the page your working on
	____________________________________________________________________________________________________________
	FOR GENERIC SLIDERS
		TO INITIALIZE THE SLIDERS
		* run $(document).initSlider({
			images:'',
			editable:'',
			anchors:'',
			animatable:'',
			onDrag:'',
			directory:'',
			processor:''
		}) on any element to want the sliders to be initialized on;
			* images = 	 array of image objects in this format below
				- [0 => {'src':'','title':'','desc':'',anchors:{'name':'', 'href':''}(optional, only shows when intiSlider.anchor is set true)}]
				- It can also accept an empty array to create a default image
				- default is an empty array
			*editable = boolean (true or false) to create editors
				- default is false
			*anchors = boolean (true or false) to buttons
				- default is false
			*animatable = boolean (true or false) to create slides with animations
				- default is true
				- animatable when images are more than 1
			*onDrag = callback function for draging a file into a folder in uploadDialog
				- default is toast success message
			*directory = A working directory to your server files for the uploadDialog
				- default directory is '../assets/'
			*processor = A working directory to the latest version of the process_upload.php file
				- default is toast success message

		TO re-initialize an existing slider
			* run $(document).reloadSlider(images) on the generic-slider element

		TO SAVE THE SLIDERS BACK TO OBJECT ARRAY
			* run $('document').readSlider({
				required : ''
			}) on the generic-slider element
				*required = boolean (true or false) to validate the image
					- default is false
	____________________________________________________________________________________________________________
	FOR GENERIC CARD IMAGES
		TO INITIALIZE THE CARD IMAGES
		* run $(document).init_cardImages({
			images:[],
			editable:'',
			max:''
		})on any element to want the CARD IMAGES to be initialized on;
		* images = 	 array of image objects in this format below
			- [0 => {'src':'','title':'','desc':'',anchors:{'name':'', 'href':''}(optional, only shows when intiSlider.anchor is set true)}]
			- It can also accept an empty array to create a default image
			- default is an empty array
		*editable = boolean (true or false) to create editors
			- default is false
		*max = boolean (true or false) to buttons
			- default is false
		*onDrag = callback function for draging a file into a folder in uploadDialog
			- default is toast success message

		TO COLLECT THE  CARD IMAGES AS OBJECT
		* run $('.card_images').read_imageCard() on the initialized (card_images) element

		TO RELOAD THE  CARD IMAGES AS OBJECT
		* run $('.card_images').reload_cardImages() on the initialized (card_images) element

		TO RESET THE CARD IMAGES
		* run $('.card_images').resetCardImages() on the initialized (card_images) element
	____________________________________________________________________________________________________________
	FOR DESCRIPTION
		TO INITIALIZE DESCRIPTION
		* run $(document).init_specifications({
			directory:'../assets/',
			processor:`${site.process}upload`
		});
		on any element to want the CARD IMAGES to be initialized on;
		* images = 	 array of image objects in this format below
			- [0 => {'src':'','title':'','desc':'',anchors:{'name':'', 'href':''}(optional, only shows when intiSlider.anchor is set true)}]
			- It can also accept an empty array to create a default image
			- default is an empty array
		*editable = boolean (true or false) to create editors
			- default is false
		*max = boolean (true or false) to buttons
			- default is false
		*onDrag = callback function for draging a file into a folder in uploadDialog
			- default is toast success message

		TO RELOAD THE DESCRIPTION
		* run $(document).reloadSpecifications([array of images]) on the initialized (card_images) element

		TO RESET THE DESCRIPTION
		* run $(document).reloadSpecifications([]) on the initialized (card_images) element

		TO COLLECT THE IMAGES AS OBJECT
		* run $('.card_images').read_imageCard() on the initialized (card_images) element
	____________________________________________________________________________________________________________

*/
var animatable = true;
var slide_editable = false;
$.fn.extend({
  initSlider: function(init) {
    'use strict';
    /*if(typeof($.uploadDialog) != 'function'){
    	console.log("uploadDialog.js is required for this to work");
    	return;
    }*/
    var $this = $(this);
    var container = $this;
    init.directory = !init.directory ? 'assets/' : init.directory;
    init.processor = !init.processor ? `${site.process}files` : init.processor;
    init.images = (!init.images && typeof(init.images) !== 'object' || !init.images.length) ? [] : init.images;
    var slides = returnSlides(init);
    if (init.editable !== undefined) {
      slide_editable = init.editable === true ? init.editable : false;
    }
    container.prepend($('<div>').addClass('col s12 generic-slider')
      .append(function() {
        if (slide_editable === true) {
          return (
            $('<a>').addClass('addSlide').attr({
              'data-path': init.directory,
              'data-display': 'all',
              'data-href': init.processor,
              'data-edit': '2',
              'data-anchor': init.anchors
            }).click(function() {
              var active = $(this).closest('.generic-slider').find('.slides > li.active');
              $(this).uploadDialog({

                callback: function(a, data) {
                  insertSlide(active, data);
                }
              });
            }).append($('<img>').attr({
              src: 'icons/add_black.svg'
            }).addClass('material-icons small'))
          );
        } else {
          return null;
        }
      })
      .append($('<div>').addClass('slider')
        .append(slides)));
    container.find('.generic-slider')[0].param = init;
    container.find('.slider').slider();
    container.find('.generic-slider').activate();
  }
});

function returnSlides(obj) {
  var edit = obj.editable ? obj.editable : false;
  var anchor = obj.anchors || $('.addSlide').attr('data-anchor') == 'true' ? true : false;
  var images = [],
    slides = $('<ul>').addClass('slides'),
    classes = ['', 'right-align', 'center-align', 'left-align'];
  if (typeof(obj.images) != 'object' || !obj.images.length) {
    var defaulT = {
      'src': 'images/default.jpg',
      'title': 'Default Slogan',
      'desc': 'Short Description',
      'default': true,
      'type': 'picture'
    };
    if (anchor) {
      defaulT.anchor = {};
      defaulT.anchor.name = 'Default Button';
      defaulT.anchor.href = 'javascript:;';
    }
    images.push(defaulT);
    edit = false;
  } else {
    images = obj.images;
  }
  for (var i in images) {
    var place = classes[1 + Math.floor(Math.random() * 3)];
    images[i].type = images[i].type.toLowerCase();
    if (images[i].type != "picture" && images[i].type != 'video') {
      continue;
    }
    var def = images[i].default ? ' default' : '';
    var slide = $('<li>').addClass('lim' + def).attr({
      'data-type': images[i].type,
      'data-num': i
    }).append(function() {
      if (images[i].type == 'picture') {
        return ($('<img>').attr({
          'src':images[i].src.replace("tbn/", "")
        }));
      } else if (images[i].type == 'video') {
        return ($('<video>').attr({
          'width': '100%',
          'height': '100%',
          'play': true
        }).append($('<source>').attr({
          'src': images[i].src.replace("tbn/", "")
        })));
      }
    }).append($('<div>').addClass('caption ' + place)
      .append($('<h3>').addClass('modak').text(images[i].title))
      .append($('<h5>').addClass('light grey-text text-lighten-3').text(images[i].desc))
      .append(function() {
        if (anchor && images[i].anchor && images[i].anchor.name) {
          return ($('<a>').addClass('slider_anchor btn ' + place.split('-')[0]).attr({
            'href': images[i].anchor.href
          }).text(images[i].anchor.name));
        } else {
          return false;
        }
      })
    );
    slide.append(function() {
      if (edit === true) {
        return (
          $('<span>').addClass('slidEditors').append($('<i>').addClass('material-icons tiny').attr({
            'data-anchor': anchor
          }).css({
            'background-image': 'url("icons/edit_black.svg")'
          }).click(function() {
            editSlide(this);
          })).append($('<i>').addClass('material-icons tiny').css({
            'background-image': 'url("icons/clear_black.svg")'
          }).click(function() {
            insertSlide($(this), false);
          }))
        )
      } else {
        return null;
      }
    })
    slides.append(slide);
  }
  return slides;
}

function insertSlide($this, image) {
  var dom = $this.closest('.generic-slider');
  if (image === false) {
    if ($($this).prop('nodeName').toLowerCase() == 'ul') {
      $($this).empty(); //clears all slides
      dom[0].param.images = [];
    } else {
      var num = $($this).closest('li').attr('data-num');
      dom.prop('param').images.splice(num, 1);
    }
  } else {
    image.type = image.type.toLowerCase();
    if (image.type != "picture" && image.type != 'video') {
      console.log("only images and videos are accepted");
      return;
    }
    if(image.anchor_name){
      image.anchor = {name:image.anchor_name, href:image.anchor_href};
      delete image.anchor_name;
      delete image.anchor_href;
    }
    var anchor = $this.closest('.generic-slider').find('.addSlide').attr('data-anchor');
    dom[0].param.images.push(image);
  }
  var data = dom.readSlider();
  dom.reloadSlider(data);
}

$.fn.extend({
  readSlider: function(option) {
    'use strict';
    var data = [];
    var dom = $(this);
    data = !dom.prop('param') ? data : dom.prop('param').images;
    if (!data.length && option && option.getall === true) {
      M.toast({html: "Add an Image to the slider",displayLength: 2000,classes: "red"});
      return;
    }
    return data;
  }
});

$.fn.extend({
  reloadSlider: function(data) {
    'use strict';
    var slides = returnSlides({
      images: data,
      editable: slide_editable
    });
    $(this)[0].param.images = data;
    $(this).find('.slider').empty().append(slides).slider();
    $(this).activate();
  }
});

$.fn.extend({
  activate: function() {
    var indicators = $(this).find('.indicators');
    if (indicators[0] != undefined && indicators.find('li').length < 2) {
      indicators.remove();
    }
    if (animatable === true && indicators.find('li').length > 1) {
      $(this).closest('.generic-slider').addClass('animatable');
    } else {
      $(this).closest('.generic-slider').removeClass('animatable');
    }
  }
});


function editSlide(x) {
  var $this = $(x).closest('li'),
    img,
    type = $this.attr('data-type'),
    num  = $this.attr("data-num")
    dom = $this.closest('.generic-slider');
    data = dom.prop('param').images[num];
  var dir = $this.closest('.generic-slider').find('.addSlide').attr('data-path');
  $(x).attr({
    'data-edit': 2,
    'data-path': dir
  }).modify_resource({
    'data': data,
    'onDrag': false,
    'callback': function(a, image) {
      $this.attr({
        'data-type': image.type
      });
      $this.find('.caption h3').text(image.title);
      $this.find('.caption h5').text(image.desc);
      var num = $($this).attr('data-num');
      dom.prop('param').images[num] = image;
      if (image.anchor_name) {
        if ($this.find('.caption a.btn')[0]) {
          $this.find('.caption a.btn').text(image.anchor_name);
          $this.find('.caption a.btn').attr({
            'href': image.anchor_href
          });
        } else {
          $this.find('.caption').append($('<a>').addClass('btn slider_anchor').attr({
            'href': image.anchor_href
          }).text(image.anchor_name));
        }
      } else {
        if ($this.find('.caption a.btn')[0]) {
          $this.find('.caption a.btn').remove();
        }
      }
      if (image.type == 'picture' && type == 'picture') {
        $this.find('img').attr({
          'style': 'background-image: url("' + image.src.replace("tbn/", "") + '");'
        });
      } else if (image.type == 'video' && type == 'picture') {
        $this.find('img').remove();
        $this.prepend($('<video>').attr({
          'width': '100%',
          'height': '100%'
        }).append($('<source>').attr({
          'src': image.src
        })));
      } else if (image.type == 'video' && type == 'video') {
        $this.find('source').attr({
          'src': image.src
        });
      } else if (image.type == 'picture' && type == 'video') {
        $this.find('video').remove();
        $this.prepend($('<img>').attr({
          'style': 'background-image: url("' + image.src + '");',
          'src': 'data:image/gif;base64,R0lGODlhAQABAIABAP///wAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=='
        }));
      }
    }
  });
}

// ---------------------------------------------------------- Card Images Here ---------------------------------------
$.fn.extend({
  init_cardImages: function(init, callback) {
    var $this = $(this);
    //create container
    var card_cont = $('<div>').addClass('card_images initialized');
    //define initial variables
    init.directory = !init.directory ? 'assets/' : init.directory;
    init.processor = !init.processor ? `${site.process}files` : init.processor;
    //build and return image cards externally
    var slides = returnCards(init);
    card_cont.attr({
      'data-path': init.directory,
      'data-href': init.processor
    });
    card_cont.append(slides);
    if(typeof(callback) == "function"){
      // read_imageCard
      $this.append($("<a>").click(function () {
        let images = card_cont.read_imageCard();
        callback(images);
      }).addClass("default waves-effect waves-green").text("save"));
    }
    card_cont[0].param = init;
    $this.prepend(card_cont);
  },
  reload_cardImages: function(images) {
    if ($(this).hasClass('card_images')) {
      var $this = $(this);
      $this.empty();
      let param = $this.prop('param');
      if (!images) {
        var images = param.images || [];
      }
      param.images = images;
      $this[0].param.images = images;
      var slides = returnCards(param);
      $(this).append(slides);
    } else {
      alert('Cant reload items on an uninitialized element');
    }
  },
  editCard: function() {
    var $this = $(this).closest('.li');
    var parent = $this.closest('.card_images');
    var i = $this.data('num');
    var data = parent.prop('param').images[i];
    $this.attr({
      'data-edit': 2,
      'data-href': parent.attr('data-href'),
      'data-path': parent.prop('param').directory
    });
    if ($this.find('.ch-info a').attr('href') !== undefined) {
      data.anchor = {
        name: $this.find('.ch-info a').text(),
        href: $this.find('.ch-info a').attr('href')
      };
    }
    $this.modify_resource({
      data: data,
      callback: function(a, image) {
        parent[0].param.images[i] = image;
        parent.reload_cardImages();
        $this.removeAttr('data-edit', 'data-href', 'data-path');
      }
    });
  },
  read_imageCard: function() {
    if ($(this).hasClass('card_images initialized')) {
      var images = $(this).prop('param').images;
      for (let i in images) {
        if (!images[i].title || images[i].title == 'Default Title') {
          images.splice(i, 1);
        }
      }
      return images.filter(val => val);
    } else {
      console.log('This can only be run on the initialized card_images element');
      return null;
    }
  },
  resetCardImages: function() {
    if ($(this).hasClass('card_images initialized')) {
      $(this)[0].param.images = [];
      $(this).reload_cardImages();
    } else {
      console.log('This can only be run on the initialized card_images element');
      return null;
    }
  },
  resetCard: function() {
    var $this = $(this).hasClass('li') ? $(this) : $(this).closest('.li'),
      defaulT = {
        src: 'images/default2.jpg',
        title: 'Default Title',
        'desc': 'Default Description, click to add image',
      },
      parent = $this.closest('.card_images'),
      num = $this.data('num'),
      images = parent.prop('param').images;
    images.splice(num, 1);
    parent[0].param.images = images;
    parent.reload_cardImages();
  }
});


function returnCards(data) {
  data.grid = !data.grid ? 4 : data.grid;
  var defaulT = {
      src: 'images/default2.jpg',
      title: 'Default Title',
      'desc': 'Default Description, click to add image',
      //'anchor':{'name':'Click Here','href':'javascript:;'}
    },
    ul = $('<ul>').addClass('ch-grid'),
    images = [];
  if (!data.images && typeof(data.images) != 'object' || !data.images.length) {
    images.push(defaulT);
  } else {
    images = data.images;
  }
  for (var i = 0; i <= (parseInt(data.grid) - parseInt(1)); i++) {
    var obj, cls = '';
    if (images[i] === undefined) {
      obj = defaulT;
      cls = 'default';
    } else {
      obj = images[i];
    }
    var card = oneCard(obj, cls, i);
    ul.append(card);
  }
  ul.find(".ch-item").not(".default").simpleLightbox({
    captionsData: 'title',
    captionsPosition: 'top'
  });
  return ul;
}


function oneCard(obj, cls, i) {
  var defalt = (obj.title == 'Default Title' || cls == 'default') ? true : false;
  if(defalt)cls = "default";
  var attr = {

    'data-num': i
  };
  var card = $('<li>').addClass('li').attr(attr).append($("<a>").addClass('ch-item ' + cls).attr({href:function() {
    if (!defalt) return obj.src.replace("/tbn", "");
  }, title: obj.title + " : " + obj.desc}).append($('<img>').attr({
    src: obj.src
  })))
  .append($('<div>').addClass('ch-info').click(function () {
    if(!defalt){
      $(this).siblings(".ch-item").click()
    }
  })
    .append($('<h3>').text(obj.title))
    .append($('<p>')
      .append($('<span>').addClass('card_desc').text(obj.desc))
      .append(function() {
        if (!defalt) {
          var ed = $('<span>').addClass('card_editor').click(function(e) {
            e.stopPropagation();
          });
          $('<img>').attr({
            src: 'icons/clear_black.svg'
          }).addClass('material-icons tiny').appendTo(ed).click(function(e) {
            e.preventDefault();
            $(this).resetCard();
          });
          $('<img>').attr({
            src: 'icons/edit.svg'
          }).addClass('material-icons tiny').appendTo(ed).click(function(e) {
            e.preventDefault();
            $(this).editCard();
          });
          return ed;
        } else {
          var ed = $('<span>').addClass('photo_dialoag').click(function(e) {
            e.stopPropagation();
            $(this).toggleClass('show')
          });
          $('<img>').attr({
            src: 'icons/wallpaper.svg'
          }).addClass('material-icons small').appendTo(ed).click(function(e) {
            e.preventDefault();
            let card = $(this).closest('.li'),
              parent = card.closest('.card_images'),
              dir = parent.attr('data-path') || 'assets/';
            card.attr({
              'data-edit': 2,
              'data-path': dir
            });
            card.uploadDialog({
              callback: function(a, data) {
                let images = parent.read_imageCard();
                images.push(data);
                parent[0].param.images = images;
                parent.reload_cardImages();
                card.removeAttr('data-edit', 'data-href', 'data-path');
              }
            });
          });
          $('<img>').attr({
            src: 'icons/photo_camera.svg'
          }).addClass('material-icons small').appendTo(ed).click(function(e) {
            e.preventDefault();
            let card = $(this).closest('.li'),
              parent = card.closest('.card_images'),
              filename = $('#itemid_Products').val() + "_fabric";
            parent.openCamera({
              filename: filename,
              folder: "fabrics",
              element: parent
            }, function(response) {
              let res = isJson(response);
              if (res) {
                let data = {
                  src: res.src,
                  type: 'picture',
                  title: "Camera",
                  desc: "",
                }
                let images = parent.read_imageCard();
                images.push(data);
                parent[0].param.images = images;
                parent.reload_cardImages();
                card.removeAttr('data-edit', 'data-href', 'data-path');
                setTimeout(() => {
                  $("#cameraModal").remove();
                }, 300);
              }
            })
          });
          return ed;
        }
      })
    ));
  if(defalt){
    card.click(function() {
      $(this).find('.photo_dialoag').toggleClass('show');
    });
  }
  return card;
}

/*-----------------------------------------------------CAMERA--------------------------------------------------- */

$.fn.extend({
  openCamera: function(object, callback) {

    object.width = !object.width ? 300 : object.width;
    object.height = !object.height ? 250 : object.height;
    object.folder = !object.folder ? "" : object.folder + "/";
    object.filename = !object.filename ? new Date().getTime() : object.filename;
    $('#cameraModal').css({
      'width': '360px'
    })
    let element = $(this);
    if (!$('#cameraModal')[0]) {
      var cameraModal = $('<div>').attr({
        id: 'cameraModal'
      }).attr({
        'background': 'black'
      }).addClass('modalc').append($('<div>').css({
          padding: '40px 20px',
          height: '350px',
          overflow: 'hidden',
          background: 'black'
        }).append($('<video>').addClass('left').attr({
          id: 'cameraVideo',
          width: object.width,
          height: object.height
        }).click(function() {
          var canvas = document.getElementById('cameraCanvas');
          var context = canvas.getContext('2d');
          context.drawImage(video, 0, 0, object.width, object.height);
          $('#cameraModal').css({
            'background': 'black'
          });

          $('.snapbtn').hide();

          //swapDiv function
          $(this).swapDiv(canvas);

          $(this).next()[0].done = true;
        }).css({
          'background-color': 'black',
          'text-align': 'center',
          'margin': '0 auto'
        }))

        .append($('<canvas>').addClass('right').attr({
          id: 'cameraCanvas',
          width: object.width,
          height: object.height
        }).css({
          'position': 'absolute',
          'left': '20px',
          'display': 'none'
        }).click(function() {
          var canvas = document.getElementById('cameraCanvas');
          var video = document.getElementById('cameraVideo');
          var photo = canvas.toDataURL('image/jpeg');
          if ($(this)[0].done) {
            $.ajax({
              method: 'POST',
              url: `${site.process}upload`,
              data: {
                case: "base64Upload",
                base64: photo,
                folder: element.attr('data-path') + 'picture/' + object.folder,
                filename: object.filename,
              }
            }).done(function(response) {
              var context = canvas.getContext('2d');
              //Clear the image on the canvas
              context.clearRect(0, 0, canvas.width, canvas.height);
              //Get the stream objects and stop all
              let stream = video.srcObject || video.src;
              if (stream != undefined) {
                for (let i in stream.getTracks()) {
                  stream.getTracks()[i].stop();
                }
              }
              // call the response function
              if (typeof(callback) == 'function') {
                callback(response);
              }
              //close Modal
              $('#cameraModal').closeModal();
            }).fail(function(response) {
              console.log(response);
            });
          }
          return;

        }).css({
          'background-color': 'dimgray'
        }))
        .append($('<div>').addClass('snapbtn').css({
            'width': '40px',
            'height': '40px',
            'background': 'white',
            'bottom': '10px',
            'position': 'absolute',
            'left': '150px',
            'border-radius': '100%',
            'cursor': 'pointer',
            'border': '8px solid #4a48489e'
          })
          .click(function() {
            var canvas = document.getElementById('cameraCanvas');
            var context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, object.width, object.height);

            //swapDiv fuction
            $(this).swapDiv(canvas);

            $(this).prev()[0].done = true;
          })

        )

      );
      $('body').append(cameraModal);
    }

    $('#cameraModal').openModal();
    var canvas = document.getElementById('cameraCanvas');
    var context = canvas.getContext('2d');
    var video = document.getElementById('cameraVideo');
    // Get access to the camera!
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
      // Not adding `{ audio: true }` since we only want video now
      navigator.mediaDevices.getUserMedia({
        video: true
      }).then(function(stream) {
        video.srcObject = stream;
        video.play();
      });
    } else if (navigator.getUserMedia) { // Standard
      navigator.getUserMedia({
        video: true
      }, function(stream) {
        video.src = stream;
        video.play();
      }, errBack);
    } else if (navigator.webkitGetUserMedia) { // WebKit-prefixed
      navigator.webkitGetUserMedia({
        video: true
      }, function(stream) {
        video.src = window.webkitURL.createObjectURL(stream);
        video.play();
      }, errBack);
    } else if (navigator.mozGetUserMedia) { // Mozilla-prefixed
      navigator.mozGetUserMedia({
        video: true
      }, function(stream) {
        video.srcObject = stream;
        video.play();
      }, errBack);
    }
  }
})

/*-----------------------------------------------------Product DESCRIPTIONS--------------------------------------------------- */

$.fn.extend({
  init_specifications: function(init) {
    var $this = $(this);
    var card_cont = $('<div>').addClass('card_specifications row initialized');

    init.directory = !init.directory ? 'assets/' : init.directory;
    init.specs = !init.specs ? [] : init.specs;
    init.processor = !init.processor ? `${site.process}upload` : init.processor;
    init.name = !init.name ? ($this.attr('data-name') == undefined ? 'Product Specifications' : $this.attr('data-name')) : init.name;
    card_cont[0].specArray = init.specs;
    var lists = returnSpecifications(init);
    card_cont.append($('<div>').addClass('specification_head').append($('<span>').text(init.name)).append($('<div>').addClass('add_specification').append($('<img>').attr({
      src: 'icons/add_black.svg'
    }).addClass('material-icons')).click(function() {
      var spec = $(this).closest('.card_specifications.initialized');
      spec.modify_resource({
        data: {
          src: 'icons/assistant.svg',
          type: 'picture'
        },
        callback: function(a, file) {
          var obj = {};
          obj.src = file.src;
          obj.title = file.title;
          obj.desc = file.desc;
          spec.prop('specArray').push(obj);
          var arraY = spec.prop('specArray');
          spec.reloadSpecifications(arraY);
        }
      });
    })));
    card_cont.attr({
      'data-path': init.directory,
      'data-href': init.processor,
      'data-edit': 2
    });
    card_cont.append($('<div>').addClass('fullWidth left lists').append(lists));
    $this.prepend(card_cont);
    //console.log($this.find('.card_specifications.initialized').prop('specArray'));
    $this.find('.collapsible').collapsible({
      accordion: false
    });
  },
  reloadSpecifications: function(arr) {
    if (!$(this).hasClass('initialized')) {
      M.toast({html: "Cant get spections on this element",displayLength: 2000,classes: "red"});
      console.log('Run "getSpecifications" only on an initialized card_specifications element');
      return;
    }
    $(this)[0].specArray = arr;
    var temp = {};
    temp.specs = arr;
    var ul = returnSpecifications(temp);
    $(this).find('.lists').empty().append(ul);
    $(this).find('.collapsible').collapsible({
      accordion: false
    });
  },
  editSpec: function() {
    var spec = $(this).closest('.card_specifications.initialized');
    var specNum = parseInt(spec.attr('data-num'));
    var li = $(this).closest('li');
    var num = li.attr('data-num');
    var data = spec.prop('specArray')[num];
    var new_data = {
      src: data.src,
      title: data.title,
      desc: data.desc,
      type: 'picture'
    };
    spec.modify_resource({
      data: new_data,
      callback: function(a, file) {
        var edited = {
          src: file.src,
          title: file.title,
          desc: file.desc
        };
        spec.prop('specArray')[num] = edited;
        spec.reloadSpecifications(spec.prop('specArray'));
      }
    });

  },
  deleteSpec: function() {
    var spec = $(this).closest('.card_specifications.initialized');
    var li = $(this).closest('li');
    var num = li.attr('data-num');
    var data = spec.prop('specArray')[num];
    spec.questionBox('Delete ("' + data.title + '")', function() {
      spec.prop('specArray').splice(num, 1);
      spec.reloadSpecifications(spec.prop('specArray'));
    });
  },
  getSpecifications: function() {
    if (!$(this).hasClass('initialized')) {
      M.toast({html: "Cant get spections on this element",displayLength: 2000,classes: "red"});
      console.log('Run "getSpecifications" only on an initialized card_specifications element');
      return;
    }
    return $(this).prop('specArray');
  },
  resetSpecifications: function() {
    if (!$(this).hasClass('initialized')) {
      M.toast({html: "Cant get spections on this element",displayLength: 2000,classes: "red"});
      console.log('Run "getSpecifications" only on an initialized card_specifications element');
      return;
    }
    if ($(this).prop('specArray') !== undefined) {
      $(this).prop('specArray').splice(0, $(this).prop('specArray').length);
      $(this).reloadSpecifications([]);
    }
  }
});

function returnSpecifications(data) {
  var lists = [],
    defaulT = {
      title: 'Default Title',
      desc: 'No Specification for this item yet',
      default: true
      //'anchor':{'name':'Click Here','href':'javascript:;'}
    };
  var ul = $('<ul>').addClass('collapsible').attr({
    'data-collapsible': 'accordion'
  });
  if (!data.specs && typeof(data.specs) != 'object' || !data.specs.length) {
    lists.push(defaulT);
  } else {
    lists = data.specs;
  }
  for (var i in lists) {
    var list = createOnespecification(lists[i], i);
    ul.append(list);
  }
  return ul;
}

function createOnespecification(data, i) {
  var li = $('<li>').addClass(function() {
    if (data.default) {
      return 'default';
    }
  }).attr({
    'data-num': i
  });
  var cola_h = $('<div>').addClass('collapsible-header').append(function() {
    if (!data.default) {
      return $('<div>').addClass('collapsible-logo').css({
        'background-image': 'url("' + data.src + '")'
      });
    } else {
      return $('<img>').attr({
        src: 'icons/wallpaper.svg'
      }).addClass('material-icons small grey-text text-darken-2');
    }
  }).append($('<span>').addClass('collapsible-title').text(data.title)).append(function() {
    if (!data.default) {
      return ($('<span>').addClass('editors').append($('<img>').addClass('material-icons tiny').click(function(e) {
        e.stopPropagation();
        $(this).editSpec();
      }).attr({
        src: 'icons/edit.svg'
      })).append($('<img>').addClass('material-icons tiny').click(function(e) {
        e.stopPropagation();
        $(this).deleteSpec();
      }).attr({
        src: 'icons/clear_black.svg'
      })));
    }
  });

  var cola_b = $('<div>').addClass('collapsible-body').html(data.desc);

  setTimeout(function() {
    cola_h.find('.collapsible-logo').css({
      'background-image': 'url(' + data.src + ')'
    });
  }, 10);
  li.append(cola_h).append(cola_b);
  return li;
}

//--------------------------------------------------------------Master Stock--------------------------------------

//The checkbox that toggles display of the slave button
let toggleSlave = (x) => {
  let slave_container = $(x).closest('.slave-container');
  let isChecked = $(x).is(":checked");
  if (isChecked) {
    slave_container.find('.slave-button').removeClass('hide');
  } else {
    slave_container.find('.slave-button').addClass('hide');
  }
}

//INITIALIZE the slave manager interface
$.fn.extend({
  initSlave: function(init) {
    init = !init ? [] : init;
    let $container = $('<div>').addClass('modal-content');
    let $modal = $('<div>').addClass('slaveManager modal modal-fixed-footer').attr({
      name: 'master_stock_data'
    }).css({
      overflow: 'hidden',
      'max-height': '85vh',
      height: '80vh'
    });
    let $array = ['primary', 'secondary'];
    //loop through the primary and secondary sides to create the same exact version of each
    for (let i in $array) {
      let $card = $('<div>').addClass('col l6 card').append($('<h5>').addClass('h5').text($array[i].toUpperCase() + ' ATTRIBUTES')).append($('<form>').attr({
        'action': 'javaScript:;',
        'onsubmit': 'addData(this)'
      }).append($('<div>').addClass('row').append($('<div>').addClass('col l12 smallpad').append($('<label>').text('Title')).append($('<input>').addClass('validate').attr({
        'type': 'text',
        'name': 'title',
        required: true
      }))).append($('<div>').addClass('col s3 smallpad').append($('<label>').text('Id')).append($('<input>').addClass('validate').attr({
        'type': 'number',
        'name': 'id',
        required: true
      }))).append($('<div>').addClass('col s9 smallpad').append($('<div>').append($('<div>').css({
        width: '70%',
        float: 'left'
      }).append($('<label>').text('Desc')).append($('<input>').addClass('validate').attr({
        'type': 'text',
        'name': 'desc',
        required: true
      }))).append($('<div>').css({
        width: '30%',
        float: 'left'
      }).append($('<button>').css({
        'border-radius': '3px',
        'background-color': '#f43f05',
        'color': 'white',
        'font-size': '12px',
        'padding': '6px 15px',
        'margin': '30px 0px 0 10px',
        'float': 'left',
        'border': 'none'
      }).text('Create'))))).append($('<div>').addClass('col s12 smallpad').append($('<div>').addClass('col s12 smallpad addList').css({
        'height': '150px',
        'overflow-y': 'auto',
        'border': '1px solid rgba(0,0,0,0.2)',
        'border-radius': '3px'
      })))));
      $container.append($card);
    }
    $container.append($('<div>').addClass('col s12 smallpad').append($('<div>').addClass('col s12 divider')).append($('<div>').attr({
      id: 'slaveImg'
    }).addClass('col s6 left')).append($('<div>').addClass('col s6 right smallpad').append($('<div>').addClass('col s6 smallpad ').append($('<label>').addClass('active').attr({
      for: 'sub_price'
    }).text('Item Price')).append($('<input>').addClass('sub_price keep').attr({
      type: 'number',
      id: 'sub_price'
    }))).append($('<div>').addClass('col s6 smallpad').append($('<button>').css({
      'box-shadow': 'none',
      'border-radius': '4px',
      'text-transform': 'capitalize',
      'font-size': '14px',
      'font-weight': 'bold',
      'margin-top': '25px'
    }).addClass('btn right green waves-effect waves-light').click(function() {
      let selected = {};
      let container = $(this).closest('.slaveManager');
      let proceed = true;
      let imageCard = container.find("#slaveImg .card_images");
      container.find('form .addList').each(function(i) {
        if ($(this).find('p input[type=radio]:checked').length === 1) {
          let el = $(this).find('p input[type=radio]:checked').first().closest('p');
          let param = el.prop('param');
          selected['title' + i] = param.title;
          selected['id' + i] = param.id;
          selected['desc' + i] = param.desc;
          selected['picture'] = imageCard.read_imageCard();
        } else {
          M.toast({html: "You must add and select at least one attribute on each side",displayLength: 3000,classes: "purple"});
          proceed = false;
          return false;
        }
      })
      if (proceed) {
        let price = container.find('.sub_price').val();
        selected.price = isNaN(price) ? 0 : price;
        let slaves = container.prop('param');
        slaves = addSlave(slaves, selected);
        container[0].param = slaves;
        container.loadSlaves(slaves);
        imageCard.resetCardImages();
      }
    }).text('Add')))).append($('<div>').addClass('col s12 divider')));

    $container.append($('<div>').addClass('col s12').append($('<table>').addClass('table bordered').append($('<thead>').append($('<tr>').append($('<th>').attr({
      'scope': 'col'
    }).text('S/N')).append($('<th>').attr({
      'scope': 'col'
    }).text('ID')).append($('<th>').attr({
      'scope': 'col',
      'id': 'second_column'
    }).text('PRIMARY')).append($('<th>').attr({
      'scope': 'col',
      'id': 'third_column'
    }).text('SECONDARY')).append($('<th>').text('PRICE')).append($('<th>')))).append($('<tbody>').addClass('body'))));
    let $footer = $('<div>').addClass('modal-footer').append($('<div>').addClass('col s12').append($('<button>').addClass('btn right btn-flat waves-effect waves-light').click(function() {
      $(this).closest('.modal').closeModal();
    }).text('Save')))
    $(this).append($modal.append($container).append($footer));
    $(this).find('.slaveManager')[0].param = init;
    $(this).find("#slaveImg").init_cardImages({
      directory: '../assets/',
      processor: `${site.process}files`,
      grid: 1
    });
  }
});


let addData = (xx) => {
  let $form = $(xx);
  if ($form[0].checkValidity()) {
    let $f = {};
    $form.find('input:not([type=radio])').each(function() {
      let name = $(this).attr('name');
      $f[name] = $(this).val();
    });
    let $rowid = $f.title.replace(' ', '_') + $f.id;
    if ($form.find('.addList > p[data-id=' + $rowid + ']').length === 0) {
      let $row = $('<p>').attr({
        'data-id': $rowid
      }).addClass('smallpad col s12').css({
        'border-bottom': 'solid 1px #ceced7',
        'padding-bottom': '5px',
        'text-transform': 'capitalize'
      }).append($('<div>').addClass('col s1 smallpad')

      .append($('<label>').attr({
        for: $rowid
      }).append($('<input>').addClass('with-gap').attr({
        type: 'radio',
        id: $rowid,
        'name': $f.title
      }))
      .append($("<span>"))
    )).append($('<div>').addClass('col s9 smallpad').css({
        'margin-left': '8px'
      }).text($f.id + ' - ' + $f.desc)).append($('<div>').addClass('col s1 smallpad').append($('<img>').addClass('pointer').attr({
        'src': 'icons/clear_black.svg'
      }).click(function() {
        $(this).closest('p').remove();
      })));
      $row[0].param = $f;
      $form.find('.addList').append($row);
    } else {
      M.toast({html: "This Item ID already Exists",displayLength: 1000,classes: "purple"});
    }
  }
}

$.fn.extend({
  loadSlaves: function(slaves) {
    if (typeof(slaves) === 'undefined') {
      let slaves = $(this).prop('param') || [];
    }
    $(this)[0].param = slaves;
    $(this).find('table > tbody').empty();
    for (let key in slaves) {
      let thisSlave = slaves[key];
      let $thisid = thisSlave.id0 + thisSlave.id1;
      if ($(this).find('table > tbody > tr[data-id=' + $thisid + ']').length == 0) {
        let price = (!thisSlave.price || thisSlave.price == 0) ? 'Inherited' : 'N' + thisSlave.price;
        let tr = $('<tr>').attr({
          'data-id': $thisid,
          'data-num': key
        }).append($('<td>').text(parseInt(key) + parseInt(1))).append($('<td>').text($thisid)).append($('<td>').text(thisSlave.title0 + ':' + thisSlave.desc0)).append($('<td>').text(thisSlave.title1 + ':' + thisSlave.desc1)).append($('<td>').text('Price:' + price)).append($('<td>').append($('<img>').addClass('pointer').attr({
          'src': 'icons/clear_black.svg'
        }).click(function() {
          let num = $(this).closest('tr').attr('data-num');
          num = parseInt(num);
          let cont = $(this).closest('.slaveManager');
          let slaves = cont.prop('param');
          cont.questionBox("Delete this item ? ", function() {
            slaves.splice(num, 1);
            cont.loadSlaves(slaves);
          });
        })));
        $(this).find('table > tbody').append(tr);
      }
    }
  }
});
$.fn.extend({
  resetSlaves: function(data) {
    if ($(this).hasClass('slaveManager')) {
      if (!data || !data.length) {
        data = [];
      }
      $(this)[0].param = data;
      $(this).find('.addList').empty();
      $(this).find('.sub_price').val('0');
      $(this).loadSlaves(data);
    } else {
      M.toast({html: "Can't reset Master stock on this element",displayLength: 1000,classes: "purple"});
    }
    let checkbox = $(this).parent().find('input[type=checkbox]');
    toggleSlave(checkbox);
  }
});
$.fn.extend({
  getSlaves: function() {
    if ($(this).hasClass('slaveManager')) {
      let slaves = $(this).prop('param');
      return slaves;
    } else {
      M.toast({html: "Can't get Master stock on this element",displayLength: 1000,classes: "purple"});
    }
  }
});

function addSlave(slaves, slave) {
  let $thisSlave = $.grep(slaves, (obj) => {
    return obj.id0 + obj.id1 == slave.id0 + slave.id1;
  })[0];
  if (typeof($thisSlave) == 'undefined') {
    slaves.push(slave);
  }
  return slaves;
}

// --------------------------------------------------------Object Widget------------------------------------

$.fn.extend({
  init_objectWidget: function(data, callback = null) {
    let $cont = $(this);
    if (!data && $(this).data('source')) {
      let $key = $(this).data('source');
      let $send = {};
      $send[$key] = {
        source: $key,
      };
      $.post(`${site.process}dropdown`, $send, function(response) {
        let data = isJson(response);
        if (data[$key]) data = data[$key];
        $cont.createWidget(data, callback);
      });
    } else {
      $cont.createWidget(data, callback);
    }
  },
  createWidget: function(data, callback) {
    let $container = $('<div>').addClass('widget-container').attr({
      'max-width': '500px',
      'min-width': '350px',
      width: '100%',
      padding: '20px'
    });
    let $header = $('<header>').addClass('widget-head').append($('<div>').addClass('row').append($('<div>').addClass('col s10').append($('<select>').addClass('widget-selector browser-default'))).append($('<div>').addClass('col s2').append($('<p>').addClass('widget-reset editors').click(function() {
      $(this).objectWidgetReset();
    }).append($("<img>").addClass("material-icons tiny").attr({src:`icons/undo.svg`})))));
    let $body = $('<section>').addClass('widget-body').append($("<form>").append($('<table>').addClass('body-table')));
    let $foot = $('<footer>').addClass('widget-footer').append($('<div>').addClass('row').append($('<div>').addClass('col s6 nopad ').append($('<button>').attr({type:"button"}).addClass('new-row').click(function() {
      $(this).addObjectWidgetRow();
    }).text('Add Row'))));
    if(typeof(callback) == "function"){
      $foot.find(".row").append($('<div>').addClass('col s6 right nopad ').append($('<button>').attr({type:"button"}).addClass('new-row').click(function() {
        let button = $(this);
        button.startLoader();
        setTimeout(function () {
          let result = $container.saveObjectWidget();
          button.stopLoader();
          callback(result)
        },500);
      }).text("Save")))
    }
    let obj = {
      resetable: data
    }

    $container[0].param = obj;
    $(this).append($container.append($header).append($body).append($foot));
    $container.loadObjectWidget(data);
  },
  loadObjectWidget: function(data) { //full or half data
    if ($(this).hasClass('widget-container')) {
      let $selector = $(this).find('select.widget-selector');
      let $container = $(this);
      let $singleData = data;

      let param = $(this).prop('param');
      if (!data) {
        data = param.resetable;
      }
      $container[0].param.current = data;
      $selector.attr({disabled: true});

      let $keys = Object.keys(data);
      if (!data.length && ($keys.length && typeof(data[$keys[0]]) === "object")) { //for Multi data
        $singleData = arrayToObject(data[$keys[0]]);
        $selector.attr({ disabled: false }).off('change').change(function() {
          let $value = $(this).val();
          let param = $(this).closest('.widget-container').prop('param');
          if(param.current[$value]){
            $singleData = arrayToObject(param.current[$value]);
            $container.loadMiniObject($singleData);
          }
        }).empty();
        // Build Drop Down
        for (let i in $keys) {
          $selector.append($('<option>').attr({
            value: $keys[i]
          }).text($keys[i].toUpperCase()));
        }
      }
      $container.loadMiniObject($singleData);
    }
  },
  loadMiniObject: function($object) { // half data
    let $body = $(this).find('.body-table');
    let $bodyInput = $(this).find('.body-table').contents();
    let $param = $(this).prop('param');
    $body.empty();
    for (let key in $object) {
      let element;
      if(typeof($object[key]) == "object"){
        element = $('<select>').attr({name: key});
        for(let i in $object[key]){
          element.append($("<option>").attr({value:i}).text($object[key][i]))
        }
      }else{
        element = $('<input>').attr({
          name: key,
          type: 'text'
        }).val($object[key]);
      }
      if ($object.hasOwnProperty(key)) {
        $body.append($('<tr>').append($('<td>').text(key.toUpperCase())).append($('<td>').append(
          element
        )));
      }
    }
    return  $(this);
  },
  objectWidgetReset: function() { // reset objectWidget
    let $container = $(this).closest('.widget-container');
    let $param = $container.prop('param');
    $container[0].param.current = $param.resetable;
    $container.loadObjectWidget($param.resetable);
  },
  addObjectWidgetRow: function() { // reset objectWidget
    let $container = $(this).closest('.widget-container');
    $body = $container.find(".body-table");
    $body.append($('<tr>').addClass('new')
      .append($('<td>').addClass('capitalize').attr({
        contentEditable: true
      }))
      .append($('<td>').append($('<input>').css({
        position: 'relative'
      }).attr({
        type: 'text'
      })).append($('<small>').click(function() {
        $(this).closest('tr').remove();
      }).html("&times;")))
    );
    $body.find('.new > td:first-child').focus().blur(function() {
      $value = $(this).text();
      $(this).next().find('input').attr({
        name: $value
      });
      $(this).removeAttr('contentEditable').off('blur').parent().removeAttr('class');
    })
  },
  saveObjectWidget: function() { // save objectWidget
    if ($(this).hasClass('widget-container')) {
      let $form = $(this).find('form');
      let $data = {};
      $form.find('input[name]').each(function() {
        $data[$(this).attr('name')] = $(this).val();
      });
      return $data;
    }
  }
});

function arrayToObject(array) {
  let $obj = {};
  let isArray = false;
  if(array.length != undefined)isArray = true;
  for (let o in array) {
    if(isArray) $obj[array[o]] = "";
    else  $obj[o] = array[o];
  }
  return $obj;
}

// ------------------------------------------------DYNAMIC LIST MANAGER-------------------------------------------------

$.fn.extend({
  init_listManager: function(param) {
    if($(this).hasClass("list-container")){
      let container = $(this).find(".dynamic-lists-body");
      let formcont  = container.children(".dynamic-lists-form");
      let listcont  = container.children(".dynamic-lists-list");
      let form      = $('<form>').append(
        $('<div>').addClass('row')
          .append($('<div>').addClass('input-field col s12 m8')
            .append($('<input>').addClass('list-name').attr({name:$(this).attr("name"),required:true,type:'text', placeholder:"Enter List name"})))
          .append($('<div>').addClass('col s12 m4')
            .append($('<button>').addClass("submit btn").attr({'type':'submit'}).text('Add to List'))
          )
        )
      form.submitForm({formName:container.attr("data-source").split("~")[0], submitType:"insert"},null,
        function (response) {
          form.find(".list-name").val("");
          container.addList(response);
        }
      );
      formcont.append(form);
      if($(this).attr("onload")){
        let func = $(this).attr("onload");
        window[func](this);
      }
      container[0].param = param;
    }else{
      alert("DYNAMIC LIST MANAGER can not be initialized on this element")
    }
  },
  addList:function (data) {
    console.log(data);
  if($(this).hasClass("dynamic-lists-body")){
    let param = $(this).prop("param");
    let container = $(this).children(".dynamic-lists-list");
    let box = $("<div>").addClass("dynamic-lists-item").append($("<span>").text(data.name)).append($("<span>").addClass("editors").append($("<img>").attr({src:"icons/clear_black.svg"}).addClass("material-icons tiny")).click(function (e) {
      e.stopPropagation();
      let box = $(this).parent();
      let id  = box.attr("id");
      let source  = box.closest(".dynamic-lists-body").attr("data-source");
      box.startLoader();
      $.post(`${site.process}delete`, {delIds:id, pageType:source.split("~")[0]}, function(response) {
        box.stopLoader();
        let res = isJson(response);
        if(res.status){
          box.remove();
        }else{
          if(!res){
            M.toast({html:"An error occured"});
            console.log(response);
          }else{
            M.toast({html:res.message});
          }
        }
      });
    })).attr({id:data.id || data.primary_key});
    if(param && param.deeper){
      box.click(function () {
        $(this).extendListing(param.deeper);
      });
    }
    container.append(box);
  }else{
    alert("DYNAMIC LIST MANAGER can not add a list item to this element")
  }
},
  reload_listManager:function (clear = false) {
    if($(this).hasClass("dynamic-lists-body")){
      let body = $(this);
      let container = body.children(".dynamic-lists-list");
      container.empty();
      if(clear !== true){
        let send = {};
        body.prev().startLoader();
        let source = body.attr("data-source").split("~");
        let value  = (clear == false) ? body.attr("data-value") : clear;
        send["element"] = {source:body.attr("data-source")};
        if(source[1]){ send["element"].value = value;}
        $.post(`${site.process}dropdown`, send, function (response) {
          body.prev().stopLoader();
          let data = isJson(response);
          if(data.element){
            for (var i in data.element) {
              if (data.element.hasOwnProperty(i)) {
                body.addList({id:i, name:data.element[i]});
              }
            }
          }
        })
      }
    }else{
      alert("DYNAMIC LIST MANAGER can not add a list item to this element")
    }
  },
  extendListing: function (formName) {
    let container = $(this).closest(".dynamic-lists-list");
    let pageid = container.closest("form").data('pageid');
    let filter  = $(this).attr("id");
    if($(`#${pageid}`).children("#dynamic-lists").length == 0){
      $(`#${pageid}`).append($('<div>').addClass('modal').attr({'id':"dynamic-lists"}).append($('<div>').addClass('modal-content').append($('<div>').addClass('list-container').attr({'name':'name'}).append($('<div>').addClass('dynamic-lists-head')).append($('<div>').addClass('dynamic-lists-body').attr({'data-source':formName}).append($('<div>').addClass('dynamic-lists-form')).append($('<div>').addClass('dynamic-lists-list')))).append($('<div>').addClass('modal-footer').append($('<a>').addClass('modal-close waves-effect waves-green btn-flat').attr({'href':'#!'}).text('Submit')))));
      $(`#${pageid}`).children("#dynamic-lists").find(".list-container").init_listManager();
      $(`#${pageid}`).children("#dynamic-lists").find(".list-container form").append($("<input>").addClass("parent").attr({name:"parent", hidden:true}));
    }
    $(`#${pageid}`).children("#dynamic-lists").find(".dynamic-lists-body").attr({"data-value":filter}).reload_listManager();
    $(`#${pageid}`).children("#dynamic-lists").find(".list-container .parent").attr({value:filter}).val(filter);
    $(`#${pageid}`).children("#dynamic-lists").modal();
    $(`#${pageid}`).children("#dynamic-lists").modal('open');
  },
});

// ------------------------------------------------FORM BUILDER-------------------------------------------------
$.fn.extend({
  initFormBuilder: function (formdata) {
    if($(this).hasClass("form-builder")){
      let container = $(this);
      let list = {
        single:{ text:"Short Input", textarea:"Long Input", email:"Email Address", date:"Date Field", number:"Number Field", file:"File Upload", tel:"Telephone"},
        multiple:{ select:"DropDown", checkbox:"Checkboxes", radio:"Multiple Choices" }
      };
      let c = 0;
      container.append($("<div>").addClass("form-builder-container").append($("<div>").addClass("builder-header")).append($("<div>").addClass("builder-body")));
      container.find(".builder-header").append($('<a>').addClass('dropdown-trigger btn right white-text').attr({'href':'#','data-target':'dropdown1'}).text('Add a New Field')).append($('<ul>').addClass('dropdown-content').attr({'id':'dropdown1'}));
      $.each(list, (index, group)=>{
        if(c > 0)container.find("#dropdown1").append($('<li>').addClass("py-1 divider"));
        $.each(group, (i, v)=>{
          container.find("#dropdown1").append(
            $('<li>').addClass("py-1").css({minHeight:"unset"}).append(
              $('<a>').addClass("py-0").text(v).click(
                function () {
                  container.addField(i);
                }
              )
            )
          );
        });
        c++;
      });
      container[0].data = {formdata:formdata, list:list};
      container.find('.dropdown-trigger').dropdown({alignment:"bottom"});
      container.reload_formBuilder(formdata);
    }else{
      alert("FORM BUILDER WIDGET can not be initialized on this element");
    }
  },
  resetFormBuilder : function () {
    if($(this).hasClass("form-builder")){
      let container = $(this);
      container[0].data.formdata = [];
      container.reload_formBuilder([]);
    }
  },
  defaultField: function (type) {
    let attribute = {
      placeholder:null,
      type:type,
      required:false,
      value:[],
    };
    return attribute;
  },
  addField: function (attribute) {
    if($(this).hasClass("form-builder")){
      let data = $(this).prop("data");
      let container = $(this).find(".builder-body");
      if(typeof(attribute) !== "object")attribute = $(this).defaultField(attribute);

      let box = $("<div>").addClass("row field mb-0").append($("<form>").addClass("col s12").append($("<div>").addClass("card z-depth-0 bordered").append($("<div>").addClass("field-body card-content pb-0")).append(
        $("<div>").addClass("card-action field-footer").append(
          $("<ul>").addClass("editors").append(
            $("<li>").click(function () {
               $(this).duplicateField();
            }).append(
              $("<img>").addClass("material-icons tiny mt-0").attr({src:`${site.backend}icons/content_copy.svg`})
            ).append($("<span>").text("Duplicate"))
          ).append(
            $("<li>").click(function () {
              $(this).deleteField();
            }).append(
              $("<img>").addClass("material-icons tiny mt-0").attr({src:`${site.backend}icons/clear_black.svg`})
            ).append($("<span>").text("Delete"))
          ).append(
            $("<li>").append(
              $('<div>').addClass('switch').append($("<span>").addClass("mr-2").text("Required")).append($('<label>').append($('<input>').change(function () {
                $(this).closest(".field").updateField();
              }).attr({type:'checkbox', class:"required", name:'required'})).append($('<span>').addClass('lever')))
            )
          )
        )
      )));
      box[0].attribute = attribute;
      container.append(box);
      box.buildField(attribute);
    }
  },
  buildField:function (attribute) {
    if($(this).hasClass("field")){
      let fieldBox = $(this);
      let container = fieldBox.closest(".form-builder");
      let data = container.prop("data");
      let list = $.extend({}, data.list);
      if(typeof(attribute) !== "object")attribute = $(this).defaultField(attribute);
      let main = fieldBox.getDataType(attribute.type, list);
      let box = fieldBox.find(".field-body");
      box.empty();
      box.append(
        $("<div>").addClass("row mb-1").append(
          function () {
            let random = Math.random().toString(36).substring(7);
            let body = $("<div>").addClass("col s12 m8 field-element");
            body.append($('<div>').addClass('input-field').append($('<input>').blur(function () {
              $(this).closest(".field").updateField();
            }).addClass('validate placeholder').attr({name:"placeholder", required:true, placeholder:`Untitled ${list[main][attribute.type]}`, type:"text", name:attribute.type, id:random}).val(attribute.placeholder)).append($('<label>').attr({'for':random, class:"active"}).text("Enter title for "+list[main][attribute.type])));

            if(main == "multiple"){
              body.append($('<div>').addClass("row mb-0").append($("<ul>").addClass("options col s11 right "+attribute.type)).append($("<div>").addClass("col s12").append($("<a>").addClass("btn-floating purple").click(function () {
                $(this).parent().prev(".options").append(
                  $("<li>").append($("<div>").addClass("col s11").append($("<input>").blur(function () {
                    $(this).closest(".field").updateField();
                  }).addClass("default small-height value").attr({name:Math.random().toString(36).substring(5), required:true, placeholder:`Untitled ${list[main][attribute.type]} option`}))).append(
                    $("<a>").addClass("editors col s1").click(function () {
                      let button = $(this);
                      let li = $(this).closest("li");
                      li.hide("slow", ()=>{
                        li.remove();
                        body.closest(".field").updateField();
                        if(body.find(".value").length == 0){
                          body.find(".btn-floating").click();
                        }
                      });
                    }).append($("<img>").addClass("material-icons tiny").attr({src:`${site.backend}icons/clear_black.svg`}))
                  )
                )
              }).css({display: "flex",alignItems: "baseline",justifyContent: "center"}).append($("<img>").addClass("material-icons").attr({src:`${site.backend}icons/add.svg`})))));
            }
            return  body;
          }
        ).append(
          $("<div>").addClass("col s12 m4").append($('<label>').addClass('active left mt-0').text("Change Field Type")).append(
            function () {
              let select = $("<select>").change(function () {
                let val = $(this).val();
                $(this).closest(".field").buildField(val);
              }).addClass("browser-default type");

              $.each(list, (index, group)=>{
                let optgroup = $("<optgroup>").attr({label:index.toUpperCase()});
                $.each(group, (i, v)=>{
                  optgroup.append(
                    $("<option>").attr({value:i}).text(v)
                  );
                });
                select.append(optgroup);
              });
              select.val(attribute.type);
              return select;
            }
          )
        )
      )
      if (attribute.required) {
        fieldBox.find(".required").prop('checked', true);
      } else {
        fieldBox.find(".required").prop('checked', false);
      }
      if(main == "multiple"){
        if (attribute.value.length) {
          $.each(attribute.value, (i, v)=>{
            box.find(".btn-floating").click();
            box.find(".options .value").last().val(v);
          });
        } else {
          box.find(".btn-floating").click();
        }
      }
    }else alert("Can not build field on this element")
  },
  updateField:function () {
    if($(this).hasClass("field")){
      let form = $(this).children("form");
      if(form[0].checkValidity()){
        let attribute = $(this).prop("attribute");
        attribute.placeholder = $(this).find(".placeholder").val();
        attribute.type = $(this).find(".type").val();
        attribute.required = $(this).find(".required").is(":checked");
        let list = $(this).find(".value");
        attribute.value = $.grep(Object.values(list.values()), function(n){ return n != false });
        $(this)[0].attribute = attribute;
        $(this).closest(".form-builder").read_formBuilder();
        return attribute;
      }else form.find("input").each(function () {
        $(this)[0].reportValidity();
      })
    }else console.log("form-builder", "Can not updateField on this element");
  },
  read_formBuilder:function () {
    if($(this).hasClass("form-builder")){
      let data = [];
      $(this).find(".field").each(function () {
        let field = $(this);
        let object = field.prop("attribute");
        data.push(object);
      });
      console.log(data);
      return $.grep(data, function(n){ return typeof(n) == "object" });
      // return  data;
    }
  },
  reload_formBuilder:function (formdata) {
    if($(this).hasClass("form-builder")){
      let container = $(this);
      formdata = formdata || container.read_formBuilder();
      $(this).find(".builder-body").empty();
      $.each(formdata, (key, object)=>{
        container.addField(object);
      });
    }
  },
  getDataType: function (key, object) {
    let response = false;
    for (var index in object) {
      if (object.hasOwnProperty(index)) {
        let thisarray = Object.keys(object[index]);
        if(thisarray.indexOf(key) > -1){
          response = index;
          break;
        }
      }
    }
    return response;
  },
  duplicateField:function () {
    let field = $(this).closest(".field");
    let attribute = field.prop("attribute");
    let clone = field.clone(true, true);
    clone.insertAfter(field);
    clone[0].attribute = attribute;
    clone.find(".type").val(attribute.type);
    field.closest(".form-builder").read_formBuilder();
  },
  deleteField: function () {
    let field = $(this).closest(".field");
    let container = field.closest(".form-builder");
    field.hide("slow", ()=>{
      field.remove();
      container.read_formBuilder();
    })
  }
});
