// JavaScript Document
var targs={};
$(function(){
	
	function getTo(el){
	  var elOffset = el.offset().top;
	  var elHeight = el.height();
	  var windowHeight = $(window).height();
	  var offset;
	
	  if (elHeight < windowHeight) {
		offset = elOffset - ((windowHeight / 2) - (elHeight / 2));
	  }
	  else {
		offset = elOffset;
	  }
	  var speed = 500;
	  $('html, body').animate({scrollTop:offset}, speed);	
	}
	
	
	
	$.each($('.test_unit'), function(){
		$.each($('a,input,button,.unit_item',this), function(){
			var tar=$(this);
			tar.uniqueId();
			var obj=[];
			var action,type;
			if(tar.is("a")){
				action="click";
				type="a";
			}
			if(tar.is("input")){
				action="change";
				type="input";
			}
			if(tar.is("button")){
				action="change";
				type="input";
			}
			if(tar.is(".unit_item")){
				action=tar.data('test_action');
				type=tar.data('test_type')||"general";
			}
			obj[tar.attr('id')]={
				action:action,
				type:type
			}
			tagrs = $.extend(targs,obj);
		});
	});
	
	$('#run_test').on('click',function(e){
		e.preventDefault();
		var k=0;
		$.each(targs, function(i,v){
			setTimeout(function(){
				var action=v.action;//+'.tester';
				$('#'+i).on(action,function(event){
					event.preventDefault();
					getTo($(this));
					var color=$(this).css('color');
					var bkcolor=$(this).css('background-color');
					console.log('trigged item::'+i);
					if($('#console_log').is(':not(:visible)')){
						$('#console_log').show();	
					}
					$('#console_log').prepend('<span><i class="fa fa-shield fa-rotate-270"></i>trigged item::'+i+'</span>');
					$(this).animate({color:"#f6861f !important","background-color":"#00a5bd !important"},"slow",function(){
						$(this).animate({color:color,"background-color":bkcolor},"slow");
					});
					
				}).trigger(action).off(action);
			},500 + ( k * 500 ));
			k++;
		});
	});
	
	
	
	
});