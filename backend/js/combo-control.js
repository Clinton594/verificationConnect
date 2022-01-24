$.fn.extend({
	autocomplete: function(obj){
		// This makes use of {source:[string or array], validate:[bool], callback:[function]}
		// if obj.source is set, it loads the dropdown from the source if it's already an array;
			//but if it's a string, it sends it to server as a paramName to be extracted from the param;
		// if obj.display_fields is set, it displays those fields in the dropdown
		// if obj.value is set, it sets the value as the textbox value on select
		var $this = $(this);
		$(this).off('blur');
		$(this).off('keyup');
		$(this).attr({autocomplete:"off"});
		$(this)[0].data = [];
		$(this)[0].display_fields = obj.display_fields || null;
		$(this)[0].insert_field = obj.value || null;
		$(this)[0].callback = obj.callback || null;
		obj.validate = (obj.validate === true);
		if(!obj.source){
			alert('AutoComplete requires source');
			$(this).attr({disabled:true});
			return;
		}else{
			if(typeof(obj.source) == "string"){
				let $send = {};
				let keyname = $(this).attr("name");
	      $send[keyname] = {
	        source: obj.source,
	      };
	      $.post(`${site.process}dropdown`, $send, function(response) {
	        let data = isJson(response);
	        if (data[keyname]) data = data[keyname];
					$this[0].data = data;
	      })
			}else{
				$this[0].data = obj.source;
			}
		}

		// When any key as been punched
		$this.keyup(function(){
			$(this).perfomSearch();
		})
		.focus(function() {
			$(this).siblings("label[for]").addClass("active");
			$(this).perfomSearch();
		})
		.click(function() {
			$(this).siblings("label[for]").addClass("active");
			$(this).perfomSearch();
		})
		.blur(function(){
			let ths = this;
			let box = $(ths).parent();
			setTimeout(function(){
				box.find('.combo-search').hide();
				if(obj.validate){
					$(ths).validateBox();
				}
			},150);
		})
	}
})


$.fn.extend({
	validateBox : function(){
		let $this  = $(this);
		let source = $(this).prop('data');
		var text   = $(this).val().toLowerCase().trim();
		let response = true;
		if(text.indexOf(',') > 0){
			text = text.split(',').map(s => s.trim());
		} else text = [text];

		for(let index in text){
			var currentText = text[index];
			let first_element = source.length == undefined ? source[Object.keys(source)[0]] : source[0];
			if(typeof(first_element) == "object"){
				let selected = [];
				let insert_fields  = $this.prop("insert_field");
				for(let i in source){
					let elmo = source[i];

					if(insert_fields){
						if(typeof(insert_fields) == "string")insert_fields = insert_fields.split(",");
						// Split the insert fields from param
						insert_fields = insert_fields.map(s => s.trim()).filter(s => s != "");
						elmo = insert_fields.reduce((a, e) => (a[e] = elmo[e], a), {});
					}
					selected.push(Object.values(elmo).join(" "));
				}
				source = selected;
			}
			source = source.length === undefined ? Object.values(source) : source;
			source = source.map(s => s.toLowerCase().trim());
			response = ($.inArray(currentText, source) !== -1);
			if(!response)break;
		}

		if(!response){
			$($this)[0].setCustomValidity(`${currentText} is not valid`);
		  $($this)[0].reportValidity();
		}else{
			$($this)[0].setCustomValidity("");
		  $($this)[0].reportValidity();
		}
		return response;
	}
});

$.fn.extend({
	modifySource:function(data){
		$(this)[0].data = data;
	}
});

