// JavaScript Document
var targs={};
$(function(){
	$.each($('.test_unit'), function(){
		$.each($('a,input,.unit_item',this), function(){
			var tar=$(this);
			tar.uniqueId();
			var obj=[];
			var action;
			if(tar.is("a")){
				action="click";
			}
			if(tar.is("input")){
				action="change";
			}
			if(tar.is(".unit_item")){
				action=tar.data('test_action');
			}
			obj[tar.attr('id')]={
				action:action
			}
			tagrs = $.extend(targs,obj);
		});
	});
});