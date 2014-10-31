// JavaScript Document
var targs={};
$(function(){
	$.each($('.test_unit'), function(){
		$.each($('a,input,.unit_item',this), function(){
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
					var color=$(this).css('color');
					console.log('trigged item::'+i)
					$(this).animate({color:"red"},"slow",function(){
						$(this).animate({color:color},"slow");
					});
					
				}).trigger(action).off(action);
			},500 + ( k * 500 ));
			k++;
		});
	});
	
	
	
	
});