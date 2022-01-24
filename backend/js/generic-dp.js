// Patch for dragability on touch devices

/*
Requirements

Generic_dp requires these files to work
* Jquery.js // Linked to the working page
* JqueryUI.js // Linked to the working page
* JqueryUI.css // Linked to the working page
* generic_dp.js // Linked to the working page
* generic_dp.css // Linked to the working page
* Upload_Dialog.js (Optional when you don't want to use the server upload Dialog) //Linked to the working page
* Upload_Dialog.css (Optional) //Linked to the working page
* Latest upload.php file that serves as the processor

inilitializer
Element.generic_dp({
	src: The initial image file to display, assumes default image when it's empty,
	size: 	- The expected dimension of image to crop
			- Aspect ratio would be gotten from here
			- default is '300x300'.
	backend: Full absolute directory to the generic backend (http or C:/),
	default: The default to picture to display after reseting the widget (Optional),
	directory : Folder where uploaded images go to, it should be a full absolute path
				-default is site.domain+"asset/picture/";
	uploadDialog : True of false (optional) When you want ot use the server upload dialog
	complete : callback function
});

Notes ://
1) While Using this plugin, make sure you keep a default image in "asset/picture/" dir with respect to your working page
2) To delete redundant images afte cropping just run
Element.generic_dp_delete(false) on the $('#generic_dp') element
*/




$.fn.extend({
	generic_dp:function(preset, callback){
		"use strict";
		if(typeof(preset) === 'object'){
			if($(this).find('#generic_dp').length){return;}
			else if(!preset.backend){alert("Set the `backend` directory to continue");return;}
			else if(!preset.directory){console.log("Default `directory` for generic_dp has been set to `asset/pictures`")}
			preset.directory = preset.directory || site.domain+"assets/picture/";
			preset.src = preset.src || preset.backend+"images/c_icon.png";
			preset.size = preset.size || "300x300";
			if(typeof(callback) == "function")preset.complete = callback;
			$(this).append($('<div>').addClass('generic_dp').append($('<div>').attr({'id':'generic_dp'}).append($('<div>').attr({'id':'container','class':'ui-widget-content'}).append($('<div>').attr({'class':'new_container'}).append($('<span>').addClass('click_here').click(function(){$(this).siblings('#inputImage').click();}).css({'z-index':'15'}).text('Click Here To add Photo')).append($('<img>').attr({'src':preset.src,'id':'user_image','data-img':''})).append($('<div>').attr({'id':'resizable','class':'','title':'Click and drag right(Box) bottom vertex to resize(Drag)!','style':'display: none;'})).append($('<div>').attr({'class':'conpre','style':'display: none;'}).append($('<div>').attr({'class':'preloader4'}))).append($('<input>').attr({'name':'pic','accept':'image/*','id':'inputImage','style':'display: none; opacity: 0; visibility:hidden ; height: 0px !important; width: 0px !important;','type':'file'})))).append($('<div>').attr({'class':'img_ctrl'}).append($('<span>').text('Delete').attr({'class':'delete show_E_D left'}).click(function(){$(this).generic_dp_delete();}).append($('<i>').attr({'class':'fa fa-trash-o','aria-hidden':'true'}))).append($('<span>').text('Crop').click(function(){$(this).generic_dp_crop();}).addClass('done show_E_D right').append($('<i>').attr({'class':'fa fa-check','aria-hidden':'true'}))))));
			$(this).find('#generic_dp').generic_dp_init(preset);
			$(this).find('#generic_dp').generic_dp_resizable(preset);
		}
	}});


$.fn.extend({
	generic_dp_resizable : function(data){
		"use strict";
		var imgsize = data.size.trim().split("x");
		var g = gcd(imgsize[0], imgsize[1]);
		var wt = imgsize[0]/g, ht = imgsize[1]/g;
		var ths = $(this);
		$(this).find("#resizable").resizable({
			containment:ths.find(".new_container"), aspectRatio: wt / ht})
		.draggable({
			containment:ths.find(".new_container"), cursor: "move"}).tooltip({
			show: {effect: "slideDown", delay:250}, track: true}
		);
	}
});

