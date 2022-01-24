
	$.fn.extend({
		filterInit:function(a, callback) {
			var dv=$("<div>").text("");
			var nCmb=$(this);
			if($(this).attr('size') =='large') var minWidth=450; else minWidth=250;
			var wd=$(this).width()<minWidth ? minWidth: $(this).width();
			$(this).attr({'autocomplete':'off'})
			$(dv).addClass("z-depth-1 white filterBox").attr({'id':'filterBox'+a}).hide();
			$(this).parent().append(dv);
			$(this).dv=$(dv);
			var pnt=this;
			var np=$('<div>').addClass('filterContent').appendTo(dv);
			var ftr=$('<div>').css({'hieght':'30px'}).appendTo(dv);
			$('<a>').addClass('btn-flat').text('cancel').appendTo(ftr).click(function(){
				var dv=$(this).parent().parent();
				$(dv).fadeOut('slow');
			});
			$('<a>').addClass('btn right').text('Ok').appendTo(ftr).click(function(){
					var dv=$(this).parent().parent();
					$(dv).fadeOut();
					var dId=new Array;
					$(dv).closest('._filterList').find('input:checkbox:checked').each(function()
					{
						dId.push($(this).val());
					})
					var strId=dId.join('|');
					$(pnt).attr({'data-filter':strId})
					$(dv).find('.filterValue').val(strId);
					callback(a);
			})
			filterList(a,$(this).data('value'),np, callback);
			$(this).focus(function() {
				var dv=$('#filterBox'+a);
				$(dv).fadeIn();
				/*$("#"+a).click(function(){
					alert()
				})*/
			})
			var chd=$('<div>').addClass('combo_hold').appendTo(dv);
			var dataname=$(this).attr('name');
			$(chd).prepend($('<input>').css({"display":"none"}).addClass('filterValue').attr({"name":dataname,"type":"hidden"}));
		},
		search_filters:function (a) {
			if($(this).data("search") != undefined){
				let searchbox = $(this);
				let searchdata = searchbox.data("search");
				let box = $(searchbox).parent().css({'position':'relative'});
				// Get the width and height of the input element to be able to position the search dropdown
				wiDth = box.width();
				height = box.height() - parseInt(15);
				searchbox.attr({autocomplete:"off"});
				// Create dropdown if not there already

				var searchcontainer = $('<div>').addClass('combo-search dropdown').css({left:10, right:10, top:30}).appendTo(box);
				searchdata.forEach((item, i) => {
					$('<a>').appendTo(searchcontainer).attr({id:'ch'+i, key:i}).addClass('itm ').css({'cursor':'pointer'}).append($("<label>").append($("<input>").attr({type:"checkbox", name:item.column}).addClass("search_col filled-in")).append($("<span>").text(item.name)))
				});

				box.addClass("searchbox").click(function () {
					box.find('.combo-search').show();
					if(searchbox.val() !== "")loadOpen(a);
					$("body").click(function(e) {
						if(e.target.closest(".searchbox") == undefined){
							box.find('.combo-search').hide();
							$("body").off("click")
						}
					})
				})
			}
		}
	});
	function loadFilter(a,p,npD,nc,callback)
	{

		var pagetype=p, condition = "", cnd = [];
		$('#_filterList'+a).find('input.filterValue').each(function(){
			if($(this).attr('name')){
				cnd.push($(this).val());
			}
		})
		condition=cnd.join('|');
		$.getJSON(`${site.process}list?pageType=${pagetype}&p=0&l=4&condition=${condition}`, function(result){

			$(npD).html("")

			if(result.row ==undefined || result.row.lenght==0)
			{
				var err=$('<div>').addClass('center').appendTo($(npD)).html('No result found<br><br>').css({'padding':'1%'});

				return 0;
			}
			$.each(result.row, function(i, field){
					createFilterRow(p,npD,field,result.fmt,nc,callback)
			});

		});
	}



	function filterList(a,p,n, callback)
	{
		var nD=$("<div>").addClass("collection front").appendTo(n);
		var nS=$("<div>").addClass("").appendTo(n).hide();
		var nBk=$("<a>").addClass('row bold').attr({'href':'javascript:;'}).appendTo(nS).append($('<img>').addClass('material-icons').attr({src:'icons/reply_black.svg'}).css({margin: '5px -7px -5px 5px'})).append($('<span>').text('Back').css({'margin-left':'10px'})).click(function()
	   {
		   $(nS).swapDiv(nD);
	   });
		var nsb=$("<div>").addClass("collection back").appendTo(nS);
		var s=p.split('|');
		$.each(s, function(i,v)
		{
			var nt= v.split(',');
			var nDiv=$("<a>").addClass("collection-item").attr({href:'javascript:;',value:v}).text(nt[1]).appendTo(nD).click(function()
			{
				if(nt[2]){
					$(nD).swapDiv(nS);
					$(nsb).children().hide();
					var id = nt[1].replace(' ','_');
					var nc=$('#fnt_'+id);
					if(nc.get(0) == null)
					{
						nc= $('<div>').attr({'id':'fnt_'+id}).appendTo(nsb);
						$('<div>').appendTo(nc).css({'margin-top':'20px','margin-bottom':'20px','margin-left':'auto','margin-right':'auto','width':'60px'}).append($('<div>').attr({'class':'preloader-wrapper small active'}).append($('<div>').attr({'class':'spinner-layer spinner-green-only'}).append($('<div>').attr({'class':'circle-clipper left'}).append($('<div>').attr({'class':'circle'}))).append($('<div>').attr({'class':'gap-patch'}).append($('<div>').attr({'class':'circle'}))).append($('<div>').attr({'class':'circle-clipper right'}).append($('<div>').attr({'class':'circle'})))))
						loadFilter(a,nt[2],nc,nt[0]);
					}
					$(nc).show();
				}else{
					var strId = $(this).attr('value'), sv= strId.split(',');
					if(!sv[0])strId = '';else if(sv[3] && sv[0])strId=sv[0]+','+sv[3];
					$(n).parent().find('.filterValue').val(strId);
					callback(p);
					$(n).parent().fadeOut('slow');
				}

			});
		})
	}
	function createFilterRow(p,npD,field,order,nc,callback)
	{
		var nDiv=$("<a>").addClass("collection-item").attr({"id":field.i,'href':'javascript:;'});
		$(nDiv);
		$('<label>').attr({'for':'filtercbx'+field.i}).append($('<input>').attr({'type':'checkbox','id':'filtercbx'+field.i}).val(nc+','+field.i)).append($("<span>")).appendTo(nDiv);
		nDiv.append(field.c[0]);
		$(npD).append(nDiv);

	}