$.fn.extend({
	perfomSearch:function(){
		// Define parameters
		let $this = $(this);
		let searchArray = $(this).prop('data'), OldText = "", box, wiDth,height,index=0, CurrentText, Newtext;
		// Get the container of them input field
		box = $(this).parent().css({'position':'relative'});
		// Get the width and height of the input element to be able to position the search dropdown
		wiDth = box.width();
		height = box.height() - parseInt(15);
		// Create dropdown if not there already
		if(box.find('.combo-search').length < 1){
			$('<div>').addClass('combo-search dropdown').css({left:10, right:10, top:50}).appendTo(box);
		}
		// Get the characters you have typed into the field
		CurrentText = Newtext = $this.val().trim();
		// Get the dropdown and empty it
		var searchcontainer = box.find('.combo-search');
		box.find('.combo-search').empty().show();
		//If the characters you have typed into the field contains comma,  treat it as a new word
		if(Newtext.indexOf(',') > 0){
			//Save the other words other than the last one while taking the last one as the CurrentText
			let arrText = Newtext.split(',');
			CurrentText = arrText.pop().trim();
			OldText = arrText.join(",");
		}else{
			//Else retain the initial value
			 CurrentText = Newtext;
		}
		// THE ULTIMATE SEARCH ALOGORITHM BEGINS
		// Shorten the searchArray for empty search strings( mostly for clicking empty elements.)
		if (!CurrentText.length) {
			let j = 0; let firs100 = {};
			for(let xn in searchArray){
				firs100[xn] = searchArray[xn];
				j++;
				if(j == 100)break;
			}
			searchArray = firs100;
		}
		// loop through the source array
		for(let index in searchArray){
			var thisline = '';
			// Exclude empty values
			if(searchArray[index]==null){continue;}
			// Convert to string if it a multidementional array
			if(typeof(searchArray[index]) == 'object'){
				let values = Object.values(searchArray[index]);
				thisline = values.join(" ");
			}else thisline = searchArray[index];
			// Reduce to small letter and trim external white spaces
			thisline = thisline.toLowerCase().trim();
			// If the search gets a match
			if(thisline.indexOf(CurrentText.toLowerCase())>-1){
				// Format the text to append on the input
				// Format the text to use as display_fields
				let display_field = searchArray[index];
				// If the selected line happens to be an object
				if(typeof(display_field) == "object"){
					let display_fields = $this.prop("display_fields");
					let sel_fields 		 = [];
					// Format Display Fields only
					if(display_fields){
						display_fields = display_fields.split(",");
						// Trim excesive white spaces from the display_fields and remove empty values
						display_fields = display_fields.map(s => s.trim());
						display_fields = display_fields.filter(s => s != "");
						for(let ind in display_fields){
							//Get only existing display_fields from the current object
							if(display_field[display_fields[ind]] !== undefined){
								sel_fields.push(display_field[display_fields[ind]]);
							}
						}
					}else{
						sel_fields = Object.values(display_field)
					}
					display_field = sel_fields.join(" - ").trim();
				}
				// Join old text and selected texts
				$('<a>').appendTo(searchcontainer).attr({id:'ch'+index, key:index}).addClass('itm ').css({'cursor':'pointer'}).text(display_field).on('click',function(){
					let searchArray = $this.prop('data');
					let index = $(this).attr("key");
					let selected = searchArray[index];
					// If the selected line happens to be an object
					if(typeof(selected) == "object"){
						let ins_fields = [];
						let insert_fields  = $this.prop("insert_field");
						if(insert_fields){
							// Split the insert fields from param
							insert_fields = insert_fields.split(",");
							// Trim excesive white spaces from the insert_fields and remove empty values
							insert_fields = insert_fields.map(s => s.trim());
							insert_fields = insert_fields.filter(s => s != "");
							for(let ind in insert_fields){
								//Get only existing insert_fields from the selected object
								if(selected[insert_fields[ind]] !== undefined){
									ins_fields.push(selected[insert_fields[ind]]);
								}
							}
							selected = ins_fields.join(" ");
						}else{
							selected = display_field;
						}
					}
					selected = [OldText, selected].filter(function (el) {return el != "";	});
					$this.val(selected.join(", ")).attr({"data-value":index});
					let callback = $this.prop('callback');
					if(typeof(callback) == "function"){
						callback(searchArray[index]);
					}
					setTimeout(function(){
						box.find('.combo-search').remove();
					}, 50);
				});
			}
		}
	}
})