$.fn.extend({
	generic_dp_init : function(init){
		"use strict";
		init.default = init.default || init.backend+"images/c_icon.png";
		init.processor = `${init.backend}process/upload`;
		init.olds = [];
		$(this)[0].param = init;
		$(this).find('#inputImage').on('change',function(){
			var loader = $(this).parent().find('.conpre');
			loader.show();
			//return;
			var fm = new FormData(),imgsize;
			var gdp = $(this).closest("#generic_dp"), param = gdp.prop('param');
			var current = gdp.find('#user_image').attr('data-img');
			fm.append('file_upload', this.files[0]);
			fm.append('case','fileUpload');
			fm.append('getype','picture');
			fm.append('folder', param.directory);
			if(current){
				var cur_c = current.replace(param.directory);
				if(cur_c !== init.default){
					param.olds.push(current);
					gdp[0].param = param;
				}
			}
			fm.append('resize',true);
			$.ajax({//just upload
				url:param.processor,
				type:"POST",
				data:fm,
				processData:false,
				contentType:false
			}).done(function(respon){
				loader.hide();
				var data = isJson(respon);
				if(!data){console.log(respon); toast("An Error Occured",'red');}
				else{
					if(data.error){
						toast(data.error,'red');
					}else{
						var	containers = gdp.find('#user_image, .new_container');
						imgsize = param.size.split("x");
						containers.css({'height':'0','width':'0','margin':'auto','top':'0','overflow':'','border-radius':'',position:'relative'});
						if(data.size[0] == data.size[1]){
							containers.css({'height':'100%','width':'100%'});
						}else if(data.size[0] > data.size[1]){
							containers.css({'height':'unset','width':'100%'});
						}else if(data.size[0] < data.size[1]){
							containers.css({'height':'100%','width':'unset'});
						}
						gdp.find('#user_image').attr({'data-old':current, 'data-img':data.src});
						gdp.find('#user_image').attr({'src':data.src});
						gdp.find('.image_overlay').show();
						gdp.find('#container').off('click').css('border-radius','0');
						gdp.find('.click_here').hide();
						var he = (imgsize[1]/parseFloat(3))-parseInt(20);
						var wi = (imgsize[0]/parseFloat(3))-parseInt(20);
						gdp.find('#resizable').css({'height':he+'px','width':wi+'px','top':0}).show();
						gdp.find('.img_ctrl .delete, .img_ctrl .done').show();
					}
				}
			}).fail(function(fail){
				$('#generic_dp .conpre').hide();
				console.log(fail);
				alert('failed');
			});
		});
}
});
$.fn.extend({
	reset : function(){
		var generic_dp = $(this);
		var containers = generic_dp.find('.new_container');
		var loader = generic_dp.find('.conpre');
		var image = generic_dp.find('#user_image');
		// var current = image.attr('data-img');
		var param = generic_dp.prop('param');

		generic_dp.find('.click_here').show();
		generic_dp.find('.img_ctrl .delete, .img_ctrl .done, #resizable').hide();
		image.removeAttr('data-src, data-img').attr({src:param.default});
		containers.css({'height':'100%','width':'100%','overflow':'','border-radius':'',position:'unset'});
	}
})
$.fn.extend({
	generic_dp_delete : function(clear){
		"use strict";
		var generic_dp = $(this).closest('#generic_dp');
		var containers = generic_dp.find('.new_container');
		var loader = generic_dp.find('.conpre');
		var image = generic_dp.find('#user_image');
		var current = image.attr('data-img');
		var param = generic_dp.prop('param');
		if(clear !== false){
			if(current){param.olds.push(current);}
			generic_dp[0].param = param;
		}
		loader.show();
		var obj = {
			case : "deleteFile",
			unlink : param.olds,
		};
		$.ajax({
			url:param.processor,
			type:"POST",
			data:obj
		}).done(function(res){
			loader.hide();
			console.log(param);
			var data = isJson(res);
			if(!data){
				console.log(res);
				toast('An Error Occured', "red");
			}else{
				if(data.done){toast(data.done, "green");}
				generic_dp[0].param.olds = [];
				generic_dp.find('.click_here').show();
				generic_dp.find('.img_ctrl .delete, .img_ctrl .done, #resizable').hide();
				if(clear !== false){image.removeAttr('data-img').attr({src:param.default});}
				containers.css({'height':'100%','width':'100%','overflow':'','border-radius':'',position:'unset'});
				if(typeof(param.complete) === 'function'){
					var callback = param.complete;
					callback({src:null});
				}
			}
		}).fail(function(res){
			loader.hide();
			console.log(res);
			toast('An Error Occured', "red");
		});
	}
});

$.fn.extend({
	generic_dp_crop : function(){
		"use strict";
		var generic_dp = $(this).closest('#generic_dp');
		var containers = generic_dp.find('#user_image, .new_container');
		var loader = generic_dp.find('.conpre');
		var image = generic_dp.find('#user_image');
		var resizable = generic_dp.find('#resizable');
		var param = generic_dp.prop('param');
		var current = image.attr('data-img');
		var cur_c = current.replace(param.directory);
		if(cur_c !== param.default){
			param.olds.push(current);
			generic_dp[0].param = param;
		}
		var img_info = {
			image_source:image.attr('data-img'),
			resizable_left:resizable.position().left,
			resizable_top:resizable.position().top,
			img_width:image.width(),
			img_height:image.height(),
			resizable_height:resizable.height(),
			resizable_width:resizable.width(),
			case:"cropImage",
			img_old:image.attr('data-old'),
			img_dir:param.directory,
		};
		loader.show();
	$.ajax({
		url:param.processor,
		type:"POST",
		data:img_info
	}).done(function(response){
		loader.hide();
		var data = isJson(response);
		if(!data){console.log(response); toast("An Error Occured",'red');}else{
			if(data.error){
				toast(data.error,'red');
			}else{
				containers.css({position:'unset'});
				if(data.size[0] == data.size[1]){
					containers.css({'height':'100%','width':'100%','overflow':'hidden','border-radius':'2%'});
				}else if(data.size[0] > data.size[1] || !data.size[1]){
					containers.css({'height':'','width':'100%','overflow':'hidden','border-radius':'2%'});
				}else if(data.size[0] < data.size[1]){
					containers.css({'height':'100%','width':'','overflow':'hidden','border-radius':'2%'});
				}
				generic_dp.find('#user_image').removeAttr('src','data-img').attr({'src':data.src,'data-img':data.src});
				generic_dp.find('.img_ctrl .done, .conpre, .image_overlay, #resizable').hide();
				generic_dp.find('#container').animate({'border-radius':'2%'} , "slow");
				generic_dp.find('#resizable').css({'height':'185px','width':'185px'});
				generic_dp.find('.click_here').show();
				$.post(param.processor, {case:"deleteFile", unlink:param.olds})
				if(typeof(param.complete) === 'function'){
					var callback = param.complete;
					callback(data, generic_dp);
				}
			}
		}
	}).fail(function(){
		loader.hide();
		toast("An error occured",'red');
	});
	}
});


function gcd (a, b) {
	"use strict";
  return (b === 0) ? a : gcd (b, a%b);
}
